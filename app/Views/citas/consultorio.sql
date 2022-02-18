-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2022 a las 15:32:10
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion_cita` varchar(200) NOT NULL,
  `hora` time NOT NULL DEFAULT current_timestamp(),
  `fecha_ini` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime NOT NULL DEFAULT current_timestamp(),
  `estado_cita` varchar(20) DEFAULT NULL,
  `btn` varchar(11) NOT NULL DEFAULT 'btn-danger',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`,`id_usuario`),
ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;
--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_usuario`, `descripcion_cita`, `hora`, `fecha_ini`, `fecha_fin`, `estado_cita`, `btn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Caries de leche', '16:00:00', '2022-02-17 12:00:00', '2022-02-17 21:25:31', 'pendiente', 'btn-primary', '2022-02-10 06:07:05', '2022-02-10 06:07:05', NULL),
(2, 2, 'Dolor de muela', '17:30:00', '2022-02-17 12:00:00', '2022-02-17 21:25:31', 'pendiente', 'btn-primary', '2022-02-10 06:01:32', '2022-02-10 06:01:32', NULL),
(3, 4, 'Caries', '17:00:00', '2022-02-16 08:22:00', '2022-02-17 21:25:31', 'pendiente', 'btn-primary', '2022-02-10 06:09:12', '2022-02-10 06:09:12', NULL),
(4, 4, 'dolor de muelas dobles', '14:00:00', '2022-02-16 13:00:00', '2022-02-17 21:25:31', 'pendiente', 'btn-primary', '2022-02-17 02:29:07', '2022-02-17 02:29:07', NULL),
(13, 1, 'Duele muela mucho', '00:00:05', '2022-02-19 05:37:00', '2022-02-19 05:37:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(14, 1, 'ggggggggggggg', '00:00:10', '2022-02-18 10:35:00', '2022-02-18 10:35:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(15, 1, 'fffffffffffff', '00:00:14', '2022-02-18 14:41:00', '2022-02-18 14:41:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(16, 1, 'gatos', '00:00:18', '2022-02-18 18:00:00', '2022-02-18 18:00:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(17, 2, 'perros', '02:34:53', '2022-02-19 02:32:00', '2022-02-19 02:32:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(18, 2, 'Elefantes', '02:43:19', '2022-02-19 14:43:00', '2022-02-19 14:43:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(19, 2, 'Jirafa', '02:43:56', '2022-02-18 14:43:00', '2022-02-18 14:43:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(20, 2, 'Leon', '02:46:25', '2022-02-19 14:46:00', '2022-02-19 14:46:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(21, 1, 'leona', '02:47:28', '2022-02-19 02:47:00', '2022-02-19 02:47:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(22, 2, 'sdsdsdsd', '02:50:53', '2022-02-19 02:50:00', '2022-02-19 02:50:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(23, 2, 'eeeeeeee', '02:51:42', '2022-02-19 14:51:00', '2022-02-19 14:51:00', 'pendiente', 'btn-primary', NULL, NULL, NULL),
(24, 1, 'mmm', '08:18:21', '2022-02-18 08:18:00', '2022-02-18 08:18:00', 'cancelado', 'btn-dark', NULL, NULL, NULL),
(25, 12, 'Dolor mandibular', '00:00:09', '2022-02-18 09:29:00', '2022-02-18 09:29:00', 'pendiente', 'btn-danger', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_esp` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_profesional`
--

CREATE TABLE `esp_profesional` (
  `id_especialidad` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `nombres_log` varchar(50) DEFAULT NULL,
  `apellidos_log` varchar(50) DEFAULT NULL,
  `dni_log` varchar(10) DEFAULT NULL,
  `telefono_log` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idLogin`, `usuario`, `contrasena`, `rol`, `nombres_log`, `apellidos_log`, `dni_log`, `telefono_log`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'juan', '$2a$12$e2DYj8dt8A30PnoLsW2lH.CFV5.LjDSSI5o98bVl2OHsyS7NGNd2a', 'admin', 'Juan Alberto', 'Flores Pari', '75592078', '123456789', '2022-02-11 04:59:53', '2022-02-11 04:59:53', NULL),
(2, 'maria', '$2y$10$mHlaLBwiD2rU.dT47Jqp/.Ipi6Lp73boLnwOf12wPqFFrvbzmY.RW', 'admin', 'Maria', 'Montalico', '12345677', '987456123', '2022-02-10 23:14:36', '2022-02-10 23:14:36', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_sesion` int(11) NOT NULL,
  `id_tratamiento` int(11) NOT NULL,
  `id_tipoPago` int(11) NOT NULL,
  `cuota` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_cita`
--

CREATE TABLE `pre_cita` (
  `id_precita` int(11) NOT NULL,
  `DNI_pre` varchar(30) NOT NULL,
  `nombre_pre` varchar(100) NOT NULL,
  `apellido_pre` varchar(150) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `horario` time NOT NULL,
  `fecha` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `id_profesional` int(11) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(200) NOT NULL,
  `descripcion_servicio` varchar(300) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id_sesion` int(11) NOT NULL,
  `id_tratamiento` int(11) NOT NULL,
  `nombre_se` varchar(200) NOT NULL,
  `deuda` float NOT NULL,
  `costo` float NOT NULL,
  `cobrado` float NOT NULL,
  `fecha` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipoPago` int(11) NOT NULL,
  `nombre_pago` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `costo_inicial` float NOT NULL,
  `tiempo` int(11) NOT NULL,
  `descripcion_trata` varchar(300) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(30) NOT NULL,
  `nombre_usu` varchar(100) NOT NULL,
  `apellido_usu` varchar(150) NOT NULL,
  `sexo` varchar(5) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `DNI`, `nombre_usu`, `apellido_usu`, `sexo`, `telefono`, `correo`, `fecha`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '75593088', 'Fiorela', 'ReinagaMM', 'M', '944501952', 'pio@gmail.com', '2022-02-07', NULL, NULL, NULL),
(2, '75593089', 'Juan', 'Perez', 'H', '123456789', 'panda@gmail.com', '2022-02-06', NULL, NULL, NULL),
(3, '75593081', 'Juancho', 'Perez', 'H', '123456789', 'panda@gmail.com', '2022-02-07', NULL, NULL, NULL),
(4, '12345677', 'MariaMMMM', 'Suares', 'M', '1234556111', 'pedro@gmail.com', '2022-02-08', NULL, NULL, NULL),
(5, '113456878', 'Mario', 'Gab', 'H', '123456789', 'sadasd@gmail.com', '2022-02-08', NULL, NULL, NULL),
(6, '12345678', 'juan', 'Suares', 'H', '1234556111', 'cuack@gmail.com', '2022-02-08', NULL, NULL, NULL),
(7, '12312378', 'jk', 'df', 'M', '123456789', 'fg@gmail.com', '2022-02-08', NULL, NULL, NULL),
(8, '12312312', 'Caleb', 'Manch', 'H', '1123455678', 'gh@gmail.com', '2022-02-08', NULL, NULL, NULL),
(9, '45645678', 'Koren', 'Gambito', 'M', '123456789', 'dfgfgfg@gmail.com', '2022-02-08', NULL, NULL, NULL),
(12, '78653241', 'Karoline', 'Margaret', 'M', '987987321', 'karo@hotmail.com', '2022-02-10', '2022-02-10 23:23:16', '2022-02-10 23:23:16', NULL),
(13, '75592077', 'Juan', 'Flores', 'H', '944501941', 'mio@gmail.com', '2022-02-18', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `esp_profesional`
--
ALTER TABLE `esp_profesional`
  ADD PRIMARY KEY (`id_especialidad`,`id_profesional`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `dni_log` (`dni_log`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`,`id_sesion`,`id_tratamiento`),
  ADD KEY `id_sesion` (`id_sesion`),
  ADD KEY `id_tratamiento` (`id_tratamiento`),
  ADD KEY `id_tipoPago` (`id_tipoPago`);

--
-- Indices de la tabla `pre_cita`
--
ALTER TABLE `pre_cita`
  ADD PRIMARY KEY (`id_precita`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id_profesional`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id_sesion`,`id_tratamiento`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id_tipoPago`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pre_cita`
--
ALTER TABLE `pre_cita`
  MODIFY `id_precita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id_profesional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id_tipoPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `esp_profesional`
--
ALTER TABLE `esp_profesional`
  ADD CONSTRAINT `esp_profesional_ibfk_1` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`) ON UPDATE CASCADE,
  ADD CONSTRAINT `esp_profesional_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_sesion`) REFERENCES `sesion` (`id_sesion`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`id_tratamiento`) REFERENCES `sesion` (`id_tratamiento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`id_tipoPago`) REFERENCES `tipo_pago` (`id_tipoPago`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`id_tratamiento`) REFERENCES `tratamiento` (`id_tratamiento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tratamiento_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `esp_profesional` (`id_especialidad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tratamiento_ibfk_3` FOREIGN KEY (`id_profesional`) REFERENCES `esp_profesional` (`id_profesional`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tratamiento_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
