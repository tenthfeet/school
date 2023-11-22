<x-app-layout>
    <x-slot:breadcrumb> Attendance </x-slot:breadcrumb>

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Add new Attendance</div>
                    </div>
                </header>
                <div class="card-text h-full">
                    <form class="space-y-4" id="attendance-form">
                        @csrf
                        <input type="hidden" name="id" class="reset">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="input-area">
                                <label class="form-label">Date</label>
                                <div class="relative">
                                    <input type="date" class="form-control reset" name="date">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Fore Noon</label>
                                <div class="relative">
                                    <select class="form-control reset" name="fore_noon">
                                        <option value="">--Select FN Attendance--</option>
                                        {!! optionsFromArray($attendance) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">After Noon</label>
                                <div class="relative">
                                    <select class="form-control reset" name="after_noon">
                                        <option value="">--Select AN Attendance--</option>
                                        {!! optionsFromArray($attendance) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Student Id</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="id_no">
                                </div>
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
            <div class="card-header card-title">List of Attendance</div>
            <div class="card-body">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table id="list"
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="border-t border-slate-100 dark:border-slate-800">
                                <tr class="table-primary">
                                    <th scope="col"
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        #
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
