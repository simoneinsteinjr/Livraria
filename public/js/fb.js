var config = {
    apiKey: "AIzaSyAgA28bVIhZhiLTyqmjy6LcluLUB0KesU8",
    authDomain: "taki-e4acf.firebaseapp.com",
    databaseURL: "https://taki-e4acf.firebaseio.com",
    projectId: "taki-e4acf",
    storageBucket: "taki-e4acf.appspot.com",
    messagingSenderId: "522059964561"
};
firebase.initializeApp(config);

const messaging = firebase.message();
messaging.requestPermission()
.then(function () {
    console.log('Tem Permissao')
    return messaging.getToken();
})
.then(function (token) {
    console.log(token);
})
.catch(function (err) {
    console.log('Ocoreu um Erro')
})