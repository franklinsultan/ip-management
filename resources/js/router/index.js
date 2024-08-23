import Vue from 'vue';
import Router from 'vue-router';
import Login from '../components/LoginAndRegister.vue';
import Dashboard from "../components/AdminDashboard.vue";
import LandingPage from "../components/LandingPage.vue";
import AuditLogs from "../components/AuditLog.vue";

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'landing',
            component: LandingPage,
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { requiresAuth: true },
        },
        {
          path: '/logs',
          name: 'audtlogs',
          component: AuditLogs,
          meta: { requiresAuth: true },
        },
        {
            path: '*',
            redirect: '/',
        },
    ]
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('user-token');
  
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!isAuthenticated) {
        next({ name: 'login' });
      } else {
        next();
      }
    } else {
      if (isAuthenticated && (to.name === 'login')) {
        next({ name: 'dashboard' });
      } else {
        next();
      }
    }
  });

  export default router;