<x-app-layout>
    <section class="w-full m-auto relative py-3 sm:px-3 lg:px-5">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Profile & Settings') }}</h1>
        </div>

        <x-flash-message />

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-12 gap-[30px]">
            @foreach ($tabs as $tab)
                <div
                    class="rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                    <a href="{{ $tab['link'] }}" class="px-8 py-6 flex flex-col gap-3">
                        <span class="text-green-400"><i class="{{ $tab['icon'] }}" style="font-size: 2rem;"></i></span>
                        <h4 class="text-xl font-semibold text-gray-800 capitalize">
                            {{ $tab['title'] }}
                        </h4>
                        <p class="text-gray-400 text-sm">{{ $tab['description'] }}</p>
                    </a>
                </div>
            @endforeach

        </div>
    </section>
</x-app-layout>
