<script setup>
// No specific setup needed here as functionality remains unchanged
</script>

<template>
  <header id="header" class="header sticky-top bg-light">
    <!-- Top Bar -->
    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <!-- Content for top bar can go here -->
      </div>
    </div>

    <!-- Branding Section -->
    <div class="branding d-flex align-items-center">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <RouterLink to="/" class="logo d-flex align-items-center me-auto text-decoration-none">
          <h1 class="sitename text-primary m-0">Swift Care</h1>
        </RouterLink>

        <!-- Navigation Menu -->
        <nav id="navmenu" class="navmenu d-none d-md-block">
          <ul class="nav">
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
            <li class="nav-item">
              <RouterLink to="/login" class="nav-link">Login</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink to="/register_hospital" class="nav-link">Register Hospital</RouterLink>
            </li>
          </ul>
        </nav>

        <!-- Mobile Navigation Toggle -->
        <button class="btn btn-outline-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav" aria-expanded="false" aria-controls="mobileNav">
          <i class="bi bi-list"></i>
        </button>

        <!-- Mobile Navigation -->
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
              <li class="nav-item">
                <RouterLink to="/login" class="nav-link">Login</RouterLink>
              </li>
              <li class="nav-item">
                <RouterLink to="/register_hospital" class="nav-link">Register Hospital</RouterLink>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>
.sitename {
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

/* Mobile Nav Styles */
.collapse {
  background-color: var(--nav-mobile-background-color, #ffffff);
}

.collapse .nav-link {
  padding: 0.75rem 1.25rem;
  border-bottom: 1px solid #ddd;
}
</style>
