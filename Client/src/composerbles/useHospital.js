import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import {$t} from "@primeuix/themes";

const $toast = useToast();
export default function useHospital() {
    const input = ref({
        hospital_name: "",
        hospital_address: "",
        hospital_location: "",
        hospital_contact: "",
        hospital_email: "",
        hospital_country: "",
        hospital_city: "",
        number_of_monthly_subscription: ""
    })


    const data = ref({
        name: '',
        price: '',
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


    const hospital_patient_count = ref()
    const count_all_patient_on_swift = ref()
    const count_all_users_on_swift = ref()
    const hospital_users = ref()
    const registered_hospitals_data = ref([]);
    const reg_payment = ref([]);
    const count_all_hospitals = ref('')


    const stock_drugs = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post('https://health.local.stay/api/post_drug', data.value, config);
            $toast.success('Drugs has been added successfully', {
                position: "top-right"
            })
            resetForm()
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }
    const update_drug = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try {
            const response = await axios.patch(`https://health.local.stay/api/drug_edit/${drug.value.id}`, drug.value, config
            )
            await router.push('/Pharmacy_all_drugs_edit')
            $toast.success('Drugs has been updated successfully', {
                position: "top-right"
            })
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
            drugs.value = response.data
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
            drug.value = response.data.data
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }
    const register_hospital = async () => {
        try {
            const response = await axios.post('https://health.local.stay/api/hospital', input.value);
            const hospitalData = response.data;

            // Use the hospital ID from the response
            const payment = await axios.get(`https://health.local.stay/api/payments/${hospitalData.id}`);
            reg_payment.value = payment.data;
            console.log(reg_payment.value); // Added .value here

            $toast.success('Congrats Your hospital has been registered successfully.', {
                position: "top-right"
            });
            $toast.success('We will get in touch with you soon to create your user account for you', {
                position: "top-right"
            })

            return hospitalData;
        } catch (err) {
            console.error('Error details:', err); // Better error logging
            alert(err.response?.data?.message || 'Registration failed');
        }
    };
    const count_hospital_patient = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            const response = await axios.get('https://health.local.stay/api/count_hospital_patient', config);
            hospital_patient_count.value = response.data
            console.log('Response:', response.data);
        } catch (err) {
            alert(err.response.data.message);
        }
    };


    const count_all_patient = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            const response = await axios.get('https://health.local.stay/api/count_all_patient', config);
            count_all_patient_on_swift.value = response.data
        } catch (err) {
            alert(err.response.data.message);
        }
    };


    const count_all_users = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            const response = await axios.get('https://health.local.stay/api/count_all_users', config);
            count_all_users_on_swift.value = response.data
        } catch (err) {
            alert(err.response.data.message);
        }
    };

    const count_all_hospital_users = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            const response = await axios.get('https://health.local.stay/api/count_all_hospital_users', config);
            hospital_users.value = response.data
        } catch (err) {
            alert(err.response.data.message);
        }
    };

    const registered_hospital = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get('https://health.local.stay/api/registered_hospital', config);
            registered_hospitals_data.value = response.data.data
        } catch (err) {
            alert(err.response.data.message);
        }
    };

    const count_hospital = async () => {
        try{
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get('https://health.local.stay/api/count_hospitals', config);
            count_all_hospitals.value = response.data
        } catch (err) {
            alert(err.response.data.message);
        }
    }

    const delete_hospital = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.delete(`https://health.local.stay/api/delete_hospital/${id}`, config);
            if (response.data.message) {
                $toast.success(response.data.message, {
                    position: 'top-right',
                })
            }
            setTimeout(() => {
                window.location.reload()
            })
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }
    };


    return {
        input,
        register_hospital,
        data,
        stock_drugs,
        get_stock_drugs,
        drugs,
        drug,
        get_stock_drugs_edit,
        update_drug,
        hospital_patient_count,
        count_hospital_patient,
        count_all_patient,
        count_all_patient_on_swift,
        count_all_users_on_swift,
        count_all_users,
        hospital_users,
        count_all_hospital_users,
        registered_hospital,
        registered_hospitals_data,
        delete_hospital,
        count_all_hospitals,
        count_hospital

    }
}

// 100982140769-4ifdcsntgsqhbars1ram20tlclbtrke8.apps.googleusercontent.com