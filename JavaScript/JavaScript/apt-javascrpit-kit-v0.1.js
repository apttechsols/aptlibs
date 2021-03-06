// Link dynamic stylesheets in dom
function apt_javascript_kit_v0_1_link_stylesheets(data = []){
    data.forEach(function (item) {
        var styles = document.createElement('link');
        styles.rel = 'stylesheet';
        styles.type = 'text/css';
        styles.href = window.location.protocol+'//'+window.location.host+'/'+item;
        document.getElementsByTagName('head')[0].appendChild(styles);
    });
}

// Link dynamic script files in dom
function apt_javascript_kit_v0_1_link_scrpits(data = []){
    console.log('apt link scrpits init');
    data.forEach(function (item) {
        var scrpit = document.createElement('script');
        scrpit.src = window.location.protocol+'//'+window.location.host+'/'+item;
        document.getElementsByTagName('head')[0].appendChild(scrpit);
        console.log('apt link scrpits complete');
    });
}