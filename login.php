<?php
    require 'connect.php';
     if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek user
    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Jika kamu menggunakan password_hash(), gunakan password_verify()
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Amov - Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <section>
        <div class="login-box">
            <?php if (isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>

            <form action="index.html" method="get">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" required name="username">
                    <label>Email</label>
                </div>
    
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
    
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">Ingat Saya
                    </label>
                    <a href="#">Lupa Password?</a>
                </div>
    
                <button type="submit">Login</button>
    
                <div class="register-link">
                    <p>Tak Punya Akun?
                        <a href="#">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>