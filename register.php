<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include 'components.php'; ?>
    <?php topScriptsAndStyles(); ?>
</head>

<body class="d-flex flex-column vh-100">

    <?php navbar(); ?>

    <div class="container flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-5">
                <h2 class="mb-3 text-center">Sign Up</h2>
                <form id="signupForm" class="d-flex flex-column gap-3">
                    <div class="form-group">
                        <input type="email" class="form-control py-3 px-4" id="signupEmail" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" minlength="6" class="form-control py-3 px-4" id="signupPassword" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary fs-5 py-2 mt-3 fw-bold">Sign Up</button>
                    <p class="text-center mb-1">By clicking "Create account", you agree to the <a class="text-decoration-none fw-medium" href="">Privacy Policy</a>.</p>
                    <p class="text-center">Already have an account?<a href="/API/login.php" class="ms-2 text-decoration-none fw-medium">Log in</a></p>
                </form>
            </div>
        </div>
    </div>

    <?php footer(); ?>

    <!-- Alerts template -->
    <div class="toast-container position-fixed bottom-0 start-0 m-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto" id="message"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

</body>

<?php bottomScriptsAndStyles(); ?>

</html>

<script type="module">
    function toast(message) {
        const toastLiveExample = document.getElementById('liveToast')
        const messageElement = document.getElementById('message')
        messageElement.textContent = message;
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()
    }

    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";
    import {
        getAuth,
        createUserWithEmailAndPassword
    } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-auth.js";

    const firebaseConfig = {
        apiKey: "AIzaSyClluLNHimzXFtnAhujY75tkRt_ycgySWA",
        authDomain: "loginfranmangas.firebaseapp.com",
        projectId: "loginfranmangas",
        storageBucket: "loginfranmangas.appspot.com",
        messagingSenderId: "453496943497",
        appId: "1:453496943497:web:7a174993cd85720e252758",
        measurementId: "G-9YX12ZS1PE"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);

    $('#signupForm').submit(function(event) {
        event.preventDefault();
        var isVerified = true;

        var email = document.getElementById("signupEmail").value;
        var password = document.getElementById("signupPassword").value;

        if (isVerified) {
            createUserWithEmailAndPassword(auth, email, password)
                .then(() => {
                    toast("¡Cuenta creada correctamente!");
                })
                .catch((error) => {
                    if (!signupEmail && !signupPassword) {
                        toast("Ingresa todos los campos");
                        isVerified = false;
                    } else {
                        toast(error);
                    }
                });
        }
    });

    auth.onAuthStateChanged((user) => {
        if (user) {
            console.log("Usuario autenticado:", user);
            window.location.href = "mainpage.php";
        } else {
            console.log("Usuario no autenticado");
        }
    });
</script>