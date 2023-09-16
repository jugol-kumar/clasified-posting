
<div class="card card-bordered mb-4 card-hover cursor-pointer">
    <!-- card body -->
    <div class="card-body">
        <div>
            <div class="d-md-flex">
                <div class="mb-3 mb-md-0">
                    <!-- Img -->
                    <img src="{{ config("app.url")."/storage/".$job->companyDetails->photos[0]->filename }}"
                         width="68" height="68"
                         alt="{{ config("app.name") }} UI - Bootstrap 5 Template" class="icon-shape border rounded-circle">
                </div>
                <!-- text -->
                <div class="ms-md-3 w-100 mt-3 mt-xl-1">
                    <div class="d-flex justify-content-between mb-5">
                        <div>
                            <!-- heading -->
                            <h3 class="mb-1 fs-4">
                                <a href="{{ route('client.single_job', $job->slug) }}" class="text-inherit text-success">{{ $job->title }} ({{ $job->label }} / {{ $job->types }})</a>
                                @if($job->is_featured)
                                    <span class="badge bg-light-danger text-danger ms-2">Featured Job</span>
                                @endif
                            </h3>
                            <div>
                                <span>at <a href="#">{{ $job->companyDetails->name }} </a></span>
                                <!-- star -->
                                <span class="text-dark ms-2 fw-medium">4.5
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="10"
                                         height="10" fill="currentColor"
                                         class="bi bi-star-fill text-warning align-baseline"
                                         viewBox="0 0 16 16">
                                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </span>
                                <span class="ms-0">(131 Reviews)</span>
                            </div>
                        </div>
                        <div>
                            <!-- bookmark -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-bookmark text-muted bookmark" viewBox="0 0 16 16">
                                <path
                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                            </svg>
                        </div>

                    </div>

                    <div class="d-md-flex justify-content-between ">
                        <div class="mb-2 mb-md-0">
                            <!-- year -->
                            <span class="me-2">
                                                    <i class="fe fe-briefcase text-muted"></i>
                                                    <span class="ms-1 ">{{ $job->min_experience }} - {{ $job->max_experience }} {{ $job->experience_type }}</span>
                                                </span>
                            <!-- salary -->

                            <span class="me-2">
                                                    <i class="fe fe-dollar-sign text-muted"></i>
                                                    <span class="ms-1 ">12k - 18k</span>
                                                </span>
                            <!-- location -->
                            <span class="me-2">
                                                    <i class="fe fe-map-pin text-muted"></i>
                                                    <span class="ms-1 ">{{ $job->location }}</span>
                                                </span>
                        </div>
                        <!-- time -->
                        <div>
                            <i class="fe fe-clock text-muted"></i> <span>{{ $job->created_at->diffForhumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
