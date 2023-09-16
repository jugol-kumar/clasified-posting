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
                                    <a href="/" class="brand-logo">
                                        <img :src="$page.props.logo"/>
                                    </a>
                                    <h2 class="text-center">Login</h2>
                                    <form class="auth-login-form mt-2" @submit.prevent="submit">
                                        <Text v-model="form.email" type="email" label="Email" :error="form.errors.email" placeholder="mail@example.com" />
                                        <Password v-model="form.password" label="Password" :error="form.errors.password" />
                                        <Checkbox v-model="form.remember" label="Remember Me" />
                                        <button class="btn btn-primary w-100" tabindex="4" type="submit" :disabled="form.processing">Sign in</button>
                                    </form>
<!--                                    <p class="text-center mt-2">-->
<!--                                        <span>New on our platform?</span>-->
<!--                                        <Link href="/register">-->
<!--                                            <span> Create an account</span>-->
<!--                                        </Link>-->
<!--                                    </p>-->
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
import Checkbox from '../../components/form/Checkbox'
import Password from '../../components/form/Password'
import Text from '../../components/form/Text'

let form = useForm({
    email: '',
    password: '',
    remember: '',
})

let submit = () => {
    form.post('')
}
</script>

<style lang="scss">
@import '../../../sass/base/pages/authentication.scss'
</style>
