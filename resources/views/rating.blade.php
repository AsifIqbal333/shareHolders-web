<x-app-layout>
    <section class="w-full m-auto relative py-3">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Ratings') }}</h1>
        </div>
        @php
            $rating = auth()->user()->rating;
        @endphp
        @if ($rating)
            <article
                class="group rounded-lg bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 p-4 mt-5 max-w-xl">

                <div class="flex items-center gap-4 mb-1">
                    @php
                        $fill_stars = $rating->stars;
                        $unfill_stars = 5 - $fill_stars;
                    @endphp
                    @for ($i = 1; $i <= $fill_stars; $i++)
                        <span class="color-yellow"><i class="fas fa-star"></i></span>
                    @endfor

                    @for ($i = 1; $i <= $unfill_stars; $i++)
                        <span><i class="far fa-star"></i></span>
                    @endfor
                    <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">{{ __($rating->title) }}
                    </h3>
                </div>
                <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
                    <p>{{ __('Reviewed on') }} <time datetime="{{ $rating->created_at }}">
                            {{ $rating->created_at->toFormattedDateString() }}</time>
                    </p>
                </footer>
                <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $rating->experience }}</p>
            </article>
        @else
            @livewire('ratings')
        @endif

    </section>

</x-app-layout>
