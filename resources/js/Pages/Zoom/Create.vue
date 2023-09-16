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
                        <div class="col-6">
                            <Image v-model="createForm.photo" label="Photo" />
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Link by</label>
                                <v-select v-model="createForm.course_id" label="name" :options="courses"
                                    :reduce="course => course.id"></v-select>
                            </div>
                        </div>
                        <div class="col-12">
                            <Text v-model="createForm.meeting_title" label="Meeting Title"
                                placeholder="Meeting title" />
                        </div>
                        <div class="col-12">
                            <Text v-model="createForm.agenda" label="Meeting Agenda" placeholder="Meeting Agenda" />
                        </div>
                        <div class="col-6">
                            <label class="mb-1">Meeting Settings: </label>
                            <div class="mb-1">
                                <div class="form-check">
                                    <input v-model="createForm.host_video" value="host_video" id="host_video" class="form-check-input" type="checkbox" />
                                    <label class="form-check-label" for="host_video">Enable Host Video</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="form-check">
                                    <input v-model="createForm.participant_video" value="participant_video" id="participant_video" class="form-check-input" type="checkbox" />
                                    <label class="form-check-label" for="participant_video">Enable Participant Video</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="form-check">
                                    <input v-model="createForm.join_before_host" value="join_before_host" id="join_before_host" class="form-check-input" type="checkbox" />
                                    <label class="form-check-label" for="join_before_host">Join before host?</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="form-check">
                                    <input v-model="createForm.mute_upon_entry" value="mute_upon_entry" id="mute_upon_entry" class="form-check-input" type="checkbox" />
                                    <label class="form-check-label" for="mute_upon_entry">Mute Upon Entry?</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="form-check">
                                    <input v-model="createForm.registrants_email_notification" value="registrants_email_notification" id="registrants_email_notification" class="form-check-input" type="checkbox" />
                                    <label class="form-check-label" for="registrants_email_notification">Registrants email notification?</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
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
import Checkbox from '@/components/form/Checkbox';
import TextEditor from '@/components/TextEditor';
import { computed } from 'vue';
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import Datepicker from 'vue3-datepicker'
import Radio from '@/components/form/Radio.vue';
let props = defineProps({
    courses: Object,
    url: String,
})

let createForm = useForm({
    photo: '',
    course_id: '',
    meeting_title: '',
    agenda: '',
    host_video: null,
    participant_video: null,
    join_before_host: null,
    mute_upon_entry: null,
    registrants_email_notification: null,
})

let createNewCourse = () => {
    createForm.post(props.url, {
        onSuccess: () => {
            createForm.reset()
        }
    })
}
</script>