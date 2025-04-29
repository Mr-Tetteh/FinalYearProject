import {reactive, ref} from "vue";
import router from "@/router/index.js";
import axios from "axios";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
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

    const record = ref({
        history: '',
        examination_findings: '',
        diagnosis: '',
        treatment: '',
        respiratory_rate: '',
        blood_pressure: '',
        blood_and_sugar_rate: '',
        temperature: '',
        pulse_rate: '',
        weight: '',
        admitted: '',
        labs: '',
        ward_number: '',
        additional_notes: '',
        lab1: '',
        lab1_results: [],
        lab2: '',
        lab2_results: [],
        lab3: '',
        lab3_results: [],
        lab4: '',
        lab4_results: [],
        lab5: '',
        lab5_results: [],
        lab6: '',
        lab6_results: [],
        lab7: '',
        lab7_results: [],
        lab8: '',
        lab8_results: [],
        lab9: '',
        lab9_results: [],
        lab10: '',
        lab10_results: [],
    });


    const patient = ref('')
    const all_hospital_patient = ref('');
    const patient_record = ref('')
    const all_today_patient = ref()
    const patient_update = ref(null)

    const register_patient = async () => {
        const requiredFields = [
            "first_name",
            "last_name",
            "gender",
            "date_of_birth",
            "contact",
            "address",
            "guardian1_first_name",
            "guardian1_last_name" ,
            "guardian1_relation",
            "guardian1_residence",
            "guardian1_contact",
        ]
        for (const field of requiredFields) {
            if (!input.value[field]) {
                $toast.error(`Please fill in the ${field.replace(/_/g, ' ')} field.`, {
                    position: 'top-right'
                });
                return;
            }
        }
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            let response = await axios.post('https://health.local.stay/api/add_patient', input.value, config)
            $toast.success('patient Registered Successfully', {
                position: "top-right"
            })
            await router.push('/hospital_patient')
        } catch (err) {
            $toast.error(err.response.data.message, {
                position: "top-right"
            })
        }
    }

    const editPatient = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            let response = await axios.get(`https://health.local.stay/api/edit_patient/${id}`, config)
            input.value = response.data.data
        } catch (err) {
            alert(err.response.data.data)
        }
    }
    const activatePatient = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            let response = await axios.patch(`https://health.local.stay/api/activate_patient/${id}`, input.value, config)
            $toast.success('Patient Activated Successfully', {
                position: "top-right"
            })
            window.location.reload()
        } catch (err) {
            alert(err.response.data.data)
        }
    }


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

    const list_patients = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            let response = await axios.get('https://health.local.stay/api/all_patient', config)
            patient.value = response.data.data
        } catch (err) {
            alert(err.response.data.data)
        }
    }
    const today_patient_count = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            let response = await axios.get('https://health.local.stay/api/today_patient_count', config)
            all_today_patient.value = response.data
        } catch (err) {
            alert(err.response.data.data)
        }
    }

    const edit = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: { Authorization: `Bearer ${token}` },
            };
            let response = await axios.get(`https://health.local.stay/api/patient_record_edit/${id}`, config);
            record.value = response.data.data;
        } catch (err) {
            const errorMsg =
                err?.response?.data?.message || 'Failed to fetch patient record';
            alert(errorMsg);
        }
    };

    const handleFileUpload = (event, labNumber) => {
        const files = event.target.files;
        const fileArray = Array.from(files);
        record[`lab${labNumber}_results`] = fileArray;
    };


    const update_record = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: { Authorization: `Bearer ${token}` },
            };
            let response = await axios.patch(`https://health.local.stay/api/patient_record_update/${id}`, record.value, config);
             $toast.success('Patient Record Add Successfully', {
                 position: 'top-right',
             });
             setTimeout(() => {
                 router.push('/hospital_patient')
             },1000)
        } catch (err) {
            alert(err.response.data.data)
        }
    };

    const hospital_patient = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            let response = await axios.get('https://health.local.stay/api/hospital_patients', config)
            all_hospital_patient.value = response.data.data
        } catch (err) {
            alert(err.response.data.data)
        }
    }


    return {
        register_patient,
        input,
        patient,
        list_patients,
        hospital_patient,
        all_hospital_patient,
        patient_record,
        list_patients_record,
        all_today_patient,
        today_patient_count,
        update_record,
        edit,
        record,
        handleFileUpload,
        editPatient,
        activatePatient
    }
}