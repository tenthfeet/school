<x-app-layout>
    <div class="space-y-8">
        <div class="block sm:flex items-center justify-between mb-6">
            {{-- Breadcrumb --}}
            <x-breadcrumb :pageTitle="$pageTitle" :breadcrumbItems="$breadcrumbItems" />

            <div class="text-end">
                <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('roles.index') }}">
                    <iconify-icon class="text-lg mr-1" icon="ic:outline-arrow-back"></iconify-icon>
                    </iconify-icon>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
        {{-- Role Permission Card --}}
        <div class="rounded-md overflow-hidden">
            <div class="bg-white dark:bg-slate-800 px-5 py-7 ">
                <form method="POST" action="{{ route('roles.update', $role) }}">
                    @csrf
                    @method('PUT')


                    {{--Name input end--}}
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control"
                               placeholder="{{ __('Enter your role name') }}" value="{{ $role->name }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <h3 class="font-semibold text-2xl text-black dark:text-white py-5 mt-8">Update Permission</h3>
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">

                        @foreach ($permissionModules as $key => $permissionModule)
                            <div class="card border border-slate-200">
                                <div class="card-header bg-slate-100 !p-3">
                                    <h4 class="p-0 text-lg uppercase">{{ __($key) }}</h4>
                                </div>
                                <!-- Card Body Start -->
                                <div class="p-4">
                                    <ul>
                                        @foreach ($permissionModule as $permission)
                                            <li @class(['permissionCardList', 'singlePermissionCardList' => ($loop->count == 1)])>
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label for="{{$permission->name}}" class="inputText">
                                                        {{ __($permission->name) }}
                                                    </label>

                                                    <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                                                        <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                            <input name="permissions[]"
                                                                @checked(in_array($permission->id, $rolePermissions))
                                                                id="{{$permission->name}}"
                                                                value="{{ $permission->id }}"
                                                                type="checkbox"
                                                                class="sr-only peer">
                                                            <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500"></div>
                                                            <span class="absolute left-1 z-20 text-xs text-white font-Inter font-normal opacity-0 peer-checked:opacity-100">On</span>
                                                            <span class="absolute right-1 z-20 text-xs text-white font-Inter font-normal opacity-100 peer-checked:opacity-0">Off</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Card Body End -->
                            </div>
                        @endforeach
                    </div>
                    <button class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 mt-4 !px-3 !py-2">
                        <span class="flex items-center">
                            <iconify-icon class="ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                            <span> @lang('Save Changes')</span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
