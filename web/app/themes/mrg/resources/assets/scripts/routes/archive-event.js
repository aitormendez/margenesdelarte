import 'fullcalendar/dist/fullcalendar.js';
import 'fullcalendar/dist/locale/es.js';

export default {
  init() {
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

  },
  finalize() {
    // JavaScript to be fired on single post, after the init JS

  },
};
/* eslint-enable */
