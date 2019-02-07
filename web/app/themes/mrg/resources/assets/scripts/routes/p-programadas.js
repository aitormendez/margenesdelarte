var InfiniteScroll = require('infinite-scroll');
var Isotope = require('isotope-layout');
var imagesLoaded = require('imagesloaded');
var jQueryBridget = require('jquery-bridget');
jQueryBridget( 'isotope', Isotope, $ );
jQueryBridget( 'infiniteScroll', InfiniteScroll, $ );


export default {
  init() {
    // JavaScript to be fired

    // Infinite scroll + Isotope
    // https://infinite-scroll.com/options.html#outlayer
    // https://infinite-scroll.com/extras.html#webpack-browserify
    // https://stackoverflow.com/questions/47906150/imagesloaded-required-for-outlayer-option


    InfiniteScroll.imagesLoaded = imagesLoaded;

        $('.grid').imagesLoaded( function () {

          let viewMoreButton = $('.view-more-button');
          let buttonCont = $('.button-container');

          var $grid = $('.grid');

          $grid.isotope({
            itemSelector: 'article',
            layoutMode: 'masonry',
          });

          var iso = $grid.data('isotope');

          var main = $grid.infiniteScroll({
            path: '.older a',
            append: 'article',
            outlayer: iso,
            history: false,
            hideNav: '.pager',
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
};
