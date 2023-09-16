@extends('recruiters.layout.master')
@section('title', get_setting('name')." Recruiters Dashboard")
@section('recruiter_content')
    <div class="col-lg-9 col-md-8 col-12">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semi-bold">Total Joined Employee</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            0
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>In this month</span>
                            <span class="badge bg-success ms-2">0</span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semi-bold">Total posted jobs</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            {{ $totalJobs ?? 0 }} +
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>In this month</span>
                            <span class="badge bg-info ms-2">{{ $inMonthJobs ?? 0 }}+</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <div class="p-4">
                        <span class="fs-6 text-uppercase fw-semi-bold">Communication Employee</span>
                        <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                            0
                        </h2>
                        <span class="d-flex justify-content-between align-items-center">
                            <span>In this month</span>
                            <span class="badge bg-warning ms-2">0+</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{--
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="h4 mb-0">Earnings</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div id="earning" class="apex-charts"></div>
            </div>
        </div>
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="h4 mb-0">Order</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div id="orderColumn" class="apex-charts"></div>
            </div>
        </div>
        --}}
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header border-bottom-0">
                <h3 class="h4 mb-0">Latest Created Jobs</h3>
            </div>
            <!-- Table -->
            <div class="table-responsive border-0">
                <table class="table mb-0 text-nowrap">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" class="border-0">Jobs</th>
                        <th scope="col" class="border-0">Students</th>
                        <th scope="col" class="border-0">Rating</th>
                        <th scope="col" class="border-0">Status</th>
                        <th scope="col" class="border-0"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $key => $value)
                        @include('recruiters.jobs.single_job_row')
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
