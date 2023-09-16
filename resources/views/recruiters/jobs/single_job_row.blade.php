
<tr>
    <td class="border-top-0">
        <div class="d-lg-flex">
            <div>
                <a href="{{ route('client.single_job', $value->slug) }}" target="_blank">
                    <img src="{{ global_asset($value->companyDetails->photos->count() ? $value->companyDetails->photos[0]->filename : null) }}"
                         height="70"
                         alt="{{ config("app.name") }}" class="rounded img-4by3-lg">
                </a>
            </div>
            <div class="ms-lg-3 mt-2 mt-lg-0">
                <h4 class="mb-1 h5">
                    <a href="{{ route('client.single_job', $value->slug) }}" class="text-inherit" target="_blank">{{ $value->title }}</a>
                </h4>
                <span class="badge bg-light-primary text-primary">{{ $value->category->name }}</span>
                <!--                                        <ul class="list-inline fs-6 mb-0">
                                                            <li class="list-inline-item">
                                                                <i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>1h 30m
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                                                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                                                </svg>Beginner
                                                            </li>
                                                        </ul>-->
            </div>
        </div>
    </td>
    <td class="border-top-0">{{ $value->min_salary }} - {{ $value->max_salary }} LPA</td>
    <td class="border-top-0">
        no apply
    </td>
    <td class="border-top-0">
        <span class="badge bg-{{  $value->is_published ? 'primary' : 'warning' }}">{{ $value->is_published ? 'Published' : 'Un-Published' }}</span>
    </td>
    <td class="text-muted border-top-0">
        <span class="dropdown dropstart">
            <a class="btn-icon btn btn-ghost btn-sm rounded-circle " href="#" role="button" id="courseDropdown"
               data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                <i class="fe fe-more-vertical"></i>
            </a>
            <span class="dropdown-menu" aria-labelledby="courseDropdown">
                <span class="dropdown-header">Setting </span>
                <a class="dropdown-item" href="{{ route('recruiter.editJob', $value->slug) }}"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>

                <button  class="dropdown-item" type="button"
                         onclick="deleteData({{ $value->id }})"
                >
                    <i class="fe fe-trash  dropdown-item-icon"></i>  <span>Delete</span>
                </button>
                <form id="delete-form-{{ $value->id }}"
                      method="POST"
                      action="{{ route('recruiter.deleteJob', $value->id) }}"
                      style="display: none">
                    @csrf
                    @method('DELETE')
                </form>
            </span>
        </span>
    </td>
</tr>
