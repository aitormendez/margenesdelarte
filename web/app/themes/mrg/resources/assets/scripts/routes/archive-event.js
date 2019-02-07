import 'fullcalendar/dist/fullcalendar.js';
import 'fullcalendar/dist/locale/es.js';
var InfiniteScroll = require('infinite-scroll');

export default {
  init() {

    // Calendar.io
    // -----------------------------------------------

    /* eslint-disable */
    let themeUri = mrg.themeUri;
    /* eslint-enable */

    $('#calendar').fullCalendar({
      events: themeUri + '/resources/events.json',
      eventColor: '#e30000',
      height: 650,
      header: {
        left:   'title',
        center: 'agendaWeek, month',
        right:  'today prev,next',
      },
    })

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
      $('header svg').on('animationiteration webkitAnimationIteration oanimationiteration MSAnimationIteration', function(e) {
        $(this).css({top: Math.floor(Math.random() * 5 + 5) + 'px'},0);
        $(this).css({left: Math.floor(Math.random() * 5) + 'px'},0);
      });
    }



  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
/* eslint-enable */
