-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2013 a las 18:04:17
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `amazonas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `id_calificacion` smallint(5) NOT NULL AUTO_INCREMENT,
  `la_calificacion` set('1','2','3','4','5') NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `fecha` datetime NOT NULL,
  `fk_detalle_pedido` smallint(5) NOT NULL,
  `fk_usuario` smallint(5) NOT NULL,
  PRIMARY KEY (`id_calificacion`),
  KEY `FK1_DETALLE_CALIFICACION` (`fk_detalle_pedido`),
  KEY `FK2_USUARIO_CALIFICACION` (`fk_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `calificacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` smallint(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `tipo_categoria` set('principal','sub-categoria') DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcar la base de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `tipo_categoria`) VALUES
(1, 'Accesorio para Vehículos', 'Accesorios para carro, motos, rústicos, autoperiquitos, audio para carros, gps, naúticos', 'principal'),
(2, 'Animales y Mascotas', 'Perros, gatos, caballos, ganado, conejos, roedores, peces, libros animales, accesorios para mascotas', 'principal'),
(3, 'Bebés', 'Alimentación para bebés, sillas para autos, cunas, corrales, coches, artículos de higiene', 'principal'),
(4, 'Cámaras y Accesorios', 'Cámaras convencionales, digitales, video camaras, memorias digitales, accesorios para camara', 'principal'),
(5, 'Celulares y Teléfonos', 'Accesorios para celulares (baterías, carcasas, manos libres, teclados, etc.), celulares, telefonía, radios Walkie Talkies', 'principal'),
(6, 'Coleccionables y Hobbies', 'Bolígrafos, calcomanías, Comics, Figuras y muñecos, Filatelia, Fotografías, Latas y Botellas, Modelismo. Monedas y Billestes, Vehículos en miniatura, Álbumes, Tarjetas Telefónicas', 'principal'),
(7, 'Computación', 'Laptops, Apple, Accesorios para Laptop, Memorias portátiles, Memoria RAM, Monitores, Quemadoras y Discos, Redes, Registradoras y puntos de Venta', 'principal'),
(8, 'Consolas y Videojuegos', 'Consolas, accesorios para consolas, juegos', 'principal'),
(9, 'Deportes y Fitness', 'Accesorios de cualquier deporte, Morrales, koalas, Máquinas de Gimnasio, equipos de Pesca, Patines, etc.', 'principal'),
(10, 'Electrodomésticos', 'Artefactos del hogar, Aires Acondicionados, DVDs, Electrodomésticos de cocina, Neveras y Congeladores, Televisores, Lavadoras y secadoras, ventiladores', 'principal'),
(11, 'Electrónica, Audio y Video', 'Audio Portátil, Radios, Audio Profesional, para el hogar, Calculadoras, Accesorios para Audio y Video, Fotocopiadoras, GPS, Televisores, Tablets', 'principal'),
(12, 'Hogar y Muebles', 'Artículos de Navidad, Baño, Cocina, Dormitorio, Sala y Comedor, Decoración, Herramientas del Hogar, Iluminación', 'principal'),
(13, 'Industrias', 'Construcción, Materiales, Máquinas, Oficinas, Industria Textil, Publicidad y Mercadeo, Seguridad, Testers y Multímetros, Herramientas, Energía Eléctrica', 'principal'),
(14, 'Instrumentos Musicales', 'Audio Profesional, Bajos, Efectos de sonido, Guitarras, Instrumentos de viento, Baterías y Percusión, Teclados y Pianos, Otros', 'principal'),
(15, 'Juegos y Juguetes', 'Figuras y Muñecos, Juegos, Modelismo, Juguetes para bebés, Juguetes, Vehículos para niño', 'principal'),
(16, 'Libros, Música y Películas', 'Afiches de Películas y Libros, Comics, E-books, Libros, Música y Videos, Películas, Revistas, Series de TV, Otros', 'principal'),
(17, 'Relojes, Joyas y Bisutería', 'Joyería y Bisutería, Materiales para joyería, Relojes', 'principal'),
(18, 'Ropa, Zapatos y Accesorios', 'Accesorios de Moda, Carteras, Billeteras, Morrales, Ropa Femenina, Ropa Masculina, Ropa de bebés, de Niños, Zapatos.', 'principal'),
(19, 'Salud y Belleza', 'Cuidado Personal, Cuidado de la Piel, Cuidado del Cabello, Cuidado para las Uñas, Equipos Médicos, Maquillajes, Perfumes y Fragancias', 'principal'),
(20, 'Adultos', 'Artículos para Despedidas, Cosmética, Juguetes eróticos, Lencería, Libros y Revistas, Películas.', 'principal'),
(21, 'Arte y Antigüedades', 'Antigüedades, Artesanía, Cuadros y Pinturas', 'principal'),
(22, 'Bebidas y Alimentos', 'Comestibles', 'principal'),
(23, 'Recuerdos y Cotillones', 'Centros de mesa, Cotillones, Decoraciones y Adornos, Regalos y Recuerdos, Tarjetas y Papelería, Otros.', 'principal'),
(24, 'Otras Categorías', NULL, 'principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE IF NOT EXISTS `destino` (
  `id_destino` smallint(5) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(100) NOT NULL,
  `zona_postal` varchar(50) NOT NULL,
  `fk_lugar` smallint(5) NOT NULL,
  PRIMARY KEY (`id_destino`),
  KEY `FK1_LUGAR_DESTINO` (`fk_lugar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `destino`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id_detalle_pedido` smallint(5) NOT NULL AUTO_INCREMENT,
  `cant_venta` int(10) NOT NULL,
  `precio_venta` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `fk_pedido` smallint(5) NOT NULL,
  `fk_producto` smallint(5) NOT NULL,
  PRIMARY KEY (`id_detalle_pedido`),
  KEY `FK1_PEDIDO_DETALLE` (`fk_pedido`),
  KEY `FK2_PRODUCTO_DETALLEP` (`fk_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detalle_pedido`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_producto`
--

CREATE TABLE IF NOT EXISTS `detalle_producto` (
  `id_detalle` smallint(5) NOT NULL AUTO_INCREMENT,
  `color` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `largo` varchar(50) DEFAULT NULL,
  `ancho` varchar(50) DEFAULT NULL,
  `alto` varchar(50) DEFAULT NULL,
  `fk_producto` smallint(5) NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `FK1_PRODUCTO_DETALLE` (`fk_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detalle_producto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_de_pago`
--

CREATE TABLE IF NOT EXISTS `forma_de_pago` (
  `id_formadepago` smallint(5) NOT NULL AUTO_INCREMENT,
  `num_tarjeta_credito` varchar(30) NOT NULL,
  `fecha_venc` date NOT NULL,
  `marca` varchar(50) NOT NULL,
  `cod_tarjeta` varchar(10) NOT NULL,
  `nombre_tarjeta` varchar(50) NOT NULL,
  `documento_identidad` varchar(50) NOT NULL,
  `fk_usuario` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id_formadepago`),
  KEY `FK1_USUARIO_FORMAPAGO` (`fk_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `forma_de_pago`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `id_lugar` smallint(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo_lugar` set('pais','estado','ciudad') NOT NULL,
  `fk_lugar` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id_lugar`),
  KEY `FK1_LUGAR_LUGAR` (`fk_lugar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Volcar la base de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id_lugar`, `nombre`, `tipo_lugar`, `fk_lugar`) VALUES
(1, 'Venezuela', 'pais', NULL),
(2, 'Dist. Capital', 'estado', 1),
(3, 'Miranda', 'estado', 1),
(4, 'Aragua', 'estado', 1),
(5, 'Carabobo', 'estado', 1),
(6, 'Guárico', 'estado', 1),
(7, 'Yaracuy', 'estado', 1),
(8, 'Lara', 'estado', 1),
(9, 'Falcón', 'estado', 1),
(10, 'Zulia', 'estado', 1),
(11, 'Mérida', 'estado', 1),
(12, 'Barinas', 'estado', 1),
(13, 'Apure', 'estado', 1),
(14, 'Portuguesa', 'estado', 1),
(15, 'Trujillo', 'estado', 1),
(16, 'Táchira', 'estado', 1),
(17, 'Amazonas', 'estado', 1),
(18, 'Bolívar', 'estado', 1),
(19, 'Monagas', 'estado', 1),
(20, 'Anzoátegui', 'estado', 1),
(21, 'Vargas', 'estado', 1),
(22, 'Sucre', 'estado', 1),
(23, 'Nueva Esparta', 'estado', 1),
(24, 'Delta Amacuro', 'estado', 1),
(25, 'Cojedes', 'estado', 1),
(26, 'Caracas', 'ciudad', 2),
(27, 'Los Teques', 'ciudad', 3),
(28, 'Guarenas', 'ciudad', 3),
(29, 'Guatire', 'ciudad', 3),
(30, 'Charallave', 'ciudad', 3),
(31, 'Cúa', 'ciudad', 3),
(32, 'Higuerote', 'ciudad', 3),
(33, 'Río Chico', 'ciudad', 3),
(34, 'Maracay', 'ciudad', 4),
(35, 'El Consejo', 'ciudad', 4),
(36, 'La Victoria', 'ciudad', 4),
(37, 'Valencia', 'ciudad', 5),
(38, 'Pto. Cabello', 'ciudad', 5),
(39, 'San Diego', 'ciudad', 5),
(40, 'Naguanagua', 'ciudad', 5),
(41, 'Guacara ', 'ciudad', 5),
(42, 'Morón', 'ciudad', 5),
(43, 'San Juan de los Morros', 'ciudad', 6),
(44, 'San Felipe', 'ciudad', 7),
(45, 'Barquisimeto', 'ciudad', 8),
(46, 'Coro', 'ciudad', 9),
(47, 'Pto Fijo', 'ciudad', 9),
(48, 'Maracaibo', 'ciudad', 10),
(49, 'Ciudad Ojeda', 'ciudad', 10),
(50, 'Cabimas', 'ciudad', 10),
(51, 'Mérida', 'ciudad', 11),
(52, 'Tovar', 'ciudad', 11),
(53, 'Barinas', 'ciudad', 12),
(54, 'Barinitas', 'ciudad', 12),
(55, 'San Fernando de Apure', 'ciudad', 13),
(56, 'Guanare', 'ciudad', 14),
(57, 'Acarigua', 'ciudad', 14),
(58, 'Trujillo', 'ciudad', 15),
(59, 'San Cristóbal', 'ciudad', 16),
(60, 'Pto. Ayacucho', 'ciudad', 17),
(61, 'Ciudad Bolívar', 'ciudad', 18),
(62, 'Pto. Ordaz', 'ciudad', 18),
(63, 'San Félix', 'ciudad', 18),
(64, 'Guasipati', 'ciudad', 18),
(65, 'Santa Helena de Uairén', 'ciudad', 18),
(66, 'Upata', 'ciudad', 18),
(67, 'Maturín', 'ciudad', 19),
(68, 'Barcelona', 'ciudad', 20),
(69, 'Lecherías', 'ciudad', 20),
(70, 'Clarines', 'ciudad', 20),
(71, 'Pto. La Cruz', 'ciudad', 20),
(72, 'El Tigre', 'ciudad', 20),
(73, 'Pto. Píritu', 'ciudad', 20),
(74, 'La Guaira', 'ciudad', 21),
(75, 'Catia La Mar', 'ciudad', 21),
(76, 'Cumaná', 'ciudad', 22),
(77, 'La Asunción', 'ciudad', 23),
(78, 'Juan Griego', 'ciudad', 23),
(79, 'Porlamar', 'ciudad', 23),
(80, 'Isla Margarita', 'ciudad', 23),
(81, 'Isla Coche', 'ciudad', 23),
(82, 'Isla Cubagua', 'ciudad', 23),
(83, 'Pampatar', 'ciudad', 23),
(84, 'Punta de Piedras', 'ciudad', 23),
(85, 'Tucupita', 'ciudad', 24),
(86, 'San Carlos', 'ciudad', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `id_multimedia` smallint(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `tipo_multimedia` set('foto','video') NOT NULL,
  `principal` set('si','no') NOT NULL,
  `fk_producto` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id_multimedia`),
  KEY `FK1_PRODUCTO_MULTIMEDIA` (`fk_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `multimedia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` smallint(5) NOT NULL AUTO_INCREMENT,
  `fecha_pedido` datetime NOT NULL,
  `monto_total` decimal(10,0) NOT NULL,
  `status` set('en proceso','entregado') DEFAULT NULL,
  `fecha_envio` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `fk_formadepago` smallint(5) NOT NULL,
  `fk_destino` smallint(5) NOT NULL,
  `fk_transporte` smallint(5) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `FK1_FORMAPAGO_PEDIDO` (`fk_formadepago`),
  KEY `FK2_DESTINO_PEDIDO` (`fk_destino`),
  KEY `FK3_TRANSPORTE_PEDIDO` (`fk_transporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pedido`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` smallint(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(6000) NOT NULL,
  `detalle` varchar(1000) NOT NULL,
  `stock` set('si','no') NOT NULL,
  `precio_unit` decimal(10,0) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `estado_producto` set('nuevo','usado') NOT NULL,
  `fk_categoria` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `FK1_CATEGORIA_PRODUCTO` (`fk_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `detalle`, `stock`, `precio_unit`, `cantidad`, `estado_producto`, `fk_categoria`) VALUES
(1, 'Laptop Toshiba C840-sp4225kl 500gb Disco Duro 4 Gb Ram Ddr3', 'Toshiba, más resolución y mejora de audio.\r\n\r\nToshiba tecnología de televisión que inmediatamente aumenta la calidad de las películas, para imágenes más nítidas y colores más vibrantes. Además de eso, con la tecnología Toshiba accesorio de audio, usted puede disfrutar de su música favorita con una calidad de audio nítida y clara incluso en entornos ruidosos.\r\n\r\n14.0 ""WXGA HD SuperView AMD y gráfica dedicada\r\n\r\nLa última Toshiba Satellite C840 viene con el apoyo AMD Dedicado gráficos, se puede disfrutar de un rendimiento gráfico excelente para trabajar y jugar, ya sea para disfrutar de películas o hacer múltiples tareas. Dependiendo de su configuración.\r\n\r\nCaracterísticas\r\n\r\nIntel Core i3-2370M 2.40GHz de 2 núcleos\r\nDisco duro de 500GB\r\nMemoria cache de 3MB\r\nMemoria RAM de 4GB\r\nMemoria RAM tipo DDR3 SDRAM\r\nSistema operativo Windows 7 Home Basic\r\nProcesador gráfico Intel HD Graphics\r\nCámara web HD integrada de 1.3mpx\r\nMicrófono integrado\r\nPantalla con retroiluminación LED TDT LCD de 14""\r\nResolución de pantalla de 1366 X 768 pixeles\r\nInterfaces para entrada de micrófono, auricular, una entrada en combo para cables VGA y LAN, dos puertos USB 2.0\r\nConectividad Wi-Fi 802.11 b/g/n de alta velocidad', 'Laptop Toshiba C840-SP4225KL', 'si', '11499', 20, 'nuevo', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE IF NOT EXISTS `telefono` (
  `id_telefono` smallint(5) NOT NULL AUTO_INCREMENT,
  `codigo` int(10) NOT NULL,
  `numero` int(20) NOT NULL,
  `fk_usuario` smallint(5) NOT NULL,
  PRIMARY KEY (`id_telefono`),
  KEY `FK1_USUARIO_TELEFONO` (`fk_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `codigo`, `numero`, `fk_usuario`) VALUES
(1, 414, 2122941, 1),
(2, 212, 6627456, 1),
(3, 426, 4132065, 2),
(4, 212, 9790974, 2),
(5, 414, 1581881, 3),
(6, 416, 6732793, 3),
(7, 416, 7006871, 4),
(8, 212, 8627324, 4),
(9, 412, 7013812, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE IF NOT EXISTS `transporte` (
  `id_transporte` smallint(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_transporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `transporte`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` smallint(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `estado_usuario` set('activo','inactivo') DEFAULT NULL,
  `zona_postal` varchar(20) DEFAULT NULL,
  `fk_lugar` smallint(5) DEFAULT NULL,
  `codigo_activacion` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `fecha_nac`, `fecha_registro`, `direccion`, `estado_usuario`, `zona_postal`, `fk_lugar`, `codigo_activacion`, `cedula`) VALUES
(1, 'Sheryl', 'Ravelo', 'sheryl.ravelo@gmail.com', '1991-03-08', '2013-04-04', 'El Valle', 'activo', '1090', 26, '', ''),
(2, 'Alberly', 'Martinez', 'alberlymartinez@gmail.com', '1988-10-01', '2013-04-04', 'Santa Inés', 'activo', '1080', 26, '', ''),
(3, 'Carmen', 'Vergara', 'carmen348@gmail.com', '1944-03-08', '2013-04-16', 'Alto Barinas Norte', 'activo', '5201', 53, '', ''),
(4, 'Marielys', 'Guillen', 'marielysg14@gmail.com', '1990-07-14', '2013-04-16', 'Edif. Las Rosas', 'activo', '2006', 39, '', ''),
(5, 'Juan', 'Perozo', 'jperozo89@gmail.com', '1989-01-12', '2013-04-16', 'Montalban III', 'activo', '1020', 26, '', '');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `FK1_DETALLE_CALIFICACION` FOREIGN KEY (`fk_detalle_pedido`) REFERENCES `detalle_pedido` (`id_detalle_pedido`),
  ADD CONSTRAINT `FK2_USUARIO_CALIFICACION` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `FK1_LUGAR_DESTINO` FOREIGN KEY (`fk_lugar`) REFERENCES `lugar` (`id_lugar`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `FK1_PEDIDO_DETALLE` FOREIGN KEY (`fk_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `FK2_PRODUCTO_DETALLEP` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `detalle_producto`
--
ALTER TABLE `detalle_producto`
  ADD CONSTRAINT `FK1_PRODUCTO_DETALLE` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  ADD CONSTRAINT `FK1_USUARIO_FORMAPAGO` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD CONSTRAINT `FK1_LUGAR_LUGAR` FOREIGN KEY (`fk_lugar`) REFERENCES `lugar` (`id_lugar`);

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `FK1_PRODUCTO_MULTIMEDIA` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK1_FORMAPAGO_PEDIDO` FOREIGN KEY (`fk_formadepago`) REFERENCES `forma_de_pago` (`id_formadepago`),
  ADD CONSTRAINT `FK2_DESTINO_PEDIDO` FOREIGN KEY (`fk_destino`) REFERENCES `destino` (`id_destino`),
  ADD CONSTRAINT `FK3_TRANSPORTE_PEDIDO` FOREIGN KEY (`fk_transporte`) REFERENCES `transporte` (`id_transporte`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK1_CATEGORIA_PRODUCTO` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `FK1_USUARIO_TELEFONO` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`);
