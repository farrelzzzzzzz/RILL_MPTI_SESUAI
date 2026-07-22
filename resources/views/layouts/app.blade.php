<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RY Travel</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <div id="loader">
        <img src="{{ asset('images/logo.png') }}">
    </div>

    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    <script src="{{ asset('js/chatbot.js') }}"></script>

    @include('components.footer')

    <script src="{{ asset('js/script.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    {{-- HAPUS INI --}}
    {{-- @include('partials.scripts') --}}

    @include('chatbot.widget')

</body>

</html>
</body>

</html>