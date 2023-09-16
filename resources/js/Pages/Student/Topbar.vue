<template>
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <Link class="nav-link menu-toggle" @click="toggleVerticalMenuActive" href="#">
                        <Icon title="menu" width="24" height="24" />
                        </Link>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block">
                        <div class="bookmark-input search-input">
                            <div class="bookmark-input-icon">
                                <Icon title="search" width="24" height="24" />
                            </div>
                            <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0"
                                data-search="search">
                            <ul class="search-list search-list-bookmark"></ul>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <dark-toggle />
                <!-- <li class="nav-item dropdown dropdown-notification me-25">
                    <Link class="nav-link" href="#" data-bs-toggle="dropdown">
                    <Icon title="bell" width="24" height="24" />
                    <span class="badge rounded-pill bg-danger badge-up">5</span></Link>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                                <div class="badge rounded-pill badge-light-primary">6 New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <Link class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="#" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Congratulation Sam
                                            🎉</span>winner!</p><small class="notification-text"> Won the
                                        monthly best seller badge.</small>
                                </div>
                            </div>
                            </Link>
                            <Link class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="#" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">New
                                            message</span>&nbsp;received</p><small class="notification-text">
                                        You have 10 unread messages</small>
                                </div>
                            </div>
                            </Link>
                            <Link class="d-flex" href="#">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    <p class="media-heading"><span class="fw-bolder">Revised Order </span>&nbsp;checkout
                                    </p><small class="notification-text"> MD Inc.
                                        order updated</small>
                                </div>
                            </div>
                            </Link>
                        </li>
                        <li class="dropdown-menu-footer">
                            <Link class="btn btn-primary w-100" href="#">Read all
                            notifications</Link>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-item dropdown dropdown-user">
                    <Link class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{ this.$page.props.auth.user.username }}</span>
                        <span class="user-status">Student</span>
                    </div>
                    <span class="avatar">
                        <img class="round" :src="this.$page.props.auth.user.photo" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                    </Link>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <Link class="dropdown-item" href="/profile">
                        <Icon title="user" width="24" height="24" /> Profile
                        </Link>
                        <div class="dropdown-divider"></div>
                        <Link href="/logout" method="post" class="dropdown-item w-100" as="button">
                        <Icon title="power" width="24" height="24" /> Log Out
                        </Link>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center">
            <Link href="#">
            <h6 class="section-label mt-75 mb-0">Files</h6>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="#" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="#" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="#" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="#" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                        Designer</small>
                </div>
            </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
            </Link>
        </li>
        <li class="d-flex align-items-center">
            <Link href="#">
            <h6 class="section-label mt-75 mb-0">Members</h6>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="#" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="#" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="#" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            </Link>
        </li>
        <li class="auto-suggestion">
            <Link class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img src="#" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web
                        Designer</small>
                </div>
            </div>
            </Link>
        </li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between">
            <Link class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No
                    results found.</span></div>
            </Link>
        </li>
    </ul>
</template>

<script setup>
import Icon from '@/components/Icon';
import DarkToggle from "@/components/DarkToggle";

const props = defineProps({
    toggleVerticalMenuActive: {
        type: Function,
        required: true,
    },
})
</script>