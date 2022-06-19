require('./bootstrap');

import Vue from 'vue'
import App from './vue/app.vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faCirclePlus, faCross } from '@fortawesome/free-solid-svg-icons'
library.add(faCirclePlus, faCross)
Vue.component('font-awesome-icon', FontAwesomeIcon)

const app = new Vue({
    el : '#app',
    components:{ App}
});
