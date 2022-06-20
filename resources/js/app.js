require('./bootstrap');

import { createApp } from 'vue';
import test from './components/test';

const app = createApp({});

app.component('test', test);

app.mount('#app');
