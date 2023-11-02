<div class="flex justify-end">
    <button
        class="btn bg-white hover:bg-green-700 hover:text-white text-black rounded-md gap-2 transition ease-out text-lg"
        wire:click="toggleBookmark">
        @if ($is_bookmark)
            <i class="fas fa-bookmark text-green-500"></i>
        @else
            <i class="far fa-bookmark"></i>
        @endif
        <span class="">{{ __('Bookmark') }}</span>
    </button>
</div>
