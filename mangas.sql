-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2023 a las 23:49:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mangas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `publish` date NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id`, `title`, `author`, `description`, `publish`, `image`) VALUES
(13, 'Naruto Shiquito', 'Kishimoto', 'Niño con el demonio metido quiere ser presidente', '2023-08-16', 'https://i.blogs.es/dfdc01/naruto-nuevos-episodios-estreno-septiembre-2023/1366_2000.jpeg'),
(28, 'One Piece', 'Eichiro Oda', 'The Wan Pis is rial xd\nJIjiaf', '1997-07-22', 'https://otakuteca.com/images/books/cover/615b37c54415c.jpg'),
(40, 'Vinland Saga', 'Makoto Yukimura', 'Thorfinn sueña con ser un gran guerrero, pero descubrirá lo que ello supone cuando su padre sea llamado a filas por el rey de Dinamarca para participar en la conquista de Inglaterra y este sea asesinado por el ambicioso mercenario Askeladd.', '2005-04-13', 'https://th.bing.com/th/id/OIP.7JeIEtEbf3BmJ2yqPeKadAHaEm?pid=ImgDet&rs=1'),
(43, 'Oyasumi Punpun', 'Inio Asano', 'Un niño normal que debe hacer frente a sus amigos y familia disfuncional, su interés amoroso, su adolescencia en sentido contrario y su mente hiperactiva.', '2013-03-15', 'https://th.bing.com/th/id/R.feb469684d4aaa4e849cb1bdad75fd72?rik=pH0XTjFIP0qCnA&pid=ImgRaw&r=0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
