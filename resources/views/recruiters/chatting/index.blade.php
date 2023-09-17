@extends('frontend.layout.master')
@push('css')
    <style>
        .chat-messages {
            display: flex;
            flex-direction: column;
            height: 350px;
            overflow-y: scroll
        }
        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }
        .chat-message-left {
            margin-right: auto;
            width:70%;
        }
        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto;
            width:70%;
        }
        .py-3 {
            padding-top: 1rem!important;
            padding-bottom: 1rem!important;
        }
        .px-4 {
            padding-right: 1.5rem!important;
            padding-left: 1.5rem!important;
        }
        .flex-grow-0 {
            flex-grow: 0!important;
        }
        .border-top {
            border-top: 1px solid #dee2e6!important;
        }
        .min-chat-height{
            min-height: 500px;
        }
        .chat-list-height{
            height: 500px;
            overflow-y: scroll;
        }
        .borderRight{
            border-right:1px solid #ecebf1;
        }
        .single-item-msg{
            border-bottom:1px solid #ecebf1 !important;
            padding: 10px !important;
        }
        .chat-messages::-webkit-scrollbar,
        .chat-list-height::-webkit-scrollbar
        {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .chat-messages,
        .chat-list-height{
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
@endpush
@section('content')
    <div class="py-14">
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 borderRight chat-list-height">
                        @if($messages->count())
                            @foreach($messages as $message)
                                <a href="{{ route('user.singlePostSingleMessage', $message?->id) }}" class="list-group-item list-group-item-action single-item-msg">
                                    <div class="d-flex align-items-start gap-3">
                                        <img src="/storage/{{ json_decode($message?->post?->images)[0] }}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                        <div class="flex-grow-1 ml-3 d-flex flex-column">
                                            <strong>{{ $message?->post?->title }}</strong>
                                            <small>{{ Str::limit($message->post->short_details, 30) }}...</small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif

                        <hr class="d-block d-lg-none mt-1 mb-0">
                    </div>
                    <div class="col-12 col-lg-7 col-xl-9 min-chat-height">
                        <div class="">
                            @if(isset($mDetails))
                                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                    <a href="/single-post/{{ $mDetails?->post?->id }}" target="_blank" class="list-group-item list-group-item-action single-item-msg border-0">
                                        <div class="d-flex align-items-start gap-3">
                                            <img src="/storage/{{ json_decode($mDetails?->post?->images)[0] }}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                            <div class="flex-grow-1 ml-3 d-flex flex-column">
                                                <strong>{{ $mDetails?->post?->title }}</strong>
                                                <small>{{ Str::limit($mDetails->post->short_details, 60) }}...</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="position-relative">
                                    <div class="chat-messages p-4">
                                        @foreach($mDetails->messages as $chat )
                                            @if($chat->from_id == Auth::id())
                                                <div class="chat-message-right pb-4">
                                                    <div>
                                                        <img src="{{ Auth::user()->photo }}" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                    </div>
                                                    <div class="d-flex flex-column gap-2 flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                        <strong class="font-weight-bold mb-1">You</strong>
                                                        <p>{{ $chat?->body }}</p>
                                                        <small class="text-muted small text-nowrap mt-2">{{ $chat->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="chat-message-left pb-4">
                                                    <div>
                                                        <img src="{{ $chat?->sender?->photo }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                    </div>
                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                        <strong class="font-weight-bold mb-1">{{ $chat?->sender?->name }}</strong>
                                                        <p>{{ $chat?->body }}</p>
                                                        <small class="text-muted small text-nowrap mt-2">{{ $chat->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <form action="{{ route('user.sendChat') }}" method="post" class="input-group">
                                        @csrf
                                        <input type="hidden" name="messageDetails" value="{{ $mDetails->id }}">
                                        <input name="body" type="text" class="form-control" placeholder="Type your message">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                            @else
                                <div class="d-flex align-items-center justify-content-center min-chat-height">
                                    <h2>Select an item for chatting</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
