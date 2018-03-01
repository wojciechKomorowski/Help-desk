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

 Date: 01/03/2018 22:49:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 1, 1, 'Will be done in 2 hours.', '2018-03-01 09:29:12', '2018-03-01 09:29:12');
INSERT INTO `comments` VALUES (2, 2, 4, 'Will be done in under 30 mins', '2018-03-01 09:30:03', '2018-03-01 09:30:03');
INSERT INTO `comments` VALUES (3, 2, 2, 'Tommorow will ship you new toners.', '2018-03-01 21:03:32', '2018-03-01 21:03:32');
INSERT INTO `comments` VALUES (4, 6, 6, 'We have some problems with our internet provider.', '2018-03-01 21:04:39', '2018-03-01 21:04:39');

SET FOREIGN_KEY_CHECKS = 1;
