<template>
    <div class="card card-bordered border-1 mb-4 card-hover">
        <div class="card-body">
            <div>
                <div class="d-md-flex">
                    <div class="mb-3 mb-md-0">
                        <!-- Img -->
                        <img :src="props.about.logo" alt="Laravel Bootstrap 5 Template" class="icon-shape border rounded-circle" width="50" height="50">
                    </div>
                    <!-- text -->
                    <div class="ms-md-3  w-100 mt-3 mt-xl-1">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <h3 class="mb-1 fs-4">
                                    <a href="javascript:void(0)" class="text-inherit">{{ props.about.name }}</a>
                                </h3>
                                <div class="d-flex flex-column">
                                    <div>
                                        <vue-feather type="at-sign" size="14"/>
                                        <span class="ms-1">{{ props.about.email }}</span>
                                    </div>
                                    <div>
                                        <vue-feather type="phone-call" size="14"/>
                                        <span class="ms-1">{{ props.about.phone }}</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="btn-group dropup dropdown-icon-wrapper">
                                    <div type="button"
                                            class="dropdown-toggle dropdown-toggle-split waves-effect waves-float waves-light"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    </div>


                                    <div class="dropdown-menu dropdown-menu-start">
                                    <span class="dropdown-item"
                                         @click="showCompany(props.about.id)">
                                        <Icon title="eye"/>
                                       <span class="ms-1">Show</span>
                                    </span>
                                   <span class="dropdown-item"
                                         @click="editCompany(props.about.id)">
                                        <Icon title="pencil"/>
                                        <span class="ms-1">Edit</span>
                                    </span>
                                   <span class="dropdown-item"
                                         @click="deleteCompany(props.about.id)">
                                        <Icon title="trash"/>
                                       <span class="ms-1">Delete</span>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-md-flex justify-content-between ">
                            <div class="mb-2 mb-lg-0">
                                <!-- year -->
                                <span class="me-2">
                                    <vue-feather type="users" size="18"/>
                                    <span class="ms-1 ">{{ props.about.employee_size }}</span>
                                </span>
                                <!-- location -->
                                <span class="me-2">
                                    <vue-feather type="map-pin" size="18"/>
                                    <span class="ms-1 ">{{ props.about.address }}</span>
                                </span>
                                <!-- city -->
                                <span class="me-2">
                                    <vue-feather type="map" size="18"/>
                                    <span class="ms-1 ">{{ props.about.city.name }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Icon from '../Icon'

    let props = defineProps({
        about:{
            type:Object,
            default:null,
            required:true
        }
    })

const emit = defineEmits(['showCompany', 'deleteCompany'])
const showCompany = (id) => {
    emit('showCompany', id)
}

const deleteCompany= (id) => {
    emit('deleteCompany', id)
}

const editCompany= (id) => {
    emit('editCompany', id, true)
}


</script>

<style scoped>

</style>
