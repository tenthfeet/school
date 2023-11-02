<x-app-layout>
    <x-slot:breadcrumb> Student Status </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Student Status </div>
        <div class="card-body">
            <form id="status-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Student Status</label>
                        <input type="text" class="form-control reset" name="name">
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
        <div class="card-header card-title">List of Student Statuses</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="lists"
                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="border-t border-slate-100 dark:border-slate-800">
                            <tr class="table-primary">
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#
                                </th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Student Status</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Action</th>
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
        @vite('resources/js/pages/master/status.js')
    </x-slot:script>

</x-app-layout>
