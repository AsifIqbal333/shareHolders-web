<section class="relative table w-full py-36 lg:py-44 overflow-hidden zoom-image">
    <div class="absolute inset-0 image-wrap z-1  bg-no-repeat bg-center bg-cover"
        style="background-image: url('{{ asset('assets/images/bg/04.jpg') }}');">
    </div>
    <div class="absolute inset-0 bg-black/70 z-2"></div>
    <div class="container z-3">
        <div class="grid grid-cols-1 mt-10">
            <div class="text-center">
                <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">
                    {{ __('Easy way to find your') }} <br> {{ __('dream property') }}</h1>
                <p class="text-white/70 text-xl max-w-xl mx-auto">
                    {{ __('A great plateform to buy, sell and rent your properties without any agent or commisions.') }}
                </p>
            </div>

            <ul class="inline-block mx-auto sm:w-fit w-full flex-wrap justify-center text-center p-4 bg-white dark:bg-slate-900 backdrop-blur-sm rounded-t-xl border-b dark:border-gray-800 mt-10"
                id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                <li role="presentation" class="inline-block">
                    <button
                        class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full hover:text-green-600 transition-all duration-500 ease-in-out"
                        id="buy-home-tab" data-tabs-target="#buy-home" type="button" role="tab"
                        aria-controls="buy-home" aria-selected="true">{{ __('Buy') }}</button>
                </li>
                <li role="presentation" class="inline-block">
                    <button
                        class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full transition-all duration-500 ease-in-out"
                        id="sell-home-tab" data-tabs-target="#sell-home" type="button" role="tab"
                        aria-controls="sell-home" aria-selected="false">{{ __('Sell') }}</button>
                </li>
                <li role="presentation" class="inline-block">
                    <button
                        class="sm:px-8 px-6 py-2 text-base font-medium rounded-xl w-full transition-all duration-500 ease-in-out"
                        id="rent-home-tab" data-tabs-target="#rent-home" type="button" role="tab"
                        aria-controls="rent-home" aria-selected="false">{{ __('Rent') }}</button>
                </li>
            </ul>

            <div id="StarterContent"
                class="p-6 bg-white dark:bg-slate-900 md:rounded-xl rounded-none shadow-md dark:shadow-gray-700">
                <div class="" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
                    <form action="#">
                        <div class="registration-form text-dark text-start">
                            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                <div>
                                    <label
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Search') }}:
                                        <span class="text-red-600">*</span></label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-search icons"></i>
                                        <input name="name" type="text" id="job-keyword"
                                            class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                            placeholder="{{ __('Search your keaywords') }}">
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-properties"
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Select Categories') }}:</label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-estate icons"></i>
                                        <select class="form-select z-2" data-trigger name="choices-catagory"
                                            id="choices-catagory-buy" aria-label="Default select example">
                                            <option>{{ __('Houses') }}</option>
                                            <option>{{ __('Apartment') }}</option>
                                            <option>{{ __('Offices') }}</option>
                                            <option>{{ __('Townhome') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-min-price"
                                        class="form-label font-medium text-slate-900 dark:text-white">
                                        {{ __('Min Price') }}:</label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-usd-circle icons"></i>
                                        <select class="form-select" data-trigger name="choices-min-price"
                                            id="choices-min-price-buy" aria-label="Default select example">
                                            <option>{{ __('Min Price') }}</option>
                                            <option>500</option>
                                            <option>1000</option>
                                            <option>2000</option>
                                            <option>3000</option>
                                            <option>4000</option>
                                            <option>5000</option>
                                            <option>6000</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-max-price"
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Max Price') }}:</label>
                                    <div class="filter-search-form relative mt-2">
                                        <i class="uil uil-usd-circle icons"></i>
                                        <select class="form-select" data-trigger name="choices-max-price"
                                            id="choices-max-price-buy" aria-label="Default select example">
                                            <option>{{ __('Max Price') }}</option>
                                            <option>500</option>
                                            <option>1000</option>
                                            <option>2000</option>
                                            <option>3000</option>
                                            <option>4000</option>
                                            <option>5000</option>
                                            <option>6000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="lg:mt-6">
                                    <input type="submit" id="search-buy" name="search"
                                        class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                        value="{{ __('Search') }}">
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
                    </form>
                </div>

                <div class="hidden" id="sell-home" role="tabpanel" aria-labelledby="sell-home-tab">
                    <form action="#">
                        <div class="registration-form text-dark text-start">
                            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                <div>
                                    <label
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Search') }}:
                                        <span class="text-red-600">*</span></label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-search icons"></i>
                                        <input name="name" type="text" id="job-keyword"
                                            class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                            placeholder="{{ __('Search your keaywords') }}">
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-properties"
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Select Categories') }}:</label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-estate icons"></i>
                                        <select class="form-select z-2" data-trigger name="choices-catagory"
                                            id="choices-catagory-sell" aria-label="Default select example">
                                            <option>{{ __('Houses') }}</option>
                                            <option>{{ __('Apartment') }}</option>
                                            <option>{{ __('Offices') }}</option>
                                            <option>{{ __('Townhome') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-min-price"
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Min Price') }}
                                        :</label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-usd-circle icons"></i>
                                        <select class="form-select" data-trigger name="choices-min-price"
                                            id="choices-min-price-sell" aria-label="Default select example">
                                            <option>{{ __('Min Price') }}</option>
                                            <option>500</option>
                                            <option>1000</option>
                                            <option>2000</option>
                                            <option>3000</option>
                                            <option>4000</option>
                                            <option>5000</option>
                                            <option>6000</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-max-price"
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Max Price') }}:</label>
                                    <div class="filter-search-form relative mt-2">
                                        <i class="uil uil-usd-circle icons"></i>
                                        <select class="form-select" data-trigger name="choices-max-price"
                                            id="choices-max-price-sell" aria-label="Default select example">
                                            <option>{{ __('Max Price') }}</option>
                                            <option>500</option>
                                            <option>1000</option>
                                            <option>2000</option>
                                            <option>3000</option>
                                            <option>4000</option>
                                            <option>5000</option>
                                            <option>6000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="lg:mt-6">
                                    <input type="submit" id="search-sell" name="search"
                                        class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                        value="{{ 'Search' }}">
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
                    </form>
                </div>

                <div class="hidden" id="rent-home" role="tabpanel" aria-labelledby="rent-home-tab">
                    <form action="#">
                        <div class="registration-form text-dark text-start">
                            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                <div>
                                    <label
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Search') }}:
                                        <span class="text-red-600">*</span></label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-search icons"></i>
                                        <input name="name" type="text" id="job-keyword"
                                            class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                            placeholder="{{ __('Search your keaywords') }}">
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-properties"
                                        class="form-label font-medium text-slate-900 dark:text-white">{{ __('Select Categories') }}:</label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-estate icons"></i>
                                        <select class="form-select z-2" data-trigger name="choices-catagory"
                                            id="choices-catagory-rent" aria-label="Default select example">
                                            <option>{{ __('Houses') }}</option>
                                            <option>{{ __('Apartment') }}</option>
                                            <option>{{ __('Offices') }}</option>
                                            <option>{{ __('Townhome') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-min-price"
                                        class="form-label font-medium text-slate-900 dark:text-white">
                                        {{ __('Min Price') }}:</label>
                                    <div class="filter-search-form relative filter-border mt-2">
                                        <i class="uil uil-usd-circle icons"></i>
                                        <select class="form-select" data-trigger name="choices-min-price"
                                            id="choices-min-price-rent" aria-label="Default select example">
                                            <option>{{ __('Min Price') }}</option>
                                            <option>500</option>
                                            <option>1000</option>
                                            <option>2000</option>
                                            <option>3000</option>
                                            <option>4000</option>
                                            <option>5000</option>
                                            <option>6000</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="buy-max-price"
                                        class="form-label font-medium text-slate-900 dark:text-white">
                                        {{ __('Max Price') }}:</label>
                                    <div class="filter-search-form relative mt-2">
                                        <i class="uil uil-usd-circle icons"></i>
                                        <select class="form-select" data-trigger name="choices-max-price"
                                            id="choices-max-price-rent" aria-label="Default select example">
                                            <option>{{ __('Max Price') }}</option>
                                            <option>500</option>
                                            <option>1000</option>
                                            <option>2000</option>
                                            <option>3000</option>
                                            <option>4000</option>
                                            <option>5000</option>
                                            <option>6000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="lg:mt-6">
                                    <input type="submit" id="search-rent" name="search"
                                        class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                        value="{{ __('Search') }}">
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
                    </form>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
