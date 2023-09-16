<template>

    <Head title="Create Question" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Question Create Form</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="question-create-form">
        <div class="card">
            <div class="card-body">
                <form class="form form-vertical" @submit.prevent="createNewCategory">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="mb-1">
                                <label class="form-label">Select a Category</label>
                                <v-select v-model="createForm.category_id" @update:modelValue="categorySelected" label="name"
                                          :options="categories"
                                          :reduce="category => category.id">
                                </v-select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-1">
                                <label class="form-label">Select a Sub Category</label>
                                <v-select v-model="createForm.sub_category_id" @update:modelValue="subCategorySelected" label="name" :options="sub_categories" :reduce="category => category.id"></v-select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="mb-1">
                                <label class="form-label">Select a Child Category</label>
                                <v-select v-model="createForm.child_category_id" label="name" :options="child_categories" :reduce="category => category.id"></v-select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Question Title</label>
                                <TextEditor v-model="createForm.title" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Option A</label>
                                <TextEditor v-model="createForm.a" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Option B</label>
                                <TextEditor v-model="createForm.b" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Option C</label>
                                <TextEditor v-model="createForm.c" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Option D</label>
                                <TextEditor v-model="createForm.d" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Option E</label>
                                <TextEditor v-model="createForm.e" />
                            </div>
                        </div>
                        <div class="col-12">
                            <Radio v-model="createForm.answer" :options="options" name="answer" label="Answer" />
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label">Feedback</label>
                                <TextEditor v-model="createForm.feedback" />
                            </div>
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
import { ref } from 'vue';
import TextEditor from '@/components/TextEditor';
import { useForm } from '@inertiajs/inertia-vue3'
import axios from 'axios';
import Radio from '@/components/form/Radio.vue';
let props = defineProps({
    categories: Object,
    url: String,
    subbycat_url: String,
    childbysubcat_url: String,
    //   can: Object,
});

let createForm = useForm({
    title: '',
    category_id: '',
    sub_category_id: '',
    child_category_id: '',
    a: '',
    b: '',
    c: '',
    d: '',
    e: '',
    answer: '',
    feedback: '',
});
let options = {a: 'Option A', b: 'Option B', c: 'Option C', d: 'Option D', e: 'Option E'}

const sub_categories = ref([])
const child_categories = ref([])

let categorySelected = (e) => {
    axios.post(props.subbycat_url, { category: e })
        .then(res => {
            sub_categories.value = res.data
            createForm.sub_category_id = null
            createForm.child_category_id = null
        })
        .catch(error => {
            console.log(error)
        });
}

let subCategorySelected = (e) => {
    axios.post(props.childbysubcat_url, { subcategory: e })
        .then(res => {
            child_categories.value = res.data
            createForm.child_category_id = null
        })
        .catch(error => {
            console.log(error)
        });
}

let createNewCategory = () => {
    createForm.post(props.url, {
        onSuccess: () => {
            createForm.reset()
        }
    });
}

</script>
