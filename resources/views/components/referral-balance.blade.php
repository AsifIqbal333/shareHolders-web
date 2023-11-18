@props(['total_rewards', 'show_link' => false])

<div
    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
    <div class="flex justify-between items-center px-8 py-4">
        <div class="flex flex-col gap-5">
            <div class="flex items-center gap-2">
                <h4 class="text-xl text-gray-500 font-normal capitalize">{{ __('Total rewards earned') }}
                </h4>
                <span data-tooltip-target="reward-tooltip" class="">
                    <i class="far fa-question-circle text-sm text-gray-400"></i>
                </span>
                <div id="reward-tooltip" role="tooltip"
                    class="absolute z-999 invisible inline-block w-80 px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
                    <p>{{ __('This number indicates the accumulated sum of all rewards earned since you started using the app. It includes cashback rewards, referral bonuses, and any other promotions.') }}
                    </p>
                    <p class="mt-2">
                        {{ __('Please note, this is not your current rewards balance. For your current balance please check your wallet.') }}
                    </p>
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <h2 class="text-4xl font-bold">${{ currency_format($total_rewards) }}</h2>
            @if ($show_link)
                <a href="{{ route('wallet.index') }}"
                    class="hover:text-green-500 hover:underline -mt-3">{{ __('view current balance') }}</a>
            @endif

        </div>
        <div class="flex flex-col text-green-400">
            <i class="far fa-star" style="font-size: 3.5rem;"></i>
        </div>
    </div>
</div>
