@extends('recruiters.layout.master')
@section('title', get_setting('name')." Recruiters Job Edit")
@section('recruiter_content')

    <div class="col-lg-9 col-md-8 col-12">
        <!-- Page header-->
        <div class="py-4 py-lg-6 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                        <div class="d-lg-flex align-items-center justify-content-between">
                            <!-- Content -->
                            <div class="mb-4 mb-lg-0">
                                <h1 class="text-white mb-1">Edit New Job</h1>
                                <p class="mb-0 text-white lead">
                                    Just fill the form and create your courses.
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('recruiter.allJobs') }}" class="btn btn-white btn-sm me-1">Back to List</a>
                                <button type="button" class="btn btn-success btn-sm submitButton">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Content -->
        <div class="pb-12">
            <div class="container">
                <div id="courseForm" class="bs-stepper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Stepper Button -->
                            <div class="bs-stepper-header shadow-sm" role="tablist">
                                <div class="step" data-target="#test-l-1">
                                    <button type="button" class="step-trigger" role="tab" id="courseFormtrigger1" aria-controls="test-l-1">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Basic Information</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-2">
                                    <button type="button" class="step-trigger" role="tab" id="courseFormtrigger2" aria-controls="test-l-2">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Job Descriptions</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-3">
                                    <button type="button" class="step-trigger" role="tab" id="courseFormtrigger3" aria-controls="test-l-3">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Company Info </span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-4">
                                    <button type="button" class="step-trigger" role="tab" id="courseFormtrigger4" aria-controls="test-l-4">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Salary & Skills</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Stepper content -->
                            <div class="bs-stepper-content mt-5">
                                <form action="{{ route('recruiter.updateJob', $job->id) }}" method="post" id="jobOfferForm">
                                    @csrf
                                    @method('PUT')
                                    <!-- Content one -->
                                    <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger1">
                                        <!-- Card -->
                                        <div class="card mb-3 ">
                                            <div class="card-header border-bottom px-4 py-3">
                                                <h4 class="mb-0">Basic Information</h4>
                                            </div>
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="courseTitle" class="form-label">Job Title</label>
                                                    <input name="title" id="courseTitle" class="form-control" type="text" value="{{ $job->title }}" />

                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Job category</label>
                                                    <select class="selectpicker" data-width="100%" name="category_id" onchange="subCateory(this)">
                                                        <option selected disabled  value="">Select category</option>
                                                        @foreach($categories as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col" id="subCategory-card" style="display: none">
                                                            <label class="form-label">Job category</label>
                                                            <select name="sub_category_id" class="selectpicker" data-width="100%"
                                                                    onchange="childCategory(this)"  id="sub_category" >
                                                                <option selected disabled  value="">Select category</option>
                                                            </select>

                                                            @error('sub_category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col" id="childCategory-card" style="display: none">
                                                            <label class="form-label">Job category</label>
                                                            <select name="child_category_id" class="selectpicker" data-width="100%"  id="child_category" >
                                                                <option selected disabled  value="">Select child category</option>
                                                            </select>
                                                            @error('child_category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="form-label">Job Type</label>
                                                            <select name="types" class="selectpicker" data-width="100%">
                                                                <option value="">Select Type</option>
                                                                <option value="Full Time">Full Time</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Freelance">Freelance</option>
                                                                <option value="Internship">Internship</option>
                                                                <option value="Temporary">Temporary</option>
                                                                <option value="Contract">Contract</option>
                                                                <option value="Seasonal">Seasonal</option>
                                                            </select>
                                                            @error('types')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col">
                                                            <label class="form-label">Label</label>
                                                            <select name="label" class="selectpicker" data-width="100%">
                                                                <option value="" selected disabled>Select level</option>
                                                                <option value="Beginner">Beginner</option>
                                                                <option value="Junior">Junior</option>
                                                                <option value="Mid-level">Mid-level</option>
                                                                <option value="Senior">Senior</option>
                                                                <option value="Lead">Lead</option>
                                                                <option value="Manager">Manager</option>
                                                            </select>
                                                            @error('label')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <button type="button" class="btn btn-primary" onclick="event.preventDefault();courseForm.next()">
                                            Next
                                        </button>
                                    </div>
                                    <!-- Content two -->
                                    <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger2">
                                        <!-- Card -->
                                        <div class="card mb-3  border-0">

                                            <div class="card-header border-bottom px-4 py-3">
                                                <h4 class="mb-0">Job Detials</h4>
                                            </div>
                                            <!-- Card body -->
                                            <div class="card-body">


                                                <div class="mb-3">
                                                    <label class="form-label">Job Description</label>
                                                    <textarea name="input" placeholder="Textarea" class="form-control"></textarea>
                                                    @error('input')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="mb-3">
                                                    <label class="form-label">Job</label>
                                                    <textarea name="job_details" placeholder="Textarea" value="{{ $job->job_details }}" class="form-control quill-editor"></textarea>

                                                </div>
                                                @error('job_details')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary" onclick="event.preventDefault();courseForm.previous()">
                                                Previous
                                            </button>
                                            <button type="button" class="btn btn-primary" onclick="event.preventDefault();courseForm.next()">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Content three -->
                                    <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger3">
                                        <!-- Card -->
                                        <div class="card mb-3  border-0">
                                            <div class="card-header border-bottom px-4 py-3">
                                                <h4 class="mb-0">Company Details</h4>
                                            </div>
                                            <!-- Card body -->
                                            <div class="card-body ">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Your Company</label>
                                                    <select class="selectpicker" data-width="100%" name="company">
                                                        <option selected disabled  value="">Select Company</option>
                                                        @foreach($companies as $com)
                                                            <option value="{{ $com->id }}" {{ $com->id == $job->company ? 'selected' : '' }}>{{ $com->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('selectpicker')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                                            <div class="input-group me-3">
                                                                <input class="form-control flatpickr flatpickr-input active"
                                                                       type="text" value="{{ $job->declined_date }}"
                                                                       name="declined_date"
                                                                       aria-describedby="basic-addon2" readonly="readonly">
                                                                <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>

                                                                @error('declined_date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label class="form-label">Application target</label>
                                                            <input name="web_address" type="text" class="form-control" value="{{ $job->web_address }}">

                                                            @error('web_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Full Address</label>
                                                    <textarea name="location" class="form-control" rows="5" value="{{ $job->location }}"></textarea>

                                                    @error('location')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 d-flex justify-content-between">
                                                    <div class="form-check form-switch">
                                                        <input name="is_remote" class="form-check-input" type="checkbox" role="switch" {{ $job->is_remote ? 'checked' : '' }}>
                                                        <label class="form-check-label">Is Remote</label>

                                                        @error('is_remote')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-check form-switch">
                                                        <input name="fultime_remote" class="form-check-input" type="checkbox" role="switch" {{ $job->is_remote ? 'fultime_remote' : '' }}>
                                                        <label class="form-check-label">Is Full-time Remote</label>

                                                        @error('fultime_remote')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-check form-switch">
                                                        <input name="is_published" class="form-check-input" type="checkbox" role="switch" {{ $job->is_remote ? 'is_published' : '' }}>
                                                        <label class="form-check-label">Publication Status</label>

                                                        @error('is_published')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input name="is_featured" class="form-check-input" type="checkbox" role="switch" {{ $job->is_remote ? 'is_featured' : '' }}>
                                                        <label class="form-check-label">Featured Status</label>

                                                        @error('is_featured')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-secondary" onclick="event.preventDefault();courseForm.previous()">
                                                Previous
                                            </button>
                                            <button type="button" class="btn btn-primary" onclick="event.preventDefault();courseForm.next()">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Content four -->
                                    <div id="test-l-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger4">
                                        <!-- Card -->
                                        <div class="card mb-3  border-0">
                                            <div class="card-header border-bottom px-4 py-3">
                                                <h4 class="mb-0">Requirements</h4>
                                            </div>
                                            <!-- Card body -->
                                            <div class="card-body">

                                                <div class="mb-3">
                                                    <label>Experience</label>
                                                    <fieldset>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                   name="min_experience"
                                                                   value="{{ $job->min_experience }}" aria-label="Amount">
                                                            <input type="number" class="form-control"
                                                                   name="max_experience"
                                                                   value="{{ $job->max_experience }}" aria-label="Amount">
                                                            <select name="experience_type" class="selectpicker" placeholder="Chose Exprience Type">
                                                                <option selected value="" disabled>~~ Chose Experience Type ~~</option>
                                                                <option value="year">Year</option>
                                                                <option value="month">Month</option>
                                                                <option value="days">Days</option>
                                                            </select>
                                                        </div>
                                                    </fieldset>

                                                    @error('experience_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>


                                                <div class="mb-3">
                                                    <label>Experience</label>
                                                    <fieldset>
                                                        <div class="input-group">
                                                            <select name="currency" class="selectpicker" placeholder="Select Currency">
                                                                <option selected value="" disabled>~~ Select Currency ~~</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->id }}" {{ $job->currency == $country->id ? 'selected' : '' }}>{{ $country->name ."/" . $country->currency_symbol  }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('currency')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            <input type="number" class="form-control"
                                                                   name="min_salary"
                                                                   value="{{ $job->min_salary }}" aria-label="Amount">

                                                            @error('min_salary')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            <input type="number" class="form-control"
                                                                   name="max_salary"
                                                                   value="{{ $job->max_salary }}" aria-label="Amount">

                                                            @error('max_salary')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="mb-3">
                                                    <div class="row">
                                                       <div class="col">
                                                           <label class="form-label">Hash Tag</label>
                                                           <input name='tags' value="{{ $job->tags }}" autofocus>

                                                           @error('tags')
                                                           <span class="text-danger">{{ $message }}</span>
                                                           @enderror
                                                       </div>

                                                       <div class="col">
                                                           <label class="form-label">Required Skills</label>
                                                           <input name='skills' value="{{ $job->skills }}" autofocus>

                                                           @error('skills')
                                                           <span class="text-danger">{{ $message }}</span>
                                                           @enderror
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-22">
                                            <!-- Button -->
                                            <button type="button" class="btn btn-secondary mt-5" onclick="event.preventDefault();courseForm.previous()">
                                                Previous
                                            </button>
                                            <button type="button" class="btn btn-danger mt-5 submitButton">
                                                Submit For Review
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script>
        function subCateory(event){
            let categoryId = event.value;
            if (categoryId){
                $.ajax({
                    url: `{{ route('recruiter.getSubCat', '') }}/${categoryId}`,
                    method: 'GET',
                    dataType: 'JSON',
                    success:function (data) {
                        if (data.length == 0){
                            $('#subCategory-card').hide('slow');
                            swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'error',
                                text:'no have any Sub Category for this Category',
                                showConfirmButton: true,
                            });
                        }
                        else{
                            $('#subCategory-card').show('slow');
                            $('#sub_category').append('<option>Processing.....</option>');
                            $('#sub_category').empty();
                            $('#sub_category').append('<option selected disabled value="">'+'Select sub category'+'</option>');
                            $.each(data.data, function (key, value) {
                                $('#sub_category').append('<option value="'+value.id+'" >'+value.name+'</option>');
                            })
                            $('#sub_category').selectpicker('refresh');
                        }
                    }
                })
            } else{
                $('#sub_category').empty();
            }
        }

        function childCategory(event) {
            let categoryId = event.value;
            if (categoryId){
                $.ajax({
                    url: `{{ route('recruiter.getChildCat', '') }}/${categoryId}`,
                    method: 'GET',
                    dataType: 'JSON',
                    success:function (data) {
                        if (data.length == 0){
                            $('#childCategory-card').hide('slow');
                            swal({
                                position: 'top-end',
                                type: 'error',
                                title: 'error',
                                text:'no have any Sub Category for this Category',
                                showConfirmButton: true,
                            });
                        }
                        else{
                            $('#childCategory-card').show('slow');
                            $('#child_category').append('<option>Processing.....</option>');
                            $('#child_category').empty();
                            $('#child_category').append('<option selected disabled value="">'+'Select sub category'+'</option>');
                            $.each(data.data, function (key, value) {
                                $('#child_category').append('<option value="'+value.id+'" >'+value.name+'</option>');
                            })
                            $('#child_category').selectpicker('refresh');
                        }
                    }
                })
            } else{
                $('#child_category').empty();
            }
        }
        $('.quill-editor').each(function(i, el) {
            var el = $(this), id = 'quilleditor-' + i, val = el.val(), editor_height = 200;
            var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val);
            el.addClass('d-none');
            el.parent().append(div);

            var quill = new Quill('#' + id, {
                modules: { toolbar: true },
                theme: 'snow',


            });
            quill.on('text-change', function() {
                var comment = document.querySelector('textarea[name=job_details]');
                if (comment){
                    comment.value = quill.container.firstChild.innerHTML;
                }
            });
        });


        $(".submitButton").on("click", function (){
            event.preventDefault();
            $("#jobOfferForm").submit();
        });

        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('input[name=skills]');
        new Tagify(input)

    </script>


@endpush
