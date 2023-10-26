<x-website-layout>
    <style>
        .cutom-grid {
            display: grid !important;
            grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
        }

        @media (min-width: 540px) {
            .cutom-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }
        }

        @media (min-width: 768px) {
            .cutom-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
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
                    {{ __('About Us') }}</h3>
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
    <section class="relative lg:py-24 py-16">
        <!-- About -->
        <x-website.homepage.about />

        <!-- About Real State -->
        <div class="container lg:mt-24 mt-16 lg:pt-24 pt-16">
            <div class="absolute inset-0 opacity-25 dark:opacity-50 bg-no-repeat bg-center bg-cover"
                style="background-image: url('{{ asset('assets/images/map.png') }}');"></div>
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="md:col-span-5">
                    <div class="relative">
                        <h4
                            class="mb-6 text-2xl md:text-3xl lg:text-[2.75rem] lg:leading-normal leading-normal font-extrabold">
                            {{ __('We’re creating a world where real estate is fully digital, accessible, borderless and liquid.') }}
                        </h4>
                    </div>
                </div><!--end col-->

                <div class="md:col-span-7">
                    <div class="lg:ms-4">
                        <p class="text-slate-800 max-w-xl text-lg pb-3">
                            {{ __('Real estate is one the most important asset class to own in order to build long-term wealth, but it’s highly inaccessible, illiquid, and complicated. There’s tonnes of paperwork, large down payment requirements, and the market is completely illiquid. On top of that, great deals take a lot of time and connections to secure.') }}
                        </p>

                        <p class="text-slate-800 max-w-xl text-lg pb-3">
                            {{ __('ShareHolder is a digital real estate investment platform, built to change this. We leverage our network and expertise, built up over 20+ years leading the biggest real estate companies in Dubai, to source the best properties in our markets, and break down the entry barrier for investors to only AED 500 (c. 136 USD). The rest is on us - we manage your all of your investments, from acquisition to exit, and distribute monthly rental payments and sales income directly to your ShareHolder wallet.') }}
                        </p>

                        <p class="text-slate-800 max-w-xl text-lg">
                            {{ __('With ShareHolder, you can start building a global real estate portfolio in minutes, and start generating lifetime passive income to support the life you deserve.') }}
                        </p>

                    </div>
                </div><!--end col-->
            </div><!--end grid-->

            <div class="relative cutom-grid items-center mt-8 gap-[30px] z-1">
                <div class="counter-box text-center">
                    <h1 class="lg:text-5xl text-4xl font-semibold mb-2 text-green-600">2023</h1>
                    <h5 class="counter-head text-lg font-medium ">{{ __('Year Made') }}</h5>
                </div><!--end counter box-->

                <div class="counter-box text-center">
                    <h1 class="lg:text-5xl text-4xl font-semibold mb-2 text-green-600"><span class="counter-value"
                            data-target="1548">1010</span>+</h1>
                    <h5 class="counter-head text-lg font-medium ">{{ __('Properties Sell') }}</h5>
                </div><!--end counter box-->

                <div class="counter-box text-center">
                    <h1 class="lg:text-5xl text-4xl font-semibold mb-2 text-green-600"><span class="counter-value"
                            data-target="25">2</span>+</h1>
                    <h5 class="counter-head text-lg font-medium ">{{ __('Award Gained') }}</h5>
                </div><!--end counter box-->

                <div class="counter-box text-center">
                    <h1 class="lg:text-5xl text-4xl font-semibold mb-2 text-green-600"><span class="counter-value"
                            data-target="9">0</span>+</h1>
                    <h5 class="counter-head text-lg font-medium ">{{ __('Years Experience') }}</h5>
                </div><!--end counter box-->
            </div>
        </div><!--end container-->

        <!-- How It Works -->
        <x-website.homepage.works />
    </section>
    <!--end section-->

    <!-- Start -->
    <x-website.team />
    <!-- End -->

    <!-- Start -->
    <section class="relative lg:pt-28 lg:pb-12 pt-16 pb-8">
        <div class="container">
            <div class="grid grid-cols-1 pb-8 ">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold text-center">
                    {{ __('Responsible Investing') }}
                </h3>

                <p class="text-slate-500 max-w-3xl mx-auto text-lg pb-3">
                    {{ __('ShareHolders has recently been assessed by the Supervisory Board of ') }} <a
                        href="http://www.guidancefinancial.com" target="_blank"
                        class="text-green-600 font-semibold">{{ __('Guidance Financial Group') }}</a>{{ __(', a leading financial services firm specialized in the fields of Shariah-compliant investments and financing as well as Shariah advisory services.') }}
                </p>
                <p class="text-slate-500 max-w-3xl mx-auto text-lg">
                    {{ __('We have submitted an application to our regulator, the DFSA, for an Islamic Window endorsement on our license. Should we receive approval, we will then be allowed to offer Shariah-compliant Islamic Financial Business through the Islamic Window alongside the conventional business that we currently carry out.') }}
                </p>
            </div><!--end grid-->
            <div
                class="max-w-3xl mx-auto flex items-center justify-between border border-slate-300 rounded-lg p-3 mb-5">
                <div class="flex">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.5 13.5V12H18v7.5h1.5v-3h2.25V15H19.5v-1.5h3Zm-8.25 6h-3V12h3a2.252 2.252 0 0 1 2.25 2.25v3a2.252 2.252 0 0 1-2.25 2.25Zm-1.5-1.5h1.5a.75.75 0 0 0 .75-.75v-3a.75.75 0 0 0-.75-.75h-1.5V18Zm-4.5-6H4.5v7.5H6v-2.25h2.25a1.502 1.502 0 0 0 1.5-1.5V13.5a1.501 1.501 0 0 0-1.5-1.5ZM6 15.75V13.5h2.25v2.25H6Z"
                            fill="#A3ABBA"></path>
                        <path
                            d="M16.5 10.5v-3a.684.684 0 0 0-.225-.525l-5.25-5.25A.682.682 0 0 0 10.5 1.5H3A1.504 1.504 0 0 0 1.5 3v18A1.5 1.5 0 0 0 3 22.5h12V21H3V3h6v4.5A1.504 1.504 0 0 0 10.5 9H15v1.5h1.5Zm-6-3V3.3l4.2 4.2h-4.2Z"
                            fill="#A3ABBA"></path>
                    </svg>
                    <p class="text-slate-500 text-lg" style="margin-left: 0.25rem">
                        {{ __('Assessment Results from Guidance Financial Group') }}
                    </p>
                </div>
                <a href="javascript:void(0)" class="text-green-600 font-semibold">{{ __('Download') }}</a>
            </div>

            <div
                class="max-w-3xl mx-auto flex items-center justify-between border border-slate-300 rounded-lg p-3 mb-3">
                <div class="flex">
                    <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.5 13.5V12H18v7.5h1.5v-3h2.25V15H19.5v-1.5h3Zm-8.25 6h-3V12h3a2.252 2.252 0 0 1 2.25 2.25v3a2.252 2.252 0 0 1-2.25 2.25Zm-1.5-1.5h1.5a.75.75 0 0 0 .75-.75v-3a.75.75 0 0 0-.75-.75h-1.5V18Zm-4.5-6H4.5v7.5H6v-2.25h2.25a1.502 1.502 0 0 0 1.5-1.5V13.5a1.501 1.501 0 0 0-1.5-1.5ZM6 15.75V13.5h2.25v2.25H6Z"
                            fill="#A3ABBA"></path>
                        <path
                            d="M16.5 10.5v-3a.684.684 0 0 0-.225-.525l-5.25-5.25A.682.682 0 0 0 10.5 1.5H3A1.504 1.504 0 0 0 1.5 3v18A1.5 1.5 0 0 0 3 22.5h12V21H3V3h6v4.5A1.504 1.504 0 0 0 10.5 9H15v1.5h1.5Zm-6-3V3.3l4.2 4.2h-4.2Z"
                            fill="#A3ABBA"></path>
                    </svg>
                    <p class="text-slate-500 text-lg" style="margin-left: 0.25rem">
                        {{ __('Shariah Audit FY 2022 Certification Letter for Stake') }}
                    </p>
                </div>
                <a href="javascript:void(0)" class="text-green-600 font-semibold">{{ __('Download') }}</a>
            </div>
        </div>
    </section>
    <!-- End -->


    <!-- Testimonial Start -->
    <x-website.testimonials :testimonials="$testimonials" />
    <!-- Testimonial End -->

</x-website-layout>
