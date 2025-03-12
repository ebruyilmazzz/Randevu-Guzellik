document.getElementById("appointment-form").addEventListener("submit", function(event) {
    event.preventDefault();

    // Form verilerini al
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const date = document.getElementById("date").value;
    const time = document.getElementById("time").value;
    const service = document.getElementById("service").value;

    // Basit form doğrulaması (detaylı validasyon ekleyebilirsin)
    if (name && email && phone && date && time && service) {
        alert(`Teşekkürler, ${name}. Randevunuz ${date} tarihinde, saat ${time} için alındı.`);
    } else {
        alert("Lütfen tüm alanları doldurun.");
    }
});
