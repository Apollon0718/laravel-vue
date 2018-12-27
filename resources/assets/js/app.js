require('./bootstrap');

window.Vue = require('vue');

import VeeValidate from 'vee-validate'
import store from './store'
import App from './App'


Vue.use(VeeValidate)

const app = new Vue({
    el: '#app',
    store,
    render: h => h(App)
});
