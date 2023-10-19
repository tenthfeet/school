<x-app-layout>
    <x-slot:breadcrumb> Fees Bundle</x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Fee Bundle </div>
        <div class="card-body">
            <form id="fees-bundle-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Bundle Name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Academic Year</label>
                        <select class="form-select reset" name="academic_year_id">
                            <option value="">--Select Academic Year--</option>
                            @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">
                                    {{ $academicYear->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Standard</label>
                        <select class="form-select reset" name="academic_standard_id">
                            <option value="">--Select Standard--</option>
                            @foreach ($academicStandards as $academicStandard)
                                <option value="{{ $academicStandard->id }}">
                                    {{ $academicStandard->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Total amount</label>
                        <input type="number" class="form-control reset" name="total_amount" readonly>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Due date</label>
                        <input type="date" class="form-control reset" name="due_date">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Penalty Amount</label>
                        <input type="number" class="form-control reset" name="penalty_amount">
                    </div>
                    <div class="col-md-8 form-group">
                        <label class="form-label">Fee Details</label>
                        <select class="form-select reset" multiple name="fee_details_id[]">
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="is_active">
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
        <div class="card-header">List of Fee Bundle</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Academic Year</th>
                        <th>Academic Standard</th>
                        <th>Total amount</th>
                        <th>Due date</th>
                        <th>Penalty Amount</th>
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
        @vite('resources/js/pages/master/feesBundle.js')
    </x-slot:script>

</x-app-layout>
