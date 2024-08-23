import Vue from 'vue';
import Router from 'vue-router';
import Login from '../components/LoginAndRegister.vue';
import EditLabelModal from '../components/EditLabelModal.vue';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        // {
        //     path: '/update-ip/:id',
        //     name: 'EditLabelModal',
        //     component: EditLabelModal,
        //     props: true
        // }
    ]
});