<script setup>
import AdminNavBar from "@/components/AdminNavBar.vue";
import useAuth from "@/composerbles/useAuth.js";
import { onMounted, ref } from "vue";
import UpdateUserRole from "@/components/updateUserRole.vue";

const { all_users, users, delete_user } = useAuth();

const searchQuery = ref('');
const modal = ref(false);
const selectedUserId = ref(null); // Add this line to track the selected user ID
onMounted(users);


const openEditModal = (user) => {
  selectedUserId.value = user.id; // Store the user ID when opening modal
  modal.value = true;
};
</script>

<template>
  <AdminNavBar />
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
            <h3 class="mb-2">User Directory</h3>
            <p class="text-muted">Manage and view all user accounts</p>
          </div>
          <RouterLink class="btn btn-primary" to="register">
            <i class="bi bi-plus-circle me-2"></i>
            Add New Staff
          </RouterLink>
        </div>

        <!-- Table Card -->
        <div class="card shadow-sm">
          <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">User List</h5>
              <div class="search-box">
                <div class="input-group">
                  <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                  </span>
                  <input
                      type="text"
                      v-model="searchQuery"
                      class="form-control border-start-0"
                      placeholder="Search users..."
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
                  <th class="py-3">Date of Birth</th>
                  <th class="py-3">Gender</th>
                  <th class="py-3">Role</th>
                  <th class="py-3">Email</th>
                  <th class="py-3">Hospital</th>
                  <th class="py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in all_users" :key="item.email">
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar-initial me-3 rounded-circle bg-primary bg-opacity-10 text-primary">
                        {{ item.first_name[0] }}{{ item.last_name[0] }}
                      </div>
                      <div class="fw-medium">{{ item.first_name }} {{ item.last_name }}</div>
                    </div>
                  </td>
                  <td>{{ item.birthday }}</td>
                  <td>{{ item.gender }}</td>
                  <td>
                  <span class="badge rounded-pill" :class="{
                      'bg-primary text-white': item.role === 'Doctor',
                      'bg-teal text-white': item.role === 'Nurse',
                      'bg-orange text-white': item.role === 'Account',
                      'bg-purple text-white': item.role === 'Pharmacist',
                      'bg-pink text-white': item.role === 'Manager',
                      'bg-secondary text-white': item.role === 'Lab Technician',
                      'bg-warning text-white': item.role === 'Accountant',
                      'bg-dark text-white': item.role === 'Admin',
                      'bg-success text-white': item.role === 'Receptionist'
                    }">
                      {{ item.role }}
                    </span>
                  </td>
                  <td>{{ item.email }}</td>
                  <td>
                      <span class="badge bg-primary bg-opacity-10 text-secondary">
                        {{ item.hospital_id }}
                      </span>
                  </td>
                  <td>
                    <div class="d-flex gap-2">
                      <button class="btn btn-warning btn-sm" @click="openEditModal(item)">
                        <i class="bi bi-pencil-square me-1"></i>
                        Edit
                      </button>
                      <button @click="delete_user(item.id)" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash me-1"></i>
                        Delete Staff
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

      <div v-if="modal" class="modal-overlay">
        <div class="modal-content">
          <update-user-role v-if="modal" v-model="modal" :id="selectedUserId"/>
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