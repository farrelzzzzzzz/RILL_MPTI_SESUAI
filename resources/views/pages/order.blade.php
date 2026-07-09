@extends('layouts.app')

@section('content')

    <section class="order-hero">

        <h1>FORM PEMESANAN</h1>

    </section>

    <section class="order-section reveal">

        <div class="order-container">

            <!-- HEADER MERAH -->
            <div class="order-header">
                <img src="{{ asset('images/logo.png') }}" class="order-logo">

                <div class="order-progress" aria-label="Langkah Pemesanan">
                    <div class="order-step is-done">
                        <span class="order-step-dot">1</span>
                        <span class="order-step-label">Data Diri</span>
                    </div>
                    <div class="order-step">
                        <span class="order-step-dot">2</span>
                        <span class="order-step-label">Pembayaran</span>
                    </div>
                </div>

                <h2>Lengkapi Data Diri</h2>
                <p>Lengkapi data pemesanan untuk melanjutkan reservasi.</p>
            </div>

            <!-- FORM -->
            <div class="order-card">

                <form action="{{ route('order.store') }}" method="POST" id="orderForm">
                    @csrf

                    <div class="order-grid">

                        <div class="order-grid-left">

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Kode Pesawat</label>
                                    <input type="text" name="kode_pesawat" placeholder="Contoh: JT-625"
                                        pattern="^[A-Z]{2}-[0-9]{2,4}$" title="Format kode pesawat: JT-625"
                                        style="text-transform: uppercase;" required>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Nama Penumpang</label>
                                    <input type="text" name="nama_penumpang" placeholder="Nama sesuai identitas"
                                        pattern="^[A-Za-zÀ-ÿ\s]{3,50}$" title="Nama hanya boleh huruf dan spasi" required>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Jumlah Penumpang</label>
                                    <input type="number" name="jumlah_penumpang" value="{{ request('jumlah_penumpang') }}" readonly>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Nomor WA / Telepon</label>
                                    <input type="tel" name="telepon" placeholder="08xxxxxxxxxx" pattern="^08[0-9]{8,11}$"
                                        maxlength="13" title="Masukkan nomor WA yang valid" required>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="text" name="tanggal" value="{{ request('tanggal') }}" readonly>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Flight Pukul</label>
                                    <input type="text" id="flight_pukul" name="flight_pukul" placeholder="Contoh: 14:30"
                                        maxlength="5" pattern="^([01]\d|2[0-3]):([0-5]\d)$"
                                        title="Gunakan format jam HH:MM, contoh 14:30" required>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Lokasi Jemput</label>
                                    <input type="text" name="lokasi_jemput" value="{{ request('lokasi_jemput') }}" readonly>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Lokasi Tujuan</label>
                                    <input type="text" name="lokasi_tujuan" value="{{ request('lokasi_tujuan') }}" readonly>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Jam Landing</label>
                                    <input type="text" name="jam_landing" value="{{ request('jam_landing') }}" readonly>
                                </div>
                            </div>

                            <div class="field-card">
                                <div class="form-group">
                                    <label>Jam Jemput</label>
                                    <input type="text" name="jam_jemput" value="{{ request('jam_jemput') }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="order-grid-right">

                            <h3 class="payment-title">
                                Metode Pembayaran
                            </h3>

                            <div class="payment-grid">

                                <label class="payment-card">
                                    <input type="radio" name="pembayaran" value="bca" required>

                                    <img src="{{ asset('images/BCA.png') }}" alt="BCA">
                                    <span>Transfer BCA</span>
                                </label>

                                <label class="payment-card">
                                    <input type="radio" name="pembayaran" value="bri">

                                    <img src="{{ asset('images/BRI.png') }}" alt="BRI">
                                    <span>Transfer BRI</span>
                                </label>

                                <label class="payment-card">
                                    <input type="radio" name="pembayaran" value="qris">

                                    <img src="{{ asset('images/Qris.png') }}" alt="QRIS">
                                    <span>QRIS</span>
                                </label>

                                <label class="payment-card">
                                    <input type="radio" name="pembayaran" value="cash">

                                    <img src="{{ asset('images/cash.jpg') }}" alt="Cash">
                                    <span>Cash</span>
                                </label>

                            </div>

                            <div class="order-submit">
                                <button class="btn-order" type="submit">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    Pesan Sekarang
                                </button>

                                <p class="order-note">
                                    Setelah klik, data akan diproses untuk konfirmasi pemesanan.
                                </p>
                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Flight Pukul
            const flight = document.getElementById("flight_pukul");

            flight.addEventListener("input", function () {

                let value = this.value.replace(/\D/g, '');

                if (value.length > 2) {
                    value = value.substring(0, 2) + ":" + value.substring(2, 4);
                }

                this.value = value;
            });

            // Nomor WA
            const telepon = document.querySelector('input[name="telepon"]');

            telepon.addEventListener("input", function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Nama Penumpang
            const nama = document.querySelector('input[name="nama_penumpang"]');

            nama.addEventListener("input", function () {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            });

            // Kode Pesawat
            const kode = document.querySelector('input[name="kode_pesawat"]');

            kode.addEventListener("input", function () {

                this.value = this.value.toUpperCase();

                this.value = this.value.replace(/[^A-Z0-9-]/g, '');

            });

        });
    </script>

@endsection