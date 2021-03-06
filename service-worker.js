const cacheName = 'static-shell-v1';
const resourcesToPrecache = [
'vistas/modulos/cambiar.php',
'vistas/modulos/escaner.php',
'vistas/modulos/home.php',
'vistas/modulos/inbox.php',
'vistas/modulos/login.php',
'vistas/modulos/logScreen.php',
'vistas/modulos/promos.php',
'vistas/modulos/qr.php',
'vistas/modulos/recuperar.php',
'vistas/modulos/register.php',
'vistas/modulos/reservar.php',
'vistas/modulos/swipe.php',
];
self.addEventListener('install', function(event) {
    //Precache files
    event.waitUntil(
        caches.open(cacheName)
        .then(function(cache) {
            return cache.addAll(resourcesToPrecache);
        })
    );
});


self.addEventListener('fetch', function(event) {
  event.respondWith(
    fetch(event.request).catch(function() {
      return caches.match(event.request);
    })
  );
});




/*
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});
*/