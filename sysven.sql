-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2017 a las 04:16:31
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysven`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'DarkGreen', 123),
(2, 'LightSlateGray', 200),
(3, 'SaddleBrown', 87),
(4, 'LightSlateGray', 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_inputs_supplies`
--

CREATE TABLE `products_inputs_supplies` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `measure` varchar(45) DEFAULT NULL,
  `supplies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_inputs`
--

CREATE TABLE `product_inputs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `measure` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_inputs_use`
--

CREATE TABLE `product_inputs_use` (
  `id` int(11) NOT NULL,
  `product_inputs_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `total`, `created_at`, `users_id`) VALUES
(1, NULL, '2006-10-23 12:04:10', 1),
(2, 28, '1994-04-11 12:00:08', 1),
(3, 20, '1986-05-28 05:22:20', 1),
(4, 11, '1981-06-17 01:57:21', 1),
(5, 10, '1996-04-08 22:48:56', 1),
(6, 41, '2006-04-02 04:41:55', 1),
(7, 80, '1979-02-26 04:36:28', 1),
(8, 14, '1992-01-28 14:04:38', 1),
(9, 47, '2009-09-09 20:26:03', 1),
(10, 85, '2009-04-14 14:34:24', 1),
(11, 13, '2001-05-02 11:34:48', 1),
(12, 86, '1970-07-05 11:05:31', 1),
(13, 46, '2015-11-13 18:22:37', 1),
(14, 20, '2008-10-18 01:39:56', 1),
(15, 22, '1972-05-11 17:20:23', 1),
(16, 83, '2003-08-04 05:14:27', 1),
(17, 35, '1974-08-28 15:21:26', 1),
(18, 85, '2001-06-10 23:16:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales_details`
--

INSERT INTO `sales_details` (`id`, `sales_id`, `products_id`, `quantity`, `subtotal`) VALUES
(2, 1, 2, 63, 80),
(3, 1, 2, 5, 13),
(4, 1, 2, 61, 19),
(5, 1, 3, 25, 94),
(6, 2, 3, 44, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `created_at`) VALUES
(1, 'dejon.bahringer', '$2y$10$3LQhi95Q1MU7wa1djNpZ0./pjQ8xXOxvncK7ZNLxDm.MhPdDfOMSe', '1991-11-26 02:36:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_inputs_supplies`
--
ALTER TABLE `products_inputs_supplies`
  ADD PRIMARY KEY (`id`,`supplies_id`),
  ADD KEY `fk_products_inputs_supplies_supplies1_idx` (`supplies_id`);

--
-- Indices de la tabla `product_inputs`
--
ALTER TABLE `product_inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_inputs_use`
--
ALTER TABLE `product_inputs_use`
  ADD PRIMARY KEY (`id`,`product_inputs_id`,`products_id`),
  ADD KEY `fk_product_inputs_use_product_inputs1_idx` (`product_inputs_id`),
  ADD KEY `fk_product_inputs_use_products1_idx` (`products_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD KEY `fk_sales_users1_idx` (`users_id`);

--
-- Indices de la tabla `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`,`sales_id`,`products_id`),
  ADD KEY `fk_sales_has_products_sales_idx` (`sales_id`),
  ADD KEY `fk_sales_has_products_products1_idx` (`products_id`);

--
-- Indices de la tabla `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products_inputs_supplies`
--
ALTER TABLE `products_inputs_supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_inputs`
--
ALTER TABLE `product_inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products_inputs_supplies`
--
ALTER TABLE `products_inputs_supplies`
  ADD CONSTRAINT `fk_products_inputs_supplies_supplies1` FOREIGN KEY (`supplies_id`) REFERENCES `supplies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_inputs_use`
--
ALTER TABLE `product_inputs_use`
  ADD CONSTRAINT `fk_product_inputs_use_product_inputs1` FOREIGN KEY (`product_inputs_id`) REFERENCES `product_inputs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_inputs_use_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `fk_sales_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_has_products_sales` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
