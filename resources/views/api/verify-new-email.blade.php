<x-guest-layout>
    <div class="flex-col sm:flex items-center justify-center relative py-8 sm:py-10 lg:py-0">
        <div class="w-full px-4 sms:px-0 sm:w-[450px]">
            <div class="text-center">
                <h3 class=" text-2xl text-black pb-3 font-bold">
                    {{ $message }}
                </h3>
                @isset($frontend_url)
                    <a href="{{ $frontend_url }}"
                       class="inline-block w-full bg-black hover:bg-gray-800 transition-all duration-500 text-white py-3 px-3 text-base font-medium rounded-md sm:mt-8 mt-8">
                        {{ __('Sign In') }}
                    </a>
                @endisset
            </div>

        </div>
    </div>
</x-guest-layout>
