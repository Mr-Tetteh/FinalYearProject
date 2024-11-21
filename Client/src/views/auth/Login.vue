<script setup>
const ref = {
  email: '',
password: ''
}
</script>

<template>
  <div class="login-page d-flex align-items-center justify-content-center min-vh-100" style="background-color: #001f3f;">
    <div class="card shadow-lg" style="width: 400px; border: none;">
      <div class="card-header text-center" style="background-color: #001f3f; color: white;">
        <h3>Healthcare Login</h3>
      </div>
      <div class="card-body">
        <form @submit.prevent="handleSubmit">
          <div class="form-group mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input
              type="email"
              id="email"
              v-model="email"
              class="form-control"
              placeholder="Enter your email"
              required
            />
          </div>
          <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              id="password"
              v-model="password"
              class="form-control"
              placeholder="Enter your password"
              required
            />
          </div>
          <button
            type="submit"
            class="btn btn-primary w-100"
            style="background-color: #001f3f; border-color: #001f3f;"
          >
            Login
          </button>
        </form>
      </div>
      <div class="card-footer text-center">
        <small>
          <router-link to="/register">Register here</router-link>
        </small>
      </div>
    </div>
  </div>
</template>
