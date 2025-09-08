<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import useHospitalRequest from "@/composables/useHospitalRequest.js";
import {computed, onMounted, ref} from "vue";
import UpdateStaffHospital from "@/components/updateStaffHospital.vue";
import UpdateHospitalRequest from "@/components/updateHospitalRequest.vue";

const {staff_request_hospitals_data, staff_request_hospital, delete_request} = useHospitalRequest()
const searchQuery = ref('')
const selectedUserId = ref(null)
const modal = ref(false)

onMounted(() => {
  staff_request_hospital()
})

const openEditModal = (staff) => {
  modal.value = true
  selectedUserId.value = staff.id
}


const searchResults = computed(() => {
  if (!searchQuery.value || !staff_request_hospitals_data.value) {
    return staff_request_hospitals_data.value
  }

  const searched = searchQuery.value.toLowerCase()
  return staff_request_hospitals_data.value.filter(staff => {
    const unique_id = (staff.unique_id || '').toLowerCase()
    return unique_id.includes(searched)
  })
})
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
            <h3 class="mb-2">Request Directory</h3>

            <p class="text-muted">Manage and view all request from workers</p>
          </div>

        </div>

        <!-- Table Card -->
        <div class="card shadow-sm">
          <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">Request List</h5>

              <div class="search-box">
                <div class="input-group">
                  <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                  </span>
                  <input
                      type="text"
                      v-model="searchQuery"
                      class="form-control border-start-0"
                      placeholder="Search staff..."
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
                  <th class="py-3">Unique ID</th>
                  <th class="py-3">Email</th>
                  <th class="py-3">Contact</th>
                  <th class="py-3">Hospital</th>
                  <th class="py-3">Status</th>
                  <th class="py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in searchResults" :key="item.id">
                  <td>
                    {{ item.unique_id }}
                  </td>
                  <td>{{ item.email }}</td>
                  <td>{{ item.contact }}</td>
                  <td>{{ item.hospital }}</td>
                  <td>
                    <span class="badge rounded-pill"
                          :class="{
                          'bg-success text-white': item.status === 'approved',
                          'bg-primary text-white': item.status === 'rejected',
                          'bg-warning text-white': item.status === 'pending',
                    }">
                      {{ item.status }}
                    </span>
                  </td>
                  <td>
                    <div class="d-flex gap-2">
                      <button class="btn btn-warning btn-sm" @click="openEditModal(item)">
                        <i class="bi bi-pencil-square me-1"></i>
                        Edit
                      </button>
                      <button @click="delete_request(item.id)" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash me-1"></i>
                        Delete Staff
                      </button>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <div v-if="modal" class="modal-overlay">
              <div class="modal-content">
                <update-hospital-request v-if="modal" v-model="modal" :id="selectedUserId"/>

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
                  {{ searchQuery ? 'No Staff found' : 'No request found' }}
                </h3>
                <p class="text-muted small">
                  {{
                    searchQuery ? 'Try adjusting your search criteria.' : 'Get started by filling out a first request.'
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

.badge {
  padding: 0.5rem 1rem;
  font-weight: 500;
}

.bg-teal {
  background-color: #20c997;
}

.bg-orange {
  background-color: #fd7e14;
}

.bg-purple {
  background-color: #6f42c1;
}

.bg-pink {
  background-color: #d63384;
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