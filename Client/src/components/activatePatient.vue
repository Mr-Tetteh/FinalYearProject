<script setup>

import {onMounted, ref} from "vue";
import axios from "axios";
import useAuth from "@/composerbles/useAuth.js";
import useSession from "@/composerbles/useSession.js";
import usePatients from "@/composerbles/usePatients.js";

const {editPatient, input, activatePatient} = usePatients()
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

const handleSubmit = async () => {
  await activatePatient(props.id)
}

onMounted(() => {
  editPatient(props.id)
})

</script>

<template>
  <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
       id="modalSignin">
    <div class="modal-dialog">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-2">Activate Patient</h1>
          <button @click="closeEditModal" type="button" class="btn-close" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 pt-0">
          <form class="" @submit.prevent="handleSubmit" v-if="input">
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" disabled
                     v-model="input.first_name">
              <label for="floatingPassword">First Name</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" disabled
                     v-model="input.last_name">
              <label for="floatingPassword">Last Name</label>
            </div>


            <div class="form-floating mb-3" v-if="input.other_names">
              <input type="text" class="form-control rounded-3" id="floatingPassword" disabled
                     v-model="input.other_names">
              <label for="floatingPassword">Other Names</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingInput" disabled
                     v-model="input.patient_number">
              <label
                  for="floatingInput">Patient Number</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" disabled
                     v-model="input.contact">
              <label for="floatingPassword">Contact</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-control rounded-3" v-model="input.status">
                <option value="1">Activate</option>
              </select>
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Activate</button>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
  </div>

</template>


<style scoped>

</style>