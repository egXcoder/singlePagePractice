/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*setting up routes*/
import vueRouter from 'vue-router';
Vue.use(vueRouter);

import posts_all from './components/posts_all.vue';
import posts_single from './components/posts_single.vue';
import about from './components/about.vue';
import contact from './components/contact.vue';

const router = new vueRouter({
    routes:[
        {path:'/',component:posts_all},
        {path:'/about',component:about},    
        {path:'/contact',component:contact},
        {path:'/post/:slug',component:posts_single},
    ],
    mode:'history',
});

/*registering Components*/
var Paginate = require('vuejs-paginate')
Vue.component('paginate', Paginate)

const app = new Vue({
    el: '#app',
    router
});