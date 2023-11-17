<form class="mt-5" wire:submit="addToCart">
    @php
        $is_invested = is_invested($property->id);
    @endphp
    <div class="flex items-center gap-2">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none gap-2">
                <img src="{{ asset('images/us.webp') }}" class="h-5 w-5 rounded-full object-fill" />
                <span class="mt-1.5">{{ __('USD') }}</span>
            </div>
            <input type="number"
                class="bg-white border border-gray-200 text-gray-900 text-md rounded-lg block w-full pl-20 px-2.5 py-2 pt-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white outline-none focus:ring-0 disabled:bg-gray-100"
                wire:model="amount" step="10" {{ $is_invested ? 'disabled' : '' }}>
        </div>

        <button type="submit"
            class="btn bg-green-600 hover:bg-green-700 text-white rounded-md !py-[1.35rem] disabled:cursor-not-allowed disabled:opacity-50"
            {{ !$can_submit || $is_invested ? 'disabled' : '' }}>{{ __('Add to cart') }}</button>
    </div>
    @error('amount')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
            {{ __('Minimum investment amount is ') }}${{ currency_format($property->minimum_investment_price) }}</p>
    @enderror
    @if ($is_invested)
        <div class="p-4 my-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            {{ __('You already invested in the property') }}
        </div>
    @endif


</form>
