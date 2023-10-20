<x-app-layout>
    <x-slot:breadcrumb> Subject Mapping </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Subject Mapping </div>
        <div class="card-body">
            <form id="subject-mapping-form">
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
                        <label class="form-label">Class Room Name</label>
                        <select class="form-control reset" name="class_room_id">
                            <option value="">-- Select Class Room Name--</option>
                            @foreach ($classRooms as $classRoom)
                                <option value="{{ $classRoom->id }}">
                                    {{ $classRoom->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Day</label>
                        <select class="form-control reset" name="day">
                            <option value="">-- Select Day --</option>
                            {!! optionsFromArray($days) !!}
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Class Period</label>
                        <select class="form-control reset" name="class_period_id">
                            <option value="">-- Select Class Period--</option>
                            @foreach ($classPeriods as $classPeriod)
                                <option value="{{ $classPeriod->id }}">
                                    {{ $classPeriod->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Subject Name</label>
                        <select class="form-control reset" name="subject_id">
                            <option value="">-- Select Subject Name --</option>
                            @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">
                                {{ $subject->name }}
                            </option>
                        @endforeach
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
        <div class="card-header">List of Subject Mappings</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Academic Year</th>
                        <th>Class Name</th>
                        <th>Day</th>
                        <th>Class Period</th>
                        <th>Subject</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/subjectMapping.js')
    </x-slot:script>

</x-app-layout>
