export default {
  init() {
    // JavaScript to be fired on the home page
    /* eslint-disable no-undef */

    // preloader for videogifs

    $.preloadImages = function() {
      for (var i = 0; i < arguments.length; i++) {
        $("<img />").attr("src", arguments[i]);
      }
    }

    $.preloadImages(mrg.actiGif, mrg.presentGif, mrg.contactoGif, mrg.grupoGif, mrg.edicionGif, mrg.invitadosGif, mrg.jornadasGif);

    // videogifs

    let logo = $('.logo');
    let ruido =$('.ruido');
    let video =$('.video');



    $('.menu-present').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.presentGif})`)
    });

    $('.menu-acti').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.actiGif})`)
    });

    $('.menu-cont').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.contactoGif})`)
    });

    $('.menu-edi').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.edicionGif})`)
    });

    $('.menu-grupo').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.grupoGif})`)
    });

    $('.menu-invitados').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.invitadosGif})`)
    });

    $('.menu-jornadas').mouseenter(function(){
      ruido.css('opacity', 0.2);
      video.css('background-image', `url(${mrg.jornadasGif})`)
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
