<template>

    <Head title="Subscription List" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Subscription List</h2>
                </div>
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
                            <th class="sorting">Student</th>
                            <th class="sorting">Date</th>
                            <th class="sorting">Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="subscription in subscriptions.data" :key="subscription.id">
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar  me-1">
                                            <img :src="subscription.photo"
                                                alt="{{ subscription.user }}" height="32" width="32">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="user_name text-truncate text-body">
                                            <span class="fw-bolder">{{ subscription.user }}</span>
                                        </div>
                                        <small class="emp_post text-muted">{{ subscription.email }}</small>
                                        <small class="emp_post text-muted">{{ subscription.phone }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ subscription.date }}</td>
                            <td>{{ subscription.course }}</td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="subscriptions.links" :from="subscriptions.from" :to="subscriptions.to" :total="subscriptions.total" />
            </div>
        </div>
        <!-- list and filter end -->
    </section>
</template>

<script setup>
import Pagination from '@/components/Pagination';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from "lodash/debounce";
let props = defineProps({
    subscriptions: Object,
    filters: Object,
    url: String,
});


let search = ref(props.filters.search);
let perPage = ref(props.filters.perPage);

watch([search, perPage], debounce(function ([val, val2]) {
    Inertia.get(props.url, { search: val, perPage: val2 }, { preserveState: true, replace: true });
}, 300));

</script>