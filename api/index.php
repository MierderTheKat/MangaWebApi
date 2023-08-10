<?php
require_once 'db_config.php';
require_once 'manga.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar el método de la petición HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Inicializar la clase Manga
$manga = new Manga($conn);

// Manejar las diferentes peticiones
switch ($method) {
    case 'GET':
        // Obtener lista de mangas
        if (isset($_GET['id'])) {
            $manga_id = intval($_GET['id']);
            echo json_encode($manga->getMangaById($manga_id));
        } else {
            echo json_encode($manga->getAllMangas());
        }
        break;

    case 'POST':
        // Agregar un nuevo manga
        $data = array(
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'description' => $_POST['description'],
            'publish' => $_POST['publish'],
            'image' => $_POST['image']
        );
        echo json_encode($manga->addManga($data));
        break;

    case 'PUT':
        // Actualizar un manga existente
        $data = json_decode(file_get_contents('php://input'), true);
        // Verificar si todos los datos necesarios se han enviado
        if (isset($data['id'], $data['title'], $data['author'], $data['description'], $data['publish'], $data['image'])) {
            echo json_encode($manga->updateManga($data));
        } else {
            http_response_code(400); // Código 400 para solicitud incorrecta
            echo json_encode(array('message' => 'Datos incompletos para la actualización.'));
        }
        break;

    case 'PATCH':
        // Actualizar un manga existente
        $data = json_decode(file_get_contents('php://input'), true);
        // Verificar si todos los datos necesarios se han enviado
        if (isset($data['id'], $data['title'], $data['author'], $data['description'], $data['publish'], $data['image'])) {
            echo json_encode($manga->updateManga($data));
        } else {
            http_response_code(400); // Código 400 para solicitud incorrecta
            echo json_encode(array('message' => 'Datos incompletos para la actualización.'));
        }
        break;

    case 'DELETE':
        // Eliminar un manga
        $manga_id = intval($_GET['id']);
        echo json_encode($manga->deleteManga($manga_id));
        break;

    case 'HEAD':
        // Obtener información similar a GET, pero sin cuerpo de respuesta
        if (isset($_GET['id'])) {
            $manga_id = intval($_GET['id']);
            $mangaData = $manga->getMangaById($manga_id);
            if ($mangaData) {
                http_response_code(200);
            } else {
                http_response_code(404); // No encontrado
            }
        } else {
            $mangasData = $manga->getAllMangas();
            if (!empty($mangasData)) {
                http_response_code(200);
            } else {
                http_response_code(204); // Sin contenido
            }
        }
        break;

    case 'OPTIONS':
        // Obtener información sobre los métodos disponibles
        $allowedMethods = array('GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS', 'TRACE');
        header('Allow: ' . implode(', ', $allowedMethods));
        http_response_code(200);
        break;

    case 'TRACE':
        // Diagnosticar enviando de vuelta información relevante de la solicitud
        $requestInfo = array(
            'URL' => $_SERVER['REQUEST_URI'],
            'Method' => $_SERVER['REQUEST_METHOD'],
            'Headers' => getallheaders()
        );
        echo json_encode($requestInfo);
        http_response_code(200);
        break;

    default:
        http_response_code(405); // Método no permitido
        break;
}
