// You can add some interaction here
console.log("Urban Hair Saloon website is ready!");
let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(index) {
    if (index >= totalSlides) {
        slideIndex = 0; // Eğer son slayta ulaştıysa başa dön
    } else if (index < 0) {
        slideIndex = totalSlides - 1; // Eğer geri gittiğinde baştaysa sona dön
    }
    const newTranslateX = -slideIndex * 100;
    document.querySelector('.slider').style.transform = `translateX(${newTranslateX}%)`;
}

function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

// Otomatik slayt gösterisi için (opsiyonel)
setInterval(() => {
    nextSlide();
}, 5000); // 5 saniyede bir slayt değiştir

