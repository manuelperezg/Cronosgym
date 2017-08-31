-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2017 a las 03:32:13
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbgym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `pass_key` varchar(30) NOT NULL,
  `security` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_user`
--

INSERT INTO `auth_user` (`id`, `login_id`, `pass_key`, `security`, `level`, `sex`, `name`) VALUES
(1, 'admin', 'admin', 'admin', 5, 'male', 'Julio'),
(2, 'cajero', 'cajero', 'cajero', 4, 'male', 'cashier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `healthstatus`
--

CREATE TABLE `healthstatus` (
  `hs_id` int(20) NOT NULL,
  `id` int(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date1` datetime NOT NULL,
  `bodyfat` varchar(25) NOT NULL,
  `water` varchar(30) NOT NULL,
  `muscle` varchar(30) NOT NULL,
  `calorie` varchar(30) NOT NULL,
  `bone` varchar(30) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `healthstatus`
--

INSERT INTO `healthstatus` (`hs_id`, `id`, `name`, `date1`, `bodyfat`, `water`, `muscle`, `calorie`, `bone`, `remarks`) VALUES
(0, 15, '15', '2016-02-14 00:00:00', 'Body Fatwr', 'Waterwr', 'Musclewr', 'Caloriewr', 'Bonewr', 'Remarkswr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mem_types`
--

CREATE TABLE `mem_types` (
  `id` int(11) NOT NULL,
  `mem_type_id` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `days` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mem_types`
--

INSERT INTO `mem_types` (`id`, `mem_type_id`, `name`, `days`, `rate`, `details`) VALUES
(2, 'XKCLTDSJ', 'Mes', 30, 260, 'Mes'),
(4, 'CEJHUNAD', 'test', 30, 300, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsciption`
--

CREATE TABLE `subsciption` (
  `id` int(7) NOT NULL,
  `mem_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sub_type` varchar(100) NOT NULL,
  `paid_date` date NOT NULL,
  `expiry` date NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `sub_type_name` text NOT NULL,
  `bal` int(11) NOT NULL,
  `exp_time` bigint(20) NOT NULL,
  `renewal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subsciption`
--

INSERT INTO `subsciption` (`id`, `mem_id`, `name`, `sub_type`, `paid_date`, `expiry`, `total`, `paid`, `invoice`, `sub_type_name`, `bal`, `exp_time`, `renewal`) VALUES
(15, 1454208171, 'new', 'NUYVCFEJ', '2016-01-31', '2016-02-01', 100, 0, '54208204x8m', 'Per Session', 100, 1454281200, 'yes'),
(16, 1454763163, 'we', 'XKCLTDSJ', '2016-02-06', '2016-03-07', 1000, 0, '54763190hrs', 'Monthly', 1000, 1457305200, 'yes'),
(17, 1494461782, 'Jose Manuel Perez Garcia', 'XKCLTDSJ', '2017-05-10', '2017-06-09', 260, 260, '94462003ipx', 'Mes', 0, 1496959200, 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `mem_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `id` int(7) NOT NULL,
  `wait` varchar(10) NOT NULL,
  `newid` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `zipcode` bigint(20) NOT NULL,
  `birthdate` date NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pic_add` text NOT NULL,
  `height` float NOT NULL,
  `weight` int(11) NOT NULL,
  `nationality` text NOT NULL,
  `facebookaccount` text NOT NULL,
  `twitteraccount` text NOT NULL,
  `contactperson` text NOT NULL,
  `previousgym` text NOT NULL,
  `yearstraining` text NOT NULL,
  `joining` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `proof` text NOT NULL,
  `other_proof` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`id`, `wait`, `newid`, `name`, `address`, `zipcode`, `birthdate`, `contact`, `email`, `pic_add`, `height`, `weight`, `nationality`, `facebookaccount`, `twitteraccount`, `contactperson`, `previousgym`, `yearstraining`, `joining`, `age`, `sex`, `proof`, `other_proof`) VALUES
(14, 'no', 1454208171, 'a', 'new', 6100, '2016-01-05', 9209668896, 'new@gmail.com', '../images/1454208171.png', 6, 130, 'new', 'new', 'new', 'new', 'new', 'new', '2016-01-31', 34, 'Male', 'GSIS Card', ' '),
(15, 'no', 1454763163, 'b', 'we', 0, '2016-02-04', 9209668897, 'we@gmail.com', '../images/1454763163.png', 0, 0, 'we', 'we', 'we', 'we', 'we', 'we', '2016-02-06', 34, 'Male', 'GSIS Card', ' '),
(17, 'no', 1494461782, 'Jose Manuel Perez Garcia', 'Alta vista', 89877, '1997-03-05', 0, 'crashover92@gmail.com', '../images/1494461782.jpg', 0, 0, '', '', '', '', '', '', '2017-05-10', 19, 'Male', '', ' ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `healthstatus`
--
ALTER TABLE `healthstatus`
  ADD PRIMARY KEY (`hs_id`);

--
-- Indices de la tabla `mem_types`
--
ALTER TABLE `mem_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subsciption`
--
ALTER TABLE `subsciption`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mem_types`
--
ALTER TABLE `mem_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `subsciption`
--
ALTER TABLE `subsciption`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
