<x-app-layout>
    <x-slot:breadcrumb> Class </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Class </div>
        <div class="card-body">
            <form id="class-name-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row justify-content-center">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Medium Of Study</label>
                        <select class="form-control reset" name="medium_of_study">
                            <option value="">Select Medium Of Study</option>
                            @foreach ($mediumofStudies as $mediumofStudy)
                                <option value="{{ $mediumofStudy->id }}"
                                    @isset($data){{ $data->$mediumofStudy_id == $mediumofStudy->id ? 'selected' : '' }} @endisset>
                                    {{ $mediumofStudy->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Class Name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1"
                                @isset($data){{ $data->is_active == 1 ? 'selected' : '' }} @endisset>
                                Active
                            </option>
                            <option value="0"
                                @isset($data){{ $data->is_active == 0 ? 'selected' : '' }} @endisset>
                                Inactive
                            </option>
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
        <div class="card-header">List of Class</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Medium Of Study</th>
                        <th>Class Name</th>
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
        @vite('resources/js/pages/master/className.js')
    </x-slot:script>

</x-app-layout>
