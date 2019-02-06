import L from 'leaflet/dist/leaflet.js';
import 'leaflet.fullscreen/Control.FullScreen';

export default {
  init() {
    // JavaScript to be fired on the single post
    /* eslint-disable */
    var logoMarker = mrg.marker;
    /* eslint-enable */

    let map = $('#map');
    let latitud = map.attr('lat');
    let longitud = map.attr('lng');
    let nombre = map.attr('nombre');

    var mapa = L.map('map', {
        center: [latitud, longitud],
        zoom: 17,
        fullscreenControl: true,
    });

    L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
      attribution: 'Map tiles <a href="http://stamen.com">Stamen</a>',
      subdomains: 'abcd',
      minZoom: 1,
      maxZoom: 16,
      ext: 'png',
    }).addTo(mapa);

    var myIcon = L.icon({
      iconUrl: logoMarker,
      iconSize: [29, 29],
      iconAnchor: [15, 15],
      popupAnchor: [0, -10],
    });

    let miPopup = L.marker([latitud, longitud], {icon: myIcon}).addTo(mapa);

    miPopup.bindPopup(nombre);



  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
