const cacheName = 'nama-cache-pwa-v1';
const filesToCache = [
    '/',
    '/manifest.json',
    '/xiao.gif',
    // Daftar semua file yang ingin Anda cache
    // Misalnya, '/css/app.css', '/js/app.js', dsb.
];

self.addEventListener('install', event => {
    console.log('Service Worker: Menginstall...');
    event.waitUntil(
        caches.open(cacheName)
            .then(cache => {
                console.log('Service Worker: Menambahkan file ke cache');
                return cache.addAll(filesToCache);
            })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
    );
});
