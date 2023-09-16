@extends('frontend.layout.master')
@section('title', get_setting('name')."Filter Jobs")
@push('css')
    <style>
        #countryList{
            position: relative;
            right: -305px;
            top: 0;
            max-height: 200px;
            max-width: 38%;
            background: white;
            overflow-y: scroll;
        }
        #countryList ul li{
            padding: 5px 20px;
            cursor: pointer;
        }
        #countryList ul li:hover{
            background: #d4fff373;
        }
    </style>
@endpush

@section('content')
    <!-- Page header -->
    <div class="py-8 bg-light-primary">
        <div class="container">
            <div class="row mt-8">
                <div class="col-lg-8 col-md-10 col-12">
                    <!-- text -->
                    <div>
                        <div class="mb-4"> <h1 class=" fw-bold mb-1">Discover Best Places to Post!
                            </h1>
                            <p>Search your products post.</p></div>
                        <div class="bg-white rounded-md-pill me-lg-10 shadow rounded-3">
                            <!-- card body -->
                            <div class="p-md-2 p-4">
                                <!-- form -->
                                <form class="row g-1" action="{{ route('client.searchJObs') }}" method="get" id="searchForm">
                                    <div class="col-12 col-md-5">
                                        <!-- input -->
                                        <div class="input-group mb-2 mb-md-0 border-md-0 border rounded-pill">
                                            <!-- input group -->
                                            <span class="input-group-text bg-transparent border-0 pe-0 ps-md-3 ps-md-0" id="searchJob"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                                    class="bi bi-search text-muted" viewBox="0 0 16 16">
                                              <path
                                                  d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </span>
                                            <!-- search -->
                                            <input type="text" name="job_type" class="form-control  rounded-pill border-0 ps-3 form-focus-none"
                                                  @if(request()->input('job_type') != null)
                                                      value="{{ request()->input('job_type') }}"
                                                  @else
                                                    placeholder="Job Title"
                                                  @endif
                                                       aria-label="Job Title" aria-describedby="searchJob">
                                            <input type="hidden" name="cat_id" id="cat_id" value="{{ request()->input('cat_id') }}">
                                            <input type="hidden" name="div_id" id="div_id" value="{{ request()->input('div_id') }}">
                                            <input type="hidden" name="scat_id" id="scat_id" value="{{ request()->input('scat_id') }}">
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-4">
                                        <!-- inpt group -->
                                        <div class="input-group mb-3 mb-md-0 border-md-0 border rounded-pill">
                                                  <span class="input-group-text bg-transparent border-0 pe-0 ps-md-0" id="location">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                           class="bi bi-geo-alt  text-muted" viewBox="0 0 16 16">
                                                      <path
                                                          d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                                      <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    </svg>
                                                  </span>
                                            <!-- search -->
                                            <input type="text"
                                                   name="loacation"
                                                   class="form-control rounded-pill  border-0 ps-3 form-focus-none"
                                                   @if(request()->input('loacation') != null)
                                                    value="{{ request()->input('loacation') }}"
                                                   @else
                                                    placeholder="Location"
                                                   @endif
                                                   id="location_search">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3  text-end d-grid">
                                        <!-- button -->
                                        <button type="submit" class="btn btn-success rounded-pill">Search</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <div id="countryList">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h2>List of Posts
                                @if(request()->input('loacation') != null)
                                    in
                                    <span class="text-success">{{ request()->input('loacation') }}</span>
                                @endif
                            </h2>
                        </div>
                        @forelse($jobs as $post)
                            @include('frontend.inc.postcard', ['noLimit'=>true])
                        @empty
                            <h2>Not Found</h2>
                        @endforelse
                        <!-- pagination -->
                        @if ($jobs->lastPage() > 1)
                            <nav aria-label="Page navigation example">
                            <ul class="pagination  mb-0">
                                <li class="page-item {{ ($jobs->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a class="page-link mx-1 rounded" href="{{ $jobs->url(1) }}" tabindex="-1" aria-disabled="true">
                                        <i class="mdi mdi-chevron-left"></i>
                                    </a>
                                </li>
                                @for ($i = 1; $i <= $jobs->lastPage(); $i++)
                                    <li class="page-item {{ ($jobs->currentPage() == $i) ? ' active' : '' }}">
                                        <a class="page-link mx-1 rounded" href="{{ $jobs->url($i) }}"> {{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="page-item {{ ($jobs->currentPage() == $jobs->lastPage()) ? ' disabled' : '' }}">
                                    <a class="page-link mx-1 rounded" href="{{  $jobs->url($jobs->currentPage()+1) }}">
                                        <i class="mdi mdi-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        @endif
                    </div>



                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="card border mb-6 mb-md-0 shadow-none">
                            <div class="card-header">
                                <h4 class="mb-0 fs-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter text-muted me-2" viewBox="0 0 16 16">
                                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                    </svg>All Filters
                                </h4>
                            </div>
                            <div class="card-body py-3">
                                <a class="fs-5 text-dark fw-semi-bold" data-bs-toggle="collapse" href="#collapseExample" role="button"
                                   aria-expanded="false" aria-controls="collapseExample">Categories
                                    <span class="float-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="collapse show" id="collapseExample">
                                    <div class="mt-3">
                                        @foreach($categories as $cat)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value="{{ $cat->id }}"
                                                       onclick="catSet(this)"
                                                       {{ request()->input('cat_id') != null && request()->input('cat_id') == $cat->id ? 'checked' : '' }}
                                                       id="categoryLabel-{{ $cat->id }}">
                                                <label class="form-check-label" for="categoryLabel-{{ $cat->id }}">
                                                    {{ $cat->name }} <span class="text-muted">({{ $cat->jobs_count }})</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <a class="fs-5 text-dark fw-semi-bold" data-bs-toggle="collapse" href="#collapseExampleThird"
                                   role="button" aria-expanded="false" aria-controls="collapseExampleThird">
                                    Sub Categories
                                    <span class="float-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="collapse show" id="collapseExampleThird">
                                    <div class="mt-3" id="subCategoryFilterSection">
                                        @foreach($subCategories as $sCat)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" value="{{ $sCat->id }}"
                                                       onclick="sCatSet(this)"
                                                       {{ request()->input('scat_id') != null && request()->input('scat_id') == $sCat->id ? 'checked' : '' }}
                                                       id="subCategoryLabel-{{ $sCat->id }}">
                                                <label class="form-check-label" for="subCategoryLabel-{{ $sCat->id }}">
                                                    {{ $sCat->name }} <span class="text-muted">({{ $sCat->jobs_count }})</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top py-3">
                                <a class="fs-5 text-dark fw-semi-bold" data-bs-toggle="collapse" href="#collapseExampleSecond"
                                   role="button" aria-expanded="false" aria-controls="collapseExampleSecond">
                                    Divisions
                                    <span class="float-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="collapse show" id="collapseExampleSecond">
                                    <div class="mt-3">
                                        @foreach($divisions as $div)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       onclick="divSet(this)"
                                                       value="{{ $div->id }}"
                                                       {{ request()->input('div_id') != null && request()->input('div_id') == $div->id ? 'checked' : '' }}
                                                       id="divisionLavel-{{ $div->id }}">
                                                <label class="form-check-label" for="divisionLavel-{{ $div->id }}">
                                                    {{ $div->name }} <span class="text-muted">({{ $div->jobs_count }})</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
<!--                            <div class="card-body border-top py-3">
                                <a class="fs-5 text-dark fw-semi-bold" data-bs-toggle="collapse" href="#collapseExampleFourth"
                                   role="button" aria-expanded="false" aria-controls="collapseExampleFourth">
                                    Job Type
                                    <span class="float-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </span>
                                </a>
                                <div class="collapse show" id="collapseExampleFourth">
                                    <div class="mt-3">
                                        @php($types = [''])
                                        @foreach($types as $type)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       onclick="divSet(this)"
                                                       value="{{ $div->id }}"
                                                       {{ request()->input('div_id') != null && request()->input('div_id') == $div->id ? 'checked' : '' }}
                                                       id="divisionLavel-{{ $div->id }}">
                                                <label class="form-check-label" for="divisionLavel-{{ $div->id }}">
                                                    {{ $div->name }} <span class="text-muted">({{ $div->jobs_count }})</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>-->
                            <div class="card-body py-3 d-grid">
                                <a href="{{ route('client.searchJObs') }}" class="btn btn-outline-light text-muted">
                                    Clear Data
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('js')
    <script>

        $('#location_search').on('keyup',function(e){
            let text = e.target.value;

            if (text != null){
                $.ajax({
                    url: '{{ route('client.allDistrict') }}',
                    data: {data: text, _token: '{{csrf_token()}}'},
                    type: 'POST',
                    success:function (res){
                        $('#countryList').empty();
                        if (res != null){
                            $('#countryList').fadeIn();
                            $('#countryList').html(res);
                        }else{
                            eTost('Data Not Found...');
                            $('#countryList').fadeIn();
                        }
                    }
                })
            }
        });
        $(document).on('click','li',function(){
            $("#location_search").val($(this).text());
            $('#countryList').fadeOut();
        });
        $(document).on('click', function (){
            $('#countryList').fadeOut();
        })


        $('#location_search').on('keyup',function(e){
            let text = e.target.value;
            if (text != null){
                $.ajax({
                    url: '{{ route('client.allDistrict') }}',
                    data: {data: text, _token: '{{csrf_token()}}'},
                    type: 'POST',
                    success:function (res){
                        $('#countryList').empty();
                        if (res != null){
                            $('#countryList').fadeIn();
                            $('#countryList').html(res);
                        }else{
                            eTost('Data Not Found...');
                            $('#countryList').fadeIn();
                        }
                    }
                })
            }
        });
        function catSet(e){
            $("#cat_id").val(e.value)
            getSubCates(e.value)
            $("#searchForm").submit();
        }
        function divSet(e){
            $("#div_id").val(e.value)
            $("#searchForm").submit();
        }
        function sCatSet(e){
            $("#scat_id").val(e.value)
            $("#searchForm").submit();
        }

        function getSubCates(id){
            $.ajax({
                url: '{{ route('client.getSubCategories', '/') }}'+"/"+id,
                type: 'GET',
                success:function (res){
                    $('#subCategoryFilterSection').empty();
                    if (res != null){
                        $.each(res, function (index, value){
                            $("#subCategoryFilterSection").append(`
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" id="subCategory-${value.id}" >
                                    <label class="form-check-label" for="subCategory-${value.id}">
                                       ${value.name}
                                    </label>
                            </div>
                            `)
                        });
                    }else{
                        eTost('Data Not Found...');
                        $('#countryList').fadeIn();
                    }
                }
            })
        }

    </script>
@endpush
