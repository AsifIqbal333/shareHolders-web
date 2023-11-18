<section class="w-full m-auto relative py-3">
    <div class="flex justify-between">
        <h1 class="text-3xl font-semibold">{{ __('Cart') }} ({{ $carts->count() }})</h1>
        <a href="{{ route('properties.index') }}"
            class="btn bg-white hover:bg-green-700 hover:text-white text-black rounded-md text-lg transition duration-300 ease-out">
            <span>
                <i class="fas fa-plus pr-1" style="font-size: 15px;"></i>
                {{ __('Add More') }}</span>
        </a>
    </div>

    {{-- cart items and total --}}
    <div class="flex flex-col lg:flex-row gap-3 mt-5">
        @if ($carts->count() > 0)
            <div class="w-full lg:[65%] space-y-3">
                @foreach ($carts as $index => $item)
                    <div wire:key="{{ $item->id }}"
                        class="group rounded-lg bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 p-4">
                        <div class="flex flex-col xl:flex-row items-center">
                            {{-- image and details --}}
                            <div class="flex flex-col sm:flex-row gap-4">
                                <img src="{{ $item->property?->images?->first()?->file }}"
                                    alt="{{ $item->property?->name }}" class="w-36 h-24 object-cover rounded-md">
                                <div class="">
                                    <h3 class="text-lg font-semibold">{{ $item->property?->name }}</h3>
                                    <div class="flex xl:flex-col gap-4">
                                        <div class="">
                                            <div class="flex items-center gap-1">
                                                <span class="text-gray-600 text-lg">{{ __('Monthly rent') }}</span>
                                                <span data-tooltip-target="monthly_rent" class="text-gray-600">
                                                    <i class="far fa-question-circle" style="font-size: 13px;"></i>
                                                </span>
                                                <div id="monthly_rent" role="tooltip"
                                                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-md font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                                    {{ __('Monthly rent is a projected average and can vary depending on maintenance requirements and occupancy status') }}
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>

                                            <h4 class="text-md font-semibold">
                                                ${{ number_format(monthly_rent($item->property, $item->amount), 2) }}
                                            </h4>
                                        </div>

                                        <div class="">
                                            <div class="flex items-center gap-1">
                                                <span class="text-gray-600 text-lg">{{ __('Appreciation') }}</span>
                                                <span data-tooltip-target="appreciation" class="text-gray-600">
                                                    <i class="far fa-question-circle" style="font-size: 13px;"></i>
                                                </span>
                                                <div id="appreciation" role="tooltip"
                                                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-md font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                                    {{ __('Capital appreciation projections are based on a 5 year holding period') }}
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>

                                            <h4 class="text-md font-semibold">
                                                ${{ currency_format(appreciation($item->property, $item->amount)) }}
                                            </h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- price and funded --}}
                            <div class="flex flex-col mt-3">
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="text-gray-700 hover:text-white border border-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-0 font-medium rounded-lg text-3xl px-4 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-gray-600 "
                                        wire:click="changeInvestment('{{ $item->id }}',-1000)"> - </button>

                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-currency-dollar w-4 h-4"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                            </svg>
                                        </div>
                                        <input type="number" id="input-group-1"
                                            class="border bg-white border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-gray-50 focus:border-gray-500 block w-full pl-10 p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-50 dark:focus:border-gray-50"
                                            readonly value="{{ $item->amount }}" />
                                    </div>

                                    <button type="button"
                                        class="text-gray-700 hover:text-white border border-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-0 font-medium rounded-lg text-3xl px-4 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-gray-600"
                                        wire:click="changeInvestment('{{ $item->id }}',1000)">+</button>
                                </div>

                                @php
                                    $funded = funded($item->property->investments->sum('amount'), $item->property->price);
                                @endphp
                                <div class="flex flex-col w-full mt-5">
                                    <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700 mb-1">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ $funded }}%">
                                        </div>
                                    </div>
                                    <span class="text-sm">{{ $funded }}% {{ __('funded') }}</span>
                                </div>
                            </div>
                        </div>
                        <button type="button"
                            class="mt-4 inline-flex items-center px-3 py-1 text-lg font-medium text-red-900 bg-transparent border border-red-900 rounded-lg hover:bg-red-900 hover:text-white focus:z-999 focus:ring-2 focus:ring-red-500 focus:bg-red-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-red-700 dark:focus:bg-red-700"
                            wire:click="deleteItem('{{ $item->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash3 w-3.5 h-3.5 mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg>
                            {{ __('Remove') }}
                        </button>
                    </div>
                @endforeach
            </div>
            @php
                $total = $carts->sum('amount');
            @endphp
            <div
                class="group rounded-lg bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 h-full w-full lg:w-[35%] p-5 pb-8 sticky top-16">
                <div class="flex justify-between items-center font-semibold text-xl">
                    <h2>{{ __('Total') }}</h2>
                    <h2>${{ currency_format($total) }}</h2>
                </div>

                {{-- checkout types --}}
                <div class="flex flex-col mt-4">
                    @foreach ($types as $value => $type)
                        @php
                            if ($value === 'wallet' && $wallet->cash_balance < $total) {
                                $is_disable = true;
                            } elseif ($value === 'reward' && $wallet->reward_balance < $total) {
                                $is_disable = true;
                            } else {
                                $is_disable = false;
                            }

                        @endphp
                        @if ($value === 'wallet')
                        @else
                        @endif
                        <div class="flex items-center mb-4">
                            <input {{ $is_disable ? 'disabled' : '' }} id="{{ $value }}" type="radio"
                                name="default-radio" value="{{ $value }}" wire:model.live="charge_type"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 checked:bg-green-500">
                            <label for="{{ $value }}"
                                class="ml-2 text-sm font-medium  {{ $is_disable ? 'text-gray-400 dark:text-gray-500' : 'text-gray-900 dark:text-gray-300' }}  pt-1">{{ $type }}</label>
                        </div>
                    @endforeach

                </div>

                <button type="button"
                    class="text-sm text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mt-7 w-full disabled:opacity-60 disabled:cursor-not-allowed"
                    wire:click="checkout" wire:target="checkout" wire:loading.attr="disabled"
                    {{ !$charge_type ? 'disabled' : '' }}>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart-check w-5 h-5 mr-2" viewBox="0 0 16 16">
                        <path
                            d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                        <path
                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                    {{ __('Proceed to Payment') }}
                </button>
            </div>
        @endif

    </div>

</section>
