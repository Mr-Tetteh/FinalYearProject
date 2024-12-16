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
    class="login-page d-flex align-items-center justify-content-center min-vh-100"
    style="background-color: #001f3f;"
  >
    <div class="card shadow-lg" style="width: 400px; border: none;">
      <div
        class="card-header text-center"
        style="background-color: #001f3f; color: white;"
      >
        <h3>Healthcare Login</h3>
      </div>
      <div class="card-body">
        <!-- Error Message -->
        <div v-if="errorMessage" class="alert alert-danger" role="alert">
          {{ errorMessage }}
        </div>

        <!-- Login Form -->
        <form @submit.prevent="enter" novalidate>
          <div class="form-group mb-3">
            <label for="email" class="form-label">Staff ID</label>
            <input
              type="text"
              id="email"
              v-model="user.identifier"
              class="form-control"
              placeholder="Enter your email or phone number"
              required
            />
          </div>
          <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              id="password"
              v-model="user.password"
              class="form-control"
              placeholder="Enter your password"
              required
            />
          </div>
          <button
            type="submit"
            class="btn btn-primary w-100 d-flex align-items-center justify-content-center"
            :disabled="isLoading"
            style="background-color: #001f3f; border-color: #001f3f;"
          >
            <span v-if="isLoading" class="spinner-border spinner-border-sm me-2"></span>
            Login
          </button>
        </form>
      </div>

      <div class="card-footer text-center">
        <small>
          Don't have an account? <router-link to="/register">Register here</router-link>
        </small>
      </div>
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
</style>
