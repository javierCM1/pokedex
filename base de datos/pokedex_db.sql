-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2024 a las 02:40:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id_pokemon` int(4) NOT NULL,
  `uuid_pokemon` varchar(13) NOT NULL,
  `img_pokemon` varchar(256) DEFAULT NULL,
  `nombre_pokemon` varchar(64) NOT NULL,
  `descripcion_pokemon` varchar(512) DEFAULT NULL,
  `id_tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id_pokemon`, `uuid_pokemon`, `img_pokemon`, `nombre_pokemon`, `descripcion_pokemon`, `id_tipo`) VALUES
(2, 'bf3d2a769acd4', 'imagenes/bulbasaur.png', 'Bulbasaur', 'Bulbasaur tiene la habilidad de absorber energía solar gracias a la planta en su espalda. Es de tipo Planta y se caracteriza por su relación con la naturaleza.', 2),
(3, '123', 'imagenes/squirtle.png', 'Squirtle', 'Squirtle es un Pokémon tipo Agua. Su caparazón sirve para protegerse de ataques y su capacidad de disparar agua es destacada.', 4),
(4, '1bcd3e4978e61', 'imagenes/geodude.png', 'Geodude', 'Geodude es de tipo Tierra y Roca. Su cuerpo duro le permite resistir golpes, y su afinidad por las montañas lo hace difícil de encontrar en zonas llanas.', 3),
(5, 'f1a94c6473f18', 'imagenes/charizard.png', 'Charizard', 'Charizard es la evolución final de Charmander. Este Pokémon de tipo Fuego y Volador tiene la capacidad de lanzar potentes llamaradas.', 1),
(6, 'cc5e9f2687e13', 'imagenes/venusaur.png', 'Venusaur', 'Venusaur es la evolución final de Bulbasaur. Su gran tamaño y su planta en la espalda le permiten utilizar el poder de la naturaleza a su favor.', 2),
(7, 'be9d4b6d7c4a9', 'imagenes/blastoise.png', 'Blastoise', 'Blastoise es la evolución final de Squirtle. Sus cañones de agua en el caparazón le permiten lanzar chorros de agua a gran presión.', 4),
(8, 'af5c3d8712bf2', 'imagenes/onyx.png', 'Onix', 'Onix es un Pokémon de tipo Tierra y Roca. Su cuerpo gigante de piedras le da gran resistencia y su capacidad de excavar lo hace imparable bajo tierra.', 3),
(9, '66f303cdf1777', 'imagenes/vulpix.png', 'Vulpix', 'Vulpix es un pokemon', 1),
(10, '66e5fa249fa49', 'imagenes/charmander.png', 'Charmander', 'Charmander es un pequeño lagarto bípedo. Sus características de fuego son resaltadas por su color de piel anaranjado y su cola con la punta envuelta en llamas.', 1),
(11, '66f33a8349f6a', 'imagenes/gyarados.png', 'Gyarados ', 'Cuando aparece, monta en cólera. No deja de estar furioso hasta que lo destruye todo.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(2) NOT NULL,
  `descripcion_tipo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `descripcion_tipo`) VALUES
(1, 'Fuego'),
(2, 'Planta'),
(3, 'Tierra'),
(4, 'Agua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `rol`) VALUES
(1, 'admin', '1234', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id_pokemon`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id_pokemon` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
