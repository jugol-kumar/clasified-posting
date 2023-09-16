@extends('frontend.layout.master')

@section('content')
<section id="banner" class="py-5">
    <div class="container">
        <h3 class="text-white text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, totam.</h3>
    </div>

</section>

<div id="main-content" class="blog-page">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="card single_post">
                    <div class="body p-2">
                        <div class="img-post">
                            <img class="d-block img-fluid" src="{{ $course->cover }}" alt="{{ $course->name }}">
                        </div>
                        <h4 class="py-3">{{ $course->name }}</h4>
                        <p>{{ $course->description }}</p>
                        <a href="/checkout/{{ $course->slug }}" class="btn btn-primary my-3">Checkout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
