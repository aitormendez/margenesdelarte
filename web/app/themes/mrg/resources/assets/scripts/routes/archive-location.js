import L from 'leaflet/dist/leaflet.js';
import 'leaflet.fullscreen/Control.FullScreen';
import {
  TweenMax,
  Power1,
} from "gsap/all";

export default {
  init() {

    // flecha
    //--------------------------------------------------------------


    let flechaLocation1 = $('#flecha-location-1');

    flechaLocation1.click(function(event) {
      event.preventDefault();
      TweenMax.to(window, 0.8, {
        scrollTo: {
          y: ".list",
        },
        ease: Power1.easeOut,
      });
    });


    // mapa
    //--------------------------------------------------------------


    /* eslint-disable */
    let logoMarker = mrg.marker;
    let themeUri = mrg.themeUri;

    var locations;

    function fillLocations(responseJSON) {

      var locations = responseJSON;

      var tileLayer = new L.tileLayer('//stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.png', {
        attribution: 'Map tiles <a href="http://stamen.com">Stamen</a>',
        minZoom: 1,
        maxZoom: 17,
      });

      var map = L.map('map', {
        fullscreenControl: true,
        layers: tileLayer,
      });

      // Icon
      var myIcon = L.icon({
        iconUrl: logoMarker,
        iconSize: [29, 29],
        iconAnchor: [15, 15],
        popupAnchor: [0, -10],
      });

      // instantiate bounds
      var bounds = L.latLngBounds();

      // Loop through the data
      for (var i = 0; i < locations.length; i++) {
        var latLng = locations[i].latLng;
        var title = locations[i].title;

        // Create and save a reference to each marker
        var marker = L.marker(latLng, {
          icon: myIcon,
          title: locations[i].title,
        }).addTo(map)
        marker.bindPopup('<a href="' + locations[i].url + '">' + locations[i].title + '<a>' );
        bounds.extend(latLng);
        map.fitBounds(bounds);
      } // <--end loop
    }

    $.getJSON(themeUri + '/resources/location.json', function(result){
      fillLocations(result);
      console.log(result);
    });
    /* eslint-enable */











  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
