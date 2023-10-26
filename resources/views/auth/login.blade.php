<x-auth-layout>
    <x-slot name="heading">
        {{ __('Login') }}
    </x-slot>

    <form method="POST" action="{{ route('login') }}" class="ltr:text-left rtl:text-right">
        @csrf
        <div class="grid grid-cols-1">
            <div class="mb-4">
                <label class="font-medium" for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" class="form-input mt-3" placeholder="name@example.com"
                    value="{{ old('email') }}" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="font-medium" for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="form-input mt-3" placeholder="*********"
                    required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-between mb-4">
                <div class="flex items-center mb-0">
                    <input
                        class="form-checkbox rounded border-gray-200 dark:border-gray-800 text-green-600 focus:border-green-300 focus:ring focus:ring-offset-0 focus:ring-green-200 focus:ring-opacity-50 me-2"
                        type="checkbox" name="remember" id="RememberMe">
                    <label class="form-checkbox-label text-slate-400" for="RememberMe">{{ __('Remember me') }}</label>
                </div>
                @if (Route::has('password.request'))
                    <p class="text-slate-400 mb-0"><a href="{{ route('password.request') }}"
                            class="text-slate-400">{{ __('Forgot password') }}?</a></p>
                @endif
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Login / Sign in') }}</button>
            </div>

            <div class="text-center">
                <span class="text-slate-400 me-2">{{ __("Don't have an account ?") }}</span> <a
                    href="{{ route('register') }}"
                    class="text-black dark:text-white font-bold">{{ __('Sign Up') }}</a>
            </div>
        </div>
    </form>
</x-auth-layout>
