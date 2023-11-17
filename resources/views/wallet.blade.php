<x-app-layout>
    @php
        $wallet = auth()->user()->wallet;
    @endphp
    <section class="w-full m-auto relative py-3 sm:px-3 lg:px-5">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Wallet') }}</h1>
        </div>

        @if (!$wallet->completed_stripe_onboarding)
            {{-- deposite or --}}
            <div class="p-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 -mb-5 mt-3"
                role="alert">{{ __('Please add a bank account to withdraw balance') }}
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 -mb-5 mt-8"
                role="alert">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="p-4 text-md text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 -mb-5 mt-8"
                role="alert">{{ session('success') }}</div>
        @endif

        <div class="grid md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <div class="flex justify-between items-center px-8 py-4">
                    <div class="flex flex-col gap-5">
                        <h4 class="text-xl text-gray-500 font-normal capitalize">{{ __('Cash balance') }}</h4>
                        <h2 class="text-4xl font-bold">${{ currency_format($wallet->cash_balance) }}</h2>
                    </div>
                    <div class="flex flex-col gap-3">
                        <button type="button" data-modal-target="deposit-modal" data-modal-toggle="deposit-modal"
                            class="text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-md px-5 py-1.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 disabled:cursor-not-allowed disabled:opacity-60"
                            {{ !$wallet->completed_stripe_onboarding ? 'disabled' : '' }}>{{ __('Deposit') }}</button>

                        <button type="button" data-modal-target="withdraw-modal" data-modal-toggle="withdraw-modal"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-md px-5 py-1.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 disabled:cursor-not-allowed disabled:opacity-60"
                            {{ !$wallet->completed_stripe_onboarding ? 'disabled' : '' }}>{{ __('Withdraw') }}</button>
                    </div>
                </div>
            </div>

            <div
                class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <div class="flex justify-between items-center px-8 py-4">
                    <div class="flex flex-col gap-5">
                        <div class="flex items-center gap-1">
                            <h4 class="text-xl text-gray-500 font-normal capitalize">{{ __('Rewards balance') }}</h4>
                            <span data-tooltip-target="tooltip-default" class="mt-1">
                                <i class="far fa-question-circle text-sm text-gray-400"></i>
                            </span>
                            <div id="tooltip-default" role="tooltip"
                                class="absolute z-10 invisible inline-block w-80 px-3 py-2 text-md font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                {{ __('This number shows your current rewards balance. It includes all cashback rewards earned from purchases, referral bonuses, and any other promotional rewards that have not been redeemed yet. This balance can be used to invest in new properties but cannot be withdrawn as cash.') }}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <h2 class="text-4xl font-bold">${{ currency_format($wallet->reward_balance) }}</h2>
                    </div>
                    <div class="flex flex-col text-green-400">
                        <i class="far fa-star" style="font-size: 4rem;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- transactions --}}
        <div class="my-12">
            <h2 class="text-2xl font-semibold mb-3">{{ __('Transactions') }}</h2>
            @livewire('transactions')
        </div>

        {{-- add bank account --}}
        <div class="grid md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            <div class="">
                <h2 class="text-2xl font-semibold mb-3">{{ __('Bank') }}</h2>
                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 px-8 py-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span><i class="fas fa-university text-3xl"></i></span>
                        <p class="text-base font-medium">{{ __('Add a bank account to withdraw') }}</p>
                    </div>
                    <a href="{{ route('stripe.onboarding') }}"
                        class="text-gray-700 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-md px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 disabled:cursor-not-allowed disabled:opacity-60">
                        <i class="fas fa-plus text-xs mr-1"></i>
                        {{ __('Add a bank account') }}
                    </a>
                </div>

            </div>
        </div>

        <!-- Deposit Model -->
        <div id="deposit-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            {{ __('Deposit Balance') }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="deposit-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <form action="{{ route('wallet.deposit') }}" method="post">
                            @csrf
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="amount" id="amount"
                                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                    placeholder=" " required />
                                <label for="amount"
                                    class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Enter deposit amount') }}</label>
                            </div>
                            <button type="submit"
                                class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">{{ __('Deposit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Withdraw Model -->
        <div id="withdraw-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            {{ __('Withdraw Funds') }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="withdraw-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <form action="{{ route('wallet.withdraw') }}" method="post">
                            @csrf
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="amount" id="amount"
                                    class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                                    placeholder=" " min="1" max="{{ $wallet->cash_balance }}" required />
                                <label for="amount"
                                    class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Enter withdraw amount') }}</label>
                            </div>
                            <button type="submit"
                                class="btn bg-green-600 hover:bg-green-700 text-white rounded-md mt-3">{{ __('Withdraw') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
