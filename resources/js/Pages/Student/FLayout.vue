<template>
    <header class="text-white shadow">
        <nav class="navbar navbar-expand-lg navbar-light navBg">
            <div class="container-fluid">
                <a class="navbar-brand  widht-1200-text" href="index.html"> <span
                        class="lms font-weight-bold">LMS</span><span class="edu font-weight-light">edu</span></a>
                <button class="navbar-toggler  widht-1200-text" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav left-nav">
                        <li class="nav-item"><a class="nav-link widht-1200-text" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link widht-1200-text" href="contract.html">Contract</a></li>
                        <li class="nav-item"><a class="nav-link widht-1200-text" href="conditions.html">Privacy</a></li>
                        <li class="nav-item"><a class="nav-link widht-1200-text" href="qna.html">Question</a></li>
                    </ul>
                    <ul class="navbar-nav right-nav">
                        <li class="nav-item"><a class="nav-link widht-1200-text" href="#"><i
                                    class="fa fa-search"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link widht-1200-text" href="#"><i
                                    class="fa fa-shopping-bag"></i></a></li>
                        <li class="nav-item"><a class="nav-link widht-1200-text" href="#"><i
                                    class="fa fa-user"></i>Register
                                &nbsp; /
                                &nbsp; <i class="fa fa-lock"></i>Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <slot />
    <footer class="footer-bg py-5 text-white">
        <div class="container">
            <div class="row pb-5 footerTop">
                <div class="col-sm-6 col-md-3 col-lg-3 col-12">
                    <div class="address-content">
                        <p class="font-weight-bold">Address :</p>
                        <p>73724 Route 30<br/>
                            South Richmond Hill, NY 11419</p>

                        <p class="m-0 p-0"><span class="font-weight-bold">Tel:</span> (603)-677-3400</p>
                        <p class="m-0 p-0"> <span class="font-weight-bold">Email:</span> info@yourdomain.com</p>
                        <p class="m-0 p-0"><span class="font-weight-bold">Web:</span> yourdomain.com</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2 col-12">
                    <div class="help-center-content">
                        <p class="font-weight-bold">Help Center :</p>
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="#" class="nav-link">Documentations</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tutorials</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Term of Use</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2 col-12">
                    <div class="about-section">
                        <p class="font-weight-bold">About Us :</p>
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="#">Our Team</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Company</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Jobs</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">News Latter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2  col-12">
                    <div class="tools-content">
                        <p class="font-weight-bold">Tools :</p>
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="#">Create Acccount</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Log In</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-12">
                   <p class="font-weight-bold">Get In Touch :</p>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Join Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Invite Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Donate</a></li>
                    </ul>
                </div>
            </div>
            <hr class="bg-secondary mt-5-4"/>
            <div class="footer-bottom">
               <div class="row">
                   <div class="col-md-6">
                       <div class="navbar navbar-expand-md">
                           <ul class="navbar-nav">
                               <li class="nav-item"><a class="nav-link" href="#">Facebook.</a></li>
                               <li class="nav-item"><a class="nav-link" href="#">Twitter. </a></li>
                               <li class="nav-item"><a class="nav-link" href="#">Instagram. </a></li>
                               <li class="nav-item"><a class="nav-link" href="#">LinkedIn. </a></li>
                               <li class="nav-item"><a class="nav-link" href="#">Google Plus.</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <h6 class="text-right">Copyright &copy; 2021 LMS EDUCATION. All Rights Reserved || Made By <a href="https://www.facebook.com/milonkumar.kumar.58">Milon Kumar</a></h6>
                   </div>
               </div>
            </div>
        </div>
    </footer>
</template>