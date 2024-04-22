import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.VITE_API_URL),
  routes: [
    {
      path: '/',
      name: 'home',
    },
    {
      path: '/about',
      name: 'about',
    }
  ]
})

export default router
