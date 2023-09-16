<template>
    <div class="modal fade " :id="id" tabindex="-1" aria-hidden="true">
        <div :class="`modal-dialog modal-${size} modal-dialog-${position} `">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <h4 class="modal-title">{{ title }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    id: {
        type: String
    },
    title: {
        type: String
    },
    size: {
        type: String,
        default: 'md'
    },
    position: {
        type: String,
        default: 'centered'
    },
})
</script>
