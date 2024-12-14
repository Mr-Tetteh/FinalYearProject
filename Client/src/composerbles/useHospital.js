import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";

export default function useHospital(){
    const input =  ref({
        hospital_name: "",
        hospital_address: "",
        hospital_contact: "",
        hospital_email: "",
        hospital_country: "",
        hospital_city: "",
        user_name: "",
        user_phone_number: "",
        user_email: "",
        number_of_monthly_subscription: ""
    })


    const register_hospital = async () => {
        try {
            const response = await axios.post('https://health.local.stay/api/register_hospital', input.value);
            console.log('Response:', response.data);
            await router.push('/');
        } catch (err) {
            alert(err.response.data.message);
        }
    };


    return{
        input,
        register_hospital
    }
}