import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";


export default function useAuth() {
    const user = ref({
        identifier: '',
        password: ''
    })

    const input = ref({
        first_name: "",
        last_name: "",
        birthday: "",
        email: "",
        phone: "",
        gender: "",
        role: "",
        hospital: "",
        staff_id: "",
        city: "",
        password: "my_name_is_jesus",
    })
const hospitals_in_system = ref([])
    const login = async () => {
        try {
            const response = await axios.post('https://health.local.stay/api/login', user.value);
            console.log('Response:', response.data); // Debug the API response
            const token = response.data.authorisation.token;
            localStorage.setItem('AUTH_TOKEN', token);
            localStorage.setItem('USER_TYPE', response.data.user.user_type);
            localStorage.setItem('USER_NAME', response.data.user.first_name);
            localStorage.setItem('USER_ID', response.data.user.id);
            localStorage.setItem('HOSPITAL', response.data.user.hospital);

            await router.push('/dashboard');
        } catch (err) {
            alert(err.response.data.message);
        }
    };

    const hospital = async () =>{
        try {
            let response  = await  axios.get('https://health.local.stay/api/all_hospitals')
            hospitals_in_system.value = response.data.data;
        }catch (err) {
            alert(err.response.data.message)
        }
    }


    const register = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post(`https://health.local.stay/api/register`, input.value, config)
            await router.push('/all_patients')
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
        hospitals_in_system
    }


}