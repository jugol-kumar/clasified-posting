<template>
    <ckeditor rows="20" :editor="editor" :config="editorConfig"></ckeditor>
</template>

<script setup>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

const editor = ClassicEditor
const editorConfig = {
    ckfinder: {
        // Upload the images to the server using the CKFinder QuickUpload command.
        uploadUrl: '/laravel-filemanager/upload?type=Images'
    },
    toolbar: {
        items: [
            'heading', '|','bold', 'italic', 'strikethrough', 'underline', 'subscript', '|',
            'link', '|','|',
            'bulletedList', 'numberedList', 'todoList', '|',
            'code', 'codeBlock', '|',
            'insertTable', '|','blockQuote', '|',
            'undo', 'redo'
        ],
    }
}
</script>

<style>
.ck-editor__editable {
    min-height: 200px;
}
</style>
