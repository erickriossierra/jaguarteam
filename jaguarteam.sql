-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2018 a las 18:01:08
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jaguarteam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `siglas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id`, `nombre`, `siglas`) VALUES
(1, 'Sin asignar', 'S/A'),
(2, 'Facultad de Derecho', 'FD'),
(3, 'Facultad de Contaduría y Administración', 'FCA'),
(4, 'Facultad de Psicología', 'FP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus2`
--

CREATE TABLE `campus2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `siglas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campus2`
--

INSERT INTO `campus2` (`id`, `nombre`, `siglas`) VALUES
(1, 'Sin asignar', 'S/A'),
(2, 'Campus de Ciencias Exactas e Ingenieras', 'CCEI'),
(3, 'Campus de Ciencias Sociales y Humanidades ', 'CCSH'),
(4, 'Campus de Ciencias de la Salud', 'CCS');

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
(1, 'Lic. Contador Público'),
(2, 'Lic. Administración y Tecnologías de la Información'),
(3, 'Lic. Mercadotecnia y Negocios Internacionales'),
(4, 'Lic. Administración'),
(5, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cli` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `id_sex` int(11) NOT NULL,
  `id_esc` int(11) NOT NULL,
  `id_carr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `Nombre`, `Telefono`, `Correo`, `id_sex`, `id_esc`, `id_carr`) VALUES
(1, 'Oscar Armando Gómez Castro', '9999956349', 'N/A', 1, 3, 1),
(2, 'Erick Ríos Sierra', '9238370', 'er@gm.com', 1, 3, 2),
(3, 'Jesús Dzib Couoh', '9981914105', 'Gearsmine85@gmail.com', 1, 3, 3),
(4, 'Ricardo Angel Uh Cupul', '9983409291', 'N/A', 1, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL,
  `Nombre_color` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `Nombre_color`) VALUES
(1, 'Azul Marino'),
(2, 'Aqua'),
(3, 'Blanco'),
(4, 'Celeste'),
(5, 'Coral'),
(6, 'Fuscia'),
(7, 'Gris Jaspe'),
(8, 'Mango'),
(9, 'Negro'),
(10, 'Rojo'),
(11, 'Vino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id_est` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id_est`, `tipo`) VALUES
(1, 'Pagado'),
(2, 'Si anticipo'),
(3, 'No anticipo'),
(4, 'En proceso'),
(5, 'Cancelado'),
(6, 'Terminado'),
(7, 'Anticipo'),
(8, 'Saldo'),
(9, 'Saldo Total');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id_inv` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_tc` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_ponD` int(11) NOT NULL,
  `id_ponT` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id_inv`, `id_tipo`, `id_tc`, `id_talla`, `id_color`, `id_ponD`, `id_ponT`, `cantidad`) VALUES
(1, 1, 1, 2, 1, 1, 1, 25),
(2, 1, 1, 1, 1, 1, 1, 10),
(3, 1, 1, 3, 1, 1, 1, 10),
(4, 1, 1, 4, 1, 1, 1, 10),
(5, 1, 1, 5, 1, 1, 1, 10),
(6, 1, 1, 6, 1, 1, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_ped` int(11) NOT NULL,
  `id_est` int(11) NOT NULL,
  `Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_ped`, `id_est`, `Total`) VALUES
(1, 4, 7, NULL),
(2, 2, 7, NULL),
(3, 5, 7, NULL),
(4, 3, 7, NULL),
(7, 1, 7, NULL),
(8, 4, 9, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_ped` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `id_play` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `id_tc` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `id_est` int(11) NOT NULL,
  `id_ven` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_ped`, `id_cli`, `id_play`, `Cantidad`, `id_tc`, `id_color`, `id_talla`, `Fecha`, `id_est`, `id_ven`) VALUES
(1, 1, 1, 1, 1, 9, 2, '2018-09-03', 2, 1),
(2, 1, 1, 2, 2, 4, 5, '2018-09-29', 2, 1),
(3, 1, 1, 2, 2, 10, 3, '2018-09-30', 3, 1),
(4, 2, 1, 10, 1, 10, 3, '2018-10-01', 1, 1),
(5, 1, 1, 2, 2, 4, 1, '2018-10-02', 2, 2),
(6, 3, 1, 1, 1, 9, 1, '2018-10-03', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playeras`
--

CREATE TABLE `playeras` (
  `id_play` int(11) NOT NULL,
  `modelo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `playeras`
--

INSERT INTO `playeras` (`id_play`, `modelo`) VALUES
(1, 'Polo'),
(2, 'Camisa'),
(3, 'Playera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponchadodel`
--

CREATE TABLE `ponchadodel` (
  `id_ponD` int(11) NOT NULL,
  `tipo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ponchadodel`
--

INSERT INTO `ponchadodel` (`id_ponD`, `tipo`) VALUES
(1, 'Escudo Uady/ FCA'),
(2, 'Escudo Uady/ FIQ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponchadotra`
--

CREATE TABLE `ponchadotra` (
  `id_ponT` int(11) NOT NULL,
  `tipo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ponchadotra`
--

INSERT INTO `ponchadotra` (`id_ponT`, `tipo`) VALUES
(1, 'Carrera: LATI'),
(2, 'Carrera: CP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `id_sex` int(11) NOT NULL,
  `sexo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`id_sex`, `sexo`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id_talla` int(11) NOT NULL,
  `Medida` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id_talla`, `Medida`) VALUES
(1, 32),
(2, 34),
(3, 36),
(4, 38),
(5, 40),
(6, 42);

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
(2, 'Vendedor'),
(3, 'Jefe'),
(4, 'Usuario'),
(5, 'Vinculación Empresarial');

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
(1, 'Admin', 'Admi', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(2, 'Rodrigo', 'Trejo', 'N/A', 'rod.tre', '25d55ad283aa400af464c76d713c07ad', 3, 1),
(3, 'Usuario', 'Comprador', '1', 'usuario1', '122b738600a0f74f7c331c0ef59bc34c', 4, 1),
(4, 'Juan ', 'Camaron', 'Salsa', 'ju.sa', 'e10adc3949ba59abbe56e057f20f883e', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id_ven` int(11) NOT NULL,
  `nombre_ven` varchar(150) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `id_sex` int(11) NOT NULL,
  `id_esc` int(11) DEFAULT NULL,
  `id_carr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id_ven`, `nombre_ven`, `telefono`, `correo`, `id_sex`, `id_esc`, `id_carr`) VALUES
(1, 'N/A', 'N/A', 'N/A', 1, 1, 1),
(2, 'Rodrigo Trejo', '123456789', 'rt@gm.com', 1, 3, 2),
(3, 'Erick Ríos S', '9991606060', 'eric@er.com', 1, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `campus2`
--
ALTER TABLE `campus2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id_est`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id_inv`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_ped`);

--
-- Indices de la tabla `playeras`
--
ALTER TABLE `playeras`
  ADD PRIMARY KEY (`id_play`);

--
-- Indices de la tabla `ponchadodel`
--
ALTER TABLE `ponchadodel`
  ADD PRIMARY KEY (`id_ponD`);

--
-- Indices de la tabla `ponchadotra`
--
ALTER TABLE `ponchadotra`
  ADD PRIMARY KEY (`id_ponT`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`id_sex`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id_talla`);

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
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id_ven`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `campus2`
--
ALTER TABLE `campus2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `playeras`
--
ALTER TABLE `playeras`
  MODIFY `id_play` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ponchadodel`
--
ALTER TABLE `ponchadodel`
  MODIFY `id_ponD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ponchadotra`
--
ALTER TABLE `ponchadotra`
  MODIFY `id_ponT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sexos`
--
ALTER TABLE `sexos`
  MODIFY `id_sex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id_ven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
