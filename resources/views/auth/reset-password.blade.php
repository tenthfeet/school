<x-guest-layout>
    <div class="auth-box h-full flex flex-col justify-center">
        <div class="w-full px-4 sms:px-0 sm:w-[450px]">
            <div class="mobile-logo text-center mb-6 lg:hidden flex justify-center">
                <div class="mb-10 inline-flex items-center justify-center">
                    <x-application-logo />
                    <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
                </div>
            </div>
            <div class="text-center">
                <h4 class="font-medium">{{ __('Reset password') }}</h4>
            </div>
            <form method="POST" action="{{ route('password.update') }}" class="mt-8 md:mt-12">
                @csrf
                {{-- Password Reset Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                {{-- Email --}}
                <div class="mt-3">
                    <label for="email" class="font-medium text-sm text-textColor mb-2 inline-block">
                        {{ __('Email') }}
                    </label>
                    <input type="email" name="email" id="email" class="w-full border border-slate-300 bg-[#FBFBFB] py-[10px] px-4 outline-none focus:outline-none focus:ring-0 focus:border-[#000000] shadow-none rounded-md text-base text-black read-only:cursor-not-allowed read-only:bg-slate-200" placeholder="{{ __('Type your email') }}" required readonly value="{{ $request->email }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="mt-4 relative">
                    <label for="password" class="font-medium text-sm text-textColor mb-2 inline-block">
                        {{ __('Password') }}
                    </label>
                    <input type="password" name="password" id="password" class="w-full border border-slate-300 bg-[#FBFBFB] py-[10px] px-4 outline-none focus:outline-none focus:ring-0 focus:border-[#000000] shadow-none rounded-md text-base text-black pr-11" placeholder="{{ __('New Password') }}" required autocomplete="new-password">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                {{-- Confirm Password --}}
                <div class="mt-4 relative">
                    <label for="password_confirmation" class="font-medium text-sm text-textColor mb-2 inline-block">
                        {{ __(' Confirm Password') }}
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-slate-300 bg-[#FBFBFB] py-[10px] px-4 outline-none focus:outline-none focus:ring-0 focus:border-[#000000] shadow-none rounded-md text-base text-black pr-11" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 transition-all duration-500 text-white py-3 px-3 text-base font-medium rounded-md mt-8">
                    {{ __('Reset password') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>