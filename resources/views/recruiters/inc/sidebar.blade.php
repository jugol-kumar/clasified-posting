<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
    <!-- Menu -->
    <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
    <!-- Button -->
    <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="fe fe-menu"></span>
    </button>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav">
        <div class="navbar-nav flex-column">
{{--            <ul class="list-unstyled ms-n2 mb-4">
                &lt;!&ndash; Nav item &ndash;&gt;
                <li class="nav-item {{ Route::is("user.dashboard") ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route("user.dashboard") }}"><i class="fe fe-home nav-icon"></i>My
                        Dashboard</a>
                </li>
            </ul>
            <span class="navbar-header">Operations</span>--}}
            <ul class="list-unstyled ms-n2 mb-4">
                <!-- Nav item -->
{{--                <li class="nav-item {{ Route::is("user.allCompanies") ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route("user.allCompanies") }}"><i class="fe fe-cloud nav-icon"></i>My
                        Companies</a>
                </li>--}}
            </ul>
            <!-- Navbar header -->
            <span class="navbar-header">Account Settings</span>
            <ul class="list-unstyled ms-n2 mb-0">

                <!-- Nav item -->
                <li class="nav-item {{ Route::is("user.allJobs") || Route::is("user.createJob") ? "active" : '' }}">
                    <a class="nav-link" href="{{ route("user.allJobs") }}"><i class="fe fe-book nav-icon"></i>My Posts</a>
                </li>
                <!-- Nav item -->
                <li class="nav-item {{ Route::is("user.chatting") ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.chatting') }}"><i class="fe fe-message-circle nav-icon"></i>Greeting</a>
                </li>
                <!-- Nav item -->
                <li class="nav-item {{ Route::is('user.editProfile') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.editProfile') }}"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fe fe-power nav-icon"></i>Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
