<script setup>
import useSession from "@/composables/useSession.js";
import {computed, onMounted, ref} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import useAuth from "@/composables/useAuth.js";
import usePatients from "@/composables/usePatients.js";
import useHospital from "@/composables/useHospital.js";

const {username, lastname, hospital} = useSession();
const {hospital_patient, all_hospital_patient, list_patients, patient,  all_today_patient, today_patient_count} = usePatients()
const {hospital_patient_count, count_hospital_patient, count_all_patient, count_all_patient_on_swift,
  count_all_users, count_all_users_on_swift,hospital_users, count_all_hospital_users, count_all_hospitals, count_hospital} = useHospital()

const {logout} = useAuth();
const {userRole} =  useSession();

const logout_user = async () => {
  await logout();
};
onMounted(hospital_patient, list_patients)
onMounted(() => {
  hospital_patient()
  list_patients()
  count_hospital_patient()
  count_all_patient()
  count_all_users()
  count_all_hospital_users()
  today_patient_count()
  count_hospital()
})

const firstNameCount = computed(() => {
  const patients = all_hospital_patient.value || [];
  return patients.filter(item => item.first_name).length;
});

const firstNameCountList = computed(() => {
  const patients = patient.value || [];
  return patients.filter(item => item.first_name).length;
});


// Mock data for charts (you can replace with real data)
const recentAppointments = ref([
  {id: 1, patient: 'John Doe', date: '2024-12-21', status: 'Confirmed'},
  {id: 2, patient: 'Jane Smith', date: '2024-12-22', status: 'Pending'},
  {id: 3, patient: 'Mike Johnson', date: '2024-12-23', status: 'Confirmed'},
]);

const appointmentForm = ref({
  patientName: '',
  appointmentDate: '',
  department: ''
});

const submitAppointment = () => {
  // Handle appointment submission
  console.log('Appointment submitted:', appointmentForm.value);
};
</script>

<template>
  <AdminNavBar/>

    <div  class="main min-vh-100 py-4 bg-light">
      <div id="main">
        <!-- Header Section -->
        <header class="dashboard-header mb-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>

              <h2 class="text-dark mb-1" v-if="userRole == 'Admin'">Admin Dashboard</h2>
              <h2 class="text-dark mb-1" v-else>{{ hospital }} Dashboard</h2>
              <p class="text-muted mb-0">Welcome back, {{userRole}} {{ username }}</p>
            </div>
            <div class="user-actions d-flex align-items-center gap-3">
              <div class="user-info d-flex align-items-center">
                <div class="avatar-circle me-2">{{ username[0].toUpperCase() }} {{ lastname[0].toUpperCase() }}</div>
                <span class="fw-medium">{{ username }}</span>
              </div>
              <button class="btn btn-outline-danger" @click="logout_user">
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
              </button>
            </div>
          </div>
        </header>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
          <div class="col-md-4" v-if="userRole !== 'Admin'">
            <div class="stat-card bg-white border-start border-primary border-4">
              <div class="stat-icon bg-primary-subtle">
                <i class="bi bi-people-fill text-primary"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Total <b>{{ hospital }}</b> Patients</h6>
                <h3 class="stat-value text-primary">{{ hospital_patient_count }}</h3>
              </div>
            </div>
          </div>
          <div v-if="userRole == 'Admin'" class="col-md-4">
            <div class="stat-card bg-white border-start border-secondary border-4">
              <div class="stat-icon text-secondary">
                <i class="bi bi-person-lines-fill text-secondary"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Total Number Of All Patients</h6>
                <h3 class="stat-value text-secondary">{{ count_all_patient_on_swift }}</h3>
              </div>
            </div>
          </div>

          <div class="col-md-4" v-if="userRole == 'Admin'" >
            <div class="stat-card bg-white border-start border-success border-4">
              <div class="stat-icon bg-success-subtle">
                <i class="bi bi-hospital-fill text-success"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Total Users/Staff On Swift</h6>
                <h3 class="stat-value text-success">{{ count_all_users_on_swift }}</h3>

              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="stat-card bg-white border-start border-warning border-4">
              <div class="stat-icon bg-warning-subtle">
                <i class="bi bi-person-workspace text-warning"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label" v-if="userRole === 'Admin'">Admin Users</h6>
                <h6 class="stat-label" v-else> <b>{{hospital}} </b> Users/Staff</h6>
                <h3 class="stat-value text-warning">{{hospital_users}}</h3>

              </div>
            </div>
          </div>

          <div class="col-md-4 " v-if="userRole == 'Admin'">
            <div class="stat-card bg-white border-start border-info border-4">
              <div class="stat-icon bg-info-subtle">
                <i class="bi bi-hospital-fill text-info"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label"> Total Hospitals</h6>
                <h3 class="stat-value text-info">{{count_all_hospitals}}</h3>

              </div>
            </div>
          </div>

          <div class="col-md-4 " v-if="userRole == 'Admin'">
            <div class="stat-card bg-white border-start border-primary border-4">
              <div class="stat-icon bg-primary-subtle">
                <i class="bi bi-calendar-check text-primary"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label"> Today's patients</h6>
                <h3 class="stat-value text-primary">{{all_today_patient}}</h3>

              </div>
            </div>
          </div>


          <div class="col-md-4" v-if="userRole !=='Admin'">
            <div class="stat-card bg-white border-start border-success border-4">
              <div class="stat-icon bg-success-subtle">
                <i class="bi bi-calendar-check text-success"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Today's <b> {{ hospital }}</b> patient</h6>
                <h3 class="stat-value text-success">{{all_today_patient}}</h3>
              </div>
            </div>
          </div>



<!--          <div class="col-md-4">
            <div class="stat-card bg-white border-start border-danger border-4">
              <div class="stat-icon bg-danger-subtle">
                <i class="bi bi-cash-stack text-danger"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Pending Bills</h6>
                <h3 class="stat-value text-danger">$12,000</h3>

              </div>
            </div>
          </div>-->
        </div>

        <!-- Main Content -->
        <div class="row g-4">
          <!-- Appointment Form -->

          <!-- Recent Appointments -->
        </div>
      </div>
    </div>
</template>

<style scoped>
.dashboard-header {
  background: white;
  padding: 1.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.avatar-circle {
  width: 40px;
  height: 40px;
  background: #435ebe;
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
}

.stat-card {
  padding: 1.5rem;
  border-radius: 0.5rem;
  display: flex;
  align-items: center;
  gap: 1rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.stat-icon {
  width: 48px;
  height: 48px;
  border-radius: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
}

.stat-details {
  flex: 1;
}

.stat-label {
  color: #6c757d;
  font-size: 0.875rem;
  margin-bottom: 0.5rem;
}

.stat-value {
  font-size: 1.5rem;
  font-weight: 600;
  margin-bottom: 0.25rem;
}

.stat-change {
  font-size: 0.875rem;
  display: flex;
  align-items: center;
}

.card {
  border-radius: 0.5rem;
  overflow: hidden;
}

.card-header {
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.input-group-text {
  border: none;
}

.form-control, .form-select {
  border: 1px solid rgba(0, 0, 0, 0.1);
}

.form-control:focus, .form-select:focus {
  border-color: #435ebe;
  box-shadow: 0 0 0 0.25rem rgba(67, 94, 190, 0.25);
}

.btn-group .btn {
  padding: 0.25rem 0.5rem;
}

.badge {
  padding: 0.5rem 1rem;
  font-weight: 500;
}

.table > :not(caption) > * > * {
  padding: 1rem;
}
</style>