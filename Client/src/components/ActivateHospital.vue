<script setup>
import useHospital from "@/composables/useHospital.js";
import {onMounted} from "vue";

const {input, edit_hospital, update_hospital, is_loading} = useHospital()

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

onMounted(() => {
  edit_hospital(props.id)
});

const handleSubmit = async () => {
  await update_hospital(props.id)
}
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
                     v-model="input.hospital_name">
              <label for="floatingPassword">Hospital Name</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" disabled
                     v-model="input.hospital_email">
              <label for="floatingPassword">Hospital Email</label>
            </div>


            <div class="form-floating mb-3" v-if="input.other_names">
              <input type="text" class="form-control rounded-3" id="floatingPassword" disabled
                     v-model="input.hospital_address">
              <label for="floatingPassword">Hospital Address</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingInput" disabled
                     v-model="input.hospital_contact">
              <label
                  for="floatingInput">Hospital Contact</label>
            </div>


            <div class="form-floating mb-3">
              <select class="form-control rounded-3" v-model="input.status">
                <option value="1">Activate</option>
              </select>
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary gradient-btn" :disabled="is_loading"  :class="[{ 'cursor-not-allowed opacity-75': is_loading }, 'no-course']" type="submit">Activate</button>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>