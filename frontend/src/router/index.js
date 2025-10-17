import { createRouter, createWebHistory } from 'vue-router'
import RegisterView from '@/views/RegisterView.vue'
import LoginView from '@/views/LoginView.vue'
import DashboardView from '@/views/DashboardView.vue'
import { AuthStore } from '@/stores/AuthStore'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/',
      name: 'dashboard',
      component: DashboardView,
      meta: {requiresAuth: true}
    },

  ],
})


router.beforeEach((to, from, next) => {
  const store = AuthStore()
  const token = store.token || localStorage.getItem('token')

  // Cas 1 : Authentication required
  if (to.meta.requiresAuth && !token) {
    return next('/login')
  }

  // Cas 2 : OK
  next()
})

export default router;
