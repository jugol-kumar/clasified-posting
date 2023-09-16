<template>

    <Head title="My Courses" />
    <section class="app-order-list">
        <!-- list and filter start -->
        <div class="card">
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <img :src="course.cover" class="img-fluid product-img" :alt="course.name">
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <h4>{{ course.name }}</h4>
                        <span class="card-text item-company">By <a href="#" class="company-name">{{ 'Instructor Name'
                        }}</a></span>
                        <hr>
                        <span v-text="course.description"></span>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="user-list-table table">
                <thead class="table-light">
                    <tr class="">
                        <th class="sorting">Lesson Title</th>
                        <th class="sorting">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(lesson, index) in lessons" :key="index">
                        <td>{{ lesson.name }}</td>
                        <td>
                            <div class="demo-inline-spacing">
                                <button type="button" @click="playVideo(lesson.video, lesson.name)"
                                    class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-float waves-light">
                                    <Icon title="play-circle" />
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- list and filter end -->
    </section>

    <Modal id="playVideo" size="lg" :title="vimeo_title" v-vb-is:modal>
            <div class="text-center" style="{ width: 800px; height: 500px;}">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/58385453?badge=0&autoplay=1&loop=1" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
    </Modal>
</template>

<script>
import SLayout from './Layout'
export default {
    layout: SLayout,
};
</script>

<script setup>
import { ref } from "vue";
import Modal from '@/components/Modal';
import Icon from '@/components/Icon';
let props = defineProps({
    course: Object,
    lessons: Object,
    url: String,
});

let vimeo_url = ref('')
let vimeo_title = ref('')
let playVideo = (url, title) => {
    vimeo_url.value = url
    vimeo_title.value = title
    document.getElementById('playVideo').$vb.modal.show()
}

</script>