<x-auth-layout>
    <x-slot name="heading">
        {{ __('Verify Phone Number') }}
    </x-slot>

    <div class="grid grid-cols-1">
        @if (!auth()->user()->phone)
            <p class="text-slate-400 mb-6">
                {{ __('Please enter your phone number to continue') }}</p>
        @endif

        @if (session('status') == 'code-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('OTP has been send to your email address you provided during registration.') }}
            </div>
        @endif

        <form class="ltr:text-left rtl:text-right" method="POST"
            action="{{ !auth()->user()->phone ? route('phone.send') : route('phone.verify') }}">
            @csrf
            <div class="grid grid-cols-1">
                @if (!auth()->user()->phone)
                    <div class="mb-4">
                        <label class="font-medium" for="phone">{{ __('Phone Number') }}</label>
                        <input id="phone" type="string" name="phone" class="form-input mt-3"
                            placeholder="{{ __('Enter Phone Number') }}" value="{{ old('phone') }}" required>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                @else
                    <div class="mb-4">
                        <label class="font-medium" for="otp">{{ __('Enter OTP') }}</label>
                        <input id="otp" type="string" name="otp" class="form-input mt-3" placeholder="123456"
                            value="{{ old('otp') }}" required>
                        <x-input-error :messages="$errors->get('otp')" class="mt-2" />
                    </div>
                @endif


                <div class="mb-4">
                    <button type="submit"
                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ auth()->user()->phone ? __('Verify OTP') : __('Send OTP') }}</button>
                </div>
            </div>
        </form>

        @if (auth()->user()->phone)
            <div class="text-center">
                <span class="text-slate-400 me-2">{{ __('Did not received email?') }}</span>
                <span class="text-black dark:text-white font-bold cursor-pointer"
                    onclick="document.getElementById('resend-otp').submit();">{{ __('Resend OTP') }}</span>
                <form id="resend-otp" action="{{ route('phone.send') }}" method="POST">
                    @csrf
                </form>
            </div>
        @endif
    </div>
</x-auth-layout>
