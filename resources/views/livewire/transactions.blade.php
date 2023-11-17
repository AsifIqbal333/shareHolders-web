<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-md text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Type') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Gateway') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Date') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Amount') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Wallet Cash Balance') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Wallet Reward Balance') }}
                </th>
            </tr>
        </thead>
        <tbody class="text-md">
            @forelse($transactions as $transaction)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-md">
                    <td class="px-6 py-4 capitalize">
                        {{ $transaction->type }}
                    </td>
                    <td class="px-6 py-4 capitalize">
                        {{ $transaction->gateway === 'stripe' ? 'card' : $transaction->gateway }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->created_at->format('M, d Y h:i:s A') }}
                    </td>
                    <td class="px-6 py-4">
                        ${{ currency_format($transaction->amount) }}
                    </td>
                    <td class="px-6 py-4">
                        ${{ currency_format($transaction->wallet_cash_balance) }}
                    </td>
                    <td class="px-6 py-4">
                        ${{ currency_format($transaction->wallet_reward_balance) }}
                    </td>
                </tr>
            @empty
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="5">
                        {{ __('No transactions yet') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($transactions->count() > 15)
        <div class="p-3 bg-white">
            {!! $transactions->links() !!}
        </div>
    @endif
</div>
