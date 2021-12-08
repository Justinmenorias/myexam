

require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('apollo-component', require('./components/Apollo.vue').default);


const app = new Vue({
    el: '#app',
});
