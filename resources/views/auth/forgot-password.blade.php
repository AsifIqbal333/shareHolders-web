<x-auth-layout>
    <x-slot name="heading">
        {{ __('Reset Your Password') }}
    </x-slot>

    <div class="grid grid-cols-1">
        <p class="text-slate-400 mb-6">
            {{ __('Please enter your email address. You will receive a link to create a new password via email.') }}</p>

        <form class="ltr:text-left rtl:text-right" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="grid grid-cols-1">
                <div class="mb-4">
                    <label class="font-medium" for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="form-input mt-3" placeholder="name@example.com" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Email Password Reset Link') }}</button>
                </div>

                <div class="text-center">
                    <span class="text-slate-400 me-2">{{ __('Remember your password ?') }}</span><a
                        href="{{ route('login') }}" class="text-black dark:text-white font-bold">{{ __('Sign in') }}</a>
                </div>
            </div>
        </form>
    </div>

</x-auth-layout>
