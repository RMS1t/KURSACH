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
    }
  ]
})

export default router
