
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

    // // plugins for for material-dashboard
    // import '../material-dashboard/assets/js/plugins/bootstrap-notify.js';
    // import '../material-dashboard/assets/js/plugins/chartist.min.js';
    // import '../material-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js';

    // // Core JS Files for material-dashboard
    // import '../material-dashboard/assets/js/core/bootstrap-material-design.min.js';
    // import '../material-dashboard/assets/js/core/jquery.min.js';
    // import '../material-dashboard/assets/js/core/popper.min.js';

    // // main js for material dashboard
    // import '../material-dashboard/assets/js/material-dashboard';         

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
