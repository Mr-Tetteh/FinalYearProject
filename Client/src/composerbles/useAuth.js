import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";


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

    const hospitals_in_system = ref([])
    const login = async () => {
        try {
            const response = await axios.post('https://health.local.stay/api/login', user.value);
            const token = response.data.authorisation.token
            localStorage.setItem('AUTH_TOKEN', token);
            localStorage.setItem('USER_TYPE', response.data.user.user_type);
            localStorage.setItem('USER_NAME', response.data.user.first_name);
            localStorage.setItem('LAST_NAME', response.data.user.last_name);
            localStorage.setItem('USER_ID', response.data.user.id);
            localStorage.setItem('HOSPITAL', response.data.user.hospital);

            await router.push('/dashboard');
        } catch (err) {
            alert(err.response.data.message);
        }
    };

    const reset_password = async () => {
        try {

            const response = await axios.post('https://health.local.stay/api/rest_password', password_rest.value );
            alert(response.data.message)

        } catch (err) {
            alert(err)
        }

    }


    const setPass = async (rest) => {
        try {
            const response = await axios.post('https://health.local.stay/api/password_reset', rest);
            alert(response.data.message)
            await router.push('/login')

        } catch (err) {
            alert(err.response.data.message)
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
            alert(err.response.data.data)
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
            alert(err.response.data.data)
        }

    }

    const logout = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post('https://health.local.stay/api/logout', {}, config)
            localStorage.removeItem('AUTH_TOKEN');
            localStorage.removeItem('USER_TYPE');
            localStorage.removeItem('USER_NAME');
            localStorage.removeItem('USER_ID');
            localStorage.removeItem('HOSPITAL');
            router.push('/login')
        } catch (err) {
            alert(err.response.data.data)
        }
    }

    const hospital = async () => {
        try {
            let response = await axios.get('https://health.local.stay/api/hospitals')
            hospitals_in_system.value = response.data.data;
        } catch (err) {
            alert(err.response.data.message)
        }
    }


    const register = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post(`https://health.local.stay/api/users`, input.value, config)
            await router.push('/staff_info')
        } catch (err) {
            alert(err.response.data.message)
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
        reset
    }


}