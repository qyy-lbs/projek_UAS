<?php 
function tampilkanFilmBerdasarkanGenre($conn, $genre, $hoverKhusus = false) {
    $folder_gambar = "img/";

    $query = "SELECT * FROM film WHERE genre = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $genre);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($film = $result->fetch_assoc()) {
        $gambar_default = $folder_gambar . $film['gambar'];
        $gambar_hover = $hoverKhusus && !empty($film['gambar_hover']) ? $folder_gambar . $film['gambar_hover'] : $gambar_default;

        if ($hoverKhusus) {
            // Hover untuk genre trending: gambar berubah
            echo "<div class='film-card'>";
            echo "  <div class='poster'>";
            echo "    <img class='default-img' src='" . htmlspecialchars($gambar_default) . "' alt='" . htmlspecialchars($film['judul']) . "'>";
            echo "    <img class='hover-img' src='" . htmlspecialchars($gambar_hover) . "' alt='" . htmlspecialchars($film['judul']) . "'>";
            echo "  </div>";
            // overlay info di hover di genre trending biasanya tidak muncul (sesuai css kamu)
            echo "  <div class='hover-info'>";
            echo "    <h3>" . htmlspecialchars($film['judul']) . "</h3>";
            echo "    <p>" . htmlspecialchars($film['deskripsi']) . "</p>";
            echo "    <a href='" . htmlspecialchars($film['trailer_link']) . "' target='_blank'>Tonton Trailer</a>";
            echo "  </div>";
            echo "</div>";
        } else {
            // Hover untuk genre lain: gambar tidak berubah, tapi muncul overlay
          
            echo "<div class='card'>";
            echo "  <img src='" . htmlspecialchars($gambar_default) . "' alt='" . htmlspecialchars($film['judul']) . "'>";
            echo "  <div class='card-overlay'>";
            echo "    <h3>" . htmlspecialchars($film['judul']) . "</h3>";
            echo "    <a href='detail.php?id=" . urlencode($film['id']) . "'  class='btn'>Ulas</a>";
            echo "  </div>";
            echo "</div>";
          
        }
    }

    $stmt->close();
}
?>






<!-- LOGIN PROFIL -->
 <?php function getUserById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getFavoritByUser($userId) {
    global $conn;
    $stmt = $conn->prepare("SELECT f.judul FROM favorit fv 
        JOIN film f ON fv.film_id = f.id 
        WHERE fv.user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

       $favorits = [];
    while ($row = $result->fetch_assoc()) {
        $favorits[] = $row;
    }

    return $favorits;

 
}

function getReviewByUser($userId) {
    global $conn;
    $stmt = $conn->prepare("SELECT r.isi, r.created_at, f.judul FROM review r 
        JOIN film f ON r.film_id = f.id 
        WHERE r.user_id = ? ORDER BY r.created_at DESC");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }

    return $reviews;
}




