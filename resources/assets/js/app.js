
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'
import VueRouter from 'vue-router'
import ShowForm from './components/ShowForm.vue'
import App from './components/App.vue'
import StarRating from 'vue-star-rating'
import Vue2Filters from 'vue2-filters'

Vue.use(Vue2Filters)

  Vue.component('App', require('./components/App.vue'));

 const app = new Vue ({
    el: '#app',
    template: '<App />'
  });
