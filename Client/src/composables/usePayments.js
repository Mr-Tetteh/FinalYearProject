import {ref} from "vue";
export default function useHospitalManagement() {
    const consultationTrue = ref()
    const consultationFalse = ref()
    const labsTrue = ref()
    const labsFalse = ref()
    const drugs = ref()
    const labsPayments = ref()
    const drugsPayments = ref()
    const paymentss = ref()
    const latestRecord = ref()


    const Payments = ref({
        reasonForPayment: '', // Already correct
        insuranceCover: null,
        selectedLabsTrueIds: [],
        selectedLabsFalseIds: [],
        selectedDrugIds: [],
        consultationTruePrice: undefined,
        consultationFalsePrice: undefined
    })



    const makePayment = async () => {
        const token = localStorage.getItem('AUTH_TOKEN')
        const config = {
            headers: {Authorization: `Bearer ${token}`}
        }
        try {
            const response = await axios.post(`${import.meta.env.VITE_API}/make/payment`, Payments.value, config)
            $toast.success('Payment made successfully', {
                position: "top-right"
            })
        } catch (err) {
            $toast.error(err.response.data.message)
        }
    }



    return{
        makePayment,
        Payments
    }
}