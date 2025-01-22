<script setup>
import NavBar from "@/components/NavBar.vue";

</script>

<template>
  <header id="header" class="header sticky-top">
    <NavBar/>
  </header>
  <main class="main">
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <img src="../assets/img/hero-bg.jpg" alt="Medical Hero Image" data-aos="fade-in">

      <div class="container position-relative">

        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
          <h2>WELCOME TO SWIFT CARE</h2>
          <p>Transforming healthcare management with tailored solutions for hospitals, staff, and patients.</p>
        </div><!-- End Welcome -->

        <div class="content row gy-4">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
              <h3>Why Choose Swift Care?</h3>
              <p>
                Swift Care is your trusted partner in healthcare innovation. From seamless patient record management to
                secure online payments and detailed analytics, we empower healthcare institutions to focus on what
                matters most — delivering exceptional care.
              </p>
              <div class="text-center">
                <a href="#about" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="d-flex flex-column justify-content-center">
              <div class="row gy-4">

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Streamlined Records</h4>
                    <p>Effortlessly manage patient and staff records with our intuitive platform.</p>
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                    <i class="bi bi-gem"></i>
                    <h4>Advanced Analytics</h4>
                    <p>Gain insights into operations with comprehensive reporting and analytics tools.</p>
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                    <i class="bi bi-inboxes"></i>
                    <h4>Secure Transactions</h4>
                    <p>Facilitate safe and seamless online payments for patients and hospitals alike.</p>
                  </div>
                </div><!-- End Icon Box -->

              </div>
            </div>
          </div>
        </div><!-- End Content -->

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4 gx-5">

          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
            <img src="../assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">

            <h3>About Us</h3>
            <p>
              Our mission is to revolutionize healthcare management by providing hospitals with a reliable and
              user-friendly platform. Through flexible subscription options—monthly, yearly, or semi-annual—our service
              simplifies patient and staff management while ensuring secure and efficient operations.
            </p>
            <ul>
              <li>
                <i class="fa-solid fa-vial-circle-check"></i>
                <div>
                  <h5>Comprehensive Patient Management</h5>
                  <p>Track patient records, medical history, and appointments seamlessly within a centralized
                    system.</p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-pump-medical"></i>
                <div>
                  <h5>Empowered Staff Accounts</h5>
                  <p>Enable doctors, nurses, pharmacists, and accountants to perform their roles effectively with
                    personalized access.</p>
                </div>
              </li>
              <li>
                <i class="fa-solid fa-heart-circle-xmark"></i>
                <div>
                  <h5>Convenient Payment Integration</h5>
                  <p>Provide patients with a hassle-free way to make payments directly on the app, ensuring transparency
                    and efficiency.</p>
                </div>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <div class="stats-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1l0 50.8c27.6 7.1 48 32.2 48 62l0 40c0 8.8-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l0-24c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 24c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16l0-40c0-29.8 20.4-54.9 48-62l0-57.1c-6-.6-12.1-.9-18.3-.9l-91.4 0c-6.2 0-12.3 .3-18.3 .9l0 65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7l0-59.1zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/>
              </svg>
              <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
                    class="purecounter">42</span>
              <p>Doctors</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <div class="stats-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" viewBox="0 0 640 512">
                <!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M192 48c0-26.5 21.5-48 48-48L400 0c26.5 0 48 21.5 48 48l0 464-80 0 0-80c0-26.5-21.5-48-48-48s-48 21.5-48 48l0 80-80 0 0-464zM48 96l112 0 0 416L48 512c-26.5 0-48-21.5-48-48L0 320l80 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L0 288l0-64 80 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L0 192l0-48c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48l0 48-80 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l80 0 0 64-80 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l80 0 0 144c0 26.5-21.5 48-48 48l-112 0 0-416 112 0zM312 64c-8.8 0-16 7.2-16 16l0 24-24 0c-8.8 0-16 7.2-16 16l0 16c0 8.8 7.2 16 16 16l24 0 0 24c0 8.8 7.2 16 16 16l16 0c8.8 0 16-7.2 16-16l0-24 24 0c8.8 0 16-7.2 16-16l0-16c0-8.8-7.2-16-16-16l-24 0 0-24c0-8.8-7.2-16-16-16l-16 0z"/>
              </svg>
              <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1"
                    class="purecounter">24</span>
              <p>Departments</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <div class="stats-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" viewBox="0 0 448 512">
                <!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M288 0L160 0 128 0C110.3 0 96 14.3 96 32s14.3 32 32 32l0 132.8c0 11.8-3.3 23.5-9.5 33.5L10.3 406.2C3.6 417.2 0 429.7 0 442.6C0 480.9 31.1 512 69.4 512l309.2 0c38.3 0 69.4-31.1 69.4-69.4c0-12.8-3.6-25.4-10.3-36.4L329.5 230.4c-6.2-10.1-9.5-21.7-9.5-33.5L320 64c17.7 0 32-14.3 32-32s-14.3-32-32-32L288 0zM192 196.8L192 64l64 0 0 132.8c0 23.7 6.6 46.9 19 67.1L309.5 320l-171 0L173 263.9c12.4-20.2 19-43.4 19-67.1z"/>
              </svg>
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1"
                    class="purecounter">74</span>
              <p>Research Labs</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
            <div class="stats-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" viewBox="0 0 384 512">
                <!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/>
              </svg>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                    class="purecounter">85</span>
              <p>Awards</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Empowering hospitals to efficiently manage patient and staff details with our comprehensive subscription
          plans.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <img src="../assets/img/Chargebee-Subscription-Box-Industry-trends-opportunities-and-Market-Size.png"
                   class="img-fluid" alt="">
              <h3>Hospital Subscription Plans</h3>
              <p>Flexible monthly, yearly, and 6-month plans for hospitals to access our platform and streamline their
                operations.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <img src="../assets/img/account-management.webp" class="img-fluid" alt="">
              <h3>Staff Account Management</h3>
              <p>Provide individual accounts for nurses, doctors, pharmacists, and accountants, enabling role-specific
                functionalities.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <img src="../assets/img/Record_management.jpg" class="img-fluid" alt="">
              <h3>Patient Record Management</h3>
              <p>Efficiently manage patient details, including medical history, appointments, and prescriptions, all in
                one place.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <img src="../assets/img/payment.jpg" class="img-thumbnail" alt="">

              <h3>Online Payments</h3>
              <p>Enable patients to make payments directly through the app, with secure and hassle-free transaction
                processing.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <img src="../assets/img/analyticsRepoert%20.jpeg" class="img-thumbnail" alt="">

              <h3>Analytics and Reports</h3>
              <p>Generate detailed reports and analytics for patient visits, payments, and staff activities to drive
                better decisions.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <img
                  src="../assets/img/data-protection-cyber-security-concept-secure-data-management-protect-data_36358-2481.avif"
                  class="img-thumbnail" alt="">
              <h3>Secure Data Management</h3>
              <p>Ensure patient and hospital data remain safe with robust security measures and compliance with privacy
                standards.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->


    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">
      <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide mb-4" style="max-width: 600px; margin: 0 auto;">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
          </div>

          <h3 class="text-center p-3">What Our Clients Say</h3>

          <div class="main_car">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../assets/img/testimonials/testimonials-4.jpg" class="d-block w-100 car_image"
                     alt="Client Testimonial">
                <div class="carousel-caption d-md-block">
                  <p class="mt-3 testimonial_words text-black">
                    <em>"Swift Care has transformed our operations. Their solutions are intuitive and make complex tasks
                      seamless!"</em>
                    <br> - Dr. Emily Carter
                  </p>
                </div>
              </div>

              <div class="carousel-item">
                <img src="../assets/img/testimonials/testimonials-2.jpg" class="d-block w-100 car_image"
                     alt="Client Testimonial">
                <div class="carousel-caption d-md-block">
                  <p class="mt-3 testimonial_words text-black">
                    <em>"We’ve seen improved efficiency and happier staff thanks to Swift Care. Highly recommend their
                      services!"</em>
                    <br> - John Smith, Hospital Administrator
                  </p>
                </div>
              </div>

              <div class="carousel-item">
                <img src="../assets/img/testimonials/testimonials-1.jpg" class="d-block w-100 car_image"
                     alt="Client Testimonial">
                <div class="carousel-caption d-md-block">
                  <p class="mt-3 testimonial_words text-black">
                    <em>"Outstanding support and a solution that adapts perfectly to our needs. Swift Care is a
                      game-changer!"</em>
                    <br> - Sarah Johnson, Clinic Manager
                  </p>
                </div>
              </div>
            </div>
            <!-- Updated buttons with padding -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev" style="padding: 10px; background-color: rgba(0, 0, 255, 0.5);">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next" style="padding: 10px; background-color: rgba(0, 0, 255, 0.5);">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </section>


    <section class="card_start overflow-y-auto">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="card text-center">
                <div class="title">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i>
                  <h2>Basic</h2>
                </div>
                <div class="price">
                  <h4><sup>$</sup>25</h4>
                </div>
                <div class="option">
                  <ul>
                    <li><i class="fa fa-check" aria-hidden="true"></i>10 GB Space</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>3 Domain Names</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>20 Email Address</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>Live Support</li>
                  </ul>
                </div>
                <a href="#">Order Now</a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-center">
                <div class="title">
                  <i class="fa fa-plane" aria-hidden="true"></i>
                  <h2>Standard</h2>
                </div>
                <div class="price">
                  <h4><sup>$</sup>50</h4>
                </div>
                <div class="option">
                  <ul>
                    <li><i class="fa fa-check" aria-hidden="true"></i>50 GB Space</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>5 Domain Names</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>unlimited Email Address</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>Live Support</li>
                  </ul>
                </div>
                <a href="#">Order Now</a>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-center">
                <div class="title">
                  <i class="fa fa-rocket" aria-hidden="true"></i>
                  <h2>Premium</h2>
                </div>
                <div class="price">
                  <h4><sup>$</sup>100</h4>
                </div>
                <div class="option">
                  <ul>
                    <li><i class="fa fa-check" aria-hidden="true"></i>Unlimited GB Space</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>30 Domain Names</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>Unlimited Email Address</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i>Live Support</li>
                  </ul>
                </div>
                <a href="#">Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="contact-section d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8">
            <div class="contact-card floating">
              <h2 class="contact-title text-center">Get in Touch</h2>
              <p class="contact-subtitle text-center">We'd love to hear from you! Connect with us through any of these platforms.</p>

              <!-- Facebook -->
              <a href="https://facebook.com" class="contact-link">
                <div class="contact-icon facebook-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                    <path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/>
                  </svg>
                </div>
                <div>
                  <div class="contact-text">Facebook</div>
                  <p class="contact-subtext">Follow us for updates</p>
                </div>
              </a>

              <!-- Email -->
              <a href="mailto:contact@example.com" class="contact-link">
                <div class="contact-icon email-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                  </svg>
                </div>
                <div>
                  <div class="contact-text">Email Us</div>
                  <p class="contact-subtext">Get in touch 24/7</p>
                </div>
              </a>

              <!-- Phone -->
              <a href="tel:0559724772" class="contact-link">
                <div class="contact-icon phone-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                    <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                  </svg>
                </div>
                <div>
                  <div class="contact-text">Call Us</div>
                  <p class="contact-subtext">055-972-4772</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid ">
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <img src="../assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Gallery Section -->


  </main>

</template>

<style scoped>

:root {
  --default-font: "Roboto", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  --heading-font: "Poppins", sans-serif;
  --nav-font: "Raleway", sans-serif;
}

/* Global Colors - The following color variables are used throughout the website. Updating them here will change the color scheme of the entire website */
:root {
  --background-color: #ffffff; /* Background color for the entire website, including individual sections */
  --default-color: #444444; /* Default color used for the majority of the text content across the entire website */
  --heading-color: #2c4964; /* Color for headings, subheadings and title throughout the website */
  --accent-color: #1977cc; /* Accent color that represents your brand on the website. It's used for buttons, links, and other elements that need to stand out */
  --surface-color: #ffffff; /* The surface color is used as a background of boxed elements within sections, such as cards, icon boxes, or other elements that require a visual separation from the global background. */
  --contrast-color: #ffffff; /* Contrast color for text, ensuring readability against backgrounds of accent, heading, or default colors. */
}

/* Nav Menu Colors - The following color variables are used specifically for the navigation menu. They are separate from the global colors to allow for more customization options */
:root {
  --nav-color: #2c4964; /* The default color of the main navmenu links */
  --nav-hover-color: #1977cc; /* Applied to main navmenu links when they are hovered over or active */
  --nav-mobile-background-color: #ffffff; /* Used as the background color for mobile navigation menu */
  --nav-dropdown-background-color: #ffffff; /* Used as the background color for dropdown items that appear when hovering over primary navigation items */
  --nav-dropdown-color: #2c4964; /* Used for navigation links of the dropdown items in the navigation menu. */
  --nav-dropdown-hover-color: #1977cc; /* Similar to --nav-hover-color, this color is applied to dropdown navigation links when they are hovered over. */
}

/* Color Presets - These classes override global colors when applied to any section or element, providing reuse of the sam color scheme. */

.light-background {
  --background-color: #f1f7fc;
  --surface-color: #ffffff;
}

.dark-background {
  --background-color: #060606;
  --default-color: #ffffff;
  --heading-color: #ffffff;
  --surface-color: #252525;
  --contrast-color: #ffffff;
}

/* Smooth scroll */
:root {
  scroll-behavior: smooth;
}

/* Make all images in the service items have equal height and width */
.service-item img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}


/*--------------------------------------------------------------
# General Styling & Shared Classes
--------------------------------------------------------------*/
body {
  color: var(--default-color);
  background-color: var(--background-color);
  font-family: var(--default-font);
}

.car_image {
  width: 20% !important;
  height: 40% !important;
  border-radius: 40%;
  padding: 1%;
  margin-bottom: 10%;
}

.testimonial_words {
  margin-left: 20% !important;
}

a {
  color: var(--accent-color);
  text-decoration: none;
  transition: 0.3s;
}

a:hover {
  color: color-mix(in srgb, var(--accent-color), transparent 25%);
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  color: var(--heading-color);
  font-family: var(--heading-font);
}

/* Pulsating Play Button
------------------------------*/
.pulsating-play-btn {
  width: 94px;
  height: 94px;
  background: radial-gradient(var(--accent-color) 50%, color-mix(in srgb, var(--accent-color), transparent 75%) 52%);
  border-radius: 50%;
  display: block;
  position: relative;
  overflow: hidden;
}

.pulsating-play-btn:before {
  content: "";
  position: absolute;
  width: 120px;
  height: 120px;
  animation-delay: 0s;
  animation: pulsate-play-btn 2s;
  animation-direction: forwards;
  animation-iteration-count: infinite;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 5px solid color-mix(in srgb, var(--accent-color), transparent 30%);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}

.pulsating-play-btn:after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

.pulsating-play-btn:hover:before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  animation: none;
  border-radius: 0;
}

.pulsating-play-btn:hover:after {
  border-left: 15px solid var(--accent-color);
  transform: scale(20);
}

@keyframes pulsate-play-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}

/* PHP Email Form Messages
------------------------------*/
.php-email-form .error-message {
  display: none;
  background: #df1529;
  color: #ffffff;
  text-align: left;
  padding: 15px;
  margin-bottom: 24px;
  font-weight: 600;
}

.php-email-form .sent-message {
  display: none;
  color: #ffffff;
  background: #059652;
  text-align: center;
  padding: 15px;
  margin-bottom: 24px;
  font-weight: 600;
}

.php-email-form .loading {
  display: none;
  background: var(--surface-color);
  text-align: center;
  padding: 15px;
  margin-bottom: 24px;
}

.php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid var(--accent-color);
  border-top-color: var(--surface-color);
  animation: php-email-form-loading 1s linear infinite;
}

@keyframes php-email-form-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Global Header
--------------------------------------------------------------*/
.header {
  color: var(--default-color);
  transition: all 0.5s;
  z-index: 997;
  background-color: var(--background-color);
}

.header .topbar {
  background-color: var(--accent-color);
  height: 40px;
  padding: 0;
  font-size: 14px;
  transition: all 0.5s;
}

.header .topbar .contact-info i {
  font-style: normal;
  color: var(--contrast-color);
}

.header .topbar .contact-info i a,
.header .topbar .contact-info i span {
  padding-left: 5px;
  color: var(--contrast-color);
}

@media (max-width: 575px) {

  .header .topbar .contact-info i a,
  .header .topbar .contact-info i span {
    font-size: 13px;
  }
}

.header .topbar .contact-info i a {
  line-height: 0;
  transition: 0.3s;
}

.header .topbar .contact-info i a:hover {
  color: var(--contrast-color);
  text-decoration: underline;
}

.header .topbar .social-links a {
  color: color-mix(in srgb, var(--contrast-color), transparent 40%);
  line-height: 0;
  transition: 0.3s;
  margin-left: 20px;
}

.header .topbar .social-links a:hover {
  color: var(--contrast-color);
}

.header .branding {
  min-height: 60px;
  padding: 10px 0;
}

.header .logo {
  line-height: 1;
}

.header .logo img {
  max-height: 36px;
  margin-right: 8px;
}

.header .logo h1 {
  font-size: 30px;
  margin: 0;
  font-weight: 700;
  color: var(--heading-color);
}

.header .cta-btn,
.header .cta-btn:focus {
  color: var(--contrast-color);
  background: var(--accent-color);
  font-size: 14px;
  padding: 8px 25px;
  margin: 0 0 0 30px;
  border-radius: 50px;
  transition: 0.3s;
}

.header .cta-btn:hover,
.header .cta-btn:focus:hover {
  color: var(--contrast-color);
  background: color-mix(in srgb, var(--accent-color), transparent 15%);
}

@media (max-width: 1200px) {
  .header .logo {
    order: 1;
  }

  .header .cta-btn {
    order: 2;
    margin: 0 15px 0 0;
    padding: 6px 15px;
  }

  .header .navmenu {
    order: 3;
  }
}

.scrolled .header {
  box-shadow: 0px 0 18px rgba(0, 0, 0, 0.1);
}

.scrolled .header .topbar {
  height: 0;
  visibility: hidden;
  overflow: hidden;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/* Desktop Navigation */
@media (min-width: 1200px) {
  .navmenu {
    padding: 0;
  }

  .navmenu ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
  }

  .navmenu li {
    position: relative;
  }

  .navmenu > ul > li {
    white-space: nowrap;
    padding: 15px 14px;
  }

  .navmenu > ul > li:last-child {
    padding-right: 0;
  }

  .navmenu a,
  .navmenu a:focus {
    color: var(--nav-color);
    font-size: 15px;
    padding: 0 2px;
    font-family: var(--nav-font);
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: space-between;
    white-space: nowrap;
    transition: 0.3s;
    position: relative;
  }

  .navmenu a i,
  .navmenu a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
    transition: 0.3s;
  }

  .navmenu > ul > li > a:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: -6px;
    left: 0;
    background-color: var(--nav-hover-color);
    visibility: hidden;
    width: 0px;
    transition: all 0.3s ease-in-out 0s;
  }

  .navmenu a:hover:before,
  .navmenu li:hover > a:before,
  .navmenu .active:before {
    visibility: visible;
    width: 100%;
  }

  .navmenu li:hover > a,
  .navmenu .active,
  .navmenu .active:focus {
    color: var(--nav-hover-color);
  }

  .navmenu .dropdown ul {
    margin: 0;
    padding: 10px 0;
    background: var(--nav-dropdown-background-color);
    display: block;
    position: absolute;
    visibility: hidden;
    left: 14px;
    top: 130%;
    opacity: 0;
    transition: 0.3s;
    border-radius: 4px;
    z-index: 99;
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
  }

  .navmenu .dropdown ul li {
    min-width: 200px;
  }

  .navmenu .dropdown ul a {
    padding: 10px 20px;
    font-size: 15px;
    text-transform: none;
    color: var(--nav-dropdown-color);
  }

  .navmenu .dropdown ul a i {
    font-size: 12px;
  }

  .navmenu .dropdown ul a:hover,
  .navmenu .dropdown ul .active:hover,
  .navmenu .dropdown ul li:hover > a {
    color: var(--nav-dropdown-hover-color);
  }

  .navmenu .dropdown:hover > ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
  }

  .navmenu .dropdown .dropdown ul {
    top: 0;
    left: -90%;
    visibility: hidden;
  }

  .navmenu .dropdown .dropdown:hover > ul {
    opacity: 1;
    top: 0;
    left: -100%;
    visibility: visible;
  }
}

/* Mobile Navigation */
@media (max-width: 1199px) {
  .mobile-nav-toggle {
    color: var(--nav-color);
    font-size: 28px;
    line-height: 0;
    margin-right: 10px;
    cursor: pointer;
    transition: color 0.3s;
  }

  .navmenu {
    padding: 0;
    z-index: 9997;
  }

  .navmenu ul {
    display: none;
    list-style: none;
    position: absolute;
    inset: 60px 20px 20px 20px;
    padding: 10px 0;
    margin: 0;
    border-radius: 6px;
    background-color: var(--nav-mobile-background-color);
    border: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
    box-shadow: none;
    overflow-y: auto;
    transition: 0.3s;
    z-index: 9998;
  }

  .navmenu a,
  .navmenu a:focus {
    color: var(--nav-dropdown-color);
    padding: 10px 20px;
    font-family: var(--nav-font);
    font-size: 17px;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: space-between;
    white-space: nowrap;
    transition: 0.3s;
  }

  .navmenu a i,
  .navmenu a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: 0.3s;
    background-color: color-mix(in srgb, var(--accent-color), transparent 90%);
  }

  .navmenu a i:hover,
  .navmenu a:focus i:hover {
    background-color: var(--accent-color);
    color: var(--contrast-color);
  }

  .navmenu a:hover,
  .navmenu .active,
  .navmenu .active:focus {
    color: var(--nav-dropdown-hover-color);
  }

  .navmenu .active i,
  .navmenu .active:focus i {
    background-color: var(--accent-color);
    color: var(--contrast-color);
    transform: rotate(180deg);
  }

  .navmenu .dropdown ul {
    position: static;
    display: none;
    z-index: 99;
    padding: 10px 0;
    margin: 10px 20px;
    background-color: var(--nav-dropdown-background-color);
    transition: all 0.5s ease-in-out;
  }

  .navmenu .dropdown ul ul {
    background-color: rgba(33, 37, 41, 0.1);
  }

  .navmenu .dropdown > .dropdown-active {
    display: block;
    background-color: rgba(33, 37, 41, 0.03);
  }

  .mobile-nav-active {
    overflow: hidden;
  }

  .mobile-nav-active .mobile-nav-toggle {
    color: #fff;
    position: absolute;
    font-size: 32px;
    top: 15px;
    right: 15px;
    margin-right: 0;
    z-index: 9999;
  }

  .mobile-nav-active .navmenu {
    position: fixed;
    overflow: hidden;
    inset: 0;
    background: rgba(33, 37, 41, 0.8);
    transition: 0.3s;
  }

  .mobile-nav-active .navmenu > ul {
    display: block;
  }
}

/*--------------------------------------------------------------
# Global Footer
--------------------------------------------------------------*/
.footer {
  color: var(--default-color);
  background-color: var(--background-color);
  border-top: 1px solid color-mix(in srgb, var(--accent-color), transparent 75%);
  font-size: 14px;
  position: relative;
}

.footer .footer-top {
  padding-top: 50px;
}

.footer .footer-about .logo {
  line-height: 1;
  margin-bottom: 25px;
}

.footer .footer-about .logo img {
  max-height: 40px;
  margin-right: 6px;
}

.footer .footer-about .logo span {
  color: var(--heading-color);
  font-family: var(--heading-font);
  font-size: 26px;
  font-weight: 700;
  letter-spacing: 1px;
}

.footer .footer-about p {
  font-size: 14px;
  font-family: var(--heading-font);
}

.footer .social-links a {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 50%);
  font-size: 16px;
  color: color-mix(in srgb, var(--default-color), transparent 20%);
  margin-right: 10px;
  transition: 0.3s;
}

.footer .social-links a:hover {
  color: var(--accent-color);
  border-color: var(--accent-color);
}

.footer h4 {
  font-size: 16px;
  font-weight: bold;
  position: relative;
  padding-bottom: 12px;
}

.footer .footer-links {
  margin-bottom: 30px;
}

.footer .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer .footer-links ul i {
  padding-right: 2px;
  font-size: 12px;
  line-height: 0;
}

.footer .footer-links ul li {
  padding: 10px 0;
  display: flex;
  align-items: center;
}

.footer .footer-links ul li:first-child {
  padding-top: 0;
}

.footer .footer-links ul a {
  color: color-mix(in srgb, var(--default-color), transparent 30%);
  display: inline-block;
  line-height: 1;
}

.footer .footer-links ul a:hover {
  color: var(--accent-color);
}

.footer .footer-contact p {
  margin-bottom: 5px;
}

.footer .copyright {
  padding-top: 25px;
  padding-bottom: 25px;
  border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.footer .copyright p {
  margin-bottom: 0;
}

.footer .credits {
  margin-top: 8px;
  font-size: 13px;
}

/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
#preloader {
  position: fixed;
  inset: 0;
  z-index: 999999;
  overflow: hidden;
  background: var(--background-color);
  transition: all 0.6s ease-out;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #ffffff;
  border-color: var(--accent-color) transparent var(--accent-color) transparent;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: animate-preloader 1.5s linear infinite;
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Scroll Top Button
--------------------------------------------------------------*/
.scroll-top {
  position: fixed;
  visibility: hidden;
  opacity: 0;
  right: 15px;
  bottom: 15px;
  z-index: 99999;
  background-color: var(--accent-color);
  width: 40px;
  height: 40px;
  border-radius: 4px;
  transition: all 0.4s;
}

.scroll-top i {
  font-size: 24px;
  color: var(--contrast-color);
  line-height: 0;
}

.scroll-top:hover {
  background-color: color-mix(in srgb, var(--accent-color), transparent 20%);
  color: var(--contrast-color);
}

.scroll-top.active {
  visibility: visible;
  opacity: 1;
}

/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/
@media screen and (max-width: 768px) {
  [data-aos-delay] {
    transition-delay: 0 !important;
  }
}

/*--------------------------------------------------------------
# Global Page Titles & Breadcrumbs
--------------------------------------------------------------*/
.page-title {
  color: var(--default-color);
  background-color: var(--background-color);
  position: relative;
}

.page-title .heading {
  padding: 80px 0;
  border-top: 1px solid color-mix(in srgb, var(--accent-color), transparent 80%);
}

.page-title .heading h1 {
  font-size: 38px;
  font-weight: 700;
}

.page-title nav {
  background-color: color-mix(in srgb, var(--accent-color), transparent 94%);
  padding: 20px 0;
}

.page-title nav ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  font-size: 16px;
  font-weight: 600;
}

.page-title nav ol li + li {
  padding-left: 10px;
}

.page-title nav ol li + li::before {
  content: "/";
  display: inline-block;
  padding-right: 10px;
  color: color-mix(in srgb, var(--default-color), transparent 70%);
}

/*--------------------------------------------------------------
# Global Sections
--------------------------------------------------------------*/
section,
.section {
  color: var(--default-color);
  background-color: var(--background-color);
  padding: 60px 0;
  scroll-margin-top: 72px;
  overflow: clip;
}

@media (max-width: 1199px) {

  section,
  .section {
    scroll-margin-top: 60px;
  }
}

/*--------------------------------------------------------------
# Global Section Titles
--------------------------------------------------------------*/
.section-title {
  text-align: center;
  padding-bottom: 60px;
  position: relative;
}

.section-title h2 {
  font-size: 32px;
  font-weight: 500;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-title h2:before {
  content: "";
  position: absolute;
  display: block;
  width: 160px;
  height: 1px;
  background: color-mix(in srgb, var(--default-color), transparent 60%);
  left: 0;
  right: 0;
  bottom: 1px;
  margin: auto;
}

.section-title h2::after {
  content: "";
  position: absolute;
  display: block;
  width: 60px;
  height: 3px;
  background: var(--accent-color);
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
}

.section-title p {
  margin-bottom: 0;
}

/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
.hero {
  width: 100%;
  min-height: calc(100vh - 112px);
  padding: 80px 0;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
}

.hero img {
  position: absolute;
  inset: 0;
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: 1;
}

.hero .container {
  z-index: 3;
}

.hero .welcome h2 {
  margin: 0;
  font-size: 48px;
  font-weight: 700;
}

.hero .welcome p {
  font-size: 24px;
  margin: 0;
}

.hero .content {
  margin-top: 40px;
}

.hero .content .why-box {
  color: var(--contrast-color);
  background: var(--accent-color);
  padding: 10px;
  border-radius: 4px;
}

.hero .content .why-box h3 {
  color: var(--contrast-color);
  font-weight: 700;
  font-size: 34px;
  margin-bottom: 30px;
}

.hero .content .why-box p {
  margin-bottom: 30px;
}

.hero .content .why-box .more-btn {
  color: var(--contrast-color);
  background: color-mix(in srgb, var(--contrast-color), transparent 80%);
  display: inline-block;
  padding: 6px 30px 8px 30px;
  border-radius: 50px;
  transition: all ease-in-out 0.4s;
}

.hero .content .why-box .more-btn i {
  font-size: 14px;
}

.hero .content .why-box .more-btn:hover {
  background: var(--surface-color);
  color: var(--accent-color);
}

.hero .content .icon-box {
  text-align: center;
  border-radius: 10px;
  background: color-mix(in srgb, var(--surface-color), transparent 20%);
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  padding: 40px 30px;
  width: 100%;
}

.hero .content .icon-box i {
  font-size: 40px;
  color: var(--accent-color);
}

.hero .content .icon-box h4 {
  font-size: 20px;
  font-weight: 700;
  margin: 10px 0 20px 0;
}

.hero .content .icon-box p {
  font-size: 15px;
  color: color-mix(in srgb, var(--default-color), transparent 30%);
}

/*--------------------------------------------------------------
# About Section
--------------------------------------------------------------*/
.about .content h3 {
  font-size: 2rem;
  font-weight: 700;
}

.about .content ul {
  list-style: none;
  padding: 0;
}

.about .content ul li {
  display: flex;
  align-items: flex-start;
  margin-top: 40px;
}

.about .content ul i {
  flex-shrink: 0;
  font-size: 48px;
  color: var(--accent-color);
  margin-right: 20px;
}

.about .content ul h5 {
  font-size: 18px;
  font-weight: 700;
}

.about .content ul p {
  font-size: 15px;
}

.about .content p:last-child {
  margin-bottom: 0;
}

.about .pulsating-play-btn {
  position: absolute;
  left: calc(50% - 47px);
  top: calc(50% - 47px);
}

/*--------------------------------------------------------------
# Stats Section
--------------------------------------------------------------*/
.stats i {
  color: var(--contrast-color);
  background-color: var(--accent-color);
  box-shadow: 0px 2px 25px rgba(0, 0, 0, 0.1);
  width: 54px;
  height: 54px;
  font-size: 24px;
  border-radius: 50px;
  border: 2px solid var(--background-color);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  position: relative;
  z-index: 1;
}

.stats .stats-item {
  background-color: var(--surface-color);
  margin-top: -27px;
  padding: 30px 30px 25px 30px;
  width: 100%;
  position: relative;
  text-align: center;
  box-shadow: 0px 2px 35px rgba(0, 0, 0, 0.1);
  border-radius: 4px;
  z-index: 0;
}

.stats .stats-item span {
  font-size: 32px;
  display: block;
  margin: 10px 0;
  font-weight: 700;
  color: var(--heading-color);
}

.stats .stats-item p {
  padding: 0;
  margin: 0;
  font-family: var(--heading-font);
  font-size: 16px;
}

/*--------------------------------------------------------------
# Services Section
--------------------------------------------------------------*/
.services .service-item {
  background-color: var(--surface-color);
  text-align: center;
  border: 1px solid color-mix(in srgb, var(--default-color), transparent 85%);
  padding: 80px 20px;
  transition: all ease-in-out 0.3s;
  height: 100%;
}

.services .service-item .icon {
  margin: 0 auto;
  width: 64px;
  height: 64px;
  background: var(--accent-color);
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  transition: 0.3s;
  transform-style: preserve-3d;
}

.services .service-item .icon i {
  color: var(--contrast-color);
  font-size: 28px;
  transition: ease-in-out 0.3s;
}

.services .service-item .icon::before {
  position: absolute;
  content: "";
  left: -8px;
  top: -8px;
  height: 100%;
  width: 100%;
  background: color-mix(in srgb, var(--accent-color), transparent 80%);
  border-radius: 5px;
  transition: all 0.3s ease-out 0s;
  transform: translateZ(-1px);
}

.services .service-item h3 {
  font-weight: 700;
  margin: 10px 0 15px 0;
  font-size: 22px;
}

.services .service-item p {
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}

.services .service-item:hover {
  background: var(--accent-color);
  border-color: var(--accent-color);
}

.services .service-item:hover .icon {
  background: var(--surface-color);
}

.services .service-item:hover .icon i {
  color: var(--accent-color);
}

.services .service-item:hover .icon::before {
  background: color-mix(in srgb, var(--background-color), transparent 70%);
}

.services .service-item:hover h3,
.services .service-item:hover p {
  color: var(--contrast-color);
}

/*--------------------------------------------------------------
# Appointment Section
--------------------------------------------------------------*/
.appointment .php-email-form {
  width: 100%;
}

.appointment .php-email-form .form-group {
  padding-bottom: 8px;
}

.appointment .php-email-form input,
.appointment .php-email-form textarea,
.appointment .php-email-form select {
  color: var(--default-color);
  background-color: transparent;
  border-color: color-mix(in srgb, var(--default-color), transparent 80%);
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  padding: 10px !important;
}

.appointment .php-email-form input:focus,
.appointment .php-email-form textarea:focus,
.appointment .php-email-form select:focus {
  border-color: var(--accent-color);
}

.appointment .php-email-form input::placeholder,
.appointment .php-email-form textarea::placeholder,
.appointment .php-email-form select::placeholder {
  color: color-mix(in srgb, var(--default-color), transparent 70%);
}

.appointment .php-email-form input,
.appointment .php-email-form select {
  height: 44px;
}

.appointment .php-email-form textarea {
  padding: 10px 12px;
}

.appointment .php-email-form button[type=submit] {
  background: var(--accent-color);
  border: 0;
  padding: 10px 35px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;
}

.appointment .php-email-form button[type=submit]:hover {
  background: color-mix(in srgb, var(--accent-color) 90%, white 15%);
}

/*--------------------------------------------------------------
# Departments Section
--------------------------------------------------------------*/
.departments {
  overflow: hidden;
}

.departments .nav-tabs {
  border: 0;
}

.departments .nav-link {
  border: 0;
  padding: 12px 15px 12px 0;
  transition: 0.3s;
  color: var(--default-color);
  border-radius: 0;
  border-right: 2px solid color-mix(in srgb, var(--default-color), transparent 90%);
  font-weight: 600;
  font-size: 15px;
}

.departments .nav-link:hover {
  color: var(--accent-color);
}

.departments .nav-link.active {
  color: var(--accent-color);
  border-color: var(--accent-color);
  background-color: var(--background-color);
}

.departments .tab-pane.active {
  animation: fadeIn 0.5s ease-out;
}

.departments .details h3 {
  font-size: 26px;
  font-weight: 600;
  margin-bottom: 20px;
}

.departments .details p {
  color: color-mix(in srgb, var(--default-color), transparent 20%);
}

.departments .details p:last-child {
  margin-bottom: 0;
}

@media (max-width: 992px) {
  .departments .nav-link {
    border: 0;
    padding: 15px;
  }

  .departments .nav-link.active {
    color: var(--accent-color);
    background: var(--accent-color);
  }
}

/*--------------------------------------------------------------
# Doctors Section
--------------------------------------------------------------*/
.doctors .team-member {
  background-color: var(--surface-color);
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  position: relative;
  border-radius: 5px;
  transition: 0.5s;
  padding: 30px;
  height: 100%;
}

@media (max-width: 468px) {
  .doctors .team-member {
    flex-direction: column;
    justify-content: center !important;
    align-items: center !important;
  }
}

.doctors .team-member .pic {
  overflow: hidden;
  width: 150px;
  border-radius: 50%;
  flex-shrink: 0;
}

.doctors .team-member .pic img {
  transition: ease-in-out 0.3s;
}

.doctors .team-member:hover {
  transform: translateY(-10px);
}

.doctors .team-member .member-info {
  padding-left: 30px;
}

@media (max-width: 468px) {
  .doctors .team-member .member-info {
    padding: 30px 0 0 0;
    text-align: center;
  }
}

.doctors .team-member h4 {
  font-weight: 700;
  margin-bottom: 5px;
  font-size: 20px;
}

.doctors .team-member span {
  display: block;
  font-size: 15px;
  padding-bottom: 10px;
  position: relative;
  font-weight: 500;
}

.doctors .team-member span::after {
  content: "";
  position: absolute;
  display: block;
  width: 50px;
  height: 1px;
  background: color-mix(in srgb, var(--default-color), transparent 85%);
  bottom: 0;
  left: 0;
}

@media (max-width: 468px) {
  .doctors .team-member span::after {
    left: calc(50% - 25px);
  }
}

.doctors .team-member p {
  margin: 10px 0 0 0;
  font-size: 14px;
}

.doctors .team-member .social {
  margin-top: 12px;
  display: flex;
  align-items: center;
  justify-content: start;
  width: 100%;
}

@media (max-width: 468px) {
  .doctors .team-member .social {
    justify-content: center;
  }
}

.doctors .team-member .social a {
  background: color-mix(in srgb, var(--default-color), transparent 94%);
  transition: ease-in-out 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50px;
  width: 36px;
  height: 36px;
}

.doctors .team-member .social a i {
  color: color-mix(in srgb, var(--default-color), transparent 20%);
  font-size: 16px;
  margin: 0 2px;
}

.doctors .team-member .social a:hover {
  background: var(--accent-color);
}

.doctors .team-member .social a:hover i {
  color: var(--contrast-color);
}

.doctors .team-member .social a + a {
  margin-left: 8px;
}

/*--------------------------------------------------------------
# Faq Section
--------------------------------------------------------------*/
.faq .faq-container .faq-item {
  background-color: var(--surface-color);
  position: relative;
  padding: 20px;
  margin-bottom: 15px;
  border: 1px solid color-mix(in srgb, var(--accent-color), transparent 75%);
  border-radius: 5px;
  overflow: hidden;
}

.faq .faq-container .faq-item:last-child {
  margin-bottom: 0;
}

.faq .faq-container .faq-item h3 {
  font-weight: 500;
  font-size: 18px;
  line-height: 24px;
  margin: 0 30px 0 0;
  transition: 0.3s;
  cursor: pointer;
  display: flex;
  align-items: center;
}

.faq .faq-container .faq-item h3 .num {
  color: var(--accent-color);
  padding-right: 5px;
}

.faq .faq-container .faq-item h3:hover {
  color: var(--accent-color);
}

.faq .faq-container .faq-item .faq-content {
  display: grid;
  grid-template-rows: 0fr;
  transition: 0.3s ease-in-out;
  visibility: hidden;
  opacity: 0;
}

.faq .faq-container .faq-item .faq-content p {
  margin-bottom: 0;
  overflow: hidden;
}

.faq .faq-container .faq-item .faq-toggle {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 16px;
  line-height: 0;
  transition: 0.3s;
  cursor: pointer;
}

.faq .faq-container .faq-item .faq-toggle:hover {
  color: var(--accent-color);
}

.faq .faq-container .faq-active {
  background-color: var(--accent-color);
  border-color: var(--accent-color);
  color: var(--contrast-color);
}

.faq .faq-container .faq-active h3,
.faq .faq-container .faq-active h3:hover {
  color: var(--contrast-color);
}

.faq .faq-container .faq-active .faq-content {
  grid-template-rows: 1fr;
  visibility: visible;
  opacity: 1;
  padding-top: 10px;
}

.faq .faq-container .faq-active .faq-toggle {
  transform: rotate(90deg);
  color: var(--accent-color);
}


/*--------------------------------------------------------------
# Gallery Section
--------------------------------------------------------------*/
.gallery .gallery-item {
  overflow: hidden;
  border-right: 3px solid var(--background-color);
  border-bottom: 3px solid var(--background-color);
}

.gallery .gallery-item img {
  transition: all ease-in-out 0.4s;
}

.gallery .gallery-item:hover img {
  transform: scale(1.1);
}

/*--------------------------------------------------------------
# Contact Section
--------------------------------------------------------------*/
.contact .info-item + .info-item {
  margin-top: 40px;
}

.contact .info-item i {
  color: var(--contrast-color);
  background: var(--accent-color);
  font-size: 20px;
  width: 44px;
  height: 44px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
  margin-right: 15px;
}

.contact .info-item h3 {
  padding: 0;
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 5px;
}

.contact .info-item p {
  padding: 0;
  margin-bottom: 0;
  font-size: 14px;
}

.contact .php-email-form {
  height: 100%;
}

.contact .php-email-form input[type=text],
.contact .php-email-form input[type=email],
.contact .php-email-form textarea {
  font-size: 14px;
  padding: 10px 15px;
  box-shadow: none;
  border-radius: 0;
  color: var(--default-color);
  background-color: color-mix(in srgb, var(--background-color), transparent 50%);
  border-color: color-mix(in srgb, var(--default-color), transparent 80%);
}

.contact .php-email-form input[type=text]:focus,
.contact .php-email-form input[type=email]:focus,
.contact .php-email-form textarea:focus {
  border-color: var(--accent-color);
}

.contact .php-email-form input[type=text]::placeholder,
.contact .php-email-form input[type=email]::placeholder,
.contact .php-email-form textarea::placeholder {
  color: color-mix(in srgb, var(--default-color), transparent 70%);
}

.contact .php-email-form button[type=submit] {
  color: var(--contrast-color);
  background: var(--accent-color);
  border: 0;
  padding: 10px 36px;
  transition: 0.4s;
  border-radius: 50px;
}

.contact .php-email-form button[type=submit]:hover {
  background: color-mix(in srgb, var(--accent-color), transparent 20%);
}

/*--------------------------------------------------------------
# Starter Section Section
--------------------------------------------------------------*/
.starter-section {
  /* Add your styles here */
}




.card_start {
  width: 100%;
  height: 60vh;
  box-sizing: border-box;
  padding: 140px 0;
  background: #F8FAFC;
}

.card {
  position: relative;
  max-width: 300px;
  height: auto;
  background: linear-gradient(-45deg, #fe0847, #feae3f);
  border-radius: 15px;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  -ms-border-radius: 15px;
  -o-border-radius: 15px;
  margin: 0 auto;
  padding: 40px 20px;
  box-shadow: 0 10px 15px rgba(0, 0, 0, .2);
  transition: .5s;
  -webkit-transition: .5s;
  -moz-transition: .5s;
  -ms-transition: .5s;
  -o-transition: .5s;
  overflow: hidden;
}

.card:hover {
  transform: scale(1.1);
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
}

.col-sm-4:nth-child(1) .card,
.col-sm-4:nth-child(1) .card .title .fa {
  background: linear-gradient(-45deg, #f403d1, #64b5f6);
}

.col-sm-4:nth-child(2) .card,
.col-sm-4:nth-child(2) .card .title .fa {
  background: linear-gradient(-45deg, #ffec61, #f321d7);
}

.col-sm-4:nth-child(3) .card,
.col-sm-4:nth-child(3) .card .title .fa {
  background: linear-gradient(-45deg, #24ff72, #9a4eff);
}

.card:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background: rgba(255, 255, 255, .1);
  z-index: 1;
  transform: skewY(-5deg) scale(1.5);
  -webkit-transform: skewY(-5deg) scale(1.5);
  -moz-transform: skewY(-5deg) scale(1.5);
  -ms-transform: skewY(-5deg) scale(1.5);
  -o-transform: skewY(-5deg) scale(1.5);
}

.title .fa {
  color: #fff;
  font-size: 60px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  text-align: center;
  line-height: 100px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, .2);
}

.title h2 {
  position: relative;
  margin: 20px 0 0;
  padding: 0;
  color: #fff;
  font-size: 28px;
  z-index: 2;
}

.price {
  position: relative;
  z-index: 2;
}

.price h4 {
  margin: 0;
  padding: 20px 0;
  color: #fff;
  font-size: 60px;
}

.option {
  position: relative;
  z-index: 2;
}

.option ul {
  margin: 0;
  padding: 0;
}

.option ul li {
  margin: 0 0 10px;
  padding: 0;
  list-style: none;
  color: #fff;
  font-size: 16px;
}

.card a {
  position: relative;
  z-index: 2;
  background: #fff;
  color: #262626;
  width: 150px;
  height: 40px;
  line-height: 40px;
  border-radius: 40px;
  display: block;
  text-align: center;
  margin: 20px auto 0;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  -ms-border-radius: 40px;
  -o-border-radius: 40px;
  font-size: 16px;
  cursor: pointer;
  box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
}

.card a:hover {
  text-decoration: none;
}


.contact-section {
  min-height: 100vh;
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
  padding: 5rem 0;
}

.contact-card {
  background: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
  padding: 3rem 2rem;
  position: relative;
  z-index: 1;
}

.contact-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(45deg, #6366f1 0%, #8b5cf6 100%);
  z-index: -1;
  clip-path: circle(60px at 90% 10%);
  transition: 0.5s ease-in-out;
}

.contact-card:hover::before {
  clip-path: circle(400px at 90% -10%);
}

.contact-card:hover .contact-title {
  color: white;
}

.contact-card:hover .contact-subtitle {
  color: black;
}

.contact-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  background: black;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  transition: all 0.3s ease;
}

.contact-subtitle {
  color: #6b7280;
  font-size: 1.1rem;
  margin-bottom: 2.5rem;
  transition: all 0.3s ease;
}

.contact-link {
  background: white;
  padding: 1.25rem;
  border-radius: 15px;
  display: flex;
  align-items: center;
  gap: 1rem;
  text-decoration: none;
  transition: all 0.3s ease;
  margin-bottom: 1rem;
  border: 1px solid rgba(0, 0, 0, 0.1);
}

.contact-link:hover {
  transform: translateX(10px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.contact-icon {
  width: 45px;
  height: 45px;
  padding: 10px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.facebook-icon {
  background: rgba(66, 103, 178, 0.1);
  color: #4267B2;
}

.email-icon {
  background: rgba(234, 67, 53, 0.1);
  color: #EA4335;
}

.phone-icon {
  background: rgba(52, 168, 83, 0.1);
  color: #34A853;
}

.contact-link:hover .contact-icon {
  transform: scale(1.1);
}

.contact-text {
  font-size: 1.1rem;
  font-weight: 500;
  color: #374151;
}

.contact-subtext {
  font-size: 0.9rem;
  color: #6b7280;
  margin: 0;
}

@keyframes floatAnimation {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0px); }
}

.floating {
  animation: floatAnimation 3s ease-in-out infinite;
}
</style>