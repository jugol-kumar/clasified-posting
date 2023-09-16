@extends('frontend.layout.master')
@push('css')
    <style>
        .slider .slider-nav .sliger-nav-image{
            width: 120px;
            height: 120px;
        }
        .slick-track{
            display: flex;
            gap: 10px;
        }
        .slick-slide{
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: #beb9cd;
        }
        .call-button{
            margin-top:8px;
        }
        .call-button .fe-phone-call{
            background: linear-gradient(45deg, #0a9f74, #19cb98);
            padding: 7px;
            color: white;
            border-radius: 100%;
        }

        .call-button .fe-message-circle{
            background: linear-gradient(45deg, #ffa000, #fcc05f);
            padding: 7px;
            color: white;
            border-radius: 100%;
        }
        .stickyCard{
            position: sticky !important;
            top: 13% !important;
        }
        .secqurity-card{
            border: 2px solid !important;
            border-radius: inherit !important;
        }
        .arrow-btn i{
            background: linear-gradient(45deg, #0a9f74, #19cb98) !important;
            padding: 10px !important;
            border-radius: 50% !important;
            font-size: 23px !important;
        }
        .map-card iframe{
            width: 100% !important;
            height: 100% !important;
        }
    </style>
@endpush
@section('content')
    <div class="py-14">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ $post?->title }}</h2>
                            <small>Posted On: {{ $post->created_at?->diffForHumans() }}
                                @if($post->division)
                                    , {{ $post->division->name }}
                                @endif

                                @if($post->district)
                                    , {{ $post->district->name }}
                                @endif
                                @if($post->upozila)
                                    , {{ $post->upozila->name }}
                                @endif
                            </small>

                            @if(json_decode($post->images))
                                <div>
                                    <div class="slider-single">
                                        @foreach(json_decode($post->images) as $img)
                                            <div>
                                                <img src="/storage/{{ $img }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="slider slider-nav mt-2 bg-gray-400">
                                        @foreach(json_decode($post->images) as $img)
                                            <div class="slider-nav-image">
                                                <img class="w-100 h-100" src="/storage/{{ $img }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2>Tk {{ $post?->price }}</h2>
                            @if($post->category)
                                <div class="d-flex align-items-baseline gap-2">
                                    <strong>Category: </strong>
                                    <p>{{ $post?->category?->name }}</p>
                                </div>
                            @endif
                            @if($post->subCategory)
                                <div class="d-flex align-items-baseline gap-5">
                                    <strong>Sub Category: </strong>
                                    <p>{{ $post?->subCategory?->name }}</p>
                                </div>
                            @endif

                            <div>
                                <h2>Short Details</h2>
                                <p>{{ $post?->short_details }}</p>
                            </div>

                            <div>
                                <h2>About Post</h2>
                                <div class="showMinDetails" id="fullDetailsShow">{!! $post?->full_details !!}</div>

                                <div class="d-flex w-100 mx-auto">
                                    <button id="showMore" class="show-more-btn">Show More <i class="fe fe-chevron-down"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stickyCard">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <small>For sell by </small>
                                        <strong>{{ $post->user?->name }}</strong>
                                    </li>
                                    <a href="tel:{{ $post?->user?->phone }}" class="list-group-item cursor-pointer">
                                        <div class="d-flex gap-3">
                                            <div class="call-button">
                                                <i class="fe fe-phone-call"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <strong>{{ $post->user->phone }}</strong>
                                                <small>click here for show call</small>
                                            </div>
                                        </div>
                                    </a>

                                    <li class="list-group-item cursor-pointer" onclick="openModal({{ $post?->id }})" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <div class="d-flex gap-3">
                                            <div class="call-button">
                                                <i class="fe fe-message-circle"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <strong>Message To Seller</strong>
                                                <small>click for send message</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mt-3 border-2 ">
                            <div class="card-body border-2 border-success secqurity-card">
                                <div>
                                    <img src="{{ asset('images/security.png') }}" alt="">
                                    <strong>Safety tips</strong>
                                </div>
                                <ul>
                                    <li>Don’t go to unfamiliar places alone</li>
                                    <li>Don’t make full payment to 3rd parties</li>
                                </ul>
                                <a class="ms-3" href="#">See all safety tips</a>
                            </div>
                        </div>
                        @if($post?->map)
                            <div class="card mt-3">
                                <div class="card-body map-card">
                                    {!! $post?->map !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($categoryPosts as $item)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach($item as $post)
                                            @include('frontend.inc.postcard')
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="arrow-btn carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <i class="fe fe-chevron-left"></i>
                        </button>
                        <button class="arrow-btn carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide  ="next">
                            <i class="fe fe-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Message For Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.sendMessage') }}" method="post">
                        @csrf
                        <input type="hidden" id="setPostId" name="postId" value="{{ $post }}">
                        <div>
                            <label for="message">Your Message</label>
                            <textarea name="body" id="message" rows="5" placeholder="Message..." class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function openModal(id){
            $("#setPostId").val(id)
        }

    </script>
@endpush
