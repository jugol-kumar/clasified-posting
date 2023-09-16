@extends('frontend.layout.master')

@section('content')
<section id="banner" class="py-5">
    <div class="container">
        <h3 class="text-white text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, totam.</h3>
    </div>

</section>


<section>
    <div class="container mt-4 p-0">
        <div class="row px-md-4 px-2 pt-4">
            <div class="col-lg-8">
                <p class="pb-2 fw-bold">Order</p>
                <div class="card p-2">
                    <h3>{{ $course->name }}</h3>
                    <p>{!!  $course->description !!}</p>
                </div>
            </div>
            <div class="col-lg-4 payment-summary">
                <p class="fw-bold pt-lg-0 pt-4 pb-2">Payment Summary</p>
                <div class="card px-md-3 px-2 pt-4">
                    <div class="d-flex justify-content-between b-bottom"> <input type="text" class="ps-2" placeholder="COUPON CODE">
                        <div class="btn btn-primary">Apply</div>
                    </div>
                    <div class="d-flex flex-column b-bottom">
                        <div class="d-flex justify-content-between py-3"> <small class="text-muted">Order Summary</small>
                            <p>${{ $course->price }}</p>
                        </div>
                        <div class="d-flex justify-content-between pb-3"> <small class="text-muted">Discount</small>
                            <p>$0</p>
                        </div>
                        <div class="d-flex justify-content-between"> <small class="text-muted">Total Amount</small>
                            <p>${{ $course->price }}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('paypal.pay') }}" method="get">
                            @csrf
                            <input type="hidden" name="name" value="{{ $course->name }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="amount" value="{{ $course->price }}">
                            <button class="btn btn-primary btn-block">Confirm Order Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
