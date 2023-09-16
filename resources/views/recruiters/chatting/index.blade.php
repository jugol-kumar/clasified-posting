@extends('frontend.layout.master')
@push('css')
    <style>
        .chat-online {
            color: #34ce57
        }
        .chat-offline {
            color: #e4606d
        }
        .chat-messages {
            display: flex;
            flex-direction: column;
            height: 500px;
            overflow-y: scroll
        }
        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }
        .chat-message-left {
            margin-right: auto
        }
        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
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
    </style>
@endpush
@section('content')

    <div class="py-14">
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-right">
                        <div class="px-4 d-none d-md-block">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control my-3" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        @if($messages->count())
                            @foreach($messages as $message)
                                <a href="{{ route('user.singlePostSingleMessage', $message?->id) }}" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="/storage/{{ json_decode($message?->post?->images)[0] }}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            {{ $message?->post?->title }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif


                        <hr class="d-block d-lg-none mt-1 mb-0">
                    </div>
                    <div class="col-12 col-lg-7 col-xl-9">
                        <div class="min-chat-height">
                            @if(isset($mDetails))
                                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                    <div class="d-flex align-items-center py-1">
                                        <div class="position-relative">
                                            <img src="/storage/{{ json_decode($mDetails?->post?->images)[0] }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        </div>
                                        <div class="flex-grow-1 pl-3">
                                            <strong>{{ $mDetails->post?->title }}</strong>
                                            <div class="text-muted small"><em>{{ $mDetails->post->price }}</em></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <div class="chat-messages p-4">
                                        @foreach($mDetails->messages as $chat )
                                            @if($chat->from_id == Auth::id())
                                                <div class="chat-message-right pb-4">
                                                <div>
                                                    <img src="{{ Auth::user()->photo }}" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                    <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                                </div>
                                                <div class="d-flex flex-column gap-2 flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                    <strong class="font-weight-bold mb-1">You</strong>
                                                    {{ $chat?->body }}
                                                </div>
                                            </div>
                                            @else
                                            <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="{{ $chat?->sender?->photo }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">{{ $chat?->sender?->name }}</div>
                                                {{ $chat?->body }}
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
