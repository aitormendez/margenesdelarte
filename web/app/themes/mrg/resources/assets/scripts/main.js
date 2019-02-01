// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import single from './routes/single';
import singleEvent from './routes/single-event';
import postTypeArchiveEvent from './routes/archive-event';
import postTypeArchiveLocation from './routes/archive-location';
import pProgramadas from './routes/p-programadas';
import pAnteriores from './routes/p-anteriores';

// import then needed Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';

// import the Facebook and Twitter icons
import { faFacebook, faTwitter } from "@fortawesome/free-brands-svg-icons";

// add the imported icons to the library
library.add(faFacebook, faTwitter);

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();


/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  single,
  singleEvent,
  postTypeArchiveEvent,
  postTypeArchiveLocation,
  pProgramadas,
  pAnteriores,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
