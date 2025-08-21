import {ref} from "vue";
import axios from "axios";
import router from "@/router/index.js";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

export default function usePatientRecord() {
    const input = ref({
        patient_id: '',
        temperature: '',
        pulse_rate: '',
        respiratory_rate: '',
        blood_pressure: '',
        weight: '',
        spo2: '',
        fbs: '',
        rbs: '',
        nurse_additional_notes: '',
        history: '',
        examination_findings: '',
        diagnosis: '',
        investigations: '',
        treatment: '',
        doctor_additional_notes: '',
        medication_notes: '',
        pharmacists_notes: '',
        prescription_notes: '',
        pharmacist_additional_notes: '',
    });

    const patient_record = ref('')
    const list_patients_record = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            let response = await axios.get(`${import.meta.env.VITE_API}/patient_record/${id}`, config)
            patient_record.value = response.data.data
        } catch (err) {
            alert(err.response.data.data)
        }
    }
    const upload_record = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data',
                },
            };

            await axios.post(`${import.meta.env.VITE_API}/patient_rec/${id}`, input.value, config);

            await router.push('/hospital_patient');
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: 'top-right',
            })
        }
    }

    const edit = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: {Authorization: `Bearer ${token}`},
            };
            let response = await axios.get(`${import.meta.env.VITE_API}/patient_record_edit/${id}`, config);
            input.value = response.data.data;
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

            let response = await axios.patch(`${import.meta.env.VITE_API}/patient_record_update/${id}`, input.value, config);
            $toast.success('Patient Record Updated Successfully', {
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
        input,
        patient_record,
        list_patients_record,
        upload_record

    }
}