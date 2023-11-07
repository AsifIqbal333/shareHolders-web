<x-website-layout>
    <!-- Start Hero -->
    <section class="relative table w-full py-32 lg:py-36 bg-no-repeat bg-center bg-cover"
        style="background-image: url('{{ asset('assets/images/bg/01.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">
                    {{ __('Key Risks') }}</h3>
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

    <!-- Start Key Risks -->
    <section class="relative lg:py-24 py-16">
        <div class="container">
            <div class="md:flex justify-center">
                <div class="md:w-3/4">
                    <div class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                        <h5 class="text-xl font-medium mb-4">{{ __('No Guarantee') }}</h5>
                        <p class="text-slate-400">
                            {{ __('Past performance is no guarantee of future returns. Any historical performance, expected returns or projected figures may not result in actual future performance. Your capital is at risk and is not guaranteed.') }}
                        </p>

                        <h5 class="text-xl font-medium mb-4 mt-8">{{ __('Term and Liquidity') }}</h5>
                        <p class="text-slate-400">
                            {{ __('Investments offered by Stake are intended to be held until the end of the Investment Period of 5 Years and are not listed. We provide a Secondary Transfer Facility (referred to as “Exit Window”) on the platform where you can sell your investment before the end of the recommended term. A Secondary Transfer Facility on Stake is only available for 2 weeks at a time, twice a year. Therefore, you may not be able to exit early from your investment, and as such it is likely to be an illiquid investment. Please do not make an investment with Stake if your intention is not to hold the investment for the recommended term. Even with a Secondary Transfer Facility available on Stake, there is still no guarantee that you will be able to sell your investment.”') }}
                        </p>

                        <h5 class="text-xl font-medium mb-4 mt-8">{{ __('Risk Warning') }}</h5>
                        <p class="text-slate-400">
                            {{ __('Investment in real estate is speculative. Investors through Stake will not directly own the property, rather they will have a share in a private special purpose vehicle owning the property. The value of your investments may experience losses and anticipated returns may not materialize as forecasted. In addition, you may experience delays in being paid from rental income or it may be difficult to sell the property at the end ofthe investment period. In some cases, there may be government restrictions on the sale of a property to foreign owners, which may restrict the range of potential buyers. Stake offers investments that are materially different than direct, outright ownership of property, investments in real estate funds, REITs or other securities or interests. If Stake ceases to carry on its business, you may experience losses, incur costs and/or delays in being paid. Using credit or borrowed monies to invest on Stake carries a greater risk as even if your investment declines in value, you will still need to meet your repayment obligations.') }}
                        </p>

                        <h5 class="text-xl font-medium mb-4 mt-8">{{ __('No Advice') }}</h5>
                        <p class="text-slate-400">
                            {{ __('Stake operates a real estate investment platform and administers private vehicles holding title to property on behalf of investors. Stake is not an investment advisor nor a property manager. We do not provide any investment or other advice. Investors must do their own due diligence before investing and/or consult with an independent financial advisor. In evaluating investment opportunities, we use data provided from third parties which we believe to be reliable. However, we cannot guarantee the accuracy or completeness of such data.') }}
                        </p>
                    </div>
                </div><!--end -->
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Key Risks -->
</x-website-layout>
