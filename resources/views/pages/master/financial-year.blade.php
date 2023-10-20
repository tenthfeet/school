<x-app-layout>
    <x-slot:breadcrumb> Financial Year </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Financial Year </div>
        <div class="card-body">
            <form id="financial-year-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label class="form-label">Financial Year</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-5 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            {!! optionsFromArray($status) !!}
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">List of Financial Years</div>
        <div class="card-body">
            <table id="lists" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Financial Year</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:script>
        @vite('resources/js/pages/master/financialYear.js')
    </x-slot:script>

</x-app-layout>
