-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2017 a las 12:22:57
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso`
--

CREATE TABLE `aviso` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_mascota` varchar(20) NOT NULL,
  `raza_id` int(11) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `region_id` int(11) NOT NULL,
  `comuna_id` int(11) NOT NULL,
  `descripcion` text,
  `titulo` varchar(35) DEFAULT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipoaviso` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aviso`
--

INSERT INTO `aviso` (`id`, `usuario_id`, `tipo_mascota`, `raza_id`, `genero`, `region_id`, `comuna_id`, `descripcion`, `titulo`, `fecha_publicacion`, `tipoaviso`) VALUES
(10, 3, 'Perro', 14, 1, 1, 4, 'asd', 'asd', '2017-06-28 22:56:01', 'encontrada'),
(11, 3, 'Gato', 122, 1, 1, 4, 'asd', 'asd', '2017-06-28 22:57:17', 'desaparecida'),
(15, 3, 'Perro', 1, 1, 5, 36, 'Regalo esta super mascota, la quiero mucho y quiero que la cuiden', 'Regalo mascota', '2017-06-28 23:00:09', 'adopcion'),
(16, 3, 'Gato', 109, 1, 1, 4, 'asdas', 'asd', '2017-06-29 06:56:14', 'encontrada'),
(17, 3, 'Perro', 2, 1, 1, 4, 'asdasd', 'asdas', '2017-06-29 15:00:02', 'encontrada'),
(18, 3, 'Perro', 1, 1, 1, 4, 'asdasd', 'asd', '2017-06-29 15:00:45', 'encontrada'),
(19, 3, 'Perro', 1, 1, 1, 4, 'la mascota', 'mi mascota', '2017-06-29 16:04:32', 'adopcion'),
(20, 3, 'Perro', 1, 1, 1, 4, 'la mascota', 'mi mascota', '2017-06-29 16:04:32', 'adopcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_adopcion`
--

CREATE TABLE `aviso_adopcion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `edad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aviso_adopcion`
--

INSERT INTO `aviso_adopcion` (`id`, `nombre`, `edad`) VALUES
(15, 'Pepito', '6 meses'),
(19, 'mi ', '+95+9'),
(20, 'mi ', '+95+9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_adoptar`
--

CREATE TABLE `aviso_adoptar` (
  `id` int(11) NOT NULL,
  `edad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_desaparecida`
--

CREATE TABLE `aviso_desaparecida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `edad` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aviso_desaparecida`
--

INSERT INTO `aviso_desaparecida` (`id`, `nombre`, `edad`, `fecha`, `lugar`) VALUES
(11, 'asd', 'asd', '2017-06-09', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso_encontrada`
--

CREATE TABLE `aviso_encontrada` (
  `id` int(11) NOT NULL,
  `fecha_encontrada` date NOT NULL,
  `lugar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aviso_encontrada`
--

INSERT INTO `aviso_encontrada` (`id`, `fecha_encontrada`, `lugar`) VALUES
(10, '2017-06-06', 'asd'),
(16, '2017-06-14', 'asd'),
(17, '2017-06-01', 'asda'),
(18, '2017-06-09', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `comuna` varchar(64) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `comuna`, `region_id`) VALUES
(1, 'Arica', 1),
(2, 'Camarones', 1),
(3, 'General Lagos', 1),
(4, 'Putre', 1),
(5, 'Alto Hospicio', 2),
(6, 'Iquique', 2),
(7, 'Camiña', 2),
(8, 'Colchane', 2),
(9, 'Huara', 2),
(10, 'Pica', 2),
(11, 'Pozo Almonte', 2),
(12, 'Antofagasta', 3),
(13, 'Mejillones', 3),
(14, 'Sierra Gorda', 3),
(15, 'Taltal', 3),
(16, 'Calama', 3),
(17, 'Ollague', 3),
(18, 'San Pedro de Atacama', 3),
(19, 'María Elena', 3),
(20, 'Tocopilla', 3),
(21, 'Chañaral', 4),
(22, 'Diego de Almagro', 4),
(23, 'Caldera', 4),
(24, 'Copiapó', 4),
(25, 'Tierra Amarilla', 4),
(26, 'Alto del Carmen', 4),
(27, 'Freirina', 4),
(28, 'Huasco', 4),
(29, 'Vallenar', 4),
(30, 'Canela', 5),
(31, 'Illapel', 5),
(32, 'Los Vilos', 5),
(33, 'Salamanca', 5),
(34, 'Andacollo', 5),
(35, 'Coquimbo', 5),
(36, 'La Higuera', 5),
(37, 'La Serena', 5),
(38, 'Paihuaco', 5),
(39, 'Vicuña', 5),
(40, 'Combarbalá', 5),
(41, 'Monte Patria', 5),
(42, 'Ovalle', 5),
(43, 'Punitaqui', 5),
(44, 'Río Hurtado', 5),
(45, 'Isla de Pascua', 6),
(46, 'Calle Larga', 6),
(47, 'Los Andes', 6),
(48, 'Rinconada', 6),
(49, 'San Esteban', 6),
(50, 'La Ligua', 6),
(51, 'Papudo', 6),
(52, 'Petorca', 6),
(53, 'Zapallar', 6),
(54, 'Hijuelas', 6),
(55, 'La Calera', 6),
(56, 'La Cruz', 6),
(57, 'Limache', 6),
(58, 'Nogales', 6),
(59, 'Olmué', 6),
(60, 'Quillota', 6),
(61, 'Algarrobo', 6),
(62, 'Cartagena', 6),
(63, 'El Quisco', 6),
(64, 'El Tabo', 6),
(65, 'San Antonio', 6),
(66, 'Santo Domingo', 6),
(67, 'Catemu', 6),
(68, 'Llaillay', 6),
(69, 'Panquehue', 6),
(70, 'Putaendo', 6),
(71, 'San Felipe', 6),
(72, 'Santa María', 6),
(73, 'Casablanca', 6),
(74, 'Concón', 6),
(75, 'Juan Fernández', 6),
(76, 'Puchuncaví', 6),
(77, 'Quilpué', 6),
(78, 'Quintero', 6),
(79, 'Valparaíso', 6),
(80, 'Villa Alemana', 6),
(81, 'Viña del Mar', 6),
(82, 'Colina', 7),
(83, 'Lampa', 7),
(84, 'Tiltil', 7),
(85, 'Pirque', 7),
(86, 'Puente Alto', 7),
(87, 'San José de Maipo', 7),
(88, 'Buin', 7),
(89, 'Calera de Tango', 7),
(90, 'Paine', 7),
(91, 'San Bernardo', 7),
(92, 'Alhué', 7),
(93, 'Curacaví', 7),
(94, 'María Pinto', 7),
(95, 'Melipilla', 7),
(96, 'San Pedro', 7),
(97, 'Cerrillos', 7),
(98, 'Cerro Navia', 7),
(99, 'Conchalí', 7),
(100, 'El Bosque', 7),
(101, 'Estación Central', 7),
(102, 'Huechuraba', 7),
(103, 'Independencia', 7),
(104, 'La Cisterna', 7),
(105, 'La Granja', 7),
(106, 'La Florida', 7),
(107, 'La Pintana', 7),
(108, 'La Reina', 7),
(109, 'Las Condes', 7),
(110, 'Lo Barnechea', 7),
(111, 'Lo Espejo', 7),
(112, 'Lo Prado', 7),
(113, 'Macul', 7),
(114, 'Maipú', 7),
(115, 'Ñuñoa', 7),
(116, 'Pedro Aguirre Cerda', 7),
(117, 'Peñalolén', 7),
(118, 'Providencia', 7),
(119, 'Pudahuel', 7),
(120, 'Quilicura', 7),
(121, 'Quinta Normal', 7),
(122, 'Recoleta', 7),
(123, 'Renca', 7),
(124, 'San Miguel', 7),
(125, 'San Joaquín', 7),
(126, 'San Ramón', 7),
(127, 'Santiago', 7),
(128, 'Vitacura', 7),
(129, 'El Monte', 7),
(130, 'Isla de Maipo', 7),
(131, 'Padre Hurtado', 7),
(132, 'Peñaflor', 7),
(133, 'Talagante', 7),
(134, 'Codegua', 8),
(135, 'Coínco', 8),
(136, 'Coltauco', 8),
(137, 'Doñihue', 8),
(138, 'Graneros', 8),
(139, 'Las Cabras', 8),
(140, 'Machalí', 8),
(141, 'Malloa', 8),
(142, 'Mostazal', 8),
(143, 'Olivar', 8),
(144, 'Peumo', 8),
(145, 'Pichidegua', 8),
(146, 'Quinta de Tilcoco', 8),
(147, 'Rancagua', 8),
(148, 'Rengo', 8),
(149, 'Requínoa', 8),
(150, 'San Vicente de Tagua Tagua', 8),
(151, 'La Estrella', 8),
(152, 'Litueche', 8),
(153, 'Marchihue', 8),
(154, 'Navidad', 8),
(155, 'Peredones', 8),
(156, 'Pichilemu', 8),
(157, 'Chépica', 8),
(158, 'Chimbarongo', 8),
(159, 'Lolol', 8),
(160, 'Nancagua', 8),
(161, 'Palmilla', 8),
(162, 'Peralillo', 8),
(163, 'Placilla', 8),
(164, 'Pumanque', 8),
(165, 'San Fernando', 8),
(166, 'Santa Cruz', 8),
(167, 'Cauquenes', 9),
(168, 'Chanco', 9),
(169, 'Pelluhue', 9),
(170, 'Curicó', 9),
(171, 'Hualañé', 9),
(172, 'Licantén', 9),
(173, 'Molina', 9),
(174, 'Rauco', 9),
(175, 'Romeral', 9),
(176, 'Sagrada Familia', 9),
(177, 'Teno', 9),
(178, 'Vichuquén', 9),
(179, 'Colbún', 9),
(180, 'Linares', 9),
(181, 'Longaví', 9),
(182, 'Parral', 9),
(183, 'Retiro', 9),
(184, 'San Javier', 9),
(185, 'Villa Alegre', 9),
(186, 'Yerbas Buenas', 9),
(187, 'Constitución', 9),
(188, 'Curepto', 9),
(189, 'Empedrado', 9),
(190, 'Maule', 9),
(191, 'Pelarco', 9),
(192, 'Pencahue', 9),
(193, 'Río Claro', 9),
(194, 'San Clemente', 9),
(195, 'San Rafael', 9),
(196, 'Talca', 9),
(197, 'Arauco', 10),
(198, 'Cañete', 10),
(199, 'Contulmo', 10),
(200, 'Curanilahue', 10),
(201, 'Lebu', 10),
(202, 'Los Álamos', 10),
(203, 'Tirúa', 10),
(204, 'Alto Biobío', 10),
(205, 'Antuco', 10),
(206, 'Cabrero', 10),
(207, 'Laja', 10),
(208, 'Los Ángeles', 10),
(209, 'Mulchén', 10),
(210, 'Nacimiento', 10),
(211, 'Negrete', 10),
(212, 'Quilaco', 10),
(213, 'Quilleco', 10),
(214, 'San Rosendo', 10),
(215, 'Santa Bárbara', 10),
(216, 'Tucapel', 10),
(217, 'Yumbel', 10),
(218, 'Chiguayante', 10),
(219, 'Concepción', 10),
(220, 'Coronel', 10),
(221, 'Florida', 10),
(222, 'Hualpén', 10),
(223, 'Hualqui', 10),
(224, 'Lota', 10),
(225, 'Penco', 10),
(226, 'San Pedro de La Paz', 10),
(227, 'Santa Juana', 10),
(228, 'Talcahuano', 10),
(229, 'Tomé', 10),
(230, 'Bulnes', 10),
(231, 'Chillán', 10),
(232, 'Chillán Viejo', 10),
(233, 'Cobquecura', 10),
(234, 'Coelemu', 10),
(235, 'Coihueco', 10),
(236, 'El Carmen', 10),
(237, 'Ninhue', 10),
(238, 'Ñiquen', 10),
(239, 'Pemuco', 10),
(240, 'Pinto', 10),
(241, 'Portezuelo', 10),
(242, 'Quillón', 10),
(243, 'Quirihue', 10),
(244, 'Ránquil', 10),
(245, 'San Carlos', 10),
(246, 'San Fabián', 10),
(247, 'San Ignacio', 10),
(248, 'San Nicolás', 10),
(249, 'Treguaco', 10),
(250, 'Yungay', 10),
(251, 'Carahue', 11),
(252, 'Cholchol', 11),
(253, 'Cunco', 11),
(254, 'Curarrehue', 11),
(255, 'Freire', 11),
(256, 'Galvarino', 11),
(257, 'Gorbea', 11),
(258, 'Lautaro', 11),
(259, 'Loncoche', 11),
(260, 'Melipeuco', 11),
(261, 'Nueva Imperial', 11),
(262, 'Padre Las Casas', 11),
(263, 'Perquenco', 11),
(264, 'Pitrufquén', 11),
(265, 'Pucón', 11),
(266, 'Saavedra', 11),
(267, 'Temuco', 11),
(268, 'Teodoro Schmidt', 11),
(269, 'Toltén', 11),
(270, 'Vilcún', 11),
(271, 'Villarrica', 11),
(272, 'Angol', 11),
(273, 'Collipulli', 11),
(274, 'Curacautín', 11),
(275, 'Ercilla', 11),
(276, 'Lonquimay', 11),
(277, 'Los Sauces', 11),
(278, 'Lumaco', 11),
(279, 'Purén', 11),
(280, 'Renaico', 11),
(281, 'Traiguén', 11),
(282, 'Victoria', 11),
(283, 'Corral', 12),
(284, 'Lanco', 12),
(285, 'Los Lagos', 12),
(286, 'Máfil', 12),
(287, 'Mariquina', 12),
(288, 'Paillaco', 12),
(289, 'Panguipulli', 12),
(290, 'Valdivia', 12),
(291, 'Futrono', 12),
(292, 'La Unión', 12),
(293, 'Lago Ranco', 12),
(294, 'Río Bueno', 12),
(295, 'Ancud', 13),
(296, 'Castro', 13),
(297, 'Chonchi', 13),
(298, 'Curaco de Vélez', 13),
(299, 'Dalcahue', 13),
(300, 'Puqueldón', 13),
(301, 'Queilén', 13),
(302, 'Quemchi', 13),
(303, 'Quellón', 13),
(304, 'Quinchao', 13),
(305, 'Calbuco', 13),
(306, 'Cochamó', 13),
(307, 'Fresia', 13),
(308, 'Frutillar', 13),
(309, 'Llanquihue', 13),
(310, 'Los Muermos', 13),
(311, 'Maullín', 13),
(312, 'Puerto Montt', 13),
(313, 'Puerto Varas', 13),
(314, 'Osorno', 13),
(315, 'Puero Octay', 13),
(316, 'Purranque', 13),
(317, 'Puyehue', 13),
(318, 'Río Negro', 13),
(319, 'San Juan de la Costa', 13),
(320, 'San Pablo', 13),
(321, 'Chaitén', 13),
(322, 'Futaleufú', 13),
(323, 'Hualaihué', 13),
(324, 'Palena', 13),
(325, 'Aisén', 14),
(326, 'Cisnes', 14),
(327, 'Guaitecas', 14),
(328, 'Cochrane', 14),
(329, 'O\'higgins', 14),
(330, 'Tortel', 14),
(331, 'Coihaique', 14),
(332, 'Lago Verde', 14),
(333, 'Chile Chico', 14),
(334, 'Río Ibáñez', 14),
(335, 'Antártica', 15),
(336, 'Cabo de Hornos', 15),
(337, 'Laguna Blanca', 15),
(338, 'Punta Arenas', 15),
(339, 'Río Verde', 15),
(340, 'San Gregorio', 15),
(341, 'Porvenir', 15),
(342, 'Primavera', 15),
(343, 'Timaukel', 15),
(344, 'Natales', 15),
(345, 'Torres del Paine', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comuna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id`, `region_id`, `usuario_id`, `comuna_id`) VALUES
(1, 12, 2, 285),
(2, 1, 3, 4),
(3, 12, 4, 290),
(4, 6, 5, 50),
(5, 5, 6, 42),
(6, 1, 7, 2),
(7, 1, 8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `raza_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `comuna_id` int(11) NOT NULL,
  `lugar` varchar(100) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `genero` tinyint(1) NOT NULL,
  `descripcion` text NOT NULL,
  `titulo` varchar(35) DEFAULT NULL,
  `tipo_aviso` varchar(10) NOT NULL,
  `tipo_mascota` varchar(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `edad` date DEFAULT NULL,
  `nombre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `aviso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `url`, `aviso_id`) VALUES
(2, 'f069a4eb9d9958c37ce4b48dd43096eaf0866198.jpeg', 10),
(3, '298ce5b78d3057a50015ce37fe776dde951608f4.jpg', 11),
(4, '5ef25c509ac5a120e261a0cf655c9baaf259cf38.jpeg', 15),
(5, '8859f03ee34a1f131fd34cd46821eaf32e38ac2c.jpeg', 16),
(6, '3b4c1ad9b9024fabeaf730b6ce51c48b14544e0a.jpg', 16),
(7, '900b5324d0f1feea0d34c788a7a1aaead3ab4270.jpeg', 17),
(8, '49b5f0665ec989625d5b84bf4d838e46bd1f3fc3.jpeg', 18),
(9, 'bea7fc75db16096e942f96ec36b68170d86cc735.jpeg', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `id` int(11) NOT NULL,
  `raza` varchar(100) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`id`, `raza`, `tipo`) VALUES
(1, 'Akita Inu', 'Perro'),
(2, 'Alaskan Malamute', 'Perro'),
(3, 'American Cocker Spaniel', 'Perro'),
(4, 'American Pit bull Terrier', 'Perro'),
(5, 'Australian Terrier', 'Perro'),
(6, 'Balkan Hound', 'Perro'),
(7, 'Basenji', 'Perro'),
(8, 'Basset Hound', 'Perro'),
(9, 'Beagle', 'Perro'),
(10, 'Bearded Collie', 'Perro'),
(11, 'Beauceron', 'Perro'),
(12, 'Bichón Habanero', 'Perro'),
(13, 'Bichón Maltés', 'Perro'),
(14, 'Bloodhound o Perro de San Huberto', 'Perro'),
(15, 'Bobtail', 'Perro'),
(16, 'Border Terrier', 'Perro'),
(17, 'Borzoi', 'Perro'),
(18, 'Boston Terrier', 'Perro'),
(19, 'Bóxer', 'Perro'),
(20, 'Boyero Australiano', 'Perro'),
(21, 'Boyero de Flandes', 'Perro'),
(22, 'Braco Alemán', 'Perro'),
(23, 'Braco Francés', 'Perro'),
(24, 'Bretón Español', 'Perro'),
(25, 'Bull Terrier', 'Perro'),
(26, 'Bulldog Francés', 'Perro'),
(27, 'Bulldog Inglés', 'Perro'),
(28, 'Bullmastiff', 'Perro'),
(29, 'Caniche', 'Perro'),
(30, 'Carlino', 'Perro'),
(31, 'Chart Polski', 'Perro'),
(32, 'Chihuahua', 'Perro'),
(33, 'Chin Japonés', 'Perro'),
(34, 'Chow chow', 'Perro'),
(35, 'Cimarrón Uruguayo', 'Perro'),
(36, 'Cocker Spaniel Inglés', 'Perro'),
(37, 'Collie', 'Perro'),
(38, 'Crestado Chino', 'Perro'),
(39, 'Dálmata', 'Perro'),
(40, 'Deutsch Drahthaar', 'Perro'),
(41, 'Doberman', 'Perro'),
(42, 'Dogo Alemán', 'Perro'),
(43, 'Dogo Argentino', 'Perro'),
(44, 'Dogo de Burdeos', 'Perro'),
(45, 'Fila Brasileño', 'Perro'),
(46, 'Fox Terrier', 'Perro'),
(47, 'Foxhound Inglés', 'Perro'),
(48, 'Galgo Español', 'Perro'),
(49, 'Golden Retriever', 'Perro'),
(50, 'Gos D\'Atura', 'Perro'),
(51, 'Grifón de Bohemia', 'Perro'),
(52, 'Hovawart', 'Perro'),
(53, 'Husky Siberiano', 'Perro'),
(54, 'Iceland Sheepdog', 'Perro'),
(55, 'Irish Wolfhound', 'Perro'),
(56, 'Jack Russell Terrier', 'Perro'),
(57, 'Kelpie Australiano', 'Perro'),
(58, 'Kuvasz', 'Perro'),
(59, 'Labrador Retriever', 'Perro'),
(60, 'Lebrel Afgano', 'Perro'),
(61, 'Lebrel Escocés', 'Perro'),
(62, 'Leonberger', 'Perro'),
(63, 'Lhasa Apso', 'Perro'),
(64, 'Mastín de los Pirineos', 'Perro'),
(65, 'Otterhound', 'Perro'),
(66, 'Pastor Alemán', 'Perro'),
(67, 'Pastor Belga', 'Perro'),
(68, 'Pastor Ganadero Australiano', 'Perro'),
(69, 'Pastor Garafiano', 'Perro'),
(70, 'Papillón', 'Perro'),
(71, 'Pequinés', 'Perro'),
(72, 'Pembroke Welsh Corgi', 'Perro'),
(73, 'Perro de Agua Español', 'Perro'),
(74, 'Perro de Agua Francés', 'Perro'),
(75, 'Perro sin Pelo Mexicano o Xoloitzcuintle', 'Perro'),
(76, 'Perro sin Pelo del Perú', 'Perro'),
(77, 'Petit Basset Griffon', 'Perro'),
(78, 'Pinscher', 'Perro'),
(79, 'Podenco Canario', 'Perro'),
(80, 'Podenco Ibicenco', 'Perro'),
(81, 'Pointer Inglés', 'Perro'),
(82, 'Pomerania', 'Perro'),
(83, 'Presa Canario', 'Perro'),
(84, 'Puli', 'Perro'),
(85, 'Ratón Bodeguero Andaluz', 'Perro'),
(86, 'Retriever de pelo rizado', 'Perro'),
(87, 'Rottweiler', 'Perro'),
(88, 'San Bernardo', 'Perro'),
(89, 'Samoyedo', 'Perro'),
(90, 'Schnauzer', 'Perro'),
(91, 'Scottish Terrier', 'Perro'),
(92, 'Setter Irlandés', 'Perro'),
(93, 'Shar Pei', 'Perro'),
(94, 'Shetland Sheepdog', 'Perro'),
(95, 'Shih Tzu', 'Perro'),
(96, 'Spinone italiano', 'Perro'),
(97, 'Teckel', 'Perro'),
(98, 'Terranova', 'Perro'),
(99, 'Terrier Australiano', 'Perro'),
(100, 'Terrier Checo', 'Perro'),
(101, 'Terrier Japonés', 'Perro'),
(102, 'Terrier Tibetano', 'Perro'),
(103, 'Tosa Inu', 'Perro'),
(104, 'Weimaraner', 'Perro'),
(105, 'West Highland White Terrier', 'Perro'),
(106, 'Yorkshire Terrier', 'Perro'),
(108, 'Africano doméstico', 'Gato'),
(109, 'American Curl', 'Gato'),
(110, 'American shorthair', 'Gato'),
(111, 'American wirehair', 'Gato'),
(112, 'Angora turco', 'Gato'),
(113, 'Aphrodite-s Giants', 'Gato'),
(114, 'Australian Mist', 'Gato'),
(115, 'Azul ruso', 'Gato'),
(116, 'Bengala', 'Gato'),
(117, 'Bobtail japonés', 'Gato'),
(118, 'Bombay', 'Gato'),
(119, 'Bosque de Noruega', 'Gato'),
(120, 'Brazilian Shorthair', 'Gato'),
(121, 'British Shorthair', 'Gato'),
(122, 'Burmés', 'Gato'),
(123, 'Burmilla', 'Gato'),
(124, 'California Spangled', 'Gato'),
(125, 'Ceylon', 'Gato'),
(126, 'Chartreux', 'Gato'),
(127, 'Cornish rex', 'Gato'),
(128, 'Cymric', 'Gato'),
(129, 'Deutsch Langhaar', 'Gato'),
(130, 'Devon rex', 'Gato'),
(131, 'Don Sphynx', 'Gato'),
(132, 'Dorado africano', 'Gato'),
(133, 'Europeo común', 'Gato'),
(134, 'Gato exótico', 'Gato'),
(135, 'German Rex', 'Gato'),
(136, 'Habana brown', 'Gato'),
(137, 'Himalayo', 'Gato'),
(138, 'Khao Manee', 'Gato'),
(139, 'Korat', 'Gato'),
(140, 'Maine Coon', 'Gato'),
(141, 'Manx', 'Gato'),
(142, 'Mau egipcio', 'Gato'),
(143, 'Munchkin', 'Gato'),
(144, 'Ocicat', 'Gato'),
(145, 'Ojos azules', 'Gato'),
(146, 'Oriental', 'Gato'),
(147, 'Oriental de pelo largo', 'Gato'),
(148, 'Persa', 'Gato'),
(149, 'Peterbald', 'Gato'),
(150, 'Pixi Bob', 'Gato'),
(151, 'Ragdoll', 'Gato'),
(152, 'Sagrado de Birmania', 'Gato'),
(153, 'Scottish Fold', 'Gato'),
(154, 'Selkirk rex', 'Gato'),
(155, 'Serengeti', 'Gato'),
(156, 'Seychellois', 'Gato'),
(157, 'Siamés', 'Gato'),
(158, 'Siamés Moderno', 'Gato'),
(159, 'Siamés Tradicional', 'Gato'),
(160, 'Siberiano', 'Gato'),
(161, 'Snowshoe', 'Gato'),
(162, 'Sphynx', 'Gato'),
(163, 'Tonkinés', 'Gato'),
(164, 'Van Turco', 'Gato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `region`) VALUES
(1, 'XV Arica y Parinacota'),
(2, 'I Tarapacá'),
(3, 'II Antofagasta'),
(4, 'III Atacama'),
(5, 'IV Coquimbo'),
(6, 'V Valparaiso'),
(7, 'RM Metropolitana de Santiago'),
(8, 'VI Libertador General Bernardo O\'Higgins'),
(9, 'VII Maule'),
(10, 'VIII Biobío'),
(11, 'IX La Araucanía'),
(12, 'XIV Los Ríos'),
(13, 'X Los Lagos'),
(14, 'XI Aisén del General Carlos Ibáñez del Campo'),
(15, 'XII Magallanes y de la Antártica Chilena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `numero_celular` varchar(9) DEFAULT NULL,
  `numero_fijo` varchar(9) DEFAULT NULL,
  `fecha_creada` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `email`, `pass`, `numero_celular`, `numero_fijo`, `fecha_creada`) VALUES
(2, 'Alex', 'Labbe', 'alex@gmail.com', '$2y$10$Y0zeJERGRTW2nwftBEruNuIuwdi8hH17IykLLsTfJQj7aLw1IhCPi', '998944365', '', '2017-05-29 02:47:11'),
(3, 'pepee', 'lopez', 'pepe@gmail.com', '$2y$10$9O8xyML9VEhtzJdxukRyaOiopYN3Z4jJKK9wclPpT5RvG.ZM14Mam', '849898', '', '2017-06-28 23:17:11'),
(4, 'Hernán', 'Fontánez Pérez', 'hernanfontanez@gmail.com', '$2y$10$/0vds.QaciTC4zHNB2hxcuLKI1v3HPXT5D4kiLVLm.61a6sWlzbvC', '954879313', '', '2017-06-07 03:49:31'),
(5, 'pepito', 'perez', 'pepito@gmail.com', '$2y$10$Cvj1SVAhgzxM084uKmK5BekK/FcLnMdrffWFg.3H2KwGJE4b28QAG', '4898', '', '2017-06-09 01:05:12'),
(6, 'claudiio', 'sdfq', 'gabo@gmail.com', '$2y$10$waBGRGXKzSEjWoY/DXFVyemlxH7IOhwUi0lFB40Tn2/F6/Ekdn0ka', '46465', '5646546', '2017-06-23 14:28:24'),
(7, 'claudi', 'asd', 'clau@gmail.com', '$2y$10$m.a88SRPbQKxbVxdFGOxQeirJ/F1V7lytvEYys6g0fk5PN1oG/Geq', '648', '84968', '2017-06-23 14:49:22'),
(8, 'asd', 'asd', 'juan@gmail.com', '$2y$10$RTavT6cbn5ULzL9M2PC.ZeJ7kP7sxuQW330Lv7Iq0BINAgbow2wKW', '98489', '98498', '2017-06-25 00:19:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aviso_raza` (`raza_id`),
  ADD KEY `fk_aviso_comuna` (`comuna_id`),
  ADD KEY `fk_aviso_region` (`region_id`);
ALTER TABLE `aviso` ADD FULLTEXT KEY `descripcion` (`descripcion`,`titulo`);

--
-- Indices de la tabla `aviso_adopcion`
--
ALTER TABLE `aviso_adopcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aviso_adoptar`
--
ALTER TABLE `aviso_adoptar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aviso_desaparecida`
--
ALTER TABLE `aviso_desaparecida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aviso_encontrada`
--
ALTER TABLE `aviso_encontrada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comuna_region` (`region_id`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `comuna_id` (`comuna_id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historial_usuario` (`usuario_id`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `fk_imagen_direccion` (`aviso_id`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviso`
--
ALTER TABLE `aviso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `aviso_encontrada`
--
ALTER TABLE `aviso_encontrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;
--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `raza`
--
ALTER TABLE `raza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD CONSTRAINT `fk_aviso_comuna` FOREIGN KEY (`comuna_id`) REFERENCES `comuna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aviso_raza` FOREIGN KEY (`raza_id`) REFERENCES `raza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aviso_region` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `aviso_adopcion`
--
ALTER TABLE `aviso_adopcion`
  ADD CONSTRAINT `aviso_adopcion_ibfk_1` FOREIGN KEY (`id`) REFERENCES `aviso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aviso_adoptar`
--
ALTER TABLE `aviso_adoptar`
  ADD CONSTRAINT `aviso_adoptar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `aviso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aviso_desaparecida`
--
ALTER TABLE `aviso_desaparecida`
  ADD CONSTRAINT `aviso_desaparecida_ibfk_1` FOREIGN KEY (`id`) REFERENCES `aviso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aviso_encontrada`
--
ALTER TABLE `aviso_encontrada`
  ADD CONSTRAINT `aviso_encontrada_ibfk_1` FOREIGN KEY (`id`) REFERENCES `aviso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `fk_comuna_region` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `direccion_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `direccion_ibfk_3` FOREIGN KEY (`comuna_id`) REFERENCES `comuna` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_direccion` FOREIGN KEY (`aviso_id`) REFERENCES `aviso` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
