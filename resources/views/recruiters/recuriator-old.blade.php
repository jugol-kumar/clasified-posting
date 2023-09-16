@extends('frontend.layout.master')
@section('title', get_setting('name')." Recruiters")
@push('css')

@endpush

@section('content')
    <!-- Page Content -->
    <div class="pt-20 bg-dark">
        <div class="container">
            <!-- Hero Section -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="mb-4 mb-xl-0 text-center text-md-start">
                        <!-- Caption -->
                        <h1 class="display-2 fw-bold mb-3 text-white ls-sm ">Become a Recruiters </h1>
                        <p class="mb-4 lead text-white-50">
                            create new account with your company details and post free jobs for hiring employee or workers
                        </p>
                        <!-- List -->
                        <div class="mb-6 mb-0">
                            <ul class="list-unstyled fs-4 ">
                                <li class="mb-2 text-white-50"><span class="me-2 "><i
                                            class="fe fe-clock text-warning "></i></span><span
                                        class="align-top">Create Free Profile</span></li>
                                <li class="mb-2 text-white-50"><span class="me-2 "><i
                                            class="fe fe-video text-warning "></i></span><span
                                        class="align-top">Post Free Job</span></li>
                                <li class="mb-2 text-white-50"><span class="me-2 "><i
                                            class="fe fe-users text-warning "></i></span><span
                                        class="align-top">Hiring Employee</span></li>
                            </ul>
                        </div>
                        <a href="https://www.youtube.com/watch?v=JRzWRZahOVU"
                           class="popup-youtube btn btn-white btn-lg fs-4">Join Now</a>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-5 col-lg-6 col-md-12">
                    <!-- Card -->
                    <div class="card" style="z-index: 1;">
                        <!-- Card body register-->
                        <div class="card-body p-6" id="registerForm" style="display: none;">
                            <div class="mb-4">
                                <h1 class="mb-4 lh-1 fw-bold h2">Create Free Account</h1>
                                <!--
                                                                <div class="mt-3 mb-5 d-grid d-md-block">
                                                                    &lt;!&ndash; btn group &ndash;&gt;
                                                                    <div class="btn-group mb-2 mb-md-0" role="group" aria-label="socialButton">
                                                                        <button type="button" class="btn btn-outline-white shadow-sm"><i
                                                                                class="mdi mdi-google me-2 text-danger"></i>Google</button>
                                                                    </div>
                                                                    &lt;!&ndash; btn group &ndash;&gt;
                                                                    <div class="btn-group mb-2 mb-md-0" role="group" aria-label="socialButton">
                                                                        <button type="button" class="btn btn-outline-white shadow-sm"><i
                                                                                class="mdi mdi-twitter text-info me-2"></i>Twitter</button>
                                                                    </div>
                                                                    &lt;!&ndash; btn group &ndash;&gt;
                                                                    <div class="btn-group" role="group" aria-label="socialButton">
                                                                        <button type="button" class="btn btn-outline-white shadow-sm"><i
                                                                                class="mdi mdi-facebook fs-4 text-primary me-2"></i>Facebook</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="mb-4">
                                                                <div class="border-bottom"></div>
                                                                <div class="text-center mt-n2  lh-1">
                                                                    <span class="bg-white px-2 fs-6">OR</span>
                                                                </div>
                                                            </div>-->
                                <!-- Form -->
                                <form action="{{ route('recruiter.create') }}" method="post" name="registerForm">
                                    @csrf
                                    <!-- Username -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label visually-hidden">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name">
                                        <span class="text-danger errormessage alert-name" style="display: none"></span>
                                    </div>
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label visually-hidden">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                                        <span class="text-danger errormessage alert-email" style="display: none"></span>
                                    </div>
                                    <!-- phone phone -->
                                    <div class="mb-3">
                                        <label for="phone" class="form-label visually-hidden">Phone phone</label>
                                        <input type="phone" id="phone" class="form-control" name="phone" placeholder="Phone phone">
                                        <span class="text-danger errormessage alert-phone" style="display: none"></span>
                                    </div>
                                    <!-- company -->
                                    <div class="mb-3">
                                        <label for="company" class="form-label visually-hidden">Company</label>
                                        <input type="text" id="company" class="form-control" name="company" placeholder="Company">
                                        <span class="text-danger errormessage alert-company" style="display: none"></span>
                                    </div>
                                    <!-- company -->
                                    <div class="mb-3">
                                        <label for="designation" class="form-label visually-hidden">Designation</label>
                                        <select id="designation" class="selectpicker" data-width="100%" name="designation">
                                            <option selected disabled value="">Select Your Position On Your Company</option>
                                            <option value="COO">COO</option>
                                            <option value="CMO">CMO</option>
                                            <option value="CTO">CTO</option>
                                            <option value="Founder/CEO">Founder/CEO</option>
                                            <option value="HR">HR</option>
                                            <option value="OTHER">OTHER</option>
                                        </select>
                                        <span class="text-danger errormessage alert-designation" style="display: none"></span>
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label visually-hidden">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                        <span class="text-danger errormessage alert-password" style="display: none"></span>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="privacy_policy" value="checked" id="flexCheckLocationOne">
                                        <label class="form-check-label" for="flexCheckLocationOne">
                                            By continuing you accept the <a href="#"
                                                                            class="text-inherit fw-semi-bold">Terms
                                                of Use</a>,<a href="#" class="text-inherit fw-semi-bold"> Privacy
                                                Policy</a>, and <a href="#" class="text-inherit fw-semi-bold">Data Policy</a>
                                        </label>
                                        <span class="text-danger errormessage alert-privacy_policy" style="display: none"></span>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-primary" id="submitRegForm">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer bg-white px-6 py-4">
                                <a href="#" class="text-inherit fw-semi-bold" id="enableRegForm">Login</a>
                            </div>
                        </div>



                        <!-- Card body login-->
                        <div class="card-body p-6" id="loginForm">
                            <div class="mb-4">
                                <h1 class="mb-4 lh-1 fw-bold h2">Login Account</h1>
                                <!--
                                                                <div class="mt-3 mb-5 d-grid d-md-block">
                                                                    &lt;!&ndash; btn group &ndash;&gt;
                                                                    <div class="btn-group mb-2 mb-md-0" role="group" aria-label="socialButton">
                                                                        <button type="button" class="btn btn-outline-white shadow-sm"><i
                                                                                class="mdi mdi-google me-2 text-danger"></i>Google</button>
                                                                    </div>
                                                                    &lt;!&ndash; btn group &ndash;&gt;
                                                                    <div class="btn-group mb-2 mb-md-0" role="group" aria-label="socialButton">
                                                                        <button type="button" class="btn btn-outline-white shadow-sm"><i
                                                                                class="mdi mdi-twitter text-info me-2"></i>Twitter</button>
                                                                    </div>
                                                                    &lt;!&ndash; btn group &ndash;&gt;
                                                                    <div class="btn-group" role="group" aria-label="socialButton">
                                                                        <button type="button" class="btn btn-outline-white shadow-sm"><i
                                                                                class="mdi mdi-facebook fs-4 text-primary me-2"></i>Facebook</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="mb-4">
                                                                <div class="border-bottom"></div>
                                                                <div class="text-center mt-n2  lh-1">
                                                                    <span class="bg-white px-2 fs-6">OR</span>
                                                                </div>
                                                            </div>-->
                                <!-- Form -->
                                <form action="{{ route('recruiter.login') }}" method="post">
                                @csrf
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label visually-hidden">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label visually-hidden">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" id="submitForm">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer bg-white px-6 py-4">
                                <p class="mb-0 d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0)" id="registerFormEnable" class="text-inherit fw-semi-bold">Register Here</a>
                                    <span>|</span>
                                    <a href="#" class="text-inherit fw-semi-bold">Forgate Password</a>
                                </p>
                            </div>
                        </div>

                        <!-- Pattern -->
                    <!--                    <div class="position-relative">
                        <div
                            class="position-absolute bottom-0 end-0 me-md-n3 mb-md-n6 me-lg-n4 mb-lg-n4 me-xl-n6 mb-xl-n8 d-none d-md-block ">
                            <img src="{{ asset("frontend") }}/assets/images/pattern/dots-pattern.svg" alt="">
                        </div>
                    </div>-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature section -->
        <div class="py-4 shadow-sm position-relative bg-white mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Feature -->
                        <div class="text-dark fw-semi-bold lh-1 fs-4 mb-3 mb-lg-0">
                        <span class="icon-shape icon-xs rounded-circle bg-light-warning text-center me-2">
                            <i class="mdi mdi-check text-dark-warning "></i>
                        </span>
                            <span class="align-middle">Shareable Certificate</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Feature -->
                        <div class="text-dark fw-semi-bold lh-1 fs-4 mb-3 mb-lg-0">
                            <span class="icon-shape icon-xs rounded-circle bg-light-warning text-center me-2">
                                <i class="mdi mdi-check text-dark-warning "></i>
                            </span>
                            <span class="align-middle">Flexible Deadlines</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Feature -->
                        <div class="text-dark fw-semi-bold lh-1 fs-4 mb-3 mb-md-0">
                            <span class="icon-shape icon-xs rounded-circle bg-light-warning text-center me-2">
                                <i class="mdi mdi-check text-dark-warning "></i>
                            </span>
                            <span class="align-middle">100% Online Courses</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Feature -->
                        <div class="text-dark fw-semi-bold lh-1 fs-4">
                            <span class="icon-shape icon-xs rounded-circle bg-light-warning text-center me-2">
                                <i class="mdi mdi-check text-dark-warning "></i>
                            </span>
                            <span class="align-middle">Approx.24 hours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section -->
        <div class="py-8 py-lg-18 bg-light">
            <div class="container">
                <div class="row mb-8 justify-content-center">
                    <div class="col-lg-8 col-md-12 col-12 text-center">
                        <!-- caption -->
                        <span
                            class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">About Application System</span>
                        <h2 class="mb-2 display-4 fw-bold">How To work Hiref</h2>
                        <p class="lead">Vanilla JS is a fast, lightweight, cross-platformframework for building
                            incredible, powerful
                            JavaScript applications.</p>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <!-- Features -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body p-6">
                                <div class="d-md-flex mb-4">
                                    <div class="mb-3 mb-md-0">
                                        <!-- Img -->
                                        <img src="{{ asset("frontend") }}/assets/images/svg/feature-icon-1.svg" alt=""
                                             class=" bg-primary icon-shape icon-xxl rounded-circle">
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-md-4">
                                        <h2 class="fw-bold mb-1">First Stape<span
                                                class="badge bg-warning ms-2">Free</span></h2>
<!--                                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                      1</span> <span class="ms-3">6 Lessons</span> <span class="ms-3">1 Hour 12 Min</span></p>-->
                                    </div>
                                </div>
                                <p class="mb-4 fs-4">short descriptions</p>
                                <a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#courseModal">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <!-- Features -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body p-6">
                                <div class="d-md-flex mb-4">
                                    <div class="mb-3 mb-md-0">
                                        <!-- Img -->
                                        <img src="{{ asset("frontend") }}/assets/images/svg/feature-icon-1.svg" alt=""
                                             class=" bg-primary icon-shape icon-xxl rounded-circle">
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-md-4">
                                        <h2 class="fw-bold mb-1">First Stape<span
                                                class="badge bg-warning ms-2">Free</span></h2>
                                        <!--                                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                                                              1</span> <span class="ms-3">6 Lessons</span> <span class="ms-3">1 Hour 12 Min</span></p>-->
                                    </div>
                                </div>
                                <p class="mb-4 fs-4">short descriptions</p>
                                <a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#courseModal">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <!-- Features -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body p-6">
                                <div class="d-md-flex mb-4">
                                    <div class="mb-3 mb-md-0">
                                        <!-- Img -->
                                        <img src="{{ asset("frontend") }}/assets/images/svg/feature-icon-1.svg" alt=""
                                             class=" bg-primary icon-shape icon-xxl rounded-circle">
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-md-4">
                                        <h2 class="fw-bold mb-1">First Stape<span
                                                class="badge bg-warning ms-2">Free</span></h2>
                                        <!--                                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                                                              1</span> <span class="ms-3">6 Lessons</span> <span class="ms-3">1 Hour 12 Min</span></p>-->
                                    </div>
                                </div>
                                <p class="mb-4 fs-4">short descriptions</p>
                                <a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#courseModal">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <!-- Features -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body p-6">
                                <div class="d-md-flex mb-4">
                                    <div class="mb-3 mb-md-0">
                                        <!-- Img -->
                                        <img src="{{ asset("frontend") }}/assets/images/svg/feature-icon-1.svg" alt=""
                                             class=" bg-primary icon-shape icon-xxl rounded-circle">
                                    </div>
                                    <!-- Content -->
                                    <div class="ms-md-4">
                                        <h2 class="fw-bold mb-1">First Stape<span
                                                class="badge bg-warning ms-2">Free</span></h2>
                                        <!--                                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                                                              1</span> <span class="ms-3">6 Lessons</span> <span class="ms-3">1 Hour 12 Min</span></p>-->
                                    </div>
                                </div>
                                <p class="mb-4 fs-4">short descriptions</p>
                                <a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#courseModal">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section -->
        <div class="py-8 py-lg-18 bg-light">
            <div class="container">
                <div class="row mb-6 align-items-center justify-content-center">
                    <div class="col-md-10">
                        <div class="row align-items-center ">
                            <div class="col-xl-6 col-lg-7 col-md-12 col-12 order-1 text-center text-lg-start ">
                                <!-- caption -->
                                <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">Best Recurator</span>
                                <h2 class="mb-2 display-4 fw-bold mb-3">Hi, I’m <span
                                        class="text-primary">Demo Rec</span>,
                                    <br>I will post more then 1.2k post.</h2>
                                <p class="fs-3 pe-6">Create beautiful website with this Geeks UI template. Get started
                                    building a
                                    site today.</p>

                                <hr class="my-5">
                                <!-- Counter -->
                                <div class="row">
                                    <div class="col-sm mb-3 mb-lg-0">
                                        <h2 class="h1 fw-bold mb-0 ls-xs">5</h2>
                                        <p class="mb-0">Companies</p>
                                    </div>
                                    <div class="col-lg-5 col-sm mb-3 mb-lg-0">
                                        <h2 class="h1 fw-bold mb-0 ls-xs">100+</h2>
                                        <p class="mb-0">Jobs</p>
                                    </div>
                                    <div class="col-sm mb-3 mb-lg-0">
                                        <h2 class="h1 fw-bold mb-0 ls-xs">12+</h2>
                                        <p class="mb-0">Employees</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Img -->
                            <div class="offset-xl-1 col-xl-5 col-lg-5 col-12 mb-6 mb-lg-0 order-lg-2 text-center ">
                                <img src="{{ asset("frontend") }}/assets/images/instructor/instructor-img.png" alt=""
                                     class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section -->
        <div class="pb-8 pb-lg-18 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <!-- Brand logo -->
                        <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl text-center">Most popular product companies</span>
                        <div class="row mt-8">
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6 text-center mb-4 mb-xl-0">
                                <img src="{{ asset("frontend") }}/assets/images/brand/gray-logo-stripe.svg" alt="">
                            </div>
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6 text-center mb-4 mb-xl-0">
                                <img src="{{ asset("frontend") }}/assets/images/brand/gray-logo-airbnb.svg" alt="">
                            </div>
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6 text-center mb-4 mb-xl-0">
                                <img src="{{ asset("frontend") }}/assets/images/brand/gray-logo-discord.svg" alt="">
                            </div>
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6 text-center mb-4 mb-xl-0">
                                <img src="{{ asset("frontend") }}/assets/images/brand/gray-logo-intercom.svg" alt="">
                            </div>
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6 text-center mb-4 mb-xl-0">
                                <img src="{{ asset("frontend") }}/assets/images/brand/gray-logo-pinterest.svg" alt="">
                            </div>
                            <!-- logo -->
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6 text-center mb-4 mb-xl-0">
                                <img src="{{ asset("frontend") }}/assets/images/brand/gray-logo-netflix.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section -->
        <div class="py-8 py-lg-18 bg-light">
            <div class="container">
                <div class="row mb-8 justify-content-center">
                    <div class="col-lg-6 col-md-12 col-12 text-center">
                        <!-- caption -->
                        <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">Reviews</span>
                        <h2 class="mb-2 display-4 fw-bold ">Review For This Rec</h2>
                        <p class="lead">12+ million people are already get job on {{ get_setting('name') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12 mb-4 mb-lg-0">
                        <!-- Card -->
                        <div class="card shadow-lg">
                            <!-- Card body -->
                            <div class="card-body p-4 p-md-8 text-center">
                                <i class="mdi mdi-48px mdi-format-quote-open text-light-primary lh-1"></i>
                                <p class="lead text-dark mt-3">The generated lorem Ipsum is therefore always free from
                                    repetition,
                                    injected
                                    humour, or words etc generate lorem Ipsum which looks racteristic reasonable.</p>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer bg-primary text-center border-top-0">
                                <div class="mt-n8"><img src="{{ asset("frontend") }}/assets/images/avatar/avatar-1.jpg"
                                                        alt=""
                                                        class="rounded-circle border-primary avatar-xl border border-4">
                                </div>
                                <div class="mt-2 text-white">
                                    <h3 class="text-white mb-0">Gladys Colbert</h3>
                                    <p class="text-white-50 mb-1">Software Engineer at Palansite</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <!-- Card -->
                        <div class="card shadow-lg">
                            <div class="card-body p-4 p-md-8 text-center">
                                <i class="mdi mdi-48px mdi-format-quote-open text-light-info lh-1"></i>
                                <p class="lead text-dark mt-3">Lorem ipsum dolor sit amet, consectetur adipi scing elit.
                                    Sed vel felis
                                    imperdiet, lacinia metus malesuada diamamus rutrum turpis leo, id tincidunt magna
                                    sodales.</p>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer bg-info text-center border-top-0">
                                <div class="mt-n8"><img src="{{ asset("frontend") }}/assets/images/avatar/avatar-2.jpg"
                                                        alt=""
                                                        class="rounded-circle border-info avatar-xl border border-4">
                                </div>
                                <div class="mt-2 text-white">
                                    <h3 class="text-white mb-0">Ella Jones</h3>
                                    <p class="text-white-50 mb-1">Software Engineer at Classroom</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-8 py-lg-18 bg-light">
            <div class="container">
                <div class="row mb-8 justify-content-center">
                    <div class="col-lg-6 col-md-12 col-12 text-center">
                        <!-- caption -->
                        <span class="text-primary mb-3 d-block text-uppercase fw-semi-bold ls-xl">Need to Know</span>
                        <h2 class="mb-2 display-4 fw-bold ">Frequently Asked Questions.</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mattis non accumsan
                            in, tempor
                            dictum neque.</p>
                    </div>
                </div>
                <!-- row -->
                <div class="row justify-content-center ">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="accordion accordion-flush" id="accordionExample">
                            <div class="border-bottom py-3" id="headingOne">
                                <h3 class="mb-0 fw-bold">
                                    <a href="#"
                                       class="d-flex align-items-center text-inherit text-decoration-none active"
                                       data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                       aria-controls="collapseOne">
                  <span class="me-auto">
                    What is the cost of an online course
                  </span>
                                        <span class="collapse-toggle ms-4">
                    <i class="fe fe-plus text-primary"></i>
                  </span>
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="py-3 fs-4">
                                    Create beautiful website with this Geeks UI template. Get started building a site
                                    today.
                                </div>
                            </div>
                            <!-- Card  -->
                            <!-- Card header  -->
                            <div class="border-bottom py-3" id="headingTwo">
                                <h3 class="mb-0 fw-bold">
                                    <a href="#" class="d-flex align-items-center text-inherit text-decoration-none"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span class="me-auto">
                    What do I need to take a course?
                  </span>
                                        <span class="collapse-toggle ms-4">
                    <i class="fe fe-plus text-primary"></i>
                  </span>
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="py-3 fs-4">
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                                    nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                            <!-- Card  -->
                            <!-- Card header  -->
                            <div class="border-bottom py-3 " id="headingThree">
                                <h3 class="mb-0 fw-bold">
                                    <a href="#"
                                       class="d-flex align-items-center text-inherit text-decoration-none active"
                                       data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                       aria-controls="collapseThree">
                  <span class="me-auto">
                    What do I receive for taking this course?
                  </span>
                                        <span class="collapse-toggle ms-4">
                    <i class="fe fe-plus text-primary"></i>
                  </span>
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="py-3 fs-4">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod.
                                </div>
                            </div>
                            <!-- Card  -->
                            <!-- Card header  -->
                            <div class="pt-3 " id="headingFour">
                                <h3 class="mb-0 fw-bold">
                                    <a href="#"
                                       class="d-flex align-items-center text-inherit text-decoration-none active"
                                       data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                       aria-controls="collapseFour">
                  <span class="me-auto">
                    What willI get if I subscribe to this Certificate?
                  </span>
                                        <span class="collapse-toggle ms-4">
                    <i class="fe fe-plus text-primary"></i>
                  </span>
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                 data-bs-parent="#accordionExample">
                                <div class="py-3 fs-4">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad
                                    squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod.
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 text-center">
                            <a href="#" class="btn btn-outline-white">More questions? Visit the <span
                                    class="text-primary">Learner Help
                Center.</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- call to action -->
        <div class="py-lg-16 py-10 bg-dark"
             style="background: url({{ asset("frontend") }}/assets/images/background/course-graphics.svg)no-repeat; background-size: cover; background-position: top center">
            <div class="container">
                <!-- row -->
                <div class="row justify-content-center text-center">
                    <div class="col-md-9 col-12">
                        <!-- heading -->
                        <h2 class="display-4 text-white">Join Now Our App</h2>
                        <p class="lead text-white px-lg-12 mb-6">
                            Download our app and join today
                        </p>
                        <!-- button -->
                        <div class="d-grid d-md-block">
                            <a href="#" class="btn btn-primary mb-2 mb-md-0">Start join for Free</a>
                            <a href="#" class="btn btn-info">{{ get_setting('name') }} for Business</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')

    <script>
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        function velidation(){
            var name  = document.forms.registerForm.name.value;
            var email = document.forms.registerForm.email.value;
            var phone = document.forms.registerForm.phone.value;
            var company  = document.forms.registerForm.company.value;
            var designation  = document.forms.registerForm.designation.value;
            var password  = document.forms.registerForm.password.value;

            return {name, email, phone, company, designation, password};

           /* var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g; //Javascript reGex for Email Validation.
            var regPhone=/^\d{10}$/;									 // Javascript reGex for Phone Number validation.
            var regName = /\d+$/g;								 // Javascript reGex for Name validation

            if (name === "" || regName.test(name)) {
                // window.alert("Please enter your name properly.");
                name.focus();
                name.addChild(`<p class="text-danger">Please enter your name properly.</p>`)
            }

            if (email === "" || !regEmail.test(email)) {
                email.focus();
                name.addChild(`<p class="text-danger">Please enter a valid e-mail address.</p>`)
            }

            if (password == "") {
                alert("Please enter your password");
                password.focus();
            }

            if(password.length <6){
                alert("Password should be atleast 6 character long");
                password.focus();

            }
            if (phone == "" || !regPhone.test(phone)) {
                alert("Please enter valid phone number.");
                phone.focus();
            }

            if (what.selectedIndex == -1) {
                alert("Please enter your course.");
                what.focus();
            }*/
        }

        $("#submitRegForm").on('click', function (){
            let value = velidation();

            var privacy_policy  = $("#flexCheckLocationOne").is( ":checked" ) ? 'checked' : null;

            var name  = document.forms.registerForm.name.value;
            var email = document.forms.registerForm.email.value;
            var phone = document.forms.registerForm.phone.value;
            var company  = document.forms.registerForm.company.value;
            var designation  = document.forms.registerForm.designation.value;
            var password  = document.forms.registerForm.password.value;



            $.ajax({
                url: "{{ route('recruiter.create')  }}",
                method: 'post',
                data: {name:name, email:email, phone:phone, company:company, designation:designation, password:password, privacy_policy:privacy_policy},
                success: function(data){
                    console.log(data);
                    location.replace("{{ route('recruiter.dashboard') }}");
                },
                error: function (data){
                    $(`.errormessage`).empty();
                    $.each(data.responseJSON.errors, function(key, value){
                        $(`.alert-${key}`).show();
                        $(`.alert-${key}`).append('<p>'+value[0]+'</p>');
                    });
                    console.log(data.responseJSON.errors);
                }
            });


        })

    </script>


    <script>
        $("#registerFormEnable").on('click', function (e){
            $("#loginForm").hide();
            $("#registerForm").show();
        });

        $("#enableRegForm").on('click', function (e){
            $("#loginForm").show();
            $("#registerForm").hide();
        });
    </script>
@endpush

