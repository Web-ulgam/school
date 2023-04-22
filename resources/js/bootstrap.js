import Echo from "laravel-echo"

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Event.fire = function(event, el) {
  return ( el ) 
        ? document.querySelector(el).dispatchEvent(new Event(event))
       : document.dispatchEvent(new Event(event));
}

Event.listen = function(event, elemOrCallback, callback) {
  return (typeof elemOrCallback === 'function') 
            ? document.addEventListener(event, elemOrCallback)
            : document.querySelector(elemOrCallback).addEventListener(event, callback);
}

Event.fire_me = (name, argument) => {
    document.dispatchEvent(new CustomEvent(name, {detail: argument}));
}

Event.listen_me = (name, callback) => {
    document.addEventListener(name, callback);
}

window.Pusher = require('pusher-js')
window.Echo = new Echo({
  broadcaster: 'pusher',
  key: 'hero_is_coming',
  wsHost: window.location.hostname,
  wsPort: 6001,
  forceTLS: false,
  disableStats: true
})
