<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PayGlitz - Login</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <?php
  include "head.php";
  ?>
  
</head>

<body>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">PayGlitz</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up"><span>Login</span></h1>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <center>
              <div class="p-5">
                <div class="col-lg-10">
                  <form action="#" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                    <div class="row gy-4">
                      <div class="col-md-12">
                        <input type="text" name="uname" id="uname" class="form-control w-100" placeholder="Username" required="">
                      </div>

                      <div class="col-md-12">
                        <input type="text" class="form-control" name="upword" id="upword" placeholder="Password" required="">
                      </div>
                      <div></div>
                    </div>
                    <a href="#" class="btn-get-started">Log in</a>
                  </form>
                </div>
              </div>
            </center>
          </div>
        </div>
      </div>
    </section><!-- Hero Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">PayGlitz</span>
          </a>
          <div class="footer-contact pt-3">
            <p>123, Fort Street</p>
            <p>Galle, Sri Lanka</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+94 77 345 6789</span></p>
            <p><strong>Email:</strong> <span>payglitz@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PayGlitz</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by Yasasvi Jayoda
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <?php
  include "foot.php";
  ?>

</body>

</html>