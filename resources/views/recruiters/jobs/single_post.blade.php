@extends('frontend.layout.master')
@push('css')
    <style>
        .iconImage{
            min-width: 40px;
            min-height: 40px;
        }
    </style>
@endpush
@section("content")
    <section class="container px-0 py-14">
        <!-- row -->
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <img src="/storage/{{ json_decode($post->images)[0] }}"  width="100" height="100" alt="">
                    <h2>{{ $post->title }}</h2>
                    <strong>Tk {{ $post->price }}</strong>
                    <small>{{ $post->short_details }}</small>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-md-3">
                <div class="card simplebar-scrollable-y" style="max-height: 100vh; overflow-y: scroll">
                    <div class="card-body p-0">
                        <ul class="list-unstyled contacts-list">
                            @foreach($post->messageDetails  as $item)
                                <li class="py-3 px-4 chat-item contacts-item cursor-pointer">
                                    <a href="{{ route('user.singlePostSingleMessage', $item->id) }}" class="d-flex gap-2 ">
                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                            <img src="/storage/{{ json_decode($item->post->images)[0] }}"  class="rounded-circle iconImage"  alt="...">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <strong>{{ $item->user->name }}</strong>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @if(isset($chatings ))
            <div class="col-xl-9 col-lg-12 col-md-12 col-12">
                &lt;!&ndash; chat list &ndash;&gt;
                <div class="chat-body w-100 vh-100 simplebar-scrollable-y chat-body-visible" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                     aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <div class="bg-white border-top border-bottom px-4 py-3 sticky-top">
                                            <div class="d-flex justify-content-between align-items-center">
                                                &lt;!&ndash; media &ndash;&gt;
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="me-2 d-xl-none d-block" data-close=""><i
                                                            class="fe fe-arrow-left"></i></a>
                                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                                        <img src="../../assets/images/avatar/avatar-4.jpg" alt=""
                                                             class="rounded-circle">
                                                    </div>
                                                    &lt;!&ndash; media body &ndash;&gt;
                                                    <div class=" ms-2">
                                                        <h4 class="mb-0">Sharad Mishra</h4>
                                                        <p class="mb-0 text-muted">Online</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#" class="me-3  text-link texttooltip"
                                                       data-template="phone">
                                                        <i class="fe fe-phone-call fs-3"></i>
                                                        <div id="phone" class="d-none">
                                                            <span>Voice Call </span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="me-3  text-link texttooltip"
                                                       data-template="video">
                                                        <i class="fe fe-video fs-3"></i>
                                                        <div id="video" class="d-none">
                                                            <span>Video Call </span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="text-link texttooltip"
                                                       data-template="adduser">
                                                        <i class="fe fe-user-plus fs-3"></i>
                                                        <div id="adduser" class="d-none">
                                                            <span>Add User </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-4 vh-100 overflow-hidden" style="margin-bottom: 4rem;">
                                            @if(isset($chatings))
                                                @foreach($chatings as $message)
                                            @if($message->from_id != Auth::id())
                                                &lt;!&ndash; media &ndash;&gt;
                                                    <div class="d-flex w-lg-40 mb-4">
                                                        <div class=" ms-3">
                                                            <small>sharad mishra , 09:35</small>
                                                            <div class="d-flex">
                                                                <div class="card mt-2 rounded-top-md-left-0">
                                                                    <div class="card-body p-3">
                                                                        <p class="mb-0 text-dark">
                                                                            {{ $message->body }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-2 mt-2">
                                                                    &lt;!&ndash; dropdown &ndash;&gt;
                                                                    <div class="dropdown dropend">
                                                                        <a class="text-link" href="#" role="button"
                                                                           id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                                           aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fe fe-more-vertical"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu"
                                                                             aria-labelledby="dropdownMenuLink">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i class="fe fe-trash dropdown-item-icon"></i>Delete
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="d-flex justify-content-end mb-4">
                                                        <div class="d-flex w-lg-40">
                                                            <div class=" me-3 text-end">
                                                                <small> 09:39</small>
                                                                <div class="d-flex">
                                                                    <div class="me-2 mt-2">
                                                                        <div class="dropdown dropstart">
                                                                            <a class="text-link" href="#" role="button"
                                                                               id="dropdownMenuLinkTwo"
                                                                               data-bs-toggle="dropdown"
                                                                               aria-haspopup="true" aria-expanded="false">
                                                                                <i class="fe fe-more-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu"
                                                                                 aria-labelledby="dropdownMenuLinkTwo">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="fe fe-trash dropdown-item-icon"></i>Delete
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="card mt-2 rounded-top-md-end-0 bg-primary text-white">

                                                                        <div class="card-body text-start p-3">
                                                                            <p class="mb-0">
                                                                                {{ $message->body }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img src="../../assets/images/avatar/avatar-1.jpg" alt=""
                                                                 class="rounded-circle avatar-md">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @endif
                                        </div>
                                        &lt;!&ndash; chart footer &ndash;&gt;
                                        <div class="bg-light px-4 py-3 mt-auto chat-footer bottom-0">
                                            <div class="bg-white p-2 rounded-3 shadow-sm">
                                                <form action="{{ route('user.sendChat') }}" method="post">
                                                    @csrf
                                                    <div class="position-relative">
                                                        <textarea class="form-control border-0 form-control-simple no-resize"
                                                                  placeholder="Type a New Message" name="body" rows="1"></textarea>
                                                    </div>
                                                    <div class="position-absolute end-0 mt-n7 me-4">
                                                        <button type="submit"
                                                                class="fs-3 btn text-primary btn-focus-none">
                                                            <i class="fe fe-send"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mt-3 d-flex">
                                                <div>
                                                    <a href="#" class="text-link me-2 fs-4"><i
                                                            class="bi-emoji-smile"></i></a>
                                                    <a href="#" class="text-link me-2 fs-4"><i
                                                            class="bi-paperclip"></i></a>
                                                    <a href="#" class="text-link me-3 fs-4"><i
                                                            class="bi-mic"></i></a>
                                                </div>
                                                <div class="dropdown">
                                                    <a href="#" class="text-link fs-4" id="moreAction"
                                                       data-bs-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i class="fe fe-more-horizontal"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="moreAction">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 837px; height: 568px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                             style="height: 225px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection
