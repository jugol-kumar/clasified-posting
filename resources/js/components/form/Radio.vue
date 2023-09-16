<template>
    <div class="mb-1">
        <label class="form-label">{{ label }}: </label>
        <br>
        <div class="form-check form-check-inline" v-for="(value, key, index) in options" :key="index">
            <input class="form-check-input" :name="name" type="radio" :value="key" @input="updateValue" :id="key" :checked="modelValue === key">
            <label class="form-check-label" :for="key">{{ value }}</label>
        </div>
        <span v-if="error" class="error text-danger">{{ error }}</span>
    </div>
</template>

<script setup>

const props = defineProps({
    modelValue: String,
    options: Object,
    name: String,
    label: {
        type: String,
        default: ''
    },
    error: {
        type: String,
        default: ''
    },
})

const emit = defineEmits(['update:modelValue'])

const updateValue = (event) => {
    emit('update:modelValue', event.target.value)
}

</script>
