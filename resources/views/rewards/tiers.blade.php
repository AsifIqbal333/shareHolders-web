<x-app-layout>

    <section class="w-full m-auto relative py-3 sm:px-3 lg:px-5">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Tier') }}</h1>
        </div>
        <x-flash-message />

        <div class="grid md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 h-40">
                <div class="px-8 py-4">
                    <x-tier-info />
                </div>
            </div>

            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <div class="px-8 py-4">

                    <ol class="relative border-s border-gray-200 dark:border-gray-700">
                        @foreach ($tiers as $ind => $tier)
                            @php
                                $currenct_tier = auth()->user()->user_info?->tier_id == $tier->id;
                            @endphp
                            <li class="mb-10 ms-4">
                                <div
                                    class="absolute w-4 h-4 rounded-full mt-1.5 -start-2 border border-white dark:border-gray-900 dark:bg-gray-700 {{ $currenct_tier ? 'bg-green-400' : 'bg-gray-200' }}">
                                </div>

                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                                        {{ $tier->name }}</h3>
                                    @if (!$currenct_tier)
                                        @if ($ind != 0)
                                            <div class="flex items-center gap-1 text-gray-300">
                                                <span class="mr-2"><i class="fas fa-lock"></i></span>
                                                <span>${{ currency_format($tier->starting) }}</span>
                                                <span>{{ __('to unlock') }}</span>
                                            </div>
                                        @endif
                                    @endif
                                </div>

                                <p class="mb-2 text-base font-normal text-gray-500 dark:text-gray-200">
                                    ${{ $tier->referral_reward }}
                                    {{ __('for every qualified referral') }}</p>
                                @if ($tier->cashback !== 0)
                                    <p class="mb-2 text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ $tier->cashback }}%
                                        {{ __('cashback on every investment') }}</p>
                                @endif

                            </li>
                        @endforeach

                    </ol>


                </div>
            </div>
        </div>

    </section>

</x-app-layout>
