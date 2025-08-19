import { ref } from 'vue'
import axios from 'axios'
import {useToast} from 'vue-toast-notification';
const $toast = useToast()

export default function useSubType() {
    const sub_types_data = ref([])
    const plan_input = ref({
        hospital_id: "",
        subscription_type_id: "",
    })

    const sub_types = async () => {
        try {
            let response = await axios.get(`${import.meta.env.VITE_API}/subscription_types`)
            sub_types_data.value = response.data.data
        } catch (err) {
            $toast.error(err.response?.data?.message || 'Failed to fetch subscription types')
        }
    }

    const init_payment = async () => {
        try {
            const payload = {
                hospital_id: plan_input.value.hospital_id,
                subtype_id: plan_input.value.subscription_type_id,
            }

            const response = await axios.post(
                `${import.meta.env.VITE_API}/paystack/initialize`,
                payload
            )

            window.location.href = response.data.data.authorization_url
        } catch (err) {
            $toast.error(err.response?.data?.message || 'Payment initialization failed')
        }
    }

    return {
        sub_types_data,
        sub_types,
        plan_input,
        init_payment,
    }
}
