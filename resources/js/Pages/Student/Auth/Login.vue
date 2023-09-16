<template>

    <Head title="Login" />
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
                                        <img src="../../../images/logo.png" />
                                    </Link>

                                    <h4 class="card-title mb-1 text-center">Welcome to Student Login Panel</h4>

                                    <form class="auth-login-form mt-2" @submit.prevent="submit">
                                        <Text v-model="form.username" type="text" label="Email or Phone" :error="form.errors.username" placeholder="Email or phone" />
                                        <Password v-model="form.password" label="Password" :error="form.errors.password" />
                                        <Checkbox v-model="form.remember" label="Remember Me" />
                                        <button class="btn btn-primary w-100" type="submit" :disabled="form.processing">Sign in</button>
                                    </form>
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
export default {
    layout: null,
};
</script>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import Checkbox from '@/components/form/Checkbox'
import Password from '@/components/form/Password'
import Text from '@/components/form/Text'

let props = defineProps({
    url: String,
})

let form = useForm({
    username: '',
    password: '',
    remember: '',
})

let submit = () => {
    form.post(props.url)
}
</script>

<style lang="scss">
@import '../../../../sass/base/pages/authentication.scss'
</style>