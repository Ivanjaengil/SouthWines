// public/js/scripts.js

// Función para mostrar/ocultar el menú en dispositivos móviles
function toggleMenu() {
    const nav = document.querySelector('nav');
    nav.classList.toggle('active');
}

document.querySelector('.ver-mas-btn').addEventListener('click', function() {
    const content = document.querySelector('.philosophy-content');
    content.classList.toggle('open');
});