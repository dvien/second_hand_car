/*
Navicat MySQL Data Transfer

Source Server         : bash_mysql
Source Server Version : 50720
Source Host           : 127.0.0.1:3306
Source Database       : laravel_demo

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-01-11 00:43:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `real_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '真名',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '登录名',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '登陆邮箱',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_user_name_unique` (`name`),
  UNIQUE KEY `admin_user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', '', 'admin', 'admin@qq.com', '$2y$10$NO.YwaOqlEVt0tnssFK26OaRzQdhnnvEvGmtp/zsKO.puB.bwr2Zi', 'pvdecPDn09n5LVqJPC3gCOeFGAAllntCqYfKhQMRa8WYL3033D174hpyaic6', '2018-01-05 16:04:07', '2018-01-05 16:04:07', null);
INSERT INTO `admin_user` VALUES ('2', '', 'lxl', 'lxl@qq.com', '$2y$10$5.fw2ONK5JHnbh.uvIgjGe4cv4gUzjamVGs9.IA.2zhwiOg3rNjV6', null, '2018-01-06 15:52:43', '2018-01-06 15:52:43', null);

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wechat_user_id` int(11) NOT NULL COMMENT '发布人: 不一定是车主',
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `owner_sex` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '品牌车型',
  `price` decimal(8,2) NOT NULL COMMENT '期望售价',
  `date` date NOT NULL COMMENT '预约时间',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '预约地点',
  `car_state` int(11) NOT NULL DEFAULT '1' COMMENT '1 新入库; 2 洽谈中; 3 成交; 4 未成交;',
  `admin_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '最后操作人: 填写利润等操作',
  `profit` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '利润: 操作人自己输入',
  `first_wechat_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '拿一级佣金的代理人',
  `first_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '一级提成',
  `second_wechat_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '拿二级佣金的代理人',
  `second_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '二级提成',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '情况',
  `income` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '收入: 收入 = 利润 - 一级提成 - 二级提成',
  `commission` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '分佣: 分佣 = 一级提成 + 二级提成',
  `deal_ok_date` date DEFAULT NULL COMMENT '成交日期: 用来财务结算用',
  `clear_state` int(11) NOT NULL DEFAULT '0' COMMENT '结算状态: 0 未处理; 1 等待结算 2 已结算;',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('1', '1', '1登记的车1', '0', '11111111111', '1车', '9000.00', '2018-04-01', '软件园1', '3', '1', '1000.00', '1', '300.00', '0', '0.00', '', '700.00', '300.00', '2018-01-07', '2', '2018-01-07 21:27:40', '2018-01-11 00:40:48', null);
INSERT INTO `car` VALUES ('2', '1', '1登记的车2', '0', '11111111111', '1车', '998.00', '2018-02-01', '软件园1', '3', '1', '2000.00', '1', '200.00', '0', '0.00', '', '1800.00', '200.00', '2018-01-07', '2', '2018-01-07 21:28:17', '2018-01-11 00:40:48', null);
INSERT INTO `car` VALUES ('3', '2', '2登记的车1', '0', '22222222222', '2车', '10000.00', '2018-01-01', '软件园2', '3', '1', '2000.00', '2', '500.00', '1', '300.00', '', '1200.00', '800.00', '2018-01-08', '0', '2018-01-07 21:29:40', '2018-01-08 22:16:12', null);
INSERT INTO `car` VALUES ('4', '2', '2登记的车2', '0', '22222222222', '2车', '20000.00', '2018-01-03', '软件园2', '1', '0', '0.00', '2', '0.00', '1', '0.00', '', '0.00', '0.00', null, '0', '2018-01-07 21:30:45', '2018-01-07 21:30:45', null);
INSERT INTO `car` VALUES ('6', '3', '3登记的车1', '0', '33333333333', '3车', '30000.00', '2018-01-01', '软件园3', '1', '0', '0.00', '1', '0.00', '0', '0.00', '', '0.00', '0.00', null, '0', '2018-01-07 21:35:20', '2018-01-07 21:35:20', null);
INSERT INTO `car` VALUES ('7', '4', '4登记的车1', '0', '44444444', '4车', '40000.00', '2018-01-02', '软件园4', '1', '0', '0.00', '2', '0.00', '1', '0.00', '', '0.00', '0.00', null, '0', '2018-01-07 21:59:40', '2018-01-07 21:59:40', null);
INSERT INTO `car` VALUES ('8', '3', '3登记的车2', '0', '33333333333', '3成为代理后的车', '300000.00', '2018-01-01', '软件园3', '1', '0', '0.00', '3', '0.00', '1', '0.00', '', '0.00', '0.00', null, '0', '2018-01-07 22:39:28', '2018-01-07 22:39:28', null);
INSERT INTO `car` VALUES ('9', '4', '4登记的车2', '0', '14444444444', '4成为代理后的车', '400000.00', '2018-01-03', '软件园4', '1', '0', '0.00', '4', '0.00', '2', '0.00', '', '0.00', '0.00', null, '0', '2018-01-07 22:47:15', '2018-01-07 22:47:15', null);

-- ----------------------------
-- Table structure for clear
-- ----------------------------
DROP TABLE IF EXISTS `clear`;
CREATE TABLE `clear` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL COMMENT '结算开始日期: 包含',
  `end_date` date NOT NULL COMMENT '结算截止日期: 包含',
  `income` decimal(8,2) NOT NULL COMMENT '收入',
  `commission` decimal(8,2) NOT NULL COMMENT '分佣',
  `profit` decimal(8,2) NOT NULL COMMENT '利润',
  `clear_state` int(11) NOT NULL DEFAULT '0' COMMENT '结算状态: 0 未处理; 1 等待结算 2 已结算;',
  `admin_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次操作本条记录的后台用户',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clear
-- ----------------------------
INSERT INTO `clear` VALUES ('3', '2018-01-01', '2018-01-07', '2500.00', '500.00', '3000.00', '2', '1', '2018-01-10 22:55:02', '2018-01-11 00:40:48', null);

-- ----------------------------
-- Table structure for clear_car
-- ----------------------------
DROP TABLE IF EXISTS `clear_car`;
CREATE TABLE `clear_car` (
  `clear_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  UNIQUE KEY `clear_car_car_id_unique` (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clear_car
-- ----------------------------
INSERT INTO `clear_car` VALUES ('3', '1');
INSERT INTO `clear_car` VALUES ('3', '2');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('10', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('17', '2018_01_04_141051_create_wechat_user', '6');
INSERT INTO `migrations` VALUES ('18', '2014_10_12_000000_create_admin_user_table', '7');
INSERT INTO `migrations` VALUES ('19', '2018_01_04_145600_create_pay', '8');
INSERT INTO `migrations` VALUES ('21', '2018_01_04_142351_create_car', '10');
INSERT INTO `migrations` VALUES ('22', '2018_01_04_144459_create_clear', '11');
INSERT INTO `migrations` VALUES ('23', '2018_01_04_145422_create_clear_car', '12');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pay
-- ----------------------------
DROP TABLE IF EXISTS `pay`;
CREATE TABLE `pay` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wechat_user_id` int(11) NOT NULL COMMENT '提现微信用户',
  `pay_type` int(11) NOT NULL COMMENT '支付方式: 1 支付宝; 2 微信',
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '账号',
  `real_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '真实姓名',
  `price` decimal(8,2) NOT NULL COMMENT '提现金额',
  `pay_state` int(11) NOT NULL COMMENT '状态: 1. 申请提现; 2. 已转',
  `admin_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次操作本条记录的后台用户',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pay
-- ----------------------------
INSERT INTO `pay` VALUES ('1', '1', '1', 'zhifubao@qq.com', '1 id 提现', '100.00', '2', '1', '2018-01-07 23:24:54', '2018-01-07 23:25:25', null);
INSERT INTO `pay` VALUES ('2', '1', '1', 'zhifubao@qq.com', '1 id 提现', '200.00', '2', '1', '2018-01-07 23:25:57', '2018-01-07 23:26:19', null);
INSERT INTO `pay` VALUES ('3', '1', '1', 'zhifubao@qq.com', 'id1 测试mysql时间', '10.00', '1', '0', '2018-01-07 23:31:43', '2018-01-07 23:31:43', null);
INSERT INTO `pay` VALUES ('4', '1', '1', 'zhifubao@qq.com', 'id1 测试mysql时间', '10.00', '1', '0', '2018-01-07 23:33:51', '2018-01-07 23:33:51', null);

-- ----------------------------
-- Table structure for wechat_user
-- ----------------------------
DROP TABLE IF EXISTS `wechat_user`;
CREATE TABLE `wechat_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wechat_openid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wechat_nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wechat_headimgurl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wechat_unionid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `wechat_sex` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hangye` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '行业',
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '职务',
  `wechat_user_type` int(11) NOT NULL DEFAULT '0' COMMENT '字典: 1 代理人',
  `agent_qrcode_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `first_wechat_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '一级代理人',
  `second_wechat_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '二级代理人',
  `can_get_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '可提现总金额',
  `has_get_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '已经提现总金额',
  `getting_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '处理中金额',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '总收入: can_get_price + has_get_price + geting_price',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wechat_user_wechat_openid_unique` (`wechat_openid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wechat_user
-- ----------------------------
INSERT INTO `wechat_user` VALUES ('1', '0001', '第一个代理人nickname', 'http://img2.woyaogexing.com/2017/12/27/4009698e5e0a9963!400x400_big.jpg', '', '0', '第一个代理人', '0', '13333333333', '行业', '工作', '1', 'http://localhost:8000/images/agent_qrcode_1.png', '1', '0', '480.00', '300.00', '20.00', '800.00', 'Tw1lS3u3MNIr7UkD7Gk0OAOe68haMTDO2kkDFvcjqD2v2Qc9KokNk52rSkqp', '2018-01-05 00:13:04', '2018-01-08 23:14:32', null);
INSERT INTO `wechat_user` VALUES ('2', '0002', '第二个代理人niciname', 'http://img2.woyaogexing.com/2018/01/04/d94985ec28e9d71d!400x400_big.jpg', '', '0', '第二个代理人', '0', '13444444444', '2行业', '2工作', '1', 'http://localhost:8000/images/agent_qrcode_2.png', '2', '1', '500.00', '0.00', '0.00', '500.00', '8fdMyXPiS2uC89OOtJiOYbF3e6EHvR3LjuKaDFzkxA4pu4UJhKTitaOQTbCy', '2018-01-05 00:13:53', '2018-01-08 23:14:48', null);
INSERT INTO `wechat_user` VALUES ('3', '0003', '1的会员', 'http://img2.woyaogexing.com/2017/12/15/584769807d9c5326!400x400_big.jpg', '', '0', '1会员要代理', '1', '11111111111', '保险行业1', '保险经理1', '1', 'http://localhost:8000/images/agent_qrcode_3.png', '3', '1', '0.00', '0.00', '0.00', '0.00', 'ibuQwBPPNx4LoVf8apUhAqhclBHwsHFx4hoMN32nvRA4yDbXsf6SmQrk6H43', '2018-01-05 00:14:56', '2018-01-08 23:14:54', null);
INSERT INTO `wechat_user` VALUES ('4', '0004', '2的会员', 'http://img2.woyaogexing.com/2017/11/30/e924b4605dce4c3c!400x400_big.jpg', '', '0', '4会员要代理', '2', '14444444444', '无', '我', '1', 'http://localhost:8000/images/agent_qrcode_4.png', '4', '2', '0.00', '0.00', '0.00', '0.00', 'd9CSXvhDDDXvmKVu1Po3PZyd4a2yueHlgj3sZuPQ1pzk7PbEg8iEK2xhpm1r', '2018-01-05 00:14:56', '2018-01-08 23:14:59', null);
INSERT INTO `wechat_user` VALUES ('5', 'oN53EjrVTAXgqEtlZ84LcOwvmREg', '我是蒲公英', 'http://wx.qlogo.cn/mmopen/vi_32/DYAIOgq83erzKd7en8icPJO0Ok3icPq84ISadMGngT7WItoqxrA1x28WSdMtbyj00FNDBWReDIdiaDlVX1FOSpzMA/0', '', '0', '', '0', '', '', '', '0', '', '1', '0', '0.00', '0.00', '0.00', '0.00', 'DDo69rZGt6ANmLJmCtEythuCXRpUGtSyTR2cKe5ZgF5zGrJahv6931quOJ6a', '2018-01-09 22:02:55', '2018-01-09 22:16:24', null);
