<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Mangas</title>
    <?php include 'components.php'; ?>
    <?php topScriptsAndStyles(); ?>
</head>

<style>
    .img-scale {
        transition: transform 0.3s;
    }

    .img-scale:hover {
        transform: scale(1.03);
    }

    .img-size {
        height: 10rem !important;
    }

    .scroll-manga {
        overflow-y: hidden;
        max-height: 7rem !important;
    }

    .scroll-manga:hover {
        overflow-y: auto;
    }
</style>

<body class="d-flex flex-column vh-100">

    <?php navbar(); ?>

    <div class="container flex-grow-1">
        <div class="d-flex flex-column align-items-center gap-3">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h1>Bienvenido a FranMangas</h1>
                    <p>Explora nuestra colección de emocionantes mangas japoneses. Sumérgete en historias cautivadoras y personajes inolvidables.</p>
                </div>
                <div class="col-lg-12 mt-4">
                    <h4>Únete a la Comunidad</h4>
                    <p>Regístrate para obtener acceso completo a todas las funciones del sitio, como agregar tus mangas favoritos a la lista</p>
                    <a href="/register.php" class="btn btn-outline-primary btn-block">Registrarse</a>
                </div>
            </div>
        </div>
    </div>

    <?php footer(); ?>

</body>

<?php bottomScriptsAndStyles(); ?>

</html>