import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

export default function useAuth() {
    const user = ref({
        identifier: '',
        password: ''
    })
    const all_users = ref('');
    const all_staff = ref('');
    const reset = ref(null)
    const password_rest = ref({
        email: ''
    });


    const input = ref({
        first_name: "",
        last_name: "",
        other_names: '',
        contact: "",
        birthday: "",
        email: "",
        gender: "",
        role: "",
        // hospital: "",
        staff_id: "",
        city: "",
        password: "my_name_is_jesus",
    })
    const role = ref({
        role: ''
    })

    const hospitals_in_system = ref([])
    let userData = ref(null)

    const login = async () => {
        try {
            const response = await axios.post('https://health.local.stay/api/login', user.value);
            const token = response.data.authorisation.token
            localStorage.setItem('AUTH_TOKEN', token);
            localStorage.setItem('USER_TYPE', response.data.user.role);
            localStorage.setItem('USER_NAME', response.data.user.first_name);
            localStorage.setItem('LAST_NAME', response.data.user.last_name);
            localStorage.setItem('USER_ID', response.data.user.id);
            localStorage.setItem('HOSPITAL', response.data.user.hospital);

            $toast.success('Login Successfully', {
                position: 'top-right',
            })
            await router.push('/dashboard');
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }
    };

    const reset_password = async () => {
        try {

            const response = await axios.post('https://health.local.stay/api/rest_password', password_rest.value);
            $toast.success(response.data.message)

        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }

    }


    const setPass = async (rest) => {
        try {
            const response = await axios.post('https://health.local.stay/api/password_reset', rest);
            alert(response.data.message)
            await router.push('/login')

        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }

    }

    const users = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get('https://health.local.stay/api/all_users', config);
            all_users.value = response.data.data

        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }

    }

    const staffs = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get('https://health.local.stay/api/all_staff', config);
            all_staff.value = response.data.data

        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }

    }

    const logout = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post('https://health.local.stay/api/logout', {}, config)
            localStorage.clear()
            $toast.success('Logout Successfully', {
                position: 'top-right',
            })
            router.push('/login')
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }
    }

    const hospital = async () => {
        try {
            let response = await axios.get('https://health.local.stay/api/hospitals')
            hospitals_in_system.value = response.data.data;
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }
    }

    const delete_user = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.delete(`https://health.local.stay/api/delete_user/${id}`, config)
            if (response.data.message) {
                $toast.success(response.data.message, {
                    position: 'top-right',
                })
            }
            setTimeout(() => {
                window.location.reload()

            }, 1000)
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }

    }


    const view_role = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`https://health.local.stay/api/get_details/${id}`, config)
            userData.value = response.data.data
        } catch (err) {
            alert(err)
        }

    }

    const update_role = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            
            const response = await axios.patch(`https://health.local.stay/api/update_role/${id}`, userData.value, config)

            $toast.success('User Role Updated Successfully', {
                position: 'top-right',
            });
            
            setTimeout(() => {
                window.location.reload()
            }, 1000)
        } catch (err) {
            const errorMessage = err.response?.data?.message || 'Failed to update user role';
            $toast.error(errorMessage, {
                position: 'top-right',
            });
        }
    }
    const register = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post(`https://health.local.stay/api/users`, input.value, config)
            if (response) {
                  $toast.error(response.data.message, {
                    position: 'top-right',
                    pauseOnHover: true
                })
            }
            $toast.success('Staff Registered Successfully', {
                position: 'top-right',
                pauseOnHover: true
            })
            setTimeout(() => {
                window.location.reload()
            }, 1000)

        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }


    }


    return {
        user,
        login,
        register,
        input,
        hospital,
        hospitals_in_system,
        logout,
        all_users,
        users,
        staffs,
        all_staff,
        password_rest,
        reset_password,
        setPass,
        reset,
        delete_user,
        update_role,
        userData,
        view_role
    }


}