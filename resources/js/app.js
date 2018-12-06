
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
// Plugins for now-ui-kit
import './plugins/bootstrap-datepicker';
import './plugins/bootstrap-switch';
import './plugins/jquery.sharrre';
import './plugins/nouislider.min';

// Core JS Files for now-ui-kit
import './core/bootstrap.min';
import './core/jquery.3.2.1.min';
import './core/popper.min';

// main js for now-ui-kit
import './now-ui-kit';
window.Vue = require('vue');

// js for material-dashboard

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

// Be sure to include this script later in the main body:

        // $(document).ready(function() {
        //   // the body of this function is in assets/js/now-ui-kit.js
        //   nowuiKit.initSliders();
        // });

        // function scrollToDownload() {

        //   if ($('.section-download').length != 0) {
        //     $("html, body").animate({
        //       scrollTop: $('.section-download').offset().top
        //     }, 1000);
        //   }
        // }
    