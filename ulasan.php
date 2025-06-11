

<?php
session_start();
$film_id = $_GET['id'];
include 'connect.php';




// Ambil info film
$film_query = mysqli_query($conn, "SELECT * FROM film WHERE id = $film_id");
$film = mysqli_fetch_assoc($film_query);

// Ambil ulasan
$query = "SELECT review.*, user.nama 
          FROM review 
          JOIN user ON review.user_id = user.id 
          WHERE film_id = $film_id 
          ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ulasan Film - <?= htmlspecialchars($film['judul']) ?></title>
    <style>
        body {
            background-color:rgb(36, 34, 34);
            color: white;
            font-family: sans-serif;
        }

        .container {
            max-width: 1000px;
            /* margin: auto; */
            padding: 30px;
            display: flex;
        }

        .form-ulasan {
            background-color:rgba(54, 54, 57, 0.51);
            padding:0 20px;
            border-radius: 10px;
            margin-bottom: 30px;
           
        }

        textarea, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .btn {
            background-color:rgb(16, 12, 114);
            color: white;
            padding: 10px 20px;
            border: none;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .ulasan-item {
            background-color: #444;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 10px;
        }

        .rating {
            color: gold;
        }

        .film-info {
          
            margin-bottom: 30px;
        }

        .film-info img {
            max-width: 200px;
            margin-right: 30px;   
            border-radius: 10px;
            margin-top: 10px;
        }

        h3 {
            text-align: center;
        }
    </style>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> 
</head>
<body>

<a href="index.php"><i class="bi bi-arrow-left-circle" style="font-size: 1.5rem; margin-left: 30px; color: white;"></i> </a>


<div class="container">
    <div class="film-info">
     
        <img src="img/<?= htmlspecialchars($film['gambar']) ?>" alt="<?= htmlspecialchars($film['judul']) ?>">
    </div>



    <form action="simpan_ulasan.php" method="POST" class="form-ulasan">
    <input type="hidden" name="film_id" value="<?= $film_id ?>">
    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>"> 
    

        <input type="hidden" name="film_id" value="<?= $film_id ?>">
           <h2><?= htmlspecialchars($film['judul']) ?></h2>
        <label>Rating:</label>
        <select name="rating" required>
            <option value="">Pilih rating</option>
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>"><?= str_repeat("⭐", $i) ?></option>
            <?php endfor; ?>
        </select>

        <label>Ulasan:</label>
        <textarea name="ulasan" rows="4" placeholder="Tulis ulasan..." required></textarea>

        <button class="btn" type="submit">Kirim Ulasan</button>
    </form>
    </div>

    <h3>Ulasan Pengguna</h3>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="ulasan-item">
            <strong><?= htmlspecialchars($row['nama']) ?></strong><br>
            <span class="rating"><?= str_repeat("⭐", $row['rating']) ?></span><br>
            <p><?= nl2br(htmlspecialchars($row['ulasan'])) ?></p>
            <small>Ditulis pada <?= $row['created_at'] ?></small>
        </div>
    <?php endwhile; ?>

</body>
</html>
