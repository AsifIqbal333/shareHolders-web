<div
    class="group rounded-lg bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 p-4 mt-5 max-w-xl">

    <form wire:submit="saveRating">
        <div class="mb-6">
            <label for="email"
                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Rate your recent experience') }}</label>
            <div class="flex items-center gap-4 mb-5">
                @php
                    $fill_stars = $stars;
                    $unfill_stars = 5 - $fill_stars;
                @endphp
                @for ($i = 1; $i <= $fill_stars; $i++)
                    <span class="color-yellow cursor-pointer" wire:click="setStars({{ $i }})">
                        <i class="fas fa-star"></i>
                    </span>
                @endfor

                @for ($i = 1; $i <= $unfill_stars; $i++)
                    <span class="cursor-pointer" wire:click="setStars({{ $i + $fill_stars }})">
                        <i class="far fa-star"></i>
                    </span>
                @endfor
            </div>
        </div>

        <div class="mb-6">
            <label for="experience"
                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Tell us more about your experience') }}</label>
            <textarea id="experience" rows="5"
                class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="{{ __('What made your experience great? What is this company doing well? Remember to be honest, helpful, and constructive!') }}"
                wire:model="experience" required></textarea>
        </div>

        <div class="mb-6">
            <label for="title"
                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Give your review a title') }}</label>
            <div class="relative mb-6">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 16 16">
                        <path
                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg>
                </div>
                <input type="text" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-green-500 focus:border-green-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                    placeholder="{{ __("What's important for people to know?") }}" wire:model="title" required>
            </div>
        </div>

        <div class="mb-6">
            <label for="experience_date"
                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">{{ __('Date of experience') }}</label>
            <input type="date" id="experience_date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                max="{{ now()->format('Y-m-d') }}" placeholder="{{ __("What's important for people to know?") }}"
                wire:model="experience_date" required>
            <small>{{ __('Your review must be about a past experience that took place in the last 12 months. Displaying a date helps others know this review is genuine.') }}</small>
        </div>

        <button class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">{{ __('Submit') }}</button>
    </form>

</div>
