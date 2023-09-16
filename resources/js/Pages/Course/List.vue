<template>

    <Head title="Course List"/>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Course List</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <Link :href="props.url+'/create'" class="dt-button add-new btn btn-primary">
                    <span>Add New Course</span>
                </Link>
            </div>
        </div>
    </div>
    <section class="app-user-list">
        <!-- list and filter start -->
        <div class="card">
            <div class="card pt-0">
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
                <div class="row">
                    <div v-for="course in courses.data" :key="course.id" class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card border-success mx-2">
                            <div class="bg-light-primary rounded-top text-center"><img :src="course.cover"
                                                                                       :alt="course.name" height="170"
                                                                                       class=""></div>
                            <div class="card-body px-2">
                                <div class="d-flex align-items-center">
                                    <div class="my-auto">
                                        <h4 class="card-title mb-25">{{ course.name }}</h4>
                                    </div>
                                </div>
                                <div class="mt-0">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex align-items-center">
                                            <span>Price:  {{ course.price }}</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span>Category: {{ course.category }}</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span>Active From: {{ course.active_on }}</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <span>Status: {{ course.status }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-text pt-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <Link :href="course.show_url" class="btn btn-outline-success waves-effect">
                                            <Icon title="eye"/>
                                            <span> Show</span>
                                        </Link>
                                        <button type="button" class="btn btn-outline-primary waves-effect">
                                            <Icon title="pencil"/>
                                            <span> Edit</span>
                                        </button>
                                        <button @click="deleteItemModal(course.id)" type="button"
                                                class="btn btn-outline-danger waves-effect">
                                            <Icon title="trash"/>
                                            <span> Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Pagination :links="courses.links" :from="courses.from" :to="courses.to" :total="courses.total"/>
            </div>
        </div>
        <!-- list and filter end -->
    </section>
</template>

<script setup>
    import Pagination from '@/components/Pagination';
import Icon from '@/components/Icon';
import {ref, watch, computed} from 'vue';
import {Inertia} from '@inertiajs/inertia';
import {useForm} from '@inertiajs/inertia-vue3'
import debounce from "lodash/debounce";
import Swal from "sweetalert2";

    let props = defineProps({
        courses: Object,
        filters: Object,
        url: String,
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
                Inertia.delete(props.url + "/" + id, {
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

    let search = ref(props.filters.search);
    let perPage = ref(props.filters.perPage);

    watch([search, perPage], debounce(function ([val, val2]) {
        Inertia.get(props.url, {search: val, perPage: val2}, {preserveState: true, replace: true});
    }, 300));

</script>
