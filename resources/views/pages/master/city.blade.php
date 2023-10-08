<x-app-layout>
    <x-slot:breadcrumb> City </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new City </div>
        <div class="card-body">
            <form id="city-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row justify-content-center">
                    <div class="col-md-4 form-group">
                        <label class="form-label">State</label>
                        <select class="form-control reset" name="state_id">
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}"
                                    @isset($data){{ $data->state_id == $state->id ? 'selected' : '' }} @endisset>
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control reset" name="is_active">
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
        <div class="card-header">List of Cities</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>State</th>
                        <th>City</th>
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
        @vite('resources/js/pages/master/city.js')
    </x-slot:script>

</x-app-layout>
