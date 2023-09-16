<template>
    <Head title="Dashboard"/>
    <section class="app-dashboard">
        <div class="card">
            <div class="card-body border-bottom">
                <h4 class="card-title">Student Dashboard</h4>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ report.total_wishlist_course }}</h3>
                            <span>Wishlists Courses</span>
                        </div>
                        <div class="avatar bg-light-warning p-50">
                            <span class="avatar-content">
                                <Icon title="heart" width="24" height="24"/>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ report.total_courses }}</h3>
                            <span>My Courses</span>
                        </div>
                        <div class="avatar bg-light-primary p-50">
                            <span class="avatar-content">
                                <Icon title="book"  width="24" height="24"/>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ report.total_subscriptions }}</h3>
                            <span>Total Subscriptions</span>
                        </div>
                        <div class="avatar bg-light-success p-50">
                            <span class="avatar-content">
                                <Icon title="dollar-sign"  width="24" height="24"/>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ report.total_transactions }}</h3>
                            <span>Total Perches</span>
                        </div>
                        <div class="avatar bg-light-danger p-50">
                            <span class="avatar-content">
                                <Icon title="trending-up"  width="24" height="24"/>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</template>

<script>
    import SLayout from './Layout'
    import Icon from '../../components/Icon'

    export default {
        components:{
          Icon
        },
        layout: SLayout,
    };
</script>

<script setup>
    let prop = defineProps({
        report: Object,
    })
</script>
