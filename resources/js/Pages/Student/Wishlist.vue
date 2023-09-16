<template>

    <Head title="My Wishlist" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">My Wishlist</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="app-wishlist-list">
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
                            <th class="sorting">Course Name</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="wishlist in wishlists.data" :key="wishlist.id">
                            <td>{{ wishlist.name }}</td>
                            <td>
                                <div class="demo-inline-spacing">
                                    <button type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light">
                                        <Icon title="eye" />
                                    </button>
                                    <button @click="deleteItemModal(wishlist.delete_url)" type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light btn-danger">
                                        <Icon title="trash" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="wishlists.links" :from="wishlists.from" :to="wishlists.to" :total="wishlists.total" />
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
import Swal from 'sweetalert2'
let props = defineProps({
    wishlists: Object,
    filters: Object,
    url: String,
});


let deleteItemModal = (url) => {
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
            Inertia.delete(url, {
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
}

let search = ref(props.filters.search)
let perPage = ref(props.filters.perPage)

watch([search, perPage], debounce(function ([val, val2]) {
    Inertia.get(props.url, { search: val, perPage: val2 }, { preserveState: true, replace: true })
}, 300))

</script>