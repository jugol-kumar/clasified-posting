@extends('frontend.layout.master')

@section('title', 'verification number')
@push('css')
    <style>
        bgWhite{
            background:white;
            box-shadow:0px 3px 6px 0px #cacaca;
        }

        .title h1{
            font-weight:600;
            margin-top:20px;
            font-size:24px
        }
        .title p{
            font-size: 12px;
            color: black;
        }

        .customBtn{
            border-radius:0px;
            padding:10px;
        }

        form input{
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 1px solid #e1e1e1;
            text-align: center;
            border-radius: 7px;
            margin: 10px;
        }
    </style>
@endpush
@section('content')

    <div class="bg-light-primary py-lg-14 py-12 bg-cover ">

        <div class="container">
            <div class="col-md-4 text-center mx-auto">
                <div class="card">
                    <div class="card-body">


                        <h6>Please enter the one time password <br> to verify your account</h6>
                        <div> <span>A code has been sent to</span> <small>*******{{ substr(Auth::user()->phone, -4) }}</small> </div>
                        <form action="{{ route('verificationOtp') }}" method="post" class="mt-5" id="verificationForm">
                            @csrf
                            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                <input class="m-2 text-center form-control rounded" name="otp[]" type="text" id="first" maxlength="1" />
                                <input class="m-2 text-center form-control rounded" name="otp[]" type="text" id="second" maxlength="1" />
                                <input class="m-2 text-center form-control rounded" name="otp[]" type="text" id="third" maxlength="1" />
                                <input class="m-2 text-center form-control rounded" name="otp[]" type="text" id="fourth" maxlength="1" />
                            </div>
                            @error('otp.*')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <p id="timer" style="display: none"></p>
                            <div class="d-flex flex-column">
                                <button type="button" id="resend" style="display: block" class="btn btn-link text-start">Resend Otp</button>
                                <button type="button" id="submitOtp" class='btn btn-primary btn-block customBtn'>Verify</button>
                            </div>
                        </form>


                    <!--                        <div class="title">
                            <h1>Verify OTP</h1>
                            <p class="text-black fs-6">We will send 4 digit one time password <span class="text-success">{{ Auth::user()->phone }}</span> this number. please provide this and verified your number</span></p>
                        </div>
                        <form action="{{ route('verificationOtp') }}" method="post" class="mt-5">
                            @csrf
                        <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 >
                        <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 >
                        <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 >
                        <input class="otp" type="text" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1 >
                        <p id="timer"></p>
                        <div class="d-flex flex-column">
                            <a href="" id="resend" style="display: none" class="btn btn-link text-start">Resend Otp</a>
                            <button type="submit" class='btn btn-primary btn-block customBtn'>Verify</button>
                        </div>
                    </form>-->
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            function OTPInput() {
                const inputs = document.querySelectorAll('#otp > *[id]');
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('keydown', function(event) {
                        if (event.key==="Backspace" ) {
                            inputs[i].value='' ;
                            if (i !==0) inputs[i - 1].focus();
                        }else{
                            if (i===inputs.length - 1 && inputs[i].value !=='' ) {
                                return true;
                            }
                            else if (event.keyCode> 47 && event.keyCode < 58) {
                                inputs[i].value=event.key;
                                if (i !==inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            } else if (event.keyCode> 64 && event.keyCode < 91) {
                                inputs[i].value=String.fromCharCode(event.keyCode);
                                if (i !==inputs.length - 1) inputs[i + 1].focus();
                                event.preventDefault();
                            }
                        }
                    });
                }
            } OTPInput();
        });

        //
        // $(document).ready(function (){
        //     timer();
        // });

        document.querySelector("#submitOtp").addEventListener('click', function (){
            event.preventDefault();
            document.getElementById('verificationForm').submit();
            timer();
        });


        document.querySelector("#resend").addEventListener('click', function (){
            timer();
            event.preventDefault();
            $("#timer").empty();
            $("#resend").hide();
            $("#timer").show();

            $.get("{{ route('resVCode', ["phone" => base64_encode(Auth::user()->phone)]) }}", function (res){
                alert("Sms Send Successful....")
            });
        });


        function timer(){
            var sec=30;
            var interval= window.setInterval(function (){
                if(sec-- == 1){
                    $("#resend").show();
                    clearInterval(interval);
                    $("#timer").hide();
                    // console.log("call here")
                }
                $("#timer").html("Please wait "+sec+" second(s) before resending otp");
            }, 1000);
        }




    </script>
@endpush
