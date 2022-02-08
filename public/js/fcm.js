// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.6/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.6/firebase-analytics.js";
import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/9.6.6/firebase-messaging.js"

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyC7nwcxjeBP9RckM0WJJ8FcH3MX7C0gcEM",
    authDomain: "ecologreen-fb7ad.firebaseapp.com",
    projectId: "ecologreen-fb7ad",
    storageBucket: "ecologreen-fb7ad.appspot.com",
    messagingSenderId: "867497759939",
    appId: "1:867497759939:web:348706cf9f7dfc3bb27e76",
    measurementId: "G-J6MW2C3WB9"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);


const messaging = getMessaging();


function retrieveToken() {
    getToken(messaging, { vapidKey: 'BJRYREaSi44_25NucypqEn51wv0KlO20RdaoI9fp5ghYnry9Vy1UBasPG9gM4LWpDapGGDqaLjG2s377UVDDLuA' }).then((currentToken) => {
        if (currentToken) {
            console.log(currentToken);
            $.post("/devices", {
                "token": currentToken,
            },
                function (data, textStatus, jqXHR) {
                    console.log(textStatus);
                    console.log(data);
                },
            );
        } else {
            console.log('No registration token available. Request permission to generate one.');
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
    });
}
retrieveToken();

onMessage(messaging, (payload) => {
    console.log('Message received. ', payload);
});

navigator.serviceWorker.addEventListener('message', function (event) {
    console.log('NOTIF MASUK', event);
});