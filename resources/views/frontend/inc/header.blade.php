<nav class="navbar navbar-expand-lg navbar-default p-0 px-8 w-100 position-fixed zindex-4" style="z-index: 111; box-shadow: 0 20px 20px 0 #e3e3e340">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="/">
{{--            <img src="{{ config('app.url')."/storage/".get_setting('header_logo') }}" alt="" style="max-width: 150px; min-width: 150px;"/>--}}
            <img src="{{ asset('frontend/assets/images/hiref-black.png') }}" alt="" style="max-width: 150px; min-width: 150px;"/>
        </a>
        <!-- Button -->
        <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-default"
            aria-controls="navbar-default"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav ms-auto left-header d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link p-4" href="{{ route('user.chatting') }}">
                        <i class="fe fe-message-circle"></i>
                        Chat
                    </a>
                </li>

                @if(Auth::check())
                    <li class="nav-item">
                        @if(Auth::user()->role == 'admin')
                            <a class="nav-link p-4" href="{{ route('admin.dashboard') }}">My Profile</a>
                        @else
                            <a class="nav-link p-4" href="{{ route('user.dashboard') }}">My Profile</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link p-4" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Login</a>
                    </li>
                @endif

                <div class="ms-2 mt-3 mt-lg-0 d-flex align-items-end">
                    @if(Auth::check())
                        <a href="{{ route('user.createJob') }}" class="bg-success rounded-pill px-5 py-2 text-black fw-bold me-3">Create Post</a>
                    @else
                        <a data-bs-toggle="modal" href="#exampleModalToggle" role="button" class="bg-success rounded-pill px-5 py-2 text-black fw-bold me-3">Create Post</a>
                    @endif
                </div>
            </ul>
        </div>
    </div>
</nav>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Login your account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('recruiter.login') }}" method="post">
                    @csrf
                    <div class="">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="e.g example@mail.com" class="form-control">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="******" class="form-control">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="mt-2 btn btn-primary">
                        Login
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
