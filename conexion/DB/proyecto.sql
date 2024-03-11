drop database if exists proyecto;
create database proyecto;
use proyecto;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2024 a las 07:01:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios`
--
CREATE TABLE `usuarios` (
  `id`  INT PRIMARY KEY AUTO_INCREMENT,
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Insercion de datos para la tabla `usuarios`
--
INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `contrasena`, `tipo_usuario`) VALUES
(1, 'usuario1', 'usuario1@gmail.com', 'usuario1', 'normal'),
(2, 'usuario 2', 'usuario2@gmail.com', 'usuario2', 'normal'),
(3, 'usuario 3', 'usuario3@gmail.com', 'usuario3', 'normal'),
(4, 'admin', 'admin@gmail.com', 'admin', 'super');
--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `email` (`email`);
--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

<<<<<<< HEAD
AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


=======
>>>>>>> ddd554144fe2a3c3e727dd31e71bba5bef410613
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL);

  INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Vehiculos Nuevos'),
(2, 'Promociones'),
(3, 'Por Ingresar'),
(4, 'Entrega Inmediata');


-- Estructura de tabla para la tabla `productos`
CREATE TABLE `productos` (
  `id`INT PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_normal` decimal(10,2) NOT NULL,
  `financiado` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL
);
<<<<<<< HEAD

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_normal`, `financiado`, `cantidad`, `imagen`, `id_categoria`) VALUES
(1, 'Toyota', 'Camry', 45000.00, 480.00, 2, 'img/carro1.png', 1),
(2, 'Toyota', '4Runner', 80000.00, 700.00, 3, 'img/carro2.png', 1),
(3, 'Toyota', 'Rav4 Hibrido', 48000.00, 550.00, 1, 'img/carro3.png', 1),
(4, 'Toyota', 'Agya', 25000.00, 299.00, 3, 'img/carro4.png', 1),
(5, 'Ford', 'Explorer LTX', 41000.00, 410.00, 2, 'img/carro5.png', 2),
(6, 'Ford', 'Expedition', 55000.00, 500.00, 1, 'img/carro6.png', 2),
(7, 'Ford', 'Mustang Ecoboost', 63000.00, 590.00, 8, 'img/carro7.png', 3),
(8, 'Hyundai', 'Santa FE', 35300.00, 420.00, 1, 'img/carro8.png', 4);

 Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

  UTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
=======

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_normal`, `financiado`, `cantidad`, `imagen`, `id_categoria`) VALUES
(1, 'Toyota', 'Camry', 45000.00, 480.00, 2, 'img/carro1.png', 1),
(2, 'Toyota', '4Runner', 80000.00, 700.00, 3, 'img/carro2.png', 1),
(3, 'Toyota', 'Rav4 Hibrido', 48000.00, 550.00, 1, 'img/carro3.png', 1),
(4, 'Toyota', 'Agya', 25000.00, 299.00, 3, 'img/carro4.png', 1),
(5, 'Ford', 'Explorer LTX', 41000.00, 410.00, 2, 'img/carro5.png', 2),
(6, 'Ford', 'Expedition', 55000.00, 500.00, 1, 'img/carro6.png', 2),
(7, 'Ford', 'Mustang Ecoboost', 63000.00, 590.00, 8, 'img/carro7.png', 3),
(8, 'Hyundai', 'Santa FE', 35300.00, 420.00, 1, 'img/carro8.png', 4);
>>>>>>> ddd554144fe2a3c3e727dd31e71bba5bef410613


CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--
-- Estructura de tabla para la tabla `historial_compras`
--
CREATE TABLE historial_compras (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fecha_compra DATETIME,
    metodo_pago VARCHAR(255),
    monto_pago DECIMAL(10,2)
);
--
-- Foraneas de la tabla "historial_compras"
--
ALTER TABLE historial_compras
ADD COLUMN producto_id INT,
ADD COLUMN usuario_id INT,
ADD FOREIGN KEY (producto_id) REFERENCES productos(id),
ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
--
-- Inserción de datos
--
INSERT INTO historial_compras (fecha_compra, metodo_pago, monto_pago, producto_id, usuario_id)
VALUES 
('2024-02-15 10:00:00', 'Tarjeta de crédito', 3000000.00, 1, 1),
('2024-02-05 15:30:00', 'Transferencia bancaria', 5000000.00, 2, 2),
('2024-04-20 12:45:00', 'Transferencia bancaria', 7000000.00, 6, 3);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

--
-- Inserción de datos
--
-- select automoviles

select * from proyecto.productos;

select * from proyecto.historial_compras;
-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;