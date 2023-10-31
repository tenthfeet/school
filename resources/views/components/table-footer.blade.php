@props([
    'perPageRouteName',
    'data',
])

<div class="flex flex-wrap gap-3 items-center justify-between pt-8 px-8">
    <div class="font-medium text-sm text-textColor dark:text-white flex items-center">
        <div class="border border-slate-200 dark:border-slate-700 p-2 rounded">
            <form id="perPageForm" method="get" action="{{ route($perPageRouteName) }}">
                <select class="dark:bg-slate-800" x-on:change="document.getElementById('perPageForm').submit()" name="per_page"
                        id="tableRow" class="dropdownTableSelect">
                    <option value="10" @selected(request()->per_page == 10)>
                        {{ __('10') }}
                    </option>
                    <option value="15" @selected(request()->per_page == 15)>
                        {{ __('15') }}
                    </option>
                    <option value="25" @selected(request()->per_page == 25)>
                        {{ __('25') }}
                    </option>
                </select>
            </form>
        </div>
    </div>
    <div>
        {{-- Pagination Links Start--}}
        {{ $data->links() }}
        {{-- Pagination Links End--}}
    </div>
</div>
