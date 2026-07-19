@extends('layouts.app')

@section('content')

    <section class="kontak-hero">

        <h1>KONTAK KAMI</h1>

    </section>


    <section class="kontak-section reveal">

        <div class="kontak-info">

            <h1>RY TRAVEL</h1>

            <div class="info-card reveal-left">

                <h2>Head Office</h2>

                <p>
                    Jl. Jogja Ring Road Sel. No.1, Gonjen, Tamantirto,
                    Kec. Kasihan, Kabupaten Bantul,
                    Daerah Istimewa Yogyakarta 55184
                </p>

            </div>

            <div class="info-card reveal-left">

                <h2>Operational Hours</h2>

                <p>NANTI</p>

            </div>

            <div class="info-card reveal-left">

                <h2>Contact Center</h2>

                <ul>

                    <li>
                        <i class="fa-brands fa-whatsapp"></i>
                        +62 882-0073-80782
                    </li>

                    <li>
                        <i class="fa-brands fa-instagram"></i>
                        @travel_bandara_jogja
                    </li>

                </ul>

            </div>

            <a href="https://maps.google.com" target="_blank" class="location-btn">

                <i class="fa-solid fa-location-dot"></i>
                LIHAT LOKASI

            </a>

        </div>

    </section>


    <section class="map-section reveal">

        <iframe src="https://maps.google.com/maps?q=yogyakarta&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy">
        </iframe>

    </section>

    <a href="https://wa.me/62882007380782" class="wa-button" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
        Tanya Admin
    </a>

@endsection