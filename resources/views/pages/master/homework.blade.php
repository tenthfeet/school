<x-app-layout>
    <x-slot:breadcrumb> Homework </x-slot:breadcrumb>

    <div class="card mb-3">
        <div class="card-header">Add new Homework </div>
        <div class="card-body">
            <form id="homework-form">
                @csrf
                <input type="hidden" name="id" class="reset">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">Class Name</label>
                        <select class="form-control reset" name="class_room_id">
                            <option value="">-- Select Class Name--</option>
                            @foreach ($classRooms as $classRoom)
                                <option value="{{ $classRoom->id }}">
                                    {{ $classRoom->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Subject</label>
                        <select class="form-control reset" name="subject_id">
                            <option value="">-- Select subject Name --</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Homework</label>
                        <input type="text" class="form-control reset" name="homework_detail">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control reset" name="date">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Teacher Name</label>
                        <select class="form-control reset" name="user_id">
                            <option value="">-- Select Teacher Name --</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="is_active">
                            <option value="1">
                                Active
                            </option>
                            <option value="0">
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
        <div class="card-header">List of Homewroks</div>
        <div class="card-body">
            <table id="list" class="table table-bordered table-hover table-stripped m-0">
                <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Subject</th>
                        <th>Homework</th>
                        <th>Date</th>
                        <th>Teacher Name</th>
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
        @vite('resources/js/pages/master/homework.js')
    </x-slot:script>

</x-app-layout>
