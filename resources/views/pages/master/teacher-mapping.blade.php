<x-app-layout>
    <x-slot:breadcrumb> Teacher Mapping </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Teacher Mapping </div>
        <div class="card-body">
            <form id="teacher-mapping-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Teacher Name</label>
                        <select class="form-control reset" name="user_id">
                            <option value="">-- Select Teacher Name --</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                        </select>
                    </div>
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
                            <option value="">-- Select Class Name--</option>
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
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
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
        <div class="card-header">List of Teacher Mappings</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Teacher Name</th>
                        <th>Academic Year</th>
                        <th>Class Name</th>
                        <th>Day</th>
                        <th>Class Period</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/teacherMapping.js')
    </x-slot:script>

</x-app-layout>
