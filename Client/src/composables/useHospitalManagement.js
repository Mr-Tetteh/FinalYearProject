import {ref} from "vue";
import {useToast} from "vue-toast-notification";
import axios from "axios";

const toast = useToast();

export default function useHospitalManagement() {
    const lab = ref({
        hospital_id: localStorage.getItem("HOSPITAL_ID"),
        name: "",
        price: ""
    });
    const service = ref({
        hospital_id: localStorage.getItem("HOSPITAL_ID"),
        name: "",
        price: ""
    })

    const services = ref([])

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

        } catch (err) {
            toast.error(err.response?.data?.message || "Something went wrong");
        }
    };

    const fetchLab = async (hospital_id) => {
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            };

            const hospital_id = localStorage.getItem("HOSPITAL_ID");

            const {data} = await axios.get(
                `${import.meta.env.VITE_API}/fetchLab/${hospital_id}`,
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


    const makeService = async () => {
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: { Authorization: `Bearer ${token}` }
            };

            const { data } = await axios.post(
                `${import.meta.env.VITE_API}/service/create`, // ✅ remove /${id}
                service.value,   // ✅ send service, not services
                config
            );

            toast.success("Service created successfully", { position: "top-right" });

            // update UI without reload
            services.value.push(data.data);

            // reset form
            service.value = {
                hospital_id: localStorage.getItem("HOSPITAL_ID"),
                name: "",
                price: ""
            };

        } catch (err) {
            toast.error(err.response?.data?.message || "Something went wrong");
        }
    }

    const fetchService = async () => {
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: { Authorization: `Bearer ${token}` }
            };

            const hospital_id = localStorage.getItem("HOSPITAL_ID");

            const { data } = await axios.get(
                `${import.meta.env.VITE_API}/fetchService/${hospital_id}`,
                config
            );

            services.value = data.data;  // ✅ now array
        } catch (err) {
            toast.error("Failed to fetch services");
        }
    }


    const editService = async (id) => {
        isEdit.value = true
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            };
            const {data} = await axios.get(
                `${import.meta.env.VITE_API}/editService/${id}`,
                config
            );
            service.value = data.data;
        } catch (err) {
            toast.error("Failed to fetch labs");
        }
    }

    const updateService = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const config = {
                headers: {Authorization: `Bearer ${token}`},
            };
            let response = await axios.put(
                `${import.meta.env.VITE_API}/updateService/${id}`, service.value,
                config
            );
            toast.success("Service updated successfully", {
                position: 'top-right'
            })
            setTimeout(() => {
                window.location.reload()
            }, 1000)
        } catch (err) {
            toast.error("Failed to fetch labs");
        }
    }
    const deleteService = async (id) => {
        try {
            const token = localStorage.getItem("AUTH_TOKEN");
            const config = {
                headers: {Authorization: `Bearer ${token}`}
            };
            await axios.delete(`${import.meta.env.VITE_API}/deleteService/${id}`, config);
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
        updateService,
        deleteService,
        fetchService,
        makeLab,
        lab,
        labs,
        isEdit,
        fetchLab,
        deleteLabManagement,
        editLab,
        updateLabRec,
        makeService,
        service,
        editService,
        services

    };
}
