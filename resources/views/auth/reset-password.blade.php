<x-auth-layout>
    <x-slot name="heading">
        {{ __('Reset Your Password') }}
    </x-slot>

    <form method="POST" action="{{ route('password.store') }}" class="ltr:text-left rtl:text-right">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="grid grid-cols-1">
            <div class="mb-4">
                <label class="font-medium" for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" name="email" class="form-input mt-3"
                    value="{{ old('email', $request->email) }}" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="font-medium" for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" class="form-input mt-3" placeholder="*********"
                    required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="font-medium" for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-input mt-3"
                    placeholder="*********" required>
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
</x-auth-layout>
