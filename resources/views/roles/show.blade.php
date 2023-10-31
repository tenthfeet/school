<x-app-layout>
    <div class="space-y-8">
        <div class="block sm:flex items-center justify-between mb-6">
            {{-- Breadcrumb --}}
            <x-breadcrumb :pageTitle="$pageTitle" :breadcrumbItems="$breadcrumbItems" />

            <div class="justify-end flex gap-3 items-center flex-wrap">
                {{-- Refresh Button start --}}
                <a class="defaultButton px-3" href="{{ route('roles.show', $role) }}">
                    <iconify-icon icon="mdi:refresh" class="text-xl "></iconify-icon>
                </a>
                {{-- Back Button start --}}
                <a class="defaultButton" href="{{ route('roles.index') }}">
                    <iconify-icon class="text-lg mr-1" icon="ic:outline-arrow-back"></iconify-icon>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        {{-- Role Permission Card --}}
        <div class="rounded-md overflow-hidden">
            <div class="bg-white dark:bg-slate-800 px-5 py-7 ">
                <div class="input-group">
                    <label for="name" class="inputLabel text-xl">
                        {{ __('Role Name') }}
                    </label>
                    <input type="text" id="name" class="inputField2 w-full disabled:opacity-90"
                        placeholder="{{ __('Enter your role name') }}" value="{{ $role->name }}" disabled>
                </div>
                <h3 class="font-Inter font-semibold text-2xl text-slate-900 dark:text-white py-5">
                    {{ __('Permissions') }}
                </h3>
                <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">

                    @foreach ($permissionModules as $key => $permissionModule)
                        <div class=" rolePermission">
                            <div class="permissionCardHead">
                                <h4 class="permissionCardTitle">{{ __($key) }}</h4>
                            </div>
                            <ul class="" x-bind:class="open ? 'py-5 h-auto' : ' py-0 h-0'">
                                @foreach ($permissionModule as $permission)
                                    <li @class([
                                        'permissionCardList',
                                        'singlePermissionCardList' => $loop->count == 1,
                                    ])>
                                        <div class="flex items-center justify-between gap-x-3">
                                            <label for="checkbox1" class="inputText">
                                                {{ __($permission->name) }}
                                            </label>
                                            <input @checked(in_array($permission->id, $rolePermissions)) type="checkbox"
                                                class="checkbox-style disabled:opacity-50" disabled>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
