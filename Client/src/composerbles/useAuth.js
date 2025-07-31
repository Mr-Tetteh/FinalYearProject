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
        hospital_id: "",
        staff_id: "",
        password: "my_name_is_jesus",
    })
    const role = ref({
        role: ''
    })

    const hospitals_in_system = ref([])
    let userData = ref(null)
    const is_loading = ref(false);

    const login = async () => {
        try {
            const response = await axios.post(
                `${import.meta.env.VITE_API}/login`,
                user.value
            );

            const token = response.data.authorisation.token;
            localStorage.setItem('AUTH_TOKEN', token);
            localStorage.setItem('USER_TYPE', response.data.user.role);
            localStorage.setItem('USER_NAME', response.data.user.first_name);
            localStorage.setItem('LAST_NAME', response.data.user.last_name);
            localStorage.setItem('USER_ID', response.data.user.id);
            localStorage.setItem('HOSPITAL_ID', response.data.user.hospital.id);

            $toast.success('Login Successfully', {position: 'top-right'});
            await router.push('/dashboard');
        } catch (err) {
            $toast.error(err?.response?.data?.message || 'Login failed', {
                position: 'top-right',
            });
        }
    };


    const reset_password = async () => {
        try {

            const response = await axios.post(`${import.meta.env.VITE_API}/rest_password`, password_rest.value);
            $toast.success(response.data.message, {
                position: 'top-right',
            })
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
            setTimeout(() => {
                window.location.reload()

            }, 1000)
        }

    }


    const setPass = async (rest) => {
        try {
            const response = await axios.post(`${import.meta.env.VITE_API}/password_reset`, rest);
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
            const response = await axios.get(`${import.meta.env.VITE_API}/view_all_users`, config);
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
            const response = await axios.get(`${import.meta.env.VITE_API}/all_staff`, config);
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
            const response = await axios.post(`${import.meta.env.VITE_API}/logout`, {}, config)
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
            let response = await axios.get(`${import.meta.env.VITE_API}/hospitals`)
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
            const response = await axios.delete(`${import.meta.env.VITE_API}/delete_user/${id}`, config)
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
            const response = await axios.get(`${import.meta.env.VITE_API}/get_details/${id}`, config)
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

            const response = await axios.patch(`${import.meta.env.VITE_API}/update_role/${id}`, userData.value, config)

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
            is_loading.value = true;

            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: { Authorization: `Bearer ${token}` }
            };
            let response = await axios.post(`${import.meta.env.VITE_API}/users`, input.value, config)
            $toast.success("Staff Registered Successfully", {
                position: 'top-right',
            });
            setTimeout(() => {
                window.location.reload(); // or router.push('/somewhere')
            }, 1000);

        } catch (err) {
            $toast.error(err?.response?.data?.message || "Something went wrong", {
                position: 'top-right',
            });
            is_loading.value = false;
        }
    };

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
        view_role,
        is_loading,
    }


}