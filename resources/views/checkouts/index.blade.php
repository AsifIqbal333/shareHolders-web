<x-app-layout>
    <section class="w-full m-auto relative py-3">
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold">{{ __('Cart') }} ({{ count(auth()->user()->carts) }})</h1>
            <a href="{{ route('properties.index') }}"
                class="btn bg-white hover:bg-green-700 hover:text-white text-black rounded-md text-lg transition duration-300 ease-out">
                <span>
                    <i class="fas fa-plus pr-1" style="font-size: 15px;"></i>
                    {{ __('Add More') }}</span>
            </a>
        </div>
    </section>
</x-app-layout>
