<div class="grid grid-cols-1">
    <div class="mb-4 text-center flex flex-col relative">
        <strong class="font-bold text-xl" for="tier">${{ $value }}</strong>
        <input type="range" id="tier" wire:model.live="value" min="5000" max="100000" class="mt-5 range"
            step="5000" list="data">
        <datalist class="range__list" id="data">
            <option class="range__opt opt0"></option>
            <option class="range__opt">25000</option>
            <option class="range__opt">50000</option>
            <option class="range__opt">75000</option>
            <option class="range__opt"></option>
        </datalist>
    </div>

    <input type="hidden" name="tier_id" value={{ $tier['id'] }}>

    {{-- show tiers here --}}
    {{-- style="background: lightgray;" --}}
    <div class="text-center mt-5 border rounded-md p-5">
        <div class="mx-auto" style="width: 80%;">
            <h3 class="font-semibold text-lg uppercase">{{ $tier['name'] }}</h3>
            <p class="mt-3">{{ __('Invest From') }}</p>
            <h2 class="font-bold text-2xl mt-2 mb-4">${{ $tier['start'] }}</h2>
            <ul class="text-left">
                @foreach ($tier['specifications'] as $item)
                    <li class="flex">
                        <svg class="flex-shrink-0 h-6 w-6 text-blue-600" width="16" height="16"
                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.5219 4.0949C11.7604 3.81436 12.181 3.78025 12.4617 4.01871C12.7422 4.25717 12.7763 4.6779 12.5378 4.95844L6.87116 11.6251C6.62896 11.91 6.1998 11.94 5.9203 11.6916L2.9203 9.02494C2.64511 8.78033 2.62032 8.35894 2.86493 8.08375C3.10955 7.80856 3.53092 7.78378 3.80611 8.02839L6.29667 10.2423L11.5219 4.0949Z"
                                fill="currentColor" />
                        </svg>
                        <span style="margin-left: 8px;">{{ __($item) }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

    <div class="mt-6">
        <button type="submit"
            class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Proceed') }}</button>
    </div>
</div>
