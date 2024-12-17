const carouselContainer = document.querySelector('.carousel-container');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentIndex = 0; // Indeks slide saat ini
const totalSlides = document.querySelectorAll('.carousel-item').length; // Total jumlah foto

// Fungsi untuk memperbarui posisi carousel
function updateCarousel() {
  carouselContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Geser ke kiri (slide sebelumnya)
prevBtn.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Looping ke slide terakhir jika di awal
  updateCarousel();
});

// Geser ke kanan (slide selanjutnya)
nextBtn.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % totalSlides; // Looping ke slide pertama jika di akhir
  updateCarousel();
});
