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
                    <li class="nav-item me-auto"><Link preserve-scroll class="navbar-brand"
                            href="#">
                            <span class="brand-logo">
                                <img src="../../images/logo.png" alt="">
                            </span>
                            <h2 class="brand-text">{{ this.$page.props.appName }}</h2>
                        </Link></li>
                    <li class="nav-item nav-toggle">
                        <Link preserve-scroll class="nav-link modern-nav-toggle">
                            <Icon title="x" width="24" height="24" @click="toggleVerticalMenuActive" class="d-block d-xl-none" />
                            <Icon :title="collapseTogglerIconFeather" width="24" height="24" @click="toggleCollapsed" class="d-none d-xl-block collapse-toggle-icon" />
                        </Link>
                    </li>
                </ul>
            </slot>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content scroll-area">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/dashboard">
                        <Icon title="home" width="24" height="24" />
                        <span class="menu-title text-truncate">Dashboard</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/courses">
                        <Icon title="book" width="24" height="24" />
                        <span class="menu-title text-truncate">My Courses</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/wishlists">
                        <Icon title="heart" width="24" height="24" />
                        <span class="menu-title text-truncate">Wishlist</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/purchase">
                        <Icon title="dollar-sign" width="24" height="24" />
                        <span class="menu-title text-truncate">Purchase History</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link preserve-scroll class="d-flex align-items-center" href="/apply">
                        <Icon title="user-plus" width="24" height="24" />
                        <span class="menu-title text-truncate">Become an Instructor</span>
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useStore } from 'vuex'
import Icon from '@/components/Icon';

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