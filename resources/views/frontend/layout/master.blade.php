<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codescandy.com/geeks-bootstrap-5/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 07:20:29 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("frontend") }}/assets/images/favicon/favicon.ico">

    <!-- Libs CSS -->
    <link href="{{ asset("frontend") }}/assets/fonts/feather/feather.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
    <link href="{{ asset("frontend") }}/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet"/>
    <link href="{{ asset("frontend") }}/assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet"/>
    <link href="{{ asset("frontend") }}/assets/libs/dropzone/dist/dropzone.css" rel="stylesheet"/>
    <link href="{{ asset("frontend") }}/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet"/>
    <link href="{{ asset("frontend") }}/assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/prismjs/themes/prism-okaidia.min.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/nouislider/dist/nouislider.min.css" rel="stylesheet">
    <link href="{{ asset("frontend") }}/assets/libs/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <style>
        #preeloader{
            backdrop-filter: blur(10px);
            width:100%;
            height:100vh;
            position:fixed;
            z-index:10000;
            {{--            background:url({{ asset("frontend/images/load.gif") }}) no-repeat center center;--}}
            {{--            background:url({{ asset("images/loader.svg") }}) no-repeat center center;--}}
        }

        .cardImage{
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
        .page-bg{
            background:#ededed;
        }
    </style>
    @stack('css')

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset("frontend") }}/assets/css/theme.min.css">
    <link rel="stylesheet" href="{{ asset("frontend") }}/assets/css/custom.css">
    <title>{{ get_setting('name') ?? 'Classified Posting' }} | @yield('title')</title>
</head>

<body class="page-bg">
<div id="frontendDiv">
    <div style="background-color: inherit;" id="preeloader" class="d-flex align-items-center justify-content-center"></div>


    <!-- navbar login -->
    @include('frontend.inc.header')
    <!-- Page Content -->
    @yield('content')
    <!-- Page Content -->
    <!-- footer -->
    @include('frontend.inc.footer')
    <!-- footer -->
    @include('sweetalert::alert')

</div>
<!-- Scripts -->
<!-- Libs JS -->
<script src="{{ asset("frontend") }}/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/odometer/odometer.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/quill/dist/quill.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/dragula/dist/dragula.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/prismjs/prism.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/typed.js/lib/typed.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/jsvectormap/dist/maps/world.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/fullcalendar/main.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/%40lottiefiles/lottie-player/dist/lottie-player.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/nouislider/dist/nouislider.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/wnumb/wNumb.min.js"></script>
<script src="{{ asset("frontend") }}/assets/libs/glightbox/dist/js/glightbox.min.js"></script>


<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- CDN File for moment -->
<script src='https://momentjs.com/downloads/moment.js'></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/main.js') }}"></script>
<!-- Theme JS -->
<script src="{{ asset("frontend") }}/assets/js/theme.min.js"></script>
<script>
    var preeloader = document.getElementById("preeloader");
    window.addEventListener('load', function(){
        preeloader.style.display="none";
        preeloader.remove();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });


</script>

<script>
    function deleteData(id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }


    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>

<script>
    $('.slider-single').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        adaptiveHeight: true,
        infinite: false,
        useTransform: true,
        speed: 400,
        cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    });

    $('.slider-nav')
        .on('init', function(event, slick) {
            $('.slider-nav .slick-slide.slick-current').addClass('is-active');
        })
        .slick({
            slidesToShow: 7,
            slidesToScroll: 7,
            dots: false,
            focusOnSelect: false,
            infinite: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            }, {
                breakpoint: 420,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            }]
        });

    $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
        $('.slider-nav').slick('slickGoTo', currentSlide);
        var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
        $('.slider-nav .slick-slide.is-active').removeClass('is-active');
        $(currrentNavSlideElem).addClass('is-active');
    });

    $('.slider-nav').on('click', '.slick-slide', function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');

        $('.slider-single').slick('slickGoTo', goToSingleSlide);
    });

    $("#showMore").click(function () {
        $('#fullDetailsShow').toggleClass('showMinDetails')
        if($("#fullDetailsShow").hasClass("showMinDetails")){
            $(this).html('Show More <i class="fe fe-chevron-down"></i>');
        }else{
            $(this).html('Show Less <i class="fe fe-chevron-up"></i>');
        }
    });

</script>

@stack('js')
</body>

<!-- Mirrored from codescandy.com/geeks-bootstrap-5/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Aug 2022 07:21:27 GMT -->
</html>
