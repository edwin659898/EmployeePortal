require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('main-component', require('./Main.vue').default);
import Vue from "vue";

Vue.use(require("bridge-vue-notification"));
Vue.component('pagination', require('laravel-vue-pagination'));

import router from "./router";
export const bus = new Vue();

import htmlToPdf from './htmlToPdf.js'

Vue.use(htmlToPdf)

import VModal from 'vue-js-modal'

Vue.use(VModal, { dynamicDefault: { draggable: true, resizable: true, height: 'auto' } })


const app = new Vue({
    router,
    el: '#app',
});
