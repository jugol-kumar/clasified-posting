<template>

    <Head title="Child Category List" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Child Category List</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <button class="dt-button add-new btn btn-primary" tabindex="0" type="button" data-bs-toggle="modal"
                    data-bs-target="#createNewChildCategory"><span>Add New Child Category</span></button>
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
                            <th class="sorting">Main Category</th>
                            <th class="sorting">Sub Category</th>
                            <th class="sorting">Child Category</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="child_category in child_categories.data" :key="child_category.id">
                            <td>{{ child_category.category }}</td>
                            <td>{{ child_category.sub_category }}</td>
                            <td>{{ child_category.name }}</td>
                            <td>
                                <div class="demo-inline-spacing">
                                    <button type="button"
                                            @click="showItem(child_category.id)"
                                            class="btn btn-icon btn-icon rounded-circle bg-light-warning waves-effect waves-float waves-light">
                                        <Icon title="eye" />
                                    </button>
                                    <button @click="deleteItemModal(child_category.id)" type="button"
                                        class="btn btn-icon btn-icon rounded-circle waves-effect waves-float waves-light bg-light-danger">
                                        <Icon title="trash" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="child_categories.links" :from="child_categories.from" :to="child_categories.to" :total="child_categories.total" />
            </div>
            <!-- Modal to add new user starts-->
            <Modal id="createNewChildCategory" title="Create New Sub Category" v-vb-is:modal>
                <form @submit.prevent="createNewChildCategory">
                    <div class="modal-body">
                        <label>Main Category: </label>
                        <div class="mb-1">
                            <v-select v-model="createForm.category_id" @update:modelValue="categorySelected" label="name" :options="categories" :reduce="category => category.id"></v-select>
                        </div>
                        <label>Sub Category: </label>
                        <div class="mb-1">
                            <v-select v-model="createForm.sub_category_id" label="name" :options="sub_categories" :reduce="sub_category => sub_category.id"></v-select>
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



    <!--    show modal-->

    <Modal id="showItem" title="Show Category" v-vb-is:modal>
        <div class="modal-dialog modal-lg modal-dialog-centered d-flex flex-column">
            <img :src="parent.photo" :alt="parent.name" class="avatar" width="60" height="60">
            <h3 class="mt-2">{{ parent.name }}</h3>
            <h4>{{ sub.name }}</h4>
            <h5>{{ child.name }}</h5>
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
import axios from 'axios';
import { ref, watch, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3'
import debounce from "lodash/debounce";
import Swal from 'sweetalert2'
let props = defineProps({
    categories: Object,
    sub_categories: Object,
    child_categories: Object,
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
    name: null,
    category_id: null,
    sub_category_id: null,
});

let categorySelected = (category_id) => {
    console.log(category_id);
    Inertia.get(props.url, { category_id: category_id }, { preserveState: true, replace: true });
    createForm.sub_category_id = null
}

let createNewChildCategory = () => {
    createForm.post(props.url, {
        onSuccess: () => {
            document.getElementById('createNewChildCategory').$vb.modal.hide()
            createForm.reset()
        }
    });
}


let parent = ref([])
let sub = ref([])
let child = ref([])

let showItem = (id) => {
    axios.get(props.url + "/" + id).then(res =>{
        console.log(res.data);
        parent.value = res.data.category
        sub.value    = res.data.sub_category
        child.value  = res.data
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
