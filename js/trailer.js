document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("modalTrailer");
  const btn = document.getElementById("btnTrailer");
  const span = document.getElementsByClassName("close")[0];
  const iframe = document.getElementById("youtubeVideo");

  if (!btn || !modal || !iframe || !span) return; // Cegah error jika elemen tidak ditemukan

  btn.onclick = function () {
    const youtubeLink = btn.getAttribute("data-link"); // ambil dari data-link
    iframe.src = youtubeLink + "?autoplay=1";
    modal.style.display = "block";
  };

  span.onclick = function () {
    modal.style.display = "none";
    iframe.src = "";
  };

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
      iframe.src = "";
    }
  };
});
