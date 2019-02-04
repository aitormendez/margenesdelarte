import L from 'leaflet/dist/leaflet.js';
import 'leaflet.fullscreen/Control.FullScreen';

export default {
  init() {

    // flecha
    //--------------------------------------------------------------




    // mapa
    //--------------------------------------------------------------


    /* eslint-disable */
    let logoMarker = mrg.marker;
    let themeUri = mrg.themeUri;



    // var locations = [{
    //   "title": "Albergue Las Dehesas",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/albergue-las-dehesas\/",
    //   "latLng": ["40.75532330000001", "-4.070765599999959"]
    // },
    // {
    //   "title": "Escuela de Relaciones Laborales UCM, Aula 8",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/escuela-relaciones-laborales-ucm\/",
    //   "latLng": ["40.42484089999999", "-3.70750709999993"]
    // },
    // {
    //   "title": "Sala de reuni\u00f3n de Universidad Carlos III de Madrid (Facultad de Humanidades)",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/sala-reunion-carlos-iii\/",
    //   "latLng": ["40.3158475", "-3.726670600000034"]
    // },
    // {
    //   "title": "Solar de la antigua piscina Miami",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/solar-de-la-antigua-piscina-miami\/",
    //   "latLng": ["40.4054077", "-3.734817600000042"]
    // },
    // {
    //   "title": "Espacio 17A",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/espacio-17a\/",
    //   "latLng": ["40.4559477", "-3.6761890999999878"]
    // },
    // {
    //   "title": "Piso particular",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/piso-particular\/",
    //   "latLng": ["40.426775", "-3.7088260000000446"]
    // },
    // {
    //   "title": "La quimera de Lavapi\u00e9s",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/la-quimera-de-lavapies\/",
    //   "latLng": ["40.4100666", "-3.70347849999996"]
    // },
    // {
    //   "title": "Facultad de Bellas Artes. Universidad Complutense de Madrid",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/facultad-de-bellas-artes-universidad-complutense-de-madrid\/",
    //   "latLng": ["40.4399284", "-3.733872799999972"]
    // },
    // {
    //   "title": "El cuarto de invitados",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/el-cuarto-de-invitados\/",
    //   "latLng": ["40.4097985", "-3.7041518999999425"]
    // },
    // {
    //   "title": "Sala &#8216;El \u00c1guila&#8217;. Archivo Regional de la Comunidad de Madrid",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/sala-el-aguila\/",
    //   "latLng": ["40.3997385", "-3.6906327000000374"]
    // },
    // {
    //   "title": "ABM Confecciones",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/abm-confecciones\/",
    //   "latLng": ["40.3912343", "-3.6678497000000334"]
    // },
    // {
    //   "title": "Sala de Arte Joven",
    //   "url": "http:\/\/margenesdelarte.test\/locations\/sala-de-arte-joven\/",
    //   "latLng": ["40.43866775752037", "-3.676227084547463"]
    // }];

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
        popupAnchor: [0, -20],
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
        marker.bindPopup('<p>' + locations[i].title + '<p>' );
        bounds.extend(latLng);
        map.fitBounds(bounds);

        // loop logs
        // console.log('LAT-LNG: ' + latLng);
        // console.log(bounds);

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
