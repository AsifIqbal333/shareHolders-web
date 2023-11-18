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
    <style>
        .icon-corner {
            top: 0rem !important;
            inset-inline-end: 0rem !important;
        }
    </style>
    @vite(['resources/js/app.js'])
</head>

<body class="dark:bg-slate-900">

    <body class="dark:bg-slate-900">

        <!-- Page Content -->
        <main>
            <section class="pt-10 flex items-center relative zoom-image" style="padding-bottom: 6rem;">
                <div class="absolute inset-0 image-wrap z-1 bg-no-repeat bg-center bg-cover"
                    style="background-image: url('{{ asset('assets/images/bg/01.jpg') }}');">
                </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-2" id="particles-snow"></div>
                <div class="container z-3">
                    <div class="flex justify-center">
                        <div class="w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md"
                            style="max-width: 600px;">

                            <h5 class="my-6 text-xl font-semibold">{{ __('Upload your passport') }}</h5>

                            <div class="grid grid-cols-1">
                                <p class="text-slate-400 mb-2">
                                    {{ __('Financial regulations require us to verify your identity before you can invest.') }}
                                </p>
                                <p class="text-slate-400 mb-4">
                                    {{ __('This helps protect your investment and allows us to register you as the legal owner of each property you invest in.') }}
                                </p>

                                <div class="grid md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                                    <div class="flex flex-col">
                                        <div
                                            class="group rounded-xl bg-white dark:bg-slate-900  overflow-hidden ease-in-out duration-500 border border-green-600">
                                            <div class="relative">
                                                <img src="{{ asset('images/passport-accepted.webp') }}" alt="image"
                                                    loading="passport accepted">

                                                <div class="absolute icon-corner">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-icon bg-green-600 text-white rounded-full"
                                                        style="width: 1.5rem; height:1.5rem;"><i
                                                            class="mdi mdi-check mdi-18px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 text-center">
                                            <p>{{ __('Show all details – including the 2 lines at the bottom') }}</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <div class="group rounded-xl bg-white dark:bg-slate-900  overflow-hidden ease-in-out duration-500 border"
                                            style="border-color: red;">
                                            <div class="relative">
                                                <img src="{{ asset('images/passport-rejected-screen.webp') }}"
                                                    alt="image" loading="passport-rejected-screen">

                                                <div class="absolute icon-corner">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-icon text-white rounded-full"
                                                        style="background: red; width: 1.5rem; height:1.5rem;"><i
                                                            class="mdi mdi-close mdi-18px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 text-center">
                                            <p>{{ __('No photos captured from another screen') }}</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <div class="group rounded-xl bg-white dark:bg-slate-900  overflow-hidden ease-in-out duration-500 border"
                                            style="border-color: red;">
                                            <div class="relative">
                                                <img src="{{ asset('images/passport-rejected-glare.webp') }}"
                                                    alt="image" loading="passport-rejected-glare">

                                                <div class="absolute icon-corner">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-icon text-white rounded-full"
                                                        style="background: red; width: 1.5rem; height:1.5rem;"><i
                                                            class="mdi mdi-close mdi-18px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 text-center">
                                            <p>{{ __('No glare or overexposed photos') }}</p>
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <div class="group rounded-xl bg-white dark:bg-slate-900  overflow-hidden ease-in-out duration-500 border"
                                            style="border-color: red;">
                                            <div class="relative">
                                                <img src="{{ asset('images/passport-rejected-cropped.webp') }}"
                                                    alt="image" loading="passport-rejected-cropped">

                                                <div class="absolute icon-corner">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-icon text-white rounded-full"
                                                        style="background: red; width: 1.5rem; height:1.5rem;"><i
                                                            class="mdi mdi-close mdi-18px"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 text-center">
                                            <p>{{ __('No overcropped or cutoff photos') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 mt-5">
                                    <div class="mb-4">
                                        <a href="{{ route('identity.passport') }}"
                                            class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Start Verification') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="fixed bottom-3 end-3 z-999">
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
            class="back-to-top fixed hidden text-lg rounded-full z-999 bottom-5 end-5 h-9 w-9 text-center bg-green-600 text-white justify-center items-center"><i
                class="uil uil-arrow-up"></i></a> --}}
        <!-- Back to top -->

        <!-- JAVASCRIPTS -->
        <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
        <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.init.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- JAVASCRIPTS -->
        <!--Tawk.to Script-->
        <x-tawk-chat />
    </body>

</html>
