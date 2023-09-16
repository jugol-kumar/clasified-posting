
<script setup>
    const props = defineProps({
       title:{
           type:String,
           required:true,
       },
       id:{
           type:String,
           required: true
       },
       place:{
           type:String,
           default:"end"
       }
    });

</script>

<template>



    <div class="offcanvas" :class="`offcanvas-${props.place}`" tabindex="-1" :id="props.id" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ props.title }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <slot/>
        </div>
    </div>

<!--    <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title">
                        <span class="align-middle">{{ props.title }}</span>
                    </h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <slot/>
                </div>
            </div>
        </div>
    </div>-->
</template>

