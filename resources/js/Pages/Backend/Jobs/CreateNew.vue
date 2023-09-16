<template>

    <Head title="Create Question" />
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Create Job</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="question-create-form">
        <form class="row pt-75" @submit.prevent="newItem">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Post Details</h2>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <Text v-model="createForm.title" label="Post Title" placeholder="Enter post title" :error="props.errors.title"/>
                            </div>
                            <div class="row pe-0">
                                <div class="col pe-0">
                                    <div class="mb-1">
                                        <label class="form-label">Select a Category</label>
                                        <v-select v-model="createForm.category_id"
                                                  @update:modelValue="categorySelected"
                                                  label="name"
                                                  class="form-control"
                                                  :options="categories"
                                                  placeholder="~~Select Category~~"
                                                  :reduce="category => category.id">
                                        </v-select>
                                        <span class="error text-danger" v-if="props.errors.category_id">{{ props.errors.category_id }}</span>
                                    </div>
                                </div>
                                <div class="col" v-if="sub_categories.length > 0">
                                    <div class="mb-1">
                                        <label class="form-label">Select a Sub Category</label>
                                        <v-select v-model="createForm.sub_category_id"
                                                  label="name"
                                                  class="form-control"
                                                  :options="sub_categories"
                                                  placeholder="~~Select Sub Category~~"
                                                  :reduce="category => category.id"></v-select>
                                    </div>
                                </div>
                            </div>
                            <div class="row pe-0">
                                <div class="col pe-0">
                                    <div class="mb-1">
                                        <label class="form-label">Select Division</label>
                                        <v-select v-model="createForm.division_id"
                                                  @update:modelValue="changeDivision"
                                                  label="name"
                                                  class="form-control"
                                                  :options="divisions"
                                                  placeholder="~~ Select Divisions ~~"
                                                  :reduce="div => div.id">
                                        </v-select>
                                        <span class="error text-danger" v-if="props.errors.division_id">{{ props.errors.division_id }}</span>
                                    </div>
                                </div>
                                <div class="col" v-if="districts.length > 0">
                                    <div class="mb-1">
                                        <label class="form-label">Select District</label>
                                        <v-select v-model="createForm.district_id"
                                                  label="name"
                                                  @update:modelValue="changeDistrict"
                                                  class="form-control"
                                                  :options="districts"
                                                  placeholder="~~ Select District ~~"
                                                  :reduce="dis => dis.id"></v-select>
                                        <span class="error text-danger" v-if="props.errors.district_id">{{ props.errors.district_id }}</span>
                                    </div>
                                </div>
                                <div class="col" v-if="upozilas.length > 0">
                                    <div class="mb-1">
                                        <label class="form-label">Select Upazilas</label>
                                        <v-select v-model="createForm.upozila_id"
                                                  label="name"
                                                  class="form-control"
                                                  :options="upozilas"
                                                  placeholder="~~ Select Upazilas ~~"
                                                  :reduce="dis => dis.id"></v-select>
                                        <span class="error text-danger" v-if="props.errors.upozila_id">{{ props.errors.upozila_id }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" v-if="props.conditions?.length">
                                <label>Use Condition</label>
<!--                                    <select v-model="createForm.condition" class="form-select form-control">
                                        <option value="null" selected disabled> Select Product Condition </option>
                                        <option value="used">Used Condition</option>
                                        <option value="new">New Condition</option>
                                    </select>-->
                                    <v-select  :options="props.conditions" v-model="createForm.condition"
                                                placeholder="~~ Select Use Condition ~~"
                                                label=""
                                                class="form-control"/>
                            </div>
                            <!--                            <div class="col-md-6">
                                                            <Text type="text" v-model="createForm.address" label="Address" placeholder="Address"/>
                                                        </div>-->
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mt-2">
                                <Text type="text" v-model="createForm.price" label="Price" placeholder="Tk 500 only"/>
                            </div>
                            <div class="col-12 col-md-6 mt-2">
                                <Text type="text" v-model="createForm.map" label="Map Location" placeholder="Google map embedded url"/>
                            </div>
                            <div class="col-12 col-md-12">
                                <Textarea label="Short Description" v-model="createForm.short_details" placeholder="Short Description."/>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Company Details</h2>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <label>Job Descriptions</label>
                                <TextEditor v-model="createForm.full_details"/>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Company Details</h2>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <Dropzone v-model="createForm.images"/>
                            </div>
                        </div>
                    </div>
                </div>

                <button v-if="isShow" class="btn btn-outline-primary me-1" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="ms-25 align-middle">Loading...</span>
                </button>
                <button type="submit" v-else class="btn btn-primary me-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                    Discard
                </button>
            </div>
        </form>

    </section>

</template>

<script setup>
import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3'
import axios from 'axios';
import Icon from '@/components/Icon';
import Text from '@/components/form/Text';
import Image from '@/components/form/Image';
import Textarea from '@/components/form/Textarea';
import TextEditor from '@/components/TextEditor';
import Radio from '@/components/form/Radio.vue';
import Video from '@/components/form/Video';
import BusinessCard from '@/components/modules/BusinessCard';
import Datepicker from 'vue3-datepicker'
import Switch from "../../../components/form/Switch2";
import InputTag from "../../../components/form/InputTag";
import Dropzone from "../../../components/Dropzone.vue";

let props = defineProps({
    categories: Object,
    divisions:Array|[],
    url: String,
    subbycat_url: String,
    childbysubcat_url: String,
    create_url:String,
    countries:[],
    errors:Object,

    conditions:[]
});


let createForm = useForm({
    title: null,
    category_id: null,
    sub_category_id: null,
    child_category_id: null,
    division_id:null,
    district_id:null,
    upozila_id:null,
    condition:null,
    price:null,
    map:null,
    address:null,
    short_details:null,
    full_details:null,
    images:[]
});

const sub_categories = ref([])
const child_categories = ref([])
const districts = ref([])
const upozilas = ref([])
const isShow = ref(false);

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


let newItem = () =>{
    createForm.post(props.create_url, {
        onStart:()=>{
            isShow.value = true;
        },
        onSuccess: () =>{
            isShow.value = false;
            createForm.reset();
            $sToast.fire({
                icon: 'success',
                text: 'Job Created Successfully Done.... 🙂'
            });
        },
        onError: () =>{
            isShow.value = false;
            $sToast.fire({
                icon: 'error',
                text: 'Have An Error. Try Again Later...... 🙂'
            })
        }
    });
}


const changeDivision = (e) =>{
    axios.get('/panel/admin/district-by-division-id/'+e)
        .then(res => {
            districts.value = res.data
            upozilas.value = []
            createForm.district_id = null
        })
        .catch(error => {
            console.log(error)
        });
}

const changeDistrict = (e) =>{
    axios.get('/panel/admin/upozila-by-district-id/'+e)
        .then(res => {
            upozilas.value = res.data
            createForm.upozila_id = null
        })
        .catch(error => {
            console.log(error)
        });
}

const updateCondition = () =>{
    event.preventDefault();
    document.getElementById('editItemModal').$vb.modal.show()
}
const conditions = useForm({
    conditions:null,
})
const isLoading = ref(true)
const APP_URL = usePage().props.value.ADMIN_URL;

const updateItem = () =>{
    isLoading.value = false
    createForm.post(APP_URL+"/settings", {
        onSuccess: (res)=>{
            isLoding.value = true
            $sToast.fire({
                icon: "success",
                text: "Business Settings Update Successfully Done.:)",
            });
        },
        onError: (res) =>{
            $sToast.fire({
                icon: "error",
                text: "Business Settings Not Update (:",
            });
        }
    });
}



</script>




<style scopt>
.vs__dropdown-toggle{
    border:none !important;
    /*--vs-selected-color: #eeeeee;*/
    /*--vs-dropdown-option--active-color: #eeeeee;*/

}
.vs--single .vs__selected{
    --vs-dropdown-option--active-color: #000;
}
.vs--multiple .vs__selected{
    color: #fff;
}
.vs__deselect{
    fill: #fff !important;
}

</style>
