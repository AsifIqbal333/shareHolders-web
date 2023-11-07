<x-app-layout>
    <section class="w-full m-auto relative py-3">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Feedback') }}</h1>
        </div>
        @php
            $feedback = auth()->user()->feedback;
        @endphp
        @if ($feedback)
            <article
                class="group rounded-lg bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 p-4 mt-5 max-w-xl">
                <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $feedback->feedback }}</p>
                <footer class="mt-3 text-sm text-green-500 dark:text-blue-400">
                    <p>{{ __('Feedback given on') }} <time datetime="{{ $feedback->created_at }}">
                            {{ $feedback->created_at->toFormattedDateString() }}</time>
                    </p>
                </footer>
            </article>
        @else
            <form action="{{ route('feedback.store') }}" method="POST"
                class="group rounded-lg bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500 p-4 mt-5 max-w-xl">
                @csrf
                <div class="mb-6">
                    <h5 for="feddback" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">
                        {{ __('Tell us what you love about Shareholder, or what we could be doing better') }}</h5>
                    <span class="text-md">If you need immediate assistance, please reach out to customer service
                        via <a href="mailto:contact@shareholders.pro" class="underline">contact@shareholders.pro</a> or
                        chat
                        through the app.</span>

                    <textarea id="feddback" rows="5" name="feedback"
                        class="mt-3 block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="{{ __('What made your experience great? What is this company doing well? How can we do better?') }}"
                        wire:model="experience" required>{{ old('feedback') }}</textarea>
                </div>

                <button class="btn bg-green-600 hover:bg-green-700 text-white rounded-md">{{ __('Submit') }}</button>
            </form>
        @endif

    </section>

</x-app-layout>
