window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '88b46fc61e089709e692',
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    // encrypted: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
    
});

Pusher.log = function(message) {
   console.log("S",message);
  };
//   var pusher = new Pusher('88b46fc61e089709e692');
//   pusher.connection.bind( 'error', function( err ) {
//     if( err.error.data.code === 4004 ) {
//       log('>>> detected limit error');
//     }
//   });
var pusher = new Pusher('88b46fc61e089709e692',{
    cluster: 'ap2'
});
var channel = pusher.subscribe('Chat');
channel.bind('Channels',
  function(data) {
      console.log("HI",data);
    // add new price into the APPL widget
  }
);
