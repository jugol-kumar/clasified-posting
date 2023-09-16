<template>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid rounded mb-75"
                        :src="course.cover"
                        :alt="course.name" />
                    <div class="d-flex justify-content-between align-items-center mb-1 bg-light px-1 pt-1 rounded">
                        <div class="h5">
                            Category: {{ course.category_id }}
                        </div>
                        <div class="h5">
                            Price: {{ course.price }} BDT
                        </div>
                        <div class="h5">
                            Start From: {{ course.active_on }}
                        </div>
                    </div>

                    <div class="h3">
                        {{ course.name }}
                    </div>
                    <!-- video -->
                    <iframe :src="course.video"
                        class="w-100 rounded border-0 height-250 mb-50"></iframe>
                    <!--/ video -->
                    <h3 class="border-bottom-primary d-inline">Course Short Details :</h3>
                    <p class="card-text mt-2" style="text-align: justify" v-html="course.description"></p>
                    <hr>
                    <h3 class="border-bottom-primary d-inline">Course Details :</h3>
                    <p class="mt-2" v-html="course.content"></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h4>All Lesson List</h4>
                <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                    data-bs-target="#createNewLesson">Create New Lesson</button>
            </div>
            <table class="user-list-table table">
                <thead class="table-light">
                    <tr class="">
                        <th class="sorting">SL.</th>
                        <th class="sorting">Title</th>
                        <th class="sorting">Status</th>
                        <th class="sorting">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(lesson, index) in lessons" :key="lesson.id">
                        <td>#{{ index+1 }}</td>
                        <td>
                            <small>{{ lesson.name }}</small>
                        </td>
                        <td>{{ lesson.status ? 'Active' : 'Draft' }}</td>
                        <td>
                            <div class="demo-inline-spacing">
                                <button type="button"
                                    class="btn btn-icon btn-sm rounded-circle btn-warning waves-effect waves-float waves-light">
                                    <Icon title="eye" />
                                </button>
                                <button type="button"
                                    class="btn btn-icon btn-sm rounded-circle btn-warning waves-effect waves-float waves-light btn-danger">
                                    <Icon title="trash" />
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <Modal id="createNewLesson" title="Create New Lesson" v-vb-is:modal>
        <form @submit.prevent="createNewLesson">
            <div class="modal-body">
                <Text v-model="createForm.name" type="text" label="Lesson Title" :error="createForm.errors.name"
                    placeholder="Lesson title" />
                    <Video v-model="createForm.video" label="Lesson Video" placeholder="Lesson Video" />
                <Textarea v-model="createForm.description" label="Lesson Description"
                    :error="createForm.errors.description" placeholder="Lesson description" />
                <label class="form-check-label mb-50" for="customSwitch111">Lesson Status: </label>
                <div class="form-check form-switch form-check-success">
                    <input type="checkbox" class="form-check-input" id="customSwitch111" v-model="createForm.status" :true-value="true" :false-value="false" />
                    <label class="form-check-label" for="customSwitch111">
                        <span class="switch-icon-left">
                            <Icon title="check" />
                        </span>
                        <span class="switch-icon-right">
                            <Icon title="x" />
                        </span>
                    </label>
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
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import Icon from '@/components/Icon'
import Modal from '@/components/Modal'
import Text from '@/components/form/Text'
import Textarea from '@/components/form/Textarea'
import Switch from '@/components/form/Switch'
import Video from '@/components/form/Video';

let props = defineProps({
    course: Object,
    lessons: Object,
    url: String,
    lesson_store_url: String,
});

let createForm = useForm({
    name: null,
    course_id: 1,
    description: null,
    video: null,
    status: false,
});

let createNewLesson = () => {
    createForm.post(props.lesson_store_url, {
        onSuccess: () => {
            document.getElementById('createNewLesson').$vb.modal.hide()
            createForm.reset()
        }
    });
}
</script>

<style scoped>
table td,
th {
    padding: 0.5rem;
}
</style>
