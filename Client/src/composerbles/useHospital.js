import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";

export default function useHospital(){
    const input =  ref({
        hospital_name: "",
        hospital_address: "",
        hospital_location: "",
        hospital_contact: "",
        hospital_email: "",
        hospital_country: "",
        hospital_city: "",
        user_name: "",
        user_phone_number: "",
        user_email: "",
        number_of_monthly_subscription: ""
    })


    const data = ref({
        name: '',
        price:'',
        category: '',
        quantity: '',
        use: '',
        additional_note: ''
    })

    const stock_drugs = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post('https://health.local.stay/api/post_drug', data.value, config);
            await router.push('/pharmacy_add');
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }

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
        register_hospital,
        data,
        stock_drugs
    }
}