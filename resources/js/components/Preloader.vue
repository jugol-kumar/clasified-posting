<template>
    <transition name="fade">
        <div class="preloader">
            <div class="logo">
                <img src="../../../public/images/loading.svg" alt="">
            </div>
            <p>Please Wait...!</p>
        </div>
    </transition>
</template>

<script setup>
    let props = defineProps({
        backgroundColor:{
            type:String,
            default: "#fff"
        }
    })
    const colorFromScriptSetup = 'green'

</script>

<style scoped>
    .preloader{
        background: v-bind('props.backgroundColor');
    }
</style>
