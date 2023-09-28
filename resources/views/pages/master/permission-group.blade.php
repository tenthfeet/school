<x-app-layout>
    <x-slot:breadcrumb> Permission Group </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Permission Group </div>
        <div class="card-body">
            <form id="permission-group-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Permission group name</label>
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

    <div class="card mb-3">
        <div class="card-header">List of Permission group</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Permission group</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/permissionGroup.js')
    </x-slot:script>

</x-app-layout>
