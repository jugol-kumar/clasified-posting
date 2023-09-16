
<!--<template>-->
<!--    <v-select v-model="selected" :dir="'ltr'" multiple label="title" :options="option"/>-->
<!--</template>-->

<!--<script>-->
<!--import vSelect from 'vue-select'-->

<!--export default {-->
<!--    components: {-->
<!--        vSelect,-->
<!--    },-->
<!--    data() {-->
<!--        return {-->
<!--            dir: 'ltr',-->
<!--            selected: [-->
<!--                { title: 'Square' },-->
<!--                { title: 'Romboid' },-->
<!--            ],-->
<!--            option:[-->
<!--                {title:'one'}, {title:'tow'}, {title:'three'}, {title: 'Square'}, {title:'Romboid'}-->
<!--            ]-->
<!--        }-->
<!--    },-->
<!--}-->
<!--</script>-->


<!--                <div class="form-group">
                    <label for="categor_yoption"> Categories </label>
                    <select name="" id="categor_yoption">
                        <option value="">~~ select category ~~</option>
                        <optgroup v-for="category in categories" :label="category.name">
                            <option v-for="option in category.children_categories" :value="option.id">
                                {{ option.name }}
                                <span class="badge badge-light-primary" v-for="osub in option.">{{ osub.name }}</span>
                            </option>
                        </optgroup>
                    </select>
                </div>-->



<template>
    <label>{{ title }} </label>
    <div class="mb-1">
        <v-select
                 v-model="selectoptoin"
                  :dir="direction"
                  :multiple="multiple"
                  :label="option"
                  :options="allOptions"
                  :placeholder="placeholder"/>
        <span v-if="error" class="error">{{ error }}</span>
    </div>
</template>

<script setup>

let allOptions = props.options
//
// const form = createFrom({
//     selectoptoin
// })

const props = defineProps({
    modelValue: String,
    title: {
        type: String,
        default: ''
    },
    options:{
        type:Array,
        default:[
            {title:'one'},
        ],
    },
    option: {
        type: String,
        default: 'title'
    },
    placeholder: {
        type: String,
        default: '~~ Select Something ~~'
    },
    error: {
        type: String,
        default: ''
    },
    direction: {
        type: String,
        default: 'ltr'
    },
    multiple: {
        type: Boolean,
        default: false
    }
})

// const emit = defineEmits(['update:modelValue'])
//
const updateValue = (event) => {
    alert("ok");
    console.log(event.target)
    // emit('update:modelValue', event.target.value)
}

</script>
<style scoped>
>>> {
    --vs-controls-color: #7367f0;
    --vs-border-color: #d8d6de;

    --vs-dropdown-bg: #fff;
    --vs-dropdown-color: #6e6b7b;
    --vs-dropdown-option-color: #6e6b7b;

    --vs-selected-bg: #7367f0;
    --vs-selected-color: #6e6b7b;

    --vs-search-input-color: #6e6b7b;

    --vs-dropdown-option--active-bg: #7367f0;
    --vs-dropdown-option--active-color: #fff;
}
</style>
