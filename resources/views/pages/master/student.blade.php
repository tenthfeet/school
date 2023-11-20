<x-app-layout>
    <x-slot:breadcrumb> Student Details </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header card-title">Add new Student </div>
        <div class="card-body ">
            <h5 class="text-primary mb-3">Student Details</h5>
            <form id="student-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Student name</label>
                        <input type="text" class="form-control reset" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Student Id</label>
                        <input type="text" class="form-control reset" name="id_no">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control reset" name="date_of_birth">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <select class="form-control reset" name="gender">
                            <option value="">--Select Gender--</option>
                            {!! optionsFromArray($gender) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"> Date of joining</label>
                        <input type="date" class="form-control reset" name="date_of_joining">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Aadhar No</label>
                        <input type="number" class="form-control reset" name="aadhar_no">
                    </div>
                    <div class="form-group">
                        <label class="form-label"> Blood Group</label>
                        <select class="form-control reset" name="blood_group">
                            <option value="">--Select blood group--</option>
                            {!! optionsFromArray($bloodGroup) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mother Tounge</label>
                        <select class="form-control reset" name="mother_tounge_id">
                            <option value="">--Select Mother Tounge--</option>
                            {!! optionsFromArray($languages, '', 'Language') !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="flex justify-start">
                            <label class="form-label">Photo</label>
                            <a id="student-photo" href="" data-lightbox="student"
                                class="btn btn-sm btn-outline-primary d-none">View
                            </a>
                        </div>
                        <input type="file" class="form-control reset" name="photo_path">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control reset" name="student_status_id">
                            <option value="">--Select Status--</option>
                            {!! optionsFromArray($status) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Having Siblings</label>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="has_sibling"></label>
                            <input class="form-check-input" name="has_sibling" type="checkbox" id="has_sibling"
                                value="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sibling Id</label>
                        <select name="sibling_id" class="form-control" disabled></select>
                    </div>
                </div>
                <h5 class="text-primary mb-3">Parent Details </h5>
                <div class="grid gap-2 md:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Father's Name</label>
                        <input type="text" class="form-control reset" name="father_name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mother's Name</label>
                        <input type="text" class="form-control reset" name="mother_name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Father's Occupation</label>
                        <input type="text" class="form-control reset" name="father_occupation">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mother's Occupation</label>
                        <input type="text" class="form-control reset" name="mother_occupation">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control reset" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile No </label>
                        <div class="flex items-stretch inputGroup">
                            <div class="flex-none w-1/4">
                                <select class=" form-control" name="country_id">
                            {!! optionsFromArray($countries, '', 'Country') !!}
                                </select>
                            </div>
                            <div class="flex-1">
                                <input type="number" class="form-control reset" name="mobile_no">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-control reset" name="state_id">
                            {!! optionsFromArray($states, '', 'State') !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <select class="form-control reset" name="city_id" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control reset" name="address">
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pincode</label>
                        <input type="number" class="form-control reset" name="pincode">
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
    <div class="card mb-3">
        <div class="card-header card-title">List of Students</div>
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
                                    Student Id</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Student Name</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Date of Birth</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Gender</th>
                                <th scope="col"
                                    class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                    Status</th>
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
        @vite('resources/js/pages/master/student.js')
    </x-slot:script>

</x-app-layout>
