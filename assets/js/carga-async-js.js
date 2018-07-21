/**
 * Sin uso, provoca ciertos problemas
 * @returns {undefined}
 */

window.onload = function () {
    var scripts = [
        'assets/js/bootstrap.js',
        'assets/js/regionJS.js',
        'assets/js/indexJS.js',
        'assets/js/registrarJS.js',
        'assets/js/comunasJS.js',
        'assets/js/publicarJS.js',
        'assets/js/ver.js'
    ];
    scripts.forEach((item) => {
        cargarScript(src(item));
    });
};
function src(url) {
    return 'http://localhost/quieromimascota/' + url + '?' + new Date() / 1000;
}
function cargarScript(src) {
    return new Promise((resolve, reject) => {
        var script;
        script = document.createElement('script');
        script.src = src;
        script.async = true;
        script.onload = resolve;
        script.onerror = reject;
        document.head.appendChild(script);
    });
}

