<x-app-layout>
    <x-slot:breadcrumb> Student Details </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Student </div>
        <div class="card-body ">
            <h5 class="text-primary mb-3">Student Details</h5>
            <form id="student-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Student name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Student Id</label>
                        <input type="text" class="form-control reset" name="id_no">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control reset" name="date_of_birth">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label"> Gender</label>
                        <select class="form-select reset" name="gender">
                            <option value="">--Select gender--</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label"> Date of joining</label>
                        <input type="date" class="form-control reset" name="date_of_joining">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Aadhar No</label>
                        <input type="number" class="form-control reset" name="aadhar_no">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label"> Blood Group</label>
                        <select class="form-select reset" name="blood_group">
                            <option value="">--Select blood group--</option>
                            <option value="1">B+</option>
                            <option value="2">O+</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Mother Tounge</label>
                        <select class="form-select reset" name="mother_tounge_id">
                            <option value="">--Select Mother Tounge--</option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}">
                                    {{ $language->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Photo</label>
                        <a id="student-photo" href="" data-lightbox="student"
                            class="btn btn-sm btn-outline-primary py-0 d-none">View
                        </a>
                        <input type="file" class="form-control reset" name="photo_path">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select reset" name="student_status_id">
                            <option value="">--Select Status--</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Having Siblings</label>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="has_sibling"></label>
                            <input class="form-check-input" name="has_sibling" type="checkbox" id="has_sibling"
                                value="1">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Sibling Id</label>
                        <select name="sibling_id" class="form-control" disabled></select>
                    </div>
                    <h5 class="text-primary mb-3">Parent Details </h5>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="form-label">Father's Name</label>
                            <input type="text" class="form-control reset" name="father_name">
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">Mother's Name</label>
                            <input type="text" class="form-control reset" name="mother_name">
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">Father's Occupation</label>
                            <input type="text" class="form-control reset" name="father_occupation">
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">Mother's Occupation</label>
                            <input type="text" class="form-control reset" name="mother_occupation">
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control reset" name="email">
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">Mobile No </label>
                            <div class="input-group">
                                <div class="col-md-3">
                                    <select class=" form-select" name="country_id">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">
                                                {{ $country->iso_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="number" class="form-control reset" name="mobile_no">
                            </div>

                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">State</label>
                            <select class="form-select reset" name="state_id">
                                <option value="">--Select State--</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">City</label>
                            <select class="form-select reset" name="city_id" required>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">Address</label>
                            <textarea class="form-control reset" name="address">
                            </textarea>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label">Pincode</label>
                            <input type="number" class="form-control reset" name="pincode">
                        </div>
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
    <div class="card mb-3">
        <div class="card-header">List of Students</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
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
        @vite('resources/js/pages/master/student.js')
    </x-slot:script>

</x-app-layout>
