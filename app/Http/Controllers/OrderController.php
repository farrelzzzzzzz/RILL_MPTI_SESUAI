<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.order', [
            'data' => $request
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pesawat'      => 'required',
            'nama_penumpang'    => 'required',
            'telepon'           => 'required',
            'tanggal'           => 'required',
            'flight_pukul'      => 'required',
            'lokasi_jemput'     => 'required',
            'lokasi_tujuan'     => 'required',
            'jam_landing'       => 'required',
            'jam_jemput'        => 'required',
            'jumlah_penumpang'  => 'required|integer|min:1|max:10',
            'pembayaran'        => 'required',
        ]);

        $order = Order::create([
            'kode_pesawat'      => $request->kode_pesawat,
            'nama_penumpang'    => $request->nama_penumpang,
            'telepon'           => $request->telepon,
            'tanggal'           => $request->tanggal,
            'flight_pukul'      => $request->flight_pukul,
            'lokasi_jemput'     => $request->lokasi_jemput,
            'lokasi_tujuan'     => $request->lokasi_tujuan,
            'jam_landing'       => $request->jam_landing,
            'jam_jemput'        => $request->jam_jemput,
            'jumlah_penumpang'  => $request->jumlah_penumpang,
            'pembayaran'        => $request->pembayaran,
            'status'            => 'draft'
        ]);

        return redirect()->route('order.confirm', $order->id);
    }

    public function confirm($id)
    {
        $order = Order::findOrFail($id);

        return view('pages.order-confirm', compact('order'));
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'cancel';
        $order->save();

        return redirect()->route('home')
            ->with('success', 'Pemesanan dibatalkan.');
    }

    public function sendWa($id)
    {
        $order = Order::findOrFail($id);

        // Update status menjadi pending
        $order->status = 'pending';
        $order->save();

        // Format tanggal Indonesia
        Carbon::setLocale('id');

        $tanggal = Carbon::parse($order->tanggal)
            ->translatedFormat('l, d F Y');

        // Nomor Admin
        $nomorAdmin = "6283866371952";

        // Pesan WhatsApp
        $pesan  = "Terima kasih telah menghubungi *RY TOUR & TRANSPORT*.\n";
        $pesan .= "Silakan beri tahu apa yang dapat kami bantu.\n\n";

        $pesan .= "Kami menyediakan jasa:\n";
        $pesan .= "• Antar Jemput Bandara Jogja\n";
        $pesan .= "• Carter Drop Dalam & Luar Kota\n";
        $pesan .= "• Paket Wisata Jogja\n\n";

        $pesan .= "━━━━━━━━━━━━━━━━━━━━━━\n";
        $pesan .= "        *FORMAT ORDER*\n";
        $pesan .= "━━━━━━━━━━━━━━━━━━━━━━\n\n";

        $pesan .= "✈️ *Kode Pesawat*\n";
        $pesan .= "{$order->kode_pesawat}\n\n";

        $pesan .= "👤 *Nama Penumpang*\n";
        $pesan .= "{$order->nama_penumpang}\n\n";

        $pesan .= "👥 *Jumlah Penumpang*\n";
        $pesan .= "{$order->jumlah_penumpang} Orang\n\n";

        $pesan .= "📞 *Nomor WA*\n";
        $pesan .= "{$order->telepon}\n\n";

        $pesan .= "📅 *Hari & Tanggal*\n";
        $pesan .= "{$tanggal}\n\n";

        $pesan .= "📍 *Lokasi Jemput*\n";
        $pesan .= "{$order->lokasi_jemput}\n\n";

        $pesan .= "📍 *Lokasi Tujuan*\n";
        $pesan .= "{$order->lokasi_tujuan}\n\n";

        $pesan .= "🛫 *Flight Pukul*\n";
        $pesan .= "{$order->flight_pukul}\n\n";

        $pesan .= "🛬 *Jam Landing*\n";
        $pesan .= "{$order->jam_landing}\n\n";

        $pesan .= "🚐 *Jam Jemput*\n";
        $pesan .= "{$order->jam_jemput}\n\n";

        $pesan .= "💳 *Metode Pembayaran*\n";
        $pesan .= strtoupper($order->pembayaran) . "\n\n";

        $pesan .= "💰 *Tarif*\n";
        $pesan .= "Mohon diinformasikan oleh admin.\n\n";

        $pesan .= "⚠️ Mohon informasikan kepada kami apabila terjadi *RESCHEDULE* atau *DELAY*.\n\n";

        $pesan .= "Terima kasih 🙏";

        return redirect()->away(
            "https://wa.me/" . $nomorAdmin . "?text=" . urlencode($pesan)
        );
    }
}