<section class="w-full m-auto relative py-3">
    <h1 class="text-3xl font-semibold">{{ __('Properties') }}</h1>
    <!-- show cetegories  -->
    <div class="grid grid-cols-1">
        <div class="subcribe-form z-1">
            <ul
                class="inline-block mx-auto sm:w-fit w-full flex-wrap justify-center text-center p-1.5 bg-white dark:bg-slate-900 backdrop-blur-sm rounded-xl border-b dark:border-gray-800 mt-7">
                @foreach ($statuses as $item)
                    <li role="presentation" class="inline-block" wire:click="changeStatus('{{ $item }}')">
                        <button
                            class="sm:px-8 px-6 py-1.5 text-base font-medium rounded-xl w-full  transition-all duration-500 ease-in-out capitalize {{ $status === $item ? 'bg-green-600 text-white' : '' }}"
                            type="button">{{ $item }}</button>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

    <!-- showing properties  -->
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
        @foreach ($properties as $property)
            <div
                class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                <a href="{{ route('properties.show', $property) }}">

                    <div class="relative">
                        <img src="{{ $property->images?->first()?->file }}" alt="{{ $property->name }}">
                    </div>

                    <div class="p-6">
                        <div class="mb-3 flex flex-wrap gap-2">
                            <div class="border p-0.5 rounded flex items-center content-center px-1 gap-1">
                                <x-dynamic-component component="flag-country-{{ $property->country?->code }}"
                                    class="w-4 h-4 rounded-full" />
                                <span class="text-sm">{{ $property->city?->name }}</span>
                            </div>
                            @if ($property->category)
                                <div class="border p-0.5 rounded flex items-center content-center px-1 gap-1">
                                    <span class="text-sm">{{ $property->category?->name }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="pb-2.5">
                            <a href="{{ route('properties.show', $property) }}"
                                class="text-lg hover:text-green-600 font-semibold ease-in-out duration-500">{{ $property->name }}</a>

                            <h3 class="text-2xl font-bold text-green-500 my-2">${{ currency_format($property->price) }}
                            </h3>
                            <div class="d-flex flex-column">
                                @php
                                    $funded = funded($property->investments_sum_amount, $property->price);
                                @endphp
                                <div class="h-[8px] bg-gray-100 rounded mb-1">
                                    <div class="bg-green-400 rounded h-[8px]" role="progressbar"
                                        style="width: {{ $funded }}%;" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>

                                <span class="text-sm">{{ $funded }}%
                                    funded</span>
                            </div>
                        </div>

                        <div class="bg-gray-200/50 border rounded-md p-3">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-500">{{ __('Annualised return') }}</span>
                                <h4 class="font-semibold">{{ $property->annual_return }}%</h4>
                            </div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-500">{{ __('Annual appreciation') }}</span>
                                <h4 class="font-semibold">{{ $property->annual_appreciation }}%</h4>
                            </div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-500">{{ __('Projected gross yield') }}</span>
                                <h4 class="font-semibold">{{ $property->gross_yield }}%</h4>
                            </div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-gray-500">{{ __('Projected net yield') }}</span>
                                <h4 class="font-semibold">{{ $property->net_yield }}%</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</section>
