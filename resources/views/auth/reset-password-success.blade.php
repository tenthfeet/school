<x-guest-layout>
    <div class="auth-box h-full flex flex-col justify-center">
        <div class="mobile-logo text-center mb-6 lg:hidden flex justify-center">
            <div class="mb-10 inline-flex items-center justify-center">
                <x-application-logo />
                <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
            </div>
        </div>
        <div class="flex-col sm:flex items-center justify-center relative py-8 sm:py-10 lg:py-0">
            <div class="w-full px-4 sm:px-0 sm:w-[450px]">
                <div class="text-center">
                    <h3 class="text-2xl text-black pb-3 font-bold">
                        {{ $status }}
                    </h3>
                    <p class="text-base text-textColor font-light">
                        {{ __('Your password has been reset successfully. Close this window and login to you account.') }}
                    </p>

                    <a href="{{ config('app.is_api_project') ? config('app.frontend_url') : config('app.url') }}" class="inline-block w-full bg-slate-900 hover:bg-gray-800 transition-all duration-500 text-white py-3 px-3 text-base font-medium rounded-md sm:mt-8 mt-8">
                        {{ __('Go back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>