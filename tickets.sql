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

 Date: 01/03/2018 22:49:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tickets_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES (1, 1, 'VirtualBox is not responding.', 'Pls repair today.', 'Closed', '2018-02-28 18:17:58', '2018-02-28 18:17:58');
INSERT INTO `tickets` VALUES (2, 2, 'Problem with printer', 'Cannot print in color.', 'Open', '2018-02-28 18:19:22', '2018-02-28 18:19:22');
INSERT INTO `tickets` VALUES (3, 1, 'Problem with keyboard', 'Enter and space is not working..', 'Open', '2018-02-28 18:38:07', '2018-02-28 18:38:07');
INSERT INTO `tickets` VALUES (4, 2, 'Problem with monitor.', 'Doesn\'t work from 3 days.', 'Open', '2018-02-28 21:30:05', '2018-02-28 21:30:16');
INSERT INTO `tickets` VALUES (5, 1, 'Problem with vagrant.', 'Ssh command doesn\'t work.', 'Open', '2018-02-28 21:45:46', '2018-02-28 21:45:52');
INSERT INTO `tickets` VALUES (6, 1, 'Internet connection failed.', 'Broken router.', 'Open', '2018-02-28 20:46:54', '2018-02-28 20:46:54');
INSERT INTO `tickets` VALUES (7, 2, 'Mouse problem.', 'Left key is broken.', 'Closed', '2018-02-28 20:50:03', '2018-02-28 20:50:03');
INSERT INTO `tickets` VALUES (8, 1, 'Photoshop is not responding.', 'Pls repair asap.', 'Closed', '2018-02-28 21:06:28', '2018-02-28 21:06:28');
INSERT INTO `tickets` VALUES (9, 1, 'Printer wireless connection problem.', 'Does not connect.', 'Closed', '2018-03-01 18:55:03', '2018-03-01 18:55:03');
INSERT INTO `tickets` VALUES (10, 1, 'Printer wireless connection problem.', 'Does not connect.', 'Closed', '2018-03-01 18:56:51', '2018-03-01 18:56:51');

SET FOREIGN_KEY_CHECKS = 1;
