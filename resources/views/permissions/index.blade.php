<x-app-layout>
    <div>
        <div class="mb-6">
            {{--Breadcrumb--}}
            <x-breadcrumb :pageTitle="$pageTitle" :breadcrumbItems="$breadcrumbItems" />
        </div>

        {{-- Alert start --}}
        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" />
        @endif
        {{-- Alert end --}}

        <div class="card">
            <header class=" card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    {{-- Create Button start--}}
                    @can('permission create')
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('permissions.create') }}">
                        <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                        {{ __('New') }}
                    </a>
                    @endcan
                    {{--Refresh Button start--}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('permissions.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl "></iconify-icon>
                    </a>
                </div>
                <div class="justify-center flex flex-wrap sm:flex items-center lg:justify-end gap-3">
                    <div class="relative w-full sm:w-auto flex items-center">
                        <form id="searchForm" method="get" action="{{ route('permissions.index') }}">
                            <input name="q" type="text" class="inputField pl-8 p-2 border border-slate-200 dark:border-slate-700 rounded-md dark:bg-slate-900" placeholder="Search" value="{{ request()->q }}">
                        </form>
                        <iconify-icon class="absolute text-textColor left-2 dark:text-white" icon="quill:search-alt"></iconify-icon>
                    </div>
                </div>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th ">
                                            {{ __('Sl No') }}
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('Created At') }}
                                        </th>
                                        <th scope="col" class="table-th w-20">
                                            {{ __('Action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($permissions as $permission)
                                    <tr class="border border-slate-100 dark:border-slate-900 relative">
                                        <td class="table-td sticky left-0"># {{ $permission->id }}</td>
                                        <td class="table-td">
                                            <span>{{ $permission->name }}</span>
                                        </td>
                                        <td class="table-td">{{ $permission->created_at->toFormattedDateString() }}</td>
                                        <td class="table-td">
                                            <div class="action-btns space-x-2 flex">
                                                {{-- Edit --}}
                                                @can('permission update')
                                                <a class="action-btn" href="{{ route('permissions.edit', ['permission' => $permission]) }}">
                                                    <iconify-icon icon="uil:edit"></iconify-icon>
                                                </a>
                                                @endcan
                                                {{-- delete --}}
                                                @can('permission delete')
                                                <form id="deleteForm{{ $permission->id }}" method="POST" action="{{ route('permissions.destroy', $permission) }}" class="cursor-pointer">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="action-btn" onclick="sweetAlertDelete(event, 'deleteForm{{ $permission->id }}')" type="submit">
                                                        <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                    </a>
                                                </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="border border-slate-100 dark:border-slate-900 relative">
                                        <td class="table-cell text-center" colspan="5">
                                            <img src="images/result-not-found.svg" alt="page not found" class="w-64 m-auto" />
                                            <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No results found.') }}</h2>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <x-table-footer :per-page-route-name="'permissions.index'" :data="$permissions" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function sweetAlertDelete(event, formId) {
            event.preventDefault();
            let form = document.getElementById(formId);
            Swal.fire({
                title: '@lang('Are you sure ? ')',
                icon : 'question',
                showDenyButton: true,
                confirmButtonText: '@lang('Delete ')',
                denyButtonText: '@lang('Cancel ')',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
    @endpush
</x-app-layout>