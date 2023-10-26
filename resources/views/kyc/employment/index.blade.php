<x-auth-layout>
    <x-slot name="heading">
        {{ __('More about you') }}
    </x-slot>

    <div class="grid grid-cols-1">
        <p class="text-slate-400 mb-6">
            {{ __('Our regulator, DFSA, asks for this information to keep your rights protected.') }}</p>

        <form class="ltr:text-left rtl:text-right" method="POST" action="{{ route('user_info.store') }}">
            @csrf
            <div class="grid grid-cols-1">
                <div class="mb-4">
                    <label class="font-medium" for="employment_status">{{ __('What is your employment status?') }}</label>
                    <select name="employment_status" id="employment_status" class="form-input mt-3" required>
                        <option value="">{{ __('Select Option') }}</option>
                        @foreach ($employment_status as $value => $status)
                            <option value="{{ $value }}" @selected(old('employment_status') === $value)>{{ $status }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('employment_status')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label class="font-medium" for="wealth_source">{{ __('Wealth Source') }}</label>
                    <select name="wealth_source" id="wealth_source" class="form-input mt-3" required>
                        <option value="">{{ __('Select Option') }}</option>
                        @foreach ($wealth_source as $value => $source)
                            <option value="{{ $value }}" @selected(old('wealth_source') === $value)> {{ $source }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('wealth_source')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="btn bg-green-600 hover:bg-green-700 text-white rounded-md w-full">{{ __('Proceed') }}</button>
                </div>
            </div>
        </form>
    </div>

</x-auth-layout>
