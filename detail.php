<?php
include 'connect.php'; // file koneksi database
session_start();
if (!isset($_SESSION['user_id'])) {
    die("User belum login");
}
$user_id = $_SESSION['user_id'];


$filmId = $_GET['id'] ?? null;
if (!$filmId) {
    echo "Film tidak ditemukan!";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM film WHERE id = ?");
$stmt->bind_param("i", $filmId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Film tidak ditemukan!";
    exit;
}

$film = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail -ilm</title>
    <link rel="stylesheet" href="css/detail.css?v=2">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> 
</head>
<body>
     <header>
      <a href="index.php"><i class="bi bi-arrow-left-circle" style="font-size: 1.5rem;"></i> </a>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">Tentang kami</a></li>
          <a href="profile.php">
          <img src="img/<?php echo $_SESSION['foto_profil']; ?>" alt="Profil" style="width:30px; height:30px; border-radius:50%;">
          
        </a>
        </ul>
      </nav>
    </header>


      <div class="film-background">
          <img src="img/movie-list.jpg" alt="">
    </div>

    

     <div class="film-lihat">

        <img src="img/<?php echo htmlspecialchars($film['gambar_detail']); ?>" alt="<?php echo htmlspecialchars($film['judul']); ?>">
    </div>

    <div class="film-card">
        <img src="img/<?php echo htmlspecialchars($film['gambar']); ?>" alt="<?php echo htmlspecialchars($film['judul']); ?>">
        <h1><?php echo htmlspecialchars($film['judul']); ?></h1>
        <p>⭐ <?php echo htmlspecialchars($film['rating']); ?>/10</p> 
        <p> <br><br><?php echo htmlspecialchars($film['deskripsi']); ?></p>
        <div class="icon-bar">
         
  <a href="#" class="icon"><!-- Tambahkan data-link berisi link trailer --> 
    <?php $link_trailer = $film['trailer_link']; ?>
<i id="btnTrailer" 
   class="bi bi-camera-reels" 
   style="font-size: 2rem; cursor: pointer;" 
   data-link="<?php echo htmlspecialchars($link_trailer); ?>">
</i>
</a>

<!-- Modal -->
<div id="modalTrailer" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <iframe id="youtubeVideo" width="860" height="415" 
      src="" 
      title="YouTube video player" frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen></iframe>
  </div>
</div>















<?php
include 'connect.php';
$user_id = $_SESSION['user_id']; // pastikan user login
$film_id = $_GET['id']; // id film dari URL

$stmt = $conn->prepare("SELECT * FROM favorit WHERE user_id = ? AND film_id = ?");
$stmt->bind_param("ii", $user_id, $film_id);
$stmt->execute();
$result = $stmt->get_result();
$is_favorit = $result->num_rows > 0;
?>





<!-- HTML bagian tombol love -->
<form id="favoritForm" method="post" action="toggle_favorit.php">
    <input type="hidden" name="film_id" value="<?= $film_id ?>">
    <button type="submit" style="background: none; border:none;" id="loveBtn" class="love-btn <?= $is_favorit ? 'favorited' : '' ?>">
     <a href="#" class="icon"><i class="bi bi-heart<?= $is_favorit ? '-fill text-danger' : '' ?>"></i></a>
    </button>
</form> 



<a href="ulasan.php?id=<?= $film['id'] ?>&title=<?= urlencode($film['judul']) ?>&poster=<?= urlencode($film['gambar']) ?>" class="icon"><i class="bi bi-chat-left-dots"></i></a>



  <a href="like.html" class="icon"><i class="bi bi-hand-thumbs-up"></i></a>
  <a href="dislike.html" class="icon"><i class="bi bi-hand-thumbs-down"></i></a>

</div>

    </div>



    

    <footer id="footer">
      Copyright &copy; dibuat dengan penuh cinta oleh : <br> kiki : 123456 <br> awal : 123455 <br> rido : 123456
    </footer>


    <script src="js/trailer.js"></script>
       <script src="js/tambah_favorit.js"></script>
       <script src="js/toggle_favorit.js"></script>

</body>
</html>