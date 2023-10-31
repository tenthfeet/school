<form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf
    {{-- Email --}}
    <div class="fromGroup">
        <label for="email" class="block capitalize form-label">{{ __('Email') }}</label>
        <div class="relative ">
            <input type="email" name="email" id="email"
                class="form-control py-2 @error('email') !border !border-red-500 @enderror"
                placeholder="{{ __('Type your email') }}" autofocus
                value="{{ old('email') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>
    </div>

    {{-- Password --}}
    <div class="fromGroup">
        <label for="password" class="block capitalize form-label">{{ __('Password') }}</label>
        <div class="relative ">
            <input type="password" name="password" class="form-control py-2 @error('password') !border !border-red-500 @enderror" placeholder="{{ __('Password') }}" id="password" autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>
    </div>


    {{-- Remember Me checkbox --}}
    <div class="flex justify-between">
        <div class="checkbox-area">
            <label class="inline-flex items-center cursor-pointer" for="remember_me">
                <input type="checkbox" class="hidden" name="remember" id="remember_me">
                <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                    <img src="images/icon/ck-white.svg" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>
                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6">{{ __('Keep me signed in') }}</span>
            </label>
        </div>
        <a href="{{ route('password.request') }}" class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium">
            {{ __('Forgot your password?') }}
        </a>
    </div>

    <button type="submit"
            class="btn btn-dark block w-full text-center">
        {{ __('Sign In') }}
    </button>
</form>
