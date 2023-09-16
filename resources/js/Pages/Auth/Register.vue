<template>

    <Head title="Signup"/>
    <div class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static">
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="auth-wrapper auth-basic px-2">
                        <div class="auth-inner my-2">
                            <!-- Login basic -->
                            <div class="card mb-0">
                                <div class="card-body">
                                    <Link href="/" class="brand-logo">
                                        <img :src="$page.props.logo"/>
                                    </Link>
                                    <h2 class="text-center">Register</h2>
                                    <form class="auth-login-form mt-2" @submit.prevent="submit">
                                        <Text v-model="form.name" type="text" label="Name" :error="form.errors.name"
                                              placeholder="Your name"/>
                                        <Text v-model="form.phone" type="text" label="Phone" :error="form.errors.phone"
                                              placeholder="Your phone number"/>
                                        <Text v-model="form.email" type="email" label="Email" :error="form.errors.name"
                                              placeholder="Your email address"/>
                                        <Password v-model="form.password" label="Password"
                                                  :error="form.errors.password"/>
                                        <Password v-model="form.confirm_password" label="Confirm Password"
                                                  :error="form.errors.confirm_password"/>
                                        <button class="btn btn-primary w-100" type="submit" :disabled="form.processing">
                                            Sign up
                                        </button>
                                    </form>
                                    <p class="text-center mt-2">
                                        <span>Already registered?</span>
                                        <Link href="/login">
                                            <span> Login here</span>
                                        </Link>
                                    </p>
                                </div>
                            </div>
                            <!-- /Login basic -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Image from "../../components/form/Image";

    export default {
        components: {Image},
        layout: null,
    };
    </script>

    <script setup>
    import {useForm} from '@inertiajs/inertia-vue3'
    import Checkbox from '@/components/form/Checkbox'
    import Password from '@/components/form/Password'
    import Text from '@/components/form/Text'

    let props = defineProps({
        url: String,
    })

    let form = useForm({
        name: '',
        phone: '',
        email: '',
        password: '',
        confirm_password: '',
        terms: '',
        certificate: '',
    })

    let submit = () => {
        form.post('register/account')
    }
</script>

<style lang="scss">
@import '../../../sass/base/pages/authentication.scss';
</style>
