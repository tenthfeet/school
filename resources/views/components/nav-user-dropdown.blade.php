<div class="md:block hidden w-full leading-0">
    <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
        inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
            <img class="block w-full h-full object-cover rounded-full" src="{{
                auth()->user()->getFirstMediaUrl('profile-image', 'preview') ?:
                Avatar::create(auth()->user()->name)->toBase64() }}" alt="user" />
        </div>
        <div class="ltr:text-left rtl:text-right">
            <span
                class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">
                {{ Str::limit(Auth::user()->name, 20) }}
            </span>
            <!-- <small class="text-[9px] block">{{ auth()->user()->roles()->first()?->name }}</small> -->
        </div>
        <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]"
            aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    <!-- Dropdown menu -->
    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
        overflow-hidden">
        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200" :class="listView ? 'z-20 opacity-100 top-[61px]' : 'opacity-0 -z-20 top-5' " x-show="listView" @click.away="listView = false">
            <li>
                <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                      dark:text-white font-normal">
                    <iconify-icon class="text-lg text-textColor dark:text-white mr-2" icon="carbon:user-avatar">
                    </iconify-icon>
                    <span class="dropdown-option">
                        @lang('Profile')
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('general-settings.show') }}" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                      dark:text-white font-normal" @class(['country-list', 'active'=>
                    request()->routeIs('general-settings.edit')])>
                    <iconify-icon class="text-lg text-textColor dark:text-white mr-2" icon="material-symbols:settings-outline">
                    </iconify-icon>
                    <span class="dropdown-option">
                        @lang('Settings')
                    </span>
                </a>
            </li>
            {{-- Logout --}}
            <li>
                <form method="POST" action="{{ route('logout') }}" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                      dark:text-white font-normal">
                    @csrf
                    <button type="submit" class="country-list flex items-start">
                        <iconify-icon class="text-lg text-textColor dark:text-white mr-2" icon="carbon:logout">
                        </iconify-icon>
                        <span class="dropdown-option">
                            @lang('Log Out')
                        </span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
