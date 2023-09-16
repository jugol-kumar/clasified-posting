<template>

    <Head title="Create Mocktest" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Mocktest Create Form</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="mocktest-create-form">
        <div class="card">
            <div class="card-body">
                <form class="form form-vertical" @submit.prevent="createNewMocktest">
                    <div class="row">
                        <div class="col-12">
                            <Text v-model="createForm.name" label="Mocktest Title" placeholder="Mocktest title" />
                        </div>
                        <div class="col-4">
                            <Text v-model="createForm.total_q" type="number" label="Total Questions"
                                placeholder="Total Question" />
                        </div>
                        <div class="col-4">
                            <Text v-model="createForm.duration" type="number" label="Total Duration"
                                placeholder="Total Duration" suffix="Minutes" />
                        </div>
                        <div class="col-3">
                            <label class="form-check-label mb-50" for="status">Status: </label>
                            <div class="form-check form-switch form-check-success mb-1">
                                <input type="checkbox" class="form-check-input" id="status" v-model="createForm.status"
                                    :true-value="true" :false-value="false" />
                                <label class="form-check-label" for="status">
                                    <span class="switch-icon-left">
                                        <Icon title="check" />
                                    </span>
                                    <span class="switch-icon-right">
                                        <Icon title="x" />
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <h4 class="text-center py-1 bg-light">Question Sorting: </h4>
                            <div class="mb-1">
                                <label>Select a category</label>
                                <v-select v-model="createForm.category_id" @update:modelValue="categorySelected"
                                    label="name" :options="categories" :reduce="category => category.id" placeholder="Plaese select a category for question sorting"></v-select>
                            </div>
                            <div class="table-responsive">
                                <table class="table" v-if="createForm.categories.length > 0">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Sub Category</th>
                                            <th class="text-center">Available</th>
                                            <th>Take</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="sub_cat in createForm.categories" :key="sub_cat.id">
                                            <td class="px-0">{{ sub_cat.name }}</td>
                                            <td class="px-0 text-center">{{ sub_cat.question }}</td>
                                            <td class="px-0">
                                                <input v-model="sub_cat.take" type="number" min="0"
                                                    :max="sub_cat.question" class="form-control" :disabled="!sub_cat.question" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-0 text-end" colspan="2">
                                                <span class="px-1">Total: </span>
                                            </td>
                                            <td class="px-0">{{ totalTakenQuestion }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" :disabled="createForm.processing || totalTakenQuestion != createForm.total_q"
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
import Icon from '@/components/Icon';
import { computed } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3'
import axios from 'axios'
let props = defineProps({
    categories: Object,
    url: String,
    subqbycat_url: String,
    //   can: Object,
})

let createForm = useForm({
    name: '',
    total_q: '',
    duration: '',
    status: false,
    categories: [],
    category_id: null
})

let createNewMocktest = () => {
    createForm.post(props.url, {
        onSuccess: () => {
            createForm.reset()
        }
    })
}

const categorySelected = (e) => {
    axios.post(props.subqbycat_url, { category: e })
        .then(res => {
            createForm.categories = res.data
        })
        .catch(error => {
            console.log(error)
        });
}

const totalTakenQuestion = computed(() => {
    let count = 0;
    createForm.categories.forEach((category) => {
        count += category.take
        console.log(count);
    })
    return count
})

</script>