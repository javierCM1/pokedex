
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 23:13:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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

CREATE TABLE pokemon (
  id_pokemon int(4) NOT NULL AUTO_INCREMENT,
  uuid_pokemon varchar(13) NOT NULL,
  img_pokemon varchar(256) DEFAULT NULL,
  nombre_pokemon varchar(64) NOT NULL,
  descripcion_pokemon varchar(512) DEFAULT NULL,
  id_tipo int(2) NOT NULL,
  PRIMARY KEY (id_pokemon)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`uuid_pokemon`, `img_pokemon`, `nombre_pokemon`, `descripcion_pokemon`, `id_tipo`) VALUES
('66e5fa249fa49', 'imagenes/charmander.png', 'Charmander', 'Charmander es un pequeño lagarto bípedo. Sus características de fuego son resaltadas por su color de piel anaranjado y su cola con la punta envuelta en llamas.', 1),
('bf3d2a769acd4', 'imagenes/bulbasaur.png', 'Bulbasaur', 'Bulbasaur tiene la habilidad de absorber energía solar gracias a la planta en su espalda. Es de tipo Planta y se caracteriza por su relación con la naturaleza.', 2),
('9cfa3a68b5df1', 'imagenes/squirtle.png', 'Squirtle', 'Squirtle es un Pokémon tipo Agua. Su caparazón sirve para protegerse de ataques y su capacidad de disparar agua es destacada.', 4),
('1bcd3e4978e61', 'imagenes/geodude.png', 'Geodude', 'Geodude es de tipo Tierra y Roca. Su cuerpo duro le permite resistir golpes, y su afinidad por las montañas lo hace difícil de encontrar en zonas llanas.', 3),
('f1a94c6473f18', 'imagenes/charizard.png', 'Charizard', 'Charizard es la evolución final de Charmander. Este Pokémon de tipo Fuego y Volador tiene la capacidad de lanzar potentes llamaradas.', 1),
('cc5e9f2687e13', 'imagenes/venusaur.png', 'Venusaur', 'Venusaur es la evolución final de Bulbasaur. Su gran tamaño y su planta en la espalda le permiten utilizar el poder de la naturaleza a su favor.', 2),
('be9d4b6d7c4a9', 'imagenes/blastoise.png', 'Blastoise', 'Blastoise es la evolución final de Squirtle. Sus cañones de agua en el caparazón le permiten lanzar chorros de agua a gran presión.', 4),
('af5c3d8712bf2', 'imagenes/onyx.png', 'Onix', 'Onix es un Pokémon de tipo Tierra y Roca. Su cuerpo gigante de piedras le da gran resistencia y su capacidad de excavar lo hace imparable bajo tierra.', 3),
('ec7f2b1973cd8', 'imagenes/vulpix.png', 'Vulpix', 'Vulpix es un pequeño Pokémon de tipo Fuego. Sus seis colas le otorgan gran flexibilidad y sus ataques de fuego pueden variar en intensidad.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion_tipo` varchar(32) NOT NULL,
  PRIMARY KEY (id_tipo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`descripcion_tipo`) VALUES
('Fuego'),
('Planta'),
('Tierra'),
('Agua');

-- --------------------------------------------------------

--
-- Relaciones entre las tablas
--

ALTER TABLE `pokemon`
  ADD CONSTRAINT `pokemon_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);

--
-- Ajuste de AUTO_INCREMENT de la tabla pokemon
--

ALTER TABLE `pokemon`
  MODIFY `id_pokemon` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
