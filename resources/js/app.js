import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

import CKEditor from '@ckeditor/ckeditor5-vue'
import Layout from "./Shared/Layout";
import store from './Store'
import { createVbPlugin } from 'vue3-plugin-bootstrap5'
import VueFeather from 'vue-feather';
import Swal from "sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';
// toaster notifications

import { createToaster } from "@meforma/vue-toaster";


import ToastPlugin from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';
import {useToast} from 'vue-toast-notification';



import VueNotificationList from '@dafcoe/vue-notification'
import '@dafcoe/vue-notification/dist/vue-notification.css'

window.$sToast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.$swal = Swal
window.$mTost = useToast({
    position: "top-right"
})
window.$toast = createToaster({
    position: 'bottom'
});


import { Alert, Button, Carousel, Collapse, Dropdown, Modal, Offcanvas, Popover, ScrollSpy, Tab, Toast, Tooltip } from 'bootstrap'

let vbPlugin = createVbPlugin({ Alert, Button, Carousel, Collapse, Dropdown, Modal, Offcanvas, Popover, ScrollSpy, Tab, Toast, Tooltip  })


createInertiaApp({
  resolve: name => {
    let page = require(`./Pages/${name}`).default;
    if (page.layout === undefined) {
      page.layout = Layout;
    }
    return page;
  },

  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(vbPlugin)
      .use(store)
      .use(VueNotificationList)
      .use(CKEditor)
      .use(ToastPlugin)
      .component("Link", Link)
      .component("Head", Head)
      .component('v-select', vSelect)
      .component(VueFeather.name, VueFeather)
      .mount(el);
  },

  title: title => `My App - ${title}`
});



InertiaProgress.init({
  color: "red",
  showSpinner: true,
});
