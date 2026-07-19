@extends('layouts.app')

@section('content')

    <section class="hero">

        <h1 data-aos="zoom-in">
            ANTAR JEMPUT BANDARA JOGJA
        </h1>

        <form action="{{ route('order') }}" method="GET" class="booking-box" data-aos="fade-up">

            <div class="field">
                <label>Lokasi Jemput</label>

                <input type="text" name="lokasi_jemput" placeholder="Pilih Keberangkatan"
                    pattern="^[A-Za-zÀ-ÿ0-9\s.,-]{3,100}$" title="Masukkan lokasi yang valid" required>
            </div>

            <div class="field">
                <label>Lokasi Tujuan</label>

                <input type="text" name="lokasi_tujuan" placeholder="Pilih Tujuan" pattern="^[A-Za-zÀ-ÿ0-9\s.,-]{3,100}$"
                    title="Masukkan lokasi yang valid" required>
            </div>

            <div class="field">
                <label>Tanggal</label>

                <input type="date" id="booking-date" name="tanggal" required>
            </div>

            <div class="field">
                <label>Jam Landing</label>

                <input id="booking-time-landing" type="text" name="jam_landing" placeholder="Contoh: 13:00" maxlength="5"
                    pattern="^([01]\d|2[0-3]):([0-5]\d)$" title="Format jam harus HH:MM, contoh 13:00" autocomplete="off"
                    required>
            </div>

            <div class="field">
                <label>Jam Jemput</label>

                <input id="booking-time-pickup" type="text" name="jam_jemput" placeholder="Contoh: 13:00" maxlength="5"
                    pattern="^([01]\d|2[0-3]):([0-5]\d)$" title="Format jam harus HH:MM, contoh 13:00" autocomplete="off"
                    required>
            </div>

            <div class="field">
                <label>Jumlah Penumpang</label>

                <input type="number" name="jumlah_penumpang" min="1" max="10" placeholder="1 Orang" required>
            </div>

            <button type="submit" class="order-btn">
                <i class="fa-solid fa-paper-plane"></i>
                ORDER
            </button>

        </form>

    </section>

    <section class="promo reveal">
        <div class="promo-slider" data-promo-slider>
            <div class="promo-slides">
                <img class="promo-slide active" src="{{ asset('images/promo.png') }}" alt="Promo 1">
                <img class="promo-slide" src="{{ asset('images/promo.png') }}" alt="Promo 2">
                <img class="promo-slide" src="{{ asset('images/promo.png') }}" alt="Promo 3">
            </div>

            <div class="promo-dots" aria-label="Promo dots">
                <button class="promo-dot active" type="button" data-promo-dot="0" aria-label="Slide 1"></button>
                <button class="promo-dot" type="button" data-promo-dot="1" aria-label="Slide 2"></button>
                <button class="promo-dot" type="button" data-promo-dot="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <section id="tentang" class="layanan">


        <h1 data-aos="fade-right">
            LAYANAN RY TRAVEL
        </h1>

        <p data-aos="fade-left">
            Ry Travel siap menemani perjalananmu dengan layanan antar jemput bandara
            yang nyaman, aman, dan tepat waktu. Pesan kendaraan dengan mudah, pilih jadwal
            keberangkatan, lalu nikmati perjalanan tanpa repot.
        </p>

        <div class="card reveal">

            <div class="icon">
                <i class="fa-solid fa-plane"></i>
            </div>

            <h2>Antar Jemput Bandara</h2>

            <p>
                Nikmati layanan antar jemput Bandara YIA dan Bandara Adisutjipto dengan armada nyaman,
                sopir berpengalaman, dan jadwal keberangkatan yang tepat waktu.
            </p>

        </div>

        <div class="card reveal">

            <div class="icon">
                <i class="fa-solid fa-ticket"></i>
            </div>

            <h2>Reservasi Mudah</h2>

            <p>
                Pesan layanan antar jemput bandara kini lebih praktis bersama Ry Travel.
                Cukup pilih jadwal keberangkatan, isi data perjalanan, dan konfirmasi pemesanan secara online dengan proses
                yang cepat dan mudah.
            </p>

        </div>

    </section>

    <section class="gallery reveal">

        <h1>Seru Seruan Bersama Ry Travel</h1>

        <div class="gallery-grid">

            <video controls class="reels-video">
                <source src="{{ asset('videos/travel1.mp4') }}" type="video/mp4">
            </video>

            <video controls class="reels-video">
                <source src="{{ asset('videos/travel1.mp4') }}" type="video/mp4">
            </video>

            <video controls class="reels-video">
                <source src="{{ asset('videos/travel1.mp4') }}" type="video/mp4">
            </video>

        </div>

    </section>

    <a href="https://wa.me/62882007380782" class="wa-button" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
        Tanya Admin
    </a>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Format otomatis Jam Landing
            function formatJam(input) {
                input.addEventListener("input", function () {

                    let value = this.value.replace(/\D/g, '');

                    if (value.length > 2) {
                        value = value.substring(0, 2) + ":" + value.substring(2, 4);
                    }

                    this.value = value;
                });
            }

            formatJam(document.getElementById("booking-time-landing"));
            formatJam(document.getElementById("booking-time-pickup"));

            // Lokasi hanya karakter yang diperbolehkan
            document.querySelectorAll('input[name="lokasi_jemput"], input[name="lokasi_tujuan"]').forEach(function (input) {

                input.addEventListener("input", function () {

                    this.value = this.value.replace(/[^a-zA-ZÀ-ÿ0-9\s.,-]/g, '');

                });

            });

            // Jumlah penumpang maksimal 14
            const jumlah = document.querySelector('input[name="jumlah_penumpang"]');

            jumlah.addEventListener("input", function () {

                if (this.value > 10 ){
                    this.value = 10;
                    alert("Maksimal 10 penumpang.");
                }

                if (this.value < 1) {
                    this.value = 1;
                }

            });

        });
    </script>

@endsection