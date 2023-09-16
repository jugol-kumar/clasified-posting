import { createStore } from 'vuex'

const state = {
    skin: localStorage.getItem('theme-skin') && (localStorage.getItem('theme-skin') === 'dark') ? 'dark' : 'light',
    sidebar: 'expanded',
    isVerticalMenuActive: true,
    isVerticalMenuCollapsed: false,
    menuHidden: false
}

const mutations = {
  UDATE_SKIN (state, skin) {
      state.skin = skin
      localStorage.setItem('theme-skin', skin)

      // Update DOM for dark-layout
      if (skin === 'dark') document.body.classList.add('dark-layout')
      else if (document.body.className.match('dark-layout')) document.body.classList.remove('dark-layout')
  },
  UPDATE_MENU_ACTIVE(state, val) {
    state.isVerticalMenuActive = val
  },
  UPDATE_MENU_COLLAPSED(state, val) {
    state.isVerticalMenuCollapsed = val
  },
  UPDATE_MENU_HIDDEN(state, val) {
    state.menuHidden = val
  }
}

// Create a new store instance.

export default createStore({
    state,
    // getters,
    // actions,
    mutations
  })