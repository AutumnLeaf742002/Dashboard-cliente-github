-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-01-2023 a las 23:14:59
-- Versión del servidor: 10.3.37-MariaDB-cll-lve
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qscbkfcv_dashboard`
--

DELIMITER $$
--
-- Procedimientos
--
$$

$$

$$

$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrators`
--

CREATE TABLE `administrators` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Cell` varchar(20) NOT NULL,
  `Carnet` varchar(20) DEFAULT NULL,
  `Id_rol` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrators`
--

INSERT INTO `administrators` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Id_rol`, `User`, `Password`) VALUES
(1, '11cimedia_master', 'support@pasteureastcoast.com', 'dwasdwasdw', 'wdsadaqwdasd', 1, '11cimedia_master', '72e3122badd13ad326a19c78241bcc0be7b1c97044519f8b8a2fcb48fd815d9f'),
(2, 'Alexis', 'alex742002@gmail.com', '8293909241', '402-11112', 1, 'alex742002', '05a47acbb4b01180e5ec8bc07a0355dab2a8e67c8cb06cb88ffbc041a3add6b2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analyst`
--

CREATE TABLE `analyst` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Cell` varchar(20) NOT NULL,
  `Carnet` varchar(20) DEFAULT NULL,
  `Start_date` varchar(10) NOT NULL,
  `Recruiter` varchar(100) DEFAULT NULL,
  `Id_office` int(11) NOT NULL,
  `Id_supervisor` int(11) DEFAULT NULL,
  `Id_rol` int(11) NOT NULL,
  `Comision` varchar(100) DEFAULT NULL,
  `User` varchar(50) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `analyst`
--

INSERT INTO `analyst` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Start_date`, `Recruiter`, `Id_office`, `Id_supervisor`, `Id_rol`, `Comision`, `User`, `Password`, `Foto`) VALUES
(1, 'Analista prueba 1', 'analista_prueba_1@gmail.com', 'celular prueba 1', 'carnet prueba 1', '2022-12-22', 'Reclutador', 1, 1, 3, '50%', 'analista_prueba_1', '2c336882a2477c184e1fa2d27de1bf50ad80c1f521e8d17ded49d15151eb34f6', '1GplJz8lE2BLWGt9WWM4G3rpDzeq8ds3enqvvb45derPLaFEqal94YXdypJgy9zl6WoxuR-WhatsApp Image 2022-09-23 at 16.54.40.jpeg'),
(2, 'Wdsadwdsadwdwd', 'wdsadwdsadwdwd@gmail.com', 'wdsadwdsadwdwd', 'wdsadwdsadwdwd', '2023-01-25', 'Wdsadwdsadwdwd', 2, 2, 3, NULL, '', 'b6d3c2620bcb86b0db7f7016ad83d5767cc9e0c78c7ab5cf5cce414f819c95a7', 'acfDRsGJeOnKIuitntclKPIYcc6gWEqF4JGZhq2Vlirsxc9PR1iEfkhIlxRq1jRd-cod3.png'),
(4, 'Analista prueba 2', 'analista_prueba_2@gmail.com', 'analista_prueba_2', 'analista_prueba_2', '2023-01-06', 'Analista_prueba_2', 1, 1, 3, NULL, 'analista_prueba_2', '4a927ba190e10556def52e1879bf4941dfd7e74710fe4830c2b336b66e1ef4f3', 'ddGBLGtYYkJKVinUTlN1AOXPL5RW5rNP9YGbBzjtfkBi8T1QrDBmaycqFtG9cyeHbVN2-cod3.png'),
(5, 'Refresco con soda', 'refresco@gmail.com', 'refrescorefresco', 'refresco', '2023-01-07', 'Refresco', 2, 1, 3, '', 'refresco', '4773b156ad35304c49d2b86de96745f77a0d655efe640be2555c2d2cdac079e1', 'm3jP41lZhKXhGSMQ6nsEvBqWa27KMSErPLyM42WQJFzu3ccPnpKnkbd61885O3WS2u53s-WhatsApp Image 2022-11-27 at 16.17.14.jpeg');

--
-- Disparadores `analyst`
--
DELIMITER $$
CREATE TRIGGER `actualiza_id_office_clientes` AFTER UPDATE ON `analyst` FOR EACH ROW BEGIN
  UPDATE clientes SET Id_office = NEW.Id_office WHERE Nombre_representante = NEW.Id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Id` int(11) NOT NULL,
  `Id_cliente` int(11) NOT NULL,
  `Id_plomero` int(11) NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `Hora` varchar(10) NOT NULL,
  `Estado_cita` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id` int(11) NOT NULL,
  `Primer_nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Fecha_nacimiento` varchar(10) NOT NULL,
  `N_seguro_social` varchar(30) NOT NULL,
  `N_licencia_conducir` varchar(30) DEFAULT NULL,
  `Estado` varchar(50) NOT NULL,
  `Vencimiento` varchar(10) NOT NULL,
  `Direccion` varchar(300) NOT NULL,
  `Cuanto_tiempo` varchar(50) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `Estado_ciudad` varchar(50) NOT NULL,
  `Zip` varchar(30) NOT NULL,
  `Telefono_casa` varchar(20) DEFAULT NULL,
  `Telefono_celular` varchar(20) NOT NULL,
  `Direccion_anterior` varchar(300) DEFAULT NULL,
  `Ciudad_anterior` varchar(50) DEFAULT NULL,
  `Estado_anterior` varchar(50) DEFAULT NULL,
  `Zip_anterior` varchar(30) DEFAULT NULL,
  `Correo` varchar(50) NOT NULL,
  `Nombre_empleo` varchar(50) NOT NULL,
  `Direccion_empleo` varchar(300) NOT NULL,
  `Tiempo_empleo` varchar(50) NOT NULL,
  `Telefono_empleo` varchar(20) NOT NULL,
  `Posicion_empleo` varchar(50) NOT NULL,
  `Ingreso_bruto` varchar(50) NOT NULL,
  `Tipo_ingreso` varchar(50) NOT NULL,
  `Empleador_anterior` varchar(100) DEFAULT NULL,
  `Fecha_empleo_anterior` varchar(30) DEFAULT NULL,
  `Ciudad_empleo_anterior` varchar(100) DEFAULT NULL,
  `Estado_empleo_anterior` varchar(100) DEFAULT NULL,
  `Zip_empleo_anterior` varchar(30) DEFAULT NULL,
  `N_telefono_empleo_anterior` varchar(20) DEFAULT NULL,
  `Fuente_ingreso_extra` varchar(100) DEFAULT NULL,
  `Cantidad_fuente_ingreso_extra` varchar(50) DEFAULT NULL,
  `Id_hipoteca_estado` int(10) DEFAULT NULL,
  `Id_tipo_residencia_hipoteca` int(10) DEFAULT NULL,
  `Propietario_hipoteca_titular` varchar(100) DEFAULT NULL,
  `Direccion_hipoteca` varchar(100) DEFAULT NULL,
  `Pago_hipoteca` varchar(30) DEFAULT NULL,
  `N_telefono_hipoteca` varchar(30) DEFAULT NULL,
  `Referencia_pariente_nombre_1` varchar(100) NOT NULL,
  `Referencia_pariente_direccion_1` varchar(300) NOT NULL,
  `Referencia_pariente_telefono_1` varchar(20) NOT NULL,
  `Referencia_pariente_relacion_1` varchar(50) NOT NULL,
  `Referencia_pariente_nombre_2` varchar(100) DEFAULT NULL,
  `Referencia_pariente_direccion_2` varchar(300) DEFAULT NULL,
  `Referencia_pariente_telefono_2` varchar(20) DEFAULT NULL,
  `Referencia_pariente_relacion_2` varchar(50) DEFAULT NULL,
  `Fecha_creacion_registro` varchar(10) NOT NULL,
  `Cantidad_financiada` varchar(50) NOT NULL,
  `Nombre_representante` int(11) NOT NULL,
  `Avatar` varchar(10) NOT NULL,
  `N_serie_cliente` varchar(20) DEFAULT NULL,
  `Fecha_mantenimiento` varchar(20) DEFAULT NULL,
  `Estatus` int(11) DEFAULT NULL,
  `Id_office` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id`, `Primer_nombre`, `Apellido`, `Fecha_nacimiento`, `N_seguro_social`, `N_licencia_conducir`, `Estado`, `Vencimiento`, `Direccion`, `Cuanto_tiempo`, `Ciudad`, `Estado_ciudad`, `Zip`, `Telefono_casa`, `Telefono_celular`, `Direccion_anterior`, `Ciudad_anterior`, `Estado_anterior`, `Zip_anterior`, `Correo`, `Nombre_empleo`, `Direccion_empleo`, `Tiempo_empleo`, `Telefono_empleo`, `Posicion_empleo`, `Ingreso_bruto`, `Tipo_ingreso`, `Empleador_anterior`, `Fecha_empleo_anterior`, `Ciudad_empleo_anterior`, `Estado_empleo_anterior`, `Zip_empleo_anterior`, `N_telefono_empleo_anterior`, `Fuente_ingreso_extra`, `Cantidad_fuente_ingreso_extra`, `Id_hipoteca_estado`, `Id_tipo_residencia_hipoteca`, `Propietario_hipoteca_titular`, `Direccion_hipoteca`, `Pago_hipoteca`, `N_telefono_hipoteca`, `Referencia_pariente_nombre_1`, `Referencia_pariente_direccion_1`, `Referencia_pariente_telefono_1`, `Referencia_pariente_relacion_1`, `Referencia_pariente_nombre_2`, `Referencia_pariente_direccion_2`, `Referencia_pariente_telefono_2`, `Referencia_pariente_relacion_2`, `Fecha_creacion_registro`, `Cantidad_financiada`, `Nombre_representante`, `Avatar`, `N_serie_cliente`, `Fecha_mantenimiento`, `Estatus`, `Id_office`) VALUES
(1, 'Primer nombre', 'Apellido', '2022-12-09', 'seguro social', 'licencia de conducir', 'estado 1', '2022-11-11', 'direccion', 'cuanto tiempo?', 'ciudad 1', 'estado ciudad', 'zip', 'telefono casa', 'telefono celualr', 'direccion anterior', 'ciudad anterior', 'estado anterior', 'zip anterior', 'correo@gmail.com', 'nombre empleo', 'direccion empleos', 'anos empleos', 'telefono empleo', 'posicion', 'ingreso bruto', 'Mensual', 'empleador anterior', 'fechas de empleo', 'ciudad em ant', 'estado em ant', 'zip em ant', 'numero tel empleo an', 'otras fuentes de ingreso', 'cantidad ingreso extra', 1, 3, 'propietario o hipoteca titular', 'direccion hipoteca', 'pago de la hipoteca', 'num tel hipoteca', 'Nombre p 1', 'direccion p 1', 'tel p 1 sadwdsad', 'relacion p 1', 'Nombre p 2', 'direccion p 2', 'tel p 2 sadwdsadwdsa', 'relacion p 2sisisi', '2022-11-07', 'cantidad financiada', 1, '3', 'nZnhkSbazeI11CN2ZQHG', '2022-11-10', 14, 1),
(2, 'juana la cubana', 'Del monte', '2023-02-03', 'wdasdwdadwdadw', '', 'Quien sabe', '2023-01-18', 'Lo mina', '2 meses?', 'Gualei', 'Guachupita', 'quejeso', 'Ni idea', 'wdasdwdadwdadw', '', '', '', '', 'wdasdwdadwdadw@gmail.com', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'Mensual', '', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', '', '', '', 6, 6, '', '', '', '', 'Wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', 'wdasdwdadwdadw', '', '', '', '', '2023-01-25', 'wdasdwdadwdadw', 5, '8', '9OZWOvMO32bUarChqMf', '', 14, 2),
(3, 'Wdsadwdasdwdwaasd', 'Wdsadwdasdwdwaasd', '2023-01-13', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', '2023-02-02', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', '', 'wdsadwdasdwdwaasd', '', '', '', '', 'wdsadwdasdwdwaasd@gmail.com', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'Mensual', '', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', '', '', '', 6, 6, '', '', '', '', 'Wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', 'wdsadwdasdwdwaasd', '', '', '', '', '2023-01-08', 'wdsadwdasdwdwaasd ', 1, '8', 'gA9B5c3v7uxOMYagTB3C', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `co_aplicantes`
--

CREATE TABLE `co_aplicantes` (
  `Id` int(11) NOT NULL,
  `C_N_serie_cliente` varchar(20) NOT NULL,
  `Relacion_solicitante` varchar(100) NOT NULL,
  `C_Primer_nombre` varchar(100) NOT NULL,
  `C_Apellido` varchar(100) NOT NULL,
  `C_Fecha_nacimiento` varchar(10) NOT NULL,
  `C_N_seguro_social` varchar(30) NOT NULL,
  `C_N_licencia_conducir` varchar(30) DEFAULT NULL,
  `C_Estado` varchar(50) NOT NULL,
  `C_Vencimiento` varchar(10) NOT NULL,
  `C_Direccion` varchar(300) NOT NULL,
  `C_Cuanto_tiempo` varchar(50) NOT NULL,
  `C_Ciudad` varchar(50) NOT NULL,
  `C_Estado_ciudad` varchar(50) NOT NULL,
  `C_Zip` varchar(30) NOT NULL,
  `C_Telefono_casa` varchar(20) NOT NULL,
  `C_Telefono_celular` varchar(20) NOT NULL,
  `C_Direccion_anterior` varchar(300) DEFAULT NULL,
  `C_Ciudad_anterior` varchar(50) DEFAULT NULL,
  `C_Estado_anterior` varchar(70) DEFAULT NULL,
  `C_Zip_anterior` varchar(30) DEFAULT NULL,
  `C_Correo` varchar(50) NOT NULL,
  `C_Nombre_empleo` varchar(50) NOT NULL,
  `C_Direccion_empleo` varchar(300) NOT NULL,
  `C_Tiempo_empleo` varchar(50) NOT NULL,
  `C_Telefono_empleo` varchar(20) NOT NULL,
  `C_Posicion_empleo` varchar(50) NOT NULL,
  `C_Ingreso_bruto` varchar(50) NOT NULL,
  `C_Tipo_ingreso` varchar(50) NOT NULL,
  `C_Empleador_anterior` varchar(100) DEFAULT NULL,
  `C_Fecha_empleo_anterior` varchar(30) DEFAULT NULL,
  `C_Ciudad_empleo_anterior` varchar(100) DEFAULT NULL,
  `C_Estado_empleo_anterior` varchar(100) DEFAULT NULL,
  `C_Zip_empleo_anterior` varchar(30) DEFAULT NULL,
  `C_N_telefono_empleo_anterior` varchar(20) DEFAULT NULL,
  `C_Fuente_ingreso_extra` varchar(100) DEFAULT NULL,
  `C_Cantidad_fuente_ingreso_extra` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `co_aplicantes`
--

INSERT INTO `co_aplicantes` (`Id`, `C_N_serie_cliente`, `Relacion_solicitante`, `C_Primer_nombre`, `C_Apellido`, `C_Fecha_nacimiento`, `C_N_seguro_social`, `C_N_licencia_conducir`, `C_Estado`, `C_Vencimiento`, `C_Direccion`, `C_Cuanto_tiempo`, `C_Ciudad`, `C_Estado_ciudad`, `C_Zip`, `C_Telefono_casa`, `C_Telefono_celular`, `C_Direccion_anterior`, `C_Ciudad_anterior`, `C_Estado_anterior`, `C_Zip_anterior`, `C_Correo`, `C_Nombre_empleo`, `C_Direccion_empleo`, `C_Tiempo_empleo`, `C_Telefono_empleo`, `C_Posicion_empleo`, `C_Ingreso_bruto`, `C_Tipo_ingreso`, `C_Empleador_anterior`, `C_Fecha_empleo_anterior`, `C_Ciudad_empleo_anterior`, `C_Estado_empleo_anterior`, `C_Zip_empleo_anterior`, `C_N_telefono_empleo_anterior`, `C_Fuente_ingreso_extra`, `C_Cantidad_fuente_ingreso_extra`) VALUES
(1, 'nZnhkSbazeI11CN2ZQHG', 'relación solicitante cccccc', 'Primer nombre c', 'Apellido c', '2022-11-23', 'seguro social c', 'licencia de conducir c', 'estado c', '2022-11-29', 'direccion c', 'cuanto tiempo c', 'ciudad c', 'estado 2 c', 'zip c', 'telefono c casa', 'tel celular c', 'direccion anteriior c', 'ciudad 2 c', 'estado 3 c', 'zip 2 c', 'correoc@gmail.com', 'nombre empleo c', 'direccion empleo c', 'anos empleo c', 'telefono empleo c', 'posicion c', 'ingreso bruto c', 'Mensual', 'empleador anterior c', 'fechas empleo c', 'ciudad 3 c', 'estado 4 c', 'zip 3 c', 'numero tel em ant c', 'otras fuentes de ingreso c', 'cantidad mensual c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_hipoteca`
--

CREATE TABLE `estado_hipoteca` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_hipoteca`
--

INSERT INTO `estado_hipoteca` (`Id`, `Estado`) VALUES
(1, 'Pagado'),
(2, 'Hipotecado'),
(3, 'Rentado'),
(6, 'Default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `Id` int(11) NOT NULL,
  `Estatus` varchar(50) NOT NULL,
  `Descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`Id`, `Estatus`, `Descripcion`) VALUES
(1, 'Aprobado', 'Define cuando las financieras dan aprobación a la solicitud de crédito del cliente'),
(2, 'Declinado', 'Cuando la aplicación de crédito es declinada por alguna financiera, por la razón que sea, y que se puede correr la aplicación por otra financiera'),
(3, 'Hay que trabajarla', 'Este estado es para las aplicaciones que no tienen buen score crediticio o ingresos suficientes para ser aprobadas, pero que tienen posibilidades de serlo, entonces se ajustan los ingresos para ayudar a la aprobación'),
(4, 'Instalado', 'Luego de la aprobación, los analistas envían un mensaje dejándonos saber la fecha en que se instalara la planta, una vez instalada, la aplicación pasa a este estado'),
(5, 'Contrato enviado', 'Cuando se instala la planta, se envía un contrato que debe ser firmado por el aplicante de la solicitud del crédito y por el coaplicante (puede ser en físico o pdf o vía docusign de manera virtual) '),
(6, 'Por firmar', 'Cuando se envía el contrato y por alguna razón no es firmado o se debe volver a firmar.'),
(7, 'Firmado', 'Cuando se confirma que se firmó el contrato, no es solo por la notificación del vendedor sino por la confirmación de la oficina central de que se actualiza en el sistema que ya el contrato está firmado cuando es en formato digital o cuando la oficina recibe el contrato firmado cuando se pide de forma física'),
(8, 'Reenviado', 'Cuando hay que volver a enviar el contrato, sea por un cambio de información, cambio de idioma o porque el aplicante o el coaplicante no lo recibieron o porque se venció el docusign. '),
(9, 'Pending', 'Este estado es para situaciones muy puntuales, ya sea por alguna confusión, por algún cambio de información o algún problema con los documentos, pero de forma muy puntual y que se especifica cada caso siempre en las notas.'),
(10, 'Pre-verificacion', 'En esta etapa, después de la aprobación y generado el contrato, las financieras llaman a los aplicantes y verifican los datos personales (dirección, teléfonos, coreos electrónicos, etc.) '),
(11, 'Por verificar', 'Se refiere al estado en que el aplicante es llamado por el banco para verificar que la información que está en la solicitud de crédito es correcta (se verifica el sueldo, el estado de la vivienda, ingresos extras, etc.), en ocasiones, se requiere una segunda verificación generalmente porque el aplicante no respondió con la información que había dicho en la solicitud de crédito.'),
(12, 'Verificado', 'Una vez se da la llamada de verificación y se confirma con la oficina que la verificación fue exitosa, es decir, los aplicantes corroboraron las informaciones que suministraron en la solicitud de crédito.'),
(13, 'Esperando pruebas', 'Algunas financieras piden que los aplicantes comprueben las informaciones que suministran con documentación específica, solicitan pruebas de casa, estas son los documentos admitidos que comprueben que es dueño de la casa; las pruebas de ingresos son documentos que justifican los ingresos que los aplicantes dijeron en la solicitud que tienen (estos documentos están definidos e identificados por los analistas).'),
(14, 'Analizando pruebas', 'Una vez se envían las pruebas de casa y de ingresos, las financieras las analizan para luego dar respuesta de si fueron aceptadas o no, el estatus se mantiene hasta que las pruebas sean aceptadas y pasa a estado de verificado.'),
(15, 'Cancelado', 'Cuando una aplicación se cancela, pero no se instaló la planta, indistintamente de la razón de la cancelación.'),
(16, 'Pull Out', 'Es una cancelación, pero con la planta instalada y que se debe retirar de la casa del aplicante.'),
(17, 'Prefunding', 'cunado ya el aplicante verifico con la financiera, pero aún no está en funding.'),
(18, 'Funding', 'Cuando la financiera paga desembolsa el pago de la planta a la compañía.'),
(19, 'Pago', 'Es cuando la compañía ya paga al analista las comisiones por la instalación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `managers`
--

CREATE TABLE `managers` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Cell` varchar(20) NOT NULL,
  `Carnet` varchar(20) DEFAULT NULL,
  `Id_office` int(11) NOT NULL,
  `Id_rol` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `managers`
--

INSERT INTO `managers` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Id_office`, `Id_rol`, `User`, `Password`) VALUES
(1, 'Manager prueba 1', 'manager_prueba1@gmail.es', 'celullar_prueba1', 'carnet_prueba1', 1, 2, 'manager_prueba1', 'd405b1333ea16bf16c537ac3dc8c6c90b44420016e47e26119471935d6bc494e'),
(2, 'Manager prueba 2', 'manager_prueba2@gmail.com', 'celular_prueba2 dsdw', 'carnet_prueba2', 2, 2, 'manager_prueba2', 'd405b1333ea16bf16c537ac3dc8c6c90b44420016e47e26119471935d6bc494e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offices`
--

CREATE TABLE `offices` (
  `Id` int(11) NOT NULL,
  `Name_office` varchar(50) NOT NULL,
  `Office_adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `offices`
--

INSERT INTO `offices` (`Id`, `Name_office`, `Office_adress`) VALUES
(1, 'Connecticut', ''),
(2, 'Pensilvania', ''),
(3, 'Charlotte', ''),
(4, 'New York', ''),
(5, 'New Jersey', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plomeros`
--

CREATE TABLE `plomeros` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cell` varchar(20) NOT NULL,
  `Id_oficina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_cambios`
--

CREATE TABLE `registro_cambios` (
  `Id` int(11) NOT NULL,
  `Tabla_cambio` varchar(50) NOT NULL,
  `Usuario_cambio` varchar(100) NOT NULL,
  `Id_rol_cambio` int(11) NOT NULL,
  `Accion_cambio` varchar(20) NOT NULL,
  `Id_registro_cambio` int(11) NOT NULL,
  `Fecha_cambio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Rol`) VALUES
(1, 'administrator'),
(2, 'manager'),
(3, 'analyst');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_residencia_hipoteca`
--

CREATE TABLE `tipo_residencia_hipoteca` (
  `Id` int(11) NOT NULL,
  `Tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_residencia_hipoteca`
--

INSERT INTO `tipo_residencia_hipoteca` (`Id`, `Tipo`) VALUES
(1, 'Casa'),
(2, 'Dept'),
(3, 'Condo'),
(4, 'Casa movil'),
(6, 'Default');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User` (`User`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD UNIQUE KEY `Cell` (`Cell`),
  ADD UNIQUE KEY `Carnet` (`Carnet`),
  ADD KEY `Id_rol` (`Id_rol`);

--
-- Indices de la tabla `analyst`
--
ALTER TABLE `analyst`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User` (`User`),
  ADD UNIQUE KEY `Cell` (`Cell`),
  ADD UNIQUE KEY `User_2` (`User`),
  ADD UNIQUE KEY `Mail_2` (`Mail`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `Mail` (`Mail`,`Cell`,`Carnet`,`User`,`Foto`),
  ADD UNIQUE KEY `Carnet` (`Carnet`),
  ADD UNIQUE KEY `Foto` (`Foto`),
  ADD UNIQUE KEY `Foto_2` (`Foto`),
  ADD KEY `Id_office` (`Id_office`),
  ADD KEY `Id_supervisor` (`Id_supervisor`),
  ADD KEY `Id_rol` (`Id_rol`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_cliente` (`Id_cliente`),
  ADD KEY `Id_plomero` (`Id_plomero`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `N_seguro_social` (`N_seguro_social`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `Telefono_celular` (`Telefono_celular`),
  ADD UNIQUE KEY `N_serie_cliente` (`N_serie_cliente`),
  ADD UNIQUE KEY `N_serie_cliente_2` (`N_serie_cliente`),
  ADD UNIQUE KEY `N_licencia_conducir` (`N_licencia_conducir`),
  ADD KEY `Estatus` (`Estatus`),
  ADD KEY `Id_office` (`Id_office`);

--
-- Indices de la tabla `co_aplicantes`
--
ALTER TABLE `co_aplicantes`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `C_n_serie_cliente` (`C_N_serie_cliente`),
  ADD UNIQUE KEY `C_Telefono_celular` (`C_Telefono_celular`),
  ADD UNIQUE KEY `C_N_seguro_social` (`C_N_seguro_social`),
  ADD UNIQUE KEY `C_Correo` (`C_Correo`),
  ADD UNIQUE KEY `C_N_licencia_conducir` (`C_N_licencia_conducir`);

--
-- Indices de la tabla `estado_hipoteca`
--
ALTER TABLE `estado_hipoteca`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `User` (`User`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD UNIQUE KEY `Cell` (`Cell`),
  ADD UNIQUE KEY `Carnet` (`Carnet`),
  ADD KEY `Id_office` (`Id_office`),
  ADD KEY `Id_rol` (`Id_rol`);

--
-- Indices de la tabla `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `plomeros`
--
ALTER TABLE `plomeros`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_oficina` (`Id_oficina`);

--
-- Indices de la tabla `registro_cambios`
--
ALTER TABLE `registro_cambios`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipo_residencia_hipoteca`
--
ALTER TABLE `tipo_residencia_hipoteca`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrators`
--
ALTER TABLE `administrators`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `analyst`
--
ALTER TABLE `analyst`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `co_aplicantes`
--
ALTER TABLE `co_aplicantes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado_hipoteca`
--
ALTER TABLE `estado_hipoteca`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `managers`
--
ALTER TABLE `managers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `offices`
--
ALTER TABLE `offices`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plomeros`
--
ALTER TABLE `plomeros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_cambios`
--
ALTER TABLE `registro_cambios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_residencia_hipoteca`
--
ALTER TABLE `tipo_residencia_hipoteca`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `administrators_ibfk_1` FOREIGN KEY (`Id_rol`) REFERENCES `roles` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `analyst`
--
ALTER TABLE `analyst`
  ADD CONSTRAINT `analyst_ibfk_1` FOREIGN KEY (`Id_office`) REFERENCES `offices` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `analyst_ibfk_2` FOREIGN KEY (`Id_supervisor`) REFERENCES `managers` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `analyst_ibfk_3` FOREIGN KEY (`Id_rol`) REFERENCES `roles` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`Id_cliente`) REFERENCES `clientes` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`Id_plomero`) REFERENCES `plomeros` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Estatus`) REFERENCES `estatus` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`Id_office`) REFERENCES `offices` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_ibfk_1` FOREIGN KEY (`Id_rol`) REFERENCES `roles` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `managers_ibfk_2` FOREIGN KEY (`Id_office`) REFERENCES `offices` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `plomeros`
--
ALTER TABLE `plomeros`
  ADD CONSTRAINT `plomeros_ibfk_1` FOREIGN KEY (`Id_oficina`) REFERENCES `offices` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
