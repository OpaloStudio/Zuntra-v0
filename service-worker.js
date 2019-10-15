const cacheName = 'static-shell-v1';
const resourcesToPrecache = [
'vistas/modulos/cambiar.php',
'vistas/modulos/chat.php',
'vistas/modulos/escaner.php',
'vistas/modulos/home.php',
'vistas/modulos/inbox.php',
'vistas/modulos/login.php',
'vistas/modulos/logScreen.php',
'vistas/modulos/perfil.php',
'vistas/modulos/promos.php',
'vistas/modulos/qr.php',
'vistas/modulos/recuperar.php',
'vistas/modulos/register.php',
'vistas/modulos/reservar.php',
'vistas/modulos/swipe.php',
'controladores/controlador.cambiar.php',
'controladores/controlador.escaner.php',
'controladores/controlador.home.php',
'controladores/controlador.inbox.php',
'controladores/controlador.login.php',
'controladores/controlador.logScreen.php',
'controladores/controlador.perfil.php',
'controladores/controlador.promos.php',
'controladores/controlador.qr.php',
'controladores/controlador.recuperar.php',
'controladores/controlador.register.php',
'controladores/controlador.reservar.php',
'controladores/controlador.swipe.php',
'modelos/modelo.bloqueo.php',
'modelos/modelo.cerrarSesion.php',
'modelos/modelo.conexion.php',
'modelos/modelo.escaner.php',
'modelos/modelo.evaluaciones.php',
'modelos/modelo.index.php',
'modelos/modelo.infoUsuario.php',
'modelos/modelo.login.php',
'modelos/modelo.perfil.php',
'modelos/modelo.qr.php',
'modelos/modelo.recuperar.php',
'modelos/modelo.registro.php', 
'modelos/modelo.reservar.php',
'modelos/modelo.swipe.php',
'modelos/modelo.ultimoMsj.php',
'modelos/modelo.verificarFoto.php',
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

/*
self.addEventListener('fetch', function(event) {
  event.respondWith(
    fetch(event.request).catch(function() {
      return caches.match(event.request);
    })
  );
});

*/



self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});