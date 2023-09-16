<template>
        <!-- User info -->
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Bg -->
                <div class="pt-16 rounded-top-md background"></div>
                <div class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
                    <div class="d-flex align-items-center">
                        <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                            <img src="../../../../public/frontend/assets/images/avatar/avatar-1.jpg" class="avatar-xl rounded-circle border border-4 border-white position-relative"
                            alt="" />
                            <a href="#" class="position-absolute top-0 end-0" data-bs-toggle="tooltip" data-placement="top"
                               title="Verified">
                                <img src="../../../../public/frontend/assets/images/svg/checked-mark.svg" alt="" height="30" width="30" />
                            </a>
                        </div>
                        <div class="lh-1">
                            <h2 class="mb-0">Jenny Wilson</h2>
                            <p class="mb-0 d-block">@Jennywilson</p>
                        </div>
                    </div>
                    <div>
                        <a href="add-course.html" class="btn btn-primary btn-sm d-none d-md-block">Create New Course</a>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "Profile"
}
</script>

<style scoped>

.background{
    background: url("http://127.0.0.1:8000/frontend/assets/images/background/profile-bg.jpg") !important;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-size: cover !important;
}

</style>
