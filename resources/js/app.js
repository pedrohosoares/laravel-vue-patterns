/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery';
import 'popper.js';
window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const filtersFiles = require.context('./filters/', true, /\.js$/i);
filtersFiles.keys().map(key => Vue.filter(key.split('/').pop().split('.')[0], filtersFiles(key).default));

const directivesFiles = require.context('./directives/', true, /\.js$/i);
directivesFiles.keys().map(key => Vue.directive(key.split('/').pop().split('.')[0], directivesFiles(key).default));

const componentsFiles = require.context('./components/', true, /\.vue$/i);
componentsFiles.keys().map(key => {Vue.component(key.split('/').pop().split('.')[0], componentsFiles(key).default)});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});