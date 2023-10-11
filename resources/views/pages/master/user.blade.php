<x-app-layout>
    <x-slot:breadcrumb> User </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new User </div>
        <div class="card-body">
            <form id="user-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Employee No</label>
                        <input type="text" class="form-control reset" name="employee_no">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control reset" name="email">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Mobile Number</label>
                        <div class="input-group">
                            <span class="input-group-select">
                            <select class="form-select  col-md-4" name="country_id">
                                <option value="91">IND</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        @isset($data){{ $data->country_id == $country->id ? 'selected' : '' }} @endisset>
                                        {{ $country->iso_code }}
                                    </option>
                                @endforeach
                            </select>
                            </span>
                            <input class="form-control reset col-md-8" type="number" name="mobile_no">
                        </div>
                    </div>

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
                        <select class="form-control reset" name="city_id">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Address</label>
                        <textarea type="text" class="form-control reset" name="address"></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control reset" name="date_of_birth">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Date Of Join</label>
                        <input type="date" class="form-control reset" name="date_of_join">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Role Id</label>
                        <select class="form-control reset" name="role_id">
                            <option value="">Select Role Id</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    @isset($data){{ $data->role_id == $role->id ? 'selected' : '' }} @endisset>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Qualification</label>
                        <input type="text" class="form-control reset" name="qualification">
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
        <div class="card-header">List of Users</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Employee No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
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
        @vite('resources/js/pages/master/user.js')
    </x-slot:script>

</x-app-layout>
