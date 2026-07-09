<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [

        'kode_pesawat',
        'nama_penumpang',
        'telepon',
        'tanggal',
        'flight_pukul',
        'lokasi_jemput',
        'lokasi_tujuan',
        'jam_landing',
        'jam_jemput',
        'jumlah_penumpang',
        'pembayaran',
        'status'

    ];
}
