import L from 'leaflet/dist/leaflet.js';
import 'leaflet.fullscreen/Control.FullScreen';

export default {
  init() {
    // JavaScript to be fired on the single post
    /* eslint-disable */
    var logoMarker = mrg.marker;
    /* eslint-enable */

    let mapa = $('.map');

    mapa.each(function(){
      let latitud = $(this).attr('lat');
      let longitud = $(this).attr('lng');
      let nombre = $(this).attr('nombre');
      let link = $(this).attr('link');

      var mapa = L.map(this, {
          center: [latitud, longitud],
          zoom: 13,
          zoomControl: false,
          fullscreenControl: true,
      });

      L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
        attribution: 'Map tiles <a href="http://stamen.com">Stamen</a>',
        subdomains: 'abcd',
        minZoom: 1,
        maxZoom: 17,
        ext: 'png',
      }).addTo(mapa);

      var myIcon = L.icon({
        iconUrl: logoMarker,
        iconSize: [29, 29],
        iconAnchor: [15, 15],
        popupAnchor: [0, -20],
      });

      let miPopup = L.marker([latitud, longitud], {icon: myIcon}).addTo(mapa);

      miPopup.bindPopup('<a href="'+ link + '">' + nombre + '</a>');

      new L.Control.Zoom({ position: 'topleft' }).addTo(mapa);

    })

  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
