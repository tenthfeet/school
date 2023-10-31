<x-app-layout>
    <x-slot:breadcrumb> Permission Group </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Permission Group </div>
        <div class="card-body">
            <form id="permission-group-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="flex justify-center">
                    <div class="md:w-1/3">
                        <div class="form-group">
                            <label class="form-label">Permission group name</label>
                            <input type="text" class="reset form-control" name="name">
                        </div>
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

    <div class="card mb-3">
        <div class="card-header card-title">List of Permission group</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table id="list" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="border-t border-slate-100 dark:border-slate-800">
                            <tr class="table-primary">
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Permission group</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/permissionGroup.js')
    </x-slot:script>
</x-app-layout>
