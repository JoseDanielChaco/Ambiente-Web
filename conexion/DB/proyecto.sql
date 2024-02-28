Create database proyecto;

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

--
-- Base de datos: `logins`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Insersion de datos para la tabla `usuarios`
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
  ADD PRIMARY KEY (`id`),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL);


  INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Vehiculos nuevos'),
(2, 'promociones'),
(3, 'Por ingresar'),
(4, 'Entrega Inmediata');


--Estructura de tabla para la tabla `productos`


CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio_normal` decimal(10,2) NOT NULL,
  `Financiado` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL
) 

--
-- 

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio_normal`, `Financiado`, `cantidad`, `imagen`, `id_categoria`) VALUES
(1, 'Toyota', 'Camry', '45000', '480.00', 2, 'assets/img/carro1.jpg', 1),
(2, 'Toyota', '4Runner', '80000.00', '700.00', 3, 'assets/img/carro2.jpg', 1),
(3, 'Toyota', 'Rav4 Hibrido', '48000.00', '550.00', 1, 'assets/img/carro3.png', 1),
(4, 'Toyota', 'Agya', '25000.00', '299.00', 3, 'assets/img/carro4.png', 1),
(5, 'Ford', 'Explorer LTX', '41000.00', '410.00', 2, 'assets/img/carro5.jpg', 2),
(6, 'Ford', 'Expedition', '55000.00', '500.00', 1, 'assets/img/carro6.jpg', 2),
(7, 'Ford', 'Mustang Ecoboost', '63000.00', '590.00', 8, 'assets/img/carro7.jpg', 3),
(8, 'Hyundai', 'Santa FE', '35300.00', '420.00', 1, 'assets/img/carro8.jpg', 4);



CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);