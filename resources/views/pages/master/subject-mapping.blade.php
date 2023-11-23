<x-app-layout>
    <x-slot:breadcrumb> Subject Mapping </x-slot:breadcrumb>

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Add new Subject Mapping</div>
                    </div>
                </header>
                <div class="card-text h-full">
                    <form class="space-y-4" id="subject-mapping-form">
                        @csrf
                        <input type="hidden" name="id" class="reset">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="input-area">
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
                            <div class="input-area">
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
                            <div class="input-area">
                                <label class="form-label">Day</label>
                                <select class="form-control reset" name="day">
                                    <option value="">-- Select Day --</option>
                                    {!! optionsFromArray($days) !!}
                                </select>
                            </div>
                            <div class="input-area">
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
                            <div class="input-area">
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
                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="btn btn-dark inline-flex text-center">Submit</button>
                            <button type="reset" class="btn flex justify-center btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                <div class="card">
                    <div class="card-header card-title">List of Subject Mappings</div>
                    <div class="card-body">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden">
                                <table id="list"
                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                    <thead class="border-t border-slate-100 dark:border-slate-800">
                                        <tr class="table-primary">
                                            <th scope="col"
                                                class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                                #</th>
                                            <th scope="col"
                                                class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                                Academic Year</th>
                                            <th scope="col"
                                                class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                                Class Name</th>
                                            <th scope="col"
                                                class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                                Day</th>
                                            <th scope="col"
                                                class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                                Class Period</th>
                                            <th scope="col"
                                                class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                                Subject</th>
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
                    @vite('resources/js/pages/master/subjectMapping.js')
                </x-slot:script>

</x-app-layout>
