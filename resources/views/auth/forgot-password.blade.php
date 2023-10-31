<x-guest-layout>
    <div class="auth-box h-full flex flex-col justify-center">
        <div class="mobile-logo text-center mb-6 lg:hidden flex justify-center">
            <div class="mb-10 inline-flex items-center justify-center">
                <x-application-logo />
                <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
            </div>
        </div>
        <div class="w-full px-4 sms:px-0 sm:w-[480px]">
            <div class="text-center">
                <h4 class="font-medium">
                    {{ __('Forgot Your Password?') }}
                </h4>
                <p class="font-light text-sm sm:text-base text-textColor">
                    {{ __('Reset Password with Dashcode.') }}
                </p>
                <p class="bg-slate-100 mt-8 px-4 py-3 font-semibold text-xs sm:text-base text-textColor ">
                    {{ __('Enter your Email and instructions will be sent to you!') }}
                </p>
            </div>
            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                {{-- Email --}}
                <div class="mt-3">
                    <label for="email" class="block capitalize form-label">
                        {{ __('Email') }}
                    </label>
                    <input type="email" name="email" id="email" class="form-control py-2 " placeholder="{{ __('Type your email') }}" required value="{{ old('email') }}">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <button type="submit" class="btn btn-dark block w-full text-center mt-3">
                    {{ __('Send recovery email') }}
                </button>
            </form>
            <p class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
                {{ __('Remember your password?') }}
                <a href="{{ route('login') }}" class="text-slate-900 dark:text-white font-medium hover:underline">
                    {{ __('Sign In') }}
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>