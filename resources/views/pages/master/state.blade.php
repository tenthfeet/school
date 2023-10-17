<x-app-layout>
    <x-slot:breadcrumb> State </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new State </div>
        <div class="card-body">
            <form id="state-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row justify-content-center">
                    <div class="col-md-4 form-group">
                        <label class="form-label">State</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">State Code</label>
                        <input type="number" class="form-control reset" name="code">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1">
                                Active
                            </option>
                            <option value="0">
                                Inactive</option>
                        </select>
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
        <div class="card-header">List of States</div>
        <div class="card-body">
            <table id="lists" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>State</th>
                        <th>State Code</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/state.js')
    </x-slot:script>

</x-app-layout>
