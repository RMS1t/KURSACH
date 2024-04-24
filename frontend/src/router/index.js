import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/register',
      name: 'register',
      component: () => import('../pages/RegistrationPage.vue')
    },
    {
      path: '/',
      name: 'main',
      component: () => import('../pages/MainPage.vue')
    },
    {
      path: '/auth',
      name: 'auth',
      component: () => import('../pages/AuthPage.vue')
    },
    {
      path: '/resume',
      name: 'resume',
      component: () => import('../pages/ResumePage.vue')
    }
  ]
})

export default router
