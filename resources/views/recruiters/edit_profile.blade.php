@extends('recruiters.layout.master')
@section('title', get_setting('name')." Recruiters Edit Profile")
@section('recruiter_content')
    <div class="col-lg-9 col-md-8 col-12">
                <!-- Card -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Profile Details</h3>
                        <p class="mb-0">
                            You have full control to manage your own account setting.
                        </p>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form action="{{ route('user.changeProfilePicture') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    <div class="logoSection">
                                        <div class="icon-shape icon-xxl border rounded position-relative">
                                            <span class="position-absolute imageShow"> <i class="bi bi-image fs-3  text-muted"></i></span>
                                            <input name="profile_pic" class="form-control border-0 opacity-0 uploadFile" type="file" >
                                            @error('profile_pic')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-0">Click Image For Change Your avatar</h4>
                                        <p class="mb-0">
                                            Choose PNG or JPG file picture for set your profile picture.
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-white btn-sm">Update</button>
                                </div>
                            </div>
                        </form>

                        <hr class="my-5" />
                        <div>
                            <h4 class="mb-0">Personal Details</h4>
                            <p class="mb-4">
                                Edit your personal information and address.
                            </p>
                            <!-- Form -->
                            {{--<form class="row" action="{{ route('recruiter.editPersonalInfo') }}" method="post">
                                @csrf
                                <!-- First name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="fname">First Name</label>
                                    <input type="text" name="fname" class="form-control" value="{{ Auth::user()->name}}" required />
                                </div>
                                <!-- Last name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="lname">Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name" required />
                                </div>
                                <!-- Birthday -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="birth">Birthday</label>
                                    <input class="form-control flatpickr" type="text" value="{{ Auth::user()->dob }}" id="birth"
                                           name="dob" />
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="address2">Address Line 2</label>
                                    <input type="text" name="address2" class="form-control" value="{{ Auth::user()->address }}" required />
                                </div>
                                <!-- State -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="designation"  class="form-label" >Designation</label>
                                    <select name="designation" class="selectpicker" data-width="100%" name="designation">
                                        <option selected disabled value="">Select Your Position On Your Company</option>
                                        <option value="COO">COO</option>
                                        <option value="CMO">CMO</option>
                                        <option value="CTO">CTO</option>
                                        <option value="Founder/CEO">Founder/CEO</option>
                                        <option value="HR">HR</option>
                                        <option value="OTHER">OTHER</option>
                                    </select>
                                    <span class="text-danger errormessage alert-designation" style="display: none"></span>
                                </div>
                                <!-- State -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label for="gender"  class="form-label" >Gender</label>
                                    <select name="gender" class="selectpicker" data-width="100%" name="designation">
                                        <option selected disabled value="">Select Your Gender</option>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                        <option value="OTHER">OTHER</option>
                                    </select>
                                    <span class="text-danger errormessage alert-designation" style="display: none"></span>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="">About Me</label>
                                    <textarea name="about_me" class="form-control" rows="4"></textarea>
                                </div>

                                <div class="col-12">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit">
                                        Update Profile
                                    </button>
                                </div>
                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
@endsection


@push('js')
    <script>
        $(function() {
            $(".uploadFile").closest(".logoSection").find("i").remove();
            $(".uploadFile").closest(".logoSection").find('.imageShow').css({
                "background-image": "url('{{ config('app.url').Auth::user()->photo }}')",
                "width": "100%",
                "height": "100%",
                "background-position": "center center",
                "background-size": "cover",
                "border-radius": "5px"
            });
            $(document).on("change", ".uploadFile", function () {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function () { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        console.log(this.result)
                        uploadFile.closest(".logoSection").find("i").remove();
                        uploadFile.closest(".logoSection").find('.imageShow').css({
                            "background-image": "url(" + this.result ?? "{{ config('app.url').Auth::user()->photo }}" + ")",
                            "width": "100%",
                            "height": "100%",
                            "background-position": "center center",
                            "background-size": "cover",
                            "border-radius": "5px"
                        });
                    }
                }

            });
        });
    </script>

@endpush
