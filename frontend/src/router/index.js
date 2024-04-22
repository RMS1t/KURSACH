import { createRouter, createWebHistory } from 'vue-router'
import RegisterForm from "@/components/RegisterForm.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/register',
      name: 'register',
      component: RegisterForm
    },
    {
      path: '/about',
      name: 'about',
    }
  ]
})

export default router
