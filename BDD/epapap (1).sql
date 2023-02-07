-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2023 a las 18:45:18
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epapap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `id_carrusel` int(11) NOT NULL,
  `descripcion_carrusel` varchar(500) DEFAULT NULL,
  `foto_carrusel` varchar(500) DEFAULT NULL,
  `fecha_ingreso_carrusel` date DEFAULT NULL,
  `fecha_actualizacion_carrusel` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`id_carrusel`, `descripcion_carrusel`, `foto_carrusel`, `fecha_ingreso_carrusel`, `fecha_actualizacion_carrusel`) VALUES
(1, 'EPAPAP', 'foto_carrusel_1674220687_469.jpg', '2023-01-20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cedula_cliente` varchar(10) DEFAULT NULL,
  `nombre_cliente` varchar(250) DEFAULT NULL,
  `apellido_cliente` varchar(250) DEFAULT NULL,
  `telefono_cliente` varchar(10) DEFAULT NULL,
  `correo_cliente` varchar(250) DEFAULT NULL,
  `estado_cliente` varchar(100) DEFAULT NULL,
  `fecha_ingreso_cliente` date DEFAULT NULL,
  `fecha_actualizacion_cliente` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula_cliente`, `nombre_cliente`, `apellido_cliente`, `telefono_cliente`, `correo_cliente`, `estado_cliente`, `fecha_ingreso_cliente`, `fecha_actualizacion_cliente`) VALUES
(1, '0504106709', 'CARMEN VIRGINIA', 'HERRERA NUÑEZ', '0983460934', 'carmenherrera@gmail.com', 'ACTIVO', '2023-01-20', NULL),
(2, '0504106709', 'ENITT ROSALBA', 'SARZOSA HERRERA', '0987654321', 'ennitrosalva@gmail.com', 'ACTIVO', '2023-01-23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre_contacto` varchar(200) DEFAULT NULL,
  `apellido_contacto` varchar(200) DEFAULT NULL,
  `correo_contacto` varchar(100) DEFAULT NULL,
  `telefono_contacto` varchar(100) DEFAULT NULL,
  `mensaje_contacto` varchar(2000) DEFAULT NULL,
  `estado_contacto` varchar(100) DEFAULT NULL,
  `fecha_ingreso_contacto` date DEFAULT NULL,
  `fecha_actualizacion_contacto` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `id_correo` int(11) NOT NULL,
  `cliente_correo` varchar(200) DEFAULT NULL,
  `correo_correo` varchar(200) DEFAULT NULL,
  `notificacion_correo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `numero_cuenta` varchar(100) DEFAULT NULL,
  `numero_medidor_cuenta` varchar(100) DEFAULT NULL,
  `direccion_primaria_cuenta` varchar(1000) DEFAULT NULL,
  `direccion_secundaria_cuenta` varchar(1000) DEFAULT NULL,
  `estado_cuenta` varchar(100) DEFAULT NULL,
  `fecha_ingreso_cuenta` date DEFAULT NULL,
  `fecha_actualizacion_cuenta` date DEFAULT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL,
  `fk_id_sector` int(11) DEFAULT NULL,
  `fk_id_tpcuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `numero_cuenta`, `numero_medidor_cuenta`, `direccion_primaria_cuenta`, `direccion_secundaria_cuenta`, `estado_cuenta`, `fecha_ingreso_cuenta`, `fecha_actualizacion_cuenta`, `fk_id_cliente`, `fk_id_sector`, `fk_id_tpcuenta`) VALUES
(3, '0006666', '00030307', 'GABRIEL ALVAREZ', 'SAN BUENAVENTURA', 'ACTIVA', '2023-01-22', NULL, 1, 1, 1),
(4, '1458', '12354', 'GABRIEL ALVAREZ', 'MANUELA DE JESUS TOVAR', 'ACTIVA', '2023-01-23', NULL, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL,
  `nombre_galeria` varchar(500) DEFAULT NULL,
  `foto_galeria` varchar(500) DEFAULT NULL,
  `fecha_ingreso_galeria` date DEFAULT NULL,
  `fecha_actualizacion_galeria` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id_galeria`, `nombre_galeria`, `foto_galeria`, `fecha_ingreso_galeria`, `fecha_actualizacion_galeria`) VALUES
(1, 'Cambio tubos de agua', 'foto_galeria_1675352112_430.jpg', '2023-02-02', NULL),
(2, 'Cambio nombre', 'foto_galeria_1675352123_480.jpg', '2023-02-02', NULL),
(3, 'Cambio de Medidor', 'foto_galeria_1675352134_107.jpg', '2023-02-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `id_informacion` int(11) NOT NULL,
  `nombre_informacion` varchar(1000) DEFAULT NULL,
  `direccion_informacion` varchar(5000) DEFAULT NULL,
  `telefono_informacion` varchar(10) DEFAULT NULL,
  `convencional_informacion` varchar(10) DEFAULT NULL,
  `correo_informacion` varchar(200) DEFAULT NULL,
  `fecha_ingreso_informacion` date DEFAULT NULL,
  `fecha_actualizacion_informacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectura`
--

CREATE TABLE `lectura` (
  `id_lectura` int(11) NOT NULL,
  `fecha_lectura` date DEFAULT NULL,
  `lectura_anterior_lectura` varchar(100) DEFAULT NULL,
  `lectura_actual_lectura` varchar(100) DEFAULT NULL,
  `consumo_lectura` varchar(100) DEFAULT NULL,
  `pago_lectura` varchar(100) DEFAULT NULL,
  `observacion_lectura` varchar(250) DEFAULT NULL,
  `fecha_actualizacion_lectura` date DEFAULT NULL,
  `estado_lectura` varchar(100) DEFAULT NULL,
  `encargado_lectura` varchar(200) DEFAULT NULL,
  `fk_id_cuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lectura`
--

INSERT INTO `lectura` (`id_lectura`, `fecha_lectura`, `lectura_anterior_lectura`, `lectura_actual_lectura`, `consumo_lectura`, `pago_lectura`, `observacion_lectura`, `fecha_actualizacion_lectura`, `estado_lectura`, `encargado_lectura`, `fk_id_cuenta`) VALUES
(1, '2023-01-23', '1236', '1236', '1', '0.28', 'ninguna', NULL, 'COMPLETADO', 'jonathan santo', 3),
(8, '2023-01-23', '1237', '1237', '1', '', 'Ninguna', NULL, 'PENDIENTE', 'jonathan santo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mision`
--

CREATE TABLE `mision` (
  `id_mision` int(11) NOT NULL,
  `nombre_mision` varchar(1000) DEFAULT NULL,
  `descripcion_mision` varchar(5000) DEFAULT NULL,
  `foto_mision` varchar(200) DEFAULT NULL,
  `fecha_ingreso_mision` date DEFAULT NULL,
  `fecha_actualizacion_mision` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mision`
--

INSERT INTO `mision` (`id_mision`, `nombre_mision`, `descripcion_mision`, `foto_mision`, `fecha_ingreso_mision`, `fecha_actualizacion_mision`) VALUES
(1, 'Misión EPAPAP', 'Ser la Empresa líder de los servicios de agua potable y alcantarillado en el ámbito nacional, alcanzando niveles de productividad y rentabilidad que permitan un desarrollo auto sostenible, mejorando la vida de los clientes a través de un servicio continuo de excelencia y preservando el medio ambiente para las futuras generaciones.', 'foto_mision_1675351585_197.jpg', '2023-02-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `nombre_noticia` varchar(500) DEFAULT NULL,
  `descripcion_noticia` varchar(5000) DEFAULT NULL,
  `foto_noticia` varchar(500) DEFAULT NULL,
  `fecha_ingreso_noticia` date DEFAULT NULL,
  `fecha_actualizacion_noticia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `nombre_noticia`, `descripcion_noticia`, `foto_noticia`, `fecha_ingreso_noticia`, `fecha_actualizacion_noticia`) VALUES
(1, 'Epapap entregó planta de tratamiento en el Cardón', 'Patricio Fierro Ortiz, gerente de la Empresa Pública de Agua Potable y Alcantarillado de Pujilí, informa a la ciudadanía que la entidad ha mejorado un punto delicado del sistema de agua potable. “La Empresa ha logrado finalizar los trabajos de la planta de tratamiento del agua potable del barrio El Cardón, para servir a los barrios de Rumipamba y Cardón Alto. El caudal está programado con una capacidad de tres a cuatro litros por segundo de tratamiento. Es para el sector occidental un motivo de mucha alegría, poder contar con el agua potable ya las 24 horas, este fue un anhelo que se ha podido cristalizar gracias a las autoridades de la Municipalidad y la Empresa y ya está funcionando. El monto de inversión es de 92 000 dólares, de los cuales, la Municipalidad ha aportado con 40 000 dólares y la empresa con el aporte de 22 000 dólares. Además, queremos completar el servicio en el barrio Rumipamba, con la habilitación de una planta igual de tratamiento que la realizó el Miduvi en los años 80, que podría ser habilitada y que entraría a trabajar en serie con la planta nueva que tenemos, con una cota más alta y se atendería a muchas más personas del barrio Rumipamba”.', 'foto_noticia_1675352076_331.jpg', '2023-02-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `nombre_sector` varchar(300) DEFAULT NULL,
  `descripcion_sector` varchar(1000) DEFAULT NULL,
  `fecha_ingreso_sector` date DEFAULT NULL,
  `fecha_actualizacion_sector` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id_sector`, `nombre_sector`, `descripcion_sector`, `fecha_ingreso_sector`, `fecha_actualizacion_sector`) VALUES
(1, 'TANQUE 1', 'SAN SEBASTIAN', '2023-01-20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(500) DEFAULT NULL,
  `descripcion_servicio` varchar(5000) DEFAULT NULL,
  `foto_servicio` varchar(500) DEFAULT NULL,
  `fecha_ingreso_servicio` date DEFAULT NULL,
  `fecha_actualizacion_servicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre_servicio`, `descripcion_servicio`, `foto_servicio`, `fecha_ingreso_servicio`, `fecha_actualizacion_servicio`) VALUES
(1, 'Cambio de medidores', 'Requisitos: Copia de cedula - Copia Escritura - Correo electrónico - Copia de la ultima carta de pago - Formulario de conexión de agua ', 'foto_servicio_1675351993_58.jpg', '2023-02-02', NULL),
(2, 'Conexiones de agua potable y Alcantarillado', 'Requisitos: Copia de cedula - Copia Escritura - Correo electrónico - Copia de la ultima carta de pago - Formulario de conexión de agua ', 'foto_servicio_1675352037_79.PNG', '2023-02-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpcuenta`
--

CREATE TABLE `tpcuenta` (
  `id_tpcuenta` int(11) NOT NULL,
  `nombre_tpcuenta` varchar(300) DEFAULT NULL,
  `precio_consumo_tpcuenta` varchar(50) DEFAULT NULL,
  `fecha_ingreso_tpcuenta` date DEFAULT NULL,
  `fecha_actualizacion_tpcuenta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tpcuenta`
--

INSERT INTO `tpcuenta` (`id_tpcuenta`, `nombre_tpcuenta`, `precio_consumo_tpcuenta`, `fecha_ingreso_tpcuenta`, `fecha_actualizacion_tpcuenta`) VALUES
(1, 'DOMESTICA', '1', '2023-01-20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(200) DEFAULT NULL,
  `apellido_usuario` varchar(200) DEFAULT NULL,
  `telefono_usuario` varchar(10) DEFAULT NULL,
  `correo_usuario` varchar(200) DEFAULT NULL,
  `password_usuario` varchar(200) DEFAULT NULL,
  `descripcion_usuario` varchar(300) DEFAULT NULL,
  `estado_usuario` varchar(100) DEFAULT NULL,
  `foto_usuario` varchar(400) DEFAULT NULL,
  `fecha_ingreso_usuario` date DEFAULT NULL,
  `fecha_actualizacion_usuario` date DEFAULT NULL,
  `tipo_usuario` varchar(200) DEFAULT NULL,
  `fk_id_sector` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `correo_usuario`, `password_usuario`, `descripcion_usuario`, `estado_usuario`, `foto_usuario`, `fecha_ingreso_usuario`, `fecha_actualizacion_usuario`, `tipo_usuario`, `fk_id_sector`) VALUES
(1, 'jonathan', 'santo', '0983460934', 'jonathan.santo6709@utc.edu.ec', 'jonathan123', 'ADMINISTRADOR', '1', 'foto_usuario_1675352226_202.png', '2023-01-20', '2023-02-02', 'ADMINISTRADOR', 1),
(2, 'DEIVID', 'SANTO ', '0983460154', 'deivid@gmail.com', 'deivid', 'LECTOR', '1', 'foto_usuario_1674244073_118.jpg', '2023-01-20', '2023-02-02', 'LECTOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vision`
--

CREATE TABLE `vision` (
  `id_vision` int(11) NOT NULL,
  `nombre_vision` varchar(1000) DEFAULT NULL,
  `descripcion_vision` varchar(5000) DEFAULT NULL,
  `foto_vision` varchar(200) DEFAULT NULL,
  `fecha_ingreso_vision` date DEFAULT NULL,
  `fecha_actualizacion_vision` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vision`
--

INSERT INTO `vision` (`id_vision`, `nombre_vision`, `descripcion_vision`, `foto_vision`, `fecha_ingreso_vision`, `fecha_actualizacion_vision`) VALUES
(1, 'Visión Epapap', 'Ser la Empresa líder de los servicios de agua potable y alcantarillado en el ámbito nacional, alcanzando niveles de productividad y rentabilidad que permitan un desarrollo auto sostenible, mejorando la vida de los clientes a través de un servicio continuo de excelencia y preservando el medio ambiente para las futuras generaciones.', 'foto_vision_1675351971_9.jpg', '2023-02-02', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`id_carrusel`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`id_informacion`);

--
-- Indices de la tabla `lectura`
--
ALTER TABLE `lectura`
  ADD PRIMARY KEY (`id_lectura`);

--
-- Indices de la tabla `mision`
--
ALTER TABLE `mision`
  ADD PRIMARY KEY (`id_mision`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tpcuenta`
--
ALTER TABLE `tpcuenta`
  ADD PRIMARY KEY (`id_tpcuenta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`id_vision`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `id_carrusel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `id_correo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `id_informacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lectura`
--
ALTER TABLE `lectura`
  MODIFY `id_lectura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mision`
--
ALTER TABLE `mision`
  MODIFY `id_mision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tpcuenta`
--
ALTER TABLE `tpcuenta`
  MODIFY `id_tpcuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vision`
--
ALTER TABLE `vision`
  MODIFY `id_vision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
