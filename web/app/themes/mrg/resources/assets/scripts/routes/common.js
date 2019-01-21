export default {
  init() {
    // JavaScript to be fired on all pages

    // hamburguesa
    let navContainer = $('.nav-container');
    let hamb = $('#hamb');
    let cerrar = $('#cerrar');

    hamb.click(function() {
      navContainer.toggleClass('cerrado abierto');
    });

    cerrar.click(function() {
      navContainer.toggleClass('cerrado abierto');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
