<script setup>
import { ref, computed, watch, onMounted } from 'vue';
import axios from 'axios';
import useAuth from "@/composables/useAuth.js";
import useSession from "@/composables/useSession.js";
import useHospitalRequest from "@/composables/useHospitalRequest.js";


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

const {request_view, request_view_data, is_loading, update_request} = useHospitalRequest()

const closeEditModal = () => {
  emit('update:modelValue', false);
};

const handleSubmit = async () => {
  await update_request(props.id);
};

onMounted(() => {
  request_view(props.id);
});
</script>

<template>
  <div class="modal position-static d-block" role="dialog"
       id="modalSignin" style="max-height: 90vh; overflow-y: auto;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-4 p-md-5 pb-4 border-bottom-0">
          <h1 class="fw-bold mb-0 fs-2 fs-md-1">Update Request</h1>
          <button @click="closeEditModal" type="button" class="btn-close" aria-label="Close"></button>
        </div>

        <div class="modal-body p-4 p-md-5 pt-0">
          <form class="" @submit.prevent="handleSubmit" v-if="request_view_data">
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="email" class="form-control rounded-3" id="floatingInput" disabled v-model="request_view_data.email">
                  <label for="floatingInput">Email address</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingFirstName"
                         v-model="request_view_data.unique_id" disabled>
                  <label for="floatingFirstName">Unique ID</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingLastName" disabled
                         v-model="request_view_data.email">
                  <label for="floatingLastName">Email</label>
                </div>
              </div>
              <div class="col-12 col-md-6" v-if="request_view_data.contact">
                <div class="form-floating mb-3">
                  <input type="tel" class="form-control rounded-3" id="floatingOtherNames" disabled
                         v-model="request_view_data.contact">
                  <label for="floatingOtherNames">Contact</label>
                </div>
              </div>
            </div>

            <div class="row">
                            <div class="col-12 col-md-6" v-if="false">
                              <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" id="floatingContact" disabled
                                       v-model="request_view_data.hospital">
                                <label for="floatingContact">Hospital</label>
                              </div>
                            </div>

              <div class="col-12 col-md-12" v-if="request_view_data.status">
                <div class="form-floating mb-3">

                  <select class="form-control rounded-3" id="" v-model="request_view_data.status">
                    <option value="Approved">Approve</option>
                    <option value="Rejected">Reject</option>
                  </select>
                  <label for="floatingOtherNames">Status</label>
                </div>
              </div>

            </div>

            <div class="col-12 col-md-12" v-if="request_view_data.status === 'Rejected'">
              <div class="form-floating mb-3">
                <textarea class="form-control rounded-3" id="floatingUniqueId" v-model="request_view_data.reason_for_rejection">
                </textarea>
                <label for="floatingUniqueId">Reason</label>
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
.multiselect-custom {
  min-height: 45px;
}

.multiselect-custom :deep(.multiselect__tags) {
  min-height: 45px;
  border: 1px solid #ced4da;
  border-radius: 0.375rem;
  padding: 0.5rem 2.25rem 0 0.75rem;
}

.multiselect-custom :deep(.multiselect__select) {
  top: 12px;
  right: 10px;
}

.multiselect-custom :deep(.multiselect__tag) {
  background: #0d6efd;
  color: white;
  padding: 4px 8px;
  margin: 2px;
  border-radius: 3px;
  display: inline-flex;
  align-items: center;
}

.multiselect-custom :deep(.multiselect__tag-icon) {
  margin-left: 5px;
  cursor: pointer;
}

.multiselect-custom :deep(.multiselect__tag-icon:after) {
  color: white;
  font-size: 16px;
}

.multiselect-custom :deep(.multiselect__option--highlight) {
  background: #0d6efd;
  color: white;
}
</style>