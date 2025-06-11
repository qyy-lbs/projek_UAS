<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require 'connect.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil data dari database
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['foto_profil'] = $user['foto_profil'];
        $_SESSION['user_id'] = $user['id']; // pastikan ini terbaca


        
        // Cek semua isi session
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        
        // redirect
        header("Location: index.php");
        exit;
    } else {
        echo "Login gagal: email atau password salah.";
    }
}



?>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>    


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMOV - Login & Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            background: radial-gradient(ellipse at top, var(--navy-blue), var(--darker-blue));
            color: white;
            min-height: 100vh;
            line-height: 1.6;
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
            background: linear-gradient(to bottom, rgba(4, 7, 32, 0.9), transparent);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        /* ===== AUTH CONTAINER ===== */
        .auth-container {
            display: flex;
            min-height: 100vh;
            padding-top: 80px;
        }

        .auth-hero {
            flex: 1;
            background: url('https://img1.hotstarext.com/image/upload/f_auto,t_web_m_1x/sources/r1/cms/prod/4937/1424937-h-0d8b1c4f5f6a') center/cover no-repeat;
            opacity: 0.3;
            display: none;
        }

        .auth-form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .auth-form-wrapper {
            width: 100%;
            max-width: 450px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: white;
        }

        .form-subtitle {
            color: var(--text-lighter);
            font-size: 1rem;
        }

        .auth-form {
            background-color: rgba(15, 21, 53, 0.7);
            border-radius: 10px;
            padding: 40px 30px;
            border: 1px solid rgba(31, 128, 224, 0.2);
            backdrop-filter: blur(5px);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: var(--text-light);
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            background-color: rgba(31, 128, 224, 0.1);
        }

        .form-actions {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 14px;
            background-color: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn:hover {
            background-color: #1a6fc7;
            transform: translateY(-2px);
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            color: var(--text-lighter);
            font-size: 0.95rem;
        }

        .form-link {
            color: var(--primary-blue);
            text-decoration: none;
            transition: color 0.3s;
        }

        .form-link:hover {
            color: #1a6fc7;
            text-decoration: underline;
        }

        .form-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--text-lighter);
        }

        .form-divider::before,
        .form-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .form-divider-text {
            padding: 0 15px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .social-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .social-btn:hover {
            background-color: var(--primary-blue);
            transform: translateY(-3px);
        }

        /* Form Toggle */
        .form-toggle {
            display: none;
        }

        #login-form:checked ~ .auth-forms .login-form,
        #register-form:checked ~ .auth-forms .register-form {
            display: block;
        }

        #login-form:checked ~ .auth-tabs .login-tab,
        #register-form:checked ~ .auth-tabs .register-tab {
            background-color: var(--primary-blue);
        }

        .auth-tabs {
            display: flex;
            margin-bottom: 30px;
            border-radius: 5px;
            overflow: hidden;
        }

        .auth-tab {
            flex: 1;
            text-align: center;
            padding: 15px;
            background-color: rgba(15, 21, 53, 0.5);
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .auth-tab:hover {
            background-color: rgba(31, 128, 224, 0.3);
        }

        /* ===== RESPONSIVE ===== */
        @media (min-width: 768px) {
            .auth-hero {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 15px 20px;
            }
            
            .auth-form {
                padding: 30px 20px;
            }
            
            .form-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
    <body>
        <!-- Navbar -->
        <nav class="navbar">
            <a href="#" class="logo">AMOV</a>
        </nav>

        <!-- Auth Container -->
        <div class="auth-container">
            <!-- Hero Section (Visible on desktop) -->
            <div class="auth-hero"></div>

            <!-- Form Section -->
            <div class="auth-form-container">
                <div class="auth-form-wrapper">
                    <input type="radio" id="login-form" name="auth-form" class="form-toggle" checked>
                    <input type="radio" id="register-form" name="auth-form" class="form-toggle">

                    <div class="auth-tabs">
                        <label for="login-form" class="auth-tab login-tab">MASUK</label>
                        <label for="register-form" class="auth-tab register-tab">DAFTAR</label>
                    </div>

                    <div class="auth-forms">
                        <!-- Login Form -->
                        <form class="auth-form login-form" method="post">
                            <div class="form-header">
                                <h2 class="form-title">Masuk ke Akun Anda</h2>
                                <p class="form-subtitle">Selamat datang kembali di AMOV</p>
                            </div>

                            <div class="form-group">
                                <label for="login-email" class="form-label">Email</label>
                                <input type="email" name="email" id="login-email" class="form-input" placeholder="Masukkan email Anda" required>
                            </div>

                            <div class="form-group">
                                <label for="login-password" class="form-label">Password</label>
                                <input type="password" name="password" id="login-password" class="form-input" placeholder="Masukkan password Anda" required>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn" name="login">MASUK</button>
                            </div>

                            <div class="form-footer">
                                <p>Lupa password? <a href="#" class="form-link">Reset di sini</a></p>
                            </div>
                        </form>

                        <!-- Register Form -->
                        <form class="auth-form register-form" style="display: none;">
                            <div class="form-header">
                                <h2 class="form-title">Buat Akun Baru</h2>
                                <p class="form-subtitle">Bergabunglah dengan AMOV sekarang</p>
                            </div>

                            <div class="form-group">
                                <label for="register-name" class="form-label">Nama Lengkap</label>
                                <input type="text" id="register-name" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
                            </div>

                            <div class="form-group">
                                <label for="register-email" class="form-label">Email</label>
                                <input type="email" id="register-email" class="form-input" placeholder="Masukkan email Anda" required>
                            </div>

                            <div class="form-group">
                                <label for="register-password" class="form-label">Password</label>
                                <input type="password" id="register-password" class="form-input" placeholder="Buat password Anda" required>
                            </div>

                            <div class="form-group">
                                <label for="register-confirm-password" class="form-label">Konfirmasi Password</label>
                                <input type="password" id="register-confirm-password" class="form-input" placeholder="Konfirmasi password Anda" required>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="register" class="btn">DAFTAR</button>
                            </div>

                            <div class="form-divider">
                                <span class="form-divider-text">Atau daftar dengan</span>
                            </div>

                            <div class="social-login">
                                <a href="#" class="social-btn"><i class="fab fa-google"></i></a>
                                <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-btn"><i class="fab fa-apple"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Form toggle functionality
            const loginTab = document.querySelector('.login-tab');
            const registerTab = document.querySelector('.register-tab');
            const loginForm = document.querySelector('.login-form');
            const registerForm = document.querySelector('.register-form');

            loginTab.addEventListener('click', () => {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            });

            registerTab.addEventListener('click', () => {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            });

            // Form validation would go here in a real implementation
        </script>
    </body>
    </html>