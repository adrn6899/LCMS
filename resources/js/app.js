import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// require('./bootstrap');

(function() {
    const toggle = document.getElementById('dark-mode-toggle');
    const html = document.getElementsByTagName('html')[0];
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        html.classList.add(currentTheme);
    }

    toggle.addEventListener('click', () => {
        const theme = html.classList.contains('dark') ? 'light' : 'dark';
        html.classList.remove(theme === 'dark' ? 'light' : 'dark');
        html.classList.add(theme);
        localStorage.setItem('theme', theme);
    });
})();