<template>

    <Head title="Mocktest List"/>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Mocktest List</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <Link :href="props.url+'/create'" class="dt-button add-new btn btn-primary">
                    <span>Add New Mocktest</span>
                </Link>
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
                                <label>Search:<input v-model="search" type="search" class="form-control"
                                                     placeholder="Type here for search"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="user-list-table table">
                    <thead class="table-light">
                    <tr class="">
                        <th class="sorting">Name</th>
                        <th class="sorting">Total Q</th>
                        <th class="sorting">Duration</th>
                        <th class="sorting">Status</th>
                        <th class="sorting">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="mocktest in mocktests.data" :key="mocktest.id">
                        <td>{{ mocktest.name }}</td>
                        <td>{{ mocktest.total_q }}</td>
                        <td>{{ mocktest.duration }}</td>
                        <td>{{ mocktest.status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="demo-inline-spacing">
                                <button type="button"
                                        @click="showItem(mocktest.id)"
                                        class="btn btn-icon btn-icon rounded-circle bg-light-warning waves-effect waves-float waves-light">
                                    <Icon title="eye"/>
                                </button>
                                <button @click="deleteItemModal(mocktest.id)" type="button"
                                        class="btn btn-icon btn-icon rounded-circle waves-effect waves-float waves-light bg-light-danger">
                                    <Icon title="trash"/>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <Pagination :links="mocktests.links" :from="mocktests.from" :to="mocktests.to"
                            :total="mocktests.total"/>
            </div>
        </div>
        <!-- list and filter end -->
    </section>


    <Modal id="showItem" :size="{default:'md'}" title="Show Category" v-vb-is:modal>
        <div class="modal-content">
            <div class="modal-body pb-3 px-sm-3">
                <div>
                    <h1 class="text-center mb-1" id="createAppTitle">{{ mocktest.name }}</h1>
                    <h4>Qusations: {{ mocktest.total_q }}</h4>
                    <h4>Time: {{ mocktest.duration }}Min</h4>
                </div>

                <div class="bs-stepper vertical wizard-modern mt-5">
                    <small>Sub Category: </small>
                    <ul class="d-flex">
                        <li v-for="(item, index) in sub_categories" :key="item.id" class="list-group-item p-25 border-0">
                            <span class="badge badge-light-primary">{{ item.name }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </Modal>


</template>

<script setup>
    import Pagination from '@/components/Pagination';
    import Icon from '@/components/Icon';
    import Modal from '@/components/Modal'
    import {ref, watch} from 'vue';
    import {Inertia} from '@inertiajs/inertia';
    import debounce from "lodash/debounce";
    import Swal from 'sweetalert2'
    import axios from "axios";

    let props = defineProps({
        mocktests: Object,
        filters: Object,
        url: String,
    });


    let deleteItemModal = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6230d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Inertia.delete(props.url +"/"+ id, {
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


    let mocktest = ref([])
    let category = ref([])
    let sub_categories = ref([])
    let child_category = ref([])

    let showItem = (slug) => {
        axios.get(props.url + '/' + slug).then(res => {
            console.log(res);
            mocktest.value = res.data
            sub_categories.value = res.data.sub_categories

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
