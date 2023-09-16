<template>
    <label v-if="label">{{ label }} </label>
    <div class="mb-1">
        <div class="input-group">
            <span class="input-group-text" v-if="prefix">{{ prefix }}</span>
            <input
            v-bind="$attrs"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :placeholder="placeholder"
            class="form-control" />
            <span class="input-group-text" v-if="suffix">{{ suffix }}</span>
        </div>
        <span v-if="error" class="error text-danger">{{ error }}</span>
    </div>
</template>

<script setup>

const props = defineProps({
    modelValue: [String, Number],
    label: {
        type: String,
        default: null
    },
    prefix: {
        type: String,
        default: null
    },
    suffix: {
        type: String,
        default: null
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
</script>
