<template>

    <Head title="Question List"/>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Question List</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <Link type="button" preserve-scroll class="dt-button add-new btn btn-primary" :href="url+'/create'">
                <span class="ml-1">Create New Question</span>
            </Link>
        </div>
    </div>
    <section class="app-user-list">
        <!-- list and filter start -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div class="d-flex justify-content-between align-items-center header-actions mx-0 row mt-75">
                    <div class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                        <div class="select-search-area">
                            <label>Show <select class="form-select" v-model="perPage">
                                <option :value="undefined">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-8 ps-xl-75 ps-0">
                        <div
                            class="d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap">
                            <div class="select-search-area">
                                <label>Search:<input v-model="search" type="search" class="form-control"
                                                     placeholder="Type here for search"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="user-list-table table">
                    <thead class="table-light">
                    <tr class="">
                        <th class="sorting">Title</th>
                        <th class="sorting">Category</th>
                        <th class="sorting">Answer</th>
                        <th class="sorting">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="question in questions.data" :key="question.id">
                        <td><span v-html="question.title"></span></td>
                        <td>{{ question.category }}</td>
                        <td class="text-capitalize">{{ question.answer }}</td>
                        <td>
                            <div class="demo-inline-spacing">
                                <button type="button"
                                        @click="showItem(question.id)"
                                        class="btn btn-icon btn-icon rounded-circle bg-light-warning waves-effect waves-float waves-light">
                                    <Icon title="eye"/>
                                </button>
                                <button @click="deleteItemModal(question.id)" type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light btn-danger">
                                    <Icon title="trash"/>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <Pagination :links="questions.links" :from="questions.from" :to="questions.to"
                            :total="questions.total"/>
            </div>
        </div>
        <!-- list and filter end -->
    </section>


    <Modal id="showItem" :size="{default:'lg'}" title="Show Category" v-vb-is:modal>
        <div class="modal-content">
            <div class="modal-body pb-3 px-sm-3">
                <h1 class="text-center mb-1" id="createAppTitle">Qustions Details</h1>
                <!--                <p class="text-center mb-2"></p>-->
                <div class="bs-stepper vertical wizard-modern">
                    <ul class="list-group ">
                        <li class="list-group-item border-0">
                            <small>Parent Category: </small>
                            <span class="badge badge-light-primary ms-1">{{ category.name }}</span>
                        </li>
                        <li class="list-group-item border-0">
                            <small>Sub Category: </small>
                            <span class="badge badge-light-primary ms-1">{{ sub_category.name }}</span>
                        </li>
                        <li class="list-group-item border-0">
                            <small>Child Category: </small>
                            <span class="badge badge-light-primary ms-1">{{ child_category.name }}</span>
                        </li>
                    </ul>
                    <!-- content -->
                    <div id="create-app-details" role="tabpanel" aria-labelledby="create-app-details-trigger">
                        <h3 class="mt-2" v-html="qustions.title"></h3>
                        <h5 class="pt-1">Options</h5>
                        <ul class="list-group list-group-flush list-group">
                            <li class="list-group-item border-0 px-0">
                                <label for="createAppCrm" class="d-flex cursor-pointer">
                                        <span class="avatar avatar-tag bg-light-info me-1">
                                            A
                                        </span>
                                    <span class="d-flex align-items-center justify-content-between flex-grow-1">
                                            <span class="me-1">
                                                <span class="h5 d-block fw-bolder" v-html="qustions.a"></span>
                                            </span>
                                            <span>
                                                <input class="form-check-input"
                                                       :checked="qustions.answer == 'a'"
                                                       :disabled="qustions.answer != 'a'"
                                                       id="createAppCrm"
                                                       type="radio"
                                                       name="categoryRadio"/>
                                            </span>
                                        </span>
                                </label>
                            </li>
                            <li class="list-group-item border-0 px-0">
                                <label for="createAppEcommerce" class="d-flex cursor-pointer">
                                        <span class="avatar avatar-tag bg-light-success me-1">
                                            B
                                        </span>
                                    <span class="d-flex align-items-center justify-content-between flex-grow-1">
                                            <span class="me-1">
                                                <span class="h5 d-block fw-bolder" v-html="qustions.b"></span>
                                            </span>
                                            <span>
                                                <input class="form-check-input"
                                                       :checked="qustions.answer == 'b'"
                                                       :disabled="qustions.answer != 'b'"
                                                       id="createAppEcommerce"
                                                       type="radio"
                                                       name="categoryRadio"/>
                                            </span>
                                        </span>
                                </label>
                            </li>
                            <li class="list-group-item border-0 px-0">
                                <label for="optionC" class="d-flex cursor-pointer">
                                        <span class="avatar avatar-tag bg-light-danger me-1">
                                            C
                                        </span>
                                    <span class="d-flex align-items-center justify-content-between flex-grow-1">
                                            <span class="me-1">
                                                <span class="h5 d-block fw-bolder" v-html="qustions.c"></span>
                                            </span>
                                            <span>
                                                <input class="form-check-input"
                                                       :checked="qustions.answer == 'c'"
                                                       :disabled="qustions.answer != 'c'"
                                                       id="optionC"
                                                       type="radio"
                                                       name="categoryRadio"/>
                                            </span>
                                        </span>
                                </label>
                            </li>
                            <li class="list-group-item border-0 px-0">
                                <label for="OptionD" class="d-flex cursor-pointer">
                                        <span class="avatar avatar-tag bg-light-warning me-1">
                                            D
                                        </span>
                                    <span class="d-flex align-items-center justify-content-between flex-grow-1">
                                            <span class="me-1">
                                                <span class="h5 d-block fw-bolder" v-html="qustions.d"></span>
                                            </span>
                                            <span>
                                                <input class="form-check-input"
                                                       :checked="qustions.answer == 'd'"
                                                       :disabled="qustions.answer != 'd'"
                                                       id="OptionD"
                                                       type="radio"
                                                       name="categoryRadio"/>
                                            </span>
                                        </span>
                                </label>
                            </li>
                            <li class="list-group-item border-0 px-0">
                                <label for="optionE" class="d-flex cursor-pointer">
                                        <span class="avatar avatar-tag bg-light-primary me-1">
                                            E
                                        </span>
                                    <span class="d-flex align-items-center justify-content-between flex-grow-1">
                                            <span class="me-1">
                                                <span class="h5 d-block fw-bolder" v-html="qustions.e"></span>
                                            </span>
                                            <span>
                                                <input class="form-check-input"
                                                       :checked="qustions.answer == 'e'"
                                                       :disabled="qustions.answer != 'e'"
                                                       id="optionE"
                                                       type="radio"
                                                       name="categoryRadio"/>
                                            </span>
                                        </span>
                                </label>
                            </li>
                        </ul>

                        <span class="mt-3">
                            Feedback:
                            <h4 v-html="qustions.feedback"></h4>
                        </span>

                        <!--                        <div class="mt-2 mx-auto">-->
                        <!--                            <button class="btn btn-outline-secondary btn-prev me-2" disabled>-->
                        <!--                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>-->
                        <!--                                <span class="align-middle d-sm-inline-block d-none">Previous</span>-->
                        <!--                            </button>-->
                        <!--                            <button class="btn btn-primary btn-next">-->
                        <!--                                <span class="align-middle d-sm-inline-block d-none">Next</span>-->
                        <!--                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>-->
                        <!--                            </button>-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </Modal>


</template>

<script setup>
    import Pagination from '@/components/Pagination';
    import Icon from '@/components/Icon';
    import Modal from '../../components/Modal'
    import {ref, watch} from 'vue';
    import {Inertia} from '@inertiajs/inertia';
    import debounce from "lodash/debounce";
    import Swal from 'sweetalert2'
    import axios from "axios";

    let props = defineProps({
        questions: Object,
        categories: Object,
        filters: Object,
        url: String,
        //   can: Object,
    });


    let deleteItemModal = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Inertia.delete(props.url + '/' + id, {
                    preserveState: true, replace: true, onSuccess: page => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    },
                    onError: errors => {
                        Swal.fire(
                            'Oops...',
                            'Something went wrong!',
                            'error'
                        )
                    }
                })
            }
        })
    };

    let qustions = ref([])
    let category = ref([])
    let sub_category = ref([])
    let child_category = ref([])

    let showItem = (slug) => {
        axios.get(props.url + '/' + slug).then(res => {
            qustions.value = res.data
            category.value = res.data.category
            sub_category.value = res.data.sub_category
            child_category.value = res.data.child_category
            document.getElementById('showItem').$vb.modal.show()
        }).catch(err => {
            console.log(err)
        })
    }


    let search = ref(props.filters.search);
    let perPage = ref(props.filters.perPage);

    watch([search, perPage], debounce(function ([val, val2]) {
        Inertia.get(props.url, {search: val, perPage: val2}, {preserveState: true, replace: true});
    }, 300));

</script>
