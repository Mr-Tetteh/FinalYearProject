import { createRouter, createWebHistory } from 'vue-router'
import Login from '@/views/auth/Login.vue'
import Register from '@/views/auth/Register.vue'
import Chat from "@/views/Chat.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [

    {
      path: '/login',
      name: 'login',
      component: Login,
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
      path: '/chat',
      name: 'chat',
      component: Chat,
    }
   
  ],
})

export default router
