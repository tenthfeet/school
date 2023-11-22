<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">

        <!-- Application Logo -->
        <x-application-logo />

        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="navItem {{ \Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
            <li class="{{ \Request::route()->getName() == 'project*' ? 'active' : '' }}">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="cil:sitemap"></iconify-icon>
                        <span>Masters</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('permission-groups.index') }}" class="">Permission Group</a>
                    </li>
                    <li>
                        <a href="{{ route('permissions.index') }}" class="">Permission</a>
                    </li>
                    <li>
                        <a href="{{ route('academic-years.index') }}" class="">Academic Year</a></a>
                    </li>
                    <li>
                        <a href="{{ route('marks.index') }}" class="">Marks</a></a>
                    </li>
                    <li>
                        <a href="{{ route('grades.index') }}" class="">Grades</a></a>
                    </li>
                    <li>
                        <a href="{{ route('academic-standards.index') }}" class="">Academic Standard</a>
                    </li>
                    <li>
                        <a href="{{ route('cities.index') }}" class="">City</a>
                    </li>
                    <li>
                        <a href="{{ route('class-periods.index') }}" class="">Class Period</a>
                    </li>
                    <li>
                        <a href="{{ route('class-rooms.index') }}" class="">Class Room</a>
                    </li>
                    <li>
                        <a href="{{ route('countries.index') }}" class="">Country</a>
                    </li>
                    <li>
                        <a href="{{ route('exam-categories.index') }}" class="">Exam Category</a>
                    </li>
                    <li>
                        <a href="{{ route('exams.index') }}" class="">Exam</a>
                    </li>
                    <li>
                        <a href="{{ route('financial-years.index') }}" class="">Financial Year</a>
                    </li>
                    <li>
                        <a href="{{ route('homeworks.index') }}" class="">HomeWork</a>
                    </li>
                    <li>
                        <a href="{{ route('languages.index') }}" class="">Language</a>
                    </li>
                    <li>
                        <a href="{{ route('medium-of-studies.index') }}" class="">Medium Of Study</a>
                    </li>
                    <li>
                        <a href="{{ route('states.index') }}" class="">State</a>
                    </li>
                    <li>
                        <a href="{{ route('statuses.index') }}" class="">Status</a>
                    </li>
                    <li>
                        <a href="{{ route('subjects.index') }}" class="">Subject</a>
                    </li>
                    <li>
                        <a href="{{ route('terms.index') }}" class="">Term</a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}" class="">Role</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="">User</a>
                    </li>
                    <li>
                        <a href="{{ route('teacher-mappings.index') }}" class="">Teacher Mapping</a>
                    </li>
                    <li>
                        <a href="{{ route('subject-mappings.index') }}" class="">Subject Mapping</a>
                    </li>
                    <li>
                        <a href="{{ route('departments.index') }}" class="">Departments</a>
                    </li>
                    <li>
                        <a href="{{ route('fees.index') }}" class="">Fee</a>
                    </li>
                    <li>
                        <a href="{{ route('fee-details.index') }}" class="">Fee Details</a>
                    </li>
                    <li>
                        <a href="{{ route('fee-bundles.index') }}" class="">Fees bundle</a>
                    </li>
                    <li>
                        <a href="{{ route('students.index') }}" class="">Student</a>
                    </li>
                    <li>
                        <a href="{{ route('attendances.index') }}" class="">Attendance</a>
                    </li>
                    <li>
                        <a href="{{ route('fee-dues.index') }}" class="">Fee Due</a>
                    </li>
                    <li>
                        <a href="{{ route('fee-transactions.index') }}" class="">Fee Transaction</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- End: Sidebar -->
