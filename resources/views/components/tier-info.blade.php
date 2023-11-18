@props(['show_icon' => false])

@php
    $investment = user_yearly_investment();
    $next_tier = user_next_tier();
    $funded = funded($investment, $next_tier->starting);
@endphp
<div class="flex items-center justify-between">
    <h4 class="text-xl font-bold text-gray-800 capitalize">
        {{ auth()->user()->user_info?->tier?->name }}
    </h4>
    @if ($show_icon)
        <span><i class="fas fa-chevron-right"></i></span>
    @endif
</div>
<div class=" mt-3">
    <div class="flex justify-between">
        <span class="text-md font-bold">${{ currency_format($investment) }}</span>
        <span class="text-md">{{ __('Invested YTD') }} {{ date('Y') }}</span>
    </div>

    <div class="h-[8px] bg-gray-100 rounded mb-1">
        <div class="bg-green-400 rounded h-[8px]" role="progressbar" style="width: {{ $funded }}%;"
            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="text-center mt-4">
        <p class="text-md">{{ __('Invest') }} <span
                class="font-bold">${{ $next_tier ? currency_format($next_tier->starting) : 0 }}</span>
            by {{ now()->endOfYear()->format('m/d/Y') }}
            {{ __('to reach ') }} {{ $next_tier->name }}</p>
    </div>

</div>
