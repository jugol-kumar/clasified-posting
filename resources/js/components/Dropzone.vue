<template>
    <label @dragenter.prevent="toggleActive"
           @dragleave.prevent="toggleActive"
           @dragover.prevent
           @drop.prevent="dropFile"
           class="w-100 dropzone"
           :class="{'active-dropzone' : isActive, 'd-flex align-items-center justify-content-center flex-column' : !files.length}"
    >
        <div class="imagePreview" v-if="files.length">
            <div class="imageItem position-relative" v-for="item in files" :key="item">
                <img :src="item.path" alt="">

                <div class="position-absolute removeImage" @click="removeImage(item, event)">
                    <vue-feather type="x" size="12"/>
                </div>

            </div>
        </div>

        <div v-else class="d-flex flex-column align-items-center">
            <p>Drag and Drop File</p>
            <p>Or</p>
            <label for="uploadFile" class="upload-button">Select File</label>
        </div>
        <input type="file" @input="updateValue" multiple id="uploadFile" accept="image/*">

    </label>
</template>

<script setup>
import {ref} from "vue"

const isActive = ref(false)
const toggleActive = () => isActive.value = !isActive.value;

const files = ref([])
const emit = defineEmits(['update:modelValue'])

emit('update:modelValue', files.value)
const dropFile = (event) =>{
    isActive.value = !isActive.value;
    let file = event.dataTransfer.files[0];
    files.value.push({file: file, path: URL.createObjectURL(file)})
}

const updateValue = (event) => {
    let file = event.target.files[0]
    files.value.push({file: file, path: URL.createObjectURL(file)})
    console.log(event)
}

const removeImage = (item)=>{
    event.preventDefault();
    const index = files.value.indexOf(item);
    if (index > -1) {
        files.value.splice(index, 1);
    }
}

</script>




<style scoped>
.dropzone{
    height: 300px;
    border: 3px dashed var(--bs-primary);
    transition: 0.3s all ease;
    overflow-x: auto;
}
.active-dropzone{
    background: #d7d3ff;
    border: 3px dashed var(--bs-primary);
}
.dropzone input{
    display:none;
}

label{
    cursor:pointer;
}

.upload-button{
    background:var(--bs-primary);
    color:white;
    padding: 1rem 3rem;
    border-radius: 5px;
}

.imagePreview{
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(100px, 2fr));
    gap: 10px;
    padding: 10px;
}
.imagePreview img{
    width: 100%;
    height: 100%;
}

.dropzone::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.imagePreview {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
.removeImage{
    right: -6px;
    top: -10px;
    background: red;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 50%;
    padding:5px;
    cursor:pointer;
}
</style>
