<!DOCTYPE html>
<html class="light scroll-smooth" dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Main Css -->
    <link href="{{ asset('assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />
    <!-- Scripts -->
    <!-- Main Css -->
    @stack('styles')
    @vite(['resources/js/app.js'])
</head>

<body class="dark:bg-slate-900">

    <!-- Page Content -->
    <main>
        <section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">
            <div class="absolute inset-0 image-wrap z-1 bg-no-repeat bg-center bg-cover"
                style="background-image: url('{{ asset('assets/images/bg/01.jpg') }}');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
            <div class="container z-3">
                <div class="flex justify-center">
                    <div
                        class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                        <a href="{{ route('homepage') }}"><img src="{{ asset('assets/images/logo-icon-64.png') }}"
                                class="mx-auto" alt="logo"></a>
                        @if (isset($heading))
                            <h5 class="my-6 text-xl font-semibold">{{ $heading }}</h5>
                        @endif
                        @if (session('status') !== 'code-sent')
                            <x-auth-session-status class="mb-3" :status="session('status')" />
                        @endif
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section>
        <div class="fixed bottom-3 end-3 z-10">
            <a href="{{ route('homepage') }}"
                class="back-button btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full"
                title="{{ __('Homepage') }}"><i data-feather="arrow-left" class="h-4 w-4"></i></a>
        </div>

    </main>


    <!-- Switcher -->
    <div class="fixed top-1/4 -left-2 z-3">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
            <label
                class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8"
                for="chk">
                <i class="uil uil-moon text-[20px] text-yellow-500 mt-1"></i>
                <i class="uil uil-sun text-[20px] text-yellow-500 mt-1"></i>
                <span
                    class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] start-[2px] w-7 h-7"></span>
            </label>
        </span>
    </div>
    <!-- Switcher -->

    <!-- Back to top -->
    {{-- <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 h-9 w-9 text-center bg-green-600 text-white justify-center items-center"><i
            class="uil uil-arrow-up"></i></a> --}}
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- JAVASCRIPTS -->
    @stack('scripts')
</body>

</html>
