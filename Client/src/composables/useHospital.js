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
        hospital_consistency: "",
        hospital_city: "",
        status: "",
    })


    const data = ref({
        name: '',
        price: '',
        category: '',
        quantity: '',
        use: '',
        hospital: localStorage.getItem('HOSPITAL_ID'),
        additional_notes: ''
    })

    const drugs = ref()
    const drug = ref()



    const hospital_patient_count = ref()
    const count_all_patient_on_swift = ref()
    const count_all_users_on_swift = ref()
    const hospital_users = ref()
    const registered_hospitals_data = ref([]);
    const reg_payment = ref([]);
    const count_all_hospitals = ref('')
    const is_loading = ref(false)
    const hospital_edit = ref()

    const stock_drugs = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.post(`${import.meta.env.VITE_API}/post_drug`, data.value, config);
            $toast.success('Drugs has been added successfully', {
                position: "top-right"
            })
            setTimeout = () => {
                window.location.reload()
            }
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
            const response = await axios.patch(`${import.meta.env.VITE_API}/drug_edit/${drug.value.id}`, drug.value, config
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
            const hospitalId = localStorage.getItem('HOSPITAL_ID')

            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/get_drugs/${hospitalId}`, config);
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
            const response = await axios.get(`${import.meta.env.VITE_API}/get_drugs_edit/${id}`, config);
            drug.value = response.data.data
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }

    // const waitForPayment = async (hospitalId, retries = 10, delay = 1000) => {
    //     for (let i = 0; i < retries; i++) {
    //         try {
    //             const payment = await axios.get(`${import.meta.env.VITE_API}/payments/hospital/${hospitalId}`);
    //             return payment.data;
    //         } catch (e) {
    //             await new Promise(res => setTimeout(res, delay));
    //         }
    //     }
    //     throw new Error('Payment not found after waiting.');
    // };

    const register_hospital = async () => {
        try {
            is_loading.value = true;
            const response = await axios.post(`${import.meta.env.VITE_API}/hospital`, input.value);
            // const hospitalData = response.data.hospital;

            // Wait for the payment job to finish and fetch payment
            /*       const payment = await waitForPayment(hospitalData.id);
                   reg_payment.value = payment;

                   window.location.href = payment.payment_url; // Redirect user to Paystack
                   $toast.success('Hospital registered! Redirecting to payment...', { position: "top-right" });*/
            $toast.success('Your Hospital has been Registered successfully', {
                position: "top-right"
            })
            setTimeout(() => {
                window.location.href='/update_plan'
            }, 2000)
        } catch (err) {
            is_loading.value = false;
            console.error('Error:', err);
            $toast.error(err.response.data.message, {position: "top-right"});
        }
    };

    const count_hospital_patient = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            const response = await axios.get(`${import.meta.env.VITE_API}/count_hospital_patient`, config);
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

            const response = await axios.get(`${import.meta.env.VITE_API}/count_all_patient`, config);
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

            const response = await axios.get(`${import.meta.env.VITE_API}/count_all_users`, config);
            count_all_users_on_swift.value = response.data
        } catch (err) {
            alert(err.response.data.message);
        }
    };

    const count_all_hospital_users = async () => {
        const hospital_id = localStorage.getItem('HOSPITAL_ID')
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            const response = await axios.get(`${import.meta.env.VITE_API}/count_all_hospital_users/${hospital_id}`, config);
            hospital_users.value = response.data
        } catch (err) {
            $toast.error(err.response.data.message);
        }
    };

    const registered_hospital = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/registered_hospital`, config);
            registered_hospitals_data.value = response.data.data
        } catch (err) {
            $toast.error(err.response.data.message);
        }
    };


    const count_hospital = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/count_hospitals`, config);
            count_all_hospitals.value = response.data
        } catch (err) {
            $toast.error(err.response.data.message);
        }
    }

    const edit_hospital = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/edit_hospital/${id}`, config);
            input.value = response.data.data
        } catch (err) {
            $toast.error(err.response.data.data.message);
        }
    }

    const update_hospital = async (id) => {
        try {
            is_loading.value = true
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.patch(`${import.meta.env.VITE_API}/update_hospital/${id}`, input.value, config);
            input.value = response.data.data
            $toast.success('Hospital has been updated successfully', {
                position: "top-right"
            })
            setTimeout(() => {
                window.location.reload()

            }, 1000)
        } catch (err) {
            is_loading.value = false
            alert(err.response.data.data.message);
            $toast.error(err.response.data.data.message, {
                position: "top-right"
            })
        }
    }


    const delete_hospital = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.delete(`${import.meta.env.VITE_API}/delete_hospital/${id}`, config);
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
        count_hospital,
        is_loading,
        edit_hospital,
        update_hospital,


    }
}

// 100982140769-4ifdcsntgsqhbars1ram20tlclbtrke8.apps.googleusercontent.com