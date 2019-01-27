/* eslint-disable no-unused-vars */
import {
  TweenMax,
  Bounce,
  Power0,
  Power2,
  Power4,
  Elastic,
} from "gsap/all";
import 'gsap/src/minified/plugins/ScrollToPlugin.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';
/* eslint-enable */

export default {
  init() {
    // JavaScript to be fired on all pages

    // hamburguesa
    // -----------------
    let navContainer = $('.nav-container');
    let hamb = $('#hamb');
    let cerrar = $('#cerrar');
    let body = $('body');

    hamb.click(function() {
      navContainer.toggleClass('cerrado abierto');
      body.toggleClass('fix');
    });

    cerrar.click(function() {
      navContainer.toggleClass('cerrado abierto');
      body.toggleClass('fix');
    });

    // Scroll banner functionality
    // ------------------------------

    let flecha1 = $('#flecha-1');
    let flecha2 = $('#flecha-2');
    let flecha3 = $('#flecha-3');
    let viewportHeight = $(window).height(),
    viewportWidth = $(window).width(),
    yPos,
    bannerHeight = '256',
    currY = 0;



    // detectar home page
    let home;
    if (body.hasClass( "home" )) {
      home = true;
      yPos = viewportHeight;
      $('.banner').addClass('big');
    } else {
      home = false;
      yPos = bannerHeight;
    }

    // flechas scroll

    if (viewportWidth >= 700) {
      flecha1.click(function(event) {
        event.preventDefault();
        elProceso.bannerUp();
      });

      flecha3.click(function(event) {
      event.preventDefault();
      TweenMax.to(window, 0.8, {
        scrollTo: {
          y: viewportHeight,
        },
        ease: Power2.easeOut,
      });
    });

    } else {
      flecha1.click(function(event) {
      event.preventDefault();
      TweenMax.to(window, 0.8, {
        scrollTo: {
          y: ".content",
        },
        ease: Elastic.easeOut,
      });
    });
    }

    flecha2.click(function() {
      elProceso.bannerDownBig();
    });

    // timelines
    // https://css-tricks.com/writing-smarter-animation-code/

    function Runner() {

      this.bannerUp = function(){
        let tl = new TimelineMax({
            onStart: elProceso.startRunner,
            onStartParams:['bannerUp'],
            onComplete: elProceso.stopRunner,
            onCompleteParams:['none'],
          });
        tl
          .to('.banner', .5, {
            y: -yPos,
            ease: Power0.easeOut,
          }, 0);
          return tl;
      }

      this.bannerDown = function(){
        let tl = new TimelineMax({
            onStart: elProceso.startRunner,
            onStartParams:['bannerDown'],
            onComplete: elProceso.stopRunner,
            onCompleteParams:['bannerDown'],
          })
        tl
          .to('.banner', .5, {
            y: 0,
            height: 'auto',
            ease: Power4.easeOut,
          }, 0);
          return tl;
      }

      this.bannerDownBig = function(){
        let tl = new TimelineMax({
            onStart: elProceso.startRunner,
            onStartParams:['bannerDownBig'],
            onComplete: elProceso.stopRunner,
            onCompleteParams:['bannerDownBig'],
          });
        tl
          .to('.banner', .5, {
            y: 0,
            height: yPos,
            ease: Power4.easeOut,
          }, 0);
          return tl;
      }

      this.runnerName = '';

      this.setRunnerName = function(runnerName) {
        this.runnerName = runnerName;
      }

      this.startRunner = function(runnerName) {
        if (runnerName == 'bannerDownBig') {
          $('.banner').addClass('big');
          $('#flecha-1').removeClass('hidden');
        } else if (runnerName == 'bannerDown') {
          $('.banner').removeClass('big');
          $('#flecha-1').addClass('hidden');
        }
      }

    }

    let elProceso = new Runner();


    if (viewportWidth >= 700) {

      // detectar dirección scroll
      let
        el = $(window),
        lastY = el.scrollTop(),
        lastDireccion,
        cambiar,
        accion;


      el.on('scroll', function() {
        let
          currY = el.scrollTop(),
          currDireccion = (currY > lastY) ? 'down' : 'up';
          cambiar = (currDireccion === lastDireccion) ? false : true;
          accion = currDireccion + cambiar;

          if (home == true && currY == 0) {
            // bajar banner portada
            let bajarBig = new TimelineMax();
            bajarBig.add(elProceso.bannerDownBig());
            bajarBig.play();
          } else {
            switch(accion) {
              case 'uptrue':
                // bajar banner
                {
                  let bajar = new TimelineMax();
                  bajar.add(elProceso.bannerDown());
                  bajar.play();
                }
                break;
              case 'downtrue':
                // subir banner
                {
                  let subir = new TimelineMax();
                  subir.add(elProceso.bannerUp());
                  subir.play();
                }
                break;
            }
          }
        lastDireccion = currDireccion;
        lastY = currY;
      });



    } // if (viewportWidth >= 600)






  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
