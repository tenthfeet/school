{{-- Currently, selected lang --}}
@php
    $currentLang = app()->getLocale();
    $currentLangFlag = config('app.available_locales')[$currentLang];
    $availableLocales = config('app.available_locales');
@endphp

<div class="relative leading-0">
    <button
        @click="listView = !listView"
        class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
            inline-flex items-center"
        type="button"
        data-bs-toggle="dropdown"
        aria-expanded="false">
        <iconify-icon class="text-lg mr-2" icon="emojione:flag-for-{{ $currentLangFlag }}"></iconify-icon>
        <span class="dropdown-option">{{ strtoupper($currentLang) }}</span>
    </button>
    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-20 dark:bg-slate-800 border dark:border-slate-900 !top-[25px] rounded-md
    overflow-hidden">
        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200" :class="listView ? 'z-20 opacity-100 top-[55px]' : 'opacity-0 -z-20 top-5' "
            x-show="listView" @click.away="listView = false">
            @foreach($availableLocales as $locale => $flag)
                <li>
                    <a href="{{ route('setlocale',['locale' => $locale]) }}" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white
                    {{ $currentLang == $locale ? 'bg-slate-100 dark:bg-slate-800' : ''}}">
                        <iconify-icon class="text-lg mt-1" icon="emojione:flag-for-{{ $flag }}">
                        </iconify-icon>
                        <span class="dropdown-option ml-2">{{ strtoupper($locale) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
