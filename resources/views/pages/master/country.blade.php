<x-app-layout>
    <x-slot:breadcrumb> Country </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Country </div>
        <div class="card-body">
            <form id="country-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row justify-content-center">
                    <div class="col-md-3 form-group">
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">ISO Code</label>
                        <input type="text" class="form-control reset" name="iso_code">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">Mobile Code</label>
                        <input type="number" class="form-control reset" name="mobile_code">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
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
        <div class="card-header">List of Countries</div>
        <div class="card-body">
            <table id="lists" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Country</th>
                        <th>ISO Code</th>
                        <th>Mobile Code</th>
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
        @vite('resources/js/pages/master/country.js')
    </x-slot:script>

</x-app-layout>
