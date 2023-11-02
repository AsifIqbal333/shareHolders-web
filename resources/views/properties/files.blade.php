<x-app-layout>

    <!--Images-->
    <section class="relative pb-16">
        <!--bookmark button-->
        <div class="flex justify-between">
            <h2 class="text-3xl font-semibold">{{ count($property->images) }} {{ __('Photos') }}</h2>
            <a href="{{ route('properties.show', $property) }}"
                class="btn bg-white hover:bg-green-700 hover:text-white text-black rounded-md gap-2 text-lg transition ease-out">
                <span>{{ __('Back') }}</span>
            </a>
        </div>

        <div class="container-fluid">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @foreach ($property->images as $image)
                    <div class="group relative overflow-hidden h-full">
                        <img src="{{ $image->file }}" alt="image" loading="lazy" class="rounded-lg h-full">
                        <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out rounded-lg">
                        </div>
                        <div
                            class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                            <a href="{{ $image->file }}"
                                class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                    class="uil uil-camera"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--videos-->
    <section class="relative md:pb-24 pb-16">
        <div class="flex justify-between">
            <h2 class="text-3xl font-semibold">{{ count($property->videos) }} {{ __('Videos') }}</h2>
        </div>

        <div class="container-fluid">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @foreach ($property->videos as $video)
                    <div class="group relative overflow-hidden h-full">
                        <video src="{{ $video->file }}" class="rounded-lg h-full" controls></video>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>
