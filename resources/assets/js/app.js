
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// START Admin LTE
require('admin-lte'); // Admin LTE js
require('admin-lte/plugins/iCheck/icheck'); // iCheck
//require('admin-lte/bower_components/jquery-sparkline/dist/jquery.sparkline'); // sparkline
//require('admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min'); // jvectormap
//require('admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en'); // jvectormap
//require('admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll'); // SlimScroll
//require('admin-lte/bower_components/chart.js/Chart'); // Chart
require('admin-lte/bower_components/fastclick/lib/fastclick'); // FastClick


//require('admin-lte/dist/js/pages/dashboard2'); // dashboard2
require('admin-lte/dist/js/demo'); // iCheck

// END



require('./custom');





//window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(key.split('/').pop().split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*const app = new Vue({
    el: '#app'
});*/
