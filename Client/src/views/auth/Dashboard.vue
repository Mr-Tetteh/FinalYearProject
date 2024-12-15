<template>
  <div class="hospital-dashboard">
    <div class="d-flex">
      <!-- Sidebar -->
      <aside class="sidebar bg-light border-end vh-100 p-3">
        <h4 class="text-primary mb-4">Hospital Admin</h4>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="#" class="nav-link active text-primary">Dashboard</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark">Patient Records</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark">Appointments</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark">Manage Staff</a>
          </li>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark">Reports</a>
          </li>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="content flex-grow-1 p-4 bg-light">
        <header class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="text-dark">Dashboard</h2>
          <div class="user-info d-flex align-items-center">
            <span class="me-2">Hello, Dr. Smith</span>
            <button class="btn btn-outline-primary btn-sm">Logout</button>
          </div>
        </header>

        <!-- Stat Cards -->
        <div class="row g-3 mb-4">
          <div class="col-md-3">
            <div class="card text-center border-0 shadow">
              <div class="card-body">
                <h6 class="card-title text-muted">Total Patients</h6>
                <h3 class="text-primary">1,234</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center border-0 shadow">
              <div class="card-body">
                <h6 class="card-title text-muted">Admitted Patients</h6>
                <h3 class="text-success">567</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center border-0 shadow">
              <div class="card-body">
                <h6 class="card-title text-muted">Total Revenue</h6>
                <h3 class="text-warning">$45,000</h3>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card text-center border-0 shadow">
              <div class="card-body">
                <h6 class="card-title text-muted">Pending Bills</h6>
                <h3 class="text-danger">$12,000</h3>
              </div>
            </div>
          </div>
        </div>

        <!-- Forms Section -->
        <div class="row g-4">
          <div class="col-md-6">
            <div class="card border-0 shadow p-3">
              <h5 class="card-title">Schedule Appointment</h5>
              <form>
                <div class="mb-3">
                  <label for="patient-name" class="form-label">Patient Name</label>
                  <input type="text" id="patient-name" class="form-control" placeholder="Enter patient name" />
                </div>
                <div class="mb-3">
                  <label for="appointment-date" class="form-label">Appointment Date</label>
                  <input type="date" id="appointment-date" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary w-100">Schedule</button>
              </form>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card border-0 shadow p-3">
              <h5 class="card-title">Generate Report</h5>
              <form>
                <div class="mb-3">
                  <label for="report-type" class="form-label">Report Type</label>
                  <select id="report-type" class="form-select">
                    <option>Daily</option>
                    <option>Weekly</option>
                    <option>Monthly</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-secondary w-100">Generate</button>
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
// No JavaScript required for now
</script>

<style scoped>
.sidebar {
  width: 250px;
}
.card {
  border-radius: 8px;
}
</style>
