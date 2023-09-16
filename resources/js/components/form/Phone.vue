<template>
    <label>{{ label }}: </label>
    <div class="input-group input-group-merge">
        <span class="input-group-text">BD (+88)</span>
        <input v-bind="$attrs" :value="modelValue" @input="updateValue" :placeholder="placeholder" class="form-control phone-number-mask">
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
    placeholder: {
        type: String,
        default: '123 456 7890'
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
