export default {
  init() {
    // JavaScript to be fired on the home page

    let logo = $('.logo');
    let ruido =$('.ruido');
    let video =$('.video');

    /* eslint-disable no-undef */

    $('.menu-present').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.presentGif})`)
    });

    $('.menu-acti').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.actiGif})`)
    });

    $('.menu-item').mouseleave(function(){
      ruido.css('opacity', 1);
      video.css('background-image', 'none')
    });



  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS

    // movimiento browniano menús
    let viewportWidth = $(window).width();

    if (viewportWidth >= 700) {
      $('.menu-item').on('animationiteration webkitAnimationIteration oanimationiteration MSAnimationIteration', function(e) {
        $(this).css({top: Math.floor(Math.random() * 3) + 'px'},0);
        $(this).css({left: Math.floor(Math.random() * 3) + 'px'},0);
      });
    }

  },
};
/* eslint-enable */
