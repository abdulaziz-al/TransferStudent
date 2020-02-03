require('./bootstrap');




window.Vue = require('vue');

Vue.component('test',require('./components/Test.vue').default);

Vue.component('navbar',require('./components/navbar.vue').default);


const app = new Vue({
    el: '#app'
});
