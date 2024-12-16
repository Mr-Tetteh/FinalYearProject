<script setup>
import useAuth from "@/composerbles/useAuth.js";
import { ref } from "vue";

const { user, login } = useAuth();

// State for loading and error messages
const isLoading = ref(false);
const errorMessage = ref("");

const enter = async () => {
  errorMessage.value = ""; // Clear previous errors
  isLoading.value = true;
  try {
    await login();
  } catch (error) {
    errorMessage.value = error.message || "Login failed. Please try again.";
  } finally {
    isLoading.value = false;
  }
};
</script>

<template>
  <div
      class="page login-page d-flex align-items-center justify-content-center min-vh-100"
  >
    <div class="container-fluid w-100">
      <div v-if="errorMessage" class="alert alert-danger" role="alert">
        {{ errorMessage }}
      </div>
      <form @submit.prevent="enter" class="w-100">
        <div class="card mx-auto" style="max-width: 600px;">
          <div class="card-header">
            <h4 class="card-title offset-lg-5">Staff Login</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="form form-horizontal">
                <div class="form-body">
                  <div class="row">
                    <!-- Email Input -->
                    <div class="col-md-12">
                      <div class="form-group has-icon-left">
                        <div class="position-relative">
                          <input
                              type="text"
                              class="form-control"
                              placeholder="Staff ID"
                              id="staff-id"
                              v-model="user.identifier"
                          />
                          <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Password Input -->
                    <div class="col-md-12">
                      <div class="form-group has-icon-left">
                        <div class="position-relative">
                          <input
                              type="password"
                              class="form-control"
                              placeholder="Password"
                              v-model="user.password"
                          />
                          <div class="form-control-icon">
                            <i class="bi bi-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Buttons -->
                    <div class="col-12 d-flex justify-content-end mt-3">
                      <button
                          type="submit"
                          class="btn btn-primary w-100 d-flex align-items-center justify-content-center"
                          :disabled="isLoading"
                          style="background-color: #001f3f; border-color: #001f3f;"
                      >
                        <span
                            v-if="isLoading"
                            class="spinner-border spinner-border-sm me-2"
                        ></span>
                        Login
                      </button>
                      <button
                          type="reset"
                          class="btn btn-light-secondary me-2 ms-2"
                      >
                        Forgot Password
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
.form-label {
  font-weight: 600;
  color: #555;
}

.alert {
  margin-bottom: 15px;
}

.page {
  background-image: url(@/assets/img/Staff-center-1200x900.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>
