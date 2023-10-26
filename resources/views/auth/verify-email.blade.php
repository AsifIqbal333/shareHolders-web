<x-auth-layout>
    <x-slot name="heading">
        {{ __('Confirm your email') }}
    </x-slot>

    <div class="grid grid-cols-1">
        <p class="text-slate-400 mb-6">
            {{ __("Confirmation link was sent to your email address you provided during registration. If you didn't receive the email, we will gladly send you another.") }}
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <form class="ltr:text-left rtl:text-right" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="grid grid-cols-1">
                <div class="mb-4">
                    <button type="submit"
                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Resend Verification Email') }}</button>
                </div>
            </div>
        </form>
    </div>
</x-auth-layout>
