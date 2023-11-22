<x-app-layout>
    <x-slot:breadcrumb> Mark </x-slot:breadcrumb>

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Add new Mark Detail</div>
                    </div>
                </header>
    <div class="card-text h-full">
        <form class="space-y-4" id="mark-form">
            @csrf
            <input type="hidden" name="id" class="reset">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="input-area">
                    <label class="form-label">Academic Year</label>
                    <div class="relative">
                        <select class="form-control reset" name="academic_year_id">
                            <option value="">-- Select Academic Year --</option>
                            @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">
                                    {{ $academicYear->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-area">
                    <label class="form-label">Student</label>
                    <div class="relative">
                        <select class="form-control reset" name="student_admission_id">
                            <option value="">-- Select Student Name --</option>
                            @foreach ($studentAdmissions as $studentAdmission)
                                <option value="{{ $studentAdmission->id }}">
                                    {{ $studentAdmission->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-area">
                    <label class="form-label">Exam</label>
                    <div class="relative">
                        <select class="form-control reset" name="exam_id">
                            <option value="">-- Select Exam --</option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}">
                                    {{ $exam->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-area">
                    <label class="form-label">Class Room Name</label>
                    <div class="relative">
                        <select class="form-control reset" name="class_room_id">
                            <option value="">-- Select Class Room Name --</option>
                            @foreach ($classRooms as $classRoom)
                                <option value="{{ $classRoom->id }}">
                                    {{ $classRoom->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-area">
                    <label class="form-label">Subject Name</label>
                    <div class="relative">
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
                <div class="input-area">
                    <label class="form-label">Marks</label>
                    <div class="relative">
                        <input type="number" class="form-control reset" name="marks">
                    </div>
                </div>
                <div class="input-area">
                    <label class="form-label">Maximum Marks</label>
                    <div class="relative">
                        <input type="number" class="form-control reset" name="maximum_marks">
                    </div>
                </div>
                <div class="input-area">
                    <label class="form-label">Pass Marks</label>
                    <div class="relative">
                        <input type="number" class="form-control reset" name="pass_marks">
                    </div>
                </div>
                <div class="input-area">
                    <label class="form-label">Grade</label>
                    <div class="relative">
                        <select class="form-control reset" name="grade_id">
                            <option value="">-- Select Grade --</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">
                                    {{ $grade->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="submit" class="btn btn-dark inline-flex text-center">Submit</button>
                <button type="reset" class="btn flex justify-center btn-danger">Cancel</button>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header card-title">List of Marks</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="lists"
                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="border-t border-slate-100 dark:border-slate-800">
                            <tr class="table-primary">
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Student</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Class Name</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Exam</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Subject</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Marks</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Grade</th>
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
        @vite('resources/js/pages/master/mark.js')
    </x-slot:script>

</x-app-layout>
