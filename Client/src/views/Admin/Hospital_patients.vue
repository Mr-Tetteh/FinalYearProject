<script setup>

import usePatients from "@/composerbles/usePatients.js";
import {onMounted} from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";




const {hospital_patient, all_hospital_patient, list_patients} = usePatients()
onMounted(hospital_patient)


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
        <div class="card shadow-sm">
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
                      placeholder="Search patients..."
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
                  <th class="py-3">Gender</th>
                  <th class="py-3">Date of Birth</th>
                  <th class="py-3">Allergies</th>
                  <th class="py-3">Medical Conditions</th>
                  <th class="py-3">Additional Notes</th>
                  <th class="py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in all_hospital_patient" :key="item.id">
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
                  <td>{{ item.gender }}</td>
                  <td>{{ item.date_of_birth }}</td>
                  <td>
                      <span v-if="item.allergies" class="badge bg-danger bg-opacity-10 text-danger">
                        {{ item.allergies }}
                      </span>
                    <span v-else class="text-muted">None</span>
                  </td>
                  <td>
                      <span v-if="item.medical_history" class="badge bg-warning bg-opacity-10 text-warning">
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
                      <button class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square me-1"></i>
                        Edit
                      </button>
                      <button class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>
                        Form
                      </button>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
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
</style>