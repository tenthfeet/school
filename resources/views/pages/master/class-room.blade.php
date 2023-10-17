<x-app-layout>
    <x-slot:breadcrumb> Class </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Class </div>
        <div class="card-body">
            <form id="class-room-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Academic Standard</label>
                        <select class="form-control reset" name="academic_standard_id">
                            <option value="">-- Select Acadeic Standard --</option>
                            @foreach ($academicStandards as $academicStandard)
                                <option value="{{ $academicStandard->id }}">
                                    {{ $academicStandard->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Department</label>
                        <select class="form-control reset" name="department_id">
                            <option value="">-- Select Department --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Section</label>
                        <input type="text" class="form-control reset" name="section">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Class Name</label>
                        <input type="text" class="form-control reset" name="name" readonly>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1">
                                Active
                            </option>
                            <option value="0">
                                Inactive
                            </option>
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
        <div class="card-header">List of Class</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Academic Year</th>
                        <th>Department</th>
                        <th>Section</th>
                        <th>Class Name</th>
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
        @vite('resources/js/pages/master/classRoom.js')
    </x-slot:script>

</x-app-layout>
