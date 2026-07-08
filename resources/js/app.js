import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Toggle menu mobile
const menuToggle = document.querySelector('[data-menu-toggle]');
const menu = document.querySelector('[data-menu]');

menuToggle?.addEventListener('click', () => menu?.classList.toggle('hidden'));

// Tutup menu setelah klik link (mobile)
menu?.querySelectorAll('a').forEach((link) =>
    link.addEventListener('click', () => menu.classList.add('hidden')),
);
