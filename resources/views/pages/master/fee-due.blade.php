<x-app-layout>
    <x-slot:breadcrumb> Fee Due </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Attendance </div>
        <div class="card-body">
            <form id="fee-due-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Academic Years</label>
                        <select class="form-control reset" name="academic_year_id">
                            <option value="">-- Select Academic Year --</option>
                            @foreach ($academicYears as $academicYear)
                                <option value="{{ $academicYear->id }}">
                                    {{ $academicYear->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
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
                        <label class="form-label">Term</label>
                        <select class="form-control reset" name="term_id">
                            <option value="">-- Select Term --</option>
                            @foreach ($terms as $terms)
                                <option value="{{ $term->id }}">
                                    {{ $term->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Student Id</label>
                        <input type="text" class="form-control reset" name="id_no">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Total Amount</label>
                        <input type="number" class="form-control reset" name="total_amount">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Paid Amount</label>
                        <input type="number" class="form-control reset" name="paid_amount">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pending Amount</label>
                        <input type="number" class="form-control reset" name="pending_amount">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penalty Applied?</label>
                        <select class="form-control reset" name="is_penalty_applied">
                            <option value=""></option>
                           {!! optionsFromArray($penaltyApplied) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penalty Amount</label>
                        <input type="number" class="form-control reset" name="penalty_amount">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Next Due Date</label>
                        <input type="date" class="form-control reset" name="next_due_date">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Partial Payment?</label>
                        <select class="form-control" name="partial_payment">
                            <option value=""></option>
                           {!! optionsFromArray($partialPayment) !!}
                        </select>
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
                                    Academic Year</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Academic Standard</th>
                                    <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Term</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Total Amount</th>
                                    <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Pending Amount</th>
                                    <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Penalty Amount</th>
                                    <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Next Due Date</th>
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
        @vite('resources/js/pages/master/feeDue.js')
    </x-slot:script>

</x-app-layout>
