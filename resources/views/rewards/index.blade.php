<x-app-layout>

    <section class="w-full m-auto relative py-3 sm:px-3 lg:px-5">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Rewards') }}</h1>
        </div>

        <x-flash-message />

        <div class="grid md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            <x-referral-balance :total_rewards="$total_rewards" :show_link="true" />

            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <div class="px-8 py-4 flex flex-col justify-center gap-4">
                    <div class="flex justify-between">
                        <div class="flex items-center gap-2">
                            <span class="text-green-500"><i class="fas fa-database"></i></span>
                            <h4 class="text-lg text-gray-500 font-normal capitalize">{{ __('Cashback') }}</h4>
                            <span data-tooltip-target="cashback-tooltip" class="">
                                <i class="far fa-question-circle text-sm text-gray-400"></i>
                            </span>
                            <div id="cashback-tooltip" role="tooltip"
                                class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                {{ __('This is the lifetime cashback earned through your investments.') }}
                                <p class="mt-2">
                                    {{ __('Cashback is credited to your rewards balance and can be used towards future investments, but cannot be withdrawn.') }}
                                </p>
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <h2 class="text-xl font-bold">${{ currency_format(0) }}</h2>
                    </div>

                    <div class="flex justify-between">
                        <div class="flex items-center gap-2">
                            <span class="text-green-500"><i class="far fa-user"></i></span>
                            <h4 class="text-lg text-gray-500 font-normal capitalize">{{ __('Referrals') }}</h4>
                            <span data-tooltip-target="referrals-tooltip" class="">
                                <i class="far fa-question-circle text-sm text-gray-400"></i>
                            </span>
                            <div id="referrals-tooltip" role="tooltip"
                                class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                {{ __('This is lifetime amount earned by inviting friends on app.') }}
                                <p class="mt-2">
                                    {{ __('Share your unique referral code to win even more rewards!') }}
                                </p>
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <h2 class="text-xl font-bold">${{ currency_format($total_rewards) }}</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- second layer --}}
        <div class="grid md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 h-40">
                <div class="px-8 py-4">
                    <a href="{{ route('rewards.tiers') }}">
                        <x-tier-info :show_icon="true" />
                    </a>
                </div>
            </div>

            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <div class="px-8 py-4">
                    <a href="{{ route('rewards.referrals') }}">
                        <div class="border-b pb-5">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-xl font-bold text-gray-800 capitalize">{{ __('Refer and earn') }}
                                </h4>
                                <span><i class="fas fa-chevron-right"></i></span>
                            </div>

                            <p>{{ __('Invite your friends and you’ll both receive a rewards balance to invest in our properties!') }}
                            </p>
                        </div>


                        <ul class="space-y-4 text-left text-gray-600 dark:text-gray-400 pt-4">
                            <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                                <span>{{ __('Friends get ') }} <span class="font-bold">${{ referal_reward() }}</span>
                                    {{ __(' upon signing up') }}</span>
                            </li>

                            <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                </svg>
                                <span>{{ __('You get ') }} <span
                                        class="font-bold">${{ auth()->user()->user_info?->tier?->referral_reward }}</span>
                                    {{ __(' after they invest ') }} <span
                                        class="font-bold">${{ currency_format(investment_for_reward()) }}</span>
                                </span>
                            </li>
                        </ul>
                    </a>
                    <x-referral-link />
                </div>
            </div>
        </div>

    </section>

</x-app-layout>
