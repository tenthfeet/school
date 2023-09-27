<div class="container-fluid">
    <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <i class="fa-solid fa-bars"></i>
    </button>

    <ul class="header-nav d-none d-md-flex">
        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
    </ul>
    <ul class="header-nav ms-auto">
        <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown"
               href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md">
                    <i class="fa-solid fa-user"></i>
                </div>
                {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0" style="">
                <a class="dropdown-item" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket icon me-2"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>
