<x-app-layout>
    <x-slot:breadcrumb> Fee Detail </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Fee Detail </div>
        <div class="card-body">
            <form id="fee-detail-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Academic Year</label>
                        <select class="form-control reset" name="academic_year_id">
                            <option value="">-- Select Academic Year --</option>
                            @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">
                                    {{ $academicYear->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Academic Standard</label>
                        <select class="form-control reset" name="academic_standard_id">
                            <option value="">-- Select Academic Standard --</option>
                            @foreach ($academicStandards as $academicStandard)
                                <option value="{{ $academicStandard->id }}">
                                    {{ $academicStandard->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Fee Name</label>
                        <select class="form-control reset" name="fee_id">
                            <option value="">-- Select Fee Name --</option>
                            @foreach ($fees as $fee)
                                <option value="{{ $fee->id }}">
                                    {{ $fee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Fee Amount</label>
                        <input type="number" class="form-control reset" name="fee_amount">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            {!! optionsFromArray($status) !!}
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
        <div class="card-header">List of Fee Details</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Academic Year</th>
                        <th>Academic Standard</th>
                        <th>Fee Name</th>
                        <th>Fee Amount</th>
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
        @vite('resources/js/pages/master/feeDetail.js')
    </x-slot:script>

</x-app-layout>
