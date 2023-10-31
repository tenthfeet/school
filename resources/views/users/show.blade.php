<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        {{--Breadcrumb end--}}

        <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6 max-w-4xl m-auto">

            <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                <div class="input-group">
                    {{--Name input start--}}
                    <label for="name" class="font-Inter font-medium text-sm text-textColor dark:text-white pb-2 inline-block">
                        {{ __('Name') }}
                    </label>
                    <input name="name" type="text" id="name" class="p-3 py-2 rounded bg-slate-200 dark:bg-slate-900 dark:text-slate-300 w-full cursor-not-allowed"
                           placeholder="{{ __('Enter your name') }}" value="{{ $user->name }}" disabled>
                </div>
                {{--Name input end--}}
                {{--Email input start--}}
                <div class="input-group">
                    <label for="email" class="font-Inter font-medium text-sm text-textColor dark:text-white pb-2 inline-block">
                        {{ __('Email') }}
                    </label>
                    <input name="email" type="email" id="email" class="p-3 py-2 rounded bg-slate-200 dark:bg-slate-900 dark:text-slate-300 w-full cursor-not-allowed"
                           placeholder="{{ __('Enter your email') }}" value="{{ $user->email }}" required disabled>
                </div>
                {{--Email input end--}}
            </div>
        </div>

    </div>
</x-app-layout>
