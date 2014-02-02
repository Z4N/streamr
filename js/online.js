// On vérifie via un ping si on est bien en ligne
$.ajax({
    cache: false,
    async: false,
    dataType: "json",
    error: function () {
        console.log('Erreur de connection.');
        localStorage.status = 'offline';
    },
    success: function () {
        console.log('Application connectée.');
        document.write('<script type="text/javascript" src="//www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0"></script>');
        localStorage.status = 'online';
    },
    timeout: 1000,
    type: "GET",
    url: "js/ping.js"
});