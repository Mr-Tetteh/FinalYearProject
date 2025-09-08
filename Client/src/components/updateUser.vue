<script setup>
import {onMounted, ref} from "vue";
import axios from "axios";
import useAuth from "@/composables/useAuth.js";
import useSession from "@/composables/useSession.js";
const {update_role, userData, view_role, hospital, hospitals_in_system} = useAuth()
const {userRole} = useSession()

const props = defineProps({
  modelValue: {
    type: Boolean,
    required: true,
  },
  id: {
    type: String,
    required: true
  }
});

const emit = defineEmits(['update:modelValue']);
const closeEditModal = () => {
  emit('update:modelValue', false);
};

const handleSubmit =  async () => {
 await update_role(props.id)
}

onMounted(() => {
  view_role(props.id)
  hospital()
})
</script>

<template>
  <div class="modal modal-sheet position-static d-block bg-body-secondary" tabindex="-1" role="dialog"
       id="modalSignin" style="max-height: 90vh; overflow-y: auto;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-4 p-md-5 pb-4 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-2 fs-md-1">Update User Role</h1>
          <button @click="closeEditModal" type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 p-md-5 pt-0">
          <form class="" @submit.prevent="handleSubmit" v-if="userData">
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="email" class="form-control rounded-3" id="floatingInput" disabled v-model="userData.email">
                  <label for="floatingInput">Email address</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingFirstName" disabled
                         v-model="userData.first_name">
                  <label for="floatingFirstName">First Name</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingLastName" disabled
                         v-model="userData.last_name">
                  <label for="floatingLastName">Last Name</label>
                </div>
              </div>
              <div class="col-12 col-md-6" v-if="userData.other_names">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingOtherNames" disabled
                         v-model="userData.other_names">
                  <label for="floatingOtherNames">Other Names</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingContact" disabled
                         v-model="userData.contact">
                  <label for="floatingContact">Contact</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingUniqueId" disabled
                         v-model="userData.unique_id">
                  <label for="floatingUniqueId">Unique ID</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-4">
                <label class="form-label fw-semibold">Status</label>
                <div class="form-floating mb-3">
                  <select class="form-select rounded-3" id="floatingStatus" v-model="userData.status" disabled>
                    <option value="1">Activate</option>
                    <option value="0">Deactivate</option>
                  </select>
                  <label for="floatingStatus">Select Status</label>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <label class="form-label fw-semibold">Position</label>
                <div class="form-floating mb-3">
                  <select class="form-select rounded-3" id="floatingPosition" v-model="userData.position" disabled>
                    <option value="Doctor">Doctor</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Pharmacist">Pharmacist</option>
                    <option value="Account">Account</option>
                    <option value="Manager">Manager</option>
                    <option value="Lab Technician">Lab Technician</option>
                    <option v-if="userRole == 'Admin'" value="Admin">Admin</option>
                  </select>
                  <label for="floatingPosition">Select Position</label>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <label class="form-label fw-semibold">Hospital</label>
                <div class="form-floating mb-3">
                  <select class="form-select rounded-3" id="floatingHospital" v-model="userData.hospital_id">
                    <option :value="hospital.id" v-for="hospital in hospitals_in_system" :key="hospital.id">{{ hospital.hospital_name}}</option>
                  </select>
                  <label for="floatingHospital">Select Hospital</label>
                </div>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button class="btn btn-lg rounded-3 btn-primary" type="submit">Update</button>
            </div>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>