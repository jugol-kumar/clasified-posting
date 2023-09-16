<template>

    <Head title="Admin List" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Admin List</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <button class="dt-button add-new btn btn-primary" tabindex="0" type="button" data-bs-toggle="modal"
                    data-bs-target="#createNewUser"><span>Add New User</span></button>
            </div>
        </div>
    </div>
    <section class="app-user-list">
        <!-- list and filter start -->
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Search & Filter</h4>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" for="UserRole">Role</label>
                        <select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2">
                            <option value=""> Select Role </option>
                            <option value="Admin" class="text-capitalize">Admin</option>
                            <option value="Author" class="text-capitalize">Author</option>
                            <option value="Editor" class="text-capitalize">Editor</option>
                            <option value="Maintainer" class="text-capitalize">Maintainer</option>
                            <option value="Subscriber" class="text-capitalize">Subscriber</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="UserRole">Role</label>
                        <select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2">
                            <option value=""> Select Role </option>
                            <option value="Admin" class="text-capitalize">Admin</option>
                            <option value="Author" class="text-capitalize">Author</option>
                            <option value="Editor" class="text-capitalize">Editor</option>
                            <option value="Maintainer" class="text-capitalize">Maintainer</option>
                            <option value="Subscriber" class="text-capitalize">Subscriber</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="UserRole">Role</label>
                        <select id="UserRole" class="form-select text-capitalize mb-md-0 mb-2">
                            <option value=""> Select Role </option>
                            <option value="Admin" class="text-capitalize">Admin</option>
                            <option value="Author" class="text-capitalize">Author</option>
                            <option value="Editor" class="text-capitalize">Editor</option>
                            <option value="Maintainer" class="text-capitalize">Maintainer</option>
                            <option value="Subscriber" class="text-capitalize">Subscriber</option>
                        </select>
                    </div>
                </div>
            </div>
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
                                <label>Search:<input v-model="search" type="search" class="form-control" placeholder=""
                                        aria-controls="DataTables_Table_0"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="user-list-table table">
                    <thead class="table-light">
                        <tr class="">
                            <th class="sorting">Name</th>
                            <th class="sorting">Role</th>
                            <th class="sorting">Active on</th>
                            <th class="sorting">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users.data" :key="user.id">
                            <td>
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar  me-1">
                                            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d"
                                                alt="{{ user.name }}" height="32" width="32">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="user_name text-truncate text-body">
                                            <span class="fw-bolder">{{ user.name }}</span>
                                        </div>
                                        <small class="emp_post text-muted">{{ user.email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.active_on }}</td>
                            <td>
                                <div class="demo-inline-spacing">
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle bg-info-warning waves-effect waves-float waves-light">
                                        <Icon title="eye" />
                                    </button>
                                    <button @click="deleteItemModal(user.id)"
                                            type="button"
                                            class="btn btn-icon btn-icon rounded-circle waves-effect waves-float waves-light bg-light-danger">
                                        <Icon title="trash" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="users.links" :from="users.from" :to="users.to" :total="users.total" />
            </div>
            <!-- Modal to add new user starts-->
            <Modal id="createNewUser" title="Create New User" v-vb-is:modal>
                <form @submit.prevent="createNewUser">
                    <div class="modal-body">
                        <label>Name: </label>
                        <div class="mb-1">
                            <input v-model="createForm.name" type="text" placeholder="User Name" class="form-control">
                            <span v-if="createForm.errors.name" class="error">{{ createForm.errors.name }}</span>
                        </div>

                        <label>Email: </label>
                        <div class="mb-1">
                            <input v-model="createForm.email" type="text" placeholder="Email Address" class="form-control">
                            <span v-if="createForm.errors.email" class="error">{{ createForm.errors.email }}</span>
                        </div>

                        <label>Password: </label>
                        <div class="mb-1">
                            <input v-model="createForm.password" type="password" placeholder="Password" class="form-control">
                            <span v-if="createForm.errors.password" class="error">{{ createForm.errors.password }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button :disabled="createForm.processing" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </Modal>
            <!-- Modal to add new user Ends-->
        </div>
        <!-- list and filter end -->
    </section>
</template>

<script setup>
import Pagination from '@/components/Pagination';
import Modal from '@/components/Modal';
import Icon from '@/components/Icon';
import { ref, watch, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import debounce from "lodash/debounce";
import Swal from 'sweetalert2'
let props = defineProps({
    users: Object,
    filters: Object,
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
            Inertia.delete(adminPath.value + '/users/' + id, { preserveState: true, replace: true, onSuccess: page => {
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
            }})
        }
    })
};
let createForm = useForm({
    name: '',
    email: '',
    password: ''
});

let createNewUser = () => {
    createForm.post(adminPath.value + '/users', {
        onSuccess: () => document.getElementById('createNewUser').$vb.modal.hide()
    });
}

let search = ref(props.filters.search);
let perPage = ref(props.filters.perPage);
const adminPath = computed(() => usePage().props.value.ADMIN_URL)

watch([search, perPage], debounce(function ([val, val2]) {
    Inertia.get(adminPath.value + '/users', { search: val, perPage: val2 }, { preserveState: true, replace: true });
}, 300));

</script>

<style>
.select-search-area label {
    margin-top: 1rem;
    margin-bottom: 0.5rem;
    font-weight: normal;
    text-align: left;
    white-space: nowrap;
}

.select-search-area select {
    width: 5rem;
    background-position: calc(100% - 3px) 11px, calc(100% - 20px) 13px, 100% 0;
    margin: 0 0.5rem;
    display: inline-block;
}

.select-search-area input {
    margin-left: 0.75rem;
    width: auto;
    display: inline-block;
}
</style>
