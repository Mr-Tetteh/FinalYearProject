<script setup>
const props = defineProps({
  modelValue: {
    type: Boolean,
    required: true,
  },
  user: {
    type: Object,
    required: true
  }
});

const emit = defineEmits(['update:modelValue']);

const closeEditModal = () => {
  emit('update:modelValue', false);
};
</script>

<template>
  <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
       id="modalSignin">
    <div class="modal-dialog">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-2">Update User Role</h1>
          <button @click="closeEditModal" type="button" class="btn-close" aria-label="Close"></button>        </div>

        <div class="modal-body p-5 pt-0">
          <form class="">
            <div class="form-floating mb-3">
              <input type="email" class="form-control rounded-3" id="floatingInput">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">First Name</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Last Name</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Other Names</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Contact</label>
            </div>


            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Staff ID </label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-control rounded-3">
                <option value="" disabled selected>Select Role</option>
                <option value="Doctor">Doctor</option>
                <option value="Nurse">Nurse</option>
                <option value="Pharmacist">Pharmacist</option>
                <option value="Account">Account</option>
                <option value="Manager">Manager</option>
                <option value="Lab Technician">Lab Technician</option>
              </select>
              <label for="floatingPassword">Staff ID </label>
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Update</button>
            <hr class="my-4">
          </form>
        </div>
      </div>
    </div>
  </div>

</template>

<style scoped>

</style>