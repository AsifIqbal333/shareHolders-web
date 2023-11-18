<x-app-layout>

    <section class="relative md:pb-24 pb-16">
        <!--bookmark button-->
        @livewire('bookmark', ['property' => $property])

        <div class="container-fluid">
            <div class="flex flex-col md:flex-row mt-4">
                <div class="lg:w-1/2 md:w-1/2 p-1">
                    <div class="group relative overflow-hidden h-full">
                        @php
                            $first_image = $property->images->first();
                        @endphp
                        <a href="{{ route('properties.files', $property) }}">
                            <img src="{{ $first_image->file }}" alt="image" loading="lazy" class="rounded-lg h-full">
                        </a>
                    </div>
                </div>

                <div class="lg:w-1/2 md:w-1/2">
                    <div class="flex">
                        @foreach ($property->images->slice(1, 2) as $image)
                            <div class="w-1/2 p-1">
                                <div class="group relative overflow-hidden">
                                    <a href="{{ route('properties.files', $property) }}">
                                        <img src="{{ $image->file }}" alt="image" loading="lazy" class="rounded-lg">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex">
                        @foreach ($property->images->slice(3, 2) as $image)
                            <div class="w-1/2 p-1">
                                <div class="group relative overflow-hidden">
                                    <a href="{{ route('properties.files', $property) }}">
                                        <img src="{{ $image->file }}" alt="image" loading="lazy" class="rounded-lg">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!--end flex-->
            <div class="flex justify-end">
                <a href="{{ route('properties.files', $property) }}"class="btn bg-white rounded-full">
                    <span>
                        <i class="uil uil-image text-green-500"></i>
                        {{ count($property->images) }} Images
                    </span>
                    <span class="px-2">|</span>
                    <span class="">
                        <i class="uil uil-video text-green-500"></i>
                        {{ $property->videos_count }} Videos
                    </span>
                </a>
            </div>
        </div><!--end container fluid-->


        <div class="container-fluid mt-10">
            <div class="md:flex">
                <div class="lg:w-[55%] md:w-1/2 rounded-xl bg-white dark:bg-slate-900 shadow overflow-hidden p-5">
                    <h4 class="text-3xl font-extrabold">{{ $property->name }}, {{ $property->city?->name }},
                        {{ $property->country?->name }}</h4>

                    <div class="d-flex flex-wrap pt-3 pb-6 text-lg text-gray-700">
                        @foreach ($property->features as $feature)
                            <span>
                                @if (!$loop->first)
                                    &nbsp;
                                @endif
                                {{ $feature }} &nbsp;
                            </span>
                            @if (!$loop->last)
                                <span> | </span>
                            @endif
                        @endforeach
                    </div>

                    <hr class="bg-gray-500 h-[1.5px]">

                    <div class="flex gap-3 items-center mt-3">
                        <x-dynamic-component component="flag-country-{{ $property->country?->code }}"
                            class="w-10 h-10" />
                        <div>
                            <p class="text-lg font-semibold">{{ $property->city?->name }},
                                {{ $property->country?->name }}</p>
                            <p class="text-gray-500 text-md -mt-0.5">
                                {{ __('A mature real estate market with a high return on investment') }}</p>
                        </div>
                    </div>
                    @if (strtolower($property->category?->name ?? '') === 'rented')
                        <div class="flex gap-3 items-center mt-4">
                            <span class="fs-40">
                                <i class="fas fa-home"></i>
                            </span>
                            <div class="pl-2">
                                <p class="text-lg font-semibold">{{ __('Rented') }}</p>
                                <p class="text-gray-500 text-md -mt-0.5">
                                    {{ __('Currently occupied and professionally managed by our team') }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="flex gap-3 items-center mt-4">
                        <span class="fs-40">
                            <i class="fab fa-css3-alt"></i>
                        </span>
                        <div class="pl-2">
                            <p class="text-lg font-semibold">{{ __('3 years rental guarantee') }}</p>
                            <p class="text-gray-500 text-md -mt-0.5">
                                {{ __('Stake guarantees you at least 3 years of rental income on this property') }}</p>
                        </div>
                    </div>

                    @if (strtolower($property->category?->name ?? '') === 'rented')
                        <div class="flex gap-3 items-center mt-4">
                            <span class="fs-40">
                                <i class="fas fa-coins"></i>
                            </span>
                            <div class="pl-2">
                                <p class="text-lg font-semibold">{{ __('Current rent is') }}
                                    ${{ currency_format($property->current_rent) }} {{ __('per month') }}</p>
                                <p class="text-gray-500 text-md -mt-0.5">
                                    {{ __('Distributed monthly among all investors after standard charges and fees') }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <div class="flex gap-3 items-center mt-4 mb-4">
                        <span class="fs-40">
                            <i class="fas fa-chart-line"></i>
                        </span>
                        <div class="">
                            <p class="text-lg font-semibold">{{ $property->gross_yield }}%
                                {{ __('annual gross yield') }}</p>
                            <p class="text-gray-500 text-md -mt-0.5">
                                {{ __('With a net yield of') }} {{ $property->net_yield }}%
                                {{ __('and a price per square foot of') }}
                                ${{ currency_format($property->price_per_square_foot) }}
                            </p>
                        </div>
                    </div>

                    <hr class="bg-gray-500 h-[1.5px]">

                    {{-- investment calculator --}}
                    <div class="my-6">
                        <h3 class="text-3xl font-semibold">{{ __('Investment calculator') }}</h3>

                        @livewire('calculator', ['property' => $property])
                    </div>

                    {{-- <hr class="bg-gray-500 h-[1.5px]"> --}}

                    {{-- Property Overview --}}
                    <div class="my-6 mt-16">
                        <h3 class="text-3xl font-semibold">{{ __('Property Overview') }}</h3>
                        <p class="text-slate-600 mt-3">{!! $property->overview !!}</p>
                    </div>

                    {{-- Financials --}}
                    <div class="my-6 mt-16">
                        <h3 class="text-3xl font-semibold">{{ __('Financials') }}</h3>
                        <div class="md:flex md:gap-5 mt-5">
                            <div class="w-full md:w-1/2">
                                <h3 class="font-semibold mb-4 text-lg">{{ __('Property cost') }}</h3>

                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __('Property price') }}</span>
                                    <h4 class="font-semibold text-lg">${{ currency_format($property->price) }}</h4>
                                </div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __('Transaction costs') }}</span>
                                    <h4 class="font-semibold text-lg">
                                        ${{ currency_format($property->transaction_fee) }}</h4>
                                </div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __("Shareholder's fee") }}</span>
                                    <h4 class="font-semibold text-lg">{{ $property->site_fee }}%</h4>
                                </div>
                                <hr>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __('Investment cost') }}</span>
                                    <h4 class="font-semibold text-lg text-green-500">
                                        ${{ currency_format($property->price + $property->transaction_fee) }}
                                    </h4>
                                </div>
                            </div>

                            <div class="w-full md:w-1/2">
                                <h3 class="font-semibold mb-4 text-lg">{{ __('Rental income (Year 1)') }}</h3>

                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __('Annual gross rent') }}</span>
                                    <h4 class="font-semibold text-lg">${{ currency_format($property->gross_rent) }}
                                    </h4>
                                </div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __('Service charges') }}</span>
                                    <h4 class="font-semibold text-lg">
                                        ${{ currency_format($property->service_charges) }}</h4>
                                </div>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __('Mgmt. and maintenance') }}</span>
                                    <h4 class="font-semibold text-lg">{{ currency_format($property->other_charges) }}
                                    </h4>
                                </div>
                                <hr>
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-gray-600">{{ __('Annual net income') }}</span>
                                    <h4 class="font-semibold text-lg text-green-500">
                                        ${{ currency_format($property->gross_rent + $property->service_charges + $property->other_charges) }}
                                    </h4>
                                </div>

                                <div class="mt-5 bg-gray-200 p-2 rounded-lg flex justify-between">
                                    <span class="text-sm">
                                        {{ __('This is an estimate for the 1st year of ownership') }}
                                    </span>
                                    <span data-tooltip-target="tooltip-default" class="">
                                        <i class="far fa-question-circle"></i>
                                    </span>
                                    <div id="tooltip-default" role="tooltip"
                                        class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-md font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                                        {{ __('This rental income breakdown is based on estimated rental income, deductions, and fees for the first year of ownership only. Please note that actual rental income, deductions, and fees may vary based on market conditions and future rental term.') }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Funding timeline --}}
                    <div class="my-6 mt-16">
                        <h3 class="text-3xl font-semibold">{{ __('Funding timeline') }}</h3>
                        <div class="mt-5 bg-gray-200 p-1 text-sm rounded-lg w-fit">
                            {{ __('Each step may occur earlier than the dates below') }}
                        </div>
                        <div class="mt-5">
                            <ol class="relative border-l border-gray-200 dark:border-gray-700 ml-2">
                                <li class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-green-900">
                                        <svg class="w-2.5 h-2.5 text-green-500 dark:text-green-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </span>
                                    <time
                                        class="block mb-2 text-md font-normal leading-none text-gray-400 dark:text-gray-500">{{ $property->closing_date->toFormattedDateString() }}</time>
                                    <h3
                                        class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ __('Expected closing date') }}
                                    </h3>

                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('This is a conservative estimate for the closing date of the property funding') }}
                                    </p>
                                </li>
                                <li class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-green-900">
                                        <svg class="w-2.5 h-2.5 text-green-500 dark:text-green-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </span>
                                    <time
                                        class="block mb-2 text-md font-normal leading-none text-gray-400 dark:text-gray-500">{{ $property->spv_date->toFormattedDateString() }}</time>
                                    <h3
                                        class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ __('SPV formation and title deed distribution') }}
                                    </h3>

                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('The SPV will be established, and the Title Deed and Share Certificate will be accessible via the app approximately 2-3 weeks after funding.') }}
                                    </p>
                                </li>
                                <li class="mb-10 ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-green-900">
                                        <svg class="w-2.5 h-2.5 text-green-500 dark:text-green-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </span>
                                    <time
                                        class="block mb-2 text-md font-normal leading-none text-gray-400 dark:text-gray-500">{{ $property->rental_payment_date->toFormattedDateString() }}</time>
                                    <h3
                                        class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ __('Expected first rental payment') }}
                                    </h3>

                                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                        {{ __('The first rental payment for this property is projected to be paid to investors by ') }}{{ $property->rental_payment_date->toFormattedDateString() }}
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="my-6 mt-16">
                        <h3 class="text-3xl font-semibold">{{ __('Location') }}</h3>
                        <p class="text-green-600 mt-3 mb-3">
                            <a href="https://www.google.com/maps/place/{{ $property->latitude }}+{{ $property->longitude }}/data=!4m2!3m1!7e2"
                                target="_blank">
                                <span class="pr-2"><i class="fas fa-map-marker-alt"></i></span>
                                {{ $property->location }}, {{ $property->city?->name }},
                                {{ $property->country?->name }}
                            </a>
                        </p>

                        <div id="map" class="h-[500px] rounded-lg"></div>

                        <p class="text-slate-600 mt-5">{!! $property->location_note !!}</p>
                    </div>

                    {{-- Amenities --}}
                    <div class="my-6 mt-16">
                        <h3 class="text-3xl font-semibold">{{ __('Amenities') }}</h3>
                        <div class="flex mt-4">
                            @foreach ($property->amenities as $amenity)
                                <div class="flex items-center gap-4 mb-3 sm:w-1/2 md:w-1/3 ">
                                    <img src="{{ $amenity->photo }}" alt="image" class="img-fluid">
                                    <p class="fw-bold mb-0 pb-0 fs-16">{{ __($amenity->name) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Documents --}}
                    <div class="my-6 mt-16">
                        <h3 class="text-3xl font-semibold">{{ __('Documents') }} ({{ count($property->documents) }})
                        </h3>
                        <div class="mt-4">
                            @foreach ($property->documents as $document)
                                <a href="{{ $document->file }}"
                                    class="flex justify-between items-center border p-3 rounded-lg mb-3" download>
                                    <div class="flex gap-3">
                                        <span>
                                            <i class="fas fa-file fs-18"></i>
                                        </span>
                                        <h5 class="mb-0 pb-0">{{ $document->name }}</h5>
                                    </div>
                                    <span>
                                        <i class="fas fa-download fs-18 text-green-500"></i>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Any question --}}
                    <div class="my-6 mt-16">
                        <h3 class="text-2xl font-semibold">{{ __('Have more questions about this property?') }}
                        </h3>
                        <div class="flex mt-5 gap-5">
                            <img src="{{ asset('assets/images/client/07.jpg') }}" alt="imgage"
                                class="rounded-lg w-24 h-24">
                            <div class="flex flex-col">
                                <span
                                    class="text-md text-slate-600">{{ __('Contact our real estate experts') }}</span>
                                <a href="javascript:void(Tawk_API.toggle())"
                                    class="btn bg-white hover:bg-green-700 hover:text-white text-black rounded-md gap-2 text-lg transition ease-out border border-gray-500 mt-3">
                                    <i class="far fa-comment"></i>
                                    <span>{{ __('Message us') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="lg:w-[45%] md:w-1/2 px-5 mt-8 md:mt-0">
                    <div class="sticky top-20">
                        <div class="bg-white dark:bg-slate-900 shadow overflow-hidden rounded-xl">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-center">{{ __('Property Overview') }}</h3>
                                @php
                                    $funded = funded($property->investments_sum_amount, $property->price);
                                @endphp
                                <h3 class="text-3xl font-bold text-green-500 text-center my-3">
                                    ${{ currency_format($property->price) }}</h3>
                                <div class="h-[8px] bg-gray-100 rounded mb-1">
                                    <div class="bg-green-400 rounded h-[8px]" role="progressbar"
                                        style="width: {{ $funded }}%;" aria-valuenow="0" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <div class="flex justify-between mb-3 mt-2">
                                    <span>{{ $funded }}% {{ __('funded') }}</span>
                                    <span>${{ currency_format($property->price - $property->investments_sum_amount) }}
                                        {{ __('available') }}</span>
                                </div>

                                <div class="flex justify-between mb-3">
                                    <p>
                                        {{-- $property->investors --}}
                                        <span
                                            class="text-green-500 text-lg">{{ $property->investments?->unique('user_id')?->count() }}
                                        </span>{{ __('investors') }}
                                    </p>
                                    {{-- @if (now()->diffInDays($property->closing_date) < 50) --}}
                                    <span class="text-red-500 text-md">
                                        <i class="far fa-clock"></i>
                                        {{ now()->diffInDays($property->closing_date) }}
                                        {{ __('days left') }}</span>
                                    {{-- @endif --}}

                                </div>

                                <div class="bg-gray-200/20 border rounded-md p-3">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-gray-600">{{ __('Annualised return') }}</span>
                                        <h4 class="font-semibold">{{ $property->annual_return }}%</h4>
                                    </div>
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-gray-600">{{ __('Annual appreciation') }}</span>
                                        <h4 class="font-semibold">{{ $property->annual_appreciation }}%</h4>
                                    </div>
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-gray-600">{{ __('Projected gross yield') }}</span>
                                        <h4 class="font-semibold">{{ $property->gross_yield }}%</h4>
                                    </div>
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-gray-600">{{ __('Projected net yield') }}</span>
                                        <h4 class="font-semibold">{{ $property->net_yield }}%</h4>
                                    </div>
                                </div>

                                <!--add to cart-->
                                @livewire('add-cart', ['property' => $property])

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!--end section-->
    <!-- End Hero -->

    @push('scripts')
        <script type="text/javascript">
            function initMap() {
                const myLatLng = {
                    lat: Number("{{ $property->latitude }}"),
                    lng: Number("{{ $property->longitude }}")
                };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 7,
                    center: myLatLng,
                });

                new google.maps.Marker({
                    position: myLatLng,
                    map,
                    title: "{{ $property->name }}",
                });
            }

            window.initMap = initMap;
        </script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_map_key') }}&callback=initMap&v=weekly"
            defer></script>
    @endpush
</x-app-layout>
