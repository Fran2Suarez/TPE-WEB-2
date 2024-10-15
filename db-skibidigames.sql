-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 00:01:14
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
-- Estructura de tabla para la tabla `games`
--
-- Creación: 15-10-2024 a las 20:13:56
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `release-date` date NOT NULL,
  `id_genre` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `games`:
--   `id_genre`
--       `genre` -> `id_genre`
--

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `release-date`, `id_genre`, `image`) VALUES
(2, 'Dragon Ball: Sparking Zero', 'DRAGON BALL: Sparking! ZERO lleva a un nuevo nivel el legendario estilo de juego de la serie Budokai Tenkaichi. Aprende a dominar a diversos personajes jugables, cada uno con sus habilidades, transformaciones y técnicas propias. Libera tu espíritu de lucha y pelea en escenarios que se derrumban y reaccionan a tu poder a medida que el combate se recrudece.', '2024-10-10', 2, 'https://images.g2a.com/300x400/1x1x1/dragon-ball-sparking-zero-deluxe-edition-pc-steam-key-emea-i10000506157047/51120bb921274747919bc3dd'),
(5, 'Marvel\'s Spider-Man', 'En Marvel’s Spider-Man Remasterizado, la vida de Peter Parker se topa con la de Spider-Man en una historia original repleta de acción. Ponte en la piel de un Peter Parker veterano que ha pulido sus habilidades en la lucha contra el crimen y los villanos en la Nueva York de Marvel.', '2023-10-18', 1, 'https://images.g2a.com/300x400/1x1x1/marvels-spider-man-remastered-pc-steam-key-global-i10000302546004/7e4252006f11418bae232b83'),
(6, 'Grand Theft Auto V', 'Grand Theft Auto V es un videojuego de acción-aventura de mundo abierto desarrollado por Rockstar North y distribuido por Rockstar Games. Este título revolucionario hizo su debut el 17 de septiembre de 2013 en las consolas Xbox 360 y PlayStation 3.', '2014-10-22', 1, 'https://images.g2a.com/300x400/1x1x1/grand-theft-auto-v-rockstar-key-global-i10000000788017/59e5efeb5bafe304c4426c47'),
(7, 'God of War', 'God of War es un videojuego de acción-aventura hack and slash en tercera persona desarrollado por SCE Santa Monica Studio y publicado por Sony Interactive Entertainment. El juego se lanzó para PlayStation 4 en abril de 2018, con un puerto para Windows lanzado en enero de 2022.', '2019-10-03', 1, 'https://images.g2a.com/300x400/1x1x1/god-of-war-pc-steam-key-global-i10000152407005/98c4f59fc39f44aaa432445e'),
(8, 'The Last of Us Parte 1', 'The Last of Us Part I es un videojuego de acción y aventura de 2022 desarrollado por Naughty Dog y publicado por Sony Interactive Entertainment. Un remake del juego de 2013 The Last of Us, presenta una jugabilidad revisada, que incluye combate y exploración mejorados, y opciones de accesibilidad ampliadas.', '2020-10-02', 4, 'https://images.g2a.com/300x400/1x1x1/the-last-of-us-part-i-pc-steam-key-global-i10000326425006/ef73efe282954a74ab9bb70f'),
(9, 'Counter-Strike 2', 'Counter-Strike 2 es un videojuego de disparos táctico en primera persona multijugador de 2023 desarrollado y publicado por Valve. Es la quinta entrega principal de la serie Counter-Strike.', '2023-10-20', 5, 'https://images.g2a.com/300x400/1x1x1/counter-strike-2-prime-status-upgrade-pc-steam-account-global-i10000016291002/5e4e63f76c084a838f11d085');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--
-- Creación: 15-10-2024 a las 20:41:05
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `genre`:
--

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id_genre`, `genre_name`) VALUES
(1, 'Accion'),
(2, 'Arena fighter'),
(4, 'Supervivencia'),
(5, 'Tactical shooter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 15-10-2024 a las 20:44:39
-- Última actualización: 15-10-2024 a las 21:56:37
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `users`:
--

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user`, `password`) VALUES
(1, 'webadmin', '$2y$10$jWQVRTbh1CVWv/ocIhTW8eYWAdiFrMFbVF4BG.YJSiYJlTClNCUl.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-id-genre` (`id_genre`);

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk-id-genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
