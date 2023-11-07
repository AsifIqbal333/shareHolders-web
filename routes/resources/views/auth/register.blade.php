<x-auth-layout>
    <x-slot name="heading">
        {{ __('Join ') . config('app.name') }}
    </x-slot>

    <form class="ltr:text-left rtl:text-right" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="grid grid-cols-1">
            <div class="mb-4">
                <label class="font-semibold" for="name">{{ __('Full Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-input mt-3"
                    placeholder="{{ __('John Doe') }}" required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="font-semibold" for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-input mt-3"
                    placeholder="name@example.com" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="font-medium" for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="form-input mt-3" placeholder="*********"
                    required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- <div class="mb-4">
                <label class="font-medium" for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-input mt-3"
                    placeholder="*********" required>
            </div> --}}

            <div class="mb-4">
                <div class="flex items-center mb-0">
                    <input
                        class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2"
                        type="checkbox" name="accept_conditions" value="true" id="AcceptT&C" required>
                    <label class="form-check-label text-slate-400" for="AcceptT&C">{{ __('I Accept') }} <a
                            href="{{ route('term_condition') }}"
                            class="text-green-600">{{ __('Terms And Condition') }}</a></label>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Register') }}</button>
            </div>

            <div class="text-center">
                <span class="text-slate-400 me-2">{{ __('Already have an account ?') }} </span> <a
                    href="{{ route('login') }}" class="text-black dark:text-white font-bold">{{ __('Login') }}</a>
            </div>
        </div>
    </form>

</x-auth-layout>
