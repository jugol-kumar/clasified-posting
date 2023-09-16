<template>
    <div class="main-menu menu-fixed menu-accordion menu-shadow"
    :class="[
      { 'expanded': !isVerticalMenuCollapsed || (isVerticalMenuCollapsed && isMouseHovered) },
      themeSkin === 'light'|| themeSkin === 'bordered' ? 'menu-light' : 'menu-dark'
    ]"
    @mouseenter="updateMouseHovered(true)"
    @mouseleave="updateMouseHovered(false)"
    >
        <div class="navbar-header expanded">
            <slot
                name="header"
                :toggleVerticalMenuActive="toggleVerticalMenuActive"
                :toggleCollapsed="toggleCollapsed"
                :collapseTogglerIcon="collapseTogglerIcon"
            >
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto">
                        <Link preserve-scroll class="navbar-brand"
                            href="#">
                            <span class="brand-logo"></span>
<!--                            <h2 class="brand-text">{{ this.$page.props.appName }}</h2>-->
                        <img :src="this.$page.props.logo" alt="logo" style="max-width: 120px; min-width: 120px;">
                        </Link>
                    </li>
                    <li class="nav-item nav-toggle">
                        <Link preserve-scroll class="nav-link modern-nav-toggle">
                            <Icon title="x" width="24" height="24" @click="toggleVerticalMenuActive" class="d-block d-xl-none" />
                            <Icon :title="collapseTogglerIconFeather"
                                  width="24" height="24"
                                  @click="toggleCollapsed" class="d-none d-xl-block collapse-toggle-icon" />
                        </Link>
                    </li>
                </ul>
            </slot>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item" v-if="this.$page.props.auth.user.role === 'instructor'">
                    <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/dashboard`">
                        <span class="menu-title text-truncate">Dashboard</span>
                    </Link>
                </li>

                <li class="nav-item" v-if="this.$page.props.auth.user.role === 'admin'">
                    <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/dashboard`">
                        <vue-feather type="home" />
                        <span class="menu-title text-truncate">Dashboard</span>
                    </Link>
                </li>


<!--                job tools -->
                <li class="nav-item has-sub" :class="{'open' : clickMenu === 'Courses'}"  @click="toggleSubMenu('Courses')">
                    <Link preserve-scroll class="d-flex align-items-center" href="#">
                        <vue-feather type="cloud-lightning" />
                        <span class="menu-title text-truncate">Post Tools</span>
                    </Link>

                    <ul class="menu-content">
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/category`">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Categories</span>
                            </Link>
                        </li>
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/sub-category`">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Sub Categories</span>
                            </Link>
                        </li>
                        <!--
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/questions">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-title text-truncate">Questions</span>
                            </Link>
                        </li>
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/courses">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-title text-truncate">Courses</span>
                            </Link>
                        </li>
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/mocktests">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-title text-truncate">Mocktests</span>
                            </Link>
                        </li>
                        -->
                    </ul>
                </li>

<!--                job creators tools-->
<!--
                <li class="nav-item has-sub" :class="{'open' : clickMenu === 'creators'}"  @click="toggleSubMenu('creators')">
                    <Link preserve-scroll class="d-flex align-items-center" href="#">
                        <vue-feather type="rss" />
                        <span class="menu-title text-truncate">Creators</span>
                    </Link>

                    <ul class="menu-content">
                        <li @click="toggleSubMenu('creators')">
                            <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/companies`">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Companies</span>
                            </Link>
                        </li>
                        <li @click="toggleSubMenu('creators')">
                            <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/sub_categories`">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Seekers</span>
                            </Link>
                        </li>
                        <li @click="toggleSubMenu('creators')">
                            <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/child_categories`">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Recruiters</span>
                            </Link>
                        </li>
                        &lt;!&ndash;
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/questions">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-title text-truncate">Questions</span>
                            </Link>
                        </li>
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/courses">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-title text-truncate">Courses</span>
                            </Link>
                        </li>
                        <li @click="toggleSubMenu('Courses')">
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/mocktests">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-title text-truncate">Mocktests</span>
                            </Link>
                        </li>
                        &ndash;&gt;
                    </ul>
                </li>
-->

                <li class="nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/posts`">
                        <vue-feather type="layers"/>
                        <span class="menu-title text-truncate">Posts</span>
                    </Link>
                </li>


<!--
                <li class=" nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/panel/transactions">
                        <Icon title="dollar-sign" width="24" height="24" />
                        <span class="menu-title text-truncate">Transactions</span>
                    </Link>
                </li>
                <li class=" nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/panel/meetings">
                        <Icon title="dollar-sign" width="24" height="24" />
                        <span class="menu-title text-truncate">Meetings</span>
                    </Link>
                </li>
                <li class=" nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/panel/reports">
                        <Icon title="bar-chart" width="24" height="24" />
                        <span class="menu-title text-truncate">Reports</span>
                    </Link>
                </li>
                <li v-if="this.$page.props.auth.user.role == 'admin'" class="nav-item has-sub" :class="{'open' : clickMenu === 'Authentication'}"  @click="toggleSubMenu('Authentication')">
                    <Link preserve-scroll class="d-flex align-items-center">
                        <Icon title="user-check" />
                        <span class="menu-title text-truncate">Authentication</span>
                    </Link>
                    <ul class="menu-content">
                        <li>
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/students">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Job Seekers</span>
                            </Link>
                        </li>
                        <li>
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/instructors">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Recruiters</span>
                            </Link>
                        </li>
                        <li>
                            <Link preserve-scroll class="d-flex align-items-center" href="/panel/admins">
                                <Icon title="circle" width="24" height="24" />
                                <span class="menu-item text-truncate">Admin</span>
                            </Link>
                        </li>
                    </ul>
                </li>
-->

                <li class="nav-item" v-if="this.$page.props.auth.user.role === 'admin'">
                    <Link preserve-scroll class="d-flex align-items-center" :href="`${this.$page.props.ADMIN_URL}/settings`">
                        <vue-feather type="settings" />
                        <span class="menu-title text-truncate">Settings</span>
                    </Link>
                </li>


            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useStore } from 'vuex'
import Icon from '../components/Icon';
import FeatherIcon from "../components/FeatherIcon";
const props = defineProps({
  isVerticalMenuActive: {
      type: Boolean,
      required: true,
    },
    toggleVerticalMenuActive: {
      type: Function,
      required: true,
    },
})
const isMouseHovered = ref(false)
const openClass = ref('')
const clickMenu = ref('')
const store = useStore()

const themeSkin = computed(() => store.state.skin)
const isVerticalMenuCollapsed = computed(() => store.state.isVerticalMenuCollapsed)

const collapseTogglerIconFeather = computed(() => (collapseTogglerIcon.value === 'unpinned' ? 'circle' : 'disc'))

onMounted(() => store.commit('UDATE_SKIN', themeSkin.value))

const collapseTogglerIcon = computed(() => {
    if (props.isVerticalMenuActive) {
      return isVerticalMenuCollapsed.value ? 'unpinned' : 'pinned'
    }
    return 'close'
  })

  const toggleCollapsed = () => {
      store.commit('UPDATE_MENU_COLLAPSED', !isVerticalMenuCollapsed.value)
  }

  const toggleSubMenu = (val) => {
      openClass.value = openClass.value ? '' : 'open'
      clickMenu.value = clickMenu.value === val ? '' : val
  }



  const updateMouseHovered = val => {
    isMouseHovered.value = val
  }
</script>
