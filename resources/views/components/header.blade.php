<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item no-arrow">
            <a class="nav-link">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                <img class="img-profile rounded-circle"
                    src="{{asset('storage/images/undraw_profile.svg')}}">
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item no-arrow d-flex align-items-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-light" type="submit"><i class="bi bi-box-arrow-right text-danger"></i></button>
            </form>
        </li>

    </ul>

</nav>