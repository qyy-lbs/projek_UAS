<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotstar Indonesia - Onboarding</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
      /* ===== GLOBAL STYLES ===== */
      :root {
        --primary-blue: #1f80e0;
        --dark-blue: #0f1535;
        --darker-blue: #040720;
        --navy-blue: #1a2e6b;
        --footer-bg: #0a0e23;
        --text-light: rgba(255, 255, 255, 0.9);
        --text-lighter: rgba(255, 255, 255, 0.7);
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }

      body {
        background: radial-gradient(
          ellipse at top,
          var(--navy-blue),
          var(--darker-blue)
        );
        color: white;
        min-height: 100vh;
        line-height: 1.6;
      }

      /* ===== UTILITY CLASSES ===== */
      .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
      }

      .section-title {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        text-align: center;
        position: relative;
        display: inline-block;
      }

      .section-title::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--primary-blue);
        border-radius: 2px;
      }

      .btn {
        display: inline-block;
        background-color: var(--primary-blue);
        color: white;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
      }

      .btn:hover {
        background-color: #1a6fc7;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(31, 128, 224, 0.3);
      }

      /* ===== NAVBAR ===== */
      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 50px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: linear-gradient(
          to bottom,
          rgba(4, 7, 32, 0.9),
          transparent
        );
        transition: background 0.3s;
      }

      .navbar.scrolled {
        background: var(--darker-blue);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      }

      .logo {
        width: 140px;
        transition: transform 0.3s;
      }

      .logo:hover {
        transform: scale(1.05);
      }

      .login-btn {
        padding: 10px 28px;
        font-size: 0.95rem;
      }

      /* ===== HERO SECTION ===== */
      .hero-section {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
        padding-top: 80px;
      }

      .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("https://img1.hotstarext.com/image/upload/f_auto,t_web_m_1x/sources/r1/cms/prod/4937/1424937-h-0d8b1c4f5f6a")
          center/cover no-repeat;
        opacity: 0.3;
        z-index: -1;
      }

      .hero-content {
        max-width: 800px;
        padding: 0 20px;
        animation: fadeInUp 1s ease;
      }

      .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
      }

      .hero-subtitle {
        font-size: 1.3rem;
        opacity: 0.9;
        margin-bottom: 2.5rem;
        text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
      }

      .cta-btn {
        padding: 16px 45px;
        font-size: 1.2rem;
        margin-top: 1rem;
      }

      /* ===== FREE CONTENT SECTION ===== */
      .free-section {
        padding: 100px 0;
        background-color: var(--footer-bg);
        position: relative;
      }

      .free-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, var(--darker-blue), transparent);
        z-index: 1;
      }

      .section-header {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        z-index: 2;
      }

      .section-subtitle {
        font-size: 1.2rem;
        opacity: 0.8;
        max-width: 700px;
        margin: 0 auto;
      }

      .showcase-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 30px;
        position: relative;
        z-index: 2;
      }

      .show-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        aspect-ratio: 2/3;
        background: var(--dark-blue);
      }

      .show-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
      }

      .show-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.5s;
      }

      .show-card:hover .show-image {
        transform: scale(1.1);
      }

      .show-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
        padding: 20px;
        text-align: center;
      }

      .show-title {
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 1.1rem;
      }

      .try-btn {
        width: 100%;
        padding: 10px;
        font-size: 0.95rem;
      }

      /* ===== FEATURES SECTION ===== */
      .features-section {
        padding: 100px 0;
        background: linear-gradient(
          to bottom,
          var(--darker-blue),
          var(--navy-blue)
        );
      }

      .features-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin-top: 60px;
      }

      .feature-card {
        background-color: rgba(15, 21, 53, 0.7);
        border-radius: 15px;
        padding: 50px 30px;
        text-align: center;
        transition: all 0.4s;
        border: 1px solid rgba(31, 128, 224, 0.2);
        backdrop-filter: blur(5px);
      }

      .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(31, 128, 224, 0.2);
        border-color: rgba(31, 128, 224, 0.4);
      }

      .feature-icon {
        font-size: 3.5rem;
        color: var(--primary-blue);
        margin-bottom: 25px;
        transition: transform 0.3s;
      }

      .feature-card:hover .feature-icon {
        transform: scale(1.1);
      }

      .feature-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
        font-weight: 600;
      }

      .feature-desc {
        font-size: 1.05rem;
        opacity: 0.8;
        line-height: 1.7;
      }

      /* ===== PLANS SECTION ===== */
      .plans-section {
        padding: 100px 0;
        background: radial-gradient(
          ellipse at center,
          var(--navy-blue),
          var(--darker-blue)
        );
        position: relative;
        overflow: hidden;
      }

      .plans-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 60px;
        position: relative;
        z-index: 2;
      }

      .plan-card {
        background-color: rgba(15, 21, 53, 0.8);
        border-radius: 15px;
        padding: 40px 30px;
        transition: all 0.4s;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(31, 128, 224, 0.2);
      }

      .plan-card::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(
          circle,
          rgba(31, 128, 224, 0.1) 0%,
          transparent 70%
        );
        transition: all 0.6s;
        opacity: 0;
      }

      .plan-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        border-color: rgba(31, 128, 224, 0.4);
      }

      .plan-card:hover::before {
        opacity: 1;
        transform: rotate(180deg);
      }

      .plan-name {
        font-size: 1.6rem;
        margin-bottom: 15px;
        color: var(--primary-blue);
        text-align: center;
      }

      .plan-price {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 25px;
        text-align: center;
        position: relative;
      }

      .plan-price::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 2px;
        background: var(--primary-blue);
      }

      .plan-features {
        list-style: none;
        margin-bottom: 35px;
      }

      .plan-features li {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
        padding: 8px 0;
        border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
      }

      .plan-features i {
        color: var(--primary-blue);
        margin-right: 12px;
        font-size: 1.1rem;
        margin-top: 3px;
      }

      .select-plan-btn {
        width: 100%;
        padding: 14px;
        font-size: 1.05rem;
      }

      /* ===== FOOTER ===== */
      .footer {
        background-color: var(--footer-bg);
        padding: 60px 0 30px;
        text-align: center;
        position: relative;
      }

      .footer::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, var(--darker-blue), transparent);
      }

      .footer-links {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 25px;
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
      }

      .footer-links a {
        color: var(--text-lighter);
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s;
        position: relative;
      }

      .footer-links a:hover {
        color: white;
      }

      .footer-links a::after {
        content: "";
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary-blue);
        transition: width 0.3s;
      }

      .footer-links a:hover::after {
        width: 100%;
      }

      .copyright {
        color: var(--text-lighter);
        font-size: 0.9rem;
        margin-top: 30px;
        position: relative;
        z-index: 2;
      }

      /* ===== ANIMATIONS ===== */
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* ===== RESPONSIVE ===== */
      @media (max-width: 992px) {
        .hero-title {
          font-size: 3rem;
        }

        .section-title {
          font-size: 2.2rem;
        }
      }

      @media (max-width: 768px) {
        .navbar {
          padding: 15px 20px;
        }

        .logo {
          width: 120px;
        }

        .hero-title {
          font-size: 2.5rem;
        }

        .hero-subtitle {
          font-size: 1.1rem;
        }

        .section-title {
          font-size: 2rem;
        }

        .features-container,
        .plans-container {
          grid-template-columns: 1fr;
          max-width: 500px;
          margin-left: auto;
          margin-right: auto;
        }

        .showcase-container {
          grid-template-columns: repeat(3, 1fr);
        }
      }

      @media (max-width: 576px) {
        .hero-title {
          font-size: 2rem;
        }

        .hero-subtitle {
          font-size: 1rem;
        }

        .cta-btn,
        .select-plan-btn {
          padding: 12px 30px;
          font-size: 1rem;
        }

        .showcase-container {
          grid-template-columns: repeat(2, 1fr);
          gap: 20px;
        }

        .footer-links {
          gap: 15px;
        }
      }
    
    .testimonials {
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
      justify-content: center;
    }
    .testimonial {
      background-color: rgba(255,255,255,0.05);
      padding: 20px;
      border-radius: 10px;
      max-width: 400px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .testimonial p {
      font-style: italic;
    }
    .promo-banner {
      background: var(--primary-blue);
      text-align: center;
      padding: 10px;
      font-weight: bold;
    }
    .promo-banner span {
      font-family: monospace;
    }
    .modal {
      display: none; position: fixed; z-index: 2000;
      left: 0; top: 0; width: 100%; height: 100%;
      background: rgba(0,0,0,0.7);
      justify-content: center; align-items: center;
    }
    .modal-content {
      background-color: var(--footer-bg);
      padding: 30px; border-radius: 10px;
      width: 90%; max-width: 400px;
      text-align: center;
    }
    .modal-content input {
      width: 100%; padding: 10px;
      margin: 10px 0; border: none; border-radius: 5px;
    }
    .close-btn {
      position: absolute; top: 20px; right: 30px;
      font-size: 30px; cursor: pointer; color: white;
    }

    .section-title {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 1.5rem;
      position: relative;
    }
    .devices-section {
      background-color: var(--dark-blue);
      padding: 100px 0;
    }
    .devices-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
      margin-top: 40px;
    }
    .device-category {
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 10px;
      padding: 30px 20px;
      width: 250px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease;
    }
    .device-category:hover {
      transform: translateY(-5px);
    }
    .category-title {
      font-size: 1.3rem;
      margin-bottom: 15px;
      color: var(--primary-blue);
    }
    .device-list {
      list-style: none;
      padding: 0;
    }
    .device-list li {
      padding: 8px 0;
      font-size: 1rem;
      color: var(--text-light);
    }
    .device-list i {
      margin-right: 8px;
      color: var(--primary-blue);
    }
</style>


  
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
</head>

  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <!-- <img src="https://secure-media.hotstarext.com/web-assets/prod/images/brand-logos/disney-hotstar-logo.svg" alt="Hotstar Logo" class="logo"> -->
      <h2>AMOV</h2>
      <button class="btn login-btn">MASUK</button>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-bg"></div>
      <div class="hero-content">
        <h1 class="hero-title">Langkah Pertama Menuju Hiburan Tanpa Batas</h1>
        <p class="hero-subtitle">
          Nikmati akses ke ribuan jam film, serial TV, olahraga, dan acara
          eksklusif AMovStar
        </p>
        <button class="btn cta-btn">MULAI SEKARANG</button>
      </div>
    </section>

    <!-- Free Content Section -->
    <section class="free-section">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Streaming Gratis!</h2>
          <p class="section-subtitle">
            Tonton episode pilihan dari cerita favorit Anda tanpa perlu
            langganan berbayar
          </p>
        </div>
        <div class="showcase-container">
          <!-- Show 1 -->
          <div class="show-card">
            <img src="./img/arsenal.jpg" alt="MOVING" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <!-- Show 2 -->
          <div class="show-card">
            <img src="./img/blade.webp" alt="THE JUDGE" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <!-- Show 3 -->
          <div class="show-card">
            <img src="./img/forrest-gump.jpg" alt="AMI" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <!-- Show 4 -->
          <div class="show-card">
            <img src="./img/got.jpg" alt="Jongruyon" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <!-- Show 5 -->
          <div class="show-card">
            <img
              src="./img/interstellar.jpg"
              alt="The Star Library"
              class="show-image"
            />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <!-- Show 6 -->
          <div class="show-card">
            <img src="./img/opi.webp" alt="LIGHT SHOP" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <!-- Show 7 -->
          <div class="show-card">
            <img src="./img/mity.jpg" alt="THE FIRST" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <!-- Show 8 -->
          <div class="show-card">
            <img src="./img/f1.webp" alt="KILLERS" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <div class="show-card">
            <img src="./img/f1.webp" alt="KILLERS" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>

          <div class="show-card">
            <img src="./img/f1.webp" alt="KILLERS" class="show-image" />
            <div class="show-overlay">
              <button class="btn try-btn">COBA SEKARANG</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
      <div class="container">
        <div class="section-header">
        <h2 class="section-title">Apa Yang Anda Dapatkan</h2>
        <div class="features-container">
          <!-- Feature 1 -->
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-film"></i>
            </div>
            <h3 class="feature-title">Banyak Hiburan</h3>
            <p class="feature-desc">
              Dari film Hollywood hingga drama Korea, dapatkan akses ke koleksi
              yang terus bertambah.
            </p>
          </div>

          <!-- Feature 2 -->
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-tv"></i>
            </div>
            <h3 class="feature-title">Streaming Episode Pilihan</h3>
            <p class="feature-desc">
              Rasakan pengalaman Disney+ Hotstar dengan streaming episode
              pilihan tanpa langganan berbayar.
            </p>
          </div>

          <!-- Feature 3 -->
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-user-friends"></i>
            </div>
            <h3 class="feature-title">Hingga 7 Profil</h3>
            <p class="feature-desc">
              Nikmati pengalaman personal dengan hingga 7 profil dalam 1 akun,
              masing-masing bisa disesuaikan dengan karakter Disney favorit
              Anda.
            </p>
          </div>
        </div>
        </div>
      </div>
    </section>

    <!-- Plans Section -->
    <!-- <section class="plans-section">
      <div class="container">
        <div class="section-header">
        <h2 class="section-title">Pilih Paket Langganan Anda</h2>
        <div class="plans-container"> -->
          <!-- Plan 1 -->
          <!-- <div class="plan-card">
            <h3 class="plan-name">Mingguan</h3>
            <div class="plan-price">Rp 29.000</div>
            <ul class="plan-features">
              <li><i class="fas fa-check"></i> Akses ke semua konten</li>
              <li><i class="fas fa-check"></i> Streaming HD</li>
              <li><i class="fas fa-check"></i> 2 perangkat bersamaan</li>
            </ul>
            <button class="btn select-plan-btn">PILIH PAKET</button>
          </div> -->

          <!-- Plan 2 -->
          <!-- <div class="plan-card">
            <h3 class="plan-name">Bulanan</h3>
            <div class="plan-price">Rp 99.000</div>
            <ul class="plan-features">
              <li><i class="fas fa-check"></i> Akses ke semua konten</li>
              <li><i class="fas fa-check"></i> Streaming HD</li>
              <li><i class="fas fa-check"></i> 2 perangkat bersamaan</li>
              <li><i class="fas fa-check"></i> Diskon 15%</li>
            </ul>
            <button class="btn select-plan-btn">PILIH PAKET</button>
          </div> -->

          <!-- Plan 3 -->
          <!-- <div class="plan-card">
            <h3 class="plan-name">Tahunan</h3>
            <div class="plan-price">Rp 899.000</div>
            <ul class="plan-features">
              <li><i class="fas fa-check"></i> Akses ke semua konten</li>
              <li><i class="fas fa-check"></i> Streaming HD</li>
              <li><i class="fas fa-check"></i> 4 perangkat bersamaan</li>
              <li><i class="fas fa-check"></i> Diskon 25%</li>
              <li><i class="fas fa-check"></i> Prioritas dukungan</li>
            </ul>
            <button class="btn select-plan-btn">PILIH PAKET</button>
          </div>
        </div>
      </div>
      </div>
    </section> -->

    <!-- Compatible Devices Section -->
    <section class="devices-section">
      <div class="container">
        <div class="section-header">
        <h2 class="section-title">Perangkat yang Kompatibel</h2>
        <div class="devices-container">
          <!-- TV Devices -->
          <div class="device-category">
            <h3 class="category-title"><i class="fas fa-tv"></i> TV</h3>
            <ul class="device-list">
              <li><i class="fab fa-android"></i> Android TV</li>
              <li><i class="fab fa-apple"></i> AppleTV</li>
              <li><i class="fab fa-google"></i> Chromecast</li>
              <li><i class="fas fa-tv"></i> LG TV</li>
              <li><i class="fas fa-tv"></i> Samsung TV</li>
            </ul>
          </div>

          <!-- Computer Devices -->
          <div class="device-category">
            <h3 class="category-title">
              <i class="fas fa-desktop"></i> Komputer
            </h3>
            <ul class="device-list">
              <li><i class="fab fa-chrome"></i> Chrome OS</li>
              <li><i class="fab fa-apple"></i> MacOS</li>
              <li><i class="fab fa-windows"></i> Windows PC</li>
            </ul>
          </div>

          <!-- Mobile & Tablet Devices -->
          <div class="device-category">
            <h3 class="category-title">
              <i class="fas fa-mobile-alt"></i> Mobile & Tablet
            </h3>
            <ul class="device-list">
              <li><i class="fab fa-android"></i> Android Phones & Tablets</li>
              <li><i class="fab fa-apple"></i> iPhone and iPad</li>
            </ul>
          </div>
        </div>
      </div>
      </div>
    </section>

    
    <!-- Testimonials Section -->
    <section class="testimonials-section">
      <div class="container">
        <div class="section-header">
        <h2 class="section-title">Apa Kata Mereka?</h2>
        <div class="testimonials">
          <div class="testimonial" data-aos="fade-right">
            <p>“AMOV bener-bener top! Semua film favoritku ada di sini.”</p>
            <strong>- Sari, Jakarta</strong>
          </div>
          <div class="testimonial" data-aos="fade-left">
            <p>“Walaupun Gratis AmalAwalMovie, kualitas streamingnya juga mantap.”</p>
            <strong>- Reza, Bandung</strong>
          </div>
        </div>
      </div>
      </div>
    </section>

<!-- Footer -->

    <footer class="footer">
      <div class="container">
        <div class="footer-links">
          <a href="#">Ketentuan Penggunaan</a>
          <a href="#">Kebijakan Privasi</a>
          <a href="#">FAQ</a>
          <a href="#">Bantuan</a>
          <a href="#">Tentang Kami</a>
        </div>
        <p class="copyright">© 2024 Disney+ Hotstar. Semua hak dilindungi.</p>
      </div>
    </footer>

    <script>
      // Navbar scroll effect
      window.addEventListener("scroll", function () {
        const navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
        } else {
          navbar.classList.remove("scrolled");
        }
      });

      // Smooth scrolling for anchor links
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
          });
        });
      });
    </script>
  
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init();

      // Promo countdown timer
      const end = new Date(Date.now() + 3 * 24 * 60 * 60 * 1000);
      setInterval(() => {
        const now = new Date();
        const diff = end - now;
        if (diff <= 0) return;
        const d = Math.floor(diff / (1000 * 60 * 60 * 24));
        const h = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const m = Math.floor((diff / 1000 / 60) % 60);
        const s = Math.floor((diff / 1000) % 60);
        document.getElementById("countdown").textContent = `${d}d ${h}h ${m}m ${s}s`;
      }, 1000);

      // Modal login
      const modal = document.getElementById("loginModal");
      const btn = document.querySelector(".login-btn");
      const span = document.querySelector(".close-btn");
      btn.onclick = () => modal.style.display = "flex";
      span.onclick = () => modal.style.display = "none";
      window.onclick = e => { if (e.target == modal) modal.style.display = "none"; };
    </script>

    <div id="loginModal" class="modal">
      <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h3>Masuk ke AMOV</h3>
        <input type="text" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <button class="btn">Masuk</button>
      </div>
    </div>
</body>


</html>
