//
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Setup CSRF token untuk semua fetch request
document.addEventListener('DOMContentLoaded', () => {
    const token = document.querySelector('meta[name="csrf-token"]')?.content;
    
    if (token) {
        const originalFetch = window.fetch;
        window.fetch = function(url, options = {}) {
            options.headers = options.headers || {};
            if (options.method && options.method.toUpperCase() !== 'GET') {
                options.headers['X-CSRF-TOKEN'] = token;
            }
            return originalFetch(url, options);
        };
    }

    // Animasi Reveal saat scroll menggunakan IntersectionObserver
    const reveals = document.querySelectorAll('.reveal');
    
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        reveals.forEach(el => observer.observe(el));
    } else {
        // Fallback untuk browser lama
        reveals.forEach(el => el.classList.add('active'));
    }
});

Alpine.start();