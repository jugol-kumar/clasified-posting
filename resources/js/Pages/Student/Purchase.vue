<template>

    <Head title="Purchase History" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Purchase History</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="app-order-list">
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
                            <th class="sorting">Course Title</th>
                            <th class="sorting">Enroll on</th>
                            <th class="sorting">Payment Mode</th>
                            <th class="sorting">Payment Amount</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in orders.data" :key="order.id">
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar  me-1">
                                            <img :src="order.photo" alt="{{ order.course }}" height="32" width="32">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="text-truncate text-body">
                                            <span class="fw-bolder">{{ order.course }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ order.created }}</td>
                            <td>{{ order.payment_method }}</td>
                            <td>{{ order.pay_amount }} {{ order.currency }}</td>
                            <td>
                                <div class="demo-inline-spacing">
                                    <button type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light">
                                        <Icon title="eye" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="orders.links" :from="orders.from" :to="orders.to"
                    :total="orders.total" />
            </div>
        </div>
        <!-- list and filter end -->
    </section>
</template>

<script>
import SLayout from './Layout'
export default {
    layout: SLayout,
};
</script>

<script setup>
import Pagination from '@/components/Pagination';
import Icon from '@/components/Icon';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from "lodash/debounce";
let props = defineProps({
    orders: Object,
    filters: Object,
    url: String,
});


let search = ref(props.filters.search)
let perPage = ref(props.filters.perPage)

watch([search, perPage], debounce(function ([val, val2]) {
    Inertia.get(props.url, { search: val, perPage: val2 }, { preserveState: true, replace: true })
}, 300))

</script>