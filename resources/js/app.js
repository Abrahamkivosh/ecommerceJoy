/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue').default;
import { createApp } from 'vue'
import router from "./router"
import clientApp from './components/clientApp/Index'

// 5. Create and mount the root instance.

// Make sure to _use_ the router instance to make the
// whole app router-aware.


// Now the app has started!

const app = createApp({})
app.use(router)
app.component('client-app', clientApp)
app.mount('#app')