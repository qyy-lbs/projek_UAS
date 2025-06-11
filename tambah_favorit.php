<?php
session_start();
include 'connect.php';

if (isset($_SESSION['user_id']) && isset($_POST['film_id'])) {
    $film_id = (int) $_POST['film_id'];
    $user_id = (int) $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO favorit (user_id, film_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $film_id);
    $stmt->execute();

    header("Location: detail.php?id=" . $film_id);
    exit();
} else {
    echo "❌ Anda belum login atau film_id tidak dikirim.";
}
