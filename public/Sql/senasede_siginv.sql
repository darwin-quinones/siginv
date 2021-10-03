-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-09-2021 a las 20:24:55
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
-- Base de datos: `senasede_siginv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ambiente`
--

CREATE TABLE `tbl_ambiente` (
  `tbl_amb_ID` int(11) NOT NULL,
  `tbl_amb_NOMBRE` varchar(65) DEFAULT NULL COMMENT 'NOMBRE DEL AMBIENTE',
  `tbl_sede_tbl_sede_ID` int(11) NOT NULL,
  `tbl_sede_tbl_centro_tbl_centro_ID` int(11) NOT NULL,
  `tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID` int(11) NOT NULL,
  `tbl_amb_ESTADO` tinyint(1) DEFAULT 1 COMMENT 'BORRADOR SUPERFICIAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bodega`
--

CREATE TABLE `tbl_bodega` (
  `tbl_bodega_ID` int(11) NOT NULL,
  `tbl_bodega_NOMBRE` varchar(50) DEFAULT NULL,
  `tbl_bodega_ESTADO` int(1) NOT NULL DEFAULT 1,
  `tbl_sede_tbl_sede_ID` int(11) NOT NULL,
  `tbl_sede_tbl_centro_tbl_centro_ID` int(11) NOT NULL,
  `tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargo`
--

CREATE TABLE `tbl_cargo` (
  `tbl_cargo_ID` int(11) NOT NULL,
  `tbl_cargo_TIPO` varchar(20) DEFAULT NULL,
  `tbl_cargo_ESTADO` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_cargo`
--

INSERT INTO `tbl_cargo` (`tbl_cargo_ID`, `tbl_cargo_TIPO`, `tbl_cargo_ESTADO`) VALUES
(1, 'ADMINISTRADOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_centro`
--

CREATE TABLE `tbl_centro` (
  `tbl_centro_ID` int(11) NOT NULL,
  `tbl_centro_NOMBRE` varchar(45) NOT NULL,
  `tbl_centro_TELEFONO` varchar(14) CHARACTER SET utf8mb4 NOT NULL COMMENT 'TELEFONO DEL CENTRO DE FORMACION',
  `tbl_centro_SUBDIRECTOR` varchar(60) CHARACTER SET utf16 DEFAULT NULL COMMENT 'SUBDIRECTOR ',
  `tbl_regional_tbl_regional_ID` int(11) NOT NULL,
  `tbl_centro_ESTADO` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_centro`
--

INSERT INTO `tbl_centro` (`tbl_centro_ID`, `tbl_centro_NOMBRE`, `tbl_centro_TELEFONO`, `tbl_centro_SUBDIRECTOR`, `tbl_regional_tbl_regional_ID`, `tbl_centro_ESTADO`) VALUES
(1, 'COLOMBO ALEMAN DE DAVID ', '2312343', 'ORLANDO ', 1, 1),
(2, 'CARTAGENAS DC', '21324389343', 'JULIO SANCHEZ', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipo`
--

CREATE TABLE `tbl_equipo` (
  `tbl_equipo_ID` int(11) NOT NULL,
  `tbl_equipo_MODELO` varchar(45) NOT NULL,
  `tbl_equipo_CONSECUTIVO` varchar(45) NOT NULL,
  `tbl_equipo_DESCRIPCION` varchar(45) NOT NULL,
  `tbl_equipo_DESCRIPCION_ACTUAL` varchar(50) NOT NULL,
  `tbl_equipo_TIPO` varchar(45) NOT NULL,
  `tbl_equipo_PLACA` varchar(45) NOT NULL,
  `tbl_equipo_SERIAL` varchar(50) NOT NULL,
  `tbl_equipo_FECHA_ADQUISICION` varchar(45) NOT NULL,
  `tbl_equipo_VALOR_INGRESO` varchar(45) NOT NULL,
  `tbl_equipo_ESTADO` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estante`
--

CREATE TABLE `tbl_estante` (
  `tbl_estante_ID` int(11) NOT NULL,
  `tbl_estante_NUMERO` int(11) DEFAULT NULL,
  `tbl_estante_DESCRIPCION` varchar(45) DEFAULT NULL,
  `tbl_bodega_tbl_bodega_ID` int(11) NOT NULL,
  `tbl_gaveta_tbl_gaveta_ID1` int(11) NOT NULL,
  `tbl_gaveta_tbl_estante_tbl_estante_ID1` int(11) NOT NULL,
  `tbl_gaveta_tbl_estante_tbl_bodega_tbl_bodega_ID1` int(11) NOT NULL,
  `tbl_estante_ESTADO` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_gaveta`
--

CREATE TABLE `tbl_gaveta` (
  `tbl_gaveta_ID` int(11) NOT NULL,
  `tbl_gaveta_NUMERO` int(11) DEFAULT NULL,
  `tbl_estante_tbl_estante_ID` int(11) NOT NULL,
  `tbl_estante_tbl_bodega_tbl_bodega_ID` int(11) NOT NULL,
  `tbl_herramienta_tbl_herramienta_ID` int(11) NOT NULL,
  `tbl_gaveta_ESTADO` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_herramienta`
--

CREATE TABLE `tbl_herramienta` (
  `tbl_herramienta_ID` int(11) NOT NULL,
  `tbl_herramienta_FECHA` varchar(100) DEFAULT NULL,
  `tbl_herramienta_DESCRIPCION` varchar(45) DEFAULT NULL,
  `tbl_herramienta_CANTIDAD` int(11) DEFAULT NULL,
  `tbl_herramienta_ESTADO` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_instructor`
--

CREATE TABLE `tbl_instructor` (
  `tbl_instructor_ID` int(11) NOT NULL,
  `tbl_sede` int(11) NOT NULL,
  `tbl_instructor_NOMBRES` varchar(20) NOT NULL,
  `tbl_instructor_APELLIDOS` text NOT NULL,
  `tbl_instructor_TIPODOCUMENTO` text DEFAULT NULL,
  `tbl_instructor_NUMDECUMENTO` int(15) NOT NULL,
  `tbl_instructor_TELEFONO` int(15) DEFAULT NULL,
  `tbl_instructor_CORREO` text NOT NULL,
  `tbl_instructor_DIRECION` text NOT NULL,
  `tbl_sede_tbl_sede_ID` int(11) NOT NULL,
  `tbl_instructor_ESTADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materiales`
--

CREATE TABLE `tbl_materiales` (
  `tbl_materiales_ID` int(20) NOT NULL,
  `tbl_materiales_FECHA` varchar(30) NOT NULL,
  `tbl_materiales_CODIGOSENA` int(20) NOT NULL,
  `tbl_materiales_UNSPSC` int(21) NOT NULL,
  `tbl_materiales_DESCRIPCION` varchar(100) NOT NULL,
  `tbl_materiales_PROGRAMAFORMACION` varchar(100) NOT NULL,
  `tbl_materiales_CANTIDAD` int(21) NOT NULL,
  `tbl_materiales_TIPOMATERIAL` varchar(50) NOT NULL,
  `tbl_materiales_UNIDADMEDIDA` varchar(21) NOT NULL,
  `tbl_materiales_DESTINO` varchar(100) NOT NULL,
  `tbl_materiales_ESTADO` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `tbl_persona_ID` int(11) NOT NULL,
  `tbl_persona_NUMDOCUMENTO` varchar(100) DEFAULT NULL,
  `tbl_persona_NOMBRES` varchar(45) DEFAULT NULL,
  `tbl_persona_PRIMERAPELLIDO` varchar(45) DEFAULT NULL,
  `tbl_persona_SEGUNDOAPELLIDO` varchar(20) DEFAULT NULL,
  `tbl_persona_FECHANAC` date DEFAULT NULL,
  `tbl_persona_TELEFONO` varchar(15) DEFAULT NULL,
  `tbl_persona_CORREO` varchar(45) DEFAULT NULL,
  `tbl_cargo_tbl_cargo_ID` int(11) NOT NULL,
  `tbl_tipodocumento_tbl_tipodocumento_ID` int(11) NOT NULL,
  `tbl_persona_ESTADO` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`tbl_persona_ID`, `tbl_persona_NUMDOCUMENTO`, `tbl_persona_NOMBRES`, `tbl_persona_PRIMERAPELLIDO`, `tbl_persona_SEGUNDOAPELLIDO`, `tbl_persona_FECHANAC`, `tbl_persona_TELEFONO`, `tbl_persona_CORREO`, `tbl_cargo_tbl_cargo_ID`, `tbl_tipodocumento_tbl_tipodocumento_ID`, `tbl_persona_ESTADO`) VALUES
(1, '1002234563', 'DAVID EDUARDO', 'LOZANO ', 'RODRIGUEZ', '2001-06-26', '3043672379', 'david78lozano@gmail.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_regional`
--

CREATE TABLE `tbl_regional` (
  `tbl_regional_ID` int(11) NOT NULL,
  `tbl_regional_NOMBRE` varchar(45) NOT NULL,
  `tbl_regional_ESTADO` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_regional`
--

INSERT INTO `tbl_regional` (`tbl_regional_ID`, `tbl_regional_NOMBRE`, `tbl_regional_ESTADO`) VALUES
(1, 'ATLANTICO', 1),
(2, 'BOLIVAR', 1),
(3, 'CESAR ', 1),
(4, 'MAGDALENA', 1),
(5, 'GUAJIRA', 1),
(6, 'COLON ALEMNA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sede`
--

CREATE TABLE `tbl_sede` (
  `tbl_sede_ID` int(11) NOT NULL,
  `tbl_sede_NOMBRE` varchar(45) NOT NULL,
  `tbl_sede_RESPONSABLE` varchar(60) CHARACTER SET utf16 DEFAULT NULL COMMENT 'RESPONSABLE',
  `tbl_sede_TELEFONO` varchar(14) CHARACTER SET utf8mb4 NOT NULL COMMENT '	TELEFONO DEL SEDE DE FORMACION',
  `tbl_centro_tbl_centro_ID` int(11) NOT NULL,
  `tbl_centro_tbl_regional_tbl_regional_ID` int(11) NOT NULL,
  `tbl_sede_ESTADO` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_sede`
--

INSERT INTO `tbl_sede` (`tbl_sede_ID`, `tbl_sede_NOMBRE`, `tbl_sede_RESPONSABLE`, `tbl_sede_TELEFONO`, `tbl_centro_tbl_centro_ID`, `tbl_centro_tbl_regional_tbl_regional_ID`, `tbl_sede_ESTADO`) VALUES
(1, 'JESUS', 'CHAR', '1223435', 1, 1, 1),
(2, 'SEDE DEL JESUS', 'JESUS MANUEL CHARRY', '3015348734', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipodocumento`
--

CREATE TABLE `tbl_tipodocumento` (
  `tbl_tipodocumento_ID` int(11) NOT NULL,
  `tbl_tipodocumento_ABREVIATURA` varchar(5) DEFAULT NULL,
  `tbl_tipodocumento_NOMBRE` varchar(45) DEFAULT NULL,
  `tbl_tipodocumento_ESTADO` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipodocumento`
--

INSERT INTO `tbl_tipodocumento` (`tbl_tipodocumento_ID`, `tbl_tipodocumento_ABREVIATURA`, `tbl_tipodocumento_NOMBRE`, `tbl_tipodocumento_ESTADO`) VALUES
(1, 'C.C', 'CEDULA DE CIUDANIA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuario`
--

CREATE TABLE `tbl_tipo_usuario` (
  `tbl_tipo_usuario_ID` int(11) NOT NULL,
  `tbl_tipo_usuario_NOMBRE` varchar(30) NOT NULL,
  `tbl_tipo_usuario_ESTADO` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_usuario`
--

INSERT INTO `tbl_tipo_usuario` (`tbl_tipo_usuario_ID`, `tbl_tipo_usuario_NOMBRE`, `tbl_tipo_usuario_ESTADO`) VALUES
(1, 'ADMINISTRADOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `tbl_usuario_ID` int(11) NOT NULL,
  `tbl_usuario_USERNAME` varchar(45) DEFAULT NULL,
  `tbl_usuario_PASSWORD` text DEFAULT NULL,
  `tbl_usuario_IDPERSONA` int(11) NOT NULL,
  `tbl_usuario_ESTADO` int(1) NOT NULL DEFAULT 1,
  `tbl_persona_tbl_persona_ID` int(11) NOT NULL,
  `tbl_persona_tbl_tipodocumento_tbl_tipodocumento_ID` int(11) NOT NULL,
  `tbl_persona_tbl_cargo_tbl_cargo_ID` int(11) NOT NULL,
  `tbl_tipo_usuario_tbl_tipo_usuario_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`tbl_usuario_ID`, `tbl_usuario_USERNAME`, `tbl_usuario_PASSWORD`, `tbl_usuario_IDPERSONA`, `tbl_usuario_ESTADO`, `tbl_persona_tbl_persona_ID`, `tbl_persona_tbl_tipodocumento_tbl_tipodocumento_ID`, `tbl_persona_tbl_cargo_tbl_cargo_ID`, `tbl_tipo_usuario_tbl_tipo_usuario_ID`) VALUES
(1, 'mi@siginv.com', '$2y$10$hZL1zlFFfCLDO9davY0Kv.uu8H/E7NWnQwFmMOR2tFpPry/oF27ca', 1, 1, 1, 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_ambiente`
--
ALTER TABLE `tbl_ambiente`
  ADD PRIMARY KEY (`tbl_amb_ID`,`tbl_sede_tbl_sede_ID`,`tbl_sede_tbl_centro_tbl_centro_ID`,`tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID`),
  ADD KEY `fk_tbl_ambiente_id_tbl_sede1_idx` (`tbl_sede_tbl_sede_ID`,`tbl_sede_tbl_centro_tbl_centro_ID`,`tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID`);

--
-- Indices de la tabla `tbl_bodega`
--
ALTER TABLE `tbl_bodega`
  ADD PRIMARY KEY (`tbl_bodega_ID`,`tbl_sede_tbl_sede_ID`,`tbl_sede_tbl_centro_tbl_centro_ID`,`tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID`),
  ADD KEY `fk_tbl_bodega_tbl_sede1_idx` (`tbl_sede_tbl_sede_ID`,`tbl_sede_tbl_centro_tbl_centro_ID`,`tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID`);

--
-- Indices de la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  ADD PRIMARY KEY (`tbl_cargo_ID`);

--
-- Indices de la tabla `tbl_centro`
--
ALTER TABLE `tbl_centro`
  ADD PRIMARY KEY (`tbl_centro_ID`,`tbl_regional_tbl_regional_ID`),
  ADD KEY `fk_tbl_centro_tbl_regional1_idx` (`tbl_regional_tbl_regional_ID`);

--
-- Indices de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  ADD PRIMARY KEY (`tbl_equipo_ID`);

--
-- Indices de la tabla `tbl_estante`
--
ALTER TABLE `tbl_estante`
  ADD PRIMARY KEY (`tbl_estante_ID`,`tbl_bodega_tbl_bodega_ID`,`tbl_gaveta_tbl_gaveta_ID1`,`tbl_gaveta_tbl_estante_tbl_estante_ID1`,`tbl_gaveta_tbl_estante_tbl_bodega_tbl_bodega_ID1`),
  ADD KEY `fk_tbl_estante_tbl_bodega1_idx` (`tbl_bodega_tbl_bodega_ID`),
  ADD KEY `fk_tbl_estante_tbl_gaveta2_idx` (`tbl_gaveta_tbl_gaveta_ID1`,`tbl_gaveta_tbl_estante_tbl_estante_ID1`,`tbl_gaveta_tbl_estante_tbl_bodega_tbl_bodega_ID1`);

--
-- Indices de la tabla `tbl_gaveta`
--
ALTER TABLE `tbl_gaveta`
  ADD PRIMARY KEY (`tbl_gaveta_ID`,`tbl_estante_tbl_estante_ID`,`tbl_estante_tbl_bodega_tbl_bodega_ID`,`tbl_herramienta_tbl_herramienta_ID`),
  ADD KEY `fk_tbl_gaveta_tbl_herramienta1_idx` (`tbl_herramienta_tbl_herramienta_ID`);

--
-- Indices de la tabla `tbl_herramienta`
--
ALTER TABLE `tbl_herramienta`
  ADD PRIMARY KEY (`tbl_herramienta_ID`);

--
-- Indices de la tabla `tbl_instructor`
--
ALTER TABLE `tbl_instructor`
  ADD PRIMARY KEY (`tbl_instructor_ID`),
  ADD KEY `tbl_sede_tbl_sede_ID` (`tbl_sede_tbl_sede_ID`);

--
-- Indices de la tabla `tbl_materiales`
--
ALTER TABLE `tbl_materiales`
  ADD PRIMARY KEY (`tbl_materiales_ID`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`tbl_persona_ID`,`tbl_tipodocumento_tbl_tipodocumento_ID`,`tbl_cargo_tbl_cargo_ID`) USING BTREE,
  ADD KEY `fk_tbl_persona_tbl_cargo1_idx` (`tbl_cargo_tbl_cargo_ID`),
  ADD KEY `fk_tbl_persona_Tbl_tipodocumento1_idx` (`tbl_tipodocumento_tbl_tipodocumento_ID`);

--
-- Indices de la tabla `tbl_regional`
--
ALTER TABLE `tbl_regional`
  ADD PRIMARY KEY (`tbl_regional_ID`);

--
-- Indices de la tabla `tbl_sede`
--
ALTER TABLE `tbl_sede`
  ADD PRIMARY KEY (`tbl_sede_ID`,`tbl_centro_tbl_centro_ID`,`tbl_centro_tbl_regional_tbl_regional_ID`),
  ADD KEY `fk_tbl_sede_tbl_centro1_idx` (`tbl_centro_tbl_centro_ID`,`tbl_centro_tbl_regional_tbl_regional_ID`);

--
-- Indices de la tabla `tbl_tipodocumento`
--
ALTER TABLE `tbl_tipodocumento`
  ADD PRIMARY KEY (`tbl_tipodocumento_ID`);

--
-- Indices de la tabla `tbl_tipo_usuario`
--
ALTER TABLE `tbl_tipo_usuario`
  ADD PRIMARY KEY (`tbl_tipo_usuario_ID`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`tbl_usuario_ID`,`tbl_persona_tbl_persona_ID`,`tbl_persona_tbl_tipodocumento_tbl_tipodocumento_ID`,`tbl_persona_tbl_cargo_tbl_cargo_ID`,`tbl_tipo_usuario_tbl_tipo_usuario_ID`),
  ADD KEY `fk_tbl_usuario_tbl_persona1_idx` (`tbl_persona_tbl_persona_ID`,`tbl_persona_tbl_tipodocumento_tbl_tipodocumento_ID`,`tbl_persona_tbl_cargo_tbl_cargo_ID`),
  ADD KEY `fk_tbl_usuario_tbl_tipo_usuario1_idx` (`tbl_tipo_usuario_tbl_tipo_usuario_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_ambiente`
--
ALTER TABLE `tbl_ambiente`
  MODIFY `tbl_amb_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_bodega`
--
ALTER TABLE `tbl_bodega`
  MODIFY `tbl_bodega_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_centro`
--
ALTER TABLE `tbl_centro`
  MODIFY `tbl_centro_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  MODIFY `tbl_equipo_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_estante`
--
ALTER TABLE `tbl_estante`
  MODIFY `tbl_estante_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_gaveta`
--
ALTER TABLE `tbl_gaveta`
  MODIFY `tbl_gaveta_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_herramienta`
--
ALTER TABLE `tbl_herramienta`
  MODIFY `tbl_herramienta_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_instructor`
--
ALTER TABLE `tbl_instructor`
  MODIFY `tbl_instructor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_materiales`
--
ALTER TABLE `tbl_materiales`
  MODIFY `tbl_materiales_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `tbl_persona_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_regional`
--
ALTER TABLE `tbl_regional`
  MODIFY `tbl_regional_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_sede`
--
ALTER TABLE `tbl_sede`
  MODIFY `tbl_sede_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_usuario`
--
ALTER TABLE `tbl_tipo_usuario`
  MODIFY `tbl_tipo_usuario_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `tbl_usuario_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_ambiente`
--
ALTER TABLE `tbl_ambiente`
  ADD CONSTRAINT `fk_tbl_ambiente_id_tbl_sede1` FOREIGN KEY (`tbl_sede_tbl_sede_ID`,`tbl_sede_tbl_centro_tbl_centro_ID`,`tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID`) REFERENCES `tbl_sede` (`tbl_sede_ID`, `tbl_centro_tbl_centro_ID`, `tbl_centro_tbl_regional_tbl_regional_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_bodega`
--
ALTER TABLE `tbl_bodega`
  ADD CONSTRAINT `fk_tbl_bodega_tbl_sede1` FOREIGN KEY (`tbl_sede_tbl_sede_ID`,`tbl_sede_tbl_centro_tbl_centro_ID`,`tbl_sede_tbl_centro_tbl_regional_tbl_regional_ID`) REFERENCES `tbl_sede` (`tbl_sede_ID`, `tbl_centro_tbl_centro_ID`, `tbl_centro_tbl_regional_tbl_regional_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_centro`
--
ALTER TABLE `tbl_centro`
  ADD CONSTRAINT `fk_tbl_centro_tbl_regional1` FOREIGN KEY (`tbl_regional_tbl_regional_ID`) REFERENCES `tbl_regional` (`tbl_regional_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_estante`
--
ALTER TABLE `tbl_estante`
  ADD CONSTRAINT `fk_Tbl_estante_BODEGA_ID` FOREIGN KEY (`tbl_bodega_tbl_bodega_ID`) REFERENCES `tbl_bodega` (`tbl_bodega_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_estante_tbl_gaveta2` FOREIGN KEY (`tbl_gaveta_tbl_gaveta_ID1`,`tbl_gaveta_tbl_estante_tbl_estante_ID1`,`tbl_gaveta_tbl_estante_tbl_bodega_tbl_bodega_ID1`) REFERENCES `tbl_gaveta` (`tbl_gaveta_ID`, `tbl_estante_tbl_estante_ID`, `tbl_estante_tbl_bodega_tbl_bodega_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_gaveta`
--
ALTER TABLE `tbl_gaveta`
  ADD CONSTRAINT `fk_tbl_gaveta_tbl_herramienta1` FOREIGN KEY (`tbl_herramienta_tbl_herramienta_ID`) REFERENCES `tbl_herramienta` (`tbl_herramienta_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_instructor`
--
ALTER TABLE `tbl_instructor`
  ADD CONSTRAINT `tbl_sede_tbl_sede_ID` FOREIGN KEY (`tbl_sede_tbl_sede_ID`) REFERENCES `tbl_sede` (`tbl_sede_ID`);

--
-- Filtros para la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD CONSTRAINT `fk_tbl_persona_Tbl_tipodocumento1` FOREIGN KEY (`tbl_tipodocumento_tbl_tipodocumento_ID`) REFERENCES `tbl_tipodocumento` (`tbl_tipodocumento_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_persona_tbl_cargo1` FOREIGN KEY (`tbl_cargo_tbl_cargo_ID`) REFERENCES `tbl_cargo` (`tbl_cargo_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_sede`
--
ALTER TABLE `tbl_sede`
  ADD CONSTRAINT `fk_tbl_sede_tbl_centro1` FOREIGN KEY (`tbl_centro_tbl_centro_ID`,`tbl_centro_tbl_regional_tbl_regional_ID`) REFERENCES `tbl_centro` (`tbl_centro_ID`, `tbl_regional_tbl_regional_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_tbl_usuario_tbl_persona1` FOREIGN KEY (`tbl_persona_tbl_persona_ID`,`tbl_persona_tbl_tipodocumento_tbl_tipodocumento_ID`,`tbl_persona_tbl_cargo_tbl_cargo_ID`) REFERENCES `tbl_persona` (`tbl_persona_ID`, `tbl_tipodocumento_tbl_tipodocumento_ID`, `tbl_cargo_tbl_cargo_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_usuario` FOREIGN KEY (`tbl_tipo_usuario_tbl_tipo_usuario_ID`) REFERENCES `tbl_tipo_usuario` (`tbl_tipo_usuario_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
