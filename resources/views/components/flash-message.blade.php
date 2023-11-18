@if (session('success'))
    <div class="p-4 text-md text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 -mb-5 mt-8"
        role="alert">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="p-4 text-md text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 -mb-5 mt-8"
        role="alert">{{ session('error') }}</div>
@endif
