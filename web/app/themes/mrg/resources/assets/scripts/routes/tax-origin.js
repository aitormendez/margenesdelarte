var InfiniteScroll = require('infinite-scroll');

export default {
  init() {

    // infinite-scroll
    // -----------------------------------------------

    $('.infinite-container').infiniteScroll({
      // options
      path: '.nav-previous a',
      append: 'article',
      history: false,
      hideNav: '.nav-links',
      button: '.view-more-button',
      status: '.page-load-status',
    });


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
