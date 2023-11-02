<x-app-layout>
    <x-slot:breadcrumb> Class </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Class </div>
        <div class="card-body">
            <form id="class-room-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
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
                    <div class="form-group">
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
                    <div class="form-group">
                        <label class="form-label">Section</label>
                        <input type="text" class="form-control reset" name="section">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Class Name</label>
                        <input type="text" class="form-control reset" name="name" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            {!! optionsFromArray($status) !!}
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
        <div class="card-header card-title">List of Class</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="list"
                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="border-t border-slate-100 dark:border-slate-800">
                            <tr class="table-primary">
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#
                                </th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Academic Year</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Department</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Section</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Class Name</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Status</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Actions</th>
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
        @vite('resources/js/pages/master/classRoom.js')
    </x-slot:script>

</x-app-layout>
