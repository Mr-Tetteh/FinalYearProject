import { createRouter, createWebHistory } from 'vue-router'
import Register from "@/views/auth/Register.vue";
import Login from "@/views/auth/Login.vue";
import HomePage from "@/views/HomePage.vue";
import RegisterHospital from "@/views/auth/RegisterHospital.vue";
import Dashboard from '@/views/auth/Dashboard.vue';
import Patients from '@/views/auth/Patients.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomePage,
    },
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
      path: '/register_hospital',
      name: 'register_hospital',
      component: RegisterHospital
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard
    },
    {
      path: '/patients',
      name: 'patients',
      component: Patients
    },

  ],
})

export default router
