import Vue from 'vue';
import Router from 'vue-router';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import UpdateIpAddress from '../components/UpdateIpAddress.vue';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/update-ip/:id',
            name: 'UpdateIpAddress',
            component: UpdateIpAddress,
            props: true
        }
    ]
});