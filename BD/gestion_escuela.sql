-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2019 a las 15:50:29
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_escuela`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarDocentes` ()  select * from tbl_docentes order by id_docente desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultaRelacionProfesor` (`docente` INT)  select d.nombre as Docente,m.nombre as Materia, m.seccion from tbl_docentes_materias dm inner join tbl_docentes d on dm.docente_id = d.id_docente inner join tbl_materias m 
on dm.materia_id = id_materia where d.id_docente = docente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarEscuelas` ()  SELECT id_escuelas as Codigo, nombre as Escuela,director FROM tbl_escuelas order by id_escuelas DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarEstudiante` ()  select e.id_estudiante as Codigo, e.nombre as Estudiante
 from tbl_estudiante e$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarEstudiantes` ()  select e.id_estudiante as Codigo, e.nombre as Estudiante,t.nombre as Padre
 from tbl_estudiante e inner join tbl_tutor t on e.tutor_id = t.id_tutor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarGrupos` (`grupo` VARCHAR(45))  select g.nombre_grupo as Grupo,e.id_estudiante as Matricula, e.nombre as Estudiante,t.nombre as Padre
 from tbl_grupos g inner join tbl_estudiante e on g.estudiante_id = e.id_estudiante
inner join tbl_tutor t on e.tutor_id = t.id_tutor where g.nombre_grupo = grupo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarHijos` (`tutor` INT)  select g.nombre_grupo as Grupo,e.id_estudiante as Matricula, e.nombre as Estudiante,t.nombre as Padre
 from tbl_grupos g inner join tbl_estudiante e on g.estudiante_id = e.id_estudiante
inner join tbl_tutor t on e.tutor_id = t.id_tutor where t.id_tutor = tutor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarMaterias` ()  select * from tbl_materias$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarRelacionMaterias` (`codigo` INT)  select e.id_estudiante as Matricula,e.nombre as Estudiante, m.nombre as Materia,m.seccion,g.nombre_grupo as Grupo
 from tbl_estudiantes_materias em inner join tbl_estudiante e on e.id_estudiante = em.estudiante_id
inner join tbl_materias m on em.materia_id=m.id_materia inner join tbl_grupos g on e.id_estudiante= g.estudiante_id where e.id_estudiante = codigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarTutor` ()  begin
select * from tbl_tutor;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultarTutores` ()  select * from tbl_tutor where id_tutor > 0   order by id_tutor desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_docentesAmaterias` (`profesor` INT, `materia` INT)  INSERT INTO tbl_docentes_materias(docente_id,materia_id) VALUES (profesor,materia)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_estudiantesAmaterias` (`estudiante` INT, `materia` INT)  BEGIN
INSERT INTO tbl_estudiantes_materias(estudiante_id,materia_id) VALUES (estudiante,materia);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertDocente` (`nombres` VARCHAR(45))  INSERT INTO tbl_docentes (nombre) VALUES (nombres)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertEscuelas` (`nombres` VARCHAR(45), `directores` VARCHAR(45))  INSERT INTO tbl_escuelas (nombre,director) VALUES (nombres,directores)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertEstudiantes` (`nombres` VARCHAR(45), `padre` INT, `grupo` VARCHAR(45))  BEGIN

INSERT INTO tbl_estudiante (nombre,tutor_id) VALUES (nombres,padre);
SELECT @id:=id_estudiante from tbl_estudiante order by id_estudiante DESC limit 1;
INSERT INTO tbl_grupos(nombre_grupo,estudiante_id) VALUES (grupo,@id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertMateria` (`nombres` VARCHAR(45), `seccion` VARCHAR(45))  INSERT INTO tbl_materias (nombre,seccion) VALUES (nombres,seccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertTutores` (`nombres` VARCHAR(45))  INSERT INTO tbl_tutor (nombre) VALUES (nombres)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UpdateGrupos` (`grupo` VARCHAR(45), `estudiante` INT)  update tbl_grupos SET nombre_grupo = grupo WHERE estudiante_id = estudiante$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_docentes`
--

CREATE TABLE `tbl_docentes` (
  `id_docente` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_docentes`
--

INSERT INTO `tbl_docentes` (`id_docente`, `nombre`) VALUES
(1, 'Antonia Zarzuela'),
(2, 'Franny Herrera'),
(3, 'Andrea Solano'),
(4, 'Andres Marcano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_docentes_materias`
--

CREATE TABLE `tbl_docentes_materias` (
  `docente_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_docentes_materias`
--

INSERT INTO `tbl_docentes_materias` (`docente_id`, `materia_id`) VALUES
(1, 1),
(1, 2),
(1, 2),
(2, 1),
(1, 2),
(2, 1),
(2, 2),
(4, 1),
(4, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_escuelas`
--

CREATE TABLE `tbl_escuelas` (
  `id_escuelas` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `director` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_escuelas`
--

INSERT INTO `tbl_escuelas` (`id_escuelas`, `nombre`, `director`) VALUES
(1, 'Escuela Amanecer Dorado', 'Juan Gabriel'),
(2, 'Escuela Ian Chalas', 'Pedro Aquiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiante`
--

CREATE TABLE `tbl_estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_estudiante`
--

INSERT INTO `tbl_estudiante` (`id_estudiante`, `nombre`, `tutor_id`) VALUES
(1, 'Juan Perez', 2),
(2, 'Franny Herrera', 0),
(3, 'Charlies Peguero', 2),
(4, 'Geral Medina', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiantes_materias`
--

CREATE TABLE `tbl_estudiantes_materias` (
  `estudiante_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_estudiantes_materias`
--

INSERT INTO `tbl_estudiantes_materias` (`estudiante_id`, `materia_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(4, 3),
(1, 4),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_grupos`
--

CREATE TABLE `tbl_grupos` (
  `nombre_grupo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estudiante_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_grupos`
--

INSERT INTO `tbl_grupos` (`nombre_grupo`, `estudiante_id`) VALUES
('Grupo 2', 1),
('Grupo 3', 2),
('Grupo 1', 3),
('Grupo 1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_materias`
--

CREATE TABLE `tbl_materias` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `seccion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_materias`
--

INSERT INTO `tbl_materias` (`id_materia`, `nombre`, `seccion`) VALUES
(1, 'Matematica Aplicada', 'MAT-001 L-V 9AM A 11AM'),
(2, 'Lengua Española II', 'M-J 10am - 12pm'),
(3, 'Artistica I', 'L-V 12PM A 2PM'),
(4, 'Redaccion Comercial', 'S 8AM A 11AM'),
(5, 'Informatica Aplicada', 'L-V 3PM A 4PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tutor`
--

CREATE TABLE `tbl_tutor` (
  `id_tutor` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_tutor`
--

INSERT INTO `tbl_tutor` (`id_tutor`, `nombre`) VALUES
(0, 'No Padre o Tutor'),
(2, 'Ana Jimenez'),
(3, 'Maria Tereza'),
(4, 'Luis Alfredo Perez'),
(5, 'Juan Lopez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_docentes`
--
ALTER TABLE `tbl_docentes`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `tbl_escuelas`
--
ALTER TABLE `tbl_escuelas`
  ADD PRIMARY KEY (`id_escuelas`);

--
-- Indices de la tabla `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_docentes`
--
ALTER TABLE `tbl_docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_escuelas`
--
ALTER TABLE `tbl_escuelas`
  MODIFY `id_escuelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_estudiante`
--
ALTER TABLE `tbl_estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_materias`
--
ALTER TABLE `tbl_materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_tutor`
--
ALTER TABLE `tbl_tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
