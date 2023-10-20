<x-app-layout>
    <x-slot:breadcrumb> Exam </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Exam </div>
        <div class="card-body">
            <form id="exam-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Exam Category</label>
                        <select class="form-control reset" name="exam_category_id">
                            <option value="">-- Select Exam Category --</option>
                            @foreach ($examCategories as $examCategory)
                                <option value="{{ $examCategory->id }}">
                                    {{ $examCategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="form-label">Class Name</label>
                        <select class="form-control reset" name="class_room_id">
                            <option value="">-- Select Class Name --</option>
                            @foreach ($classRooms as $classRoom)
                                <option value="{{ $classRoom->id }}">
                                    {{ $classRoom->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">-- Medium Of Study --</label>
                        <select class="form-control reset" name="medium_of_study_id">
                            <option value="">Select Medium Of Study</option>
                            @foreach ($mediumofStudies as $mediumofStudy)
                                <option value="{{ $mediumofStudy->id }}">
                                    {{ $mediumofStudy->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Subject</label>
                        <input type="text" class="form-control reset" name="subject">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control reset" name="date">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Session</label>
                        <select class="form-control" name="session">
                            <option value="1">
                                FN
                            </option>
                            <option value="2">
                                AN
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
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
        <div class="card-header">List of Exams</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Exam Category</th>
                        <th>Medium</th>
                        <th>Class Name</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Session</th>
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
        @vite('resources/js/pages/master/exam.js')
    </x-slot:script>

</x-app-layout>
