import {createApp} from "vue";
import Swal from "sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';
let swalToaster = Swal.mixin({
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


import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ /* options */ });
// toaster.show(`Hey! I'm here`);

import ToastPlugin from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';
import {useToast} from 'vue-toast-notification';

// useToast().open({
//     message: 'Something went wrong!',
//     type: 'error',
//     position: "top-right"
// });

import VueNotificationList from '@dafcoe/vue-notification'
import '@dafcoe/vue-notification/dist/vue-notification.css'

