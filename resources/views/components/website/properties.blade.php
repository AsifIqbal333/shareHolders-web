@props(['properties'])

<div class="container lg:mt-24 mt-16">
    <div class="grid grid-cols-1 pb-8 text-center">
        <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">
            {{ __('Featured Properties') }}</h3>

        <p class="text-slate-400 max-w-xl mx-auto">
            {{ __('A great plateform to buy, sell and rent your properties without any agent or commisions.') }}</p>
    </div><!--end grid-->

    <div class="grid grid-cols-1 mt-8 relative">
        <div class="tiny-home-slide-three">
            @foreach ($properties as $property)
                <div class="tiny-slide">
                    {{-- <div
                        class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-md dark:hover:shadow-md dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 m-3">
                        <div class="relative">
                            <img src="{{ asset('assets/images/property/1.jpg') }}" alt="image" loading="lazy">

                            <div class="absolute top-4 end-4">
                                <a href="javascript:void(0)"
                                    class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i
                                        class="mdi mdi-heart mdi-18px"></i></a>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="pb-6">
                                <a href="{{ route('show_property') }}"
                                    class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">10765
                                    Hillshire Ave, Baton Rouge, LA 70810, USA</a>
                            </div>

                            <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                <li class="flex items-center me-4">
                                    <i class="uil uil-compress-arrows text-2xl me-2 text-green-600"></i>
                                    <span>8000sqf</span>
                                </li>

                                <li class="flex items-center me-4">
                                    <i class="uil uil-bed-double text-2xl me-2 text-green-600"></i>
                                    <span>4 Beds</span>
                                </li>

                                <li class="flex items-center">
                                    <i class="uil uil-bath text-2xl me-2 text-green-600"></i>
                                    <span>4 Baths</span>
                                </li>
                            </ul>

                            <ul class="pt-6 flex justify-between items-center list-none">
                                <li>
                                    <span class="text-slate-400">Price</span>
                                    <p class="text-lg font-medium">$5000</p>
                                </li>

                                <li>
                                    <span class="text-slate-400">Rating</span>
                                    <ul class="text-lg font-medium text-amber-400 list-none">
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline"><i class="mdi mdi-star"></i></li>
                                        <li class="inline text-black dark:text-white">5.0(30)</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <div
                        class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 border">

                        <div class="relative">
                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-56 overflow-hidden rounded-lg">
                                    @foreach ($property->images as $image)
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ $image->file }}"
                                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 h-full"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Slider indicators -->
                                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                                    @foreach ($property->images as $image)
                                        <button type="button" class="w-2 h-2 rounded-full" aria-current="true"
                                            aria-label="Slide {{ $loop->iteration }}"
                                            data-carousel-slide-to="{{ $loop->index }}"></button>
                                    @endforeach
                                </div>
                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:outline-none">
                                        <svg class="w-3 h-3 text-white dark:text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">{{ __('Previous') }}</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:outline-none">
                                        <svg class="w-3 h-3 text-white dark:text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">{{ __('Next') }}</span>
                                    </span>
                                </button>
                            </div>
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

                                <h3 class="text-2xl font-bold text-green-500 my-2">
                                    ${{ currency_format($property->price) }}
                                </h3>
                                <div class="d-flex flex-column">
                                    <div class="h-[8px] bg-gray-100 rounded mb-1">
                                        <div class="bg-green-400 rounded h-[8px]" role="progressbar" style="width: 0%;"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-sm">0% funded</span>
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
                    </div>
                </div>
            @endforeach

        </div>
    </div><!--en grid-->
</div>
