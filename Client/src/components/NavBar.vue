<script setup>
import useSession from "@/composerbles/useSession.js";
import useAuth from "@/composerbles/useAuth.js";

import { useRoute } from 'vue-router';
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
            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#hero" class="nav-link active">Home</a>
            </li>
            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#about" class="nav-link">About</a>
            </li>

            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#services" class="nav-link">Services</a>
            </li>
            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#contact" class="nav-link">Contact</a>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
              <RouterLink to="dashboard" class="nav-link">Dashboard</RouterLink>
            </li>

            <li class="nav-item" v-if="isLoggedIn">
              <RouterLink to="/login" class="nav-link">Login</RouterLink>
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
                  <button class="logout-btn" @click="logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                  </button>
                </li>
              </ul>
            </div>
          </div>
      </div>
      </div>
    </nav>

    <!-- Branding Section -->
<!--
    <div class="branding d-flex align-items-center">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <RouterLink to="/" class="logo d-flex align-items-center me-auto text-decoration-none">
          <h1 class="sitename text-primary m-0">Swift Care</h1>
        </RouterLink>

        &lt;!&ndash; Navigation Menu &ndash;&gt;
        <nav id="navmenu" class="navmenu d-none d-md-block">
          <ul class="nav">
            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#hero" class="nav-link active">Home</a>
            </li>
            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#about" class="nav-link">About</a>
            </li>

            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#services" class="nav-link">Services</a>
            </li>
            <li class="nav-item" v-if="route.name !== 'register_hospital'">
              <a href="#contact" class="nav-link">Contact</a>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
              <RouterLink to="dashboard" class="nav-link">Dashboard</RouterLink>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
              <button class="btn btn-outline-danger" @click="logout">
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
              </button>
            </li>
            <li class="nav-item" v-if="isLoggedIn">
              <RouterLink to="/login" class="nav-link">Login</RouterLink>
            </li>
            <li class="nav-item" v-if="isLoggedIn">
              <RouterLink to="/register_hospital" class="nav-link">Register Hospital</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink to="/update_plan" class="nav-link">Update Plan</RouterLink>
            </li>
          </ul>
        </nav>

        &lt;!&ndash; Mobile Navigation Toggle &ndash;&gt;
        <button class="btn btn-outline-primary d-md-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#mobileNav" aria-expanded="false" aria-controls="mobileNav">
          <i class="bi bi-list"></i>
        </button>

        &lt;!&ndash; Mobile Navigation &ndash;&gt;
        <div class="collapse" id="mobileNav">
          <nav class="navmenu">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="#hero" class="nav-link active">Home</a>
              </li>
              <li class="nav-item">
                <a href="#about" class="nav-link">About</a>
              </li>
              <li class="nav-item">
                <a href="#services" class="nav-link">Services</a>
              </li>
              <li class="nav-item">
                <a href="#contact" class="nav-link">Contact</a>
              </li>
              <li class="nav-item" v-if="!isLoggedIn">
                <RouterLink to="dashboard" class="nav-link">Dashboard</RouterLink>
              </li>
              <li class="nav-item" v-if="!isLoggedIn">
                <button class="btn btn-outline-danger" @click="logout">
                  <i class="bi bi-box-arrow-right me-2"></i>
                  Logout
                </button>
              </li>
              <li class="nav-item" v-if="isLoggedIn">
                <RouterLink to="/login" class="nav-link">Login</RouterLink>
              </li>
              <li class="nav-item" v-if="isLoggedIn">
                <RouterLink to="/register_hospital" class="nav-link">Register Hospital</RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/update_plan" class="nav-link">Update Plan</RouterLink>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
-->
  </header>
</template>

<style scoped>
/*.sitename {
  font-size: 1.5rem;
  font-family: var(--heading-font, "Poppins", sans-serif);
}

.navmenu .nav-link {
  color: var(--nav-color, #2c4964);
  font-family: var(--nav-font, "Raleway", sans-serif);
  transition: color 0.3s;
}

.navmenu .nav-link:hover,
.navmenu .nav-link.active {
  color: var(--nav-hover-color, #1977cc);
}

.header {
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

!* Mobile Nav Styles *!
.collapse {
  background-color: var(--nav-mobile-background-color, #ffffff);
}

.collapse .nav-link {
  padding: 0.75rem 1.25rem;
  border-bottom: 1px solid #ddd;
}*/
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
  box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
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
