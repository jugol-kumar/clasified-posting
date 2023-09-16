@extends('recruiters.layout.master')
@section('title', get_setting('name')." Recruiters Job Create")
@section('recruiter_content')

    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-lg-3 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                        <div class="d-lg-flex align-items-center justify-content-between">
                            <div class="mb-4 mb-lg-0">
                                <h1 class="text-white mb-1">Add New Post</h1>
                            </div>
                            <div>
                                <a href="{{ route('user.allJobs') }}" class="btn btn-white btn-sm me-1">Back to List</a>
                                <button type="button" class="btn btn-success btn-sm submitButton">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pb-12 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <form action="{{ route('user.storeJob') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Content one -->
                            <div class="card mb-3 rounded-0">
                                <div class="card-header border-bottom px-4 py-3">
                                    <h4 class="mb-0">Post Information</h4>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="courseTitle" class="form-label">Post Title</label>
                                        <input name="title" id="courseTitle" class="form-control" type="text" placeholder="Enter Post Title" />

                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Category</label>
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

                                            <div class="col" id="subCategory-card" style="display: none">
                                                <label class="form-label">Sub category</label>
                                                <select name="sub_category_id" class="selectpicker" data-width="100%"
                                                        onchange="childCategory(this)"  id="sub_category" >
                                                    <option selected disabled  value="">Select category</option>
                                                </select>
                                                @error('sub_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
{{--                                            <div class="col" id="childCategory-card" style="display: none">
                                                <label class="form-label">Child category</label>
                                                <select name="child_category_id" class="selectpicker" data-width="100%"  id="child_category" >
                                                    <option selected disabled  value="">Select child category</option>
                                                </select>
                                                @error('child_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>--}}
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Division</label>
                                                <select name="division_id" class="selectpicker" data-width="100%"
                                                        onchange="getCityByState(this)">
                                                    <option selected disabled  value="">Select Division</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('sub_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col" id="city-card" style="display: none">
                                                <label class="form-label">District</label>
                                                <select name="district_id" class="selectpicker"
                                                        data-live-search="true"
                                                        onchange="getThanaByDistrict(this)"
                                                        data-width="100%"  id="city_id" >
                                                    <option selected disabled  value="">Select city</option>
                                                </select>
                                                @error('child_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col" id="thana_card" style="display: none">
                                                <label class="form-label">Thana</label>
                                                <select name="upazila_id" class="selectpicker"
                                                        data-live-search="true"
                                                        data-width="100%"  id="thana_id" >
                                                    <option selected disabled  value="">Select city</option>
                                                </select>
                                                @error('child_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col mb-1">
                                            <label class="form-label">Condition</label>
                                            <select name="condition" class="selectpicker" data-width="100%" id="sub_category" >
                                                <option selected disabled  value="null">Select category</option>
                                                @foreach(json_decode(get_setting('conditions')) as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                            @error('sub_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
{{--
                                        <div class="col">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="e.g Address">
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" name="price" placeholder="e.g Price">
                                            @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <label class="form-label">Map Location</label>
                                            <input type="text" class="form-control" name="map" placeholder="e.g google map location">
                                            @error('location')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Short Description</label>
                                                <textarea name="short_details" placeholder="Short Description" class="form-control"></textarea>
                                                @error('input')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Full Description</label>
                                                <textarea name="full_details" placeholder="Full Description" class="form-control quill-editor"></textarea>
                                            </div>
                                            @error('job_details')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="formFileLg" class="form-label">Add multiple files</label>
                                            <input class="form-control form-control-lg" name="images[]" id="formFileLg" multiple type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <button type="submit" class="btn btn-primary">
                                Save Post
                            </button>
                        </form>
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
                    url: `{{ route('user.getSubCat', '') }}/${categoryId}`,
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
                    url: `{{ route('user.getChildCat', '') }}/${categoryId}`,
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
                var comment = document.querySelector('textarea[name=full_details]');
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


        function getCityByState(event){
            let stateId = event.value;
            let city = $("#city_id");
            if (stateId) {
                $.ajax({
                    url: `<?php echo e(route('seeker.getCities', '')); ?>/${stateId}`,
                    method: 'GET',
                    dataType: 'JSON',
                    success:function(res){
                        city.empty();
                        $("#city-card").show();
                        city.append('<option selected disabled value="">'+'Select Districts'+'</option>');
                        $.each(res.districts, function (key, value) {
                            city.append('<option value="'+value.id+'" >'+value.name+'</option>');
                        })
                        city.selectpicker('refresh');
                    }
                })
            }
        }

        function getThanaByDistrict(event){
            let stateId = event.value;
            let city = $("#thana_id");
            if (stateId) {
                $.ajax({
                    url: `<?php echo e(route('seeker.getupozela', '')); ?>/${stateId}`,
                    method: 'GET',
                    dataType: 'JSON',
                    success:function(res){
                        city.empty();
                        $("#thana_card").show();
                        city.append('<option selected disabled value="">'+'Select Thana'+'</option>');
                        $.each(res.upozilas, function (key, value) {
                            city.append('<option value="'+value.id+'" >'+value.name+'</option>');
                        })
                        city.selectpicker('refresh');
                    }
                })
            }
        }


    </script>


@endpush
