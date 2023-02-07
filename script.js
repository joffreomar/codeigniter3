var base_url="/epapap/";
console.log('Solicitud Service WORKER');
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register(base_url+'sw.js')
    .then(reg => console.log('Registro de SW exitoso', reg))
    .catch(err => console.warn('Error al tratar de registrar el sw', err))
}
