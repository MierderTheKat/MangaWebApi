# Sitio con CRUD de mangas - PHP, Jquery, Bootstrap y Firebase

Pagina web con API que consume mangas, realizando el CRUD, asi como seccion de Login implementado con firebase.

Realizado por: [Francisco Javier Rivera](https://github.com/MierderTheKat)

## Base de datos utilizada

Nombre de la base de datos: `mangas`

Nombre de la tabla: `catalogo`

Estructura:
| #     | Nombre               | Tipo         | Nulo | Predeterminado | Extra          |
| :---: | :---                 | :---         | :---:| :---:          | :---           |
| 1     | `id`                 | int(255)     | No   | Ninguna        | AUTO_INCREMENT |
| 2     | `title`              | varchar(50)  | No   | Ninguna        |                |
| 3     | `author`             | varchar(100) | No   | Ninguna        |                |
| 5     | `description`        | varchar(500) | No   | Ninguna        |                |
| 6     | `publish`            | date         | No   | Ninguna        |                |
| 7     | `image`              | varchar(500) | No   | Ninguna        |                |
