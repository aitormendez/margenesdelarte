var InfiniteScroll = require('infinite-scroll');
var Isotope = require('isotope-layout');
var imagesLoaded = require('imagesloaded');
var jQueryBridget = require('jquery-bridget');
jQueryBridget( 'isotope', Isotope, $ );
jQueryBridget( 'infiniteScroll', InfiniteScroll, $ );

export default {
  init() {

    // infinite-scroll + Isotope
    // -----------------------------------------------

    InfiniteScroll.imagesLoaded = imagesLoaded;

        $('.infinite-container').imagesLoaded( function () {

          let viewMoreButton = $('.view-more-button');
          let buttonCont = $('.button-container');

          var $grid = $('.infinite-container');

          $grid.isotope({
            itemSelector: '.article',
            layoutMode: 'masonry',
          });

          var iso = $grid.data('isotope');

          var main = $grid.infiniteScroll({
            path: '.nav-previous a',
            append: '.article',
            outlayer: iso,
            history: false,
            hideNav: '.nav-links',
            button: '.view-more-button',
            status: '.page-load-status',
          });

          main.on( 'load.infiniteScroll', onPageLoad );

          var infScroll = main.data('infiniteScroll');

          main.on( 'last.infiniteScroll', function() {
            buttonCont.hide();
          });

          function onPageLoad() {
            $grid.isotope('layout');
            if ( infScroll.loadCount == 1 ) {
              main.infiniteScroll( 'option', {
                loadOnScroll: false,
              });
              buttonCont.removeClass('hide');
              main.off( 'load.infiniteScroll', onPageLoad );
            }
          }

        });




  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
/* eslint-enable */
