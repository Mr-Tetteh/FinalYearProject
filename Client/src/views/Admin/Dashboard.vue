<script setup>
import useSession from "@/composerbles/useSession.js";
import { onMounted, ref } from "vue";
import AdminNavBar from "@/components/AdminNavBar.vue";
import useAuth from "@/composerbles/useAuth.js";

const { username,lastname, hospital } = useSession();
const { logout } = useAuth();

const logout_user = async () => {
  await logout();
};

// Mock data for charts (you can replace with real data)
const recentAppointments = ref([
  { id: 1, patient: 'John Doe', date: '2024-12-21', status: 'Confirmed' },
  { id: 2, patient: 'Jane Smith', date: '2024-12-22', status: 'Pending' },
  { id: 3, patient: 'Mike Johnson', date: '2024-12-23', status: 'Confirmed' },
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
  <AdminNavBar />

  <div id="app">
    <div id="main" class="bg-light min-vh-100 py-4">
      <div class="container-fluid px-4">
        <!-- Header Section -->
        <header class="dashboard-header mb-4">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h2 class="text-dark mb-1">{{ hospital }} Dashboard</h2>
              <p class="text-muted mb-0">Welcome back, {{ username }}</p>
            </div>
            <div class="user-actions d-flex align-items-center gap-3">
              <div class="user-info d-flex align-items-center">
                <div class="avatar-circle me-2">{{ username[0].toUpperCase() }} {{lastname[0].toUpperCase()}}</div>
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
          <div class="col-md-3">
            <div class="stat-card bg-white border-start border-primary border-4">
              <div class="stat-icon bg-primary-subtle">
                <i class="bi bi-people-fill text-primary"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Total Patients</h6>
                <h3 class="stat-value text-primary">1,234</h3>
                <p class="stat-change text-success mb-0">
                  <i class="bi bi-arrow-up-short"></i>
                  12% increase
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="stat-card bg-white border-start border-success border-4">
              <div class="stat-icon bg-success-subtle">
                <i class="bi bi-hospital-fill text-success"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Admitted Patients</h6>
                <h3 class="stat-value text-success">567</h3>
                <p class="stat-change text-success mb-0">
                  <i class="bi bi-arrow-up-short"></i>
                  8% increase
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="stat-card bg-white border-start border-warning border-4">
              <div class="stat-icon bg-warning-subtle">
                <i class="bi bi-currency-dollar text-warning"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Total Revenue</h6>
                <h3 class="stat-value text-warning">$45,000</h3>
                <p class="stat-change text-success mb-0">
                  <i class="bi bi-arrow-up-short"></i>
                  15% increase
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="stat-card bg-white border-start border-danger border-4">
              <div class="stat-icon bg-danger-subtle">
                <i class="bi bi-receipt text-danger"></i>
              </div>
              <div class="stat-details">
                <h6 class="stat-label">Pending Bills</h6>
                <h3 class="stat-value text-danger">$12,000</h3>
                <p class="stat-change text-danger mb-0">
                  <i class="bi bi-arrow-down-short"></i>
                  5% decrease
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Main Content -->
        <div class="row g-4">
          <!-- Appointment Form -->
          <div class="col-md-6">
            <div class="card border-0 shadow-sm">
              <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">
                  <i class="bi bi-calendar2-plus me-2"></i>
                  Schedule Appointment
                </h5>
              </div>
              <div class="card-body">
                <form @submit.prevent="submitAppointment">
                  <div class="mb-3">
                    <label class="form-label">Patient Name</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light">
                        <i class="bi bi-person"></i>
                      </span>
                      <input
                          v-model="appointmentForm.patientName"
                          type="text"
                          class="form-control"
                          placeholder="Enter patient name"
                      />
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Department</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light">
                        <i class="bi bi-building"></i>
                      </span>
                      <select v-model="appointmentForm.department" class="form-select">
                        <option value="">Select Department</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="neurology">Neurology</option>
                        <option value="orthopedics">Orthopedics</option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-4">
                    <label class="form-label">Appointment Date</label>
                    <div class="input-group">
                      <span class="input-group-text bg-light">
                        <i class="bi bi-calendar"></i>
                      </span>
                      <input
                          v-model="appointmentForm.appointmentDate"
                          type="date"
                          class="form-control"
                      />
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-check2-circle me-2"></i>
                    Schedule Appointment
                  </button>
                </form>
              </div>
            </div>
          </div>

          <!-- Recent Appointments -->
          <div class="col-md-6">
            <div class="card border-0 shadow-sm">
              <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">
                  <i class="bi bi-calendar2-week me-2"></i>
                  Recent Appointments
                </h5>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead class="bg-light">
                    <tr>
                      <th>Patient</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="appointment in recentAppointments" :key="appointment.id">
                      <td>{{ appointment.patient }}</td>
                      <td>{{ appointment.date }}</td>
                      <td>
                          <span
                              :class="[
                              'badge',
                              appointment.status === 'Confirmed'
                                ? 'bg-success-subtle text-success'
                                : 'bg-warning-subtle text-warning'
                            ]"
                          >
                            {{ appointment.status }}
                          </span>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i>
                          </button>
                          <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
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