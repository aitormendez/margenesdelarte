var InfiniteScroll = require('infinite-scroll');

export default {
  init() {

    // infinite-scroll
    // -----------------------------------------------

    let viewMoreButton = $('.view-more-button');
    let buttonCont = $('.button-container');

    let main = $('.infinite-container').infiniteScroll({
      // options
      path: '.nav-previous a',
      append: 'article',
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
      if ( infScroll.loadCount == 1 ) {
        main.infiniteScroll( 'option', {
          loadOnScroll: false,
        });
        buttonCont.removeClass('hide');
        main.off( 'load.infiniteScroll', onPageLoad );
      }
    }


    // brownian movement on arrow
    //------------------------------------------------


    let viewportWidth = $(window).width();

    if (viewportWidth >= 700) {
      $('.next-call svg').on('animationiteration webkitAnimationIteration oanimationiteration MSAnimationIteration', function(e) {
        $(this).css({top: Math.floor(Math.random() * 5) + 'px'},0);
        $(this).css({left: Math.floor(Math.random() * 5) + 'px'},0);
      });
    }



  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
/* eslint-enable */
