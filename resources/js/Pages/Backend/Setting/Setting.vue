<template>
    <Head title="Dashboard" />
    <section class="app-dashboard">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="card card-statistics">
                    <div class="card-header">
                        <vue-notification-list></vue-notification-list>
                        <h4 class="card-title">Settings</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <Link class="nav-link active"
                                          id="v-pills-home-tab"
                                          data-bs-toggle="pill"
                                          data-bs-target="#v-pills-home"
                                          type="button" role="tab"
                                          aria-controls="v-pills-home"
                                          aria-selected="true">Frontend Setting</Link>

                                    <button class="nav-link" id="v-pills-profile-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile"
                                            type="button" role="tab"
                                            aria-controls="v-pills-profile"
                                            aria-selected="false">Profile</button>
                                    <button class="nav-link" id="v-pills-socials-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#v-pills-socials"
                                            type="button" role="tab"
                                            aria-controls="v-pills-socials"
                                            aria-selected="false">Social Links</button>

                                    <button class="nav-link"
                                            id="v-pills-messages-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#v-pills-messages"
                                            type="button"
                                            role="tab"
                                            aria-controls="v-pills-messages"
                                            aria-selected="false">Home details</button>
                                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="card">
                                            <h2>Frontend Setup</h2>
                                            <div class="card-body">
                                                <form class="form form-vertical" @submit.prevent="updateBuisnessSetting()">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <Text v-model="createForm.name" label="App Name" placeholder="App Name" />
                                                        </div>
                                                        <div class="col-6">
                                                            <Image v-model="createForm.header_logo" :showFile="props.bSettings.header_logo" label="Header Logo"/>
                                                        </div>
                                                        <div class="col-6">
                                                            <Image v-model="createForm.footer_logo"  :showFile="props.bSettings.footer_logo" label="Footer Logo"/>
                                                        </div>
                                                        <div class="col-12">
                                                            <Textarea v-model="createForm.app_details" label="App About" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Select Timezone</label>
                                                            <v-select
                                                                v-model="createForm.timezone"
                                                                dir="ltr"
                                                                label="tz"
                                                                class="form-control"
                                                                :options="options"
                                                                placeholder="~~ Select Timezone ~~"/>
                                                        </div>
                                                        <div class="col-12 mt-2 d-inline-flex align-item-center">
                                                            <button v-if="!isLoding" type="submit" disabled class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                <div class="spinner-border text-white me-1"  role="status"></div>
                                                                <span>Submit</span>
                                                            </button>
                                                            <button v-else class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                Submit
                                                            </button>


                                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <div class="card">
                                            <h2>App Profile</h2>
                                            <div class="card-body">
                                                <form class="form form-vertical" @submit.prevent="updateBuisnessSetting()">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.address" label="App Address" placeholder="App Address" />
                                                        </div>

                                                        <div class="col-12">
                                                            <Text type="email" v-model="createForm.email" label="App Email" placeholder="example@yourdomain.com" />
                                                        </div>

                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.phone" label="App Number" placeholder="+8801*-******" />
                                                        </div>

                                                        <div class="col-12 mt-2 d-inline-flex align-item-center">
                                                            <button v-if="!isLoding" type="submit" disabled class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                <div class="spinner-border text-white me-1"  role="status"></div>
                                                                <span>Submit</span>
                                                            </button>
                                                            <button v-else class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                Submit
                                                            </button>


                                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-socials" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <div class="card">
                                            <h2>App Profile</h2>
                                            <div class="card-body">
                                                <form class="form form-vertical" @submit.prevent="updateBuisnessSetting()">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.facebook_profile" label="Facebook" placeholder="fb.com/me" />
                                                        </div>

                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.google_drive" label="Google Drive" placeholder="drive.google.com/me" />
                                                        </div>

                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.youtube" label="Youtube" placeholder="chanel.youtube.com/my-changel" />
                                                        </div>


                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.linkedin_profile" label="Linkedin" placeholder="linkedin.com/me" />
                                                        </div>


                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.twitter_profile" label="Twitter" placeholder="twitter.com/me" />
                                                        </div>

                                                        <div class="col-12">
                                                            <Text type="text" v-model="createForm.instagram_profile" label="Instagram" placeholder="instagram.com/me" />
                                                        </div>


                                                        <div class="col-12 mt-2 d-inline-flex align-item-center">
                                                            <button v-if="!isLoding" type="submit" disabled class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                <div class="spinner-border text-white me-1"  role="status"></div>
                                                                <span>Submit</span>
                                                            </button>
                                                            <button v-else class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                Submit
                                                            </button>


                                                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <h1>Home page content</h1>

                                                <form class="form form-vertical" @submit.prevent="updateBuisnessSetting()">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <TextEditor label="Short Description" v-model="createForm.home_details" placeholder="Short Description."/>
                                                        </div>


                                                        <div class="col-12 mt-2 d-inline-flex align-item-center">
                                                            <button v-if="!isLoding" type="submit" disabled class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                <div class="spinner-border text-white me-1"  role="status"></div>
                                                                <span>Submit</span>
                                                            </button>
                                                            <button v-else class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="form form-vertical" @submit.prevent="updateBuisnessSetting()">
                                                    <div class="mb-1">
                                                    <div class="d-flex align-baseline">
                                                        <label>Parent Category</label> <info title="If you want to add this category as a child then select an parent category"/>
                                                    </div>
                                                    <v-select
                                                        class="form-control"
                                                        multiple
                                                        taggable
                                                        v-model="createForm.conditions"
                                                        :options="props.useConditions"
                                                        placeholder="~~Select Or Input New Hash Tags~~"></v-select>
                                                    <span class="text-danger" v-if="props.errors.conditions">{{ props.errors.conditions }}</span>
                                                </div>

                                                <div class="d-flex flex-wrap mb-0">
                                                    <button v-if="isLoding" type="submit" class="btn btn-primary">Update</button>
                                                    <button v-else class="btn btn-primary" type="button" disabled>
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                        Loading...
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import Text from '@/components/form/Text';
import Image from '@/components/form/Image';
import Textarea from '@/components/form/Textarea';
import TextEditor from '@/components/TextEditor';
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import {ref} from "vue"
import timezons from "../../../Store/timezone";

const APP_URL = usePage().props.value.ADMIN_URL;
let props = defineProps({
    option:[],
    countries:"",
    errors:"",
    bSettings:"",
    useConditions:[]
})
let countries = props.countries;
let options = timezons.timesones;
// let createForm = useForm({
//     name        :  '',
//     header_logo :  '',
//     footer_logo :  '',
//     app_details :  '',
//     timezone    :  '',
//     country     :  '',
// })

let createForm = useForm({
    name        : props.bSettings.name ?? '',
    header_logo : '',
    footer_logo : '',
    app_details : props.bSettings.details ?? '',
    timezone    : props.bSettings.timezone?.tz ?? '',
    country     : props.bSettings.country?.name ?? '',

    address     : props.bSettings.address ?? '',
    email       : props.bSettings.email ?? '',
    phone       : props.bSettings.phone ?? '',

    facebook_profile: props.bSettings.facebook_profile ?? '',
    youtube: props.bSettings.youtube ?? '',
    google_drive: props.bSettings.google_drive ?? '',
    linkedin_profile: props.bSettings.linkedin_profile ?? '',
    twitter_profile: props.bSettings.twitter_profile ?? '',
    instagram_profile: props.bSettings.instagram_profile ?? '',

    home_details: props.bSettings.home_details ?? '',

    conditions:props.bSettings.conditions ?? [],
})

let isLoding = ref({});

let updateBuisnessSetting = () =>{
    isLoding.value = false
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

<style scoped>
.spinner-border{
    --bs-spinner-width: 1.2rem !important;
    --bs-spinner-height: 1.2rem !important;
}
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
