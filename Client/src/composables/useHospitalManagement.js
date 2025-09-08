import {ref} from "vue";
import {useToast} from "vue-toast-notification";
import axios from "axios";

const toast = useToast();

export default function useHospitalManagement() {
    const lab = ref({
        name: "",
        price: ""
    });
    const labs = ref([]);   // 👈 array for table
    const isEdit = ref(false);

    const makeLab = async () => {
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            };

            const {data} = await axios.post(
                `${import.meta.env.VITE_API}/lab/create`,
                lab.value,
                config
            );

            toast.success("Lab created successfully", {position: "top-right"});
            setTimeout(() => {
                window.location.reload()
            }, 1000)

            // reset form
            /*            lab.value = { name: "", price: "" };

                        labs.value.push(data.lab);*/

        } catch (err) {
            toast.error(err.response?.data?.message || "Something went wrong");
        }
    };

    const fetchLab = async () => {
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            };

            const {data} = await axios.get(
                `${import.meta.env.VITE_API}/fetchLab`,
                config
            );
            labs.value = data.data;
        } catch (err) {
            toast.error("Failed to fetch labs");
        }
    };

    const editLab = async (id) => {
        isEdit.value = true
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            };
            const {data} = await axios.get(
                `${import.meta.env.VITE_API}/edit/${id}`,
                config
            );
            lab.value = data.data;
        } catch (err) {
            toast.error("Failed to fetch labs");
        }
    }
    const updateLabRec = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: {Authorization: `Bearer ${token}`},
            };
            let response = await axios.put(
                `${import.meta.env.VITE_API}/update/${id}`, lab.value,
                config
            );
            toast.success("Lab updated successfully", {
                position: 'top-right'
            })
            setTimeout(() => {
                window.location.reload()
            }, 1000)
        } catch (err) {
            toast.error("Failed to fetch labs");
        }
    }


    const deleteLabManagement = async (id) => {
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            };
            await axios.delete(`${import.meta.env.VITE_API}/lab/${id}`, config);
            toast.success("Lab deleted successfully", {
                position: 'top-right'
            });
            setTimeout(() => {
                window.location.reload()
            }, 2000)
        } catch (err) {
            toast.error("Failed to delete lab");
        }
    };

    return {
        makeLab,
        lab,
        labs,
        isEdit,
        fetchLab,
        deleteLabManagement,
        editLab,
        updateLabRec
    };
}
