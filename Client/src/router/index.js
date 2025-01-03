import { createRouter, createWebHistory } from 'vue-router'
import Register from "@/views/Admin/Register.vue";
import Login from "@/views/auth/Login.vue";
import HomePage from "@/views/HomePage.vue";
import RegisterHospital from "@/views/auth/RegisterHospital.vue";
import Dashboard from '@/views/Admin/Dashboard.vue';
import Patients from '@/views/Admin/Patients.vue';
import Patients_info from "@/views/Admin/Patients_info.vue";
import User_info from "@/views/Admin/User_info.vue";
import Staff_info from "@/views/Admin/Staff_info.vue";
import Hospital_patients from "@/views/Admin/Hospital_patients.vue";
import Patient_record_add from "@/views/Admin/Patient_record_add.vue";
import Patient_record_list_all from "@/views/Admin/Patient_record_list_all.vue";
import Pharmacy_Add from "@/views/Admin/Pharmacy_Add.vue";
import Pharmacy_all_drugs from "@/views/Admin/Pharmacy_all_drugs.vue";

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
    {
      path: '/patients_info',
      name: 'patients_info',
      component: Patients_info,
      props:true
    },

    {
      path: '/patients/:id/file_add',
      name: 'patients.file_add',
      component: Patient_record_add,
      props: true,
    },

    {
      path: '/patients/:id/record_list_all',
      name: 'patients.list_all',
      component: Patient_record_list_all,
      props: true,
    },


    {
      path: '/hospital_patient/',
      name: 'hospital_patients_info',
      component: Hospital_patients,
    },

    {
      path: '/user_info',
      name: 'users_info',
      component: User_info
    },
    {
      path: '/staff_info',
      name: 'staff_info',
      component: Staff_info
    },

    {
      path: '/pharmacy_add',
      name: 'pharmacy_add',
      component: Pharmacy_Add
    },

    {
      path: '/Pharmacy_all_drugs',
      name: 'Pharmacy_all_drugs',
      component: Pharmacy_all_drugs
    },


  ],
})

export default router
