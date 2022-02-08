
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyCsJxVawsmjScrFf95OFbwUdVGsE3IkGC0",
    authDomain: "kobantitar-mobile.firebaseapp.com",
    projectId: "kobantitar-mobile",
    storageBucket: "kobantitar-mobile.appspot.com",
    messagingSenderId: "452246297486",
    appId: "1:452246297486:web:5ddc778bd886866dda22df",
    measurementId: "G-3729TJ7ZEE"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
      body: 'Background Message body.',
      icon: '/firebase-logo.png'
    };
  
    self.registration.showNotification(notificationTitle,
      notificationOptions);
    self.clients.matchAll({includeUncontrolled: true}).then(function (clients) {
       console.log(clients); 
       //you can see your main window client in this list.
       clients.forEach(function(client) {
           client.postMessage('YOUR_MESSAGE_HERE');
       })
    })
});
