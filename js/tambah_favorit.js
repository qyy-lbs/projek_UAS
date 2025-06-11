document.addEventListener('DOMContentLoaded', () => {
  const loveIcon = document.getElementById('loveIcon');
  loveIcon.addEventListener('click', () => {
    const filmId = loveIcon.getAttribute('data-filmid');
    const isFavorited = loveIcon.classList.contains('favorited');
    const action = isFavorited ? 'hapus' : 'tambah';

    fetch('toggle_favorit.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `film_id=${filmId}&action=${action}`
    })
    .then(response => response.text())
    .then(data => {
      if (data === 'success') {
        loveIcon.classList.toggle('favorited');
      } else {
        alert('Gagal update favorit');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });
});
