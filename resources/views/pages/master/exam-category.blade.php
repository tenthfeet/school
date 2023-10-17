<x-app-layout>
    <x-slot:breadcrumb> Exam Category </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Exam Category </div>
        <div class="card-body">
            <form id="exam-category-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label class="form-label">Exam Category</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-5 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1">
                                Active
                            </option>
                            <option value="0">
                                Inactive</option>
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
        <div class="card-header">List of Exam Categories</div>
        <div class="card-body">
            <table id="lists" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Exam Category</th>
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
        @vite('resources/js/pages/master/examCategory.js')
    </x-slot:script>

</x-app-layout>
