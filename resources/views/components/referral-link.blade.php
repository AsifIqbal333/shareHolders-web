<div class="mt-3">
    <label for="link"
        class="block mb-1 text-md font-medium text-gray-900 dark:text-white">{{ __('Share your link') }}</label>
    <div class="flex gap-2">
        <input type="text" id="link"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-green-500 outline-none focus:ring-0 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 cursor-not-allowed flex-1 py-1.5"
            value="{{ referral_link() }}" readonly>
        <button type="button" onclick="copyLink()"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{ __('copy link') }}</button>
    </div>
</div>

@push('scripts')
    <script>
        async function copyLink() {
            try {
                let link = document.getElementById('link').value;
                await navigator.clipboard.writeText(link);
                alert("Copied to clipboard!");
            } catch (err) {
                console.error("Unable to copy to clipboard.", err);
                alert("Copy to clipboard failed.");
            }
        }
    </script>
@endpush
