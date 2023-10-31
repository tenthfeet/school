<x-app-layout>
    <div>
        <div class="mb-6">
            {{--Breadcrumb start--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
            {{--Breadcrumb end--}}
        </div>

        {{--Backup List Table Start--}}
        <div class="card mb-5">
            <header class=" card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    <h3 class="font-medium text-lg text-black font-Inter dark:text-white text-center mb-5 lg:mb-0 lg:text-left">{{ __('Backup Monitor') }}</h3>
                </div>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th sticky left-0">
                                            #
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('DISK') }}
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('HEALTHY') }}
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('AMOUNT OF BACKUPS') }}
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('NEWEST BACKUP') }}
                                        </th>
                                        <th scope="col" class="table-th">
                                            {{ __('USED STORAGE') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse($databaseBackupList as $item)
                                    <tr class="border border-slate-100 dark:border-slate-900 relative">
                                        <td class="table-td sticky left-0">
                                            # {{ $loop->iteration }}
                                        </td>
                                        <td class="table-td">
                                            {{ $item['disk'] }}
                                        </td>
                                        <td class="table-td">
                                            @if($item['healthy'])
                                            <span class="badge badge-success">
                                                {{ __('success') }}
                                            </span>
                                            @else
                                            <span class="badge badge-danger">
                                                {{ __('danger') }}
                                            </span>
                                            @endif
                                        </td>
                                        <td class="table-td">
                                            {{ $item['amount'] }}
                                        </td>
                                        <td class="table-td">
                                            {{ $item['newest'] }}
                                        </td>
                                        <td class="table-td">
                                            {{ $item['usedStorage'] }}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Backup List Table End--}}

        {{--Alert start--}}
        @if (session('message'))
        <x-alert :message="session('message')" :type="'success'" class="mt-3" />
        @endif
        @if (session('error'))
        <x-alert :message="session('error')" :type="'danger'" />
        @endif
        {{--Alert end--}}

        {{--Files table start--}}
        <div class="card mt-5">
            <header class=" card-header noborder">
                <h3 class="font-medium text-lg text-black font-Inter dark:text-white text-center mb-5 lg:mb-0 lg:text-left">{{ __('Backup List') }}</h3>
                <div class="justify-center sm:justify-end flex  gap-3 items-center flex-wrap">
                    {{--Refresh Button start--}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('database-backups.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl "></iconify-icon>
                    </a>

                    @can('database_backup create')
                    {{-- Create Button start--}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('database-backups.create') }}">
                        <iconify-icon icon="iconoir:database-backup" class="text-lg mr-1">
                        </iconify-icon>
                        {{ __('Take Backup') }}
                    </a>
                    @endcan

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
                                            #
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('PATH') }}
                                        </th>
                                        <th scope="col" class="table-th ">
                                            {{ __('DATE') }}
                                        </th>
                                        <th scope="col" class="table-th w-20">
                                            {{ __('SIZE') }}
                                        </th>
                                        <th scope="col" class="table-th w-20">
                                            {{ __('ACTION') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                    @forelse($files as $key => $item)
                                    <tr class="border border-slate-100 dark:border-slate-900 relative">
                                        <td class="table-td sticky left-0">
                                            # {{ $loop->iteration }}
                                        </td>
                                        <td class="table-td">
                                            {{ $item['path'] }}
                                        </td>
                                        <td class="table-td">
                                            {{ date("F jS, Y", strtotime($item['date'])) }}
                                        </td>
                                        <td class="table-td whitespace-nowrap">
                                            {{ $item['size'] }}
                                        </td>
                                        <td class="table-td">
                                            <div class="action-btns space-x-2 flex">
                                                @can('database_backup download')
                                                <a class="action-btn" href="{{ route('database-backups.download', ['fileName'=>$item['file_name']]) }}">
                                                    <iconify-icon icon="material-symbols:download"></iconify-icon>
                                                </a>
                                                @endcan

                                                @can('database_backup delete')
                                                <form id="deleteForm{{$key}}" method="POST" action="{{ route('database-backups.destroy', $key) }}" class="cursor-pointer">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="action-btn" onclick="sweetAlertDelete(event, 'deleteForm{{ $key }}')" type="submit">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--Files table end--}}
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