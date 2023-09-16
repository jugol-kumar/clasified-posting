@extends('frontend.layout.master')
@section('title', get_setting('name')." Home")
@push('css')
    <link href="{{ asset('frontend/assets/libs/owl_css.min.css') }}" rel="stylesheet"></link>
    <style>
        .search-shabow{
            box-shadow: 1px 1px 38px 8px #4d72681c !important;
        }
        .card-icon-style{
            font-size: 38px;
            padding: 5px;
            background: #ededed;
            width: 80px;
            height: 80px;
            display: flex;
            color: #36423d;
            align-items: center;
            justify-content: center;
            border-radius: 100%;
        }
        .section-bg{
            background: #adffe829 !important;
        }
        .category-card-shadow{
            box-shadow: rgb(0 0 0 / 9%) 0 3px 12px !important;
        }
        .category-card-hover:hover{
            transform: scale(1.1);
            transition: 0.3s all ease;
        }
        .before-footer{
            background-image: url("{{ asset('frontend/assets/images/footer_banner.png') }}") !important;
            height: 100%;
            background-size: cover;
            background-position: center center;
            min-height: 500px;
        }
        .review-image{
            height: 300px;
            padding: 20px;
            border-radius: 32px;
        }
        #countryList{
            position: relative;
            right: -305px;
            top: -25px;
            max-height: 200px;
            max-width: 38%;
            background: white;
            overflow-y: scroll;
        }
        .fetured-post-bg{
            background:linear-gradient(45deg, #ffedb8, transparent);
        }
        .is-flex {
            display: flex;
            flex-wrap: wrap;
        }
        .is-flex > [class*='col-'] {
            display: flex;
            flex-wrap: wrap;
        }
        .page-bg{
            background:#ededed;
        }
        .header-bg{
            background:linear-gradient(180deg, white 70%, #ededed) !important;
        }
    </style>
@endpush
@section('content')
    <div class="py-lg-14 py-12 bg-cover header-bg">
        <!-- container -->
        <div class="container mt-15">
            <!-- row -->
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class=" text-center text-md-start ">
                        <!-- heading -->
                        <h1 class="display-1 fw-semibold  mb-3 text-center">Buy or sell your used or new product</h1>
                        <!-- lead -->
                        <p class="lead text-center">The budget and best new or used product buy selling online platform</p>
                    </div>
                    <div class="mt-8">
                        <div class="col-md-12 mx-auto">
                            <!-- card -->
                            <div class="bg-white rounded-md-pill rounded-3 mb-4 search-shabow">
                                <!-- card body -->
                                <div class="p-md-2 p-4">
                                    <!-- form -->
                                    <form class="row g-1" action="{{ route('client.searchJObs') }}" method="get">
                                        <div class="col-12 col-md-5">

                                            <!-- input -->
                                            <div class="input-group mb-2 mb-md-0 border-md-0 border rounded-pill">
                                                <!-- input group -->
                                                <span class="input-group-text bg-transparent border-0 pe-0 ps-md-3 ps-md-0" id="searchJob"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                                        class="bi bi-search text-muted" viewBox="0 0 16 16">
                                              <path
                                                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </span>
                                                <!-- search -->
                                                <input type="text" name="job_type" class="form-control rounded-pill border-0 ps-3 form-focus-none"
                                                       placeholder="Job Title">
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-4">
                                            <!-- inpt group -->
                                            <div class="input-group mb-3 mb-md-0 border-md-0 border rounded-pill">
                                                  <span class="input-group-text bg-transparent border-0 pe-0 ps-md-0" id="location">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                          class="bi bi-geo-alt  text-muted" viewBox="0 0 16 16">
                                                      <path
                                                          d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                                      <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    </svg>
                                                  </span>
                                                <!-- search -->
                                                <input type="text"
                                                       name="loacation"
                                                       class="form-control rounded-pill  border-0 ps-3 form-focus-none"
                                                       placeholder="Location"
                                                       id="location_search">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3  text-end d-grid">
                                            <!-- button -->
                                            <button type="submit" class="btn btn-success rounded-pill">Search</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div id="countryList">
                            </div>
                        </div>


                        <div class="align-items-center d-flex justify-content-around">
                           <div class="card bg-transparent shadow-none">
                               <div class="card-body bg-transparent shadow-none">
                                   <div class="d-flex flex-column align-items-center">
                                       <i class="mdi mdi-book-search-outline card-icon-style"></i>
                                       <h4 class="mt-3">185k +</h4>
                                       <p class="text-black-50 fw-semibold">Verified Recruiters</p>
                                   </div>

                               </div>
                           </div>
                            <div class="card bg-transparent shadow-none">
                                <div class="card-body bg-transparent shadow-none">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="mdi mdi-briefcase-search-outline card-icon-style"></i>
                                        <h4 class="mt-3">185k +</h4>
                                        <p class="text-black-50 fw-semibold">Jobs Posted</p>
                                    </div>

                                </div>
                            </div>
                            <div class="card bg-transparent shadow-none">
                                <div class="card-body bg-transparent shadow-none">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="mdi mdi-chat-sleep-outline card-icon-style"></i>
                                        <h4 class="mt-3">185k +</h4>
                                        <p class="text-black-50 fw-semibold">Chat Conversations</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="offset-lg-1 col-lg-5 col-12 text-center">
                    <div class="position-relative ">
                        <img src="{{ asset("frontend") }}/assets/images/job/png/job-hero-section.png" class="img-fluid ">
                        <div class="position-absolute top-0 mt-7 ms-n6 ms-md-n6 ms-lg-n12 start-0">
                            <img src="{{ asset("frontend") }}/assets/images/job/job-hero-block-1.svg" class="img-fluid ">
                        </div>
                        <div class="position-absolute bottom-0 mb-12 me-n6 me-md-n4 me-lg-n12 end-0 ">
                            <img src="{{ asset("frontend") }}/assets/images/job/job-hero-block-2.svg" class="img-fluid ">
                        </div>
                        <div class="position-absolute bottom-0 mb-n4 ms-n1 ms-md-n4 ms-lg-n7 start-0">
                            <img src="{{ asset("frontend") }}/assets/images/job/job-hero-block-3.svg" class="img-fluid ">
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>



<!--


    <div class="pt-lg-14 pg-12 bg-cover section-bg">
        &lt;!&ndash; container &ndash;&gt;
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 d-flex align-items-center justify-content-center flex-column">
                    <h1 class="display-2">Get the <span class="text-success">{{ config('app.name') }}</span> App</h1>
                    <p>We will send you a link via SMS. To download the app, simply open it.</p>

                    <form action="" class="d-flex align-items-center">
                        <input type="text" class="form-control rounded-5 w-100 me-3" placeholder="+8801*-********">
                        <button type="submit" class="btn btn-success rounded-5 text-black">Registration</button>
                    </form>

                </div>
                <div class="col-md-6 col-12 h-100">
                    <img class="float-end w-65" src="{{ asset('frontend/assets/images/home-phone.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
-->



    <div class="py-8">
        <!-- container -->
        <div class="container">
            <h1 class="text-center display-3">Trending Categories</h1>
            <div class="row mt-5">
                @foreach(App\Models\Category::all() as $cat)
                    <div class="col-md-3 col-6 mb-5">
                        <a href="/search?cat_id={{ $cat->id }}">
                            <div class="card category-card-shadow rounded-5 category-card-hover">
                                <div class="card-body py-6">
                                    <div class="d-flex align-items-center justify-content-center flex-column">
                                        <p class="fw-semibold fs-4 text-capitalize text-black">{{ $cat->name }}</p>
                                        <p class="text-black-50">{{ $cat->posts->where('status', 'Approved')->count() }} Posts</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-3 col-6 mb-5">
                    <a href="">
                        <div class="card category-card-shadow rounded-5 category-card-hover">
                            <div class="card-body py-6">
                                <div class="d-flex align-items-center justify-content-center flex-column">
                                    <p class="fw-semibold fs-4 text-capitalize text-black">
                                        <i class="fe fe-chevron-right"></i>
                                    </p>
                                    <p class="text-black-50">View More</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>



    @if($posts->count())
    <div class="py-8">
        <!-- container -->
        <div class="container">
            <h1 class="text-center display-3">Trending Posts</h1>
            <div class="row mt-5">
                @foreach($posts as $post)
                    @include('frontend.inc.postcard')
                @endforeach
                <a href="/search" class="btn btn-primary">Show More</a>
            </div>

        </div>
    </div>
    @endif

{{--
    <div class="pt-lg-14 pg-12">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 d-flex align-items-start justify-content-center flex-column">
                    <h1 class="display-3">Chat directly with Decision-Makers</h1>
                    <p>{{ config('app.name') }} encourages direct and quick responses between job-seekers and recruiters. Through the bi-directional direct chat feature, candidates can chat directly with relevant and verified recruiters on this job search app</p>
                    <a href="javascript:void(0)" class="btn btn-success rounded-5 btn-sm mt-2 text-black px-5 py-2">Get Hired</a>
                </div>
                <div class="col-md-6 col-12 h-100">
                    <img class="ms-10 w-65" src="{{ asset('frontend/assets/images/home-phone.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>




    <div class="pt-lg-5 pt-5 bg-cover bg-success">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 h-100">
                    <img class="float-start w-65" src="{{ asset('frontend/assets/images/home-phone.png') }}" alt="">
                </div>
                <div class="col-md-6 col-12 d-flex align-items-start justify-content-center flex-column">
                    <h1 class="display-3">Hire Directly with {{ config('app.name') }}</h1>
                    <p>3.8M+ candidates chat directly with 190K+ recruiters on Hirect.</p>
                    <button class="btn btn-white rounded-5 mt-6">Install App</button>
                </div>
            </div>
        </div>
    </div>



    <div class="py-8">
        <!-- container -->
        <div class="container text-center">
            <h1 class="text-center display-3">Find Candidates in your City</h1>
            <div class="row mt-5">
                @for($i = 0; $i < 4 ; $i++)
                    <div class="col-md-3 col-6 mb-5">
                        <a href="">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column">
                                        <i class="mdi mdi-home-lightbulb-outline fs-1"></i>
                                        <p class="fw-semibold fs-4 text-capitalize text-black">It Engineers</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
            <a class="btn btn-outline-dark rounded-5 mt-6 py-2 px-5" width="100">View More</a>
        </div>
    </div>


    <div class="pt-lg-5 pt-5 bg-cover category-card-shadow">
        <div class="py-8">
            <!-- container -->
            <div class="container text-center">
                <h1 class="display-4 mb-5">More than <span class="text-success">190k</span> Recruiters trust <span class="text-success">{{ config('app.name') }}</span></h1>
                <div class="row mt-3">
                    <div class="col-md-12 col-12">
                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            @for($i=0; $i<18; $i++)
                            <div class="col-2 mb-5">
                                <div class="card category-card-shadow">
                                    <div class="card-body">
                                        <img src="{{ asset("frontend") }}/assets/images/brand/gray-logo-airbnb.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

--}}

{{--
    <div class="pt-lg-12 pb-lg-12 pt-8 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="mb-0 display-3 text-center">Influencer's Take on <span class="text-success">{{ config('app.name') }}</span></h1>
                </div>
            </div>
            <div class="position-relative">
                <div class="col-md-10 mx-auto">
                    <ul class="controls" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
                        <li class="prev" data-controls="prev" aria-controls="customize" tabindex="-1">
                            <i class="fe fe-chevron-left"></i>
                        </li>
                        <li class="next" data-controls="next" aria-controls="customize" tabindex="-1">
                            <i class="fe fe-chevron-right"></i>
                        </li>
                    </ul>
                    <div class="my-slider">
                        <div class="slider-item">
                            <div class="card category-card-shadow m-10">
                                <div class="row g-0">
                                    <!-- Image -->
                                    <div class="col-lg-4 col-md-12 col-12 bg-cover img-left-rounded">
                                        <img src="https://www.hirect.in/_nuxt/img/ranveer.7126872.jpg" class="img-fluid review-image" alt="">
                                    </div>
                                    <div class="col-lg-8 col-md-12 col-12">
                                        <div class="card-body">
                                            <h1 class="mb-2 mb-lg-4">Jugo Kumar</h1>
                                            <p>Full Stuck Web Application Developer</p>
                                            <p class="mt-6">Our features, journey, tips and us being us. Lorem ipsum dolor sit amet,
                                                accumsan
                                                in, tempor dictum neque.lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ea eius facilis magnam mollitia perspiciatis quibusdam rem, rerum. Accusantium cumque debitis distinctio dolorum fugit hic molestias numquam obcaecati rem voluptas.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="card category-card-shadow m-10">
                                <div class="row g-0">
                                    <!-- Image -->
                                    <div class="col-lg-4 col-md-12 col-12 bg-cover img-left-rounded">
                                        <img src="https://www.hirect.in/_nuxt/img/Mithila.d9db4b0.png" class="img-fluid review-image" alt="">
                                    </div>
                                    <div class="col-lg-8 col-md-12 col-12">
                                        <div class="card-body">
                                            <h1 class="mb-2 mb-lg-4">Jugo Kumar</h1>
                                            <p>Full Stuck Web Application Developer</p>
                                            <p class="mt-6">Our features, journey, tips and us being us. Lorem ipsum dolor sit amet,
                                                accumsan
                                                in, tempor dictum neque.lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ea eius facilis magnam mollitia perspiciatis quibusdam rem, rerum. Accusantium cumque debitis distinctio dolorum fugit hic molestias numquam obcaecati rem voluptas.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="card category-card-shadow m-10">
                                <div class="row g-0">
                                    <!-- Image -->
                                    <div class="col-lg-4 col-md-12 col-12 bg-cover img-left-rounded">
                                        <img src="https://www.hirect.in/_nuxt/img/ranveer.7126872.jpg" class="img-fluid review-image" alt="">
                                    </div>
                                    <div class="col-lg-8 col-md-12 col-12">
                                        <div class="card-body">
                                            <h1 class="mb-2 mb-lg-4">Jugo Kumar</h1>
                                            <p>Full Stuck Web Application Developer</p>
                                            <p class="mt-6">Our features, journey, tips and us being us. Lorem ipsum dolor sit amet,
                                                accumsan
                                                in, tempor dictum neque.lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ea eius facilis magnam mollitia perspiciatis quibusdam rem, rerum. Accusantium cumque debitis distinctio dolorum fugit hic molestias numquam obcaecati rem voluptas.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-item">
                            <div class="card category-card-shadow m-10">
                                <div class="row g-0">
                                    <!-- Image -->
                                    <div class="col-lg-4 col-md-12 col-12 bg-cover img-left-rounded">
                                        <img src="https://www.hirect.in/_nuxt/img/ranveer.7126872.jpg" class="img-fluid review-image" alt="">
                                    </div>
                                    <div class="col-lg-8 col-md-12 col-12">
                                        <div class="card-body">
                                            <h1 class="mb-2 mb-lg-4">Jugol Kumar</h1>
                                            <p>Full Stuck Web Application Developer</p>
                                            <p class="mt-6">Our features, journey, tips and us being us. Lorem ipsum dolor sit amet,
                                                accumsan
                                                in, tempor dictum neque.lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ea eius facilis magnam mollitia perspiciatis quibusdam rem, rerum. Accusantium cumque debitis distinctio dolorum fugit hic molestias numquam obcaecati rem voluptas.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
--}}


<!--

    <div class="pt-lg-5 pt-5 bg-cover before-footer d-flex align-items-center justify-content-end">
        <div class="container">
            <div class="offset-6 col-6 d-flex align-items-center justify-content-center flex-column">
                <h1 class="display-2 text-white">Get the <span class="text-success">{{ config('app.name') }}</span> App</h1>
                <p class="text-white">We will send you a link via SMS. To download the app, simply open it.</p>
                <form action="" class="d-flex align-items-center">
                    <input type="text" class="form-control rounded-5 w-100 me-3" placeholder="+8801*-********">
                    <button type="submit" class="btn btn-success rounded-5 text-black">Registration</button>
                </form>
            </div>
        </div>
    </div>

-->

    <div class="pt-lg-5 pt-5 bg-cover">
        <div class="py-8">
            <div class="container">
                <div class="showMinDetails" id="fullDetailsShow">
                    {!! get_setting('home_details') !!}
                </div>
                <div class="d-flex w-100 mx-auto">
                    <button id="showMore" class="show-more-btn">Show More <i class="fe fe-chevron-down"></i></button>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('js')
    <script>
        const slider = tns({
            center: true,
            container: '.my-slider',
            prevButton: '.prev',
            nextButton: '.next',
            loop: true,
            nav:false,
            items: 1,
            slideBy: 1,
        });
        $('#location_search').on('keyup',function(e){
            let text = e.target.value;
            if (text != null){
                $.ajax({
                    url: '{{ route('client.allDistrict') }}',
                    data: {data: text, _token: '{{csrf_token()}}'},
                    type: 'POST',
                    success:function (res){
                        $('#countryList').empty();
                        if (res != null){
                            $('#countryList').fadeIn();
                            $('#countryList').html(res);
                        }else{
                            eTost('Data Not Found...');
                            $('#countryList').fadeIn();
                        }
                    }
                })
            }
        });
        $(document).on('click','li',function(){
            $("#location_search").val($(this).text());
            $('#countryList').fadeOut();
        });
        $(document).on('click', function (){
            $('#countryList').fadeOut();
        })
    </script>
@endpush
