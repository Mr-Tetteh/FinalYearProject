<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import usePatients from "@/composables/usePatients.js";
import {onMounted, ref} from "vue";

const {list_patients, patient} = usePatients();
const searchQuery = ref('');

onMounted(list_patients);
</script>

<template>
  <AdminNavBar/>
  <div class="main min-vh-100 bg-light">
    <div id="main">

      <div class="page-content px-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h3 class="mb-2">Patient Directory</h3>
            <p class="text-muted">Manage and view all patient records</p>
          </div>
        </div>

        <!-- Table Card -->
        <div class="card shadow-sm py-5">
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
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in patient" :key="item.id">
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
  max-width: 1600px;
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