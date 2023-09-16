<template>
    <div class="d-flex justify-content-between mx-0 row my-1 pt-1">
        <div class="col-sm-12 col-md-6">
            <div class="text-shadow">
                Showing {{ from }} to {{ to }} of {{ total }} entries</div>
        </div>
        <div class="col-sm-12 col-md-6">
            <ul class="pagination flex justify-content-end">
                <li
                class="paginate_button page-item"
                v-for="link in links"
                :class="{ 'active' : link.active }"
                >
                    <Link :href="link.url" class="page-link" v-html="link.label" />
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    links: {
        type: Array
    },
    from: {
        type: Number,
        default: 0
    },
    to: {
        type: Number,
        default: 0
    },
    total: {
        type: Number,
        default: 0
    },
})
</script>