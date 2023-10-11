<x-app-layout>
    <x-slot:breadcrumb> Academic Year </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Academic Year </div>
        <div class="card-body">
            <form id="academic-year-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label class="form-label">Satrt Date</label>
                        <input type="date" class="form-control reset" name="start_date">
                    </div>
                    <div class="col-md-5 form-group">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-control reset" name="end_date">
                    </div>
                    <div class="col-md-5 form-group">
                        <label class="form-label">Academic Year</label>
                        <input type="text" class="form-control reset" name="academic_year" readonly>
                    </div>
                    <div class="col-md-5 form-group">
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
        <div class="card-header">List of Academic Years</div>
        <div class="card-body">
            <table id="lists" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Academic Year</th>
                        <th>Start Date</th>
                        <th>End Date</th>
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
        @vite('resources/js/pages/master/academicYear.js')
    </x-slot:script>

</x-app-layout>
