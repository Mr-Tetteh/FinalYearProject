import {ref} from "vue";
import router from "@/router/index.js";
import axios from "axios";
import toast from "bootstrap/js/src/toast.js";

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
        guardian1_first_name: "",
        guardian1_last_name: "",
        guardian1_other_names: "",
        guardian1_relation: "",
        guardian1_residence: "",
        guardian1_contact: "",
        guardian2_first_name: "",
        guardian2_last_name: "",
        guardian2_other_names: "",
        guardian2_relation: "",
        guardian2_residence: "",
        guardian2_contact: "",
    });



    const patient = ref('')
    const all_hospital_patient = ref('');
    const patient_record = ref('')

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



    const list_patients_record = async  (id) =>{
        try{
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            let response = await axios.get(`https://health.local.stay/api/patient_record/${id}`,config)
            patient_record.value =  response.data.data
        }catch(err) {
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

    const hospital_patient = async  () =>{
        try{
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            let response = await axios.get('https://health.local.stay/api/hospital_patients',config)
            all_hospital_patient.value =  response.data.data
        }catch(err) {
            alert(err.response.data.data)
        }
    }


    return{
        register_patient,
        input,
        patient,
       list_patients,
        hospital_patient,
        all_hospital_patient,
        patient_record,
        list_patients_record
    }
}