<x-app-layout>
    <div class="space-y-8">
        <div>
          <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        <div class=" space-y-5">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="space-y-6">
                            <div class="flex space-x-3 items-center rtl:space-x-reverse">
                                <div class="flex-none h-8 w-8 rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300 flex flex-col items-center
                                        justify-center text-lg">
                                    <iconify-icon icon="heroicons:building-office-2"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                                    Company Settings
                                </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-300 text-sm">
                                Set up your company profile, add your company logo, and more
                            </div>
                            <a href="{{ route('general-settings.edit') }}"
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                    dark:text-slate-300">
                                <span>Chnage Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-6">
                        <div class="space-y-6">
                            <div class="flex space-x-3 items-center rtl:space-x-reverse">
                                <div class="flex-none h-8 w-8 rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300 flex flex-col items-center
                                        justify-center text-lg">
                                    <iconify-icon icon="heroicons:user-circle"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                                    User
                                </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-300 text-sm">
                                Manage system user(Add, edit delete users).
                            </div>
                            <a href="{{ route('users.index') }}"
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                    dark:text-slate-300">
                                <span>Manage user</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-6">
                        <div class="space-y-6">
                            <div class="flex space-x-3 items-center rtl:space-x-reverse">
                                <div class="flex-none h-8 w-8 rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300 flex flex-col items-center
                                        justify-center text-lg">
                                    <iconify-icon icon="heroicons:lock-closed"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                                    Role
                                </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-300 text-sm">
                                Manage Role (Add, Edit, Delete role)
                            </div>
                            <a href="{{ route('roles.index') }}"
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                    dark:text-slate-300">
                                <span>Chnage Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-6">
                        <div class="space-y-6">
                            <div class="flex space-x-3 items-center rtl:space-x-reverse">
                                <div class="flex-none h-8 w-8 rounded-full bg-slate-800 dark:bg-slate-700 text-slate-300 flex flex-col items-center
                                        justify-center text-lg">
                                    <iconify-icon icon="heroicons:lock-closed"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                                    Permission
                                </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-300 text-sm">
                                Manage Permission (Add, Edit, Delete Permission)
                            </div>
                            <a href="{{ route('permissions.index') }}"
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                    dark:text-slate-300">
                                <span>Chnage Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-6">
                        <div class="space-y-6">
                            <div class="flex space-x-3 rtl:space-x-reverse items-center">
                                <div class="flex-none h-8 w-8 rounded-full bg-slate-800 text-white flex flex-col items-center justify-center text-lg">
                                    <iconify-icon icon="heroicons:user"></iconify-icon>
                                </div>
                                <div class="flex-1 text-base text-slate-900 dark:text-white font-medium">
                                    Profile Settings
                                </div>
                            </div>
                            <div class="text-slate-600 dark:text-slate-300 text-sm">
                                Set up your profile, add your profile photo, and more
                            </div>
                            <a
                                href="{{ route('profiles.index') }}"
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse text-sm capitalize font-medium text-slate-600
                                    dark:text-slate-300">
                                <span>Chnage Settings</span>
                                <iconify-icon icon="heroicons:arrow-right"></iconify-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
