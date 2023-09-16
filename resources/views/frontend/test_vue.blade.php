@extends('frontend.layout.master')


@section('content')
    <div id="myDev">
        <exmaple/>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
