<template>
    <label>{{ label }} </label>
    <div class="mb-1">
    <textarea :value="modelValue" @input="updateValue" :placeholder="placeholder" class="form-control" :rows="rows"></textarea>
    <span v-if="error" class="error text-danger">{{ error }}</span>
    </div>
</template>

<script setup>

const props = defineProps({
    modelValue: String,
    label: {
        type: String,
        default: ''
    },
    rows: {
        type: Number,
        default: 3
    },
    placeholder: {
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
