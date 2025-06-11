<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMov - Ulasan</title>
    <script>
        function tampilkanDetailFilm() {
            const params = new URLSearchParams(window.location.search);
            const title = params.get("title") || "Judul Tidak Diketahui";
            const poster = params.get("poster");

            document.getElementById("judul-film").innerText = title;

            if (poster) {
                const img = document.createElement("img");
                img.src = poster;
                img.alt = "Poster " + title;
                img.width = 200;
                document.getElementById("poster-film").appendChild(img);
                
                document.body.style.backgroundImage = `url(${poster})`;
                document.body.style.backgroundSize = "cover";
                document.body.style.backgroundPosition = "center";
                document.body.style.backgroundRepeat = "no-repeat";
            }
        }
    </script>
    <link rel="stylesheet" href="css/ulasan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&family=Boldonse&display=swap" rel="stylesheet">
</head>
<body onload="tampilkanDetailFilm()">
    <header>
        <h1 class="judul">Amov</h1>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">Review</a></li>
                <li><a href="index.php">Contact</a></li>
            </ul>
            <input class="pencarian" type="text" placeholder="Search......">
        </nav>
    </header>

    <div class="container">
        <div id="poster-film"></div>

        <div class="rev-container">
            <h3 id="judul-film"></h3>
            
            <form action="index.php" method="get">
                <div class="rating">
                    <label>Rating:</label>
                    <select name="rating" id="rating" required>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                </div>

                
                <label id="a">Aspek Disukai:</label>
                <div class="aspek">    
                    <input type="checkbox" name="aspek" value="Alur"> Alur Cerita 
                    <input type="checkbox" name="aspek" value="Akting"> Akting
                    <input type="checkbox" name="aspek" value="Sinematografi"> Sinematografi 
                    <input type="checkbox" name="aspek" value="Soundtrack"> Soundtrack 
                </div>
            

                <div class="ulasan">
                    <label>Ulasan:</label> <br>
                    <textarea rows="4" cols="50" placeholder="Tulis ulasanmu di sini..." required></textarea>
                </div>
                
                <div class="button-wrap">
                    <button type="submit" value="kirim">Kirim</button>
                </div>
            </form>
        </div>
    </div>
        
</body>
</html>