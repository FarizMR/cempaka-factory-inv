import './bootstrap';

import 'admin-lte/plugins/jquery/jquery.min.js';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createRouter, createWebHistory } from 'vue-router';
import DataTable from 'datatables.net-vue3';
import routes from './routes';
import VueSweetalert2 from 'vue-sweetalert2';

const app = createApp({});

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

app.use(DataTable);
app.use(router);
app.use(VueSweetalert2);
app.mount('#app');

