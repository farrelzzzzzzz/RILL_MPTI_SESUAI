<nav class="navbar">

    <a href="{{ route('about') }}" class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="RY Travel Logo">
    </a>

    <ul class="nav-links">
        <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li><a class="nav-link" href="{{ route('about') }}">Tentang</a></li>
        <li><a class="nav-link" href="{{ route('testimoni') }}">Testimoni</a></li>
        <li><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>

    </ul>


</nav>