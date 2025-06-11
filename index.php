<?php
include 'connect.php';
include 'controller.php';

session_start();
?>





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AMov - Movie Reviewer</title>
    <link rel="stylesheet" href="css/style.css?v=2" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&family=Boldonse&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ancizar+Sans:ital,wght@0,100..1000;1,100..1000&family=Bebas+Neue&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1 class="judul">Amov</h1>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="about.php">Tentang kami</a></li>
           <li style="float:right">
      <?php if (isset($_SESSION['email'])): ?>
        <a href="profile.php">
          <img src="img/<?php echo $_SESSION['foto_profil']; ?>" alt="Profil" style="width:30px; height:30px; border-radius:50%;">
          
        </a>
      <?php else: ?>
        <a href="loginH.php">Login</a> / <a href="register.php">Sign Up</a>
      <?php endif; ?>
    </li>
        </ul>
      </nav>
    </header>
   
    <div class="container">
      <h2 class="selamat-datang">Selamat datang</h2>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, pariatur
        dolor!
      </p>

      <div class="search">
        <form action="" method="get">
          <input
            type="search"
            class="search-box"
            placeholder=" &nbsp; Search Film yang kamu suka"
          />
          <button>cari</button>
        </form>
      </div>

      <div class="slide">
        <img src="img/sev.jpg" alt="Banner_Utama.jpg" />
        <img src="img/w2.webp" alt="Banner_Utama.jpg" />
        <img src="img/got.jpg" alt="Banner_Utama.jpg" />
      </div>
      <div class="shadow"></div>
    </div>
   


<h2 class='genre'>Trending</h2>
<?php tampilkanFilmBerdasarkanGenre($conn, 'Trending', true); ?>

<h2 class='genre'>Action</h2>
<?php echo "<div class='card-container'>"; ?>
<?php tampilkanFilmBerdasarkanGenre($conn, 'Action', false); ?>
<?php echo "</div>" ?>

<h2 class='genre'>Drama</h2>
<?php tampilkanFilmBerdasarkanGenre($conn, 'Drama', false); ?>

<h2 class='genre'>scf-fi</h2>
<?php tampilkanFilmBerdasarkanGenre($conn, 'science fiction', false); ?>


























   

    

    <footer id="footer">
      Copyright &copy; dibuat dengan penuh cinta oleh : <br> kiki : 123456 <br> awal : 123455 <br> rido : 123456
    </footer>
  


  </body>
</html>
