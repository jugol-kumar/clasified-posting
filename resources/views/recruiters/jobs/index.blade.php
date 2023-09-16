@extends('recruiters.layout.master')
@section('title', get_setting('name')." Recruiters All Jobs")

@push('css')
    <style>
        .cardImage {
            height: 102px !important;
            width: 136px !important;
            object-fit: contain;
        }

        .singleCard {
            background: #e7e7e7;
            display: flex;
            height: max-content;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush
@section('recruiter_content')
    <div class="col-lg-9 col-md-8 col-12">
        <!-- Card -->
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="mb-0">Posts</h3>
                </div>
                <a href="{{ route('user.createJob') }}" class="btn btn-primary btn-sm">Add new post</a>
            </div>

            <div class="table-responsive border-0 overflow-y-hidden">
                <table class="table mb-0 text-nowrap">
                    <thead class="table-light">
                    <tr>
                        <th scope="col" class="border-0"></th>
                        <th scope="col" class="border-0"></th>
                        <th scope="col" class="border-0"></th>
                        <th scope="col" class="border-0"></th>
                        <th scope="col" class="border-0"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr style="border-bottom: 1px solid #f5f4f8">
                            <td class="border-0">
                                <img src="/storage/{{ json_decode($post->images)[0] }}"
                                     class="cardImage img-fluid rounded-start" alt="...">
                            </td>
                            <td class="d-flex flex-column border-0">
                                <a class="fw-bold fs-3" href="/single-post/{{ $post->id }}" target="_blank">{{ $post->title }}</a>
                                <strong>Tk {{ $post->price }}</strong>
                                <small>{{ Str::limit($post->short_details, 70) }}</small>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="dropdown dropstart">
                                    <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                       id="courseDropdown7" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                       aria-expanded="false">
                                      <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <span class="dropdown-menu" aria-labelledby="courseDropdown7" style="">
                                        <span class="dropdown-header">Settings</span>
                                        <a class="dropdown-item" href="#">
                                            <i class="fe fe-edit dropdown-item-icon "></i>Edit
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.deletePost', $post->id) }}">
                                            <i class="fe fe-trash dropdown-item-icon "></i>Remove
                                        </a>
                                    </span>
                                </span>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
