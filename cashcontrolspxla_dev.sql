/*
 Navicat Premium Data Transfer

 Source Server         : SoftDev
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : cashcontrolspxla_dev

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 08/04/2020 18:44:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for actividades
-- ----------------------------
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades`  (
  `id_actividad` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cuenta` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_movimiento` int(20) NOT NULL,
  `monto` bigint(20) NOT NULL,
  `transferencia` int(20) NOT NULL,
  `tipo_operacion` int(20) NOT NULL,
  `id_sigla` int(20) NOT NULL,
  `comentario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_actividad`) USING BTREE,
  INDEX `fk_actividades_operacion`(`tipo_operacion`) USING BTREE,
  INDEX `fk_actividades_cuentas`(`id_cuenta`) USING BTREE,
  INDEX `fk_actividades_movimiento`(`tipo_movimiento`) USING BTREE,
  INDEX `fk_actividades_siglas`(`id_sigla`) USING BTREE,
  INDEX `fk_actividades_transferencia`(`transferencia`) USING BTREE,
  CONSTRAINT `fk_actividades_cuentas` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_actividades_operacion` FOREIGN KEY (`tipo_operacion`) REFERENCES `tipo_operaciones` (`id_operacion`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_actividades_movimiento` FOREIGN KEY (`tipo_movimiento`) REFERENCES `tipo_movimiento` (`id_movimiento`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_actividades_transferencia` FOREIGN KEY (`transferencia`) REFERENCES `tipo_transferencia` (`id_tipoT`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of actividades
-- ----------------------------
INSERT INTO `actividades` VALUES (32, 'Ingreso de ejemplo', 2, '2020-04-08', 1, 250, 3, 3, 88, 'Ingreso de prueba', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (33, 'Egreso de ejemplo', 3, '2020-04-08', 2, 4000, 3, 1, 91, 'Egreso de ejemplo', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (34, 'Ingreso ejemplo transentrecue ctas propias 1', 3, '2020-04-08', 1, 800, 1, 5, 88, 'Ingreso ejemplo transentrecue ctas propias 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (35, 'Ingreso transentrecue ctas terceros 1', 15, '2020-04-08', 1, 2400, 2, 5, 88, 'Ingreso transentrecue ctas terceros 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (36, 'Ingreso trasentrecue ctas prop 1', 2, '2020-04-08', 1, 4000, 1, 6, 88, 'Ingreso trasentrecue ctas prop 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (37, 'Ingreso trasentrecue ctas terc 1', 2, '2020-04-08', 1, 4000, 2, 6, 88, 'Ingreso trasentrecue ctas terc 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (38, 'Ingreso ejemplo transentrecue ctas propias 1', 3, '2020-04-08', 2, 800, 1, 5, 88, 'Ingreso ejemplo transentrecue ctas propias 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (39, 'Ingreso transentrecue ctas terceros 1', 15, '2020-04-08', 2, 2400, 2, 5, 88, 'Ingreso transentrecue ctas terceros 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (40, 'Ingreso trasentrecue ctas prop 1', 2, '2020-04-08', 2, 4000, 1, 6, 88, 'Ingreso trasentrecue ctas prop 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (41, 'Ingreso trasentrecue ctas terc 1', 2, '2020-04-08', 2, 4000, 2, 6, 88, 'Ingreso trasentrecue ctas terc 1', 1, NULL, NULL);
INSERT INTO `actividades` VALUES (42, 'Comida toks', 3, '0000-00-00', 2, 1000, 3, 1, 91, 'Prueba final', 1, NULL, NULL);

-- ----------------------------
-- Table structure for conceptos
-- ----------------------------
DROP TABLE IF EXISTS `conceptos`;
CREATE TABLE `conceptos`  (
  `id_concepto` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_concepto`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of conceptos
-- ----------------------------
INSERT INTO `conceptos` VALUES (1, 'Ordinario', '2020-03-09 21:15:00', '2020-03-10 02:13:06');
INSERT INTO `conceptos` VALUES (2, 'Extraodinario', '2020-03-10 05:13:37', '2020-03-10 05:14:46');

-- ----------------------------
-- Table structure for cuentas
-- ----------------------------
DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas`  (
  `id_cuenta` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tipo_cuenta` int(20) NULL DEFAULT NULL,
  `status` smallint(6) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`) USING BTREE,
  INDEX `fk_cuentas_tipoc`(`id_tipo_cuenta`) USING BTREE,
  CONSTRAINT `fk_cuentas_tipoc` FOREIGN KEY (`id_tipo_cuenta`) REFERENCES `tipo_cuentas` (`id_tipo_cuenta`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cuentas
-- ----------------------------
INSERT INTO `cuentas` VALUES (1, 'TstAccount 9999', 4, 1, '2020-03-08 19:14:29', '2020-03-09 03:09:57');
INSERT INTO `cuentas` VALUES (2, 'BANAMEX 3245', 5, 1, '2020-03-10 04:42:01', '2020-03-10 04:42:01');
INSERT INTO `cuentas` VALUES (3, 'BBVA 2034', 2, 1, '2020-03-10 05:03:54', '2020-03-10 05:05:45');
INSERT INTO `cuentas` VALUES (15, 'HSBC 2901', 5, 1, '2020-03-18 17:14:00', '2020-03-18 17:14:00');
INSERT INTO `cuentas` VALUES (16, 'BBVA 2210', 3, 1, '2020-03-18 17:15:00', '2020-03-18 17:15:00');
INSERT INTO `cuentas` VALUES (17, 'HSBC 9999', 2, 1, '2020-03-18 23:43:00', '2020-03-18 23:43:00');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for grupos
-- ----------------------------
DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos`  (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_concepto` int(20) NOT NULL,
  `id_tipo_clasificacion` int(20) NOT NULL,
  `sigla` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionSigla` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo`) USING BTREE,
  INDEX `fk_grupo_concepto`(`id_concepto`) USING BTREE,
  INDEX `fk_grupo_t_clasificacion`(`id_tipo_clasificacion`) USING BTREE,
  CONSTRAINT `fk_grupo_concepto` FOREIGN KEY (`id_concepto`) REFERENCES `conceptos` (`id_concepto`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_grupo_t_clasificacion` FOREIGN KEY (`id_tipo_clasificacion`) REFERENCES `tipo_clasificacion` (`id_clasificacion`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of grupos
-- ----------------------------
INSERT INTO `grupos` VALUES (50, 'FCAR', 1, 1, '', '', '2020-04-01 00:08:00', '2020-04-01 00:08:00');
INSERT INTO `grupos` VALUES (65, 'GRUPO SIGLA NUEVO', 1, 1, 'sign', 'sigla nueva', '2020-04-06 15:32:00', '2020-04-06 15:32:00');
INSERT INTO `grupos` VALUES (66, 'GRUPO SIGLA NUEVO', 1, 4, 'sig', 'antonio', '2020-04-06 15:39:00', '2020-04-06 15:39:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_03_06_222149_create_table_cuentas', 2);
INSERT INTO `migrations` VALUES (5, '2020_03_06_224816_create_table_tipo_cuenta', 2);
INSERT INTO `migrations` VALUES (6, '2020_03_06_224837_create_table_saldos', 2);
INSERT INTO `migrations` VALUES (7, '2020_03_09_051143_create_table_siglas', 3);
INSERT INTO `migrations` VALUES (8, '2020_03_09_205545_create_table_grupos', 4);
INSERT INTO `migrations` VALUES (9, '2020_03_09_050931_create_table_conceptos', 5);
INSERT INTO `migrations` VALUES (10, '2020_03_06_224859_create_table_actividades', 6);
INSERT INTO `migrations` VALUES (11, '2020_03_10_084117_create_table_categorias', 7);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for saldos
-- ----------------------------
DROP TABLE IF EXISTS `saldos`;
CREATE TABLE `saldos`  (
  `id_saldo` int(20) NOT NULL AUTO_INCREMENT,
  `id_cuenta` int(20) NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_saldo`) USING BTREE,
  INDEX `fk_saldos_cuentas`(`id_cuenta`) USING BTREE,
  CONSTRAINT `fk_saldos_cuentas` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of saldos
-- ----------------------------
INSERT INTO `saldos` VALUES (1, 1, 123, '2020-03-15', 1, '2020-03-09 03:23:10', '2020-03-09 03:23:10');
INSERT INTO `saldos` VALUES (2, 3, 2000, '2020-03-01', 1, '2020-03-10 05:06:47', '2020-03-10 05:06:47');
INSERT INTO `saldos` VALUES (3, 2, 66, '2020-03-31', 1, '2020-03-13 18:01:00', '2020-03-13 18:01:00');
INSERT INTO `saldos` VALUES (7, 15, 8000, '2020-03-18', 1, '2020-03-18 17:15:00', '2020-03-18 17:15:00');
INSERT INTO `saldos` VALUES (8, 16, 10000, '2020-03-31', 1, '2020-03-18 17:15:00', '2020-03-18 17:15:00');
INSERT INTO `saldos` VALUES (9, 17, 10000, '2020-03-18', 1, '2020-03-18 23:43:00', '2020-03-18 23:43:00');

-- ----------------------------
-- Table structure for siglas
-- ----------------------------
DROP TABLE IF EXISTS `siglas`;
CREATE TABLE `siglas`  (
  `id_sigla` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sigla` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_grupo` int(20) NOT NULL,
  `id_concepto` int(20) NOT NULL,
  `id_accion` int(20) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_sigla`) USING BTREE,
  INDEX `fk_sigla_concepto`(`id_concepto`) USING BTREE,
  INDEX `fk_sigla_accion`(`id_accion`) USING BTREE,
  INDEX `fk_sigla_grupo`(`id_grupo`) USING BTREE,
  CONSTRAINT `fk_sigla_accion` FOREIGN KEY (`id_accion`) REFERENCES `tipo_accion` (`id_accion`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_sigla_concepto` FOREIGN KEY (`id_concepto`) REFERENCES `conceptos` (`id_concepto`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_sigla_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 92 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siglas
-- ----------------------------
INSERT INTO `siglas` VALUES (88, 'fcar sigla', 'sigla de ejemplo en un grupo', 50, 2, 1, '2020-04-06 05:25:00', '2020-04-06 05:25:00');
INSERT INTO `siglas` VALUES (89, 'sigla nueva 1', 'sigla de prueba 1', 65, 1, 1, '2020-04-06 15:33:00', '2020-04-06 15:33:00');
INSERT INTO `siglas` VALUES (90, 'SIG', 'Siglas', 65, 1, 2, '2020-04-06 15:35:00', '2020-04-06 15:35:00');
INSERT INTO `siglas` VALUES (91, 'FIDE', 'fide', 66, 2, 1, '2020-04-08 15:21:00', '2020-04-08 15:21:00');

-- ----------------------------
-- Table structure for tipo_accion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_accion`;
CREATE TABLE `tipo_accion`  (
  `id_accion` int(20) NOT NULL AUTO_INCREMENT,
  `accion` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_accion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_accion
-- ----------------------------
INSERT INTO `tipo_accion` VALUES (1, 'Fija');
INSERT INTO `tipo_accion` VALUES (2, 'Variable');

-- ----------------------------
-- Table structure for tipo_clasificacion
-- ----------------------------
DROP TABLE IF EXISTS `tipo_clasificacion`;
CREATE TABLE `tipo_clasificacion`  (
  `id_clasificacion` int(255) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_tipo_movimiento` int(20) NOT NULL,
  `id_html` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_clasificacion`) USING BTREE,
  INDEX `fk_clasi_movimiento`(`id_tipo_movimiento`) USING BTREE,
  CONSTRAINT `fk_clasi_movimiento` FOREIGN KEY (`id_tipo_movimiento`) REFERENCES `tipo_movimiento` (`id_movimiento`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_clasificacion
-- ----------------------------
INSERT INTO `tipo_clasificacion` VALUES (1, 'Productivos', 1, 'prodi');
INSERT INTO `tipo_clasificacion` VALUES (2, 'No productivo', 1, 'npi');
INSERT INTO `tipo_clasificacion` VALUES (3, 'No acumula', 1, 'nai');
INSERT INTO `tipo_clasificacion` VALUES (4, 'No Productivo', 2, 'npe');
INSERT INTO `tipo_clasificacion` VALUES (5, 'Inversion', 2, 'inve');
INSERT INTO `tipo_clasificacion` VALUES (8, 'No acumula', 2, 'nae');
INSERT INTO `tipo_clasificacion` VALUES (10, 'Otros', 1, 'otroi');
INSERT INTO `tipo_clasificacion` VALUES (11, 'Otros', 2, 'otroe');

-- ----------------------------
-- Table structure for tipo_cuentas
-- ----------------------------
DROP TABLE IF EXISTS `tipo_cuentas`;
CREATE TABLE `tipo_cuentas`  (
  `id_tipo_cuenta` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_cuentas
-- ----------------------------
INSERT INTO `tipo_cuentas` VALUES (1, 'Tarjeta de Credito', 1, NULL, NULL);
INSERT INTO `tipo_cuentas` VALUES (2, 'Tarjeta de debito', 1, NULL, NULL);
INSERT INTO `tipo_cuentas` VALUES (3, 'Cta. de Inversiones', 1, NULL, NULL);
INSERT INTO `tipo_cuentas` VALUES (4, 'Cta. de Cheques', 1, NULL, NULL);
INSERT INTO `tipo_cuentas` VALUES (5, 'Cta. de Terceros', 1, NULL, NULL);

-- ----------------------------
-- Table structure for tipo_movimiento
-- ----------------------------
DROP TABLE IF EXISTS `tipo_movimiento`;
CREATE TABLE `tipo_movimiento`  (
  `id_movimiento` int(20) NOT NULL AUTO_INCREMENT,
  `movimiento` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_movimiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_movimiento
-- ----------------------------
INSERT INTO `tipo_movimiento` VALUES (1, 'ingreso');
INSERT INTO `tipo_movimiento` VALUES (2, 'egresos');

-- ----------------------------
-- Table structure for tipo_operaciones
-- ----------------------------
DROP TABLE IF EXISTS `tipo_operaciones`;
CREATE TABLE `tipo_operaciones`  (
  `id_operacion` int(20) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_operacion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_operaciones
-- ----------------------------
INSERT INTO `tipo_operaciones` VALUES (1, 'TD');
INSERT INTO `tipo_operaciones` VALUES (2, 'TC');
INSERT INTO `tipo_operaciones` VALUES (3, 'EFECTIVO');
INSERT INTO `tipo_operaciones` VALUES (4, 'CHEQUES');
INSERT INTO `tipo_operaciones` VALUES (5, 'TRANSFERENCIA ENTRE CUENTAS');
INSERT INTO `tipo_operaciones` VALUES (6, 'TRASPASO ENTRE CUENTAS');

-- ----------------------------
-- Table structure for tipo_transferencia
-- ----------------------------
DROP TABLE IF EXISTS `tipo_transferencia`;
CREATE TABLE `tipo_transferencia`  (
  `id_tipoT` int(20) NOT NULL AUTO_INCREMENT,
  `transferencia` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_tipoT`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_transferencia
-- ----------------------------
INSERT INTO `tipo_transferencia` VALUES (1, 'Ctas. propias');
INSERT INTO `tipo_transferencia` VALUES (2, 'Ctas. terceros');
INSERT INTO `tipo_transferencia` VALUES (3, 'Sin movimiento');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Test', 'tst@tst.com', '$2y$12$KYRmhH56FZT5wG4EKpLys.VYAeKFcG8PfbI1K3J/g75hhO1mOmq5e', 'Administrador', '2020-03-08 12:44:26', '2020-03-08 12:44:26');

SET FOREIGN_KEY_CHECKS = 1;
