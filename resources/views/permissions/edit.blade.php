<x-app-layout>
    <div class="md:w-2/3 mx-auto">
        {{--Breadcrumb start--}}
        <div class="block sm:flex items-center justify-between mb-6">

            {{--Breadcrumb--}}
            <x-breadcrumb :pageTitle="$pageTitle" :breadcrumbItems="$breadcrumbItems"/>

            <div class="text-end">
                <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('permissions.index') }}">
                    <iconify-icon class="text-lg mr-1" icon="ic:outline-arrow-back"></iconify-icon>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        {{--Breadcrumb end--}}

        {{--Edit Permission form start--}}
        <form method="POST" action="{{ route('permissions.update', $permission) }}">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6 space-y-4">

                {{-- module name--}}
                <div class="input-area">
                    <label for="name" class="form-label">
                        {{ __('Module Name') }}
                    </label>
                    <input name="module_name" type="text" id="name" class="form-control"
                           placeholder="{{ __('Enter your module name') }}" value="{{ $permission->permissionModuleName }}" required>
                    <x-input-error :messages="$errors->get('module_name')" class="mt-2"/>
                </div>
                {{--Name input start--}}
                <div class="input-area">
                    <label for="name" class="form-label">
                        {{ __('Permission Name') }}
                    </label>
                    <input name="name" type="text" id="name" class="form-control"
                           placeholder="{{ __('Enter permission name') }}" value="{{ $permission->name }}" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <x-input-error :messages="$errors->get('permission_name')" class="mt-2"/>
                {{--Name input end--}}

                <button type="submit" class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 mt-4 !px-3 !py-2">
                    <span class="flex items-center">
                        <iconify-icon class="ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>{{ __('Save Changes') }}</span>
                    </span>
                </button>
            </div>

        </form>
        {{--Edit Permission form end--}}
    </div>
</x-app-layout>
