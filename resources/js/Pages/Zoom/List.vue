<template>

    <Head title="All Meetings" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">All Meetings</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <button class="dt-button add-new btn btn-primary" tabindex="0" type="button" data-bs-toggle="modal"
                    data-bs-target="#createNewCategory"><span>Add New Meeting</span></button>
            </div>
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
                                <label>Search:<input v-model="search" type="search" class="form-control" placeholder="Type here for search"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="user-list-table table">
                    <thead class="table-light">
                        <tr class="">
                            <th class="sorting">Meeting Title</th>
                            <th class="sorting">Host ID</th>
                            <th class="sorting">Join URL</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="meeting in meetings" :key="meeting.id">
                            <td>{{ meeting.topic }}</td>
                            <td>{{ meeting.host_id }}</td>
                            <td>
                                <a :href="meeting.join_url" target="_blank">Join</a>
                            </td>
                            <td>
                                <div class="demo-inline-spacing">
                                    <button type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light">
                                        <Icon title="eye" />
                                    </button>
                                    <button type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light btn-danger">
                                        <Icon title="trash" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- <Pagination :links="categories.links" :from="categories.from" :to="categories.to" :total="categories.total" /> -->
            </div>
            <!-- Modal to add new user starts-->
            <!-- Modal to add new user Ends-->
        </div>
        <!-- list and filter end -->
    </section>
</template>

<script setup>
// import Pagination from '@/components/Pagination';
import Icon from '@/components/Icon';
import { ref, watch, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from "lodash/debounce";

let props = defineProps({
    meetings: Object,
    profile: Object,
    filters: Object,
    url: String,
});

let search = ref(props.filters.search);
let perPage = ref(props.filters.perPage);

watch([search, perPage], debounce(function ([val, val2]) {
    Inertia.get(props.url, { search: val, perPage: val2 }, { preserveState: true, replace: true });
}, 300));

</script>