<x-app-layout>
    <x-slot:breadcrumb> Roles </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Role </div>
        <div class="card-body">
            <form id="role-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row justify-content-center">
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


                <div class="row justify-content-center">
                    <div class="col-md-4 d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">List of Role</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/role.js')
    </x-slot:script>

</x-app-layout>
