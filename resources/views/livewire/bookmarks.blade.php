<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
    @forelse($bookmarks as $bookmark)
        <div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500"
            wire:key="{{ $bookmark->id }}">
            <div class="relative">
                <img src="{{ $bookmark->property->images?->first()?->file }}" alt="{{ $bookmark->property->name }}">

                <div class="absolute top-4 end-4" wire:click="removeBookmark('{{ $bookmark->id }}')">
                    <a href="javascript:void(0)"
                        class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-red-600 "><i
                            class="mdi mdi-heart mdi-18px"></i></a>
                </div>
            </div>

            <div class="p-6">
                <div class="mb-3 flex flex-wrap gap-2">
                    <div class="border p-0.5 rounded flex items-center content-center px-1 gap-1">
                        <x-dynamic-component component="flag-country-{{ $bookmark->property->country?->code }}"
                            class="w-4 h-4 rounded-full" />
                        <span class="text-sm">{{ $bookmark->property->city?->name }}</span>
                    </div>
                    @if ($bookmark->property->category)
                        <div class="border p-0.5 rounded flex items-center content-center px-1 gap-1">
                            <span class="text-sm">{{ $bookmark->property->category?->name }}</span>
                        </div>
                    @endif
                </div>

                <div class="pb-2.5">
                    <a href="{{ route('properties.show', $bookmark->property) }}"
                        class="text-lg hover:text-green-600 font-semibold ease-in-out duration-500">{{ $bookmark->property->name }}</a>

                    <h3 class="text-2xl font-bold text-green-500 my-2">
                        ${{ currency_format($bookmark->property->price) }}
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
                        <h4 class="font-semibold">{{ $bookmark->property->annual_return }}%</h4>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500">{{ __('Annual appreciation') }}</span>
                        <h4 class="font-semibold">{{ $bookmark->property->annual_appreciation }}%</h4>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500">{{ __('Projected gross yield') }}</span>
                        <h4 class="font-semibold">{{ $bookmark->property->gross_yield }}%</h4>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500">{{ __('Projected net yield') }}</span>
                        <h4 class="font-semibold">{{ $bookmark->property->net_yield }}%</h4>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-lg">{{ __('Please bookmark any property to show here') }}</p>
    @endforelse
</div>
