<template>

    <Head title="Category List" />


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="page">
                        <div class="row">
                            <div class="column small-11 small-centered">
                                <h2>{{ post?.title }}</h2>
                                <small class="text-muted">Last Update {{ post.updated_at }}, {{ post.address }}</small>
                                <div class="slider">
                                    <img v-for="image in JSON.parse(post.images)" class="thumbnail page-bg cardImage" :src="`/storage/${image}`" alt="">
                                </div>
<!--                                <div class="slider slider-nav mt-2">
                                    <img v-for="image in JSON.parse(post.images)" class="smallImage" :src="`/storage/${image}`" alt="">
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="fw-bolder fs-3">Tk {{ post.price }}</h2>
                    <p>Condition: {{ post.condition }}</p>
                    <p>Type: {{ post.category.name }}</p>
                    <p>{{ post.short_details }}</p>
                    <h3>Description</h3>
                    <div id="fullDetailsShow" class="showMinDetails details-p" v-html="post.full_details"/>
<!--                    <button id="showMore" class="show-more-btn">Show More <i class="fe fe-chevron-down"></i></button>-->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h3>Curent Post Status</h3>
                    <span class="btn" :class="{
                        'btn-success' : props.post.status === 'Approved',
                        'btn-danger' : props.post.status === 'Reject',
                        'btn-warning' : props.post.status === 'Pending'
                        }">{{ props.post.status }}</span>

                </div>
            </div>
            <div class="card card-sticky">
                <div class="card-body d-flex flex-column gap-1">
                    <button class="btn btn-primary">Edit Post</button>
                    <button class="btn btn-primary" @click="changeStatus">Change Status</button>
                    <button class="btn btn-danger" @click="deleteItemModal(props.post.id)">Delete Post</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal to add new user starts-->
    <Modal id="createNewCategory" title="Create New Category" v-vb-is:modal>
        <form @submit.prevent="createNewCategory">
            <div class="modal-body">
                <label>Status</label>
                <v-select v-model="createForm.status" :options="['Approved','Pending', 'Reject']" placeholder="Select Post Status"></v-select>
            </div>
            <div class="modal-footer">
                <button :disabled="createForm.processing" type="submit"
                        class="btn btn-primary waves-effect waves-float waves-light">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
            </div>
        </form>
    </Modal>


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
    post: Object,
    filters: Object,
    url: String,
});


const changeStatus = () => document.getElementById('createNewCategory').$vb.modal.show()


let createForm = useForm({
    status: null,
    processing:false,
    id:props.post.id
});

let createNewCategory = () => {
    createForm.post('/panel/admin/change-post-status', {
        onSuccess: () => {
            document.getElementById('createNewCategory').$vb.modal.hide()
            createForm.reset()
            $sToast.fire({
                icon: 'success',
                text: 'Status Updated. 🙂'
            })
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

</script>


<style>
.cardImage{
    width: 120px;
    height: 120px;
    object-fit: cover;
    padding: 10px;
    border: 1px solid gainsboro;
    background: #f3f3f3;
}
.slider{
    margin-top: 2rem;
    display: flex;
    gap: 10px;
}
</style>
