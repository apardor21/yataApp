-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2026 a las 03:44:12
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
-- Base de datos: `yataappdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `medicamentos` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `nombre`, `medicamentos`, `created_at`) VALUES
(1, 'asdasd', 'asdasdas', '2026-02-18 02:15:24'),
(2, 'HUYE PERRO', 'ESCRIBE LO QUE QUIERAS AQUI CON MORAL QUE EL PERRO TE AYUDA', '2026-02-18 02:29:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `nombre_paciente` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `diagnostico` text NOT NULL,
  `medicamentos` text NOT NULL,
  `indicaciones` text NOT NULL,
  `fecha` date NOT NULL,
  `medico` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `diagnostico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `nombre_paciente`, `cedula`, `edad`, `diagnostico`, `medicamentos`, `indicaciones`, `fecha`, `medico`, `created_at`, `diagnostico_id`) VALUES
(1, 'EL PERRO COCOTERO', '1002343421', 30, '', '', 'hacer ejercicio sino lo matan\r\nhacer caso sino lo matan\r\nportarse bien sino lo matan', '2026-02-17', 'la dra moñoño', '2026-02-18 01:52:50', NULL),
(2, 'EL PERRO BRAVO', '100236565', 31, 'RESERVADO POR BOOKING', 'DOLARES, EUROS, DINNAR KWUATI', 'DORMIR Y TOMAR LECHE', '2026-02-17', 'la dra moñoño', '2026-02-18 02:28:30', NULL),
(3, 'Lo MOÑOÑO', '100717078', 26, 'Pelea Severa', 'NADA NO HAY CURA ', 'TRATAR BIEN AL PERRO', '2000-08-12', 'Dr Perro ', '2026-02-18 02:42:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `rol` enum('admin','medico') DEFAULT 'medico',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre_completo`, `rol`, `created_at`) VALUES
(1, 'admin', '$2y$10$FAMbeBfmGlaFbjsibnsoguYUOoW4Uo1EnNSePp2u1r6PUjdD0eN/q', 'Administrador General', 'admin', '2026-02-18 01:03:55'),
(2, 'yatadmin', '$2y$10$m82BfL9r45YPXOy88ortGe2eAHXV9vEq8xE6U4r36BYcOo9bEyXNq', 'Dayanne Michelle Tortello Vazquez', 'admin', '2026-02-18 01:32:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnostico_id` (`diagnostico_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
