import {ref} from "vue";
import router from "@/router/index.js";
import axios from "axios";

export default function usePatients() {

    const input = ref({
        full_name: "",
        age: "",
        gender: "",
        date_of_birth: "",
        contact: "",
        email: "",
        address: "",
        medical_history: "",
        allergies: "",
        additional_notes: "",
    });

    const register_patient = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            let response = await axios.post('https://health.local.stay/api/add_patient', input.value, config)
            await router.push('/dashboard')
        } catch (err) {
            alert(err.response.data.data)
        }
    }

    return{
        register_patient,
        input
    }
}