import 'lightgallery/dist/js/lightgallery';
import 'lightgallery/modules/lg-fullscreen';
import 'lightgallery/modules/lg-hash';

export default {
  init() {
    // JavaScript to be fired on the single post

    $('.lightbox').lightGallery({
      selector: 'a',
      mode: 'lg-slide',
      speed: 1000,
      preload: 2,
      download: false,
      thumbContHeight: 60,
      hideBarsDelay: 1000,
    });

  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
/* eslint-enable */
