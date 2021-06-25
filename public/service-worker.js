importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.1.5/workbox-sw.js');

workbox.routing.registerRoute(
    ({request}) => request.destination==='image',
    new workbox.strategies.NetworkFirst()
);

// const CACHE_NAME = "version-1";
// const self = this;
// self.addEventListener('install', (event) => {
//     caches.open(CACHE_NAME).then((cache => {
//         console.log('Cache opened');
//     }))
// });
//
// self.addEventListener('fetch',() => console.log("fetch"));
//
