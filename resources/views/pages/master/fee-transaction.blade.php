<x-app-layout>
    <x-slot:breadcrumb> Fee Transaction </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Transaction </div>
        <div class="card-body">
            <form id="fee-transaction-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Payment Id</label>
                        <input type="number" class="form-control reset" name="payment_id">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Paid Date</label>
                        <input type="date" class="form-control reset" name="Paid_date">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Payment Mode</label>
                        <select class="form-control reset" name="payment_mode">
                            <option value=""></option>
                           {!! optionsFromArray($paymentMode) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control reset" name="amount">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ref No</label>
                        <input type="number" class="form-control reset" name="ref_no">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bank Name</label>
                        <input type="text" class="form-control reset" name="bank_name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Document Date</label>
                        <input type="date" class="form-control reset" name="document_date">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Note</label>
                        <input type="text area" class="form-control reset" name="note">
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
        <div class="card-header card-title">List of Fee Transaction</div>
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
                                    Payment Id</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Paid Date</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Payment Mode</th>
                                    <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Term</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Amount</th>
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
        @vite('resources/js/pages/master/feeTransaction.js')
    </x-slot:script>

</x-app-layout>
