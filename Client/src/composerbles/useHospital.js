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
        additional_notes: ''
    })

    const drugs = ref()
const drug = ref()
    const resetForm = () => {
        data.value = {
            name: '',
            price: '',
            category: '',
            quantity: '',
            use: '',
            additional_note: ''
        };
    };


    const stock_drugs = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post('https://health.local.stay/api/post_drug', data.value, config);
            resetForm()
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }
    const update_drug = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: { Authorization: `Bearer ${token}` }
        }
        try {
            const response = await axios.patch(`https://health.local.stay/api/drug_edit/${drug.value.id}`, drug.value, config
            )
            await router.push('/Pharmacy_all_drugs_edit')
        } catch (err) {
            console.error('Error updating drug:', err)
            alert(err.response?.data?.message || 'Error updating drug')
        }
    }




    const get_stock_drugs = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get('https://health.local.stay/api/get_drugs', config);
         drugs.value =  response.data
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }



    const get_stock_drugs_edit = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`https://health.local.stay/api/get_drugs_edit/${id}`, config);
            drug.value =  response.data.data
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
        stock_drugs,
        get_stock_drugs,
        drugs,
        drug,
        get_stock_drugs_edit,
        update_drug

    }
}