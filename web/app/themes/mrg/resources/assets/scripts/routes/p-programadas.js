import InfiniteScroll from 'infinite-scroll/dist/infinite-scroll.pkgd';

export default {
  init() {
    // JavaScript to be fired

    // Infinite scroll

    let main = $('.infinite-container').infiniteScroll({
      // options
      path: '.older a',
      append: 'article',
      history: false,
      hideNav: '.pager',
      button: '.view-more-button',
      status: '.page-load-status',
    });

    let viewMoreButton = $('.view-more-button');
    let buttonCont = $('.button-container');


    var infScroll = main.data('infiniteScroll');

    main.on( 'load.infiniteScroll', onPageLoad );

    main.on( 'last.infiniteScroll', function( event, response, path ) {
      console.log( 'Loaded: ' + path );
      buttonCont.hide();
    });

    function onPageLoad() {
      if ( infScroll.loadCount == 1 ) {
        // after 2nd page loaded
        // disable loading on scroll
        main.infiniteScroll( 'option', {
          loadOnScroll: false,
        });
        // show button
        viewMoreButton.show();
        // remove event listener
        main.off( 'load.infiniteScroll', onPageLoad );
      }
    }

  },
};
