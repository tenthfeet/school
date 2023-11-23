<x-app-layout>
    <x-slot:breadcrumb> Student Details </x-slot:breadcrumb>

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Add new Student</div>
                    </div>
                </header>
                <div class="card-text h-full">
                    <h5 class="text-primary mb-3">Student Details</h5>
                    <form id="student-form">
                        @csrf
                        <input type="hidden" name="id" class="reset">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="input-area">
                                <label class="form-label">Student name</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="name">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Student Id</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="id_no">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Date of Birth</label>
                                <div class="relative">
                                    <input type="date" class="form-control reset" name="date_of_birth">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Gender</label>
                                <div class="relative">
                                    <select class="form-control reset" name="gender">
                                        <option value="">--Select Gender--</option>
                                        {!! optionsFromArray($gender) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label"> Date of joining</label>
                                <div class="relative">
                                    <input type="date" class="form-control reset" name="date_of_joining">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Aadhar No</label>
                                <div class="relative">
                                    <input type="number" class="form-control reset" name="aadhar_no">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label"> Blood Group</label>
                                <div class="relative">
                                    <select class="form-control reset" name="blood_group">
                                        <option value="">--Select blood group--</option>
                                        {!! optionsFromArray($bloodGroup) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Mother Tounge</label>
                                <div class="relative">
                                    <select class="form-control reset" name="mother_tounge_id">
                                        <option value="">--Select Mother Tounge--</option>
                                        {!! optionsFromArray($languages, '', 'Language') !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <div class="flex justify-start">
                                    <label class="form-label">Photo</label>
                                    <a id="student-photo" href="" data-lightbox="student"
                                        class="btn btn-sm btn-outline-primary d-none">View
                                    </a>
                                </div>
                                <input type="file" class="form-control reset" name="photo_path">
                            </div>
                            <div class="input-area">
                                <label class="form-label">Status</label>
                                <div class="relative">
                                    <select class="form-control reset" name="student_status_id">
                                        <option value="">--Select Status--</option>
                                        {!! optionsFromArray($status) !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Having Siblings</label>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="has_sibling"></label>
                                    <div class="relative">
                                        <input class="form-check-input" name="has_sibling" type="checkbox" id="has_sibling"
                                        value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Sibling Id</label>
                                <div class="relative">
                                    <select name="sibling_id" class="form-control" disabled></select>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-primary mb-3">Parent Details </h5>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="input-area">
                                <label class="form-label">Father's Name</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="father_name">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Mother's Name</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="mother_name">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Father's Occupation</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="father_occupation">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Mother's Occupation</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="mother_occupation">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Email</label>
                                <div class="relative">
                                    <input type="email" class="form-control reset" name="email">
                                </div>
                            </div>
                            <div class="input-area">
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
                            <div class="input-area">
                                <label class="form-label">State</label>
                                <div class="relative">
                                    <select class="form-control reset" name="state_id">
                                        {!! optionsFromArray($states, '', 'State') !!}
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">City</label>
                                <div class="relative">
                                    <select class="form-control reset" name="city_id" required>
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Address</label>
                                <div class="relative">
                                    <textarea class="form-control reset" name="address">
                                    </textarea>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Pincode</label>
                                <div class="relative">
                                    <input type="number" class="form-control reset" name="pincode">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="btn btn-dark inline-flex text-center">Submit</button>
                            <button type="reset" class="btn flex justify-center btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
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
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        #
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
