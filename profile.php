<?php
include 'connect.php';
include 'controller.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: loginH.php");
    exit();
}

$user = getUserById($_SESSION['user_id']);
$favorit = getFavoritByUser($_SESSION['user_id']);
$review = getReviewByUser($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Profil - <?= htmlspecialchars($user['nama']) ?></title>

    <link rel="stylesheet" href="css/profile.css?v=3" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&family=Boldonse&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ancizar+Sans:ital,wght@0,100..1000;1,100..1000&family=Bebas+Neue&display=swap" rel="stylesheet">
  </head>
  <body>
    <section>
      <header>
        <h1 class="judul">Amov</h1>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">Tentang kami</a></li>
             <li style="float:right">

<?php if (isset($_SESSION['email'])): ?>
  <a href="profil.php">
    
  </a>
  <a href="logout.php" style="margin-left: -26px;">Logout</a>
<?php else: ?>
  <a href="login.php">Login</a> / <a href="register.php">Sign Up</a>
<?php endif; ?>




          </ul>
        </nav>
      </header>


      <div class="profile-container">
        <img src=img/<?= htmlspecialchars($user['foto_profil']) ?> alt="Foto Profil" class="profile-picture" />
        <h3><?= htmlspecialchars($user['nama']) ?></h3>
        <p><?= htmlspecialchars($user['bio']) ?> </p>
        <br>

      </div>
    </section>

    <div class="watchlist"> 
      <h2>Favorit</h2>
        <div class="watchlist-scroll">
          <?php




$user_id = $_SESSION['user_id'];
$query = "SELECT film.judul, film.gambar_detail, film.id
          FROM favorit 
          JOIN film ON favorit.film_id = film.id 
          WHERE favorit.user_id = ?";

$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    die("Query gagal: " . $conn->error); 
}
?>

         
        
<?php while ($row = $result->fetch_assoc()) : ?>

    <a href="detail.php?id=<?= urlencode($row['id']) ?>" > <img src="img/<?= htmlspecialchars($row['gambar_detail']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" > </a> 


<?php endwhile; ?>
</div>
    </div> 
    <div class="recent-reviews">
      <h2>Review Terbaru</h2>
    </div>



  </body>
</html>
