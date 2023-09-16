<template>

    <Head title="Student List"/>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Student List</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <button class="dt-button add-new btn btn-primary" tabindex="0" type="button" data-bs-toggle="modal"
                        data-bs-target="#createNewStudent"><span>Add New Student</span></button>
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
                        <th class="sorting">Phone</th>
                        <th class="sorting">Active on</th>
                        <th class="sorting">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="student in students.data" :key="student.id">
                        <td>
                            <div class="d-flex justify-content-left align-items-center">
                                <div class="avatar-wrapper">
                                    <div class="avatar  me-1">
                                        <img :src="student.photo"
                                             :alt="student.name" height="32" width="32">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="student_name text-truncate text-body">
                                        <span class="fw-bolder">{{ student.name }}</span>
                                    </div>
                                    <small class="emp_post text-muted">{{ student.email }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ student.phone }}</td>
                        <td>{{ student.active_on }}</td>
                        <td>
                            <div class="demo-inline-spacing">
                                <button type="button"
                                        @click="showItem(student.show_url)"
                                        class="btn btn-icon btn-icon rounded-circle bg-light-warning waves-effect waves-float waves-light">
                                    <Icon title="eye" />
                                </button>
                                <button @click="deleteItemModal(student.id)" type="button"
                                        class="btn btn-icon btn-icon rounded-circle waves-effect waves-float waves-light bg-light-danger">
                                    <Icon title="trash"/>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <Pagination :links="students.links" :from="students.from" :to="students.to" :total="students.total"/>
            </div>
            <!-- Modal to add new Student starts-->
            <Modal id="createNewStudent" title="Create New User" v-vb-is:modal>
                <form @submit.prevent="createNewStudent">
                    <div class="modal-body">
                        <Text v-model="createForm.name" type="text" label="Name" placeholder="Name"
                              :error="createForm.errors.name"/>
                        <Text v-model="createForm.phone" type="text" label="Phone" placeholder="Phone number"
                              :error="createForm.errors.phone"/>
                        <Text v-model="createForm.email" type="email" label="Email" placeholder="Email Address"
                              :error="createForm.errors.email"/>
                        <Password v-model="createForm.password" label="Password" :error="createForm.errors.password"/>
                        <Image v-model="createForm.photo" label="Photo" :error="createForm.errors.photo"/>
                        <Image v-model="createForm.certificate" label="Certificate" :error="createForm.errors.certificate"/>
                    </div>
                    <div class="modal-footer">
                        <button :disabled="createForm.processing" type="submit"
                                class="btn btn-primary waves-effect waves-float waves-light">Submit
                        </button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel
                        </button>
                    </div>
                </form>
            </Modal>
            <!-- Modal to add new Student Ends-->
        </div>
        <!-- list and filter end -->
    </section>



    <!--    show modal-->

    <Modal id="showItem" title="Show Category" v-vb-is:modal>

        <div class="card card-profile">
            <img src="../../images/profile-bg.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo">
            <div class="card-body">
                <div class="profile-image-wrapper">
                    <div class="profile-image">
                        <div class="avatar">
                            <img :src="showData.photo" alt="Profile Picture">
                        </div>
                    </div>
                </div>
                <h3>{{ showData.name }}</h3>
                <h5>{{ showData.email}}</h5>
                <h6>{{ showData.phone }}</h6>
                <span class="badge badge-light-primary profile-badge">{{ showData.role }}</span>
                <hr class="mb-2">
                <div class="d-flex justify-content-between align-items-center">

                    <button class="btn btn-primary">
                        <Icon title="facebook" />
                    </button>
                    <button class="btn btn-primary">
                        <Icon title="facebook" />
                    </button>
                    <button class="btn btn-primary">
                        <Icon title="facebook" />
                    </button>

                </div>
            </div>
        </div>

        <div class="modal-dialog-centered mx-auto mb-1">
            <button class="btn bg-light-primary me-2">Edit</button>
            <button class="btn bg-light-danger">Delete</button>
        </div>
    </Modal>





</template>

<script setup>
    import Pagination from '@/components/Pagination'
    import Modal from '@/components/Modal'
    import Icon from '@/components/Icon'
    import {ref, watch} from 'vue';
    import {Inertia} from '@inertiajs/inertia'
    import {useForm} from '@inertiajs/inertia-vue3'
    import debounce from "lodash/debounce"
    import Swal from 'sweetalert2'
    import Password from '@/components/form/Password'
    import Text from '@/components/form/Text'
    import Image from '@/components/form/Image'
    import axios from "axios";

    let props = defineProps({
        students: Object,
        filters: Object,
        url: String,
    });

    let createForm = useForm({
        name: '',
        email: '',
        phone: '',
        designation: '',
        photo: '',
        password: '',
        certificate: '',
    });


    let createNewStudent = () => {
        Inertia.post(props.url, createForm,{
            onSuccess: () => {
                document.getElementById('createNewStudent').$vb.modal.hide()
                alert("ok");
            }
        });
    }

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



    let showData = ref([])
    let showItem = (show_url) => {
        axios.get(show_url).then(res =>{
            showData.value = res.data;
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
