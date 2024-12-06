import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";


export default function useAuth() {
    const user = ref({
        identifier : '',
        password: ''
    })

    const input = ref({
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        gender: "",
        phone: "",
        country: "",
        birthday: "",
        address: "",
        city: "",
    })

    const login = async () => {
        try {
            const response = await axios.post('https://health.local.stay/api/login', user.value);
            console.log('Response:', response.data); // Debug the API response
            const token = response.data.authorisation.token;
            localStorage.setItem('AUTH_TOKEN', token);
            localStorage.setItem('USER_TYPE', response.data.user.user_type);
            localStorage.setItem('USER_NAME', response.data.user.first_name);
            localStorage.setItem('USER_ID', response.data.user.id);
            await router.push('/');
        } catch (err) {
            console.error('Login Error:', err); // Debug the error
            alert('Login failed. Please try again.');
        }
    };


    const register = async () => {
        try {
            const response = await axios.post(`https://health.local.stay/api/register`, input.value)
            await router.push('/login')
        } catch (err) {
            alert(err)
        }

    }


    return{
        user,
        login,
        register,
        input
    }


}