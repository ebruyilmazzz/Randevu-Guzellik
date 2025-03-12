// Ekip kartlarına ek animasyon veya işlevsellik eklenebilir
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', () => {
        console.log(card.querySelector('h4').textContent + ' seçildi.');
    });
});
