import {ref} from "vue";
import router from "@/router/index.js";
import axios from "axios";

export default function usePatients() {

    const input = ref({
        first_name: "",
        last_name: "",
        other_name: "",
        patient_number: "",
        age: "",
        gender: "",
        hospital: "",
        date_of_birth: "",
        contact: "",
        email: "",
        address: "",
        medical_history: "",
        allergies: "",
        additional_notes: "",
    });
    const patient = ref('')

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



    const list_patients = async  () =>{
        try{
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            let response = await axios.get('https://health.local.stay/api/all_patient',config)
            patient.value =  response.data.data
        }catch(err) {
            alert(err.response.data.data)
        }
    }


    return{
        register_patient,
        input,
        patient,
       list_patients,
    }
}