<template>
    <label>{{ label }}: </label>
    <div class="mb-1">
        <input type="file" @input="updateValue" class="form-control" accept="video/*" />
        <span v-if="error" class="error text-danger">{{ error }}</span>
    </div>
</template>

<script setup>

const props = defineProps({
    modelValue: [String, Object],
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
    emit('update:modelValue', event.target.files[0])
}

</script>
