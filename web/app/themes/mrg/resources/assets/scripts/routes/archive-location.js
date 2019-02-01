import L from 'leaflet/dist/leaflet.js';
import 'leaflet.fullscreen/Control.FullScreen';

export default {
  init() {
    /* eslint-disable */
    let logoMarker = mrg.marker;
    /* eslint-enable */

    let mapa = L.map('map').setView([51.505, -0.09], 13);

    mapa.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
      attribution: 'Map tiles <a href="http://stamen.com">Stamen</a>',
      subdomains: 'abcd',
      minZoom: 1,
      maxZoom: 17,
      ext: 'png',
    }).addTo(mapa);

  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
/* eslint-enable */
