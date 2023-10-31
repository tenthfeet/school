<x-app-layout>
    <x-slot:breadcrumb> Permissions </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Permission </div>
        <div class="card-body">
            <form id="permission-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Permission group</label>
                        <select class="form-control" name="permission_group_id">
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="form-label">Permission name</label>
                        <input type="text" class="reset form-control" name="name">
                    </div>
                </div>

                <div class="mb-3 flex justify-center">
                    <div class="flex justify-around md:w-1/3">
                        <button type="submit" class="btn-primary btn">Submit</button>
                        <button type="reset" class="btn-warning btn">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header card-title">List of Permissions</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="list" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="border-t border-slate-100 dark:border-slate-800">
                            <tr class="table-primary">
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Permission group</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Permissions</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/permission.js')
    </x-slot:script>

</x-app-layout>
