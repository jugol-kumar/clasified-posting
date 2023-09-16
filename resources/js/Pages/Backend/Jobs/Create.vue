<template>
    <label>Multi Select</label>

    <vue-taggable-select
        :taggable="true" v-model="sport"
        @inputTags="selectTags"
        :options="['baseball','football','basketball','hocke']">

    </vue-taggable-select>

</template>

<script setup>
import VueTaggableSelect from "../../../components/form/InputTag";
import {useForm} from "@inertiajs/inertia-vue3";

    let createForm = useForm({
        tags:[],
    });
    let selectTags = (event) =>{
        createForm.tags = event
    };
</script>

<style>
#app {
    font-family: "Avenir", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
}
</style>
