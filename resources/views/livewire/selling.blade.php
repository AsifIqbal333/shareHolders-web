<div class="p-6 space-y-6">
    <ol
        class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4">
        @foreach ($tabs as $key => $value)
            <li wire:key="{{ $key }}" wire:click="changeTab('{{ $key }}')"
                class="flex items-center cursor-pointer {{ $key === $tab ? 'text-green-600 dark:text-green-500' : '' }}">
                <span
                    class="flex items-center justify-center w-5 h-5 mr-2 text-xs border {{ $key === $tab ? 'border-green-600 dark:border-green-500' : 'border-gray-500 dark:border-gray-400' }}  rounded-full shrink-0  pt-1">
                    {{ $loop->iteration }}
                </span>
                {{ __($value) }}
                @if (!$loop->last)
                    <svg class="w-3 h-3 ml-2 sm:ml-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                @endif
            </li>
        @endforeach
    </ol>

    <form wire:submit="saveRequest" class="mt-5">
        <div class="mt-10">
            @if ($tab === 'neighbourhood')
                <h3 class="mb-2 text-lg font-medium leading-none text-gray-900 dark:text-white">
                    {{ __('What neighbourhood is your property located in?') }}</h3>
                <p>{{ __('As of now, we are only providing offers for properties in the following areas') }}</p>
            @elseif ($tab === 'address')
                <h3 class="mb-2 text-lg font-medium leading-none text-gray-900 dark:text-white">
                    {{ __('What is the full address of the property you would like to sell?') }}</h3>
                <p>{{ __('Please include relevant information such as the unit number, building name') }}</p>
            @elseif ($tab === 'bedrooms')
                <h3 class="mb-2 text-lg font-medium leading-none text-gray-900 dark:text-white">
                    {{ __('How many bedrooms does the property have?') }}</h3>
            @else
                <h3 class="mb-2 text-lg font-medium leading-none text-gray-900 dark:text-white">
                    {{ __("Let's get to know each other!") }}</h3>
                <p>{{ __('We need some of your basic contact information so that we can reach out about the next steps.') }}
                </p>
            @endif
        </div>


        <div class="mt-5">
            @if ($tab === 'neighbourhood')
                <ul class="grid w-full gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($locations as $location)
                        <li wire:key="{{ $location->id }}">
                            <input type="radio" id="{{ $location->id }}" name="hosting" wire:model.live="location_id"
                                value="{{ $location->id }}" class="hidden peer" required>
                            <label for="{{ $location->id }}"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">{{ $location->name }}</div>
                                </div>

                            </label>
                        </li>
                    @endforeach
                </ul>

                {{-- <button type="button"
                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-lg mt-5 disabled:cursor-not-allowed disabled:opacity-50"
                    wire:click="changeTab('bedrooms')" {{ !$location_id ? 'disabled' : '' }}>
                    {{ __('Next') }}
                </button> --}}
            @elseif ($tab === 'address')
                <div class="relative z-0 w-full mb-6 group">
                    <input type="email" name="floating_email" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " wire:model.live="address" required />
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Your address') }}</label>
                </div>

                <button type="button"
                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-lg mt-5 disabled:cursor-not-allowed disabled:opacity-50"
                    wire:click="changeTab('bedrooms')" {{ !$address ? 'disabled' : '' }}>
                    {{ __('Next') }}
                </button>
            @elseif ($tab === 'bedrooms')
                <ul
                    class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($bedrooms_list as $list)
                        <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600"
                            wire:key="{{ $list }}">
                            <div class="flex items-center pl-3">
                                <input id="{{ $list }}" type="radio" wire:model.live="bedrooms"
                                    value="{{ $list }}" name="bedrooms"
                                    class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 checked:bg-green-500">
                                <label for="{{ $list }}"
                                    class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 capitalize">{{ $list }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>

                {{-- <button type="button"
                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-lg mt-5 disabled:cursor-not-allowed disabled:opacity-50"
                    wire:click="changeTab('basic_info')" {{ !$bedrooms ? 'disabled' : '' }}>
                    {{ __('Next') }}
                </button> --}}
            @else
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="first_name" id="first_name"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        wire:model.live="first_name" placeholder=" " required />
                    <label for="first_name"
                        class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('First Name') }}</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="last_name" id="last_name"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        wire:model.live="last_name" placeholder=" " required />
                    <label for="last_name"
                        class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Last Name') }}</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <input type="email" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        wire:model.live="email" placeholder=" " required />
                    <label for="email"
                        class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Email Address') }}</label>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="phone" id="phone"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        wire:model.live="phone" placeholder=" " required />
                    <label for="phone"
                        class="peer-focus:font-medium absolute text-md text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ __('Phone number (123-456-7890)') }}</label>
                </div>

                <button type="submit"
                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-lg mt-5 disabled:cursor-not-allowed disabled:opacity-50"
                    wire:click="changeTab('basic_info')"
                    {{ !$first_name || !$last_name || !$email || !$phone ? 'disabled' : '' }}>
                    {{ __('Submit') }}
                </button>
            @endif
        </div>

    </form>
</div>
