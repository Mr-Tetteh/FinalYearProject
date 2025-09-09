<script setup>
import useSession from "@/composables/useSession.js";
import useAuth from "@/composables/useAuth.js";

import {useRoute} from 'vue-router';

const route = useRoute();

const {isLoggedIn} = useSession();
const {logout} = useAuth()

</script>

<template>

  <header id="header" class="header sticky-top ">
    <!-- Top Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark">
      <div class="container-fluid">
        <!-- Brand/Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
          <RouterLink to="/" class="logo d-flex align-items-center me-auto text-decoration-none">
            <h1 class="sitename text-primary m-0">Swift Care</h1>
          </RouterLink>
        </a>

        <!-- Mobile menu toggle button -->
        <button class="navbar-toggler border-0 p-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation items -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item" v-if="route.name !== 'update_plan' && route.name !== 'register_hospital'">
              <a href="#hero" class="nav-link active">Home</a>
            </li>
            <li class="nav-item" v-if="route.name !== 'update_plan' && route.name !== 'register_hospital'">
              <a href="#about" class="nav-link">About</a>
            </li>

            <li class="nav-item" v-if="route.name !== 'update_plan' && route.name !== 'register_hospital'">
              <a href="#services" class="nav-link">Services</a>
            </li>
            <li class="nav-item" v-if="route.name !== 'update_plan' && route.name !== 'register_hospital'">
              <a href="#contact" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
              <RouterLink to="/request/hospital" class="nav-link">Apply Hospital</RouterLink>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
              <RouterLink to="/dashboard" class="nav-link">Dashboard</RouterLink>
            </li>
            <li class="nav-item" v-if="isLoggedIn">
              <RouterLink to="/register_hospital" class="nav-link">Register Hospital</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink to="/update_plan" class="nav-link">Update Plan</RouterLink>
            </li>


          </ul>

          <!-- Right side items -->


          <div class="profile-section" v-if="!isLoggedIn">
            <div class="dropdown">
              <button class="profile-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="profile-text">Profile</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end profile-menu">
                <li class="dropdown-item-wrapper">
                  <RouterLink to="/dashboard" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Dashboard</span>
                  </RouterLink>
                </li>
                <li class="dropdown-item-wrapper">
                  <button class="logout-btn" @click="logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="profile-section" v-if="isLoggedIn">
          <ul class="">
            <li class="">
              <RouterLink to="/login" class="btn btn-primary">
                <i class="bi bi-box-arrow-right"></i>
                <span>Login</span>
              </RouterLink>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  </header>
</template>

<style scoped>
.navbar-dark {
  background-color: #1f2937 !important;
}

.navbar-nav .nav-link {
  color: white !important;
  border-radius: 0.375rem;
  padding: 0.5rem 0.75rem !important;
  margin-left: 30px;
}

.navbar-nav .nav-link:hover {
  background-color: #374151 !important;
  color: #ffffff !important;
}

.navbar-nav .nav-link.active {
  background-color: #111827 !important;
  color: #ffffff !important;
}

.btn-notification {
  background-color: transparent;
  border: none;
  color: #9ca3af;
  padding: 0.25rem;
  border-radius: 50%;
}

.btn-notification:hover {
  color: #ffffff;
}

.btn-notification:focus {
  box-shadow: 0 0 0 2px #ffffff, 0 0 0 4px #1f2937;
  outline: none;
}

.profile-img {
  width: 2rem;
  height: 2rem;
  border-radius: 50%;
}

.dropdown-toggle::after {
  display: none;
}

.dropdown-menu {
  border: none;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  border-radius: 0.375rem;
}

.profile-section {
  margin-left: 1rem;
}

.profile-toggle {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background: transparent;
  border: none;
  padding: 0.5rem;
  color: white;
  border-radius: 0.5rem;
  transition: all 0.2s ease;
}

.profile-toggle:hover {
  background: rgba(255, 255, 255, 0.1);
}

.profile-avatar {
  font-size: 1.5rem;
  display: flex;
  align-items: center;
}

.profile-menu {
  min-width: 200px;
  padding: 0.5rem;
  margin-top: 0.5rem;
  background: white;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.dropdown-item-wrapper {
  padding: 0.25rem;
}

.logout-btn {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  padding: 0.75rem 1rem;
  border: none;
  border-radius: 0.375rem;
  background: #fee2e2;
  color: #dc2626;
  transition: all 0.2s ease;
}

.logout-btn:hover {
  background: #fecaca;
}

@media (max-width: 575.98px) {
  .navbar-nav .nav-link {
    font-size: 1rem;
    padding: 0.75rem !important;
    margin-bottom: 0.25rem;
    background-color: gray;
  }

  .mobile-menu {
    padding: 0.5rem;
  }

  .profile-text {
    display: none;
  }

  .profile-toggle {
    padding: 0.375rem;
  }

  .profile-avatar {
    font-size: 1.25rem;
  }

}
</style>
