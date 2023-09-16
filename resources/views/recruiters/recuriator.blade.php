@extends('frontend.layout.master')
@section('title', get_setting('name')." Recruiters")
@push('css')
    <style>
        .before-footer{
            background-image: url("{{ asset('frontend/assets/images/footer_banner.png') }}") !important;
            height: 100%;
            background-size: cover;
            background-position: center center;
            min-height: 500px;
        }
        .step-img-card{
            padding: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 200px;
            border-radius:50% ;
        }
        .card-border-right::before{
            content: "➤";
            position: relative;
            top: 161px;
            left: 185px;
        }
        .card-border-right::after{
            content: "";
            width: 50%;
            border: 0.0001px dashed #686868;
            position: relative;
            top: -149px;
            right: -53%;
        }
        .app-stape{
            min-width: 300px;
        }
    </style>
@endpush
@section('content')
    <!-- Page Content -->
        <div class="pt-lg-5 pt-5 bg-cover before-footer d-flex align-items-center justify-content-end">
            <div class="container">
                <div class="offset-6 col-6 d-flex align-items-start justify-content-center flex-column">
                    <h1 class="display-2 text-white">Get the {{ config('app.name') }} App</h1>
                    <p class="text-white">Click the button below to download the {{ config('app.name') }} app.</p>
                    <form action="{{ route('loginOrCreate') }}" class="d-flex align-items-start" method="post">
                        @csrf
                        <input type="hidden" name="role" value="true">
                        <input type="text" class="form-control rounded-5 w-100 me-3" name="phone" placeholder="+8801*-********">
                        <button type="submit" class="btn btn-success rounded-5 text-black">Registration</button>
                    </form>

                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="pt-lg-14 pg-12 bg-cover section-bg mb-4">
            <!-- container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 d-flex align-items-start justify-content-start flex-column">
                        <h1 class="display-4 fw-semibold"><span class="text-success">{{ config("app.name") }} </span>App for Founders and Hiring Managers</h1>

                        <p class="text-justify my-5">A targeted job portal for SMEs and Startups - {{ config('app.name') }} is a mobile-first chat-based platform that fulfills the hiring requirements of 190K+ verified recruiters. Hirect as a direct hiring app connects recruiters to 3.8M+ verified candidates who are searching for jobs in Indian startups. Moreover, Hirect allows for direct and private communication without the interference of consultants.</p>
                        <a href="javascript:void(0)" class="btn btn-success rounded-5 btn-sm mt-2 text-black px-5 py-2">Get Hired</a>

                    </div>
                    <div class="col-md-6 col-12 h-100">
                        <img class="float-end w-75" src="{{ asset('frontend/assets/images/recruiter-about.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <div class="py-8 py-lg-18">
            <div class="container text-center">
                <div class="row mb-8 justify-content-center">
                    <div class="col-lg-8 col-md-12 col-12 text-center">
                        <!-- caption -->
                        <h2 class="mb-2 display-4 fw-bold">Start Hiring in 3 Easy Steps</h2>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="d-md-flex mb-4 flex-column align-items-center card-border-right">
                            <strong class="fs-3 mb-3 text-black">Stape 1</strong>
                            <div class="bg-light step-img-card">
                                <img src="{{ asset('frontend/assets/images/profile.svg') }}" alt="" height="80">
                            </div>
                            <p class="fs-4 fw-semibold mt-2 text-black">Build a Profile</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="d-md-flex mb-4 flex-column align-items-center card-border-right">
                            <strong class="fs-3 mb-3 text-black">Step 2</strong>
                            <div class="bg-light step-img-card">
                                <img src="{{ asset('frontend/assets/images/briefcase.svg') }}" alt="" height="80">
                            </div>
                            <p class="fs-4 fw-semibold mt-2 text-black">Post a Job in 5 Minutes</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 mt-4">
                        <div class="d-md-flex mb-4 flex-column align-items-center">
                            <strong class="fs-3 mb-3 text-black">Step 3</strong>
                            <div class="bg-light step-img-card">
                                <img src="{{ asset('frontend/assets/images/messages.svg') }}" alt="" height="80">
                            </div>
                            <p class="fs-4 fw-semibold mt-2 text-black">Chat Directly with Relevant Candidates</p>
                        </div>
                    </div>
                </div>

                <a class="btn btn-outline-dark rounded-5 mt-6 py-2 px-5" width="100">View More</a>
            </div>
        </div>





        <div class="pb-12 pg-12 bg-cover section-bg mb-4">
            <!-- container -->
            <div class="container pe-0 ps-0">
                <div class="row">
                    <div class="col-md-5 col-12 h-100">
                        <img class="float-end w-100" src="{{ asset('frontend/assets/images/hiring-process.png') }}" alt="">
                    </div>
                    <div class="offset-1 col-md-6 col-12 d-flex align-items-start justify-content-start flex-column">
                        <h1 class="display-4 fw-semibold"><span class="text-success">{{ config("app.name") }} </span> - Simplifying the Hiring Process</h1>

                        <p class="text-justify my-5">
                            Hirect, a direct hiring platform for founders and hiring managers, is committed to meeting its users' definitions of success. This chat-based platform is created to help high-growth startups meet their hiring needs in absence of middlemen.
                        </p>
                        <p class="text-justify">
                            Hirect caters to the hiring needs of 190K+ verified recruiters. The AI algorithm's ability to correctly match recruiters to relevant candidates based on skills, experience, profile activity, location preferences, etc. makes hiring simple and effective.
                        </p>
                        <a href="javascript:void(0)" class="btn btn-success rounded-5 btn-sm mt-2 text-black px-5 py-2">Hire Now</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="py-8">
            <!-- container -->
            <div class="container-fluid px-10 text-center">
                <h1 class="text-center display-4">Key Features</h1>
                <div class="row mt-5">
                    <div class="col-md-3 col-6 mb-5">
                        <a href="">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column">
                                        <img class="w-100 h-100 app-stape" src="{{ asset('frontend/assets/images/direct-chat.svg') }}" alt="">
                                        <p class="fw-semibold fs-4 text-capitalize text-black">Relevant Candidates (AI Algorithm)</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-5">
                        <a href="">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column">
                                        <img class="w-100 h-100 app-stape" src="{{ asset('frontend/assets/images/direct-chat.svg') }}" alt="">
                                        <p class="fw-semibold fs-4 text-capitalize text-black">Direct Chat and Instant Response</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-5">
                        <a href="">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column">
                                        <img class="w-100 h-100 app-stape" src="{{ asset('frontend/assets/images/direct-chat.svg') }}" alt="">
                                        <p class="fw-semibold fs-4 text-capitalize text-black">
                                            Conduct Video
                                            Interviews
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-5">
                        <a href="">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column">
                                        <img class="w-100 h-100 app-stape" src="{{ asset('frontend/assets/images/direct-chat.svg') }}" alt="">
                                        <p class="fw-semibold fs-4 text-capitalize text-black">
                                            100% Data Privacy
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <a class="btn btn-outline-dark rounded-5 mt-6 py-2 px-5" width="100">View More</a>
            </div>
        </div>

        <div class="py-8 py-lg-18">
            <div class="container">
                <div class="row mb-8 justify-content-center">
                    <div class="col-lg-6 col-md-12 col-12 text-center">
                        <!-- caption -->
                        <h2 class="mb-2 display-4 fw-bold ">Frequently Asked Questions.</h2>
                    </div>
                </div>
                <!-- row -->
                <div class="row justify-content-center ">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="accordion accordion-flush" id="accordionExample">
                            <div class="mb-4">
                                <div class="bg-light p-3 rounded" id="headingOne">
                                    <h3 class="mb-0 fw-bold">
                                        <a href="#"
                                           class="d-flex align-items-center text-inherit text-decoration-none"
                                           data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                           aria-controls="collapseOne">
                                      <span class="me-auto text-black-50">
                                        What is the cost of an online course
                                      </span>
                                            <span class="collapse-toggle ms-4">
                                        <i class="fe fe-plus text-black"></i>
                                      </span>
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                     data-bs-parent="#accordionExample">
                                    <div class="py-3 fs-4">
                                        Create beautiful website with this Geeks UI template. Get started building a site
                                        today.
                                    </div>
                                </div>
                            </div>
                            <!-- Card  -->
                            <!-- Card header  -->
                            <div class="bg-light p-3 rounded" id="headingTwo">
                                <h3 class="mb-0 fw-bold">
                                    <a href="#" class="d-flex align-items-center text-inherit text-decoration-none"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span class="me-auto text-black-50">
                    What do I need to take a course?
                  </span>
                                        <span class="collapse-toggle ms-4">
                    <i class="fe fe-plus text-black"></i>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="pt-lg-5 pt-5 bg-cover before-footer d-flex align-items-center justify-content-end">
            <div class="container">
                <div class="offset-6 col-6 d-flex align-items-center justify-content-center flex-column">
                    <h1 class="display-2 text-white">Get the {{ config('app.name') }} App</h1>
                    <p class="text-white">Click the button below to download the {{ config('app.name') }} app.</p>
                    <form action="" class="d-flex align-items-center">
                        <input type="text" class="form-control rounded-5 w-100 me-3" placeholder="+8801*-********">
                        <button type="submit" class="btn btn-success rounded-5 text-black">Registration</button>
                    </form>
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

