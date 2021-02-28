/*
 Navicat Premium Data Transfer

 Source Server         : Ce7_2009_DB_PHP_root
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : es

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 28/02/2021 23:35:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `id` int(11) NOT NULL,
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `num` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (1, '矿泉水', 80);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT NULL,
  `create_at` int(11) NULL DEFAULT NULL,
  `update_at` int(11) NULL DEFAULT NULL,
  `height` int(11) NULL DEFAULT NULL,
  `total` int(11) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '1', 1, 1, 1, 1, 1, 1);
INSERT INTO `users` VALUES (2, '12', 2, NULL, NULL, 2, 2, 0);
INSERT INTO `users` VALUES (12, 'rows', 24, 1614517908, 1614518867, NULL, 3, 1);
INSERT INTO `users` VALUES (13, 'rows', 24, 1614517914, 1614518867, 179, 4, 2);
INSERT INTO `users` VALUES (14, 'rows', 24, 1614517914, 1614518867, 179, 5, 1);
INSERT INTO `users` VALUES (15, 'rows', 24, 1614517915, 1614518867, 179, 6, 2);
INSERT INTO `users` VALUES (16, 'rows', 24, 1614517915, 1614518867, 179, 7, 0);
INSERT INTO `users` VALUES (17, 'EasySwoole张三', 24, 1614517915, 1614518867, 179, 12, 2);
INSERT INTO `users` VALUES (18, 'rows', 24, 1614517915, 1614518867, 179, 9, 2);
INSERT INTO `users` VALUES (19, 'rows', 24, 1614517916, 1614518867, 179, 10, 0);
INSERT INTO `users` VALUES (20, 'rows', 24, 1614517916, 1614518867, 179, 11, 1);
INSERT INTO `users` VALUES (21, 'rows', 24, 1614517916, 1614518867, 179, 12, 2);
INSERT INTO `users` VALUES (22, 'rows', 24, 1614517916, 1614518867, 179, 13, 0);
INSERT INTO `users` VALUES (23, 'rows', 24, 1614517916, 1614518867, 179, 14, 1);
INSERT INTO `users` VALUES (24, 'rows', 24, 1614517916, 1614518867, 179, 15, 0);
INSERT INTO `users` VALUES (25, 'data1', 24, NULL, NULL, 177, 16, 0);
INSERT INTO `users` VALUES (26, 'data2', 24, NULL, NULL, 177, 17, 2);
INSERT INTO `users` VALUES (27, 'EasySwoolehuizhang', 24, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (28, 'EasySwooledata1', 24, NULL, NULL, 177, NULL, NULL);
INSERT INTO `users` VALUES (29, 'EasySwooledata2', 24, NULL, NULL, 177, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
