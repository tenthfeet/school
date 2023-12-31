<x-app-layout>
    <x-slot:breadcrumb> Roles </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Role </div>
        <div class="card-body">
            <form id="role-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="col-md-4 form-group">
                        <label>Role Name</label>
                        <input class="form-control reset" name="name">
                    </div>
                </div>

                <div class="row mb-3">
                    @foreach ($permissionGroups as $permissionGroup)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white">
                                    {{ $permissionGroup->name }}
                                    <div class="float-end">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="group_{{ $permissionGroup->id }}"
                                                onchange="handlePermissionGroupState(this)">
                                            <label class="form-check-label" for="group_{{ $permissionGroup->id }}">
                                                Select all
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($permissionGroup->permissions as $permission)
                                            <div class="form-group col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                                        value="{{ $permission->id }}"
                                                        id="permission_{{ $permission->id }}"
                                                        onchange="handlePermissionStateChange(this)">
                                                    <label class="form-check-label"
                                                        for="permission_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="mb-3 flex justify-center">
                    <div class="flex justify-around md:w-1/3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header card-title">List of Role</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden">
                <table id="list"
                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                    <thead class="border-t border-slate-100 dark:border-slate-800">
                        <tr class="table-primary">
                            <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#</th>
                            <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Role</th>
                            <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Action</th>
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
        @vite('resources/js/pages/master/role.js')
    </x-slot:script>

</x-app-layout>
