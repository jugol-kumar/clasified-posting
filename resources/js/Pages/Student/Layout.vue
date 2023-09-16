<template>

    <Head>
        <meta type="description" content="Information about my app" head-key="description">
    </Head>
    <div class="vertical-layout h-100 navbar-floating footer-static"
        :class="[layoutClasses]"
        :data-col="isNavMenuHidden ? '1-column' : null">
        <!-- BEGIN: Header-->
        <Topbar :toggleVerticalMenuActive="toggleVerticalMenuActive"/>
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        <Sidebar 
            v-if="!isNavMenuHidden"
            :is-vertical-menu-active="isVerticalMenuActive"
            :toggle-vertical-menu-active="toggleVerticalMenuActive">
            <template #header="slotProps">
                <slot
                name="vertical-menu-header"
                v-bind="slotProps"
                />
            </template>
        </Sidebar>
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <slot />
                </div>
            </div>
        </div>
        <!-- END: Content-->

        <div
            class="sidenav-overlay"
            :class="overlayClasses"
            @click="isVerticalMenuActive = false" ></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light">
            <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy;
                    2021<a class="ms-25" href="#"
                        target="_blank">{{ this.$page.props.appName }}</a><span class="d-none d-sm-inline-block">, All rights
                        Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with</span></p>
        </footer>
        <button class="btn btn-primary btn-icon scroll-top" type="button"></button>
        <!-- END: Footer-->
    </div>
</template>

<script setup>
import { ref, computed, watch, onMounted, onUnmounted } from 'vue'
import { useStore } from 'vuex'
import Topbar from './Topbar'
import Sidebar from './Sidebar'

const store = useStore()
const isNavMenuHidden = computed(() => store.state.menuHidden)
const isVerticalMenuActive = computed(() => store.state.isVerticalMenuActive)

const toggleVerticalMenuActive = () => {
      store.commit('UPDATE_MENU_HIDDEN', !isNavMenuHidden.value)
      store.commit('UPDATE_MENU_ACTIVE', !isVerticalMenuActive.value)
  }

  
  

  const currentBreakpoint = ref('xl')

  const isVerticalMenuCollapsed = computed(() => store.state.isVerticalMenuCollapsed)

  const layoutClasses = computed(() => {
    const classes = []

    if (currentBreakpoint.value === 'xl') {
      classes.push('vertical-menu-modern')
      classes.push(isVerticalMenuCollapsed.value ? 'menu-collapsed' : 'menu-expanded')
    } else {
      classes.push('vertical-overlay-menu')
      classes.push(isVerticalMenuActive.value ? 'menu-open' : 'menu-hide')
    }

    return classes
  })

  // ------------------------------------------------
  // Resize handler for Breakpoint
  // ------------------------------------------------
  watch(currentBreakpoint, val => {
    store.commit('UPDATE_MENU_ACTIVE', val === 'xl')
    store.commit('UPDATE_MENU_HIDDEN', val !== 'xl')
  })

  const overlayClasses = computed(() => {
    if (currentBreakpoint.value !== 'xl' && isVerticalMenuActive.value) return 'show'
    return null
  })
  const resizeHandler = () => {
    // ! You can use store getter to get breakpoint
    if (window.innerWidth >= 1200) currentBreakpoint.value = 'xl'
    else if (window.innerWidth >= 992) currentBreakpoint.value = 'lg'
    else if (window.innerWidth >= 768) currentBreakpoint.value = 'md'
    else if (window.innerWidth >= 576) currentBreakpoint.value = 'sm'
    else currentBreakpoint.value = 'xs'
  }

    onMounted(() => {
      window.addEventListener('resize', resizeHandler)
    })
    onUnmounted(() => {
      window.removeEventListener('resize', resizeHandler)
    })

</script>