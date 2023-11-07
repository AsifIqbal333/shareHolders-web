<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Css -->
    <link href="{{ asset('assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">

    <!-- Main Css -->
    <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/f75ab26951.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- navbar --}}
        @include('layouts.navigation')

        {{-- sidebar menu --}}
        @include('layouts.aside')

        <main class="p-4 pt-20 md:ml-64">
            {{ $slot }}
        </main>
        <form id="logout" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
    </div>


    <script src="{{ asset('assets/libs/tobii/js/tobii.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @livewireChartsScripts
    @stack('scripts')
    <!--Tawk.to Script-->
    <x-tawk-chat />
</body>

</html>
