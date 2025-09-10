Content is user-generated and unverified.
<script setup lang="ts">
import AdminNavBar from "@/components/AdminNavBar.vue";
import useHospitalManagement from "@/composables/useHospitalManagement"
import {onMounted} from "vue";

const {
  fetchService,
  makeService,
  deleteService,
  updateService,
  editService,
  service,
  services,
  isEdit
} = useHospitalManagement()

const handleSubmit = () => {
  makeService()
}
const update = (id: number) => {
  updateService(id)
}

onMounted(() => {
  fetchService()
})
</script>

<template>
  <AdminNavBar/>

  <div class="min-vh-100" style="background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);">
    <div id="main">
      <header class="mb-4 p-3">
        <a href="#" class="d-block d-xl-none">
          <i class="fs-3 bi bi-justify"></i>
        </a>
      </header>

      <!-- Side by side container -->
      <div class="row g-4 px-3 w-100 mx-0">

        <!-- Form Section -->
        <div class="col-lg-6">
          <div class="bg-white rounded-3 shadow-lg p-4">
            <h1 class="h3 fw-bold mb-4 d-flex align-items-center" style="color: #374151;">
              <span class="p-2 rounded-3 me-3" style="background-color: #dbeafe;">
                <i class="bi bi-plus-circle" style="color: #2563eb;"></i>
              </span>
              Service Management
            </h1>
            <form @submit.prevent="isEdit? update(service.id) : handleSubmit()">
              <div class="mb-3">
                <label for="serviceName" class="form-label fw-bold" style="color: #374151;">Name of Service:</label>
                <input type="text"
                       id="serviceName"
                       name="serviceName"
                       class="form-control form-control-lg border-secondary"
                       style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
                       v-model="service.name"
                       placeholder="Enter service name">
              </div>
              <div class="mb-3">
                <label for="serviceAmount" class="form-label fw-bold" style="color: #374151;">Service Amount:</label>
                <input type="number"
                       id="serviceAmount"
                       name="serviceAmount"
                       step="0.01"
                       class="form-control form-control-lg border-secondary"
                       style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
                       v-model="service.price"
                       placeholder="Enter fee amount">
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <button type="submit"
                        class="btn btn-lg w-100 text-white fw-bold shadow-lg"
                        style="background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%); transform: scale(1); transition: all 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.05)'"
                        onmouseout="this.style.transform='scale(1)'">
                  {{ isEdit ? 'Update Service' : 'Save Service' }}
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Table Section -->
        <div class="col-lg-6">
          <div class="bg-white rounded-3 shadow-lg p-4">
            <h1 class="h3 fw-bold mb-4 d-flex align-items-center justify-content-between" style="color: #374151;">
              <span class="d-flex align-items-center">
                <span class="p-2 rounded-3 me-3" style="background-color: #dcfce7;">
                  <i class="bi bi-table" style="color: #16a34a;"></i>
                </span>
                Service List
              </span>
              <!-- <span class="badge rounded-pill" style="background-color: #dbeafe; color: #1d4ed8;">
                {{ services.length }} service
              </span> -->
            </h1>

            <div class="table-responsive rounded-3 border border-secondary-subtle">
              <table class="table table-hover mb-0">
                <thead style="background-color: #f9fafb;">
                <tr>
                  <th class="px-3 py-3 fw-semibold text-uppercase"
                      style="color: #374151; font-size: 0.875rem; letter-spacing: 0.05em;">
                    Service Name
                  </th>
                  <th class="px-3 py-3 fw-semibold text-uppercase"
                      style="color: #374151; font-size: 0.875rem; letter-spacing: 0.05em;">
                    Service Amount
                  </th>
                  <th class="px-3 py-3 text-center fw-semibold text-uppercase"
                      style="color: #374151; font-size: 0.875rem; letter-spacing: 0.05em;">
                    Actions
                  </th>
                </tr>
                </thead>
                <tbody style="background-color: white;">
                <tr v-for="oneService in services" :key="oneService.id" style="transition: background-color 0.3s ease;">

                  <td class="px-3 py-3">
                    <div class="d-flex align-items-center">
                      <div
                          class="rounded-circle d-flex align-items-center justify-content-center text-white fw-semibold me-3"
                          style="width: 32px; height: 32px; background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%); font-size: 0.875rem;">
                        {{ oneService?.name?.charAt(0)?.toUpperCase() }}
                      </div>
                      <span class="fw-medium" style="color: #111827;">{{ oneService?.name }}</span>
                    </div>
                  </td>
                  <td class="px-3 py-3">
                    <span class="fw-semibold" style="color: #111827;">GHC {{ oneService?.price }}</span>
                  </td>
                  <td class="px-3 py-3 text-center">
                    <div class="d-flex justify-content-center gap-2">
                      <Button @click="editService(oneService?.id)"
                              class="btn btn-primary btn-sm">
                        Edit
                      </Button>
                      <Button @click="deleteService(oneService?.id)"
                              class="btn btn-danger btn-sm">
                        Delete
                      </Button>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>

            <!-- Empty state (you can show this when no data) -->
            <!-- <div class="text-center py-5">
              <i class="bi bi-inbox display-1 text-muted mb-3"></i>
              <p class="text-muted fs-5">No services yet</p>
              <p class="text-muted">Add your first service using the form</p>
            </div> -->
          </div>
        </div>

      </div>
    </div>
  </div>

</template>

<style scoped>
/* Custom styles for form controls focus */
.form-control:focus,
.form-select:focus {
  border-color: #2563eb !important;
  box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25) !important;
}

/* Hover effect for table rows */
.table-hover tbody tr:hover {
  background-color: #f9fafb !important;
}

/* Custom gradient button hover */
.btn:hover {
  filter: brightness(110%);
}
</style>
