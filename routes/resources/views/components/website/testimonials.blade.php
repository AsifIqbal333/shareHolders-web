@props(['testimonials'])
<section class="relative lg:py-24 py-16">
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">
                {{ __('What Our Client Say?') }}
            </h3>

            <p class="text-slate-400 max-w-xl mx-auto">
                {{ __('A great plateform to buy, sell and rent your properties without any agent or commisions.') }}</p>
        </div><!--end grid-->

        <div class="flex justify-center relative mt-8">
            <div class="relative w-full">
                <div class="tiny-three-item">
                    @foreach ($testimonials as $item)
                        <div class="tiny-slide">
                            <div class="text-center mx-3">
                                <p class="text-lg text-slate-400 italic"> " {{ $item->feedback }} " </p>

                                <div class="text-center mt-5">
                                    <ul class="text-xl font-medium text-amber-400 list-none mb-2">
                                        @for ($x = 0; $x < $item->stars; $x++)
                                            <li class="inline"><i class="mdi mdi-star"></i></li>
                                        @endfor
                                    </ul>

                                    <img src="{{ $item->photo }}"
                                        class="h-14 w-14 rounded-full shadow-md dark:shadow-gray-700 mx-auto"
                                        alt="image" loading="lazy">
                                    <h6 class="mt-2 fw-semibold">{{ $item->name }}</h6>
                                    <span
                                        class="text-slate-400 text-sm">{{ $item->feedback_date->toFormattedDateString() }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container lg:mt-24 mt-16">
        <div class="grid grid-cols-1 text-center">
            <h3
                class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-medium text-black dark:text-white">
                Have Question ? Get in touch!</h3>

            <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                any agent or commisions.</p>

            <div class="mt-6">
                <a href="contact.html" class="btn bg-green-600 hover:bg-green-700 text-white rounded-md"><i
                        class="uil uil-phone align-middle me-2"></i> Contact us</a>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section>
