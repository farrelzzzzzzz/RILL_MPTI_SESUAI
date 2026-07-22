<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $apiKey = env('GEMINI_API_KEY');

        if (empty($apiKey)) {
            return response()->json([
                'success' => false,
                'answer' => 'API Key Gemini belum dikonfigurasi.'
            ], 500);
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent?key={$apiKey}";

        $systemPrompt = <<<PROMPT
Kamu adalah RY Travel Assistant.

Tugasmu adalah menjadi customer service resmi RY Travel.

Karakter:
- Ramah
- Sopan
- Profesional
- Jawaban singkat dan jelas
- Gunakan Bahasa Indonesia

Layanan RY Travel:

1. Paket Wisata
2. Rental Mobil
3. Sewa Hiace
4. Antar Jemput Bandara
5. City Tour
6. Drop Off
7. Booking Kendaraan

Jika pengguna bertanya di luar layanan travel,
jawab dengan sopan dan arahkan kembali ke layanan RY Travel.

Gunakan emoji secukupnya.

Jangan pernah mengatakan kamu ChatGPT.

Perkenalkan dirimu sebagai RY Travel Assistant.
PROMPT;

        $prompt = $systemPrompt . "\n\nPertanyaan pelanggan:\n" . $request->message;

        try {

            $response = Http::timeout(30)
                ->acceptJson()
                ->post($url, [
                    "contents" => [
                        [
                            "parts" => [
                                [
                                    "text" => $prompt
                                ]
                            ]
                        ]
                    ]
                ]);

            if (!$response->successful()) {

                return response()->json([
                    'success' => false,
                    'answer' => 'Gagal terhubung ke Gemini.',
                    'status' => $response->status(),
                    'error' => $response->body()
                ], 500);
            }

            $data = $response->json();

            $answer = $data['candidates'][0]['content']['parts'][0]['text']
                ?? 'Maaf, saya belum dapat menjawab pertanyaan tersebut.';

            return response()->json([
                'success' => true,
                'answer' => $answer
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'answer' => 'Terjadi kesalahan pada server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}