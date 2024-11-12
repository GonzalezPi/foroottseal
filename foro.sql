-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2024 a las 01:56:42
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
-- Base de datos: `foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_temas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_temas`) VALUES
(1, 'Anime'),
(6, 'Bebidas'),
(5, 'Comida'),
(7, 'Educativo'),
(10, 'Literatura'),
(2, 'Musica'),
(4, 'Política'),
(9, 'Turismo'),
(8, 'Varios\r\n'),
(3, 'Videojuegos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_usuario` int(250) NOT NULL,
  `post_contenido` text NOT NULL,
  `post_titulo` text NOT NULL,
  `post_categoria` int(11) NOT NULL,
  `fecha_hora` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`post_id`, `post_usuario`, `post_contenido`, `post_titulo`, `post_categoria`, `fecha_hora`) VALUES
(53, 16, 'wu', 'werwrr', 7, '2024-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(200) NOT NULL,
  `usuario_email` varchar(200) NOT NULL,
  `usuario_contra` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usuario_id`, `usuario_nombre`, `usuario_email`, `usuario_contra`) VALUES
(9, 'sara', 'sara@gmail.com', '$2y$10$PEXrNPIdnB8tHB4wSAszF.S8Pn/EL77aGtBBVDbXiBLw9eMMZJsvK'),
(10, 'pepe', 'pepe@gmail.com', '$2y$10$3626PGdwZyfMjoPqwMKR3eA4cUpViSt1l0P6yC00eRt0nRvwFJQhm'),
(11, 'fer', 'fer@gmail.com', '$2y$10$l8x1.6Y1SaEidq41SXPrRuGcvwjgXLArVE95HhnKiGpSGFu7QHy7q'),
(12, 'sari', 'sara@gmail.com', '$2y$10$APy.fJy0R7C4xZxEEArO6OFkMPgqlT0DWa/7f8UoyxB34Zkna8lAa'),
(13, 'hola', 'pepito@gmail.com', '$2y$10$iWXvrx8TRIDRkWksTGQM7uGwiSadfbMKmieWL2DtobGw1Eu4oXfQ.'),
(14, 'sarita', 'jiji@gmail.com', '$2y$10$eEUGUccGwNCJDTA5GX2TY.SeVc74t6HR4F5C1QUC6LnDAD0j/057q'),
(15, 'pepito', 'pepito@gmail.com', '$2y$10$x1KwmBmNg.0I09ilLUefceJWYtXVpf.W3SXdDHJlCBB8dHYqg2Wdm'),
(16, 'papita', 'papita@gmail.com', '$2y$10$j2DM5NQogtrhFvJoT.6J4.JkdjpSdUaSw3HSnBtZBaQsFdX4cQ7Bm'),
(17, 'pipa', 'pipa@gmail.com', '$2y$10$SeZzq7BLJipdXaA2musEzODlEngcNLHlk83yygbFR1X7w6U49q/W.'),
(18, 'piagonzalez', 'piagonzalez@gmail.com', '$2y$10$g8DQ4Xp0thWjg4Eh5eVKY.mIgT6Vyw8LkT3qYtDuS90FZFw84KJAO'),
(19, 'piauwu', 'piagongmail.com', '$2y$10$q9WYq9oQ9PGaIgubjvzyYe/rC6iQ2mGw.KCGZUu/BchZw7LQT2MWe'),
(20, 'srsrss', '123', '$2y$10$XJlQGXb5pXaIPmcQ0AIEWeox/mypSkRPT1KsnEhI/eUP/WrJkldEu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`),
  ADD KEY `categoria_temas` (`categoria_temas`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `usuarios` (`post_usuario`),
  ADD KEY `post_usuario` (`post_usuario`),
  ADD KEY `post_usuario_2` (`post_usuario`),
  ADD KEY `post_usuario_3` (`post_usuario`),
  ADD KEY `post_categoria` (`post_categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_usuario` FOREIGN KEY (`post_usuario`) REFERENCES `users` (`usuario_id`),
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_categoria`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
