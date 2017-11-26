-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2017 a las 21:10:02
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
(1, 'hot dog', 18),
(2, 'Mrs. Ashleigh Dietrich Sr.', 169),
(3, 'Lime', 165);

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

--
-- Volcado de datos para la tabla `products_inputs_supplies`
--

INSERT INTO `products_inputs_supplies` (`id`, `name`, `price`, `amount`, `measure`, `supplies_id`) VALUES
(1, 'Bote de helado', 350, 2, 'onzas', 1),
(2, 'Mrs. Hilma Lang', 674, 39, 'Aliquam.', 1);

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
  `num_articles` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `detail` text,
  `users_id` int(11) NOT NULL,
  `num_sale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `num_articles`, `total`, `detail`, `users_id`, `num_sale`) VALUES
(1, 23848, 80259, 'Et fugiat natus est voluptates veritatis. Est debitis cum enim. Natus aut eligendi excepturi labore.', 1, NULL),
(2, 565, 943560553, 'Blanditiis reiciendis dignissimos qui autem. Aut repudiandae aut fuga. Adipisci iure corporis qui qui officia.', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_has_products`
--

CREATE TABLE `sales_has_products` (
  `id` int(11) NOT NULL,
  `sales_num_sale` int(11) NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Jasinto', 'Lago Winnipef 401, Ciudad de México'),
(2, 'Prof. Wilhelmine Buckridge III', '3027 Lesly Estate\nPort Jabari, DC 80798');

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
(1, 'admin', '12345678', '2017-11-25 18:11:35'),
(2, 'Jeanne West Jr.', '$2y$10$IrDyDxrOeY8kfM4uU/DCz.p.PAATnwoBJoZskh88B2KRjXNM9zR/i', NULL),
(3, 'Carlie Heathcote', '$2y$10$ARdlnYaHb7p9dh9Puh7YzuggH3TWC7ldF7QxopnDNf5GXGUc4RGNa', NULL),
(4, 'Emerson Hermiston', '$2y$10$QDx2UWJT9J6Sm/6CXnid6ON6dh9ziEq4oIbaHJF7z9WcU8YirqlvK', '1994-05-15 22:41:33'),
(5, 'juston58', '$2y$10$OxO97rTvG8egdVFUybKHDusP3qpo/KbP2TrgQ.Q77oVGHXcDLDrKW', '2009-01-19 16:36:32'),
(6, 'xrath', '$2y$10$Cy0s9HNmdmqXny2/LmvQ6uJfZV3s0RrCemq0PuBEfqP7Y/2NaXGEi', '1995-09-16 13:26:46');

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
-- Indices de la tabla `sales_has_products`
--
ALTER TABLE sales_details
  ADD PRIMARY KEY (`id`,`sales_num_sale`,`products_id`),
  ADD KEY `fk_sales_has_products_sales_idx` (`sales_num_sale`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products_inputs_supplies`
--
ALTER TABLE `products_inputs_supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product_inputs`
--
ALTER TABLE `product_inputs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sales_has_products`
--
ALTER TABLE sales_details
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Filtros para la tabla `sales_has_products`
--
ALTER TABLE sales_details
  ADD CONSTRAINT `fk_sales_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_has_products_sales` FOREIGN KEY (`sales_num_sale`) REFERENCES `sales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
