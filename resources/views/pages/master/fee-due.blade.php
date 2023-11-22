<x-app-layout>
    <x-slot:breadcrumb> Fee Due </x-slot:breadcrumb>

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Add new Fee Due</div>
                    </div>
                </header>
                <div class="card-text h-full">
                    <form class="space-y-4" id="fee-due-form">
                        @csrf
                        <input type="hidden" name="id" class="reset">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="input-area">
                                <label class="form-label">Academic Years</label>
                                <div class="relative">
                                    <select class="form-control reset" name="academic_year_id">
                                        {!! optionsFromArray($academicYears, '', 'Academic Year') !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Academic Standard</label>
                                <div class="relative">
                                    <select class="form-control reset" name="academic_standard_id">
                                        {!! optionsFromArray($academicStandards, '', 'Academic Standard') !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Term</label>
                                <div class="relative">
                                    <select class="form-control reset" name="term_id">
                                        {!! optionsFromArray($terms, '', 'Term') !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Student Id</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="id_no">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Total Amount</label>
                                <div class="relative">
                                    <input type="number" class="form-control reset" name="total_amount">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Paid Amount</label>
                                <div class="relative">
                                    <input type="number" class="form-control reset" name="paid_amount">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Pending Amount</label>
                                <div class="relative">
                                    <input type="number" class="form-control reset" name="pending_amount">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Penalty Applied?</label>
                                <div class="relative">
                                    <select class="form-control reset" name="is_penalty_applied">
                                        <option value=""></option>
                                        {!! optionsFromArray($penaltyApplied) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Penalty Amount</label>
                                <div class="relative">
                                    <input type="number" class="form-control reset" name="penalty_amount">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Next Due Date</label>
                                <div class="relative">
                                    <input type="date" class="form-control reset" name="next_due_date">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Partial Payment?</label>
                                <div class="relative">
                                    <select class="form-control" name="partial_payment">
                                        <option value=""></option>
                                        {!! optionsFromArray($partialPayment) !!}
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
            </div>
        </div>
                
                <div class="card">
                    <div class="card-header card-title">List of Fee Due</div>
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
