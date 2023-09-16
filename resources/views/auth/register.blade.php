@extends('frontend.layout.master')
@section('title', get_setting('name')." Seeker Register")
@section('content')
    <div class="row align-items-center min-vh-100 bg-cover bg-light ">
        <!-- col -->
        <div class="col-lg-6 col-md-12 col-12">
            <div class="px-xl-20 px-md-8 px-4 py-8 py-lg-0">
                <div class="text-dark">
                    <h1 class="display-4 fw-bold">Get In Touch.</h1>
                    <p class="lead text-dark">
                        Fill in the form to the right to get in touch with someone on
                        our
                        team, and we will reach out shortly.
                    </p>

                    <div class="mt-10">
                        <!--Facebook-->
                        <a href="#" class="text-muted me-3">
                            <i class="mdi mdi-facebook fs-3"></i>
                        </a>
                        <!--Twitter-->
                        <a href="#" class="text-muted me-3">
                            <i class="mdi mdi-twitter  fs-3"></i>
                        </a>

                        <!--GitHub-->
                        <a href="#" class="text-muted">
                            <i class="mdi mdi-github fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- background color -->
        <div class="col-lg-6 d-lg-flex align-items-center w-lg-50 min-vh-lg-100 position-fixed-lg bg-cover bg-light top-0 right-0" >
            <div class="px-4 px-xl-20 py-5 py-lg-0">
                <div class="card">
                    <div class="card-body">
                        <!-- form section -->
                        <div id="form">
                            <!-- form row -->
                            <form class="row" action="{{ route('registerSeeker') }}" method="post">
                                @csrf
                                <!-- form group -->
                                <div class="mb-3 col-12">
                                    <label class="form-label"for="lname">User Name:<span
                                            class="text-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="name"
                                        id="lname"
                                        placeholder="Last Name"
                                        required
                                    />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- form group -->
                                <div class="mb-3 col-12">
                                    <label
                                        class="form-label"for="email">Email:<span
                                            class="text-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="email"
                                        name="email"
                                        id="email"
                                        placeholder="Email"
                                        required
                                    />
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- form group -->
                                <div class="mb-3 col-12">
                                    <label
                                        class="form-label"for="phone">Phone Number:<span
                                            class="text-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        placeholder="Phone"
                                        required
                                    />
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- form group -->
                                <div class="mb-3 col-12">
                                    <label
                                        class="form-label"for="email">Password:<span
                                            class="text-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        id="email"
                                        placeholder="Password"
                                        required
                                    />
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- form group -->
                                <div class="mb-3 col-12">
                                    <label
                                        class="form-label"for="email">Conform Password:<span
                                            class="text-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        type="password"
                                        name="password_conformation"
                                        id="password"
                                        placeholder="Conform Password"
                                        required
                                    />
                                    @error('password_conformation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- button -->
                                <div class=" col-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
