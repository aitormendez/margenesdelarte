import InfiniteScroll from 'infinite-scroll/dist/infinite-scroll.pkgd';
import 'isotope-layout/dist/isotope.pkgd';
import 'imagesloaded/imagesloaded.pkgd';


export default {
  init() {
    // JavaScript to be fired

    // Infinite scroll + Isotope
    // https://infinite-scroll.com/options.html#outlayer


    const $grid = $('.infinite-container').isotope({
        itemSelector: '.event',
        masonry: {
          columnWidth: 50,
        },
      });
      $grid.imagesLoaded().progress(function() {
        $grid.isotope('layout');
      });




    // var isot = grid.data('isotope');
    //
    // let main = grid.infiniteScroll({
    //   // options
    //   path: '.older a',
    //   append: 'article',
    //   history: false,
    //   hideNav: '.pager',
    //   button: '.view-more-button',
    //   status: '.page-load-status',
    // });
    //
    // let viewMoreButton = $('.view-more-button');
    // let buttonCont = $('.button-container');
    //
    //
    // var infScroll = main.data('infiniteScroll');
    //
    // main.on( 'load.infiniteScroll', onPageLoad );
    //
    // main.on( 'last.infiniteScroll', function() {
    //   buttonCont.hide();
    // });
    //
    // function onPageLoad() {
    //   if ( infScroll.loadCount == 1 ) {
    //     main.infiniteScroll( 'option', {
    //       loadOnScroll: false,
    //     });
    //     viewMoreButton.show();
    //     main.off( 'load.infiniteScroll', onPageLoad );
    //   }
    // }







  },
};
