<script setup>

import usePatients from "@/composerbles/usePatients.js";
import {computed, onMounted, ref} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import ActivatePatient from "@/components/activatePatient.vue";
import useAuth from "@/composerbles/useAuth.js";
import useSession from "@/composerbles/useSession.js";
import patient_card from "@/views/Admin/patients/Patient_card.vue";

const selectedPatientId = ref(null);
const modal = ref(false);
const searchQuery = ref('')
const {hospital_patient, all_hospital_patient, list_patients} = usePatients()

const activate_patient = (patient) => {
  selectedPatientId.value = patient.id;
  modal.value = true
}
onMounted(hospital_patient)

const searchResults = computed(() => {
  if (!searchQuery.value || !all_hospital_patient.value) return all_hospital_patient.value;

  const searched = searchQuery.value.toLowerCase();
  return all_hospital_patient.value.filter(patient => {
    const patientId = (patient.patient_number || '').toLowerCase();
    return patientId.includes(searched);
  });
});

const {userRole} = useSession()
</script>

<template>
  <AdminNavBar/>
  <div class="main min-vh-100 bg-light">
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-content px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h3 class="mb-2">Patient Directory</h3>
            <p class="text-muted">Manage and view all patient records</p>
          </div>
          <RouterLink to="patients" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Add New Patient
          </RouterLink>
        </div>

        <!-- Table Card -->
        <div class="card shadow-sm" v-if="all_hospital_patient.length > 0">
          <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">Patient List</h5>
              <div class="search-box">
                <div class="input-group">
                  <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                  </span>
                  <input
                      type="text"
                      v-model="searchQuery"
                      class="form-control border-start-0"
                      placeholder="Search patients ID.."
                  >
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="bg-light">
                <tr>
                  <th class="py-3">Full Name</th>
                  <th class="py-3">Patient ID</th>
                  <th class="py-3">Status</th>
                  <th class="py-3">Gender</th>
                  <th class="py-3">Date of Birth</th>
                  <th class="py-3">Allergies</th>
                  <th class="py-3">Medical Conditions</th>
                  <th class="py-3">Additional Notes</th>
                  <th class="py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in searchResults" :key="item.id">
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-initial me-3 rounded-circle bg-primary bg-opacity-10 text-primary">
                        {{ item.first_name[0] }}{{ item.last_name[0] }}
                      </div>
                      <div class="fw-medium">{{ item.first_name }} {{ item.other_name }} {{ item.last_name }}</div>
                    </div>
                  </td>
                  <td>
                      <span class="badge bg-secondary bg-opacity-10 text-secondary">
                        {{ item.patient_number }}
                      </span>
                  </td>

                  <td>
                      <span v-if="item.status == false" class="badge bg-secondary bg-opacity-10 text-secondary">
                        Inactive
                      </span>
                    <span v-else class="badge bg-success  text-dark">
                        Active
                      </span>
                  </td>
                  <td>{{ item.gender }}</td>
                  <td>{{ item.date_of_birth }}</td>
                  <td>
                      <span v-if="item.allergies" class="badge bg-danger bg-opacity-10 text-danger">
                        {{ item.allergies }}
                      </span>
                    <span v-else class="text-muted">None</span>
                  </td>
                  <td>
                      <span v-if="item.medical_history" class="badge bg-primary bg-opacity-10 text-black ">
                        {{ item.medical_history }}
                      </span>
                    <span v-else class="text-muted">None</span>
                  </td>
                  <td>
                      <span v-if="item.additional_notes" class="text-truncate d-inline-block" style="max-width: 150px;">
                        {{ item.additional_notes }}
                      </span>
                    <span v-else class="text-muted">No notes</span>
                  </td>
                  <td>
                    <div class="d-flex gap-2">

                      <RouterLink :to="{name: 'patient.card', params: {id: item.id} }"  v-if="userRole === 'Receptionist'"  class="btn btn-light-info btn-sm">
                        <i class="bi bi-pencil-square"></i>
                        Print Card
                      </RouterLink>

                      <button v-if="item.status == false && userRole === 'Nurse'"  class="btn btn-info btn-sm" @click="activate_patient(item)">
                        <i class="bi bi-pencil-square"></i>
                        Activate Patient
                      </button>

                      <RouterLink v-if="item.status == true && userRole === 'Nurse'"
                                  :to="{ name: 'patients.file_add', params: { id: item.id} }"
                                  class="btn btn-secondary btn-sm"
                      >
                        <i class="bi bi-plus-circle me-1"></i>

                        New Medical Record
                      </RouterLink>

                      <RouterLink v-if="userRole !== 'Receptionist'" :to="{name: 'patients.list_all', params: {id: item.id}}"
                                  class="btn btn-primary btn-sm">
                        Past Medical History
                      </RouterLink>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div v-if="modal" class="modal-overlay">
            <div class="modal-content">
              <activate-patient v-if="modal" v-model="modal" :id="selectedPatientId"/>
            </div>
          </div>
        </div>

        <div v-if="!searchResults?.length" class="text-center py-5">
          <div class="container mx-auto" style="max-width: 28rem;">
            <svg class="mb-4" style="width: 4rem; height: 4rem; color: #94a3b8;" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" width="64">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <h3 class="h5 fw-semibold text-secondary mb-2">
              {{ searchQuery ? 'No patients found' : 'No patients registered' }}
            </h3>
            <p class="text-muted small">
              {{
                searchQuery ? 'Try adjusting your search criteria.' : 'Get started by registering your first patient.'
              }}
            </p>
            <div v-if="searchQuery" class="mt-4">
              <button
                  @click="searchQuery = ''"
                  class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-2"
              >
                Clear search
              </button>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

</template>

<style scoped>

.page-content {
  max-width: 1400px;
  margin: 0 auto;
}

.search-box {
  width: 250px;
}

.avatar-initial {
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 500;
}

.table > :not(caption) > * > * {
  padding: 1rem;
}

.badge {
  padding: 0.5rem 1rem;
  font-weight: 500;
}

.btn-sm {
  padding: 0.4rem 0.8rem;
}

/* Custom hover effect for buttons */
.btn {
  transition: all 0.2s;
}

.btn:hover {
  transform: translateY(-1px);
}

/* Remove border from search input group */
.input-group:focus-within {
  box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
  border-radius: 0.375rem;
}

.input-group:focus-within .input-group-text,
.input-group:focus-within .form-control {
  border-color: #86b7fe;
}

.input-group .form-control:focus {
  box-shadow: none;
  border-color: #86b7fe;
}


.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* semi-transparent background */
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999; /* make sure it’s on top */
}

.modal-content {
  background-color: white;
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  width: 600px;
  max-width: 95%;
}
</style>