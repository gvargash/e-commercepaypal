CREATE DATABASE db_kayr3SAC;

USE db_kayr3SAC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `barraSuperior` text NOT NULL,
  `colorSecundario` text NOT NULL,
  `colorHover` text NOT NULL,
  `TextoSuperior` text NOT NULL,
  `colorFondo` text NOT NULL,
  `colorTexto` text NOT NULL,
  `logo` text NOT NULL,
  `icono` text NOT NULL,
  `redesSociales` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `barraSuperior`, `colorSecundario`, `colorHover`, `TextoSuperior`, `colorFondo`, `colorTexto`, `logo`, `icono`, `redesSociales`, `fecha`) VALUES
(1, '#e040fb \r\n', '#880e4f\r\n', '', '#ffffff', '#ad1457', '#ffffff', 'vistas/img/plantilla/kayre.png', 'vistas/img/plantilla/icon.jpg', '[{\r\n		\"red\": \"fa-facebook\",\r\n		\"estilo\": \"facebookPinkDarken\",\r\n		\"url\": \"http://facebook.com/\",\r\n		\"tooltip\":\"kayrePE\"\r\n	}, {\r\n		\"red\": \"fa-envelope\",\r\n		\"estilo\": \"correoPinkDarken\",\r\n		\"url\": \"https://accounts.google.com/\",\r\n		\"tooltip\":\"kayrePE@gmail.com\"\r\n	}, {\r\n		\"red\": \"fa-twitter\",\r\n		\"estilo\": \"twitterPinkDarken\",\r\n		\"url\": \"http://twitter.com/\",\r\n		\"tooltip\":\"@kayrePE\"\r\n	},{\r\n		\"red\": \"fa-google-plus\",\r\n		\"estilo\": \"googlePinkDarken\",\r\n		\"url\": \"http://google.com/\",\r\n		\"tooltip\":\"kayrePlus\"\r\n	}, {\r\n		\"red\": \"fa-instagram\",\r\n		\"estilo\": \"instagramPinkDarken\",\r\n		\"url\": \"http://instagram.com/\",\r\n		\"tooltip\":\"@KayrePeru\"\r\n	},\r\n	{\r\n		\"red\": \"fa-whatsapp\",\r\n		\"estilo\": \"correoPinkDarken\",\r\n		\"url\": \"https://web.whatsapp.com/\",\r\n		\"tooltip\":\"987896544\"\r\n	}\r\n\r\n] ', '2018-02-22 17:10:47');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `ruta` text NOT NULL,
  `img` text NOT NULL,
  `titulo1` text NOT NULL,
  `titulo2` text NOT NULL,
  `titulo3` text NOT NULL,
  `estilo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `ruta`, `img`, `titulo1`, `titulo2`, `titulo3`, `estilo`, `fecha`) VALUES
(1, 'sin-categoria', 'vistas/img/banner/bannerdefault.jpg\r\n\r\n', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"50% off\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Octubre\",\r\n	\"color\": \"#fff\"\r\n}', 'textoDer', '2018-02-22 16:47:05'),
(2, '', 'vistas/img/banner/Cartuchos-de-tinta.jpg', '{\r\n	\"texto\": \"TINTA Y TONER PLAY OFF\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n\r\n	\"texto\": \"¡Entrega inmediata!\",\r\n\r\n	\"color\": \"#fff\"\r\n\r\n}', '{\r\n	\"texto\": \"Sacale provecho a la mejor tecnoliga Print\",\r\n	\"color\": \"#fff\"\r\n}', 'textoIzq', '2018-02-22 16:47:16'),
(3, '', 'vistas/img/banner/TonerS.jpg', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n\r\n	\"texto\": \"50% off\",\r\n\r\n	\"color\": \"#fff\"\r\n\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Diciembre\",\r\n	\"color\": \"#fff\"\r\n}', 'textoCentro', '2018-02-22 16:47:37'),
(4, '', 'vistas/img/banner/Accesorios-para-tinta-y-toner.jpg', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n\r\n	\"texto\": \"50% off\",\r\n\r\n	\"color\": \"#fff\"\r\n\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Noviembre\",\r\n	\"color\": \"#fff\"\r\n}', 'textoDer', '2018-02-22 16:47:46'),
(5, '', 'vistas/img/banner/Repuestos-para-tinta-y-toner.jpg', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"50% off\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Noviembre\",\r\n	\"color\": \"#fff\"\r\n}', 'textoDer', '2018-02-22 16:47:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeceras`
--

CREATE TABLE `cabeceras` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `palabrasClaves` text NOT NULL,
  `portada` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `cabeceras`
--

INSERT INTO `cabeceras` (`id`, `ruta`, `titulo`, `descripcion`, `palabrasClaves`, `portada`, `fecha`) VALUES
(1, 'inicio', 'KAYR3 | Print Intelligence', 'Tintas y tóner en las mejores marcas y al mejor precio', 'tinta,toner,repuesto,accesorios,hp,lexmark,samsung,epson,canon', 'vistas/img/cabeceras/kayr3home.jpg', '2018-03-01 05:32:14');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `impuesto` float NOT NULL,
  `envioNacional` float NOT NULL,
  `envioInternacional` float NOT NULL,
  `tasaMinimaNal` float NOT NULL,
  `tasaMinimaInt` float NOT NULL,
  `pais` text NOT NULL,
  `modoPaypal` text NOT NULL,
  `clienteIdPaypal` text NOT NULL,
  `llaveSecretaPaypal` text NOT NULL,
  `modoPayu` text NOT NULL,
  `merchantIdPayu` int NOT NULL,
  `accountIdPayu` int NOT NULL,
  `apiKeyPayu` text NOT NULL
);


-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `impuesto`, `envioNacional`, `envioInternacional`, `tasaMinimaNal`, `tasaMinimaInt`, `pais`, `modoPaypal`, `clienteIdPaypal`, `llaveSecretaPaypal`, `modoPayu`, `merchantIdPayu`, `accountIdPayu`, `apiKeyPayu`) VALUES
(1, 18, 12, 15, 10, 15, 'PE', 'sandbox', 'AesppheO1zjpUh1ZIOJ4UQ67lAf9wgN9rqRWyE_VAUkVI5v5ame_YfD44w_F6XfkkJ9YoW-HU_51vW2v', 'EN4O7zsXqgzDeEZ494Kz7IK0wIHvzdGw7dEFHdwQkj74Bnmw4r-vc3QN_1XFraD6Q2LcYqPo8gqqO2ZR', '', 0, 0, '');



-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `visitaspaises`
--

CREATE TABLE `visitaspaises` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `pais` text NOT NULL,
  `codigo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `visitaspaises`
--

INSERT INTO `visitaspaises` (`id`, `pais`, `codigo`, `cantidad`, `fecha`) VALUES
(1, 'United States', 'US', 2, '2017-12-05 21:02:46'),
(2, 'Japan', 'JP', 44, '2018-03-01 15:29:39'),
(3, 'Spain', 'ES', 10, '2017-12-05 21:02:53'),
(4, 'Colombia', 'CO', 5, '2017-12-05 21:02:55'),
(5, 'China', 'CN', 3, '2017-12-05 21:04:32'),
(6, 'Germany', 'DE', 34, '2017-12-05 21:04:39'),
(7, 'Mexico', 'MX', 8, '2017-12-05 21:04:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaspersonas`
--

CREATE TABLE `visitaspersonas` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `ip` text  NOT NULL,
  `pais` text  NOT NULL,
  `visitas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `visitaspersonas`
--

INSERT INTO `visitaspersonas` (`id`, `ip`, `pais`, `visitas`, `fecha`) VALUES
(64, '153.205.198.22', 'Japan', 1, '2018-03-01 15:22:14'),
(65, '133.81.214.55', 'Japan', 1, '2018-03-01 15:27:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `imgFondo` text NOT NULL,
  `tipoSlide` text NOT NULL,
  `imgProducto` text NOT NULL,
  `estiloImgProducto` text NOT NULL,
  `estiloTextoSlide` text NOT NULL,
  `titulo1` text NOT NULL,
  `titulo2` text NOT NULL,
  `titulo3` text NOT NULL,
  `boton` text NOT NULL,
  `url` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `fecha`) VALUES
(1, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion1', 'vistas/img/slide/slide1/tonerhp.png', '{\"top\": \"15%\" ,\"right\": \"10%\" ,\"width\": \"45%\", \"left\":\"20%\"}', '{\"top\": \"20%\" ,\"right\": \"\" ,\"width\": \"40%\", \"left\":\"10%\"}', '{\"texto\": \"Lorem Ipsum\" ,\"color\": \"#333\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"bntPersonalizado backColor text-uppercase\">\r\n\r\n							VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2018-02-22 16:43:40'),
(2, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion2', 'vistas/img/slide/slide2/tinta.jpg', '{\r\n	\"width\": \"25%\",\r\n	\"top\": \"5%\",\r\n	\"left\": \"30%\",\r\n        \"right\":\"70%\"\r\n}', '{\r\n	\"width\": \"40%\",\r\n	\"top\": \"15%\",\r\n	\"left\": \"\",\r\n	\"right\": \"15%\"\r\n}', '{\"texto\": \"Lorem Ipsum\" ,\"color\": \"#333\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"bntPersonalizado backColor text-uppercase\">\r\n\r\n							VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2018-02-22 16:43:57'),
(3, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion2', 'vistas/img/slide/slide3/tonersamsung.jpg', '{\r\n	\"width\":\"25%\",\r\n	\"top\":\"5%\",\r\n	\"left\":\"10%\",\r\n        \"right\":\"70%\"\r\n}', '{\r\n	\"width\": \"40%\",\r\n	\"top\": \"15%\",\r\n	\"left\": \"\",\r\n	\"right\": \"15%\"\r\n}', '{\"texto\": \"Lorem Ipsum\" ,\"color\": \"#333\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"bntPersonalizado backColor text-uppercase\">\r\n\r\n							VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2018-02-22 16:44:10'),
(4, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion1', 'vistas/img/slide/slide4/tintasamsung.jpg', '  {\"top\":\"5%\", \"right\":\"15%\", \"width\":\"25%\"}', '{\"top\":\"20%\", \"left\":\"10%\", \"width\":\"40%\",\"right\":\"10%\"}', '{\"texto\": \"Lorem Ipsum\" ,\"color\": \"#333\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"bntPersonalizado backColor text-uppercase\">\r\n\r\n							VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2018-02-22 16:44:22');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipo` varchar(5) PRIMARY KEY NOT NULL,
  `nametipo` varchar(45) NOT NULL,
  `Estado` int(11) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipo`, `nametipo`, `Estado`) VALUES
('UKA01', 'Administrador', 1),
('UKA02', 'Cliente', 1),
('UKA03', 'Invitado', 1);



-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `NombreUsu` varchar(45) DEFAULT NULL,
  `ApellidoUsu` varchar(45) DEFAULT NULL,
  `DNI` char(8) DEFAULT NULL,
  `CorreoUsu` varchar(45) DEFAULT NULL,
  `claveUsu` varchar(64) DEFAULT NULL,
  `fotoUsu` text,
  `EstadoUsu` tinyint(4) DEFAULT NULL,
  `idTipo` varchar(5) NOT NULL,
  `verificacion` int(11) DEFAULT NULL,
  `modo` text,
  `emailEncriptado` text,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`idTipo`) REFERENCES tipo_usuario(`idTipo`) ON UPDATE CASCADE ON DELETE CASCADE
);

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `NombreUsu`, `ApellidoUsu`, `DNI`, `CorreoUsu`, `claveUsu`, `fotoUsu`, `EstadoUsu`, `idTipo`, `verificacion`, `modo`, `emailEncriptado`, `fecha`) VALUES
(43, 'Gildo Vargas', '', 'null', 'gvargas-22-@hotmail.com', 'null', 'http://graph.facebook.com/312568722573906/picture?type=large', 1, 'UKA02', 0, 'facebook', 'null', '2018-02-26 16:31:51'),
(46, 'gildo', 'vargas', 'null', 'gvargas@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auhCV5dQ26uKW3VyHdk8DboQXEemDOQCW', '', 1, 'UKA02', 0, 'directo', '6c3ad773e25c658b76b481385e7756ae', '2018-03-01 20:49:40'),
(47, 'bart', 'simpson', 'null', 'gvargas@edu.pe', '$2a$07$asxx54ahjppf45sd87a5auBVRzC9IGT7TvUDTwO330GZklsUBepbK', 'vistas/img/usuarios/47/664.jpg', 1, 'UKA02', 0, 'directo', '37f5b4bc1ea4bfcbebb733c0bb60959d', '2018-03-01 21:14:04');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `NameCategoria` varchar(45) DEFAULT NULL,
  `ruta` text NOT NULL,
  `Descripcion` text,
  `Estado` int
);

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `NameCategoria`, `ruta`, `Descripcion`, `Estado`) VALUES
(1, 'Tinta', 'Cartuchos-de-tinta', 'Fue popularizado en los 60s con la creación de las hojas &amp;amp;quot;Letraset&amp;amp;quot;, las cuales contenian pasajes de Lorem Ipsum, y más recientemente', 1),
(2, 'Toner', 'Toners', 'Fue popularizado en los 60s con la creación de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y más recientemente', 1),
(3, 'Accesorios', 'Accesorios-para-tinta-y-toner', 'Fue popularizado en los 60s con la creación de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y más recientemente', 1),
(4, 'Repuestos', 'Repuestos-para-tinta-y-toner', 'Fue popularizado en los 60s con la creación de las hojas &quot;Letraset&quot;, las cuales contenian pasajes de Lorem Ipsum, y más recientemente', 1);











-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `NameMarca` varchar(40) DEFAULT NULL,
  `ruta` text NOT NULL,
  `Estado` int  NULL
);

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `NameMarca`, `ruta`, `Estado`) VALUES
(0, 'HP', 'Marca-HP', 1),
(1, 'SAMSUNG', 'Marca-SAMSUNG', 1),
(2, 'LEXMARK', 'MARCA-LEXMARK', 1),
(3, 'CANON', 'Marca-CANON', 1);



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `NombreProducto` varchar(205) NOT NULL,
  `Color` varchar(205) DEFAULT NULL,
  `Rendimiento` varchar(45) DEFAULT NULL,
  `TipoCartucho` varchar(45) DEFAULT NULL,
  `SKU` varchar(45) NOT NULL,
  `Modelo` varchar(45) DEFAULT NULL,
  `Peso` float DEFAULT NULL,
  `GarantíadeProducto` varchar(10) DEFAULT NULL,
  `Compatibilidad` varchar(225) DEFAULT NULL,
  `TecnologiaImpresion` varchar(45) DEFAULT NULL,
  `PrecioOriginal` decimal(8,2) DEFAULT NULL,
  `PrecioKayre` decimal(8,2) NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `Descripcion` longtext,
  `ruta` varchar(220) NOT NULL,
  `entrega` float NOT NULL,
  `vistas` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `nuevo` int(11) NOT NULL,
  `precioOfferta` float NOT NULL,
  `imagenOfferta` text NOT NULL,
  `finOferta` datetime NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imagen` varchar(90) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
   FOREIGN KEY (`idCategoria`) REFERENCES categoria(`idCategoria`) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY (`idMarca`) REFERENCES marca(`idMarca`) ON UPDATE CASCADE ON DELETE CASCADE
 
);

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `NombreProducto`, `Color`, `Rendimiento`, `TipoCartucho`, `SKU`, `Modelo`, `Peso`, `GarantíadeProducto`, `Compatibilidad`, `TecnologiaImpresion`, `PrecioOriginal`, `PrecioKayre`, `Stock`, `Estado`, `Descripcion`, `ruta`, `entrega`, `vistas`, `ventas`, `oferta`, `nuevo`, `precioOfferta`, `imagenOfferta`, `finOferta`, `descuentoOferta`, `imagen`, `idCategoria`, `idMarca`) VALUES
(7, 'Cartucho de Tinta HP 670 Advantage-Negro', 'Negro', '300 pigmentos', 'Con base de pigmentos', 'HP016HP14AJP6LPE', 'CZ113AL', 0.07, '1 año', 'HP Deskjet Ink Advantage', 'Inyección de Tinta', '41.90', '40.00', 8, 1, 'Disfrute las ventajas de la calidad superior de HP a bajo costo. Produzca documentos cotidianos de alta calidad con texto en negro y nítido, mientras mantiene bajos los costos de impresión, utilizando cartuchos de tinta HP originales.', 'Negro-7', 2, 14, 5, 0, 1, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1509910102.png', 1, 0),
(8, 'Cartucho de Tóner HP 90X - Negro', 'Negro', '24000 páginas', '', 'HP016HP1CTKV2LPE', 'CE390X', 0.5, '1 año', 'Impresora HP LaserJet Enterprise M4555f MFP (CE503A)', 'Láser', '999.00', '990.00', 8, 1, 'Impresoras compatibles\r\n\r\nHP LaserJet Enterprise M4555f MFP (CE503A)\r\nHP LaserJet Enterprise M4555h MFP (CE738A)\r\nImpresora HP LaserJet Enterprise 600 M601n (CE989A)\r\nImpresora HP LaserJet Enterprise 600 M602n (CE991A)\r\nImpresora HP LaserJet Enterpri', 'Negro-8', 2, 7, 7, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/toner/1509949998.jpg', 2, 0),
(9, 'Cartucho de Tinta HP 46 - Tricolor', 'Tricolor', '750 páginas', 'Con base de pigmento', 'HP016HP0GO672LPE', 'CZ638AL', 0.07, '1 año', 'HP DeskJet Ink Advantage Ultra 2529; HP DeskJet Ink Advantage Ultra 4729', 'Inyección térmica de tinta', '41.90', '41.90', 7, 1, 'Impresoras compatibles\r\n\r\nHP DeskJet Ink Advantage Ultra 2529 (K7X00A)\r\nHP DeskJet Ink Advantage Ultra 4729 (L8L91A)', 'Tricolor-9', 2, 26, 5, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1510600987.jpg', 1, 0),
(10, 'Cartucho de Tinta HP 670 Advantage-Magenta', 'Magenta', '300 pgs', 'Base de pigmentos', 'HP016EL06ZYVLPE', 'CZ115AL', 0.07, '1 año', 'HP Deskjet Ink 3525, 4615, 4625, 5525', 'Inyeccion', '41.90', '41.90', 56, 1, 'Impresoras Compatibles\r\n\r\nImpresora HP Deskjet Ink Advantage 3525 e-All-in-One (CZ275A)\r\nImpresora HP Deskjet Ink Advantage 4615 All-in-One (CZ283A)\r\nImpresora HP Deskjet Ink Advantage 4625 e-All-in-One (CZ284A)\r\nImpresora HP Deskjet Ink Advantage 55', 'Magenta-10', 2, 5, 8, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1510601707.jpg', 1, 0),
(11, 'Cartucho de Tinta HP 670 Advantage-Cyan', 'Cian', '300 páginas', 'Base de pigmentos', 'HP016EL07ZYULPE', 'CZ114AL', 0.07, '1 año', 'HP Deskjet Ink 3525, 4615, 4625, 5525', 'Inyección', '41.90', '41.90', 6, 1, '', 'Cian-11', 2, 10, 66, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1510602009.jpg', 1, 0),
(12, 'Cartucho de Tinta HP 670 Advantage-Amarillo', 'Amarillo', '300 pgs', 'Base de pigmentos', 'HP016EL05ZYWLPE', 'CZ116AL', 0.07, '1 año', 'HP Deskjet Ink 3525, 4615, 4625, 5525', 'Inyeccion', '41.90', '41.90', 7, 1, 'Impresoras Compatibles\r\n\r\nImpresora HP Deskjet Ink Advantage 3525 e-All-in-One (CZ275A)\r\nImpresora HP Deskjet Ink Advantage 4615 All-in-One (CZ283A)\r\nImpresora HP Deskjet Ink Advantage 4625 e-All-in-One (CZ284A)\r\nImpresora HP Deskjet Ink Advantage 55', 'Amarillo-12', 2, 22, 3, 1, 1, 60, '', '0000-00-00 00:00:00', 40, 'vistas/img/productos/tinta/1510602498.jpg', 1, 0),
(13, 'Cartucho de Tinta HP 670 Advantage-Cyan', 'Magenta', '300 páginas', 'Base de pigmentos', 'HP016EL07ZYULPE', 'CZ114AL', 0.07, '1 año', 'HP Deskjet Ink 3525, 4615, 4625, 5525', 'Inyección', '41.90', '41.90', 6, 1, '', 'Magenta-13', 2, 11, 14, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1510724812.jpg', 1, 0),
(14, 'Cartucho de Tinta HP 670 Advantage-Cyan', 'Cian', '300 páginas', 'Base de pigmentos', 'HP016EL07ZYULPE', 'CZ114AL', 0.07, '1 año', 'HP Deskjet Ink 3525, 4615, 4625, 5525', 'Inyección', '41.90', '41.90', 6, 1, '', 'Cian-14', 2, 44, 13, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1510724774.jpg', 1, 0),
(15, 'Cartucho HP de Tóner 126A LaserJet-Cian', 'Cian', '1.000 paginas', 'Estándar', 'HP065EL0190X2LPE', 'CE311A', 0.5, '1 año', 'HP LaserJet Pro M175a; M175nw; CP1025nw; CP1025nw', 'Laser', '219.00', '220.00', 34, 1, 'Impresoras compatibles\r\n\r\nHP LaserJet Pro 100 color M175a MFP (CE865A)\r\nHP LaserJet Pro 100 color M175nw MFP (CE866A)\r\nHP TopShot LaserJet Pro M275 MFP (CF040A)\r\nImpresora HP Color LaserJet Pro CP1025nw (CE914A)\r\nImpresora HP Color LaserJet Pro CP102', 'Cian-15', 2, 35, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/toner/1511031729.png', 2, 0),
(16, 'Cartucho de Tóner HP 126A LaserJet-Magenta', 'Magenta', '1.000 paginas', 'Estándar', 'HP016EL48PNVPEAMZ', 'CE313A', 0.5, '1 año', 'HP LaserJet Pro M175a; M175nw; CP1025nw; CP1025nw', 'Laser', '219.00', '219.00', 22, 1, 'Impresoras compatibles\r\n\r\nHP LaserJet Pro 100 color M175a MFP (CE865A)\r\nHP LaserJet Pro 100 color M175nw MFP (CE866A)\r\nHP TopShot LaserJet Pro M275 MFP (CF040A)\r\nImpresora HP Color LaserJet Pro CP1025nw (CE914A)\r\nImpresora HP Color LaserJet Pro CP102', 'Magenta-16', 2, 25, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/toner/1510678100.jpg', 2, 0),
(17, 'Cartucho de Tóner HP 126A LaserJet-Negro', 'Negro', '1.200 paginas', 'Estándar', 'HP016HP135TNELPE', 'CE310A', 0.5, '1 año', 'HP LaserJet Pro M175a; M175nw; CP1025nw; CP1025nw', 'Laser', '211.00', '211.00', 22, 1, 'Impresoras compatibles\r\n\r\nHP LaserJet Pro 100 color M175a MFP (CE865A)\r\nHP LaserJet Pro 100 color M175nw MFP (CE866A)\r\nHP TopShot LaserJet Pro M275 MFP (CF040A)\r\nImpresora HP Color LaserJet Pro CP1025nw (CE914A)\r\nImpresora HP Color LaserJet Pro CP102', 'Negro-17', 2, 25, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/toner/1510679131.jpg', 2, 0),
(18, 'Cartucho de Tóner HP 78A-Negro', 'Negro', '2100 paginas', 'Estándar', 'HP016HP0YXN96LPE', 'CE278A', 0.5, '1 año', 'HP CE749A,  HP CE538A', 'Laser', '309.00', '309.00', 22, 1, 'Impresoras compatibles\r\n\r\nHP LaserJet Pro M1536dnf MFP (CE538A)\r\nImpresora HP LaserJet Pro P1606dn (CE749A)', 'Negro-18', 2, 26, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/toner/1510679488.jpg', 2, 0),
(19, 'Combo HP de Rodillos AAD LaserJet-Multicolor', 'Multicolor', '60.000 paginas', '', 'HP016HP15MUZ2LPE', 'CE487C', 0.6, '1 año', 'HP LaserJet CM6040f MFP', 'Laser', '449.00', '449.00', 10, 1, 'Impresoras compatibles\r\n\r\nImpresora HP Color LaserJet CM6040f MFP (Q3939A)\r\nDescripción general del producto\r\n\r\nGarantice una óptima calidad de impresión y eficiencia de trabajo con los kit de mantenimiento para impresora HP.', 'Multicolor-19', 2, 27, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/accesorios/1510722049.jpg', 3, 0),
(20, 'Cartucho de Tinta HP 664XL F6V30AL- Tricolor.', 'Tricolor', '330 pgs', 'Alta Capacidad', 'HP016HP06EZDMLPE', 'F6V30AL', 0.07, '1 año', 'Hp 1115, 2135, 3635, 3835, 4535, 4675', 'Inyeccion', '109.00', '109.00', 22, 1, 'Impresoras Compatibles\r\n\r\nImpresora HP Deskjet Ink Advantage 1115 (F5S21A)\r\nImpresora todo-en-uno HP Deskjet Ink Advantage 2135 (F5S29A)\r\nImpresora todo-en-uno HP Deskjet Ink Advantage 3635 (F5S44A)\r\nImpresora todo-en-uno HP Deskjet Ink Advantage 363', 'Tricolor-20', 2, 28, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1510722539.jpg', 1, 0),
(21, 'Cartucho de Tinta HP 951XL de Alto Rendimiento-Amarillo', 'Amarillo', '1500 paginas', 'Alta Capacidad', 'HP016EL26ZYBLPE', 'CN048AL', 0.07, '1 año', 'Impresora e-Todo-en-Uno HP Officejet Pro 8610 (A7F64A) Impresora e-Todo-en-Uno HP Officejet Pro 8620 (A7F65A) HP Officejet Pro 8100 ePrinter - N811aN811d (CM752A) Impresora e-Todo en Uno HP Officejet Pro 8600 N911a (CM749A) I', 'Inyección Térmica de Tinta HP', '134.50', '134.50', 22, 1, 'Imprima color profesional página tras página, y ahorre costos en comparación con impresoras a láser. Produzca documentos y materiales de marketing realistas con un excelente color vibrante por un costo menor por página y recicle sus cartuchos con fac', 'Amarillo-21', 2, 11, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/tinta/1510723701.jpg', 1, 0),
(22, 'CABEZAL PF-04 CANON', '6 colores integrado (6 chips por cabezal de impresión)', '', 'Cabezal de impresión', '3630B001AA', '3630B001AA', 1.2, '6 meses', 'IMAGEprograf IPF-650 IMAGEprograf IPF-655 IMAGEprograf IPF-750 IMAGEprograf IPF-755 IMAGEprograf IPF-760 IMAGEprograf IPF-765', 'Inyección de tinta a demanda', '3.00', '3.00', 0, 1, 'El uso del cabezal de impresión PF-04 para los plotters canon de la gama Ipf 780 y 785, con la referencia 3630B001AA, permite una línea muy fina ya que tiene 15.360 inyectores repartidos en seis canales de impresión: 5120 inyectores para la tinta MBK', 'cabezal-de-impresion-22', 2, 35, 12, 0, 0, 0, '', '2017-12-02 08:20:34', 0, 'vistas/img/productos/repuestos/1510724671.jpg', 4, 3),
(23, 'Cartucho de Tóner Hp 17A-Negro', 'Negro', '1.600 paginas', '', 'HP016HP1BNJWELPE', 'CF217A', 0.5, '1 año', '(G3Q35A, G3Q60A, G3Q58A, G3Q57A)', 'Laser', '254.00', '254.00', 22, 1, 'Imprima documentos profesionales uniformes y confiables utilizando los cartuchos de toner originales HP con JetIntelligence. Evite las costosas reimpresiones y garantice rendimiento impecable y la calidad de HP que espera, algo que la competencia no ', 'Negro-23', 2, 31, 12, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 'vistas/img/productos/toner/1510726259.jpg', 2, 0),
(24, 'Cartucho de Tinta HP 951XL de Alto Rendimiento-Cya', 'Cian', '1500 paginas', 'Alta Capacidad', 'HP016EL28ZXZLPE', 'CN046AL', 0.07, '1 año', 'Impresora e-Todo-en-Uno HP Officejet Pro 8610, Impresora e-Todo-en-Uno HP Officejet Pro 8620, HP Officejet Pro 8100 ePrinter - N811aN811d, Impresora e-Todo en Uno HP Officejet Pro 8600 N911a, Impresora HP Officejet Pro 251dw,', 'Inyeccion Termica de tinta HP', '134.50', '134.50', 22, 1, 'Imprima color profesional página tras página, y ahorre costos en comparación con impresoras a láser. Produzca documentos y materiales de marketing realistas con un excelente color vibrante por un costo menor por página y recicle sus cartuchos con fac', 'Cian-24', 2, 20, 12, 1, 1, 0, '', '0000-00-00 00:00:00', 10, 'vistas/img/productos/tinta/1510727083.jpg', 1, 0),
(25, '524H Cartucho de tóner', 'Tricolo', '1200 paginas', 'Tóner Unison™', 'KAYR3LEXM00001', '52D4H00', 0.5, '1 año', 'Para impresoras LTX12', 'Lacer', '900.00', '890.00', 4, 1, 'Calidad de imagen consistentemente excelente. Confiabilidad del sistema de larga duración. Sostenibilidad superior. Innovador sistema de impresión estabilizado.', 'Tricolo-2', 2, 2, 0, 0, 0, 0, 'null', '0000-00-00 00:00:00', 0, 'vistas/img/productos/toner/1511777050.png', 2, 2);

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `idUsuario` int NOT NULL,
  `idProducto` int NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   FOREIGN KEY (`idUsuario`) REFERENCES usuario(`idUsuario`) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY (`idProducto`) REFERENCES producto(`idProducto`) ON UPDATE CASCADE ON DELETE CASCADE
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `FechaPedido` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `NumeroPedido` varchar(18) NOT NULL,
  `envio` float NOT NULL,
  `idUsuario` int NOT NULL,
  `SubTotal` decimal(8,2) NOT NULL,
  `CostoEnvio` decimal(8,2) NOT NULL,
  `IGV` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  FOREIGN KEY (`idUsuario`) REFERENCES usuario(`idUsuario`) ON UPDATE CASCADE ON DELETE CASCADE
);

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `FechaPedido`, `NumeroPedido`, `envio`, `idUsuario`, `SubTotal`, `CostoEnvio`, `IGV`, `total`) VALUES
(7, '0000-00-00 00:00:00', 'KYR0000000007', 0, 43, '163.80', '12.00', '29.48', '193.28'),
(8, '0000-00-00 00:00:00', 'KYR0000000008', 0, 46, '1053.80', '12.00', '189.68', '1243.48');
--




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetallePedido` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `cantidad` int NULL,
  `Precio` decimal(8,2)  NULL,
  `idPedido` int NOT NULL,
  `idProducto` int  NOT NULL,
    FOREIGN KEY (`idPedido`) REFERENCES pedido( `idPedido`) ON UPDATE CASCADE ON DELETE CASCADE,
   FOREIGN KEY (`idProducto`) REFERENCES producto(`idProducto`) ON UPDATE CASCADE ON DELETE CASCADE

);

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`idDetallePedido`, `cantidad`, `Precio`, `idPedido`, `idProducto`) VALUES
(5, 2, '41.90', 7, 14),
(6, 2, '40.00', 7, 7),
(7, 2, '41.90', 8, 14),
(8, 2, '40.00', 8, 7),
(9, 1, '890.00', 8, 25);



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciondeentrega`
--

CREATE TABLE `direcciondeentrega` (
  `idDireccion` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `CelularClie` varchar(15) NOT NULL,
  `Telefono` varchar(19) DEFAULT NULL,
  `Direccion` varchar(105) NOT NULL,
  `Referencia` varchar(105) DEFAULT NULL,
  `Departamento` varchar(105) DEFAULT NULL,
  `Provincia` varchar(105) DEFAULT NULL,
  `Distrito` varchar(105) DEFAULT NULL,
  `Estado` int NULL,
  `idUsuario` int NOT NULL,
 FOREIGN KEY (`idUsuario`) REFERENCES usuario(`idUsuario`) ON UPDATE CASCADE ON DELETE CASCADE
);





-- Disparadores `pedido`
--
DELIMITER $$
CREATE TRIGGER `GenerarNumeroPedido` BEFORE INSERT ON `pedido` FOR EACH ROW BEGIN
DECLARE codigo_comp INT(10);
SET codigo_comp=(SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='pedido');
SET NEW.NumeroPedido=CONCAT('KYR',LPAD(codigo_comp,10,'0'));
END
$$
DELIMITER ;