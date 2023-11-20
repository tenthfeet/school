<x-app-layout>
    <x-slot:breadcrumb> User </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new User </div>
        <div class="card-body">
            <form id="user-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Employee No</label>
                        <input type="text" class="form-control reset" name="employee_no">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control reset" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <div class="flex items-stretch inputGroup">
                            <div class="flex-none w-1/4">
                                <select class="form-control" name="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->iso_code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input class="form-control reset" type="number" name="mobile_no">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-control reset" name="state_id">
                            <option value="">-- Select State --</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <select class="form-control reset" name="city_id">
                            <option value=""></option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea type="text" class="form-control reset" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control reset" name="date_of_birth">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date Of Join</label>
                        <input type="date" class="form-control reset" name="date_of_join">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role Id</label>
                        <select class="form-control reset" name="role_id">
                            <option value="">-- Select Role Id --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Qualification</label>
                        <input type="text" class="form-control reset" name="qualification">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            {!! optionsFromArray($status) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Teacher</label>
                        <input type="checkbox"name="is_teacher" value="1" checked>
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
        <div class="card-header card-title">List of Users</div>
        <div class="card-body">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden">
                    <table id="list"
                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="border-t border-slate-100 dark:border-slate-800">
                            <tr class="table-primary">
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">#</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Employee No</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Name</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Email</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Mobile No</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">State</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">City</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Status</th>
                                <th scope="col" class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">Actions</th>
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
        @vite('resources/js/pages/master/user.js')
    </x-slot:script>

</x-app-layout>
