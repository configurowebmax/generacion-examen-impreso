-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2025 a las 18:45:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `generacion-examen-impreso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choice_list`
--

CREATE TABLE `choice_list` (
  `question_id` int(30) NOT NULL,
  `choice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `choice_list`
--

INSERT INTO `choice_list` (`question_id`, `choice`) VALUES
(1, 'Nullam eu dui scelerisque'),
(1, 'viverra nisi sit amet'),
(1, 'volutpat ipsum'),
(1, 'Aenean odio nunc'),
(2, 'Choice 1'),
(2, 'Choice 2'),
(2, 'Choice 2'),
(2, 'Choice 4'),
(2, 'Choice 5'),
(5, 'Choice 1'),
(5, 'Choice 2'),
(5, 'Choice 3'),
(6, 'Option 1'),
(6, 'Option 2'),
(6, 'Option 3'),
(7, 'Choice 101'),
(7, 'Choice 102'),
(7, 'Choice 103'),
(9, 'Option 101'),
(9, 'Option 102'),
(9, 'Option 103'),
(9, 'Option 104'),
(9, 'Option 105'),
(8, 'option 101'),
(8, 'option 102'),
(8, 'option 103'),
(8, 'option 104'),
(8, 'option 105'),
(11, 'Aquel'),
(11, 'Ese'),
(11, 'Yo soy el que Soy'),
(12, 'El que está arriba'),
(12, 'El que está abajo'),
(12, 'El que fue'),
(12, 'Yo no fui'),
(14, 'Es imposible definir la raíz cuadra de -1'),
(14, 'Se abre la ventana a los números imaginarios'),
(14, 'Es sencillo el resultado es 1 al cuadrado'),
(15, 'Solo se que nada se'),
(15, 'Detrás del último no hay nadie'),
(15, 'Pienso luego existo'),
(15, 'Ninguna de las anteriores'),
(17, 'Un discurso'),
(17, 'Una negociaciòn entre dos o màs partes'),
(17, 'Le gestiòn de toma de decisiones'),
(17, 'Ninguna de las anteriores'),
(18, 'La gestiòn de la dialèctica'),
(18, 'Una disyuntiva taxativa'),
(18, 'La idea de dos planteamiendo fusionados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class_list`
--

CREATE TABLE `class_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `class_list`
--

INSERT INTO `class_list` (`id`, `user_id`, `course_id`, `name`, `description`, `delete_flag`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 3, 'BSIS 1A - Test101', 'Sample Class only', 1, 1, '2022-02-23 13:16:28', '2024-10-14 10:25:46'),
(2, 1, 2, 'BSIT 1B - Test102', 'Sample Class for Test 102 Subject.', 1, 1, '2022-02-23 13:17:58', '2024-10-14 10:25:50'),
(3, 1, 3, 'BSIS', 'Bachelor of Science in Information Systems', 1, 1, '2022-02-23 13:19:14', '2022-02-23 13:20:10'),
(4, 3, 5, 'Carros Eléctricos', 'Especialidad Enfocada en el aprendizaje de la mecánica de carros eléctricos.', 0, 1, '2024-10-13 16:13:23', NULL),
(5, 3, 6, 'Introducción a los números imaginarios', 'Explicación de la lógica contra intuitiva de la física cuántica.', 0, 1, '2024-10-14 10:10:00', NULL),
(6, 4, 7, 'Transición del Teocentristo al Antropocentrismo', 'Se evalua la transiciòn de teocentrismo a antropocentrismo y su repercusión en el renacimiento', 0, 1, '2024-10-14 16:26:43', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_list`
--

CREATE TABLE `course_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `course_list`
--

INSERT INTO `course_list` (`id`, `user_id`, `name`, `description`, `delete_flag`, `status`, `date_created`, `date_updated`) VALUES
(2, 1, 'BSIT', 'Bachelor of Science in Information Technology', 1, 1, '2022-02-23 12:07:00', '2024-10-14 10:25:34'),
(3, 1, 'BSIS', 'Bachelor of Science in Information Systems', 1, 1, '2022-02-23 13:00:12', '2024-10-14 10:25:29'),
(4, 1, 'test', 'test', 1, 1, '2022-02-23 13:18:11', '2022-02-23 13:18:57'),
(5, 3, 'Ingeniería  Automotriz', 'Ingeniería Avanzada de Automóviles', 0, 1, '2024-10-13 16:12:06', NULL),
(6, 3, 'Física Cuántica', 'Curso de física y mecánica cuántica', 0, 1, '2024-10-14 10:08:29', NULL),
(7, 4, 'Ciencias Sociales', 'Estudio de las Ciencias Sociales', 0, 1, '2024-10-14 16:12:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_list`
--

CREATE TABLE `question_list` (
  `id` int(30) NOT NULL,
  `question_paper_id` int(30) NOT NULL,
  `question` text NOT NULL,
  `mark` double NOT NULL DEFAULT 0,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = single answer, \r\n2= multi-answer,\r\n3 = text answer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `question_list`
--

INSERT INTO `question_list` (`id`, `question_paper_id`, `question`, `mark`, `type`) VALUES
(1, 2, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Vestibulum non turpis dui. Aliquam rutrum semper neque id faucibus. Praesent et interdum tortor. Nulla tortor magna, tincidunt in elementum et, laoreet vitae mi. Curabitur ultrices sapien vitae fringilla scelerisque. Phasellus feugiat ac nisl quis aliquet. Nulla facilisi. Duis eget justo laoreet quam pretium varius.</span><br></p>', 5, 1),
(2, 2, '<p>Question 101</p>', 5, 2),
(3, 2, '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Nam in condimentum augue. Morbi efficitur facilisis dolor eu molestie. Suspendisse faucibus lorem et finibus ultricies. Maecenas feugiat ultrices metus, id pellentesque elit. Maecenas eros nunc, accumsan a augue ac, scelerisque ullamcorper dolor. Curabitur aliquet dapibus quam. Sed est ipsum, egestas vel odio vel, varius rutrum mauris. In tempor mi a eleifend imperdiet. Donec nec laoreet lectus, quis viverra neque. Donec a consectetur diam.</span><br></p>', 15, 3),
(5, 2, '<p>Question 102</p>', 1, 1),
(6, 2, '<p>Question 103</p>', 1, 1),
(7, 2, '<p>Multiple 102</p>', 5, 2),
(8, 2, '<p>Multiple 103</p>', 10, 2),
(9, 2, '<p>Multiple 103</p>', 10, 2),
(10, 2, '<p>Sample Question only</p>', 20, 3),
(11, 4, '<p>Pregunta Existencial Quien soy Yo</p>', 3, 1),
(12, 4, '<p>Quien viene de abajo</p>', 0, 2),
(13, 4, '<p>Si no fuiste tu, quien fue?</p>', 1, 3),
(14, 5, '<p>Como resolver la consulta de raíz cuadrada de -1</p>', 5, 1),
(15, 5, '<p>Frases de fisico cuántico celebres</p>', 5, 2),
(16, 5, '<p>Dime que es lo más te gusta de la física cuántica</p>', 5, 3),
(17, 6, '<p>Que es la onomatopeya</p>', 5, 1),
(18, 6, '<p>Que es la dieresis</p>', 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_paper_list`
--

CREATE TABLE `question_paper_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `question_paper_list`
--

INSERT INTO `question_paper_list` (`id`, `user_id`, `class_id`, `title`, `description`, `delete_flag`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 'Sample Exam 101', 'Nam in condimentum augue. Morbi efficitur facilisis dolor eu molestie. Suspendisse faucibus lorem et finibus ultricies. Maecenas feugiat ultrices metus, id pellentesque elit. Maecenas eros nunc, accumsan a augue ac, scelerisque ullamcorper dolor. Curabitur aliquet dapibus quam. Sed est ipsum, egestas vel odio vel, varius rutrum mauris. In tempor mi a eleifend imperdiet. Donec nec laoreet lectus, quis viverra neque. Donec a consectetur diam.', 1, 1, '2022-02-23 13:37:01', '2024-10-14 10:25:57'),
(2, 1, 2, 'Sample Exam 2', 'Vestibulum non turpis dui. Aliquam rutrum semper neque id faucibus. Praesent et interdum tortor. Nulla tortor magna, tincidunt in elementum et, laoreet vitae mi. Curabitur ultrices sapien vitae fringilla scelerisque. Phasellus feugiat ac nisl quis aliquet. Nulla facilisi. Duis eget justo laoreet quam pretium varius.', 1, 1, '2022-02-23 13:42:57', '2024-10-14 10:26:03'),
(3, 1, 1, 'test', 'test', 1, 0, '2022-02-23 13:55:24', '2022-02-23 13:55:27'),
(4, 3, 4, 'Carros Eléctricos Autónomos', 'Contesta las siguuientes preguntas', 0, 1, '2024-10-13 16:14:46', '2024-10-13 16:19:37'),
(5, 3, 5, 'Concepto de los números imaginarios', 'Definición del concepto de los números imaginarios a partir de la raíz cuadrada de -1', 0, 1, '2024-10-14 10:11:11', NULL),
(6, 4, 6, 'Definiciòn del Renacimiento', 'Aplicacion de las ideas de rene descartes al renacimiento', 0, 1, '2024-10-14 16:27:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registered_user_list`
--

CREATE TABLE `registered_user_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registered_user_list`
--

INSERT INTO `registered_user_list` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `dob`, `contact`, `email`, `password`, `avatar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'William', 'Pedro', 'Maria', 'Femenino', '1997-10-14', '09456789123', 'cblake@sample.com', '4744ddea876b11dcb1d169fadf494418', 'uploads/rusers/1.png?v=1728943141', 1, 0, '2022-02-23 11:27:57', '2024-10-14 16:59:01'),
(2, 'Alonso', '', 'Coral', 'Masculino', '1997-07-15', '3121231231', 'acoral@appscweb.com', '4b67deeb9aba04a5b54632ad19934f26', 'uploads/rusers/2.png?v=1728943344', 1, 0, '2022-02-23 11:29:47', '2024-10-14 17:02:24'),
(3, 'Juan', '', 'Usuario', 'Male', '1995-06-14', '3025897412', 'jusuario@appscweb.com', '4b67deeb9aba04a5b54632ad19934f26', 'uploads/rusers/3.jpg?v=1728853768', 1, 0, '2024-10-13 16:09:28', '2024-10-13 16:09:28'),
(4, 'Bonifacio', '', 'Gonzalez', 'Masculino', '1995-10-25', '3026549874', 'bgonzalez@appscweb.com', '4b67deeb9aba04a5b54632ad19934f26', 'uploads/rusers/4.png?v=1728940286', 1, 0, '2024-10-14 16:11:25', '2024-10-14 16:11:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Generación de Examen Impreso'),
(6, 'short_name', 'GEI'),
(11, 'logo', 'uploads/logo-1728861710.png?v=1728861710'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1728922992.jpg?v=1728922992'),
(45, 'company_name', 'ConfiguroWeb'),
(46, 'company_tel_no', '+573042702375'),
(47, 'company_mobile', '+573042702375'),
(48, 'company_email', 'hola@configuroweb.com'),
(49, 'company_address', 'Calle 45 N 23 23'),
(50, 'company_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum quam nulla, eu ultricies odio aliquet sit amet. Pellentesque ullamcorper magna vitae feugiat tempor. Phasellus efficitur, ligula non accumsan vulputate, felis lacus lobortis sem, commodo rutrum elit ligula vitae dolor. Cras tristique turpis nunc, vel porttitor ligula maximus ac. Quisque a vehicula felis. Aenean condimentum lectus et purus vulputate egestas. Duis quis scelerisque orci. Sed urna ligula, cursus quis turpis vitae, porta rhoncus arcu. Suspendisse gravida vulputate laoreet.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Mauricio', 'Sevilla', 'configuroweb', '4b67deeb9aba04a5b54632ad19934f26', 'uploads/avatars/1.JPG?v=1728941989', NULL, 1, '2021-01-20 14:02:37', '2025-04-19 11:43:12'),
(5, 'Pedro', 'Staff', 'pstaff@appscweb.com', '4b67deeb9aba04a5b54632ad19934f26', 'uploads/avatars/5.png?v=1728919619', NULL, 2, '2022-02-22 15:29:03', '2024-10-14 10:26:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `choice_list`
--
ALTER TABLE `choice_list`
  ADD KEY `question_id` (`question_id`);

--
-- Indices de la tabla `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indices de la tabla `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `question_list`
--
ALTER TABLE `question_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_paper_id` (`question_paper_id`);

--
-- Indices de la tabla `question_paper_list`
--
ALTER TABLE `question_paper_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`class_id`);

--
-- Indices de la tabla `registered_user_list`
--
ALTER TABLE `registered_user_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT de la tabla `class_list`
--
ALTER TABLE `class_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `question_list`
--
ALTER TABLE `question_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `question_paper_list`
--
ALTER TABLE `question_paper_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registered_user_list`
--
ALTER TABLE `registered_user_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `choice_list`
--
ALTER TABLE `choice_list`
  ADD CONSTRAINT `choice_question_id_FK` FOREIGN KEY (`question_id`) REFERENCES `question_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `class_list`
--
ALTER TABLE `class_list`
  ADD CONSTRAINT `class_course_id_FK` FOREIGN KEY (`course_id`) REFERENCES `course_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `class_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `registered_user_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `course_list`
--
ALTER TABLE `course_list`
  ADD CONSTRAINT `course_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `registered_user_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `question_paper_list`
--
ALTER TABLE `question_paper_list`
  ADD CONSTRAINT `qp_class_id_FK` FOREIGN KEY (`class_id`) REFERENCES `class_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `qp_user_id FK` FOREIGN KEY (`user_id`) REFERENCES `registered_user_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
