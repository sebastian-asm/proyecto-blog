-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-03-2019 a las 22:47:37
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Accion'),
(2, 'Fantasia'),
(3, 'Rol'),
(4, 'shooter'),
(9, 'Ficcion'),
(10, 'Naves');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrada_usuario` (`usuario_id`),
  KEY `fk_entrada_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 1, 1, 'Super Mario', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ea adipisci quia quos est aperiam animi. At reiciendis tenetur aperiam optio vero autem, culpa similique distinctio molestias eius sapiente explicabo?', '2019-03-21'),
(2, 2, 2, 'The Sims', 'Juego de simulacion', '2019-03-21'),
(3, 3, 3, 'Assansin', 'Juego de la edad medieval', '2019-03-21'),
(4, 1, 2, 'Simcity', 'Juego de culto de Microsoft', '2019-03-21'),
(5, 2, 1, 'Donkey Kong', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ea adipisci quia quos est aperiam animi. At reiciendis tenetur aperiam optio vero autem, culpa similique distinctio molestias eius sapiente explicabo?', '2019-03-21'),
(6, 3, 3, 'Age of Empires', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ea adipisci quia quos est aperiam animi. At reiciendis tenetur aperiam optio vero autem, culpa similique distinctio molestias eius sapiente explicabo?', '2019-03-21'),
(7, 1, 3, 'Bioshock', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ea adipisci quia quos est aperiam animi. At reiciendis tenetur aperiam optio vero autem, culpa similique distinctio molestias eius sapiente explicabo?', '2019-03-21'),
(8, 2, 3, 'Yoshi Island', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ea adipisci quia quos est aperiam animi. At reiciendis tenetur aperiam optio vero autem, culpa similique distinctio molestias eius sapiente explicabo?', '2019-03-21'),
(22, 20, 9, 'Nueva entrada de naves espaciales', '          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur accusantium fuga a eaque magni mollitia natus modi facilis soluta dignissimos possimus animi quia quaerat, sequi molestias assumenda quasi, nisi repellendus?        ', '2019-03-29'),
(26, 20, 3, 'Nueva entrada de naves MOVIDO', 'LOREM', '2019-03-29'),
(34, 20, 10, 'AAAAAAAAAAAAAAA', 'AAAAAAAAAAAAAAAAAAAA', '2019-03-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `fecha`) VALUES
(1, 'Sebastian', 'Sanchez', 'mail@sebastiansanchez.cl', '12345', '2019-03-21'),
(2, 'Belu', 'Manrique', 'belen@gmail.com', '54321', '2019-02-21'),
(3, 'Valen', 'Chavez', 'cachetes@outlook.com', '99885', '2020-01-01'),
(5, 'admin', 'admin', 'admin@admin.com', 'admin', '2019-03-21'),
(12, 'sebas', 'san', 'sebas@sebas.com', '$2y$04$.Cj.W9ouo4CZbC1DI3ZXu.r97f36COuY6O1f7tBqTr8i/RvSEyBea', '2019-03-22'),
(13, '\'dsfsdf\'', 'dsfksñkl\'gfdgdf', 's@ssssss.com', '$2y$04$Ni7I1WbS5g3Db9uAsrJhwOewP0UbZ..83WJOKS3rUEOMt23KRdU4W', '2019-03-22'),
(15, 'qweuqwoieuqwoeiuqoweuo', 'wer', 'qwporiwpeoriwpe@eriwepor.com', '$2y$04$Hvy3kJHjDm52xrCzLRjlT.3PK/LqW4.JLLr3AuUdlXCYKEs5B2hU2', '2019-03-22'),
(18, 'fsfsdf', 'sdfsdf', 'dsfsdfsd@xn--sadlkasdlasfd-jkbg.com', '$2y$04$WspheugWaatfat7Sdm.ASOOwTobgcuMbN0FioZmpB00QgrrM6Fgw2', '2019-03-23'),
(19, 'belen', 'manrque', 'mariab@gmail.com', '$2y$04$ygPQPoY69gFE/.89AQOMkOFnhjMdQtTHsC0mW.I13/XpvGnSfHBBC', '2019-03-23'),
(20, 'hola', 'bicho', 'hola@hola.com', '$2y$04$S2FN2W2qtAfY76Be.JlZbOrrgjtmv1.pd.kRTT6Tgh/EEDp02Fd9a', '2019-03-26'),
(21, 'testa', 'testa', 'testa@test.com', '$2y$04$7fWGT3csKD9BDPiZJzpJQebF.pwBUpC6bf00.5Og/66tOV9kR9gBy', '2019-03-26');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
