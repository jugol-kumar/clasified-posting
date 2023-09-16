<template>

    <Head title="Create Course" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Course Create Form</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="course-create-form">
        <div class="card">
            <div class="card-body">
                <form class="form form-vertical" @submit.prevent="createNewCourse">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Select a Category</label>
                                <v-select v-model="createForm.category_id" label="name" :options="categories" :reduce="category => category.id"></v-select>
                            </div>
                        </div>
                        <div class="col-12">
                            <Text v-model="createForm.name" label="Course Title" placeholder="Course title" />
                        </div>
                        <div class="col-4">
                            <Image v-model="createForm.cover" label="Cover Pic"/>
                        </div>
                        <div class="col-4">
                            <Video v-model="createForm.video" label="Course Intro Video" placeholder="Course Intro Video" />
                        </div>
                        <div class="col-4">
                            <Image v-model="createForm.files" label="Others Files"/>
                        </div>
                        <div class="col-12">
                            <Textarea v-model="createForm.description" label="Course Short Description" />
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Course content</label>
                                <TextEditor v-model="createForm.content" />
                            </div>
                        </div>
                        <div class="col-6">
                            <Text v-model="createForm.price" type="number" label="Course Price" placeholder="100.00" prefix="BDT" />
                        </div>
                        <div class="col-6">
                            <label>Active From: </label>
                            <datepicker v-model="createForm.active_on" class="form-control" placeholder="Choose a date" />
                        </div>

                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script setup>
import Text from '@/components/form/Text';
import Image from '@/components/form/Image';
import Textarea from '@/components/form/Textarea';
import TextEditor from '@/components/TextEditor';
import { computed } from 'vue';
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import Datepicker from 'vue3-datepicker'
import Radio from '@/components/form/Radio.vue';
import Video from '@/components/form/Video';
let props = defineProps({
    categories: Object,
    url: String,
    //   can: Object,
})

let createForm = useForm({
    name: '',
    category_id: '',
    cover: '',
    video: '',
    description: '',
    content: null,
    price: '',
    active_on: null,
    files:null,
})

let createNewCourse = () => {
    createForm.post(props.url, {
        onSuccess: () => {
            createForm.reset()
        }
    })
}


</script>
