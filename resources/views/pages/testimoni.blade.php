@extends('layouts.app')

@section('content')

    <section class="testimoni-hero">

        <h1>TESTIMONI</h1>

    </section>

    <section class="why-ry reveal">

        <div class="why-image">
            <img src="{{ asset('images/logo.png') }}">
        </div>

        <div class="why-content">

            <h1>Kenapa RY TRAVEL ?</h1>

            <h3>Berpengalaman dan Terpercaya</h3>

            <p>
                RY Travel berpengalaman dalam melayani jasa antar jemput bandara dengan mengutamakan ketepatan waktu,
                kenyamanan, dan keamanan pelanggan. Kepercayaan pelanggan menjadi motivasi kami untuk terus memberikan
                pelayanan terbaik dalam setiap perjalanan.
            </p>

            <h3>Mudah dan Fleksibel</h3>

            <p>
                Kami siap melayani kebutuhan antar jemput dari dan menuju bandara dengan proses pemesanan yang mudah dan
                layanan yang fleksibel. Jadwal penjemputan dapat disesuaikan dengan waktu keberangkatan maupun kedatangan
                Anda agar perjalanan menjadi lebih praktis dan nyaman.
            </p>

            <h3>Profesional dan Ramah</h3>

            <p>
                Perjalanan Anda akan terasa lebih nyaman bersama tim RY Travel yang profesional, ramah, dan berpengalaman.
                Kami selalu berkomitmen memberikan pelayanan terbaik serta memastikan setiap pelanggan mendapatkan
                pengalaman perjalanan yang aman dan menyenangkan.
            </p>

        </div>

    </section>

    <section class="testimoni-card reveal">

        <h1>Pendapat Mereka Tentang Kita</h1>

        <div class="testimoni-grid">

            <div class="card-testi">
                <h2>Nama</h2>
                <p>Alamat</p>
                <span>Kesan testimoni</span>
            </div>

            <div class="card-testi">
                <h2>Nama</h2>
                <p>Alamat</p>
                <span>Kesan testimoni</span>
            </div>

            <div class="card-testi">
                <h2>Nama</h2>
                <p>Alamat</p>
                <span>Kesan testimoni</span>
            </div>

        </div>

    </section>

    <section class="info-area reveal">

        <div class="info-left">

            <div class="info-box">

                <h1>Operational Area</h1>

                <p>
                    Yogyakarta dan sekitarnya.
                </p>

            </div>

            <div class="info-box">

                <h1>Contact Info</h1>

                <p>0812-3456-7890</p>
                <p>info@rytravel.com</p>
                <p>Yogyakarta, Indonesia</p>

            </div>

            <div class="info-box">

                <h1>Transfer Bank</h1>

                <p>Nanti</p>

            </div>

        </div>

        <div class="info-map">

            <iframe src="https://maps.google.com/maps?q=yogyakarta&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy">
            </iframe>

        </div>

    </section>

    <a href="#" class="wa-button">
        <i class="fa-brands fa-whatsapp"></i>
        Tanya Admin
    </a>

@endsection