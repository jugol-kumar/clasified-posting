<template>

    <Head title="Category List" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Job Post</h2>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
            <div class="mb-1 breadcrumb-right">
                <Link :href="`${this.$page.props.ADMIN_URL}/posts/create`" class="dt-button add-new btn btn-primary" >Create Post</Link>
            </div>
        </div>
    </div>


    <section class="app-user-list">

        <!--<div class="card">
            <div class="card-header">
                <h4 class="card-title">Collapsible</h4>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <p class="card-text">
                        You can create a collapsible content by by adding <code>[data-action="collapse"]</code> and wrapping it up
                        with <code>.heading-elements</code> in <code>.card-header</code>
                    </p>
                    <p class="card-text">
                        Click on<i data-feather="chevron-down" class="mx-50"></i>to see card collapse in action
                    </p>
                </div>
            </div>
        </div>
         list and filter start
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Add New Company</h4>
            </div>
        </div>-->

        <div v-if="posts.data.length > 0 || search != null" >
            <div class="card"  >
                <div  class="card-datatable table-responsive pt-0" >
                    <div class="d-flex justify-content-between align-items-center header-actions mx-0 row">
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
                </div>
            </div>

            <div class="row match-height">
                <div class="col-md-6" v-for="post in posts.data" :key="post.id">
                    <div class="card mb-3 position-relative" style="max-width: 540px;">
                        <div class="card-body d-flex gap-1">
                            <img :src="`${$page.props.MAIN_URL}/storage/${JSON.parse(post.post.images)[0]}`" class="img-fluid rounded-start cardImage" alt="...">
                            <div>
                                <a class="fw-bold fs-4 card-title m-0 text-capitalize">{{ post.post.title }}</a>
                                <div>
                                    <span class="badge bg-primary mt-1">{{ post.post.status }}</span>
                                    <h3>Tk {{ post.post.price }}</h3>
                                </div>
                                <p class="card-text mt-2">{{ post.post?.short_details?.slice(0, 120)+'...' }}</p>
                                <p class="card-text"><small class="text-muted">Last updated {{ post.post.formated_date }}</small></p>
                            </div>
                        </div>
                        <button class="btn btn-icon">
                        </button>
                        <div class="dropdown btnIcon">
                            <button class="btn btn-icon" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <vue-feather type="more-horizontal"></vue-feather>
                            </button>
                            <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" :href="`/single-post/${post.post.id }`" target="_blank">Show</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" @click="deleteItem(post.post.id)">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <Pagination :links="posts.links" :from="posts.from" :to="posts.to"
                            :total="posts.total" />
            </div>

        </div>
        <div class="card" v-else>
            <div class="card-body d-flex align-items-center justify-content-center">
                <img src="@/images/No-data.gif" alt="">
            </div>
        </div>
        <!-- list and filter end -->
    </section>







</template>

<script setup>
import Pagination from '@/components/Pagination';
import Modal from '@/components/Modal';
import Icon from '@/components/Icon';
import Text from '@/components/form/Text';
import Image from '@/components/form/Image';
import Textarea from '@/components/form/Textarea';
import TextEditor from '@/components/TextEditor';
import Radio from '@/components/form/Radio.vue';
import Video from '@/components/form/Video';
import BusinessCard from '@/components/modules/BusinessCard';
import Datepicker from 'vue3-datepicker'
import Popper from "vue3-popper";
import axios from 'axios';
import { ref, watch, computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3'
import debounce from "lodash/debounce";
import Swal from 'sweetalert2'
import JobCard from "../../../components/modules/JobCard";

let props = defineProps({
    posts: Object,
    filters: Object,
    url: String,
});



let deleteItem = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7367f0',
        cancelButtonColor: '#EA5455',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Inertia.delete('/panel/admin/posts/' + id, {
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


let showSingleItem = (id, edit=false) => {
    axios.get(props.url+"/"+id).then(res =>{
        if (edit){
            console.log(res);
            let data = res.data.data;
            editItem.value           = data
            updateForm.logo          = res.data.logo
            updateForm.cover         = res.data.cover
            updateForm.name          = data.name
            updateForm.type          = data.type
            updateForm.email         = data.email
            updateForm.phone         = data.phone
            updateForm.starting_date = data.starting_date
            updateForm.employee_size = data.employee_size
            updateForm.city          = data.city
            updateForm.website       = data.website
            updateForm.address       = data.address
            updateForm.details       = data.details
            document.getElementById('editItem').$vb.modal.show()
        }else {
            alert(res.data.name);
        }
    }).catch(err => {
        console.log(err)
    })
}

let updateItem = (id) =>{
    Inertia.post(props.url+"/"+id+"/update", updateForm,{
        preserveState: true,
        onSuccess: (res) =>{
            updateForm.reset();
            document.getElementById('editItem').$vb.modal.hide()
            $sToast.fire({
                icon: 'success',
                text: 'Company Save Successfully done. 🙂'
            })
        },
        onError: (res) => {
            $sToast.fire({
                icon: 'error',
                text: 'Have An Error. Try Again Later. 😔'
            })
        }
    }, )
}




let search = ref(props.filters.search);
let perPage = ref(props.filters.perPage);

watch([search, perPage], debounce(function ([val, val2]) {
    Inertia.get(props.url, { search: val, perPage: val2 }, { preserveState: true, replace: true });
}, 300));

</script>


<style>
:root {
    --popper-theme-background-color: #333333;
    --popper-theme-background-color-hover: #333333;
    --popper-theme-text-color: #ffffff;
    --popper-theme-border-width: 0px;
    --popper-theme-border-style: solid;
    --popper-theme-border-radius: 6px;
    --popper-theme-padding: 5px;
    --popper-theme-box-shadow: 0 6px 30px -6px rgba(0, 0, 0, 0.25);
}
.cardImage{
    width: 120px;
    height: 120px;
    object-fit: cover;
}
.btnIcon{
    position: absolute;
    top: -13px;
    right: -13px;
}
.btnIcon button{
    border-radius: 50%;
    border:1px solid gray;
}
</style>
