<template>
    <Head title="Sub Category List" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Sub Category List</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <button class="dt-button add-new btn btn-primary" tabindex="0" type="button" data-bs-toggle="modal"
                    data-bs-target="#createNewSubCategory"><span>Add New Sub Category</span></button>
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
                            <th class="sorting">Sub Category</th>
                            <th class="sorting">Main Category</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sub_category in sub_categories.data" :key="sub_category.id">
                            <td>{{ sub_category.name }}</td>
                            <td>{{ sub_category.category }}</td>
                            <td>
                                <div class="demo-inline-spacing">
                                    <button type="button"
                                            @click="showItem(sub_category.id)"
                                            class="btn btn-icon btn-icon rounded-circle bg-light-warning waves-effect waves-float waves-light">
                                        <Icon title="eye" />
                                    </button>
                                    <button @click="deleteItemModal(sub_category.id)" type="button"
                                        class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light btn-danger">
                                        <Icon title="trash" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="sub_categories.links" :from="sub_categories.from" :to="sub_categories.to" :total="sub_categories.total" />
            </div>
            <!-- Modal to add new user starts-->
            <Modal id="createNewSubCategory" title="Create New Sub Category" v-vb-is:modal>
                <form @submit.prevent="createNewSubCategory">
                    <div class="modal-body">
                        <label>Main Category: </label>
                        <div class="mb-1">
                            <v-select v-model="createForm.category_id" label="name" :options="categories" :reduce="category => category.id"></v-select>
                        </div>
                        <label>Name: </label>
                        <div class="mb-1">
                            <input v-model="createForm.name" type="text" placeholder="Category Name" class="form-control">
                            <span v-if="createForm.errors.name" class="error">{{ createForm.errors.name }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button :disabled="createForm.processing" type="submit"
                            class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                </form>
            </Modal>
            <!-- Modal to add new user Ends-->
        </div>
        <!-- list and filter end -->
    </section>


    <Modal id="showItem" title="Show Sub Category" v-vb-is:modal>
        <div class="modal-dialog modal-lg modal-dialog-centered d-flex flex-column">
            <img :src="parentCatgory.photo" :alt="parentCatgory.name" class="avatar" width="60" height="60">
            <h2 class="mt-1">{{ parentCatgory.name }}</h2>
            <h3 class="mt-2">{{ showData.name }}</h3>
        </div>
        <div class="modal-dialog-centered mx-auto mb-1">
            <button class="btn bg-light-primary me-2">Edit</button>
            <button class="btn bg-light-danger">Delete</button>
        </div>
    </Modal>






</template>

<script setup>
import Pagination from '@/components/Pagination';
import Modal from '@/components/Modal';
import Icon from '@/components/Icon';
import { ref, watch, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3'
import debounce from "lodash/debounce";
import Swal from 'sweetalert2'
import axios from "axios";
let props = defineProps({
    categories: Object,
    sub_categories: Object,
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
            Inertia.delete(props.url + '/' +id, {
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
let createForm = useForm({
    name: '',
    category_id: '',
});

let createNewSubCategory = () => {
    createForm.post(props.url, {
        onSuccess: () => {
            document.getElementById('createNewSubCategory').$vb.modal.hide()
            createForm.reset()
        }
    });
}

let parentCatgory = ref([])
let showData = ref([])

let showItem = (id) => {
    axios.get(props.url + "/" + id).then(res =>{
        showData.value = res.data
        parentCatgory.value = res.data.category
        document.getElementById('showItem').$vb.modal.show()
    }).catch(err => {
        console.log(err)
    })
}

let search = ref(props.filters.search);
let perPage = ref(props.filters.perPage);

watch([search, perPage], debounce(function ([val, val2]) {
    Inertia.get(props.url, { search: val, perPage: val2 }, { preserveState: true, replace: true });
}, 300));

</script>
