-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-03-2017 a las 15:40:55
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uady`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `carreras_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido_materno`, `apellido_paterno`, `carreras_id`) VALUES
(1, 'Ivan Eduardo', 'Chavez ', 'Chacón', 2),
(2, 'sdas', 'weqw', 'qwe', 2),
(3, 'sdas', 'weqw', 'qwe', 2),
(4, 'sdas', 'weqw', 'qwe', 2),
(5, 'sdas', 'weqw', 'qwe', 2),
(6, 'sdas', 'weqw', 'qwe', 2),
(7, 'sPepito', 'martinezs', 'cruzs', 2),
(8, 'Pepito', 'martinez', 'cruz', 4),
(9, 'Pepito', 'martinez', 'cruz', 4),
(10, 'Pepito', 'martinez', 'cruz', 4),
(11, 'Pepito', 'martinez', 'cruz', 4),
(12, 'pre', 'sda', 'sda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `Nombre`) VALUES
(1, 'Contador Público'),
(2, 'Administración y Tecnologías de la Información'),
(3, 'Mercadotecnia y Negocios Internacionales'),
(4, 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_empresa`
--

CREATE TABLE `clasificacion_empresa` (
  `id` int(11) NOT NULL,
  `clasificacion` varchar(45) DEFAULT NULL,
  `numeros` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificacion_empresa`
--

INSERT INTO `clasificacion_empresa` (`id`, `clasificacion`, `numeros`) VALUES
(1, 'Micro', '0 - 10'),
(2, 'Pequeña', '11 - 49'),
(3, 'Mediana', '50 - 250'),
(4, 'Gran Empresa', '250 >');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `depto` varchar(255) DEFAULT NULL,
  `empresas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `correo`, `telefono`, `depto`, `empresas_id`) VALUES
(1, 'Ivan contacto', 'contacto@hotmail.com', '99999', 'Informática', 9),
(2, 'Ivan contacto', 'contacto@hotmail.com', '99999', 'Informática', 9),
(3, 'Ivan contacto', 'contacto@hotmail.com', '99999', 'Informática', 9),
(4, 'ivan', 's@hotmail.com', '22828', 'prensa', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `giro_id` int(11) NOT NULL DEFAULT '1',
  `calle` varchar(255) DEFAULT NULL,
  `num_inter` varchar(255) DEFAULT NULL,
  `num_exter` varchar(255) DEFAULT NULL,
  `cruzamientos` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `clasificacion_empresa_id` int(11) NOT NULL DEFAULT '1',
  `nombre_comercial` varchar(255) DEFAULT NULL,
  `nombre_razon_social` varchar(255) DEFAULT NULL,
  `entidades_id` int(11) NOT NULL DEFAULT '31',
  `sector_id` int(11) NOT NULL DEFAULT '1',
  `subsector_id` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre_empresa`, `giro_id`, `calle`, `num_inter`, `num_exter`, `cruzamientos`, `colonia`, `cp`, `clasificacion_empresa_id`, `nombre_comercial`, `nombre_razon_social`, `entidades_id`, `sector_id`, `subsector_id`) VALUES
(2, 'Mayuquita', 2, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Mayuquita botanas', 'Mayuquita sa', 9, 2, 3),
(9, 'Registro Empresa', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(10, 'Registro Empresa', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(11, 'Registro Empresa2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(12, '3Registro Empresa2', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(13, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(14, 'Empresa nueva creacion', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(15, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(16, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(17, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(18, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(19, 'peluchini', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(20, 'veamos', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 31, 1, 3),
(21, 'nuevo empresa', 4, '87', '28', '281', '57 y 54', NULL, '97000', 3, 'nueva empresa botana', 'nueva empresa sa de cv', 10, 2, 5),
(22, 'nuevo empresa', 4, '87', '28', '281', '57 y 54', 'centro', '97000', 3, 'nueva empresa botana', 'nueva empresa sa de cv', 10, 2, 5),
(23, 'nuevo empresa', 4, '87', '28', '281', '57 y 54', 'centro', '97000', 3, 'nueva empresa botana', 'nueva empresa sa de cv', 10, 2, 5),
(24, 'nuevo empresa', 4, '87', '28', '281', '57 y 54', 'centro', '97000', 3, 'nueva empresa botana', 'nueva empresa sa de cv', 10, 2, 5),
(25, '', 2, '', '', '', '', '', '', 1, '', '', 1, 1, 3),
(26, '', 2, '', '', '', '', '', '', 1, '', '', 1, 1, 3),
(27, '234', 6, 'werwe', 'w3242', '234', 'we', 'ceb', '97000', 4, 'nueva empresa botana 2', '2 nueva empresa sa de cv', 32, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `nombre_abre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id`, `nombre`, `nombre_abre`) VALUES
(1, 'Aguascalientes', 'Ags.'),
(2, 'Baja California', 'BC'),
(3, 'Baja California Sur', 'BCS'),
(4, 'Campeche', 'Camp.'),
(5, 'Coahuila de Zaragoza', 'Coah.'),
(6, 'Colima', 'Col.'),
(7, 'Chiapas', 'Chis.'),
(8, 'Chihuahua', 'Chih.'),
(9, 'Distrito Federal', 'DF'),
(10, 'Durango', 'Dgo.'),
(11, 'Guanajuato', 'Gto.'),
(12, 'Guerrero', 'Gro.'),
(13, 'Hidalgo', 'Hgo.'),
(14, 'Jalisco', 'Jal.'),
(15, 'México', 'Mex.'),
(16, 'Michoacán de Ocampo', 'Mich.'),
(17, 'Morelos', 'Mor.'),
(18, 'Nayarit', 'Nay.'),
(19, 'Nuevo León', 'NL'),
(20, 'Oaxaca', 'Oax.'),
(21, 'Puebla', 'Pue.'),
(22, 'Querétaro', 'Qro.'),
(23, 'Quintana Roo', 'Q. Roo'),
(24, 'San Luis Potosí', 'SLP'),
(25, 'Sinaloa', 'Sin.'),
(26, 'Sonora', 'Son.'),
(27, 'Tabasco', 'Tab.'),
(28, 'Tamaulipas', 'Tamps.'),
(29, 'Tlaxcala', 'Tlax.'),
(30, 'Veracruz de Ignacio de la Llave', 'Ver.'),
(31, 'Yucatán', 'Yuc.'),
(32, 'Zacatecas', 'Zac.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro`
--

CREATE TABLE `giro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `giro`
--

INSERT INTO `giro` (`id`, `nombre`, `status`) VALUES
(1, 'Comerciales', 2),
(2, 'Agricultura', 1),
(3, 'Servicios', 1),
(4, 'Hotelero', 1),
(5, 'Frecuencia', 1),
(6, 'blabla', 1),
(7, 'prueba', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicas_profesionales`
--

CREATE TABLE `practicas_profesionales` (
  `id` int(11) NOT NULL,
  `empresas_id` int(11) NOT NULL,
  `representante` varchar(255) DEFAULT NULL,
  `tipo_practica_id` int(11) NOT NULL,
  `registroCP` varchar(255) DEFAULT NULL,
  `practica_inicio` date DEFAULT NULL,
  `practica_fin` date DEFAULT NULL,
  `constancia` varchar(45) DEFAULT NULL,
  `info` text,
  `Alumnos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `practicas_profesionales`
--

INSERT INTO `practicas_profesionales` (`id`, `empresas_id`, `representante`, `tipo_practica_id`, `registroCP`, `practica_inicio`, `practica_fin`, `constancia`, `info`, `Alumnos_id`) VALUES
(1, 2, 'Pa', 1, 'a', '0000-00-00', '0000-00-00', 'wq', 'as', 6),
(2, 2, 'Don Pepes', 1, '1231213', '2017-03-16', '2017-03-17', '1', 'Cancelado', 7),
(3, 2, 'Don Pepe', 2, '1231213', '2017-03-20', '2017-03-20', '1', 'Cancelado', 9),
(4, 2, 'Don Pepe', 2, '1231213', '2017-03-01', '2017-04-27', '1', 'Cancelado', 10),
(5, 2, 'Don Pepe', 2, '1231213', '2017-03-01', '2017-04-27', '1', 'Cancelado', 11),
(6, 2, 'joselo', 3, '281', '2017-03-02', '2017-07-06', '2', 'no lo se', 7),
(7, 19, 'joselo', 1, '01993', '2017-03-31', '2017-03-31', '2', 'asa', 7),
(9, 9, 'we', 1, 'rw', '2017-03-20', '2017-03-20', '342', 'ff', 7),
(10, 20, 'w', 1, 'qwe', '2017-03-20', '2017-03-20', 'q', 'q', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `nombre`, `status`) VALUES
(1, 'Agropecuario', 1),
(2, 'Industrial', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsector`
--

CREATE TABLE `subsector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `sector_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subsector`
--

INSERT INTO `subsector` (`id`, `nombre`, `sector_id`) VALUES
(3, 'Agricultura', 1),
(4, 'Ganaderia', 1),
(5, 'Aplicultor', 1),
(6, 'Pecuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_practica`
--

CREATE TABLE `tipo_practica` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_practica`
--

INSERT INTO `tipo_practica` (`id`, `Nombre`) VALUES
(1, 'Depedencias'),
(2, 'Despachos'),
(3, 'Empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Prácticas Profesionales'),
(3, 'CEDENE'),
(4, 'Educación Continua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_p` varchar(255) DEFAULT NULL,
  `apellido_m` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido_p`, `apellido_m`, `usuario`, `password`, `tipo_usuario_id`, `status`) VALUES
(1, 'Ivan Eduardo', 'Chavez', 'Chacon', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`,`carreras_id`),
  ADD KEY `fk_Alumnos_carreras1_idx` (`carreras_id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clasificacion_empresa`
--
ALTER TABLE `clasificacion_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`,`giro_id`,`clasificacion_empresa_id`,`entidades_id`,`sector_id`,`subsector_id`),
  ADD KEY `fk_empresas_giro1_idx` (`giro_id`),
  ADD KEY `fk_empresas_entidades1_idx` (`entidades_id`),
  ADD KEY `fk_empresas_clasificacion_empresa1_idx` (`clasificacion_empresa_id`),
  ADD KEY `fk_empresas_sector1_idx` (`sector_id`),
  ADD KEY `fk_empresas_subsector1_idx` (`subsector_id`),
  ADD KEY `giro_id` (`giro_id`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giro`
--
ALTER TABLE `giro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `practicas_profesionales`
--
ALTER TABLE `practicas_profesionales`
  ADD PRIMARY KEY (`id`,`empresas_id`,`tipo_practica_id`,`Alumnos_id`),
  ADD KEY `fk_practicas_profesionales_empresas1_idx` (`empresas_id`),
  ADD KEY `fk_practicas_profesionales_tipo_practica1_idx` (`tipo_practica_id`),
  ADD KEY `fk_practicas_profesionales_Alumnos1_idx` (`Alumnos_id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subsector`
--
ALTER TABLE `subsector`
  ADD PRIMARY KEY (`id`,`sector_id`),
  ADD KEY `fk_subsector_sector1_idx` (`sector_id`);

--
-- Indices de la tabla `tipo_practica`
--
ALTER TABLE `tipo_practica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`,`tipo_usuario_id`),
  ADD KEY `fk_usuarios_tipo_usuario_idx` (`tipo_usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clasificacion_empresa`
--
ALTER TABLE `clasificacion_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `giro`
--
ALTER TABLE `giro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `practicas_profesionales`
--
ALTER TABLE `practicas_profesionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `subsector`
--
ALTER TABLE `subsector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_practica`
--
ALTER TABLE `tipo_practica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_Alumnos_carreras1` FOREIGN KEY (`carreras_id`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresas_clasificacion_empresa1` FOREIGN KEY (`clasificacion_empresa_id`) REFERENCES `clasificacion_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresas_entidades1` FOREIGN KEY (`entidades_id`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresas_giro1` FOREIGN KEY (`giro_id`) REFERENCES `giro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresas_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empresas_subsector1` FOREIGN KEY (`subsector_id`) REFERENCES `subsector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `practicas_profesionales`
--
ALTER TABLE `practicas_profesionales`
  ADD CONSTRAINT `fk_practicas_profesionales_Alumnos1` FOREIGN KEY (`Alumnos_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_practicas_profesionales_empresas1` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_practicas_profesionales_tipo_practica1` FOREIGN KEY (`tipo_practica_id`) REFERENCES `tipo_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subsector`
--
ALTER TABLE `subsector`
  ADD CONSTRAINT `fk_subsector_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_tipo_usuario` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
