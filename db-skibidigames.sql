-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2024 a las 01:50:29
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
-- Base de datos: `db-skibidigames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `developers`
--
-- Creación: 09-10-2024 a las 21:18:36
-- Última actualización: 09-10-2024 a las 23:34:26
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `developers`:
--

--
-- Volcado de datos para la tabla `developers`
--

INSERT INTO `developers` (`id`, `name`) VALUES
(1, 'Bandai'),
(2, 'Insomniac'),
(3, 'Rockstar Games'),
(4, 'Santa Monica Studios'),
(5, 'Naughty Dog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--
-- Creación: 09-10-2024 a las 23:05:26
-- Última actualización: 09-10-2024 a las 23:36:09
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `release-date` date NOT NULL,
  `genre` varchar(255) NOT NULL,
  `id-developer` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `games`:
--   `id-developer`
--       `developers` -> `id`
--

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `release-date`, `genre`, `id-developer`, `image`) VALUES
(2, 'Dragon Ball: Sparking Zero', 'DRAGON BALL: Sparking! ZERO lleva a un nuevo nivel el legendario estilo de juego de la serie Budokai Tenkaichi. Aprende a dominar a diversos personajes jugables, cada uno con sus habilidades, transformaciones y técnicas propias. Libera tu espíritu de lucha y pelea en escenarios que se derrumban y reaccionan a tu poder a medida que el combate se recrudece.', '2024-10-10', 'Arena Fighter', 1, 'https://image.api.playstation.com/vulcan/ap/rnd/202405/2216/e6550a5a29624aee479b088bbefa4abc0097dc9253bca3d0.png'),
(5, 'Marvel\'s Spider-Man', 'En Marvel’s Spider-Man Remasterizado, la vida de Peter Parker se topa con la de Spider-Man en una historia original repleta de acción. Ponte en la piel de un Peter Parker veterano que ha pulido sus habilidades en la lucha contra el crimen y los villanos en la Nueva York de Marvel.', '2023-10-18', 'Accion', 2, 'https://www.metacritic.com/a/img/catalog/provider/6/12/6-1-875875-52.jpg'),
(6, 'Grand Theft Auto V', 'Grand Theft Auto V es un videojuego de acción-aventura de mundo abierto desarrollado por Rockstar North y distribuido por Rockstar Games. Este título revolucionario hizo su debut el 17 de septiembre de 2013 en las consolas Xbox 360 y PlayStation 3.', '2014-10-22', 'Accion', 3, 'https://media.vandal.net/m/15191/20134794215_1.jpg'),
(7, 'God of War', 'God of War es un videojuego de acción-aventura hack and slash en tercera persona desarrollado por SCE Santa Monica Studio y publicado por Sony Interactive Entertainment. El juego se lanzó para PlayStation 4 en abril de 2018, con un puerto para Windows lanzado en enero de 2022.', '2019-10-03', 'Accion', 4, 'https://dixgamer.com/wp-content/uploads/2021/05/god-of-war-ps5.jpg'),
(8, 'The Last of Us Parte 1', 'The Last of Us Part I es un videojuego de acción y aventura de 2022 desarrollado por Naughty Dog y publicado por Sony Interactive Entertainment. Un remake del juego de 2013 The Last of Us, presenta una jugabilidad revisada, que incluye combate y exploración mejorados, y opciones de accesibilidad ampliadas.', '2020-10-02', 'Supervivencia', 5, 'https://cdn1.epicgames.com/offer/0c40923dd1174a768f732a3b013dcff2/EGS_TheLastofUsPartI_NaughtyDogLLC_S2_1200x1600-41d1b88814bea2ee8cb7986ec24713e0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-id-developer` (`id-developer`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk-id-developer` FOREIGN KEY (`id-developer`) REFERENCES `developers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
