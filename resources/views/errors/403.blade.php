<x-error-layout>
    <div class="bg-slate-100 dark:bg-slate-900">
        <div class="min-h-screen flex flex-col justify-center items-center text-center py-20">
            <img src="{{ asset('/images/403.svg') }}" alt="image" />
            <div class="max-w-[546px] mx-auto w-full mt-12">
                <h4 class="text-slate-900 mb-4 font-Inter text-3xl leading-9 font-semibold">{{ __('Access Denied') }}</h4>
                <div class="text-slate-600 dark:text-slate-300 text-base font-normal mb-8">
                    {{ __('You don\'t have permission to view this page.') }}
                </div>
            </div>
            <div class="max-w-[300px] mx-auto w-full">
                <a href="{{ route('dashboard.index') }}" class="defaultButton">
                    {{ __('Go To Homepage') }}
                </a>
            </div>
        </div>
    </div>
</x-error-layout>