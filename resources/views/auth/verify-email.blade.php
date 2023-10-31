<x-guest-layout>
    <div class="auth-box h-full flex flex-col justify-center">
        <div class="mobile-logo text-center mb-6 lg:hidden flex justify-center">
            <div class="mb-10 inline-flex items-center justify-center">
                <x-application-logo />
                <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
            </div>
        </div>
        <div class="flex-col sm:flex items-center justify-center relative py-8 sm:py-10 lg:py-0">
            <div class="w-full px-4 sms:px-0 sm:w-[450px]">
                <div class="text-center">
                    <h4 class="font-medium">
                        {{ __('Verify Your Email Address') }}
                    </h4>
                    <p class="text-base text-textColor font-light">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </p>

                    @if (session('status') == 'verification-link-sent')
                    <p class="text-base text-black mt-5 font-bold text-indigo-500">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>
                    @endif
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 transition-all duration-500 text-white py-3 px-3 text-base font-medium rounded-md mt-8 dark:text-white">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>