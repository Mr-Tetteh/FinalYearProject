import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import {ref} from "vue";
import axios from "axios";
import {$t} from "@primeuix/themes";

const $toast = useToast();
const request_hospitals_data = ref()
const staff_request_hospitals_data = ref()
const request_view_data = ref({
    'unique_id': '',
    'email': '',
    'contact': '',
    'hospital': '',
    'status': '',
    'reason_for_rejection': ''
})
const is_loading = ref(false)

const input = ref({
    unique_id: "",
})
export default function useHospitalRequest() {
    const input = ref({
        unique_id: "",
        hospital: "",
    })

    const requestHospital = async () => {
        try {

            const response = await axios.post(`${import.meta.env.VITE_API}/create/request`, input.value);

            $toast.success('Hospital request sent successfully!', {
                duration: 5000,
                position: 'top-right',
            });
            setTimeout(() => {
                window.location.reload()
            }, 2000)
        } catch (error) {
            $toast.error(error.response.data.message, {position: 'top-right', duration: 5000});
        }
    }

    const staff_request_hospital = async () => {
        is_loading.value = true
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const id = localStorage.getItem('HOSPITAL_ID')
            const response = await axios.get(`${import.meta.env.VITE_API}/users_request_hospitals/${id}`, config);
            staff_request_hospitals_data.value = response.data.data
        } catch (err) {
            is_loading.value = false
            $toast.error(err.response.data.message);
        }
    }

    const request_view = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.get(`${import.meta.env.VITE_API}/request_view/${id}`, config);
            request_view_data.value = response.data.data
        } catch (err) {
            $toast.error(err.response.data.message);
        }
    }


    const update_request = async (id) => {
        is_loading.value = true
        try {

            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }

            const response = await axios.patch(`${import.meta.env.VITE_API}/request_update/${id}`, request_view_data.value, config);
            $toast.success('Hospital request updated successfully!', {
                duration: 5000,
                position: 'top-right',
            });
            setTimeout(() => {
                window.location.reload()
            }, 2000)
        } catch (error) {
            is_loading.value = false
            $toast.error(error.response.data.message, {position: 'top-right', duration: 5000});
        }
    }

    const request_hospital = async () => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            is_loading.value = true
            const response = await axios.get(`${import.meta.env.VITE_API}/request_hospitals`, config);
            request_hospitals_data.value = response.data.data
        } catch (err) {
            is_loading.value = false
            $toast.error(err.response.data.message);
        }
    }

    const  delete_request = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN')
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            }
            const response = await axios.delete(`${import.meta.env.VITE_API}/delete/${id}`, config)
            $toast.success('Request deleted sucessfully', {
                position: "top-right"
            })
            setTimeout(() => {
                window.location.reload()
            }, 2000)

        }catch (error){
            $toast.error('Sorry an error Occurred')
        }
    }


    return {
        input,
        requestHospital,
        request_hospitals_data,
        request_hospital,
        staff_request_hospital,
        staff_request_hospitals_data,
        request_view_data,
        request_view,
        update_request,
        is_loading,
        delete_request

    }
}