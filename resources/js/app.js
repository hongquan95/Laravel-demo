
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./notify');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

//Broadcast
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

console.log(process.env);
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
});

var showNotify = function(status) {
    var className = '';
    var text = '';
    switch (status) {
        case 0:
            className = 'warn';
            text = 'Pending';
            break;
        case 1:
            className = 'success';
            text = 'Updated';
            break;
        case 2:
            className = 'error';
            text = 'Deleted';
            break;
        default:
            break;
    }
    $.notify('Order is ' + text, className);
};
// window.Echo.private(`order.1`)
window.Echo.channel('testchannel')
    .listen('ShippingStatusUpdated', (e) => {
        // debugger;
        showNotify(e.status);
        console.log('=============Listen==========');
        console.log('status: ' + e.text);
        console.log('==============Finish==========');
    });

$(document).ready(function() {
    $('select').change(function(e) {
        e.preventDefault();
        var orderId = parseInt($(this).closest('tr').find('.order-id').html());
        var data = {
            id: orderId,
            status: $(this).val()
        };
        $.ajax({
            method: "GET",
            url: window.location.href + '/update',
            data: data
        })
            .done(function( msg ) {
            console.log('DONE');
            });
    });
});
