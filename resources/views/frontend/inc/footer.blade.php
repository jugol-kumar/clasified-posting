
<div class="pt-lg-10 pt-5 footer bg-black">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- about company -->
                <div class="mb-4">
                    <img src="{{ config("app.url")."/storage/".get_setting('footer_logo')   }}" alt="">
{{--                    <img src="{{  asset('frontend/assets/images/hiref-white.png')  }}" alt="" style="max-width: 150px; min-width: 150px;">--}}
                    <div class="mt-4">
                        <p class="text-white">{!! get_setting('app_details') !!}</p>
                        <!-- social media -->
                        <div class="fs-4 mt-4">
                            <a href="{{ get_setting('facebook_profile') }}" class="mdi mdi-facebook fs-4 text-muted me-2" target="_blank"></a>
                            <a href="{{ get_setting('twitter_profile') }}" class="mdi mdi-twitter text-muted me-2" target="_blank"></a>
                            <a href="{{ get_setting('instagram_profile') }}" class="mdi mdi-instagram text-muted me-2" target="_blank"></a>
                            <a href="{{ get_setting('linkedin_profile') }}" class="mdi mdi-linkedin text-muted " target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
                <div class="mb-4">
                    <!-- list -->
                    <h3 class="fw-bold mb-3 text-white">Company</h3>
                    <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                        <li><a href="#" class="nav-link text-white">About</a></li>
                        <li><a href="#" class="nav-link text-white">Blog</a></li>
                        <li><a href="#" class="nav-link text-white">Careers</a></li>
                        <li><a href="#" class="nav-link text-white">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="mb-4">
                    <!-- list -->
                    <h3 class="fw-bold mb-3 text-white">Support</h3>
                    <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                        <li><a href="#" class="nav-link text-white">Help and Support</a></li>
                        <li><a href="{{ route('seeker.dashboard') }}" class="nav-link text-white">Become Seekers</a></li>
                        <li><a href="#" class="nav-link text-white">Get the app</a></li>
                        <li><a href="#" class="nav-link text-white">FAQ’s</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <!-- contact info -->
                <div class="mb-4">
                    <h3 class="fw-bold mb-3 text-white">Get in touch</h3>
                    <p class="text-white">{{ get_setting('address') }}</p>
                    <p class="mb-1 text-white">Email: <a href="#">{{ get_setting('email') }}</a></p>
                    <p class="text-white">Phone: <span class="text-white fw-semi-bold">{{ get_setting('phone') }}</span></p>

                </div>
            </div>
        </div>
        <div class="row align-items-center g-0 border-top py-2 mt-6">
            <!-- Desc -->
            <div class="col-lg-4 col-md-5 col-12">
                <span class="text-white">©{{ now()->format('Y') }} {{ get_setting('name') }}.info | All Rights Reserved</span>
            </div>

            <!-- Links -->
            <div class="col-12 col-md-7 col-lg-8 d-md-flex justify-content-end">
                <nav class="nav nav-footer">
                    <a class="nav-link ps-0 text-white" href="#">Privacy Policy</a>
                    <a class="nav-link text-white" href="#">Terms of Use</a>
                </nav>
            </div>
        </div>
    </div>
</div>
