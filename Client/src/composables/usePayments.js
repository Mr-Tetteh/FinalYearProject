import {ref} from "vue";
import axios from "axios";
import {useToast} from "vue-toast-notification";

export default function useHospitalManagement() {
    const consultation = ref([])   // not ref({})
    const drugs = ref()
    const toast = useToast();
    const latestPaymentRecord = ref()
    const HospitalPaymentRecord = ref([])

    const Payments = ref({
        reasonForPayment: '',
        selectedLabsIds: [],
        selectedDrugIds: [],
        consultationPrice: undefined,

    })


    const makePayment = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        const id = localStorage.getItem('HOSPITAL_ID')
        try {
            const response = await axios.post(`${import.meta.env.VITE_API}/make/payment/${id}`, Payments.value, config)
            toast.success('Payment made successfully', {
                position: "top-right"
            })
            window.location.href = '/admin/hospital/receipt'
        } catch (err) {
            toast.error(err.response.data.message)
        }
    }

    const fetch_drugs = async () => {
        try {
            const hospitalId = localStorage.getItem('HOSPITAL_ID')

            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/fetch_drugs/${hospitalId}`, config);
            drugs.value = response.data
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }
    const fetch_consultation = async () => {
        try {
            const hospitalId = localStorage.getItem('HOSPITAL_ID')

            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/fetchConsultation/${hospitalId}`, config);
            consultation.value = response.data.data

        } catch (err) {
            alert(err.response.data.data.message);
        }
    }

    const fetch_AllHospitalPayments = async () => {
        try {
            const hospitalId = localStorage.getItem('HOSPITAL_ID')

            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/fetch/HospitalPayments/${hospitalId}`, config);
            HospitalPaymentRecord.value = response.data.data
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }

    const fetch_Last_HospitalPayments = async () => {
        try {
            const hospitalId = localStorage.getItem('HOSPITAL_ID')

            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/fetch/lastPayment/${hospitalId}`, config);
            latestPaymentRecord.value = response.data.data
        } catch (err) {
            alert(err.response.data.data.message);
        }
    }


    return {
        makePayment,
        Payments,
        fetch_drugs,
        drugs,
        fetch_consultation,
        consultation,
        fetch_AllHospitalPayments,
        fetch_Last_HospitalPayments,
        latestPaymentRecord,
        HospitalPaymentRecord
    }
}