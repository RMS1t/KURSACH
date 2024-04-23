import { createRouter, createWebHistory } from 'vue-router'
import RegisterForm from "@/components/RegisterForm.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/register',
      name: 'register',
      component: () => import('../pages/RegistrationPage.vue')
    },
    {
      path: '/register',
      name: 'about',
    }
  ]
})

export default router
