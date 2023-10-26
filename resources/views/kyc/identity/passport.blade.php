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

                                <form class="ltr:text-left rtl:text-right" method="POST"
                                    action="{{ route('identity.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{ $errors }}
                                    <div class="grid grid-cols-1">
                                        <div class="mb-4">
                                            <label class="font-medium"
                                                for="name">{{ __('Write down your full name') }}</label>
                                            <input id="name" type="text" name="name"
                                                value="{{ old('name') }}" class="form-input mt-3"
                                                placeholder="{{ __('Full Name') }}" required autofocus>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium"
                                                for="father_name">{{ __('Write down your father name') }}</label>
                                            <input id="father_name" type="text" name="father_name"
                                                value="{{ old('father_name') }}" class="form-input mt-3"
                                                placeholder="{{ __('Father Name') }}" required>
                                            <x-input-error :messages="$errors->get('father_name')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium" for="dob">{{ __('Date of Birth') }}</label>
                                            <input id="dob" type="date" name="dob"
                                                value="{{ old('dob') }}" class="form-input mt-3" required>
                                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium" for="gender">{{ __('Gender') }}</label>
                                            <select name="gender" id="gender" class="form-input form-select mt-3">
                                                <option value="">{{ __('Select Gender') }}</option>
                                                <option value="male" @selected(old('gender') === 'male')>{{ __('Male') }}
                                                </option>
                                                <option value="female" @selected(old('gender') === 'female')>{{ __('Female') }}
                                                </option>
                                                <option value="other" @selected(old('gender') === 'other')>{{ __('other') }}
                                                </option>
                                            </select>
                                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium"
                                                for="issue_country">{{ __('Write down your password issuing issue_country') }}</label>
                                            <input id="issue_country" type="issue_country" name="issue_country"
                                                value="{{ old('issue_country') }}" class="form-input mt-3"
                                                placeholder="{{ __('Issue Country') }}" required>
                                            <x-input-error :messages="$errors->get('issue_country')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium"
                                                for="passport_number">{{ __('Passport Number') }}</label>
                                            <input id="passport_number" type="text" name="passport_number"
                                                value="{{ old('passport_number') }}" class="form-input mt-3"
                                                placeholder="{{ __('Passport Number') }}" required>
                                            <x-input-error :messages="$errors->get('passport_number')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium"
                                                for="passport_expiry">{{ __('Passport Expiry Date') }}</label>
                                            <input id="passport_expiry" type="date" name="passport_expiry"
                                                value="{{ old('passport_expiry') }}" class="form-input mt-3"
                                                required>
                                            <x-input-error :messages="$errors->get('passport_expiry')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <label class="font-medium"
                                                for="passport_image">{{ __('Upload your passport Image') }}</label>
                                            <input id="passport_image" type="file" name="passport_image"
                                                class="form-input mt-3" required>
                                            <x-input-error :messages="$errors->get('passport_image')" class="mt-2" />
                                        </div>

                                        <div class="mb-4">
                                            <button type="submit"
                                                class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Submit Verification Documents') }}</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
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

    </body>

</html>
