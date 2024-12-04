<script setup>
import useAuth from "@/composerbles/useAuth.js";

const { input, register } = useAuth();
</script>

<template>
  <div class="signup-page">
    <div class="signup-card">
      <!-- Left Section -->
      <div class="info-section">
        <div class="info-content">
          <img
            src="/Client/public/sethoscope png.jpg"
            alt="Stethoscope"
            class="info-image"
          />
          <p class="info-text">
            We at MediCare are always fully focused on helping your child.
          </p>
        </div>
      </div>

      <!-- Right Section -->
      <div class="form-section">
        <div class="language-select">English (US) +</div>
        <h2 class="form-title">Create Account</h2>
        <div class="social-buttons">
          <button class="social-btn google-btn">Sign up with Google</button>
          <button class="social-btn facebook-btn">Sign up with Facebook</button>
        </div>
        <p class="or-divider">- OR -</p>
        <form @submit.prevent="register" class="form-content">
          <div class="input-group">
            <label for="fullName">Full Name</label>
            <input
              type="text"
              id="fullName"
              v-model="input.full_name"
              required
            />
          </div>
          <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" v-model="input.email" required />
          </div>
          <div class="input-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              v-model="input.password"
              required
            />
          </div>
          <button type="submit" class="submit-btn">Create Account</button>
        </form>
        <p class="login-link">
          Already have an Account? <a href="#">Log in</a>
        </p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Page Container */
.signup-page {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #d9e4f5;
}

/* Signup Card */
.signup-card {
  display: flex;
  width: 80%;
  max-width: 900px;
  background-color: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Left Section */
.info-section {
  flex: 1;
  background-color: #e9effb;
  padding: 2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  text-align: center;
}

.info-image {
  width: 100px;
  margin-bottom: 1rem;
}

.info-text {
  font-size: 1.2rem;
  color: #4b6584;
  font-weight: 500;
}

/* Right Section */
.form-section {
  flex: 1.2;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;
}

.language-select {
  position: absolute;
  top: 1rem;
  right: 1rem;
  font-size: 0.9rem;
  color: #4b6584;
}

.form-title {
  text-align: center;
  font-size: 1.8rem;
  color: #34495e;
  margin-bottom: 1rem;
}

.social-buttons {
  display: flex;
  justify-content: space-between;
  margin-bottom: 1rem;
}

.social-btn {
  flex: 1;
  margin: 0 0.5rem;
  padding: 0.5rem 1rem;
  border-radius: 25px;
  font-size: 0.9rem;
  font-weight: bold;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.google-btn {
  background-color: #4285f4;
  color: white;
}

.google-btn:hover {
  background-color: #3367d6;
}

.facebook-btn {
  background-color: #3b5998;
  color: white;
}

.facebook-btn:hover {
  background-color: #2d4373;
}

.or-divider {
  text-align: center;
  color: #7f8c8d;
  margin: 1rem 0;
}

.form-content {
  display: flex;
  flex-direction: column;
}

.input-group {
  margin-bottom: 1rem;
}

.input-group label {
  display: block;
  font-size: 0.9rem;
  color: #34495e;
  margin-bottom: 0.5rem;
}

.input-group input {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #dcdde1;
  border-radius: 5px;
  font-size: 1rem;
}

.submit-btn {
  background-color: #34495e;
  color: white;
  padding: 0.7rem;
  border: none;
  border-radius: 25px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-btn:hover {
  background-color: #2c3e50;
}

.login-link {
  text-align: center;
  margin-top: 1rem;
  color: #4b6584;
}

.login-link a {
  color: #007bff;
  text-decoration: none;
}

.login-link a:hover {
  text-decoration: underline;
}
</style>
