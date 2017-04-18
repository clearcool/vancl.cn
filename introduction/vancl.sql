/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : vancl

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-04-18 23:53:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address_detail
-- ----------------------------
DROP TABLE IF EXISTS `address_detail`;
CREATE TABLE `address_detail` (
  `add_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '收货  id',
  `u_id` int(11) NOT NULL COMMENT '用户 id',
  `addressname` varchar(25) NOT NULL COMMENT '收货人',
  `phone` bigint(10) NOT NULL COMMENT '联系电话',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `add_detail` varchar(255) NOT NULL COMMENT '详情地址',
  `default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是默认地址 1为默认地址',
  PRIMARY KEY (`add_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address_detail
-- ----------------------------
INSERT INTO `address_detail` VALUES ('16', '6', 'qwe', '13161662371', '江西省;南昌市;青云谱区', 'fdewqdq', '0');
INSERT INTO `address_detail` VALUES ('14', '6', 'qwer', '13930723669', '山西省;阳泉市;平定县', 'fweafw', '0');
INSERT INTO `address_detail` VALUES ('15', '6', 'besves', '13930723669', '福建省;三明市;沙县', 'g3qrgfq3', '1');
INSERT INTO `address_detail` VALUES ('21', '7', 'asa', '15910772270', '山东省;聊城市;临清市', 'ewwqeqweq', '0');
INSERT INTO `address_detail` VALUES ('20', '2', 'du1', '13930723669', '河南省;三门峡市;灵宝市', 'fewf', '1');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员 id',
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(1) NOT NULL,
  `phone` bigint(11) NOT NULL COMMENT '手机号',
  `auth` int(1) NOT NULL DEFAULT '1' COMMENT '权限',
  `jointime` int(12) NOT NULL COMMENT '加入时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态 0 正常  1 封号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'boss', '$2y$10$nvWVVH42a7TfXnJWz.S.jOSKEgqfHvIyuUyWoPTz/jAE.Wgd6ly7K', '1', '15733265750', '0', '1490697455', '0');

-- ----------------------------
-- Table structure for collection
-- ----------------------------
DROP TABLE IF EXISTS `collection`;
CREATE TABLE `collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏id',
  `u_id` int(11) NOT NULL COMMENT '收藏人id',
  `s_id` int(11) NOT NULL COMMENT '收藏商品id',
  `collectiontime` bigint(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of collection
-- ----------------------------
INSERT INTO `collection` VALUES ('2', '2', '2', '0');
INSERT INTO `collection` VALUES ('4', '2', '1', '0');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `config_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `webname` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站名称',
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '关键字',
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站logo',
  `dsbe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 为开启 2为关闭',
  `recordnb` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '备案号',
  `crtifa` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '版权信息',
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', '凡客', '张是爱kk', '/uploads/logo/daf91836ae62546d1eb8c07d62c65ca6.png', '凡客服装商城有一只', '1', '京ICP备0000号', '© 2017 vancl.cn');

-- ----------------------------
-- Table structure for coupon
-- ----------------------------
DROP TABLE IF EXISTS `coupon`;
CREATE TABLE `coupon` (
  `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '优惠券  id',
  `denomination` decimal(10,2) NOT NULL COMMENT '优惠券金额',
  `min_price` decimal(10,2) NOT NULL COMMENT '使用优惠卷的最小金额',
  `effective` int(11) NOT NULL COMMENT '有效期',
  `sheets` int(11) NOT NULL COMMENT '张数',
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of coupon
-- ----------------------------
INSERT INTO `coupon` VALUES ('6', '50.00', '199.00', '864000', '97');
INSERT INTO `coupon` VALUES ('7', '100.00', '599.00', '864000', '97');
INSERT INTO `coupon` VALUES ('8', '150.00', '899.00', '864000', '207');
INSERT INTO `coupon` VALUES ('9', '500.00', '5000.00', '864000', '298');
INSERT INTO `coupon` VALUES ('10', '1000.00', '9999.00', '864000', '9');
INSERT INTO `coupon` VALUES ('12', '1000.00', '10000.00', '864000', '100');
INSERT INTO `coupon` VALUES ('13', '1100.00', '100000.00', '864000', '0');

-- ----------------------------
-- Table structure for frined_link
-- ----------------------------
DROP TABLE IF EXISTS `frined_link`;
CREATE TABLE `frined_link` (
  `f_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `linkname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '链接名',
  `status` int(1) NOT NULL,
  `linkpath` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '链接地址',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站关键字',
  `order` int(2) NOT NULL COMMENT '排序',
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of frined_link
-- ----------------------------
INSERT INTO `frined_link` VALUES ('1', '百度', '0', 'www.baidu.com', '兽哥哥', '333');
INSERT INTO `frined_link` VALUES ('2', '搜狗', '0', 'www.sogou.com', '搜索', '222');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `o_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单 id',
  `add_id` int(11) NOT NULL COMMENT '收货地址  id',
  `u_id` int(11) NOT NULL COMMENT '买家 id',
  `ordertime` int(11) NOT NULL COMMENT '下单时间',
  `totalprice` decimal(10,2) NOT NULL COMMENT '总金额',
  `ordernumber` bigint(14) NOT NULL COMMENT '订单编号',
  `c_id` int(10) DEFAULT NULL COMMENT '优惠券id',
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('33', '21', '7', '1492343072', '599.00', '1493197778', null);
INSERT INTO `order` VALUES ('32', '20', '2', '1492341571', '1496.00', '1493028923', '7');
INSERT INTO `order` VALUES ('31', '20', '2', '1492341492', '1546.00', '1492460483', '6');
INSERT INTO `order` VALUES ('30', '20', '2', '1492341474', '1197.00', '1492633859', null);

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `od_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单详情 id',
  `o_id` int(10) NOT NULL COMMENT '订单id',
  `us_id` int(11) NOT NULL COMMENT '商铺 id',
  `ss_id` int(11) NOT NULL COMMENT '商品详情 id',
  `price` decimal(10,2) NOT NULL COMMENT '单价',
  `num` tinyint(4) NOT NULL COMMENT '数量',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态',
  PRIMARY KEY (`od_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES ('37', '33', '3', '52', '200.00', '1', '2');
INSERT INTO `order_detail` VALUES ('36', '33', '0', '2', '399.00', '1', '1');
INSERT INTO `order_detail` VALUES ('35', '32', '0', '5', '399.00', '1', '1');
INSERT INTO `order_detail` VALUES ('34', '32', '0', '1', '399.00', '3', '1');
INSERT INTO `order_detail` VALUES ('33', '31', '0', '2', '399.00', '4', '1');
INSERT INTO `order_detail` VALUES ('32', '30', '0', '2', '399.00', '3', '0');

-- ----------------------------
-- Table structure for refund
-- ----------------------------
DROP TABLE IF EXISTS `refund`;
CREATE TABLE `refund` (
  `rd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `od_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `reason` int(1) NOT NULL COMMENT '退款原因',
  `applytime` bigint(14) NOT NULL,
  PRIMARY KEY (`rd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of refund
-- ----------------------------
INSERT INTO `refund` VALUES ('1', '2', '2', '1', '1492288759');
INSERT INTO `refund` VALUES ('2', '3', '2', '3', '1492289999');
INSERT INTO `refund` VALUES ('3', '24', '6', '2', '1492331489');
INSERT INTO `refund` VALUES ('4', '27', '6', '3', '1492332256');
INSERT INTO `refund` VALUES ('5', '31', '2', '1', '1492333765');

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商品表 id',
  `shopname` varchar(20) NOT NULL COMMENT '商品名称',
  `us_id` int(11) NOT NULL DEFAULT '0' COMMENT '店铺 id',
  `st_id` int(11) NOT NULL COMMENT '商品类别 id',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `picurl` varchar(255) NOT NULL COMMENT '图片地址',
  `uptime` int(12) NOT NULL COMMENT '上架时间',
  `isboutique` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否精品',
  `describe` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品描述',
  `Sales` int(10) NOT NULL DEFAULT '0' COMMENT '销量',
  `praise` int(11) NOT NULL DEFAULT '0' COMMENT '好评数',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop
-- ----------------------------
INSERT INTO `shop` VALUES ('1', '2017  新款 短袖 时尚', '0', '4', '1', '399.00', '/uploads/goods/9d4456c2ed3094fb80418be2659d329f.jpg', '0', '0', '帅气 时尚   新款 短袖', '0', '3');
INSERT INTO `shop` VALUES ('2', '短袖', '2', '4', '0', '145.00', '/uploads/goods/fc9ca29b66650e3b5187101811f03565.jpg', '0', '1', '这是一个短袖', '0', '0');
INSERT INTO `shop` VALUES ('5', '2017  新款  亚索 唯美', '0', '18', '1', '899.00', '/uploads/goods/dedc6bc4aa149544bd3f0b879652d066.jpg', '0', '0', '2017  新款  亚索 唯美', '0', '0');
INSERT INTO `shop` VALUES ('4', '2017 新款 衬衫 男装 时尚', '0', '6', '1', '4129.00', '/uploads/goods/96f9a5740c7bf826b081abd2aaff3777.jpg', '0', '0', '2017 新款 衬衫 男装 时尚', '0', '0');
INSERT INTO `shop` VALUES ('6', '修身裤', '0', '28', '1', '10000.00', '/uploads/goods/a237ced882bdeebe98f92e829a7914b0.jpg', '0', '0', '休闲时尚大方', '0', '0');
INSERT INTO `shop` VALUES ('7', '日版休闲女装', '0', '20', '1', '220.00', '/uploads/goods/b4a194e2c8effe60d74af83164c19295.jpg', '0', '1', '这个女装很性感', '0', '0');
INSERT INTO `shop` VALUES ('8', '2017   新款 明装  大方', '0', '4', '1', '455.00', '/uploads/goods/720e29dbd5f185f1ee23ed09fc812710.jpg', '0', '0', '2017   新款 明装  大方', '0', '1');
INSERT INTO `shop` VALUES ('9', '迷你裙', '0', '28', '1', '300.00', '/uploads/goods/b1437a57d3cd5587f2a56af73a0029f2.jpg', '0', '1', '裙子', '0', '0');
INSERT INTO `shop` VALUES ('10', '提臀修身国产', '0', '28', '1', '300.00', '/uploads/goods/41588009e1feaf4409bee9f21bc5be73.jpg', '0', '1', '往这里瞅瞅', '0', '0');
INSERT INTO `shop` VALUES ('11', 'ceshiqq', '3', '10', '1', '200.00', '/uploads/goods/870e08437dc95440954b01d15fe6dda4.jpg', '0', '1', '这个大衣不简单', '0', '0');
INSERT INTO `shop` VALUES ('22', '安抚', '2', '15', '0', '111.00', '/uploads/goods/035d97013073fa6bf657e358e72e410f.jpg', '1492341954', '0', '是是是', '0', '0');
INSERT INTO `shop` VALUES ('21', '哈哈哈哈', '3', '10', '1', '100.00', '/uploads/goods/1f8939263935abbc74b2d432cd730ff4.jpg', '1492328864', '0', '哈哈哈哈', '0', '0');
INSERT INTO `shop` VALUES ('23', '11111', '0', '15', '1', '333.00', '/uploads/goods/a2d2210892522ee005e963c26b08a097.jpg', '0', '0', '333', '0', '0');
INSERT INTO `shop` VALUES ('24', '1111', '0', '21', '1', '111.00', '/uploads/goods/a33ce05e35aa13ecc1d51a150f81f9dc.jpg', '0', '0', '1211', '0', '0');

-- ----------------------------
-- Table structure for shopowner
-- ----------------------------
DROP TABLE IF EXISTS `shopowner`;
CREATE TABLE `shopowner` (
  `ssp_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '店长 id',
  `u_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '店长真实姓名',
  `address` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '地址',
  `idcard` bigint(20) NOT NULL COMMENT '身份证号',
  PRIMARY KEY (`ssp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shopowner
-- ----------------------------
INSERT INTO `shopowner` VALUES ('1', '2', '涛涛', '河南省;开封市;兰考县', '410225199306262915');
INSERT INTO `shopowner` VALUES ('2', '6', '张振', '北京市;北京市;西城区', '130252199808041345');
INSERT INTO `shopowner` VALUES ('3', '7', 'zhangzhe', '河南省;周口市;郸城县', '130525199409024511');

-- ----------------------------
-- Table structure for shopping_cart
-- ----------------------------
DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE `shopping_cart` (
  `sc_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车 id ',
  `u_id` int(11) NOT NULL COMMENT '用户id',
  `ss_id` int(11) NOT NULL COMMENT '商品尺码 id',
  `num` tinyint(4) NOT NULL COMMENT '商品数量',
  PRIMARY KEY (`sc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shopping_cart
-- ----------------------------

-- ----------------------------
-- Table structure for shop_collection
-- ----------------------------
DROP TABLE IF EXISTS `shop_collection`;
CREATE TABLE `shop_collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收藏店铺表',
  `u_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `collectiontime` bigint(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_collection
-- ----------------------------
INSERT INTO `shop_collection` VALUES ('1', '6', '2', '1492328466');
INSERT INTO `shop_collection` VALUES ('2', '2', '2', '1492333354');

-- ----------------------------
-- Table structure for shop_comment
-- ----------------------------
DROP TABLE IF EXISTS `shop_comment`;
CREATE TABLE `shop_comment` (
  `cm_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品评论 id',
  `s_id` int(11) NOT NULL COMMENT '商品 id',
  `u_id` int(11) NOT NULL COMMENT '买家 id',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '评论内容',
  `star` tinyint(1) DEFAULT '0' COMMENT '星级',
  `commenttime` bigint(20) DEFAULT NULL COMMENT '评论时间',
  `backcomment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '回评',
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_comment
-- ----------------------------
INSERT INTO `shop_comment` VALUES ('1', '1', '6', '111111', '5', '1492417529', null);
INSERT INTO `shop_comment` VALUES ('2', '8', '2', '11111', '5', '1492317533', null);
INSERT INTO `shop_comment` VALUES ('3', '1', '6', '6666qqqq', '5', '1492332273', null);
INSERT INTO `shop_comment` VALUES ('4', '1', '6', '11gdha', '5', '1492332289', null);

-- ----------------------------
-- Table structure for shop_detail
-- ----------------------------
DROP TABLE IF EXISTS `shop_detail`;
CREATE TABLE `shop_detail` (
  `sd_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品详情 id ',
  `s_id` int(11) NOT NULL COMMENT '商品 id',
  `color` varchar(10) NOT NULL COMMENT '商品颜色',
  `goodsurl` varchar(255) NOT NULL COMMENT '商品图片地址',
  PRIMARY KEY (`sd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_detail
-- ----------------------------
INSERT INTO `shop_detail` VALUES ('1', '1', '红色', '883977ad7fe400fce42224d9273dafe4.jpg;7ee8dfee789ee55d03a41c4ea1a5fe55.jpg;6cfc017c2b6b9056b888667e372507ee.jpg');
INSERT INTO `shop_detail` VALUES ('2', '1', '绿色', 'b1daae1e80f477beaafe229aa7dafe18.jpg;e4f03b5470809badeb17fe282d411f75.jpg;96425b172aa8ca1865a14aa9a56dd025.jpg');
INSERT INTO `shop_detail` VALUES ('3', '2', '绿色', 'b4608ee03d6de476d64533b90b122f54.jpg;35e52a59ce7bd5ac0eae292efa23fd6c.jpg;a5939d4e0248c3126284a460720e1db8.jpg');
INSERT INTO `shop_detail` VALUES ('5', '4', '蓝色', '8dcda6faae1822346c1b0d7bcfda1bab.jpg;44acf76aa1842c0e78b03d868665b0bf.jpg;b467a2fec2edd70db4f5ae1a4e253fc2.jpg');
INSERT INTO `shop_detail` VALUES ('6', '4', '绿色', '716002ca16f7d217c8604399beda6074.jpg;01bcc8982d821fd87719867cfc82fe40.jpg;1fcf7aed479be4f18e4b5138649fdefb.jpg');
INSERT INTO `shop_detail` VALUES ('7', '4', '紫色', '8677cc3feb269f4a6627d57ff43734c7.jpg;d0ff838a4c721597d890c1a3149a3e60.jpg;33278c8274c74850c678b30adb513ea4.jpg');
INSERT INTO `shop_detail` VALUES ('8', '5', '白色', 'ebbf06ef73ec5facae39ad6539720f98.jpg;b8e9e3868fba40a8b14cf3ef45a63f7e.jpg;62bbb4ce0a8f0bf7670e49755ff48a42.jpg');
INSERT INTO `shop_detail` VALUES ('9', '6', '黑色', '6839c69391c11a207bf1b5e38afe6e01.jpg;554623cef2809f078f1aa60de1cefdc5.jpg;6189dfdbda963625734857002062b112.jpg');
INSERT INTO `shop_detail` VALUES ('10', '5', '青色', '7172edcf10a0d4ff6ee5263511deed05.jpg;6df04b824ca4f041f680cb206d4c83b8.jpg;66adc4716eaf015907f3e2da6ef0eb0a.jpg');
INSERT INTO `shop_detail` VALUES ('11', '5', '蓝色', 'fd13d0ae0e6ad549086b6e8f78f41cae.jpg;96a02fe94009eb9f8266f7a6c36faff4.jpg;830f26079416228cf6ee0ec381eff56b.jpg');
INSERT INTO `shop_detail` VALUES ('12', '7', '黑色', '74f6f5eb3708f87a691f9089d8497307.jpg;125acdb09eaff1eaf803586f2184a9b3.jpg;1dbaea2781d1da181f9f033bd771daa2.jpg');
INSERT INTO `shop_detail` VALUES ('14', '8', '蓝色', '6a35677e07255941482b905c80acec3c.jpg;934133654b83752e80a61ffa63298f40.jpg;7d0086dc42bac77ddf51cedb38d2db7b.jpg');
INSERT INTO `shop_detail` VALUES ('15', '7', '红色', '20849f2dfafab573972d6b9f63537393.jpg;038a003d639cd7aa1afdb370ea7b87ae.jpg;effb88109267a4324e2e236d96760051.jpg');
INSERT INTO `shop_detail` VALUES ('16', '8', '紫色', '5350b953ce7ba1a9c7cd9b41e502fad1.jpg;f4245981a0b1dcb3802879c9aeff4abd.jpg;a3d01a9f9faf7f4039864c3cd0dd8f30.jpg');
INSERT INTO `shop_detail` VALUES ('17', '10', '红色', '28ab458ea63b45ecf6a7d4636c962db3.jpg;5c4d8a65a71ad6e610ca86ae696c5958.jpg;2e4ce2b43569ac59115187862a9c3629.jpg');
INSERT INTO `shop_detail` VALUES ('18', '10', '灰色', 'fbfb5ebb45f078f496f56542ebc37f7b.jpg;0d2e055d1232664bf614e33dc0200566.jpg;31b9d895b6dea178530cf4bfbdc4181b.jpg');
INSERT INTO `shop_detail` VALUES ('19', '11', '黑色', '4baa053647c9e0c107f38b8f78a3abc0.jpg;4fbf54e4e93b1a19cfe34199f587b268.jpg;c6fb5e2b23ead867e00cb5283ca8b52c.jpg');
INSERT INTO `shop_detail` VALUES ('20', '21', '黑色', 'df6f03f296d9672f64fb1ae42670d008.jpg;d34391705c5902a35a3d0e4320209e91.jpg;08f7c5826d6f82271400a45fee25b865.jpg');
INSERT INTO `shop_detail` VALUES ('21', '22', '黑色', 'aa30871342dabbd568757af299f650d8.jpg;134da593168e4091f1be9592fef227c2.jpg;9e533adbf8f948130872f80efd34b4d1.jpg');
INSERT INTO `shop_detail` VALUES ('24', '24', '32323', '326c675128ee1fe6c98b15087a94df7d.jpg;7f9114ccfa661e8cb951fcc628f4e8f4.jpg;06f38a4c0aec5d2fdfffa7ef1613c2a0.jpg');

-- ----------------------------
-- Table structure for shop_stock
-- ----------------------------
DROP TABLE IF EXISTS `shop_stock`;
CREATE TABLE `shop_stock` (
  `ss_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sd_id` int(11) NOT NULL COMMENT '详情id',
  `s_id` int(10) NOT NULL COMMENT '商品 id',
  `size` char(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '尺寸',
  `stock` int(10) NOT NULL COMMENT '库存',
  PRIMARY KEY (`ss_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_stock
-- ----------------------------
INSERT INTO `shop_stock` VALUES ('1', '1', '1', 'L', '200');
INSERT INTO `shop_stock` VALUES ('2', '1', '1', 'M', '120');
INSERT INTO `shop_stock` VALUES ('3', '1', '1', 'S', '40');
INSERT INTO `shop_stock` VALUES ('4', '2', '1', 'L', '20');
INSERT INTO `shop_stock` VALUES ('5', '2', '1', 'M', '210');
INSERT INTO `shop_stock` VALUES ('6', '2', '1', 'S', '32');
INSERT INTO `shop_stock` VALUES ('7', '3', '2', 'L', '210');
INSERT INTO `shop_stock` VALUES ('8', '3', '2', 'M', '231');
INSERT INTO `shop_stock` VALUES ('9', '3', '2', 'S', '123');
INSERT INTO `shop_stock` VALUES ('13', '5', '4', 'L', '122');
INSERT INTO `shop_stock` VALUES ('14', '5', '4', 'M', '231');
INSERT INTO `shop_stock` VALUES ('15', '5', '4', 'S', '124');
INSERT INTO `shop_stock` VALUES ('16', '6', '4', 'L', '1223');
INSERT INTO `shop_stock` VALUES ('17', '6', '4', 'M', '233');
INSERT INTO `shop_stock` VALUES ('18', '6', '4', 'S', '120');
INSERT INTO `shop_stock` VALUES ('19', '7', '4', 'L', '23');
INSERT INTO `shop_stock` VALUES ('20', '7', '4', 'M', '21');
INSERT INTO `shop_stock` VALUES ('21', '7', '4', 'S', '32');
INSERT INTO `shop_stock` VALUES ('22', '8', '5', 'L', '123');
INSERT INTO `shop_stock` VALUES ('23', '9', '6', 'M', '30');
INSERT INTO `shop_stock` VALUES ('24', '9', '6', 'S', '20');
INSERT INTO `shop_stock` VALUES ('25', '9', '6', 'L', '13');
INSERT INTO `shop_stock` VALUES ('26', '8', '5', 'M', '234');
INSERT INTO `shop_stock` VALUES ('27', '8', '5', 'S', '21');
INSERT INTO `shop_stock` VALUES ('28', '10', '5', 'S', '564');
INSERT INTO `shop_stock` VALUES ('29', '10', '5', 'M', '233');
INSERT INTO `shop_stock` VALUES ('30', '10', '5', 'L', '22');
INSERT INTO `shop_stock` VALUES ('31', '11', '5', 'L', '120');
INSERT INTO `shop_stock` VALUES ('32', '11', '5', 'M', '111');
INSERT INTO `shop_stock` VALUES ('33', '11', '5', 'S', '231');
INSERT INTO `shop_stock` VALUES ('34', '12', '7', 'L', '12');
INSERT INTO `shop_stock` VALUES ('35', '12', '7', 'M', '22');
INSERT INTO `shop_stock` VALUES ('36', '12', '7', 'S', '20');
INSERT INTO `shop_stock` VALUES ('37', '14', '8', 'L', '122');
INSERT INTO `shop_stock` VALUES ('38', '14', '8', 'M', '1111');
INSERT INTO `shop_stock` VALUES ('39', '14', '8', 'S', '12');
INSERT INTO `shop_stock` VALUES ('40', '15', '7', 'L', '11');
INSERT INTO `shop_stock` VALUES ('41', '15', '7', 'M', '111');
INSERT INTO `shop_stock` VALUES ('42', '15', '7', 'S', '333');
INSERT INTO `shop_stock` VALUES ('43', '16', '8', 'L', '555');
INSERT INTO `shop_stock` VALUES ('44', '16', '8', 'M', '333');
INSERT INTO `shop_stock` VALUES ('45', '16', '8', 'S', '222');
INSERT INTO `shop_stock` VALUES ('46', '17', '10', 'L', '100');
INSERT INTO `shop_stock` VALUES ('47', '17', '10', 'M', '200');
INSERT INTO `shop_stock` VALUES ('48', '17', '10', 'S', '200');
INSERT INTO `shop_stock` VALUES ('49', '18', '10', 'L', '111');
INSERT INTO `shop_stock` VALUES ('50', '18', '10', 'M', '200');
INSERT INTO `shop_stock` VALUES ('51', '18', '10', 'S', '200');
INSERT INTO `shop_stock` VALUES ('52', '19', '11', 'L', '100');
INSERT INTO `shop_stock` VALUES ('53', '19', '11', 'M', '100');
INSERT INTO `shop_stock` VALUES ('54', '20', '21', 'M', '100');
INSERT INTO `shop_stock` VALUES ('55', '21', '22', 'L', '999');
INSERT INTO `shop_stock` VALUES ('58', '24', '24', 'L', '0');

-- ----------------------------
-- Table structure for shop_type
-- ----------------------------
DROP TABLE IF EXISTS `shop_type`;
CREATE TABLE `shop_type` (
  `st_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品 id',
  `stname` varchar(20) NOT NULL COMMENT '商品类别',
  `p_id` int(11) NOT NULL COMMENT '父类 id',
  `path` varchar(20) NOT NULL COMMENT '级别',
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_type
-- ----------------------------
INSERT INTO `shop_type` VALUES ('3', 'T恤', '0', '0');
INSERT INTO `shop_type` VALUES ('4', '短袖', '3', '0,3');
INSERT INTO `shop_type` VALUES ('5', '衬衫', '0', '0');
INSERT INTO `shop_type` VALUES ('6', '免烫', '5', '0,5');
INSERT INTO `shop_type` VALUES ('7', '运动装', '0', '0');
INSERT INTO `shop_type` VALUES ('8', '运动裤', '7', '0,7');
INSERT INTO `shop_type` VALUES ('9', '外套', '0', '0');
INSERT INTO `shop_type` VALUES ('10', '大衣', '9', '0,9');
INSERT INTO `shop_type` VALUES ('11', '黑标', '0', '0');
INSERT INTO `shop_type` VALUES ('12', '针织衫', '0', '0');
INSERT INTO `shop_type` VALUES ('13', '水柔棉', '0', '0');
INSERT INTO `shop_type` VALUES ('14', '衣配饰', '0', '0');
INSERT INTO `shop_type` VALUES ('15', '长袖', '3', '0,3');
INSERT INTO `shop_type` VALUES ('17', '连衣袖', '3', '0,3');
INSERT INTO `shop_type` VALUES ('18', '法兰绒', '5', '0,5');
INSERT INTO `shop_type` VALUES ('19', '牛皮绒', '5', '0,5');
INSERT INTO `shop_type` VALUES ('20', '休闲', '5', '0,5');
INSERT INTO `shop_type` VALUES ('21', '西服', '9', '0,9');
INSERT INTO `shop_type` VALUES ('22', '羽绒服', '9', '0,9');
INSERT INTO `shop_type` VALUES ('23', '夹克', '9', '0,9');
INSERT INTO `shop_type` VALUES ('24', '空调绒', '12', '0,12');
INSERT INTO `shop_type` VALUES ('25', '羊毛绒', '12', '0,12');
INSERT INTO `shop_type` VALUES ('26', '棉线绒', '12', '0,12');
INSERT INTO `shop_type` VALUES ('42', 'jfiew', '0', '0');
INSERT INTO `shop_type` VALUES ('28', ' 裤装', '11', '0,11');
INSERT INTO `shop_type` VALUES ('29', ' 麻', '11', '0,11');
INSERT INTO `shop_type` VALUES ('30', '拉链开', '13', '0,13');
INSERT INTO `shop_type` VALUES ('31', '拉链V', '13', '0,13');
INSERT INTO `shop_type` VALUES ('32', '长链圆', '13', '0,13');
INSERT INTO `shop_type` VALUES ('33', '被子', '14', '0,14');
INSERT INTO `shop_type` VALUES ('34', '被子', '13', '0,13');
INSERT INTO `shop_type` VALUES ('35', '背心', '14', '0,14');
INSERT INTO `shop_type` VALUES ('36', '家具毯', '14', '0,14');
INSERT INTO `shop_type` VALUES ('37', '家具毯', '13', '0,13');
INSERT INTO `shop_type` VALUES ('43', 'feqf1', '42', '0,42');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `userphone` bigint(14) NOT NULL,
  `cate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类别 0为用户 1 为商家',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `jointime` int(14) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'boos', '111111', '1863241537', '0', '0', '765364356');
INSERT INTO `user` VALUES ('2', 'homes', '$2y$10$6Bb00FlU/JpdJmaRBbCw0eeD2mkVsg1vLUCiv57d2HSWLG1mEw2GO', '15733265751', '1', '0', '1491300134');
INSERT INTO `user` VALUES ('7', 'ceshiww', '$2y$10$FghJDI.sXE3u/7lpBsGC3uzxA0ypoGvxazXjvAtNtztZvvi.IaZ3i', '15733265750', '1', '0', '1492450220');
INSERT INTO `user` VALUES ('6', 'ceshiqq', '$2y$10$79Dv8VaxTG4prrrM/uxHEOlLxu9dni4lDnzD9eXaMmLP3Z7Kd9YDq', '15733265752', '1', '0', '1492410100');

-- ----------------------------
-- Table structure for userfeedback
-- ----------------------------
DROP TABLE IF EXISTS `userfeedback`;
CREATE TABLE `userfeedback` (
  `f_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL COMMENT '用户id',
  `f_cate` tinyint(1) NOT NULL COMMENT '反馈类别 0为建议 1为投诉',
  `feedtime` int(11) NOT NULL COMMENT '反馈日期',
  `feedback` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '反馈信息',
  `remarks` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of userfeedback
-- ----------------------------

-- ----------------------------
-- Table structure for user_coupon
-- ----------------------------
DROP TABLE IF EXISTS `user_coupon`;
CREATE TABLE `user_coupon` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL COMMENT '优惠劵id',
  `u_id` int(11) NOT NULL COMMENT '领取人id',
  `starttime` int(11) NOT NULL COMMENT '领取时间',
  `endtime` int(11) NOT NULL COMMENT '有效期截止时间',
  `status` int(4) NOT NULL COMMENT '是否使用，1，默认未使用，0，已经使用',
  `number` int(11) NOT NULL COMMENT '优惠劵编号默认为领取的时间戳加优惠劵id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_coupon
-- ----------------------------
INSERT INTO `user_coupon` VALUES ('12', '6', '2', '1492341445', '1493205445', '0', '1492341451');
INSERT INTO `user_coupon` VALUES ('13', '7', '2', '1492341446', '1493205446', '0', '1492341453');
INSERT INTO `user_coupon` VALUES ('14', '8', '2', '1492341448', '1493205448', '1', '1492341456');
INSERT INTO `user_coupon` VALUES ('15', '9', '2', '1492341449', '1493205449', '1', '1492341458');
INSERT INTO `user_coupon` VALUES ('16', '13', '2', '1492342649', '1493206649', '1', '1492342662');

-- ----------------------------
-- Table structure for user_detail
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(10) NOT NULL COMMENT '主键 id',
  `usertime` int(11) NOT NULL COMMENT '注册时间',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `sex` tinyint(1) DEFAULT '0' COMMENT '性别 默认为0 0为男性 1为女性',
  `pic` varchar(255) DEFAULT NULL COMMENT '头像 路径',
  `birthday` datetime DEFAULT NULL COMMENT '生日',
  `tel` int(11) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `score` int(11) DEFAULT NULL COMMENT '积分',
  `money` decimal(10,0) DEFAULT '0' COMMENT '账户金额',
  `consume` float(10,2) DEFAULT NULL COMMENT '总消费金额',
  `member` tinyint(1) DEFAULT NULL COMMENT '会员等级',
  `usercondition` int(1) DEFAULT NULL COMMENT '用户状态',
  `paymentpassword` int(6) DEFAULT '111111' COMMENT '支付密码',
  `idnumber` varchar(18) DEFAULT NULL,
  `realname` char(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_detail
-- ----------------------------
INSERT INTO `user_detail` VALUES ('1', '1', '765364356', null, '0', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `user_detail` VALUES ('2', '2', '23434', '张哲', '0', '/uploads/pic/86ec612f8f5a0964e88a41d20ca5e11a.jpg', '2017-04-19 09:07:23', '2147483647', 'qwety@et.com', null, '222411501', null, null, null, '111111', '130525199608024511', '张哲');
INSERT INTO `user_detail` VALUES ('3', '6', '0', null, '0', '/uploads/pic/default.jpg', null, null, null, null, '42242823', null, null, null, '111111', null, null);
INSERT INTO `user_detail` VALUES ('4', '7', '0', null, '0', '/uploads/pic/default.jpg', null, null, null, null, '2000000', null, null, null, '111111', null, null);

-- ----------------------------
-- Table structure for user_shop
-- ----------------------------
DROP TABLE IF EXISTS `user_shop`;
CREATE TABLE `user_shop` (
  `us_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL COMMENT '店主 id',
  `st_id` int(11) NOT NULL COMMENT '类别 id',
  `sname` varchar(255) NOT NULL COMMENT '店铺名',
  `shopcredit` varchar(255) NOT NULL DEFAULT '0' COMMENT '信誉度',
  `shopcondition` int(3) NOT NULL DEFAULT '1' COMMENT '商铺状态 0 正常 1 待审核 2 封店',
  `sales` int(20) NOT NULL DEFAULT '0' COMMENT '销售额',
  `grade` char(50) NOT NULL DEFAULT '0' COMMENT '等级',
  `shoptime` int(14) DEFAULT NULL COMMENT '开店时间',
  PRIMARY KEY (`us_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_shop
-- ----------------------------
INSERT INTO `user_shop` VALUES ('0', '1', '2', 'Vancl', '0', '1', '0', '0', '111111');
INSERT INTO `user_shop` VALUES ('2', '2', '3', '小康之家', '0', '0', '0', '0', '1492287405');
INSERT INTO `user_shop` VALUES ('3', '6', '5', 'ceshiqq', '0', '0', '0', '0', '1492410214');
INSERT INTO `user_shop` VALUES ('4', '7', '9', 'ceshidianou', '0', '0', '0', '0', '1492342883');
