<x-app-layout>
    <x-slot:breadcrumb> Attandance </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Attendance </div>
        <div class="card-body">
            <form id="attendance-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control reset" name="date">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">Fore Noon</label>
                        <select class="form-control reset" name="fore_noon">
                            <option value="">--Select FN Attendance--</option>
                            {!! optionsFromArray($attendance) !!}
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label">After Noon</label>
                        <select class="form-control reset" name="after_noon">
                            <option value="">--Select AN Attendance--</option>
                            {!! optionsFromArray($attendance) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Student Id</label>
                        <input type="text" class="form-control reset" name="id_no">
                    </div>
                </div>
                <div class="mb-3 flex justify-center">
                    <div class="col-md-4 d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header card-title">List of Attendance</div>
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
                                    Student Id</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Date</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Fore Noon</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    After Noon</th>
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
        @vite('resources/js/pages/master/attendance.js')
    </x-slot:script>

</x-app-layout>
