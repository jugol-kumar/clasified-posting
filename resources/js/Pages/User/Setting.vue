<template>

    <Head title="Profile" />
    <section class="app-user-profile">
        <div class="row">
            <div class="col-md-5 order-md-0 order-1">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Zoom API credential</h4>
                    </div>
                    <div class="card-body">
                        <!-- form -->
                        <form @submit.prevent="updateUser">
                            <div class="mb-2">
                                <Text v-model="updateForm.zoom_email" type="email" label="Zoom Email"
                                    placeholder="Your Zoom Email" :error="updateForm.errors.zoom_email" />
                            </div>
                            <div class="mb-2">
                                <Textarea v-model="updateForm.jwt_token" label="Zoom JWT Token"
                                    placeholder="Your zoom jwt token" :error="updateForm.errors.jwt_token" />
                            </div>

                            <button type="submit"
                                class="btn btn-primary w-100 waves-effect waves-float waves-light">Create Key</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7 order-md-1 order-0">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">How to get JWT Token and Email</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-numbered">
                            <li class="list-group-item">
                                <span>First Sign up or Sign in here : <a href="https://marketplace.zoom.us" target="_blank">Zoom Market Place Portal</a></span>
                            </li>
                            <li class="list-group-item">
                                <span>Click on Top right side menu and click on build app : <a href="https://marketplace.zoom.us/develop/create" target="_blank">Create app</a></span>
                            </li>
                            <li class="list-group-item">
                                <span>Choose JWT App and Continue...</span>
                            </li>
                            <li class="list-group-item">
                                <span>After filling details click on credtional tab and bottom you will see <b>JWT Token</b> change token expiry accroding to your setting.</span>
                            </li>
                            <li class="list-group-item">
                                <span>Paste your zoom email account id and JWT token here and create,edit meetings here.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import Text from '@/components/form/Text'
import Textarea from '../../components/form/Textarea'

let props = defineProps({
    user: Object,
})

let updateForm = useForm({
    zoom_email: props.user.zoom_email,
    jwt_token: props.user.jwt_token,
})

let updateUser = () => {
    updateForm.post('', {
        onSuccess: () => console.log('Saved')
    });
}


</script>