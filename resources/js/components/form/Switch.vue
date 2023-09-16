<template>
    <label class="form-check-label mb-50" :for="`customSwitch111${label}`">{{ label }} </label>
    <div class="form-check form-switch form-check-success">
        <input type="checkbox" class="form-check-input" :id="`customSwitch111${label}`" :checked="modelValue" @input="updateValue" role="switch" true-value="1" false-value="false" />
        <label class="form-check-label" :for="`customSwitch111${label}`">
            <span class="switch-icon-left">
                <Icon title="check" />
            </span>
            <span class="switch-icon-right">
                <Icon title="x" />
            </span>
        </label>
    </div>
</template>

<script setup>
import Icon from '../Icon'
const props = defineProps({
    modelValue: Boolean,
    label: {
        type: String,
        default: ''
    },
})

const emit = defineEmits(['update:modelValue'])

const updateValue = (event) => {
    console.log(event.target.value);
    emit('update:modelValue', event.target.value)
}

</script>
