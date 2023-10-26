<x-website-layout>
    <style>
        .section-padding {
            padding-top: 5rem !important;
            padding-bottom: 5rem !important;
        }

        @media (min-width: 1024px) {
            .section-padding {
                padding-top: 8rem !important;
                padding-bottom: 8rem !important;
            }
        }
    </style>
    <!-- Start Hero -->
    <section class="relative table w-full py-32 lg:py-36 bg-no-repeat bg-center bg-cover"
        style="background-image: url('{{ asset('assets/images/bg/01.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">
                    {{ __('Sell Faster. Save Thousands.') }}</h3>
                <p class="text-white/70 text-xl">
                    {{ __('A great plateform to buy, sell and rent your properties without any agent or commisions.') }}
                </p>
                <div class="mt-4">
                    <a href="javascript:void(0)"
                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">{{ __('Sell with Us') }}</a>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <div class="relative">
        <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative section-padding">
        <div class="container">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="md:col-span-6">
                    <div class="relative">
                        <img src="{{ asset('assets/images/property/2.jpg') }}" class="rounded-xl shadow-md"
                            alt="about us" loading="lazy">
                    </div>
                </div><!--end col-->

                <div class="md:col-span-6">
                    <div class="lg:ms-4">
                        <h4 class="mb-3 md:text-4xl text-2xl lg:leading-normal leading-normal font-semibold">
                            {{ __('We’ll pay cash for your property') }}</h4>
                        <p class="text-slate-500 max-w-xl text-xl font-semibold">
                            {{ __("If you're interested in a quick sale of your property for cash, then Stake is the perfect solution.") }}
                        </p>
                        <p class="text-slate-400 max-w-xl mt-5">
                            {{ __('We have a 100% closing record and can offer fair market value - with none of the hassle. Our team is incredibly knowledgeable and can help you navigate the process seamlessly.') }}
                        </p>

                        <div class="mt-4">
                            <a href="javascript:void(0)"
                                class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">{{ __('Sell with Us') }}</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end grid-->
        </div>

        <div class="container lg:mt-32 mt-20">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">
                    {{ __('How It Works') }}</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    {{ __('A great plateform to buy, sell and rent your properties without any agent or commisions.') }}
                </p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-transparent overflow-hidden text-center">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5 mx-auto"></i>
                        <div
                            class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="uil uil-estate"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h5 class="text-xl font-medium">{{ __('Evaluate Property') }}</h5>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->

                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-transparent overflow-hidden text-center">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5 mx-auto"></i>
                        <div
                            class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="uil uil-bag"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h5 class="text-xl font-medium">{{ __('Meeting with Agent') }}</h5>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->

                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-transparent overflow-hidden text-center">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5 mx-auto"></i>
                        <div
                            class="absolute top-2/4 -translate-y-2/4 start-0 end-0 mx-auto text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="uil uil-key-skeleton"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h5 class="text-xl font-medium">{{ __('Close the Deal') }}</h5>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->
            </div><!--end grid-->
        </div><!--end container-->

    </section>
    <!-- End -->

    <!-- Start -->
    <section class="relative lg:py-24 py-16 bg-gray-50">
        <div class="container ">
            <div class="grid grid-cols-1 pb-12 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">
                    {{ __('Why Sell With Us?') }}</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    {{ __('Sell your property for cash. We has a 100% closing rate and can offer fair market value, with none of the hassle') }}
                </p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-x-[30px] gap-y-[50px]">
                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden p-5">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5"></i>
                        <div
                            class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="mdi mdi-cards-heart"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="" class="text-xl hover:text-green-600 font-medium">{{ __('Comfortable') }}</a>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->

                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden p-5">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5"></i>
                        <div
                            class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="mdi mdi-shield-sun"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href=""
                            class="text-xl hover:text-green-600 font-medium">{{ __('Extra Security') }}</a>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->

                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden p-5">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5"></i>
                        <div
                            class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="mdi mdi-star"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="" class="text-xl hover:text-green-600 font-medium">{{ __('Luxury') }}</a>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->

                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden p-5">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5"></i>
                        <div
                            class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="mdi mdi-currency-usd"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="" class="text-xl hover:text-green-600 font-medium">{{ __('Best Price') }}</a>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->

                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden p-5">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5"></i>
                        <div
                            class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="mdi mdi-map-marker"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href=""
                            class="text-xl hover:text-green-600 font-medium">{{ __('Stratagic Location') }}</a>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->

                <!-- Content -->
                <div
                    class="group relative lg:px-10 transition-all duration-500 ease-in-out rounded-xl bg-white dark:bg-slate-900 overflow-hidden p-5">
                    <div class="relative overflow-hidden text-transparent -m-3">
                        <i data-feather="hexagon" class="h-32 w-32 fill-green-600/5"></i>
                        <div
                            class="absolute top-[50%] -translate-y-[50%] start-[45px] text-green-600 rounded-xl transition-all duration-500 ease-in-out text-4xl flex align-middle justify-center items-center">
                            <i class="mdi mdi-chart-arc"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="" class="text-xl hover:text-green-600 font-medium">{{ __('Efficient') }}</a>
                        <p class="text-slate-400 mt-3">
                            {{ __("If the distribution of letters and 'words' is random, the reader will not be distracted from making.") }}
                        </p>
                    </div>
                </div>
                <!-- Content -->
            </div><!--end grid-->

        </div><!--end container-->
    </section>
    <!-- End -->

    <!-- Start -->
    <section class="relative lg:py-20 py-16">
        <div class="container">
            <div class="grid grid-cols-1 pb-8">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">
                    {{ __('What neighbourhoods do we cover?') }}</h3>

                <p class="text-slate-400 max-w-xl">
                    {{ __('We list properties in the following neighbourhoods. If you’re looking to sell in these areas then we’ll consider a full cash offer!') }}
                </p>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 mt-8 md:gap-[30px] gap-3">
                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/residential.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Dubai Marina') }}</a>
                    </div>
                </div><!--end content-->

                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/land.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Palm Jumeirah') }}</a>
                    </div>
                </div><!--end content-->

                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/commercial.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Downtown Dubai') }}</a>
                    </div>
                </div><!--end content-->

                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/industrial.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Business Bay') }}</a>
                    </div>
                </div><!--end content-->

                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/investment.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Jumeirah and La Mer') }}</a>
                    </div>
                </div><!--end content-->

                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/residential.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Dubai Marina') }}</a>
                    </div>
                </div><!--end content-->

                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/land.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Palm Jumeirah') }}</a>
                    </div>
                </div><!--end content-->

                <div
                    class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <img src="{{ asset('assets/images/property/commercial.jpg') }}" alt="image" loading="lazy">
                    <div class="p-4">
                        <a href=""
                            class="text-xl font-medium hover:text-green-600">{{ __('Downtown Dubai') }}</a>
                    </div>
                </div><!--end content-->
            </div><!--end grid-->
        </div><!--end container-->
    </section>
    <!-- End -->

    <!-- Start -->
    <section class="relative lg:py-20 py-16">
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">
                    {{ __('Frequently asked questions') }}</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    {{ __('Here’s some of the most common questions about selling your property on Here! You can also reach out to us if you have any questions and our team will take care of you!') }}
                </p>
            </div><!--end grid-->

            <div class="max-w-4xl mx-auto pb-8 mt-8 ">
                <div id="accordion-collapseone" data-accordion="collapse" class="mt-6">

                    @foreach ($faqs as $faq)
                        <div
                            class="relative shadow dark:shadow-gray-700 rounded-md overflow-hidden {{ !$loop->first ? 'mt-4' : '' }}">
                            <h2 class="text-lg font-medium" id="accordion-collapse-heading-{{ $loop->iteration }}">
                                <button type="button"
                                    class="flex justify-between items-center p-5 w-full font-medium text-left"
                                    data-accordion-target="#accordion-collapse-body-{{ $loop->iteration }}"
                                    aria-expanded="true"
                                    aria-controls="accordion-collapse-body-{{ $loop->iteration }}">
                                    <span>{{ $faq->question }}</span>
                                    <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-{{ $loop->iteration }}" class="hidden"
                                aria-labelledby="accordion-collapse-heading-{{ $loop->iteration }}">
                                <div class="p-5">
                                    <p class="text-slate-400 dark:text-gray-400">{!! $faq->answer !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div><!--end grid-->
        </div>
    </section>
    <!-- End -->


</x-website-layout>
