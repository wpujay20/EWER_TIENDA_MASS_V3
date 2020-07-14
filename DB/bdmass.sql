-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2020 a las 23:24:30
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmass`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

CREATE TABLE `carrito_compras` (
  `id_carrito` int(11) NOT NULL,
  `carr_precio_unit` decimal(4,2) DEFAULT NULL,
  `carr_cantidad` int(11) DEFAULT NULL,
  `carr_subtotal` decimal(4,2) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `cat_nombre` varchar(30) DEFAULT NULL,
  `cat_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `cat_nombre`, `cat_descripcion`) VALUES
(1, 'Limpieza', 'La limpieza es un factor muy importante en todas partes para evitar enfermedades'),
(2, 'dulces', 'A veces un dulce puede alegrarte el dia'),
(3, 'alimentos enlatados', 'Muy saludables y nutritivos'),
(4, 'la categoria                  ', 'aeaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_det_pedido` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `det_pedido_cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id_det_pedido`, `id_producto`, `id_pedido`, `det_pedido_cantidad`) VALUES
(27, 2, 23, 5),
(28, 3, 23, 5),
(33, 4, 27, 10),
(34, 5, 27, 10),
(35, 4, 28, 10),
(36, 10, 29, 10),
(37, 13, 30, 10),
(39, 3, 32, 10),
(40, 11, 32, 10),
(41, 4, 33, 1),
(42, 5, 33, 1),
(43, 3, 33, 1),
(44, 5, 34, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_marca` int(11) NOT NULL,
  `marca_nombre` varchar(30) DEFAULT NULL,
  `marca_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_marca`, `marca_nombre`, `marca_descripcion`) VALUES
(1, 'Ala             ', 'La marca Ala (detergente), Unilever comercializa y respalda sus productos de lavado de ropa.'),
(2, 'El Fortin', 'Cadena productos alimenticios muy saludables y nutritivos'),
(3, 'Herdez', 'Alimentos en conserva de muy buena calidad y garantia'),
(4, 'GN', 'dulces y golosinas peruanas'),
(5, 'Victoria', 'Marca reconocida a nivel internaciona con muy buenas referencias'),
(6, 'Nestle', 'Empresa peruana muy entregada a su trabajo y de complacer a sus clientes'),
(7, 'costa', 'Costa es una marca con más de 100 años de historia en el mercado Chileno, presente en Chocolates, Ga'),
(8, 'Sapolio', 'Se encuentra en muchos articulos de limpieza del hogar e higienicos'),
(9, 'Ayudin', 'Encuentra la mejor calidad y variedad de lavavajillas '),
(10, 'Ace', 'Marca lider en detergentes para el correcto lavado de prendas de vestir'),
(11, 'Zenu', 'Distribuidora de carnes y alimentos de origen animal, en muy buena calidad y buen precio'),
(12, 'LA MARCA                      ', 'AEAaea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `pedido_monto` decimal(6,2) DEFAULT NULL,
  `pedido_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `pedido_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_persona`, `pedido_monto`, `pedido_fecha`, `pedido_estado`) VALUES
(23, 32, '50.00', '2020-06-26 00:51:03', 'Aceptado'),
(27, 25, '145.00', '2020-06-26 02:42:32', 'Pendiente'),
(28, 25, '45.00', '2020-06-26 02:47:32', 'Pendiente'),
(29, 25, '30.00', '2020-06-26 02:48:27', 'Pendiente'),
(30, 25, '60.00', '2020-06-26 02:58:53', 'Pendiente'),
(32, 34, '100.00', '2020-06-30 23:00:21', 'Pendiente'),
(33, 34, '19.50', '2020-06-30 23:03:39', 'Pendiente'),
(34, 37, '10.00', '2020-07-02 03:56:49', 'Pendiente'),
(36, 37, '14.50', '2020-07-02 04:14:06', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `per_nombre` varchar(20) DEFAULT NULL,
  `per_apellido` varchar(20) DEFAULT NULL,
  `per_dni` varchar(8) DEFAULT NULL,
  `per_email` varchar(250) DEFAULT NULL,
  `per_numero` varchar(9) DEFAULT NULL,
  `per_direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `per_nombre`, `per_apellido`, `per_dni`, `per_email`, `per_numero`, `per_direccion`) VALUES
(25, 'jose                ', 'ramirez             ', '74741985', 'jose@gmail.com                                                    ', '987456321', 'Villa el Salvador - VES                           '),
(32, 'Emma                ', 'Garayar             ', '74741985', 'emma@gmail.com                                                ', '987372725', 'aea                                               '),
(34, 'Maria', 'Gonzales', '74125896', 'maria@gmail.com', '987458745', 'lurin'),
(36, 'ana', 'Garcia', '74125896', 'as@gmail.com', '987456321', 'ass'),
(37, 'Wilson', 'Pujay Iglesias', '75158799', 'wpujay@gmail.com', '996966589', 'av. algarrobos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `pro_nombre` varchar(30) DEFAULT NULL,
  `pro_precio` decimal(4,2) DEFAULT NULL,
  `pro_stock` int(11) DEFAULT NULL,
  `pro_descripcion` varchar(200) DEFAULT NULL,
  `pro_imagen` varchar(60) NOT NULL,
  `ID_marca` int(11) DEFAULT NULL,
  `ID_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_producto`, `pro_nombre`, `pro_precio`, `pro_stock`, `pro_descripcion`, `pro_imagen`, `ID_marca`, `ID_categoria`) VALUES
(2, 'desinfectante de superficies  ', '5.00', 994, 'Usalo para desinfectar, limpiar, evitar la presencia de bacterias, virus y otro tipo de microorganismos peligrosos para la salud.                                                                       ', 'desinfectante de piso_ala.jpg', 1, 3),
(3, 'Detergente Ace                ', '5.00', 14288, 'Detergente muy economico, limpia la ropa sin desgastar los colores                                                                                                                                      ', 'ace_detergente.jpg', 1, 3),
(4, 'lavavajillas en pasta         ', '4.50', 5193, 'Destruye grasa e ilumina tus trastes Consistencia dura que garantiza rendimiento Aroma agradable a limón Para una limpieza superior                                         ', 'lavavajillas_ayudin.jpg', 1, 3),
(5, 'lavavajilla liquida', '10.00', 88, 'Lavavajilla líquida Sapolio Concentrada Botella 1L', 'lavavajilla_liquida_sapolio.png', 8, 1),
(6, 'Frac', '1.50', 100, 'Galletas Frac (chocolate) Paquete 4 unidades', 'frac_costa.jpeg', 7, 2),
(7, 'Chocolate sublime', '1.00', 100, 'Chocolate blanco sublime 100p x 1 unidad', 'sublime_blanco.jpg', 6, 2),
(8, 'Galletas Casino', '0.50', 100, 'galletas-casino-chocolate-1-unidad-35g', 'galletas-casino-chocolate-1-unidad-35g.jpg', 5, 2),
(9, 'Galletas Rellenitas', '0.50', 100, 'rellenita-coco-x40gr', 'rellenita-coco-x40-paq-gn.jpg', 4, 2),
(10, 'conservas de atun             ', '3.00', 65, 'atun enlatado - lomo de atun - 170gr                                                     ', 'atun_en_lata.jpeg', 3, 3),
(11, 'conservas de piña', '5.00', 90, 'piña en rodajas- Rebanadas en almibar - 400gr', 'herdez_lata01.jpeg', 3, 3),
(12, 'sweet corn', '5.00', 100, 'maiz tierno el fortin - lata de 262gr', 'Maiz-Tierno-El-Fortín-Lata-262-grs.jpg', 2, 3),
(13, 'carne enlatada                ', '6.00', 90, 'zenu_chile_de_carne_res - 450gr                                         ', 'zenu_chile_de_carne_res.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipo_usu` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipo_usu`, `rol`, `descripcion`) VALUES
(1, 'Cliente', 'Encargado de hacer los pedidos para ir a recogerlos a la tienda'),
(2, 'Administrador de Pedido', 'Encargado de gestionar los pedidos para los clientes, quienes\r\nrecogerán los productos ya preparados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usu_usuario` char(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usu_password` char(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_tipo_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_persona`, `usu_usuario`, `usu_password`, `id_tipo_usu`) VALUES
(3, 25, 'jose@gmail.com', 'josejosejose', 2),
(12, 34, 'maria@gmail.com', 'MariaMariaMaria', 1),
(14, 36, 'as@gmail.com', 'anaanaana', 2),
(15, 37, 'wpujay@gmail.com', 'wpujaywpujay', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `FK6` (`id_producto`),
  ADD KEY `FK7` (`id_cliente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_det_pedido`),
  ADD KEY `FK3` (`id_producto`),
  ADD KEY `FK4` (`id_pedido`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_marca`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk5555` (`id_persona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`),
  ADD KEY `FK11` (`ID_marca`),
  ADD KEY `FK12` (`ID_categoria`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipo_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk55` (`id_persona`),
  ADD KEY `fk1` (`id_tipo_usu`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_det_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipo_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`ID_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`ID_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK11` FOREIGN KEY (`ID_marca`) REFERENCES `marca` (`ID_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK12` FOREIGN KEY (`ID_categoria`) REFERENCES `categoria` (`ID_categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK8` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK9` FOREIGN KEY (`id_tipo_usu`) REFERENCES `tipousuario` (`id_tipo_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usu`) REFERENCES `tipousuario` (`id_tipo_usu`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
