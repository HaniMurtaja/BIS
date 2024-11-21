import { createApp } from 'vue';
const app = createApp({});
app.mount('#app');

import axios from 'axios';
window.axios = axios;
axios.defaults.baseURL = '/api';

import store from './store';
app.use(store);