<template>
    <div class="mb-1">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" :value="modelValue" @input="updateValue" :id="label" tabindex="3" />
            <label class="form-check-label" :for="label"> {{ label }} </label>
        </div>
    </div>
</template>

<script setup>

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

</script>