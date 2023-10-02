<x-app-layout>
    <x-slot:breadcrumb> Permissions  </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Permission  </div>
        <div class="card-body ">
            <form id="permission-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Permission group</label>
                        <select class="form-control" name="permission_group_id">
                        </select>
                    </div>
                    
                    <div class="col-md-4 form-group">
                        <label class="form-label">Permission name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
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
    <div class="card">
        <div class="card-header">List of Permissions</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Permission group</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/permission.js')
    </x-slot:script>

</x-app-layout>
