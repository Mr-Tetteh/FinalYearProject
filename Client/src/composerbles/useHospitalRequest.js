import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import {ref} from "vue";
import axios from "axios";
import {$t} from "@primeuix/themes";

const $toast = useToast();
export default function useHospitalRequest() {
    const input = ref({
        email: "",
        unique_id: "",
        contact: "",
        hospital: "",
    })

    const requestHospital = async () => {
        try {
            const response = await axios.post(`${import.meta.env.VITE_API}/create/request`, input.value);

            $toast.success('Hospital request sent successfully!', {
                duration: 5000,
                position: 'top-right',
            });
        } catch (error) {
           $toast.error(error.response.data.message, {position: 'top-right', duration: 5000});
        }
    }
    return {
        input,
        requestHospital
    }
}