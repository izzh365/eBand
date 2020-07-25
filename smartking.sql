/*
Navicat MySQL Data Transfer

Source Server         : myself
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : smartking

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-07-20 11:26:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `status` tinyint(3) DEFAULT '1' COMMENT '默认是1是可用的',
  `auth_key` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `upd_time` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('3', 'admin', '', '10', null, '$2y$10$88a4hQ7YmEbmkCX1u1cdOOHTPL8r9ATYPwq3YqZtsMEAY1lNtJT0q', null, '2020-07-16 15:23:05');

-- ----------------------------
-- Table structure for tp_alarmclock
-- ----------------------------
DROP TABLE IF EXISTS `tp_alarmclock`;
CREATE TABLE `tp_alarmclock` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  `onOrOff` int(100) NOT NULL COMMENT '1开2关',
  `alarmTime` varchar(100) DEFAULT NULL,
  `weeks` varchar(500) DEFAULT NULL,
  `upd_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_alarmclock
-- ----------------------------

-- ----------------------------
-- Table structure for tp_check
-- ----------------------------
DROP TABLE IF EXISTS `tp_check`;
CREATE TABLE `tp_check` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  `datetime` datetime DEFAULT NULL,
  `xinlv` varchar(255) DEFAULT NULL,
  `xueyang` varchar(255) DEFAULT NULL,
  `xueya_gao` varchar(255) DEFAULT NULL,
  `xueya_di` varchar(255) DEFAULT NULL,
  `rand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`datetime`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_check
-- ----------------------------
INSERT INTO `tp_check` VALUES ('1', '1', '123', '123', '2020-07-07 16:15:15', '80', '95', '120', '79', '123123');

-- ----------------------------
-- Table structure for tp_citycode
-- ----------------------------
DROP TABLE IF EXISTS `tp_citycode`;
CREATE TABLE `tp_citycode` (
  `id` varchar(32) NOT NULL,
  `cityEn` varchar(32) NOT NULL,
  `cityZh` varchar(32) NOT NULL,
  `provinceEn` varchar(32) NOT NULL,
  `provinceZh` varchar(32) NOT NULL,
  `countryEn` varchar(32) NOT NULL,
  `countryZh` varchar(32) NOT NULL,
  `leaderEn` varchar(32) NOT NULL,
  `leaderZh` varchar(32) NOT NULL,
  `isGet` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市表';

-- ----------------------------
-- Records of tp_citycode
-- ----------------------------

-- ----------------------------
-- Table structure for tp_device
-- ----------------------------
DROP TABLE IF EXISTS `tp_device`;
CREATE TABLE `tp_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mac` varchar(255) DEFAULT NULL,
  `upd_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_device
-- ----------------------------
INSERT INTO `tp_device` VALUES ('1', '10:10:10:10', '2020-07-16 15:50:49');
INSERT INTO `tp_device` VALUES ('2', '11:10:09:08:07', '2020-07-18 06:55:57');
INSERT INTO `tp_device` VALUES ('3', '11:10:09:08:06', '2020-07-18 06:59:50');

-- ----------------------------
-- Table structure for tp_feedback
-- ----------------------------
DROP TABLE IF EXISTS `tp_feedback`;
CREATE TABLE `tp_feedback` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userId` int(100) NOT NULL,
  `contents` text,
  `tel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for tp_paramsets
-- ----------------------------
DROP TABLE IF EXISTS `tp_paramsets`;
CREATE TABLE `tp_paramsets` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userId` int(100) NOT NULL,
  `callReminder` int(100) DEFAULT NULL COMMENT '????:1? 2 ?',
  `messageReminder` int(100) DEFAULT NULL,
  `qqReminder` int(100) DEFAULT NULL,
  `wechatReminder` int(100) DEFAULT NULL,
  `sedentaryReminder` int(100) DEFAULT NULL,
  `lostReminder` int(100) DEFAULT NULL,
  `baojintime` int(100) DEFAULT '0',
  `long_sit_tixin_time` int(100) DEFAULT NULL,
  `qianNiuReminder` int(100) DEFAULT NULL,
  `FacebookReminder` int(11) DEFAULT NULL,
  `TwitterReminder` int(11) DEFAULT NULL,
  `WhatsAppReminder` int(11) DEFAULT NULL,
  `LinkedinReminder` int(11) DEFAULT NULL,
  `dongtaiXL` varchar(11) DEFAULT '2',
  `taiShou` varchar(11) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_paramsets
-- ----------------------------

-- ----------------------------
-- Table structure for tp_sleep
-- ----------------------------
DROP TABLE IF EXISTS `tp_sleep`;
CREATE TABLE `tp_sleep` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `totalTime` int(100) DEFAULT NULL,
  `deepTime` int(100) DEFAULT NULL,
  `shallowTime` int(100) DEFAULT NULL,
  `soberTime` int(100) DEFAULT NULL,
  `record` text,
  `upd_date` varchar(255) DEFAULT NULL,
  `rand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `userId` (`userId`) USING BTREE,
  KEY `endTime` (`endTime`) USING BTREE,
  KEY `startTime` (`startTime`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_sleep
-- ----------------------------
INSERT INTO `tp_sleep` VALUES ('1', null, '123', '345', '2020-07-08 09:00:00', '2020-07-08 14:10:05', '5', '3', '2', '0', '123', '2020-07-08', '123345');
INSERT INTO `tp_sleep` VALUES ('2', '1', '123', '345', '2020-07-08 09:00:00', '2020-07-08 14:10:05', '5', '3', '2', '0', '123', '2020-07-08', '123345');
INSERT INTO `tp_sleep` VALUES ('3', '1', '123', '456', '2020-07-08 09:00:00', '2020-07-08 14:10:05', '5', '3', '2', '0', '123', '2020-07-08', '123456');
INSERT INTO `tp_sleep` VALUES ('4', '1', '123', '456', '2020-07-08 09:00:00', '2020-07-08 14:10:05', '5', '3', '2', '0', '123', '2020-07-08', '123456');

-- ----------------------------
-- Table structure for tp_sport
-- ----------------------------
DROP TABLE IF EXISTS `tp_sport`;
CREATE TABLE `tp_sport` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `timeConsuming` int(100) DEFAULT NULL,
  `strength` int(100) DEFAULT NULL COMMENT '1低 2中 3高  ',
  `calorie` varchar(100) DEFAULT NULL,
  `fasterRate` int(100) DEFAULT NULL,
  `dataDetail` text,
  `rand` varchar(255) DEFAULT NULL,
  `locationDetail` text,
  PRIMARY KEY (`id`),
  KEY `id_index` (`id`) USING BTREE,
  KEY `uid` (`userId`) USING BTREE,
  KEY `starttime` (`startTime`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_sport
-- ----------------------------
INSERT INTO `tp_sport` VALUES ('1', '1', '10', '20', '2020-07-08 16:30:20', '2020-07-08 20:15:15', '5', '4', '2', '3', '458', '1020', '3');
INSERT INTO `tp_sport` VALUES ('2', '1', '123', '456', '2020-07-08 16:30:20', '2020-07-08 20:15:15', '5', '4', '2', '3', '458', '123456', '3');

-- ----------------------------
-- Table structure for tp_tqjl
-- ----------------------------
DROP TABLE IF EXISTS `tp_tqjl`;
CREATE TABLE `tp_tqjl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) DEFAULT NULL,
  `date` varchar(50) NOT NULL DEFAULT '0',
  `loc` text,
  `res` text,
  `cityId` varchar(20) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`date`),
  KEY `id` (`id`) USING BTREE,
  KEY `city` (`city`) USING BTREE,
  KEY `cityId` (`cityId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_tqjl
-- ----------------------------

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `userId` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `walkGoal` varchar(255) DEFAULT '8000',
  `nickname` varchar(255) DEFAULT '',
  `sex` varchar(255) DEFAULT '1',
  `photo` varchar(500) DEFAULT '',
  `height` int(11) DEFAULT '170',
  `weight` int(11) DEFAULT '60',
  `email` varchar(500) DEFAULT '',
  `phone` varchar(500) DEFAULT '',
  `birthday` varchar(500) DEFAULT '',
  `fromType` int(100) DEFAULT NULL,
  `openId` varchar(500) DEFAULT NULL,
  `accessToken` varchar(500) DEFAULT NULL,
  `age` int(11) DEFAULT '20',
  `thirdPhoto` varchar(500) DEFAULT '',
  `is_show` varchar(255) DEFAULT 'show' COMMENT 'show,hide,lock',
  `reg_date` datetime DEFAULT NULL,
  `upd_time` int(11) DEFAULT NULL,
  `stepWidth` int(11) DEFAULT '50',
  `rand` varchar(255) DEFAULT NULL,
  `zone_code` varchar(20) DEFAULT '86',
  `registerId` varchar(255) DEFAULT '',
  PRIMARY KEY (`userId`),
  KEY `userid` (`userId`) USING BTREE,
  KEY `phone` (`phone`(255)) USING BTREE,
  KEY `email` (`email`(255)) USING BTREE,
  KEY `registerId` (`registerId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', null, '123456', '', '', '', '19840420', null, null, '', '', '19840410', null, null, null, null, '', 'show', null, null, null, null, '86', '');
INSERT INTO `tp_user` VALUES ('2', '123456', 'e10adc3949ba59abbe56e057f20f883e', '8000', '123456', '1', '', '170', '60', '', '', '', '1', null, null, '20', '', 'show', null, null, '50', null, '86', '');
INSERT INTO `tp_user` VALUES ('3', '123456', 'e10adc3949ba59abbe56e057f20f883e', '8000', '123456', '1', '', '170', '60', '', '', '', '1', null, null, '20', '', 'show', null, null, '50', null, '86', '');
INSERT INTO `tp_user` VALUES ('4', '123456', 'e10adc3949ba59abbe56e057f20f883e', '8000', '123456', '1', '', '170', '60', '', '', '', '1', null, null, '20', '', 'show', null, null, '50', null, '86', '');
INSERT INTO `tp_user` VALUES ('5', '123456', 'e10adc3949ba59abbe56e057f20f883e', '8000', '123456', '1', '', '170', '60', '', '', '', '1', null, null, '20', '', 'show', null, null, '50', null, '86', '');

-- ----------------------------
-- Table structure for tp_version_record
-- ----------------------------
DROP TABLE IF EXISTS `tp_version_record`;
CREATE TABLE `tp_version_record` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `version` varchar(1000) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `size` decimal(10,0) DEFAULT NULL,
  `note_log` varchar(5000) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `remark` varchar(5000) DEFAULT NULL,
  `file_name` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_version_record
-- ----------------------------

-- ----------------------------
-- Table structure for tp_walk
-- ----------------------------
DROP TABLE IF EXISTS `tp_walk`;
CREATE TABLE `tp_walk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  `walkCounts` int(100) DEFAULT NULL,
  `goalWalk` int(100) DEFAULT NULL,
  `calorie` decimal(50,1) DEFAULT NULL,
  `timeConsuming` int(11) DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `detailJson` text,
  `upd_time` varchar(255) DEFAULT NULL,
  `distance` varchar(20) DEFAULT '0',
  `rand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`userId`,`walkCounts`,`startTime`),
  KEY `userId` (`userId`) USING BTREE,
  KEY `startTime` (`startTime`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_walk
-- ----------------------------
INSERT INTO `tp_walk` VALUES ('1', '1', '123', '345', '2000', '20', '800.0', '2', '2020-07-08 09:00:00', '几点就睡觉', '2020-07-08 03:10:26', '8000', '123345');
INSERT INTO `tp_walk` VALUES ('2', '1', '123', '456', '2000', '20', '800.0', '2', '2020-07-08 09:00:00', null, '2020-07-08 03:10:26', '8000', '123456');

-- ----------------------------
-- Table structure for tp_weather
-- ----------------------------
DROP TABLE IF EXISTS `tp_weather`;
CREATE TABLE `tp_weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cityName` varchar(50) NOT NULL DEFAULT '',
  `maxTemperature` varchar(20) DEFAULT '',
  `minTemperature` varchar(20) DEFAULT '',
  `temperature` varchar(20) DEFAULT '',
  `wind` varchar(50) DEFAULT '',
  `windDirection` varchar(50) DEFAULT '',
  `weather` varchar(50) DEFAULT '',
  `get_time` int(11) DEFAULT '0',
  `weatherCode` int(11) DEFAULT '0',
  `cityId` varchar(20) DEFAULT '',
  `country` varchar(50) DEFAULT '',
  `province` varchar(50) DEFAULT '',
  `lon` varchar(50) DEFAULT '',
  `lat` varchar(50) DEFAULT '',
  `getNum` int(11) DEFAULT '1',
  `day` varchar(20) DEFAULT '',
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_weather
-- ----------------------------

-- ----------------------------
-- Table structure for tp_weather_area
-- ----------------------------
DROP TABLE IF EXISTS `tp_weather_area`;
CREATE TABLE `tp_weather_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_py` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `weathercnid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_weather_area
-- ----------------------------

-- ----------------------------
-- Table structure for tp_xinlv
-- ----------------------------
DROP TABLE IF EXISTS `tp_xinlv`;
CREATE TABLE `tp_xinlv` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  `datetime` varchar(255) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `rand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`datetime`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `userId` (`userId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_xinlv
-- ----------------------------
INSERT INTO `tp_xinlv` VALUES ('1', '1', '456', '123', '2020-07-06 15:08:08', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('2', '1', '456', '123', '2020-07-06 15:07:07', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('3', '1', '456', '123', '2020-07-06 15:06:06', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('4', '1', '456', '123', '2020-07-06 15:05:06', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('5', '1', '456', '123', '2020-07-06 15:01:02', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('6', '1', '456', '123', '2020-07-06 16:08:01', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('7', '1', '456', '123', '2020-07-06 16:10:30', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('8', '1', '456', '123', '2020-07-06 15:08:08', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('9', '1', '456', '123', '2020-07-06 15:07:07', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('10', '1', '456', '123', '2020-07-06 15:06:06', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('11', '1', '456', '123', '2020-07-06 15:05:06', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('12', '1', '456', '123', '2020-07-06 15:01:02', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('13', '1', '456', '123', '2020-07-06 16:08:01', '10', '456123');
INSERT INTO `tp_xinlv` VALUES ('14', '1', '456', '123', '2020-07-06 16:10:30', '10', '456123');

-- ----------------------------
-- Table structure for tp_xueya
-- ----------------------------
DROP TABLE IF EXISTS `tp_xueya`;
CREATE TABLE `tp_xueya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `xueya_gao` varchar(255) DEFAULT NULL,
  `xueya_di` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `rand` varchar(255) DEFAULT NULL,
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  PRIMARY KEY (`id`),
  KEY `date` (`datetime`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  KEY `userId` (`userId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_xueya
-- ----------------------------
INSERT INTO `tp_xueya` VALUES ('1', '1', '120', '80', '2020-07-06 00:00:00', '123123', '123', '123');
INSERT INTO `tp_xueya` VALUES ('2', '1', '120', '80', '2020-07-06 00:00:00', '123123', '123', '123');

-- ----------------------------
-- Table structure for tp_xueyang
-- ----------------------------
DROP TABLE IF EXISTS `tp_xueyang`;
CREATE TABLE `tp_xueyang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT '0',
  `uuid` varchar(128) DEFAULT NULL COMMENT '用户的设备uuid',
  `mac` varchar(128) DEFAULT NULL COMMENT '手环的mac',
  `datetime` datetime DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `rand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `date` (`datetime`) USING BTREE,
  KEY `userId` (`userId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_xueyang
-- ----------------------------
INSERT INTO `tp_xueyang` VALUES ('1', '1', '456', '123', '2020-07-06 00:00:00', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('2', '1', '456', '123', '2020-07-06 15:08:08', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('3', '1', '456', '123', '2020-07-06 15:07:07', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('4', '1', '456', '123', '2020-07-06 15:06:06', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('5', '1', '456', '123', '2020-07-06 15:05:06', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('6', '1', '456', '123', '2020-07-06 15:01:02', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('7', '1', '456', '123', '2020-07-06 16:08:01', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('8', '1', '456', '123', '2020-07-06 16:10:30', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('9', '1', '456', '123', '2020-07-06 15:08:08', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('10', '1', '456', '123', '2020-07-06 15:07:07', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('11', '1', '456', '123', '2020-07-06 15:06:06', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('12', '1', '456', '123', '2020-07-06 15:05:06', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('13', '1', '456', '123', '2020-07-06 15:01:02', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('14', '1', '456', '123', '2020-07-06 16:08:01', '10', '456123');
INSERT INTO `tp_xueyang` VALUES ('15', '1', '456', '123', '2020-07-06 16:10:30', '10', '456123');

-- ----------------------------
-- Table structure for tp_yzm
-- ----------------------------
DROP TABLE IF EXISTS `tp_yzm`;
CREATE TABLE `tp_yzm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` varchar(255) DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `to_user` (`to_user`) USING BTREE,
  KEY `send_time` (`send_time`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tp_yzm
-- ----------------------------
