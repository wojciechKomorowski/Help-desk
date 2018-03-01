/*
 Navicat MySQL Data Transfer

 Source Server         : scotchbox
 Source Server Type    : MySQL
 Source Server Version : 50718
 Source Host           : localhost:3306
 Source Schema         : help_desk

 Target Server Type    : MySQL
 Target Server Version : 50718
 File Encoding         : 65001

 Date: 01/03/2018 22:49:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Brad', 'brad@example.com', '$2y$10$qDlZZ/uC3Y0eONVDgPNeBej991YezNEGLZ5skcsfZjOujE4nQx.GC', 0, '6wqxoQRWhKZAEbuF2wOpbdddS8DqWT1pQqfKLp5NYTZubnKD2J00WBJpPigN', '2018-02-28 12:02:56', '2018-02-28 12:02:56');
INSERT INTO `users` VALUES (2, 'Wojciech', 'komora89@gmail.com', '$2y$10$fgJ4J6JQ.VMPcEN64O8cwuQhZsIRgG.4p35gby0seSlsldrnnnJgC', 0, '59IWZE5ogFCWCBGDjXjCLpXgctJx5FNl9X1EmMyfJ7A1jwpMF863kmbXeRYn', '2018-02-28 13:06:41', '2018-02-28 13:06:41');
INSERT INTO `users` VALUES (3, 'admin', 'admin@example.com', '$2y$10$dTDgWWxX1z2/nVDdAnxfdOgZs0agpfxBs2hL/p.E4E9pSNHpTrAwG', 1, 'NHitS8GgI56h6kn7F7dzXb88fXxliGidiYAFJYW88ZBsK8dpctB8kBcobEvN', '2018-03-01 12:04:05', '2018-03-01 12:04:05');

SET FOREIGN_KEY_CHECKS = 1;
