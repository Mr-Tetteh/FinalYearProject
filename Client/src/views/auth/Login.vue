<script setup>
import useAuth from "@/composerbles/useAuth.js";

const {user,login }= useAuth()
</script>

<template>
  <div class="login-page d-flex align-items-center justify-content-center min-vh-100" style="background-color: #001f3f;">
    <div class="card shadow-lg" style="width: 400px; border: none;">
      <div class="card-header text-center" style="background-color: #001f3f; color: white;">
        <h3>Healthcare Login</h3>
      </div>
      <div class="card-body">
        <form @submit.prevent="login">
          <div class="form-group mb-3">
            <input
              type="text"
              id="email"
              v-model="user.identifier"
              class="form-control"
              placeholder="Enter your email or Phone Number"
              required
            />
          </div>
          <div class="form-group mb-3">
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
