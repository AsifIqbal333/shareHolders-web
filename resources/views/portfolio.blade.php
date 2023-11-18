<x-app-layout>
    <section class="w-full m-auto relative py-3 sm:px-3 lg:px-5">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Portfolio') }}</h1>
        </div>

        <x-flash-message />

        <div
            class="mt-7 rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
            <div class="flex justify-between items-center px-8 py-4">
                <div class="flex flex-col gap-5">
                    <div class="flex items-center gap-2">
                        <h4 class="text-xl text-gray-500 font-normal capitalize">{{ __('Portfolio value') }}</h4>
                        <span data-tooltip-target="portfolio-tooltip" class="mt-0.5">
                            <i class="far fa-question-circle text-sm text-gray-400"></i>
                        </span>
                        <div id="portfolio-tooltip" role="tooltip"
                            class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                            <p>{{ __('The total value of your pending investments, cash balance, and all of your Stakes (based on the latest valuation of the properties.') }}
                            </p>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <h2 class="text-4xl font-bold">${{ currency_format(0) }}</h2>
                </div>
            </div>
        </div>

        {{-- Key financials --}}
        <div class="my-12">
            <h2 class="text-2xl font-semibold mb-3">{{ __('Key financials') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-3 gap-[30px]">
                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="px-8 py-6 flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="text-green-400"><i class="fas fa-hryvnia"
                                    style="font-size: 1.5rem;"></i></span>
                            <h3 class="text-2xl font-semibold">${{ currency_format(0) }}</h3>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <p class="text-sm text-gray-500 font-normal capitalize">{{ __('Monthly income') }}</p>
                                <span data-tooltip-target="monthly-income-tooltip" class="mt-0.5">
                                    <i class="far fa-question-circle text-sm text-gray-400"></i>
                                </span>
                                <div id="monthly-income-tooltip" role="tooltip"
                                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                    <p>{{ __('This displays the most recent rental income deposited into your Stake wallet. Please note that this figure may vary due to various factors such as occupancy levels, temporary rental cupancy levels, temporary rental pauses for maintenance or vacancy, changes in rental agreements, etc.') }}
                                    </p>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 font-normal">{{ now()->subMonth()->format('M Y') }}</p>
                        </div>
                    </div>
                </div>

                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="px-8 py-6 flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="text-green-400"><i class="fab fa-monero" style="font-size: 1.5rem;"></i></span>
                            <h3 class="text-2xl font-semibold">${{ currency_format(0) }}</h3>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <p class="text-sm text-gray-500 font-normal capitalize">{{ __('Total income') }}</p>
                                <span data-tooltip-target="total-income-tooltip" class="mt-0.5">
                                    <i class="far fa-question-circle text-sm text-gray-400"></i>
                                </span>
                                <div id="total-income-tooltip" role="tooltip"
                                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                    <p>{{ __('The total amount of income paid into your Stake wallet from monthly rent received and any realised gains from properties sold.') }}
                                    </p>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 font-normal">{{ __('as of') }}
                                {{ now()->subMonth()->format('M Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="px-8 py-6 flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="text-green-400"><i class="fas fa-chart-line"
                                    style="font-size: 1.5rem;"></i></span>
                            <h3 class="text-2xl font-semibold">${{ currency_format(0) }}</h3>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <p class="text-sm text-gray-500 font-normal capitalize">
                                    {{ __('Capital appreciation') }}</p>
                                <span data-tooltip-target="capital-tooltip" class="mt-0.5">
                                    <i class="far fa-question-circle text-sm text-gray-400"></i>
                                </span>
                                <div id="capital-tooltip" role="tooltip"
                                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                    <p>{{ __('Unrealised gains or losses from the latest valuations of the owned properties in your portfolio.') }}
                                    </p>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 font-normal">
                                {{ now()->subMonth()->format('M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick insights --}}
        <div class="my-12">
            <h2 class="text-2xl font-semibold mb-3">{{ __('Quick insights') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-3 gap-[30px]">
                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="px-8 py-6 flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="text-green-400"><i class="fas fa-home" style="font-size: 1.5rem;"></i></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <p class="text-sm text-gray-500 font-normal capitalize">
                                    {{ __('Number of properties') }}</p>
                            </div>
                            <h3 class="text-2xl font-semibold">
                                {{ request()->user()->investments()?->select(['property_id'])->get()?->unique('property_id')?->count() ?? 0 }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="px-8 py-6 flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="text-green-400"><i class="fas fa-calendar-alt"
                                    style="font-size: 1.5rem;"></i></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <p class="text-sm text-gray-500 font-normal capitalize">
                                    {{ __('Portfolio occupancy') }}</p>
                                <span data-tooltip-target="property-occupy-tooltip" class="mt-0.5">
                                    <i class="far fa-question-circle text-sm text-gray-400"></i>
                                </span>
                                <div id="property-occupy-tooltip" role="tooltip"
                                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                    <p>{{ __('This is the percentage of your properties that are currently generating income. In some cases a property will temporarily stop generating income, and the reason will be detailed on the property page in your Stake portfolio.') }}
                                    </p>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <h3 class="text-2xl font-semibold">0%</h3>
                        </div>
                    </div>
                </div>

                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <div class="px-8 py-6 flex flex-col gap-4">
                        <div class="flex items-center justify-between">
                            <span class="text-green-400"><i class="fas fa-chart-bar"
                                    style="font-size: 1.5rem;"></i></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <p class="text-sm text-gray-500 font-normal capitalize">
                                    {{ __('Annualised rental yield') }}</p>
                                <span data-tooltip-target="annual-rent-tooltip" class="">
                                    <i class="far fa-question-circle text-sm text-gray-400"></i>
                                </span>
                                <div id="annual-rent-tooltip" role="tooltip"
                                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                    <p>{{ __('Your portfolio’s annualised rental yield % is based on the realised rental income that you’ve received from all of your properties over the past 12 months.') }}
                                    </p>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <h3 class="text-2xl font-semibold">0%</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- my Stakes --}}
        <div class="my-12">
            <h2 class="text-2xl font-semibold mb-3">{{ __('My Stakes') }}</h2>
            @livewire('user-properties')
        </div>
    </section>

</x-app-layout>
