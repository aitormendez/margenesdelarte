export default {
  init() {
    // JavaScript to be fired on all pages

    // hamburguesa
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
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
