<x-app-layout>

    <section class="w-full m-auto relative py-3 sm:px-3 lg:px-5">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Referrals') }}</h1>
        </div>
        <x-flash-message />

        <div class="grid md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            <div class="flex flex-col gap-8">
                <x-referral-balance :total_rewards="$total_rewards" />

                <div class="flex flex-col md:flex-row md:justify-between gap-4">
                    <div
                        class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 w-60">
                        <div class="px-8 py-5 flex items-center gap-4">
                            <span class="text-green-500">
                                <i class="far fa-user" style="font-size: 1.5rem;"></i>
                            </span>
                            <div class="">
                                <h2 class="text-2xl font-semibold">{{ $referral_users }}</h2>
                                <p class="text-md text-gray-500 font-normal capitalize">{{ __('Registered') }}</p>
                            </div>

                        </div>
                    </div>

                    <div
                        class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 w-60">
                        <div class="px-8 py-5 flex items-center gap-4">
                            <span class="text-green-500">
                                <i class="fas fa-coins" style="font-size: 1.5rem;"></i>
                            </span>
                            <div class="">
                                <h2 class="text-2xl font-semibold">${{ currency_format($referral_users_investments) }}
                                </h2>
                                <p class="text-md text-gray-500 font-normal capitalize">{{ __('Invested') }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <div class="px-8 py-4 flex flex-col gap-3">
                    <div class="flex justify-between items-center">
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold mb-2">{{ __('Step 1') }}</h2>
                            <p class="text-gray-700">{{ __('Copy or share your referral link') }}</p>
                        </div>
                        <div class="h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="far fa-copy"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold mb-2">{{ __('Step 2') }}</h2>
                            <p class="text-gray-700">
                                {{ __('Your friends get') }} <span
                                    class="font-semibold text-black">${{ referal_reward() }}</span>
                                {{ __('when they join and complete onboarding') }}
                            </p>
                        </div>
                        <div class="h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="far fa-user"></i>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold mb-2">{{ __('Step 3') }}</h2>
                            <p class="text-gray-700">
                                {{ __('You get') }} <span
                                    class="font-semibold text-black">${{ auth()->user()->user_info?->tier?->referral_reward }}</span>
                                {{ __('when they invest ') }} <span
                                    class="font-semibold text-black">${{ currency_format(investment_for_reward()) }}</span>
                                {{ __('or more') }}
                            </p>
                        </div>
                        <div class="h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house-door" viewBox="0 0 16 16">
                                <path
                                    d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z" />
                            </svg>
                        </div>
                    </div>

                    <x-referral-link />
                </div>
            </div>


        </div>

    </section>

</x-app-layout>
