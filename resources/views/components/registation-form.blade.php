<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    {{-- Name --}}
    <div class="fromGroup">
        <label for="name" class="block capitalize form-label">
            {{ __('Name') }}
        </label>
        <input type="text" name="name" id="name"
            class="form-control py-2 @error('name') !border !border-red-500 @enderror"
            placeholder="{{ __('Type your full name') }}" required autofocus value="{{ old('name') }}">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    {{-- Email --}}
    <div class="fromGroup">
        <label for="email" class="block capitalize form-label">
            {{ __('Email') }}
        </label>
        <input type="email" name="email" id="email"
            class="form-control py-2 @error('email') !border !border-red-500 @enderror"
            placeholder="{{ __('Type your email') }}" required value="{{ old('email') }}">
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    {{-- Password --}}
    <div class="fromGroup">
        <label for="password" class="block capitalize form-label">
            {{ __('Password') }}
        </label>
        <input type="password" name="password" id="password"
            class="form-control py-2 @error('password') !border !border-red-500 @enderror"
            placeholder="{{ __('Password') }}" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    {{-- Confirm Password --}}
    <div class="fromGroup">
        <label for="password_confirmation" class="block capitalize form-label">
            {{ __('Confirm Password') }}
        </label>
        <input type="password" name="password_confirmation"
            id="password_confirmation"
            class="form-control py-2 @error('password_confirmation') !border !border-red-500 @enderror"
            placeholder="{{ __('Confirm Password') }}" required autocomplete="password_confirmation">
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    {{-- Terms & Condition Checkbox --}}
    <div class="flex justify-between">
        <div class="checkbox-area">
            <label class="inline-flex items-center cursor-pointer" for="checkbox">
                <input type="checkbox" class="hidden" name="terms" id="checkbox" required>
                <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                    <img src="/images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">{{ __('You accept our Terms and Conditions and Privacy Policy') }}</span>
            </label>
        </div>
        <x-input-error :messages="$errors->get('terms')" class="mt-2" />
    </div>

    <button type="submit" class="btn btn-dark block w-full text-center">
        {{ __('Create an account') }}
    </button>
</form>
