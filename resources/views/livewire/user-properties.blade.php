<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-md text-gray-700 capitalize bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Property') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Location') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Investment value') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Status') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Invested On') }}
                </th>
            </tr>
        </thead>
        <tbody class="text-md">
            @forelse($investments as $investment)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-md">
                    <td class="px-6 py-4 capitalize">
                        {{ $investment->property->name }}
                    </td>
                    <td class="px-6 py-4 capitalize">
                        {{ $investment->property->location }}
                    </td>
                    <td class="px-6 py-4">
                        ${{ currency_format($investment->amount) }}
                    </td>
                    <td class="px-6 py-4 capitalize">
                        {{ $investment->property->status }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $investment->created_at->format('M, d Y h:i:s A') }}
                    </td>
                </tr>
            @empty
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="5">
                        {{ __('No investments found') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($investments->count() > 15)
        <div class="p-3 bg-white">
            {!! $investments->links() !!}
        </div>
    @endif
</div>
