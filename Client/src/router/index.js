import {createRouter, createWebHistory} from 'vue-router'
import Register from "@/views/Admin/users/Register.vue";
import Login from "@/views/auth/Login.vue";
import HomePage from "@/views/HomePage.vue";
import RegisterHospital from "@/views/auth/RegisterHospital.vue";
import Dashboard from '@/views/Admin/Dashboard.vue';
import Patients from '@/views/Admin/patients/Patients.vue';
import Patients_info from "@/views/Admin/patients/Patients_info.vue";
import User_info from "@/views/Admin/users/User_info.vue";
import Staff_info from "@/views/Admin/users/Staff_info.vue";
import Hospital_patients from "@/views/Admin/patients/Hospital_patients.vue";
import Patient_record_add from "@/views/Admin/patients/Patient_record_add.vue";
import Patient_record_list_all from "@/views/Admin/patients/Patient_record_list_all.vue";
import Pharmacy_Add from "@/views/Admin/pharmacy/Pharmacy_Add.vue";
import Pharmacy_all_drugs from "@/views/Admin/pharmacy/Pharmacy_all_drugs.vue";
import Checkout from "@/views/Admin/Checkout.vue";
import Pharmacy_drugs_edit from "@/views/Admin/pharmacy/Pharmacy_drugs_edit.vue";
import Pharmacy_drug_details from "@/views/Admin/pharmacy/pharmacy_drug_details.vue";
import ResetPassword from "@/views/auth/ResetPassword.vue";
import SetPassword from "@/views/auth/SetPassword.vue";
import Patient_record_update from "@/views/Admin/patients/Patient_record_update.vue";
import Register_Hospital from "@/views/Admin/hospital/Register_Hospital.vue";
import Registered_Hospitals from "@/views/Admin/hospital/Registered_Hospitals.vue";
import Update_plan from '@/views/subcription/update_plan.vue';
import Patient_card from "@/views/Admin/patients/Patient_card.vue";


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
            path: '/update_plan',
            name: 'update_plan',
            component: Update_plan
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/patients',
            name: 'patients',
            component: Patients,
            meta: {
                requiresAuth: true,
                roles: ['Manager', 'Receptionist']
            }
        },
        {
            path: '/patients_info',
            name: 'patients_info',
            component: Patients_info,
            props: true,
            meta: {
                requiresAuth: true,
                roles: ['Admin']
            }
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
            meta: {
                requiresAuth: true,
            }
        },

        {
            path: '/patient_card/:id/',
            name: 'patient.card',
            component: Patient_card,
            props: true,
            meta: {
                requiresAuth: true,
            }
        },

        {
            path: '/patient_record_update/:id',
            name: 'patient.record_update',
            component: Patient_record_update,
            props: true,
            meta: {
                requiresAuth: true,
            }
        },

        {
            path: '/hospital_patient/',
            name: 'hospital_patients_info',
            component: Hospital_patients,
            meta: {
                requiresAuth: true,
                roles: ['Receptionist','Nurse', 'Manager', 'Doctor', 'Pharmacist', 'Lab Technician', 'Account']

            }
        },

        {
            path: '/user_info',
            name: 'users_info',
            component: User_info,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/staff_info',
            name: 'staff_info',
            component: Staff_info,
            meta: {
                requiresAuth: true,
            },

        },

        {
            path: '/pharmacy_add',
            name: 'pharmacy_add',
            component: Pharmacy_Add,
            meta: {
                requiresAuth: true,
                roles: ['Admin', 'Manager', 'Pharmacist']
            }
        },

        {
            path: '/Pharmacy_all_drugs',
            name: 'Pharmacy_all_drugs',
            component: Pharmacy_all_drugs,
            meta: {
                requiresAuth: true,
                roles: ['Manager', 'Pharmacist']
            }

        },


        {
            path: '/Pharmacy_all_drugs_edit',
            name: 'Pharmacy_all_drugs_edit',
            component: Pharmacy_drugs_edit,
            meta: {
                requiresAuth: true,
                roles: [ 'Manager', 'Pharmacist']
            }
        },


        {
            path: '/Pharmacy_all_drugs_details/:id',
            name: 'pharmacy.edit.drug.details',
            component: Pharmacy_drug_details,
            props: true,
            meta: {
                requiresAuth: true,
                roles: ['Manager', 'Pharmacist']
            },
        },

        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout,
            meta: {
                requiresAuth: true,
                roles: [ 'Manager', 'Pharmacist']
            }
        },

        {
            path: '/register_hospital/login',
            name: 'register_hospital_login',
            component: Register_Hospital,
            meta: {
                requiresAuth: true,
                roles: ['Admin',]
            }
        },

        {
            path: '/registered_hospitals',
            name: 'registered_hospitals',
            component: Registered_Hospitals,
            meta: {
                requiresAuth: true,
                roles: ['Admin']
            }
        },

        {
            path: '/rest_password',
            name: 'RestPassword',
            component: ResetPassword
        },
        {
            path: '/set_password/:token',
            name: 'SetPassword',
            component: SetPassword
        },

    ],
})


router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem("AUTH_TOKEN")
    const userRole = localStorage.getItem("USER_TYPE")

    if (to.meta.requiresAuth && !isAuthenticated) {
        next({name: "login", query: {redirect: to.fullPath}});
    } else if (to.meta.roles && Array.isArray(to.meta.roles) && userRole) {
        if (to.meta.roles.includes(userRole)) {
            next();
        } else {
            next({name: "home"});
        }
    } else {
        next();
    }
});

export default router
