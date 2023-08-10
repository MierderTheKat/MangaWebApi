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

    <?php loggednavbar(); ?>

    <div class="container flex-grow-1">
        <div class="d-flex flex-column align-items-center gap-3">
            <!-- Mangas list -->
            <h1 class="mb-2">Mis Mangas</h1>
            <div id="mangaList" class="d-flex flex-wrap gap-4 justify-content-center"></div>
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

    <!-- Button to add -->
    <div class="position-fixed bottom-0 end-0 m-4">
        <button class="btn btn-success rounded-circle" style="width: 3.5rem; height: 3.5rem;" data-bs-toggle="modal" data-bs-target="#addManga">
            <i class="fas fa-plus fs-3"></i>
        </button>
    </div>

    <!-- Modal to add -->
    <div class="modal fade" id="addManga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMangaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addMangaLabel">Add a new manga</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" class="needs-validation">
                    <div class="modal-body">
                        <div class="row gap-3 justify-content-between">
                            <div class="col-lg-6 form-group">
                                <label for="addTitle">Enter manga title</label>
                                <input type="text" class="form-control" id="addTitle" name="addTitle" placeholder="Enter name" required />
                            </div>
                            <div class="col-lg-5 form-group">
                                <label for="addAuthor">Enter manga author</label>
                                <input type="text" class="form-control" id="addAuthor" name="addAuthor" placeholder="Enter author" required />
                            </div>
                            <div class="col-lg-8 form-group">
                                <label for="addImage">Image URL</label>
                                <input type="text" class="form-control" id="addImage" name="addImage" placeholder="Enter image URL" required />
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="addDate">Enter publish date</label>
                                <input type="date" class="form-control" id="addDate" name="addDate" required />
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="addDescription">
                                    Description
                                </label>
                                <textarea class="form-control" id="addDescription" name="addDescription" rows="6" placeholder="Enter the description" aria-describedby="DescriptionText" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="clearSave" class="btn btn-primary">Clear</button>
                        <button type="submit" id="save" class="btn btn-success">Add manga</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal to edit -->
    <div class="modal fade" id="editManga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMangaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editMangaLabel">Edit a new manga</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" class="needs-validation">
                    <div class="modal-body">
                        <div class="row gap-3 justify-content-between">
                            <input type="hidden" id="editId" required />
                            <div class="col-lg-6 form-group">
                                <label for="editTitle">Enter manga title</label>
                                <input type="text" class="form-control" id="editTitle" name="editTitle" placeholder="Enter name" required />
                            </div>
                            <div class="col-lg-5 form-group">
                                <label for="editAuthor">Enter manga author</label>
                                <input type="text" class="form-control" id="editAuthor" name="editAuthor" placeholder="Enter author" required />
                            </div>
                            <div class="col-lg-8 form-group">
                                <label for="editImage">Image URL</label>
                                <input type="text" class="form-control" id="editImage" name="editImage" placeholder="Enter image URL" required />
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="editPublish">Enter publish date</label>
                                <input type="date" class="form-control" id="editPublish" name="editPublish" required />
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="editDescription">
                                    Description
                                </label>
                                <textarea class="form-control" id="editDescription" name="editDescription" rows="6" placeholder="Enter the description" aria-describedby="DescriptionText" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="clearEdit" class="btn btn-primary">Clear</button>
                        <button type="submit" id="editMangaBtn" class="btn btn-success">Edit manga</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script>
    function toast(message) {
        const toastLiveExample = document.getElementById('liveToast')
        const messageElement = document.getElementById('message')
        messageElement.textContent = message;
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()
    }

    // Función para cargar la lista de mangas desde la API
    function loadMangas() {
        $.ajax({
            url: 'api/index.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#mangaList').empty();
                $.each(data, function(index, manga) {
                    $('#mangaList').append(
                        '<div class="card shadow img-scale" style="width: 18rem;">' +
                        '<div class="position-relative img-size"/><img src="' + manga.image + '" class="position-absolute card-img-top img-fluid object-fit-cover pe-none bg-secondary text-white text-center img-size" alt="Manga image"/>' +
                        '<p class="position-absolute bottom-0 end-0 m-2 text-end"><span class="px-3 py-1 rounded-pill bg-dark fw-bold text-white">' + manga.publish + '</span></p>' +
                        '</div>' +
                        '<div class="card-body">' +
                        '<h5 class="card-title">' + manga.title + '</h5>' +
                        '<div class="card-text">' +
                        '<p class="mb-1">' + manga.author + '</p>' +
                        '<p class="mb-1 scroll-manga">' + manga.description + '</p>' +
                        '</div> </div> ' +
                        '<div class="d-flex">' +
                        '<button type="button" class="editManga btn btn-outline-primary w-100 border border-primary" style="border-radius: 0 0 0 5px;" data-bs-toggle="modal" data-bs-target="#editManga" data-id="' + manga.id + '">' +
                        '<i class="fa-solid fa-pen"></i></button>' +
                        '<button type="button" class="deleteManga btn btn-outline-danger w-100 border border-danger" style="border-radius: 0 0 5px 0;" data-id="' + manga.id + '">' +
                        '<i class="fa-solid fa-trash"></i></button>' +
                        '</div> </div></div>');
                });
            },
            error: function() {
                toast('Error al cargar los mangas.');
            }
        });
    }

    // Cargar la lista de mangas al cargar la página
    loadMangas();

    function validateFormData(formData) {
        for (const key in formData) {
            if (formData.hasOwnProperty(key)) {
                if (!formData[key]) {
                    return false;
                }
            }
        }
        return true;
    }

    // Agregar un nuevo manga
    $('#addForm').submit(function(event) {
        event.preventDefault();
        var formData = {
            title: $('#addTitle').val(),
            author: $('#addAuthor').val(),
            description: $('#addDescription').val(),
            publish: $('#addDate').val(),
            image: $('#addImage').val()
        };

        if (validateFormData(formData)) {
            $.ajax({
                url: 'api/index.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function() {
                    loadMangas();
                    toast("Agregado correctamente");
                    clearAll("add", "")
                    $('#addForm')[0].reset();
                },
                error: function() {
                    toast("Error al agregar el manga.");
                }
            });
        } else {
            toast("Uno de los campos está vacío.");
        }
    });

    // Enviar ID para traer datos
    $(document).on('click', '.editManga', function(event) {
        event.preventDefault();
        var mangaId = $(this).data('id');
        $.ajax({
            url: 'api/index.php?id=' + mangaId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                fillEdit(data)
            },
            error: function() {
                toast('Error al cargar el manga');
            }
        });
    });

    //llenar el modal
    function fillEdit(data) {
        event.preventDefault();
        $("#editId").val(data.id);
        $("#editTitle").val(data.title);
        $("#editAuthor").val(data.author);
        $("#editImage").val(data.image);
        $("#editPublish").val(data.publish);
        $("#editDescription").val(data.description);
    }

    // Editar un nuevo manga
    $('#editForm').submit(function(event) {
        event.preventDefault();
        var mangaId = $('#editId').val();
        console.log(mangaId)
        var formData = {
            id: $('#editId').val(),
            title: $('#editTitle').val(),
            author: $('#editAuthor').val(),
            description: $('#editDescription').val(),
            publish: $('#editPublish').val(),
            image: $('#editImage').val()
        };
        if (validateFormData(formData)) {
            // Obtener los datos previos mediante la solicitud GET
            $.ajax({
                url: 'api/index.php/?id=' + mangaId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var allFieldsChanged = false;
                    var dataChange = false;
                    // Realizar una comparación campo por campo para determinar si se han modificado todos los datos
                    if (formData.title !== data.title && formData.author !== data.author && formData.description !== data.description && formData.publish !== data.publish && formData.image !== data.image) {
                        allFieldsChanged = true;
                    }

                    for (var field in formData) {
                        // console.log(formData[field] + " = " + data[field])
                        if (field != 'id') {
                            if (formData[field] !== data[field]) {
                                dataChange = true;
                                break;
                            }
                        }
                    }

                    if (dataChange) {
                        // Determinar qué tipo de solicitud realizar
                        var requestType = allFieldsChanged ? 'PUT' : 'PATCH';

                        // Realizar la solicitud al servidor
                        $.ajax({
                            url: 'api/index.php',
                            type: requestType,
                            data: JSON.stringify(formData),
                            dataType: 'json',
                            contentType: 'application/json',
                            success: function() {
                                loadMangas();
                                toast("Editado correctamente");
                            },
                            error: function() {
                                toast("Error al actualizar el manga.");
                            }
                        });
                    } else {
                        toast('Los datos son iguales');
                    }
                },
                error: function() {
                    toast('Error al validar los datos.');
                }
            });
        } else {
            toast("Uno de los campos está vacío.");
        }
    });

    function clearAll(type) {
        event.preventDefault();
        $("#" + type + "Title").val("");
        $("#" + type + "Author").val("");
        $("#" + type + "Description").val("");
        $("#" + type + "Publish").val("");
        $("#" + type + "Image").val("");
    }

    // Limpiar apartados en modal de agregar
    $(document).on('click', '#clearSave', function(event) {
        clearAll("add", "")
    });

    // Limpiar apartados en modal de editar
    $(document).on('click', '#clearEdit', function(event) {
        clearAll("edit")
    });

    // Eliminar un manga
    $(document).on('click', '.deleteManga', function(event) {
        event.preventDefault();
        var mangaId = $(this).data('id');
        if (confirm('¿Estás seguro de que deseas eliminar este manga?')) {
            $.ajax({
                url: 'api/index.php?id=' + mangaId,
                type: 'DELETE',
                dataType: 'json',
                success: function() {
                    loadMangas();
                },
                error: function() {
                    toast('Error al eliminar el manga.');
                }
            });
        }
    });
</script>

<?php bottomScriptsAndStyles(); ?>

</html>

<script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/10.1.0/firebase-app.js";
    import {
        getAuth,
        signOut,
        signInWithEmailAndPassword,
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

    auth.onAuthStateChanged((user) => {
        if (user) {
            console.log("Usuario autenticado:", user);
        } else {
            console.log("Usuario no autenticado");
            window.location.href = "login.php";
        }
    });


    // Cerrar sesión
    $(document).on('click', '#logoutBtn', function(event) {
        event.preventDefault();
        signOut(auth)
            .then(() => {
                console.log("Sesión cerrada");
            })
            .catch((error) => {
                console.error("Error al cerrar sesión:", error);
            });
    });
</script>