
<template>
    <div class="d-md-flex">
        <div class="mb-3 mb-md-0">
            <!-- Img -->
            <div class="avatar avatar-xl">
                <img :src="`${this.$page.props.MAIN_URL}/storage/${job.job.company.photos[0].filename}`" alt="Laravel UI - Bootstrap 5 Template" class="icon-shape border rounded-circle">
            </div>
        </div>
        <!-- text -->
        <div class="ms-md-3 w-100 mt-3 mt-xl-1">
            <div class="d-flex justify-content-between mb-5">
                <div>
                    <!-- heading -->
                    <h3 class="mb-1 fs-4">
                        <div class="mb-1">
                            <a href="javascript:void(0)" class="text-inherit">
                                <strong>   {{ job.job.title }} ({{ job.job.types }} / {{ job.job.label }})</strong>
                            </a>
                            <Popper content="Published 🍿">
                                 <span class="badge bg-light-success text-success ms-1"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title=""
                                       data-bs-original-title="Published">
                                    <vue-feather type='check-circle'/>
                                </span>
                            </Popper>

                            <Popper content="Featured 🍿">
                                <span class="badge bg-light-danger text-danger ms-1"
                                      data-bs-toggle="tooltip"
                                      data-bs-placement="top"
                                      title=""
                                      data-bs-original-title="Featured">
                                    <vue-feather type='award'/>
                                </span>
                            </Popper>
                        </div>

                        <span class="d-flex align-items-baseline">
                            <vue-feather type="globe" size="15"/>
                            <a :href="job.job.company.website" class="text-underline ms-1" target="_blank">{{ job.job.company.website }}</a>
                        </span>
                    </h3>
                    <div>
                        <span>
                            <vue-feather type="user-check" size="15"/>
                            <a href="#" class="ms-1">{{ job.job.creator.name }}</a>
                        </span>
                        <!-- star -->
                        <span class="text-dark ms-2 fw-medium">4.5
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill text-warning align-baseline" viewBox="0 0 16 16">
                              <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                            </svg>
                        </span>
                        <span class="ms-0">(131 Reviews)</span>
                    </div>
                    <div class="mt-1">
                        <vue-feather type='code' size="15" class="me-1"/>
                        <span class="badge bg-primary" style="margin-right: 3px;" v-for="skill in JSON.parse(job.job.skills)">
                            {{ skill }}
                        </span>
                    </div>
                    <!--                                                <div class="mt-1">
                                                                        <vue-feather type='hash' size="15" class="me-1"/>
                                                                        <span class="badge bg-primary" style="margin-right: 3px;" v-for="skill in JSON.parse(job.job.tags)">
                                                                            {{ skill }}
                                                                        </span>
                                                                    </div>-->
                </div>
                <div>
                    <!-- actions -->

                    <div class="btn-group dropup dropdown-icon-wrapper">
                        <div type="button"
                             class="dropdown-toggle dropdown-toggle-split waves-effect waves-float waves-light"
                             data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        </div>
                        <div class="dropdown-menu dropdown-menu-start">
                            <span class="dropdown-item"
                                  @click="showJob(job.job.id)">
                                <Icon title="eye"/>
                               <span class="ms-1">Show</span>
                            </span>
                            <span class="dropdown-item"
                                  @click="editJob(job.job.id)">
                                <Icon title="pencil"/>
                                <span class="ms-1">Edit</span>
                            </span>
                            <span class="dropdown-item"
                                @click="deleteJob(job.job.id)">
                                <Icon title="trash"/>
                               <span class="ms-1">Delete</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-md-flex justify-content-between ">
                <div class="mb-2 mb-md-0">
                    <!-- year -->
                    <span class="me-2">
                        <vue-feather type='briefcase' size="15"/>
                        <span class="ms-1 ">{{ job.job.min_experience }} - {{ job.job.max_experience}} {{ job.job.experience_type }}</span>
                    </span>
                    <!-- salary -->

                    <span class="me-2">
                        <vue-feather type='dollar-sign' size="15"/>
                        <span class="ms-1 ">{{ stringSalary(job.job.min_salary) }} - {{ stringSalary(job.job.max_salary) }}</span>
                    </span>
                    <!-- location -->
                    <span class="me-2">
                        <vue-feather type='map-pin' size="15"/>
                        <span class="ms-1 ">{{ job.job.location }}</span>
                    </span>
                </div>
                <!-- time -->
                <div>
                    <i class="fe fe-clock text-muted"></i> <span>{{ job.job.formated_date }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Icon from '../Icon'
import Popper from "vue3-popper";

let props = defineProps({
    job:{
        type:Object,
        default:null,
        required:true
    }
})

const emit = defineEmits(['showJob', 'deleteJob'])
const showJob = (id) => {
    emit('showJob', id)
}

const deleteJob= (id) => {
    emit('deleteJob', id)
}

const editJob= (id) => {
    emit('editJob', id, true)
}


let stringSalary = (value) =>{
    let suffixes = ["", "k", "m", "b", "t"];
    let suffixNum = Math.floor(("" + value).length / 3);
    let shortValue = parseFloat((suffixNum !== 0 ? (value / Math.pow(1000, suffixNum)) : value).toPrecision(2));
    if (shortValue % 1 !== 0) {
        shortValue = shortValue.toFixed(1);
    }
    return shortValue+suffixes[suffixNum];
}


</script>

<style scoped>

</style>
