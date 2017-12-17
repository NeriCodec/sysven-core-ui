-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2017 a las 05:51:11
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
(1, 'Frappe Pop', 45),
(2, 'Cafe', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_inputs_supplies`
--

CREATE TABLE `products_inputs_supplies` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `quantity_discount` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `measure` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `supplies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products_inputs_supplies`
--

INSERT INTO `products_inputs_supplies` (`id`, `name`, `quantity_discount`, `amount`, `measure`, `quantity`, `supplies_id`) VALUES
(1, 'Bote de pop', 600, 150, 'Onza(s)', 600, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_inputs_use`
--

CREATE TABLE `product_inputs_use` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_input` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product_inputs_use`
--

INSERT INTO `product_inputs_use` (`id`, `products_id`, `product_input`, `quantity`) VALUES
(2, 2, 'Onza(s) de Bote de pop', 1),
(3, 2, 'Onza(s) de Bote de pop', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `total`, `created_at`, `status`, `users_id`) VALUES
(2, 0, '2017-12-15 15:12:48', NULL, 1),
(3, 0, '2017-12-15 15:12:56', NULL, 1),
(4, 0, '2017-12-15 15:12:23', NULL, 1),
(5, 0, '2017-12-15 15:12:50', NULL, 1),
(6, 0, '2017-12-15 15:12:06', NULL, 1),
(7, 0, '2017-12-15 16:12:10', NULL, 1),
(8, 0, '2017-12-15 16:12:17', NULL, 1),
(9, 45, '2017-12-15 16:12:29', NULL, 1),
(10, 0, '2017-12-15 16:12:48', NULL, 1),
(11, 90, '2017-12-15 16:12:01', NULL, 1),
(12, 0, '2017-12-15 16:12:13', NULL, 1),
(13, 45, '2017-12-15 16:12:25', NULL, 1),
(14, 0, '2017-12-15 16:12:31', NULL, 1),
(15, 0, '2017-12-15 16:12:38', NULL, 1),
(16, 0, '2017-12-15 16:12:49', NULL, 1),
(17, 45, '2017-12-15 16:12:01', NULL, 1),
(18, 0, '2017-12-15 20:12:19', NULL, 1),
(19, 0, '2017-12-15 20:12:10', NULL, 1),
(20, 0, '2017-12-15 20:12:23', NULL, 1);

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
(1, 5, 1, 1, 45),
(2, 6, 1, 1, 45),
(3, 7, 1, 2, 90),
(4, 8, 1, 1, 45),
(5, 10, 1, 2, 90),
(6, 12, 1, 1, 45),
(7, 16, 1, 1, 45),
(8, 18, 1, 1, 45),
(9, 19, 1, 1, 45),
(10, 20, 1, 1, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `supplies`
--

INSERT INTO `supplies` (`id`, `name`, `address`) VALUES
(1, 'Juan Ramirez', 'Lago Winnipeg 401 603, Cd. de México');

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
(1, 'neri', '123', '2017-12-15 09:45:27');

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
-- Indices de la tabla `product_inputs_use`
--
ALTER TABLE `product_inputs_use`
  ADD PRIMARY KEY (`id`,`products_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products_inputs_supplies`
--
ALTER TABLE `products_inputs_supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `product_inputs_use`
--
ALTER TABLE `product_inputs_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
