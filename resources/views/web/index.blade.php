@extends('web.layouts.main')
@section('content')
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">

    <div class="video-background">
      <video autoplay="" muted="" loop="" playsinline="">
        <source src="{{asset('assets/img/video/video-2.mp4')}}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
      <div class="video-overlay"></div>
    </div>

    <div class="hero-content">

      <div class="container position-relative">
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <h1 data-aos="fade-up" data-aos-delay="100">SAMPE DICARI MAMA SOCIETY</h1>
            <p data-aos="fade-up" data-aos-delay="200">Abandon all sanity, ye who enter here, for this account is the
              gateway to a realm where electronic dance music reigns supreme</p>
            <div class="hero-buttons" data-aos="fade-up" data-aos-delay="300">
              <a href="#ticket" class="btn btn-primary">Pesan Ticket Sekarang</a>
              <!-- <a href="#services" class="btn btn-outline">Learn More</a> -->
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Hero Section -->

  <!-- About Section -->
  <section id="ticket" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <!-- <span class="subtitle">Ticket</span> -->
      <h2>Ticket</h2>
      <p>Presale 1</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
          <div class="content">
            <h2>Society of Screams Fest 2025</h2>
            <p>
              Musik elektronik kini bukan hanya hiburan, tapi ruang interaksi sosial, gaya hidup, dan medium kreativitas.
              <br /><br />
              <strong>Tanggal Pre-Event:</strong> 30 September 2025 <br />
              <strong>Tanggal Main Event:</strong> 24 Oktober 2025 <br />
              <strong>Tempat:</strong> BRUNO AGUSTO HQ, Dau, Malang<br>
            </p>
            <div class="stats-wrapper">
              <div class="stat-item">
                <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="100"
                  data-purecounter-duration="1"></span>
                <span class="label">Saled Ticket</span>
              </div>

            </div>
            <div class="cta-wrapper">
              <a href="{{ route('orderTicket') }}" class="btn-link">
                Pesan Tiket Sekarang
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
          <div class="image-wrapper">
            <img src="assets/img/about/about-1.webp" alt="About us" class="img-fluid">
            <div class="floating-element">
              <div class="quote-content">
                <blockquote> Bergabunglah dalam pesta horor penuh misteri, dentuman musik EDM, cahaya, dan teriakan <b>The
                    Party Never Ends....</b></blockquote>
                <!-- <cite>— Aristotle</cite> -->
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>
  <!-- /About Section -->
  <!-- Contact Section -->
  <section id="contact" class="contact section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <!-- <span class="subtitle">Order</span> -->
      <h2>Contact Us</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row align-items-stretch">
        <div class="col-lg-7 order-lg-1 order-2" data-aos="fade-right" data-aos-delay="200">
          <div class="contact-form-container">
            <div class="form-intro">
              <h2>Let's Start a Conversation</h2>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                excepteur sint occaecat cupidatat.</p>
            </div>

            <form action="forms/contact.php" method="post" class="php-email-form contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-field">
                    <input type="text" name="name" class="form-input" id="userName" placeholder="Your Name" required="">
                    <label for="userName" class="field-label">Name</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-field">
                    <input type="email" class="form-input" name="email" id="userEmail" placeholder="Your Email"
                      required="">
                    <label for="userEmail" class="field-label">Email</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-field">
                    <input type="tel" class="form-input" name="phone" id="userPhone" placeholder="Your Phone">
                    <label for="userPhone" class="field-label">Phone</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-field">
                    <input type="text" class="form-input" name="subject" id="messageSubject" placeholder="Subject"
                      required="">
                    <label for="messageSubject" class="field-label">Subject</label>
                  </div>
                </div>
              </div>

              <div class="form-field message-field">
                <textarea class="form-input message-input" name="message" id="userMessage" rows="5"
                  placeholder="Tell us about your project" required=""></textarea>
                <label for="userMessage" class="field-label">Message</label>
              </div>

              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>

              <button type="submit" class="send-button">
                Send Message
                <span class="button-arrow">→</span>
              </button>
            </form>
          </div>
        </div>

        <div class="col-lg-5 order-lg-2 order-1" data-aos="fade-left" data-aos-delay="300">
          <div class="contact-sidebar">
            <div class="contact-header">
              <h3>Get in Touch</h3>
              <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud.
              </p>
            </div>

            <div class="contact-methods">
              <div class="contact-method" data-aos="fade-in" data-aos-delay="350">
                <div class="contact-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="contact-details">
                  <span class="method-label">Address</span>
                  <p>892 Park Avenue, Manhattan<br>New York, NY 10075</p>
                </div>
              </div>

              <div class="contact-method" data-aos="fade-in" data-aos-delay="400">
                <div class="contact-icon">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="contact-details">
                  <span class="method-label">Email</span>
                  <p>hello@businessdemo.com</p>
                </div>
              </div>

              <div class="contact-method" data-aos="fade-in" data-aos-delay="450">
                <div class="contact-icon">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="contact-details">
                  <span class="method-label">Phone</span>
                  <p>+1 (555) 789-2468</p>
                </div>
              </div>

              <div class="contact-method" data-aos="fade-in" data-aos-delay="500">
                <div class="contact-icon">
                  <i class="bi bi-clock"></i>
                </div>
                <div class="contact-details">
                  <span class="method-label">Hours</span>
                  <p>Monday - Friday: 9AM - 6PM<br>Saturday: 10AM - 4PM</p>
                </div>
              </div>
            </div>

            <div class="connect-section" data-aos="fade-up" data-aos-delay="550">
              <span class="connect-label">Connect with us</span>
              <div class="social-links">
                <a href="#" class="social-link">
                  <i class="bi bi-linkedin"></i>
                </a>
                <a href="#" class="social-link">
                  <i class="bi bi-twitter-x"></i>
                </a>
                <a href="#" class="social-link">
                  <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="social-link">
                  <i class="bi bi-facebook"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Contact Section -->


@endsection
@section('script')
  <script>
  </script>
@endsection