<script setup lang="ts">

import AdminNavBar from "@/components/AdminNavBar.vue";
import useHospitalManagement from "@/composables/useHospitalManagement"

import {onMounted} from "vue";

const {
  makeLab,
  lab,
  isEdit,
  fetchLab,
  labs,
  deleteLabManagement,
  editLab,
  updateLabRec
} = useHospitalManagement()

// const handleSubmit = async () => {
//   makeLab()
// }

const handleSubmit = async () => {
  await makeLab()
}

const updateLab = async (labId: number) => {
  await updateLabRec(labId)
}
onMounted(() => {
  fetchLab()
})
</script>

<template>
  <AdminNavBar/>
  <div class="min-vh-100" style="background: linear-gradient(135deg, #f0fdfa 0%, #ecfdf5 100%);">
    <div id="main">
      <header class="mb-4 p-3">
        <a href="#" class="d-block d-xl-none">
          <i class="fs-3 bi bi-justify text-success"></i>
        </a>
      </header>

      <!-- Side by side container -->
      <div class="row g-4 px-3 w-100 mx-0">

        <!-- Form Section -->
        <div class="col-lg-6">
          <div class="bg-white rounded-3 shadow-lg p-4">
            <h1 class="h3 fw-bold text-success mb-4 d-flex align-items-center">
              <span class="bg-light p-2 rounded-3 me-3" style="background-color: #dcfce7 !important;">
                <i class="bi bi-plus-circle text-success"></i>
              </span>
              Lab Management
            </h1>
            <form @submit.prevent="isEdit ? updateLab(lab.id) : handleSubmit()" class="space-y-4">
              <div class="mb-3">
                <label for="labName" class="form-label text-success fw-bold">Name of Lab Test:</label>
                <input type="text"
                       id="labName"
                       name="labName"
                       class="form-control form-control-lg border-success"
                       style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
                       v-model="lab.name"
                       placeholder="Enter lab name">
              </div>
              <div class="mb-4">
                <label for="fee" class="form-label text-success fw-bold">Lab Fee:</label>
                <input type="number"
                       id="fee"
                       name="fee"
                       class="form-control form-control-lg border-success"
                       style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"
                       v-model="lab.price"
                       step="0.01"
                       placeholder="Enter fee amount">
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <button type="submit"
                        class="btn btn-lg w-100 text-white fw-bold shadow-lg"
                        style="background: linear-gradient(135deg, #059669 0%, #0d9488 100%); transform: scale(1); transition: all 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.05)'"
                        onmouseout="this.style.transform='scale(1)'">
                  {{ isEdit ? 'Update Lab' : 'Save Lab' }}
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Table Section -->
        <div class="col-lg-6">
          <div class="bg-white rounded-3 shadow-lg p-4">
            <h1 class="h3 fw-bold text-success mb-4 d-flex align-items-center justify-content-between">
              <span class="d-flex align-items-center">
                <span class="p-2 rounded-3 me-3" style="background-color: #e0e7ff;">
                  <i class="bi bi-table" style="color: #4f46e5;"></i>
                </span>
                Lab List
              </span>
              <span class="badge rounded-pill text-success" style="background-color: #dcfce7;">
                <!-- {{ labs.length? labs.length : 0 }} labs -->
              </span>
            </h1>

            <div class="table-responsive rounded-3 border" style="border-color: #a7f3d0 !important;">
              <table class="table table-hover mb-0">
                <thead style="background-color: #ecfdf5;">
                <tr>
                  <th class="px-3 py-3 text-success fw-semibold text-uppercase"
                      style="font-size: 0.875rem; letter-spacing: 0.05em;">
                    Name Of Lab
                  </th>
                  <th class="px-3 py-3 text-success fw-semibold text-uppercase"
                      style="font-size: 0.875rem; letter-spacing: 0.05em;">
                    Lab Fee
                  </th>
                  <th class="px-3 py-3 text-center text-success fw-semibold text-uppercase"
                      style="font-size: 0.875rem; letter-spacing: 0.05em;">
                    Actions
                  </th>
                </tr>
                </thead>
                <tbody style="background-color: white;">
                <tr v-for="lab in labs" :key="lab.id" style="transition: background-color 0.3s ease;">
                  <td class="px-3 py-3">
                    <div class="d-flex align-items-center">
                      <div
                          class="rounded-circle d-flex align-items-center justify-content-center text-white fw-semibold me-3"
                          style="width: 32px; height: 32px; background: linear-gradient(135deg, #14b8a6 0%, #059669 100%); font-size: 0.875rem;">
                        <!-- {{ Alab.name.charAt(0).toUpperCase() }} -->
                      </div>
                      <span class="fw-medium" style="color: #064e3b;">{{ lab.name }}</span>
                    </div>
                  </td>
                  <td class="px-3 py-3">
                    <span class="fw-semibold" style="color: #064e3b;">GHC {{ lab.price }}</span>
                  </td>
                  <td class="px-3 py-3 text-center">
                    <div class="d-flex justify-content-center gap-2">
                      <Button variant="outline" @click="editLab(lab.id)"
                              class="btn btn-primary btn-sm">
                        Edit
                      </Button>
                      <Button @click="deleteLabManagement(lab.id)"
                              class="btn btn-danger btn-sm">
                        Delete
                      </Button>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
                <div v-if="!labs.length" class="text-center text-muted py-4">
                <span class="fs-5"> No lab records found.</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</template>

<style scoped>
/* Custom styles for form controls focus */
.form-control:focus {
  border-color: #10b981 !important;
  box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25) !important;
}

/* Hover effect for table rows */
.table-hover tbody tr:hover {
  background-color: #ecfdf5 !important;
}

/* Custom gradient button hover */
.btn:hover {
  filter: brightness(110%);
}
</style>