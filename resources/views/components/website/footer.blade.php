<!-- Start Footer -->
<footer class="relative bg-slate-900 dark:bg-slate-800 mt-24">
    <div class="container">
        <div class="grid grid-cols-1">
            <div class="relative py-16">
                <!-- Subscribe -->
                <div class="relative w-full">
                    <div
                        class="relative -top-40 bg-white dark:bg-slate-900 lg:px-8 px-6 py-10 rounded-xl shadow-lg dark:shadow-gray-700 overflow-hidden">
                        <div class="grid md:grid-cols-2 grid-cols-1 items-center gap-[30px]">
                            <div class="ltr:md:text-left rtl:md:text-right text-center z-1">
                                <h3
                                    class="md:text-3xl text-2xl md:leading-normal leading-normal font-medium text-black dark:text-white">
                                    {{ __('Subscribe to Newsletter!') }}</h3>
                                <p class="text-slate-400 max-w-xl mx-auto">
                                    {{ __('Subscribe to get latest updates and information.') }}</p>
                            </div>

                            <div class="subcribe-form z-1">
                                <form class="relative max-w-lg md:ms-auto">
                                    <input type="email" id="subcribe" name="email"
                                        class="rounded-full bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 focus:ring-0 outline-none"
                                        placeholder="Enter your email :">
                                    <button type="submit"
                                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-full">{{ __('Subscribe') }}</button>
                                </form><!--end form-->
                            </div>
                        </div>

                        <div class="absolute -top-5 -start-5">
                            <div
                                class="uil uil-envelope lg:text-[150px] text-7xl text-black/5 dark:text-white/5 ltr:-rotate-45 rtl:rotate-45">
                            </div>
                        </div>

                        <div class="absolute -bottom-5 -end-5">
                            <div
                                class="uil uil-pen lg:text-[150px] text-7xl text-black/5 dark:text-white/5 rtl:-rotate-90">
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px] -mt-24">
                        <div class="lg:col-span-4 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="{{ config('app.name') }}">
                            </a>
                            <p class="mt-6 text-gray-300">
                                {{ __('A great plateform to buy, sell and rent your properties without any agent or commisions.') }}
                            </p>

                        </div><!--end col-->

                        <div class="lg:col-span-2 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">{{ config('app.name') }}</h5>
                            <ul class="list-none footer-list mt-6">
                                <li>
                                    <a href="{{ route('property_page') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('Properties') }}</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('about') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('About') }}</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('sell') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i>
                                        {{ __('Sell') }}</a>
                                </li>
                                {{-- <li class="mt-[10px]">
                                    <a href="javascript:void(0)"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('Blog') }}</a>
                                </li> --}}
                                <li class="mt-[10px]">
                                    <a href="javascript:void(0)"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('FAQs') }}</a>
                                </li>
                            </ul>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">{{ __('Usefull Links') }}</h5>
                            <ul class="list-none footer-list mt-6">
                                <li>
                                    <a href="{{ route('term_condition') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('Terms of Use') }}</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('privacy_policy') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('Privacy Policy') }}</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('cookies_policy') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('Cookies Notice') }}</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('key_risks') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('Key Risks') }}</a>
                                </li>
                                <li class="mt-[10px]"><a href="{{ route('contact.index') }}"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> {{ __('Contact') }}</a></li>
                            </ul>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">{{ __('Contact Details') }}</h5>


                            <div class="flex mt-6">
                                <i data-feather="map-pin" class="w-5 h-5 text-green-600 me-3"></i>
                                <div class="">
                                    <h6 class="text-gray-300 mb-2">{{ __('C/54 Northwest Freeway,') }} <br>
                                        {{ __('Suite 558,') }} <br>
                                        {{ __('Houston,USA 485') }}
                                    </h6>
                                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                        data-type="iframe"
                                        class="text-green-600 hover:text-green-700 duration-500 ease-in-out lightbox">{{ __('View on Google map') }}</a>
                                </div>
                            </div>

                            <div class="flex mt-6">
                                <i data-feather="mail" class="w-5 h-5 text-green-600 me-3"></i>
                                <div class="">
                                    <a href="mailto:contact@example.com"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">contact@example.com</a>
                                </div>
                            </div>

                            <div class="flex mt-6">
                                <i data-feather="phone" class="w-5 h-5 text-green-600 me-3"></i>
                                <div class="">
                                    <a href="tel:+152534-468-854"
                                        class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">+152
                                        534-468-854</a>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div>
                <!-- Subscribe -->
            </div>
        </div>
    </div><!--end container-->

    <div class="py-[30px] px-0 border-t border-gray-800 dark:border-gray-700">
        <div class="container text-center">
            <div class="grid md:grid-cols-2 items-center gap-6">
                <div class="ltr:md:text-left rtl:md:text-right text-center">
                    <p class="mb-0 text-gray-300">©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> {{ config('app.name') }}. {{ __(' All rights reserved') }}
                    </p>
                </div>

                <ul class="list-none ltr:md:text-right rtl:md:text-left text-center">
                    <li class="inline"><a href="https://1.envato.market/hously" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="shopping-cart" class="h-4 w-4"></i></a></li>
                    <li class="inline"><a href="https://dribbble.com/shreethemes" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="dribbble" class="h-4 w-4"></i></a></li>
                    <li class="inline"><a href="https://www.behance.net/shreethemes" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                class="uil uil-behance align-baseline"></i></a></li>
                    <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="linkedin" class="h-4 w-4"></i></a></li>
                    <li class="inline"><a href="https://www.facebook.com/shreethemes" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="facebook" class="h-4 w-4"></i></a></li>
                    <li class="inline"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="instagram" class="h-4 w-4"></i></a></li>
                    <li class="inline"><a href="https://twitter.com/shreethemes" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="twitter" class="h-4 w-4"></i></a></li>
                    <li class="inline"><a href="mailto:support@shreethemes.in"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="mail" class="h-4 w-4"></i></a></li>
                    <li class="inline"><a href="https://forms.gle/QkTueCikDGqJnbky9" target="_blank"
                            class="btn btn-icon btn-sm text-gray-400 hover:text-white border border-gray-800 dark:border-gray-700 rounded-md hover:border-green-600 dark:hover:border-green-600 hover:bg-green-600 dark:hover:bg-green-600"><i
                                data-feather="file-text" class="h-4 w-4"></i></a></li>
                </ul><!--end icon-->
            </div><!--end grid-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- End Footer -->
