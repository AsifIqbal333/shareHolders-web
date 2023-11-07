<x-website-layout>
    <!-- Hero Start -->
    <section class="relative table w-full py-32 lg:py-36 bg-no-repeat bg-center bg-cover"
        style="background-image: url('{{ asset('assets/images/bg/01.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">
                    {{ __('10765 Hillshire Ave, Baton Rouge, LA 70810, USA') }}</h3>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <div class="relative">
        <div class="shape overflow-hidden z-1 text-white dark:text-slate-900">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="relative md:pb-24 pb-16 mt-20">
        <div class="container-fluid">
            <div class="md:flex mt-4">
                <div class="lg:w-1/2 md:w-1/2 p-1">
                    <div class="group relative overflow-hidden">
                        <img src="{{ asset('assets/images/property/single/1.jpg') }}" alt="image" loading="lazy">
                        <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                        <div
                            class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                            <a href="{{ asset('assets/images/property/single/1.jpg') }}"
                                class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                    class="uil uil-camera"></i></a>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 md:w-1/2">
                    <div class="flex">
                        <div class="w-1/2 p-1">
                            <div class="group relative overflow-hidden">
                                <img src="{{ asset('assets/images/property/single/2.jpg') }}" alt="image"
                                    loading="lazy">
                                <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out">
                                </div>
                                <div
                                    class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                    <a href="{{ asset('assets/images/property/single/2.jpg') }}"
                                        class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 p-1">
                            <div class="group relative overflow-hidden">
                                <img src="{{ asset('assets/images/property/single/3.jpg') }}" alt="image"
                                    loading="lazy">
                                <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out">
                                </div>
                                <div
                                    class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                    <a href="{{ asset('assets/images/property/single/3.jpg') }}"
                                        class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-1/2 p-1">
                            <div class="group relative overflow-hidden">
                                <img src="{{ asset('assets/images/property/single/4.jpg') }}" alt="image"
                                    loading="lazy">
                                <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out">
                                </div>
                                <div
                                    class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                    <a href="{{ asset('assets/images/property/single/4.jpg') }}"
                                        class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 p-1">
                            <div class="group relative overflow-hidden">
                                <img src="{{ asset('assets/images/property/single/5.jpg') }}" alt="image"
                                    loading="lazy">
                                <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out">
                                </div>
                                <div
                                    class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center invisible group-hover:visible">
                                    <a href="{{ asset('assets/images/property/single/5.jpg') }}"
                                        class="btn btn-icon bg-green-600 hover:bg-green-700 text-white rounded-full lightbox"><i
                                            class="uil uil-camera"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end flex-->
        </div><!--end container fluid-->

        <div class="container md:mt-24 mt-16">
            <div class="md:flex">
                <div class="lg:w-2/3 md:w-1/2 md:p-4 px-3">
                    <h4 class="text-2xl font-medium">10765 Hillshire Ave, Baton Rouge, LA 70810, USA</h4>

                    <ul class="py-6 flex items-center list-none">
                        <li class="flex items-center lg:me-6 me-4">
                            <i class="uil uil-compress-arrows lg:text-3xl text-2xl me-2 text-green-600"></i>
                            <span class="lg:text-xl">8000sqf</span>
                        </li>

                        <li class="flex items-center lg:me-6 me-4">
                            <i class="uil uil-bed-double lg:text-3xl text-2xl me-2 text-green-600"></i>
                            <span class="lg:text-xl">4 Beds</span>
                        </li>

                        <li class="flex items-center">
                            <i class="uil uil-bath lg:text-3xl text-2xl me-2 text-green-600"></i>
                            <span class="lg:text-xl">4 Baths</span>
                        </li>
                    </ul>

                    <p class="text-slate-400">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
                        aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                        sequi nesciunt.</p>
                    <p class="text-slate-400 mt-4">But I must explain to you how all this mistaken idea of denouncing
                        pleasure and praising pain was born and I will give you a complete account of the system, and
                        expound the actual teachings of the great explorer of the truth, the master-builder of human
                        happiness.</p>
                    <p class="text-slate-400 mt-4">Nor again is there anyone who loves or pursues or desires to obtain
                        pain of itself, because it is pain, but because occasionally circumstances occur in which toil
                        and pain can procure him some great pleasure.</p>

                    <div class="w-full leading-[0] border-0 mt-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                            style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="lg:w-1/3 md:w-1/2 md:p-4 px-3 mt-8 md:mt-0">
                    <div class="sticky top-20">
                        <div class="rounded-md bg-slate-50 dark:bg-slate-800 shadow dark:shadow-gray-700">
                            <div class="p-6">
                                <h5 class="text-2xl font-medium">Price:</h5>

                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-xl font-medium">$ 45,231</span>

                                    <span class="bg-green-600/10 text-green-600 text-sm px-2.5 py-0.75 rounded h-6">For
                                        Sale</span>
                                </div>

                                <ul class="list-none mt-4">
                                    <li class="flex justify-between items-center">
                                        <span class="text-slate-400 text-sm">Days on Hously</span>
                                        <span class="font-medium text-sm">124 Days</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">Price per sq ft</span>
                                        <span class="font-medium text-sm">$ 186</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">Monthly Payment (estimate)</span>
                                        <span class="font-medium text-sm">$ 1497/Monthly</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="flex">
                                <div class="p-1 w-1/2">
                                    <a href=""
                                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Book
                                        Now</a>
                                </div>
                                <div class="p-1 w-1/2">
                                    <a href=""
                                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">Offer
                                        Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 text-center">
                            <h3 class="mb-6 text-xl leading-normal font-medium text-black dark:text-white">Have
                                Question
                                ? Get in touch!</h3>

                            <div class="mt-6">
                                <a href="contact.html"
                                    class="btn bg-transparent hover:bg-green-600 border border-green-600 text-green-600 hover:text-white rounded-md"><i
                                        class="uil uil-phone align-middle me-2"></i> Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--end section-->
    <!-- End Hero -->

</x-website-layout>
