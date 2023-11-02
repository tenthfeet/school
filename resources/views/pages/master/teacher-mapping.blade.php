<x-app-layout>
    <x-slot:breadcrumb> Teacher Mapping </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header  card-title">Add new Teacher Mapping </div>
        <div class="card-body">
            <form id="teacher-mapping-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
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
                </div>
                <div class="mb-3 flex justify-center">
                    <div class="flex justify-around md:w-1/3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header  card-title">List of Teacher Mappings</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="list"
                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="border-t border-slate-100 dark:border-slate-800">
                            <tr class="table-primary">
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Teacher Name</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Academic Year</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Class Name</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Day</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Class Period</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/teacherMapping.js')
    </x-slot:script>

</x-app-layout>
