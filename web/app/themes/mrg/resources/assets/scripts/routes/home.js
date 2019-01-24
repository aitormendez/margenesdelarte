export default {
  init() {
    // JavaScript to be fired on the home page

    let logo = $('.logo');
    let ruido =$('.ruido');
    let video =$('.video');

    /* eslint-disable no-undef */

    $('.menu-present').mouseenter(function(){
      ruido.css('opacity', 0.3);
      video.css('background-image', `url(${mrg.homeUrl}/app/themes/mrg/dist/images/videogif/present.gif)`)
    });

    $('.menu-item').mouseleave(function(){
      ruido.css('opacity', 1);
      video.css('background-image', 'none')
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
/* eslint-enable */
