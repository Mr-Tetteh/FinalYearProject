import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

export default function usePatientRecord() {
    const record = ref({
        nurse_note: '',
        doctor_notes: 'History: Diagnosis: Treatment: Investigation: Additional Note: ',
        pharmacists_notes: '',
        lab_tech_notes: ''
    });

    const patient_record = ref('')

    const list_patients_record = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            let response = await axios.get(`https://health.local.stay/api/patient_record/${id}`, config)
            patient_record.value = response.data.data
        } catch (err) {
            alert(err.response.data.data)
        }
    }

    const edit = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: {Authorization: `Bearer ${token}`},
            };
            let response = await axios.get(`https://health.local.stay/api/patient_record_edit/${id}`, config);
            record.value = response.data.data;
        } catch (err) {
            const errorMsg =
                err?.response?.data?.message || 'Failed to fetch patient record';
            alert(errorMsg);
        }
    };


    const update_record = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: {Authorization: `Bearer ${token}`},
            };

            let response = await axios.patch(`https://health.local.stay/api/patient_record_update/${id}`, record.value, config);
            $toast.success('Patient Record Add Successfully', {
                position: 'top-right',
            });
            setTimeout(() => {
                router.push('/hospital_patient')
            }, 1000)
        } catch (err) {
            alert(err.response.data.data)
        }
    };


    return {
        update_record,
        edit,
        record,
        patient_record,
        list_patients_record,

    }
}