<?php
require_once 'config.php';
class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
        $this->_deploy();
    }
    private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END

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
-- Creación: 20-10-2024 a las 00:12:23
-- Última actualización: 20-10-2024 a las 01:13:41
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
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

INSERT INTO `games` (`id`, `title`, `description`, `id_genre`, `image`) VALUES
(2, 'Dragon Ball: Sparking Zero', 'DRAGON BALL: Sparking! ZERO lleva a un nuevo nivel el legendario estilo de juego de la serie Budokai Tenkaichi. Aprende a dominar a diversos personajes jugables, cada uno con sus habilidades, transformaciones y técnicas propias. Libera tu espíritu de lucha y pelea en escenarios que se derrumban y reaccionan a tu poder a medida que el combate se recrudece.', 2, 'https://images.g2a.com/300x400/1x1x1/dragon-ball-sparking-zero-deluxe-edition-pc-steam-key-emea-i10000506157047/51120bb921274747919bc3dd'),
(13, 'Geometry Dash', 'Geometry Dash es un videojuego de plataformas y videojuego rítmico creado en 2013 por el desarrollador sueco Robert Topala, y posteriormente desarrollado por su empresa independiente RobTop Games.', 11, 'https://images.g2a.com/300x400/1x1x1/geometry-dash-steam-key-global-i10000018369004/60266d2f7e696c59b00b0fd2'),
(14, 'Counter-Strike 2', 'Counter-Strike 2 es un videojuego de disparos táctico en primera persona multijugador de 2023 desarrollado y publicado por Valve. Es la quinta entrega principal de la serie Counter-Strike.', 12, 'https://images.g2a.com/300x400/1x1x1/counter-strike-2-prime-status-upgrade-pc-steam-account-global-i10000016291002/5e4e63f76c084a838f11d085'),
(15, 'The Last of Us Parte 1', 'The Last of Us Part I es un videojuego de acción y aventura de 2022 desarrollado por Naughty Dog y publicado por Sony Interactive Entertainment. Un remake del juego de 2013 The Last of Us, presenta una jugabilidad revisada, que incluye combate y exploración mejorados, y opciones de accesibilidad ampliadas.', 8, 'https://images.g2a.com/300x400/1x1x1/the-last-of-us-part-i-pc-steam-key-global-i10000326425006/ef73efe282954a74ab9bb70f'),
(16, 'Marvel\'s Spider-Man', 'Marvel\'s Spider-Man es un videojuego de acción-aventura de mundo abierto desarrollado por Insomniac Games y publicado por Sony Interactive Entertainment.', 13, 'https://images.g2a.com/300x400/1x1x1/marvels-spider-man-remastered-pc-steam-key-global-i10000302546004/7e4252006f11418bae232b83'),
(17, 'God of War', 'God of War es un videojuego de acción-aventura hack and slash en tercera persona desarrollado por SCE Santa Monica Studio y publicado por Sony Interactive Entertainment. El juego se lanzó para PlayStation 4 en abril de 2018, con un puerto para Windows lanzado en enero de 2022.', 13, 'https://images.g2a.com/300x400/1x1x1/god-of-war-pc-steam-key-global-i10000152407005/98c4f59fc39f44aaa432445e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--
-- Creación: 20-10-2024 a las 00:12:04
-- Última actualización: 20-10-2024 a las 01:12:08
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
(2, 'Arena fighter'),
(8, 'Supervivencia'),
(11, 'Ritmico'),
(12, 'Tactital Shooter'),
(13, 'Accion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 20-10-2024 a las 00:12:04
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `fk-id-genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

COMMIT;
END;
            $this->db->query($sql);
        }
    }
}
