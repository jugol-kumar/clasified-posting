<template>
    <label>{{ label }}: </label>
    <div class="mb-1">
        <ckeditor :value="modelValue" @input="updateValue" :editor="editor" :config="editorConfig"></ckeditor>
        <span v-if="error" class="error text-danger">{{ error }}</span>
    </div>
</template>

<script setup>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

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
const editor = ClassicEditor
const editorConfig = {
    ckfinder: {
        uploadUrl: '/laravel-filemanager/upload?type=Images'
    }
}
const updateValue = (event) => {
    emit('update:modelValue', event.target.value)
}

</script>
