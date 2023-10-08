<x-app-layout>
    <x-slot:breadcrumb> Fees </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Fee </div>
        <div class="card-body">
            <form id="fee-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row justify-content-center">
                    <div class="col-md-3 form-group">
                        <label class="form-label">Fee Name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">Fee Type</label>
                        <input type="text" class="form-control reset" name="fee_type">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">Fee Amount</label>
                        <input type="number" class="form-control reset" name="fee_amount">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control reset" name="is_active">
                            <option value="1"
                                @isset($data){{ $data->is_active == 1 ? 'selected' : '' }} @endisset>
                                Active
                            </option>
                            <option value="0"
                                @isset($data){{ $data->is_active == 0 ? 'selected' : '' }} @endisset>
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
        <div class="card-header">List of Fees</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Fee Name</th>
                        <th>Fee Type</th>
                        <th>Fee Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/fee.js')
    </x-slot:script>

</x-app-layout>
