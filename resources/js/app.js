require('./bootstrap');

import { createApp } from 'vue';
import postList from './components/postList';

const app = createApp({});

// app.component('post-list', postList);

// app.mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
