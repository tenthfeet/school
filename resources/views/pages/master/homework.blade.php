<x-app-layout>
    <x-slot:breadcrumb> Homework </x-slot:breadcrumb>

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Add new Homework</div>
                    </div>
                </header>
                <div class="card-text h-full">
                    <form class="space-y-4" id="homework-form">
                        @csrf
                        <input type="hidden" name="id" class="reset">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="input-area">
                                <label class="form-label">Class Name</label>
                                <div class="relative">
                                    <select class="form-control reset" name="class_room_id">
                                        <option value="">-- Select Class Name--</option>
                                        @foreach ($classRooms as $classRoom)
                                            <option value="{{ $classRoom->id }}">
                                                {{ $classRoom->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Subject</label>
                                <div class="relative">
                                    <select class="form-control reset" name="subject_id">
                                        <option value="">-- Select subject Name --</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">
                                                {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Homework</label>
                                <div class="relative">
                                    <input type="text" class="form-control reset" name="homework_detail">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Date</label>
                                <div class="relative">
                                    <input type="date" class="form-control reset" name="date">
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Teacher Name</label>
                                <div class="relative">
                                    <select class="form-control reset" name="user_id">
                                        <option value="">-- Select Teacher Name --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input-area">
                                <label class="form-label">Status</label>
                                <div class="relative">
                                    <select class="form-control" name="is_active">
                                        {!! optionsFromArray($status) !!}
                                    </select>
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

        <div class="card">
            <div class="card-header card-title">List of Homewroks</div>
            <div class="card-body">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table id="list"
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="border-t border-slate-100 dark:border-slate-800">
                                <tr class="table-primary">
                                    <th scope="col"
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        #</th>
                                    <th scope="col"
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        Class Name</th>
                                    <th scope="col"
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        Subject</th>
                                    <th scope="col"
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        Homework</th>
                                    <th scope="col"
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        Date</th>
                                    <th scope="col"
                                        class="table-th border border-slate-100 dark:bg-slate-800 dark:border-slate-700">
                                        Teacher Name</th>
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
            @vite('resources/js/pages/master/homework.js')
        </x-slot:script>

</x-app-layout>
