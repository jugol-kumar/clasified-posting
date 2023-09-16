<template>
    <label>{{ label }}: </label>
    <div class="mb-1">
        <div class="input-group input-group-merge form-password-toggle">
            <input :type="passwordFieldType" :value="modelValue" @input="updateValue"
                class="form-control form-control-merge" />
            <span class="input-group-text">
                <Icon class="cursor-pointer" :title="passwordToggleIcon" @click="togglePasswordVisibility" />
            </span>
        </div>
        <span v-if="error" class="error text-danger">{{ error }}</span>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import Icon from '../Icon';

const props = defineProps({
    modelValue: String,
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

const password = ref("")
const passwordFieldType = ref('password')
const togglePasswordVisibility = () => {
    passwordFieldType.value = passwordFieldType.value === "password" ? "text" : "password"
}
const passwordToggleIcon = computed(() => {
    return passwordFieldType.value === 'password' ? 'eye' : 'eye-off'
})

</script>
