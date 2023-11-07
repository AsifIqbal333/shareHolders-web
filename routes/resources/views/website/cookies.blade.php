<x-website-layout>
    <!-- Start Hero -->
    <section class="relative table w-full py-32 lg:py-36 bg-no-repeat bg-center bg-cover"
        style="background-image: url('{{ asset('assets/images/bg/01.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">
                    {{ __('Cookies Notice') }}</h3>
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

    <!-- Start Cookies Notice -->
    <section class="relative lg:py-24 py-16">
        <div class="container">
            <div class="md:flex justify-center">
                <div class="md:w-3/4">
                    <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                        <h5 class="text-xl font-medium mb-4">Overview</h5>
                        <p class="text-slate-400 pb-3">Our website, <a href="#"
                                class="text-green-600 font-bold">getstake.com</a>, is operated by Stake Properties
                            Limited.</p>
                        <p class="text-slate-400 pb-3">Where we use “we”, “our” or “us” in this notice, we mean Stake
                            Properties Limited unless we say otherwise.</p>
                        <p class="text-slate-400 pb-3">Where we use “our site” in this notice, we mean <a href="#"
                                class="text-green-600 font-bold">getstake.com</a>. </p>

                        <h5 class="text-xl font-medium my-4">{{ __('What are cookies?') }}</h5>
                        <p class="text-slate-400 pb-3">
                            {{ __('Cookies are text files containing small amounts of information which are downloaded to your device when you visit our site. Our site recognises those cookies on each subsequent visit, enabling our site to recognise you.') }}
                        </p>
                        <p class="text-slate-400 pb-3">
                            {{ __('Unless you have adjusted your browser settings to refuse cookies (and details of how to do this are signposted at the end of this notice), our site will set cookies as soon as you visit our site.') }}
                        </p>

                        <h5 class="text-xl font-medium mb-4 mt-8">{{ __('How and why we use cookies') }}</h5>
                        <p class="text-slate-400">
                            {{ __('We use cookies on our site to:') }}
                        </p>
                        <ul class="list-unstyled text-slate-400 mt-4">
                            <li class="flex mt-2"><i
                                    class="uil uil-arrow-right text-green-600 align-middle me-2"></i>{{ __('Recognise you whenever you visit our site') }}
                            </li>
                            <li class="flex mt-2"><i
                                    class="uil uil-arrow-right text-green-600 align-middle me-2"></i>{{ __('Remember the notifications you’ve seen so that we don’t show them to you again') }}
                            </li>
                            <li class="flex mt-2"><i
                                    class="uil uil-arrow-right text-green-600 align-middle me-2"></i>{{ __('Allow you to navigate between pages efficiently') }}
                            </li>
                            <li class="flex mt-2"><i
                                    class="uil uil-arrow-right text-green-600 align-middle me-2"></i>{{ __('Measure how you use our site so it can be updated and improved to give you the best possible experience on our site.') }}
                            </li>
                        </ul>
                        <p class="text-slate-400 pt-2">
                            {{ __('The information we obtain from our use of cookies will not usually contain information from which you can easily be identified, such as your name. However, we do collect some personal data relating to your computer or other electronic devices, such as your IP address, your browser, and/or other internet log information.') }}
                        </p>
                        <p class="text-slate-400 pt-3">
                            {{ __('In most cases, we will need your consent in order to use cookies on our site. The exception to this is where the cookie is essential in order for us to provide you with a service you have requested.') }}
                        </p>
                        <p class="text-slate-400 pt-3">
                            {{ __('When you open our site in your browser a cookie pop up message will be displayed and this will ask you for your consent for non-essential cookies to be placed on your device. If you do not click to accept cookies but you continue to use our site without disabling cookies, we will consider this to mean that you accept our use of these non-essential cookies. A record of your acceptance will be stored in a functional cookie for 30 days, after which the cookie will expire and the cookie pop-up message will be displayed again.') }}
                        </p>
                        <p class="text-slate-400 pt-3">
                            {{ __('You may withdraw your consent or acceptance at any time by following the instructions for disabling cookies, signposted at the end of this Cookie Notice.') }}
                        </p>

                        <h5 class="text-xl font-medium my-4">{{ __('Where to find more information') }}</h5>
                        <p class="text-slate-400 pb-1">
                            {{ __('You can control whether to accept cookies or not. If you decide to not accept cookies, some features and services on our websites will not function properly.') }}
                        </p>
                        <p class="text-slate-400 pb-1">
                            {{ __('If you would prefer not to accept cookies you can either:') }}</p>
                        <ul class="list-unstyled text-slate-400 mt-4">
                            <li class="flex mt-2"><i
                                    class="uil uil-arrow-right text-green-600 align-middle me-2"></i>{{ __('Change your browser settings to notify you when you receive a cookie, which lets you choose whether or not to accept it; or') }}
                            </li>
                            <li class="flex mt-2"><i
                                    class="uil uil-arrow-right text-green-600 align-middle me-2"></i>{{ __('Set your browser to automatically not accept any cookies.') }}
                            </li>
                        </ul>
                        <p class="text-slate-400 py-1">
                            {{ __('For more information on how we handle personal information please refer to our') }}
                            <a href="{{ route('privacy_policy') }}"
                                class="text-green-600 font-bold">{{ __('Privacy Policy') }}</a>.
                        </p>

                        <p class="text-slate-400 pt-3">
                            {{ __('If you have any further questions, comments or requests regarding our Cookie Notice or how we use cookies on our site, please contact us at') }}
                            <a href="mailto:contact@getstake.com"
                                class="text-green-600 font-bold">contact@getstake.com</a>.
                        </p>
                    </div>
                </div><!--end -->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Cookies Notice -->
</x-website-layout>
