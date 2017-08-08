-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2017 at 03:29 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsx-purchase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bn_auth_role`
--

CREATE TABLE `bn_auth_role` (
  `role_code` varchar(100) NOT NULL,
  `role_desc` varchar(255) NOT NULL DEFAULT 'N',
  `master_flag` varchar(1) NOT NULL DEFAULT 'N',
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bn_auth_role`
--

INSERT INTO `bn_auth_role` (`role_code`, `role_desc`, `master_flag`, `update_date`, `update_by`, `create_date`, `create_by`) VALUES
('ADMIN', 'Admin           ', 'N', '2017-07-05 17:39:44', 'maya.skyt@gmail.com', '2016-12-01 00:00:00', 'SYSTEM'),
('Marketing-Manager', 'Marketing-Manager', 'N', '2017-07-03 14:17:12', 'maya.skyt@gmail.com', '2017-07-03 09:10:49', 'maya.skyt@gmail.com'),
('SUPER_ADMIN', 'Super Admin', 'Y', '2017-06-15 16:03:23', 'maya.skyt@gmail.com', '2016-12-01 00:00:00', 'SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `bn_auth_role_func`
--

CREATE TABLE `bn_auth_role_func` (
  `role_func_id` int(22) NOT NULL,
  `role_ref` varchar(22) DEFAULT NULL,
  `func_ref` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bn_auth_role_func`
--

INSERT INTO `bn_auth_role_func` (`role_func_id`, `role_ref`, `func_ref`) VALUES
(4924, 'SUPER_ADMIN', '76'),
(4925, 'SUPER_ADMIN', '77'),
(4926, 'SUPER_ADMIN', '78'),
(4927, 'SUPER_ADMIN', '79'),
(4928, 'SUPER_ADMIN', '80'),
(4929, 'SUPER_ADMIN', '81'),
(4930, 'SUPER_ADMIN', '82'),
(4931, 'SUPER_ADMIN', '83'),
(4932, 'SUPER_ADMIN', '84'),
(4968, 'MARKETING', '76'),
(4969, 'MARKETING', '77'),
(4970, 'MARKETING', '78'),
(4971, 'MARKETING', '79'),
(4972, 'MARKETING', '80'),
(4973, 'MARKETING', '81'),
(4974, 'MARKETING', '82'),
(4975, 'MARKETING', '83'),
(4976, 'MARKETING', '84'),
(4988, 'Marketing-Manager', '76'),
(4989, 'Marketing-Manager', '77'),
(4990, 'Marketing-Manager', '78'),
(4991, 'Marketing-Manager', '79'),
(4992, 'Marketing-Manager', '80'),
(4993, 'Marketing-Manager', '81'),
(4994, 'Marketing-Manager', '82'),
(4995, 'Marketing-Manager', '83'),
(4996, 'Marketing-Manager', '84'),
(4997, 'Marketing-Manager', '85'),
(4998, 'Marketing-Manager', '86'),
(4999, 'Marketing-Manager', '87'),
(5000, 'Marketing-Manager', '88'),
(5001, 'Marketing-Manager', '89'),
(5002, 'Marketing-Manager', '90'),
(5003, 'Marketing-Manager', '91'),
(5004, 'Marketing-Manager', '92'),
(5005, 'Marketing-Manager', '93'),
(5006, 'Marketing-Manager', '94'),
(5007, 'Marketing-Manager', '95'),
(5048, 'MAY', '76'),
(5049, 'MAY', '77'),
(5050, 'MAY', '78'),
(5051, 'MAY', '79'),
(5052, 'MAY', '80'),
(5053, 'MAY', '81'),
(5054, 'MAY', '82'),
(5055, 'MAY', '83'),
(5056, 'MAY', '84'),
(5057, 'MAY', '85'),
(5058, 'MAY', '86'),
(5059, 'MAY', '87'),
(5060, 'MAY', '88'),
(5061, 'MAY', '89'),
(5062, 'MAY', '90'),
(5063, 'MAY', '91'),
(5064, 'MAY', '92'),
(5065, 'MAY', '93'),
(5066, 'MAY', '94'),
(5067, 'MAY', '95'),
(5235, 'ADMIN', '81'),
(5236, 'ADMIN', '82'),
(5237, 'ADMIN', '83'),
(5238, 'ADMIN', '85'),
(5239, 'ADMIN', '86'),
(5240, 'ADMIN', '87'),
(5241, 'ADMIN', '88'),
(5242, 'ADMIN', '90'),
(5243, 'ADMIN', '91'),
(5244, 'ADMIN', '93'),
(5245, 'ADMIN', '94'),
(5246, 'ADMIN', '95');

-- --------------------------------------------------------

--
-- Table structure for table `bn_func_major`
--

CREATE TABLE `bn_func_major` (
  `func_master_ids` int(22) NOT NULL,
  `func_master_name_en` varchar(255) NOT NULL,
  `func_master_name_th` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(50) DEFAULT NULL,
  `sub_menu` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bn_func_major`
--

INSERT INTO `bn_func_major` (`func_master_ids`, `func_master_name_en`, `func_master_name_th`, `uri`, `icon`, `sub_menu`) VALUES
(1, 'Dashboard', 'แดชบอร์ด', 'dashboard', 'icon-dashboard', '0'),
(2, 'Authentication', '', 'authen', NULL, '1'),
(3, 'Sale Management', '', 'sale', NULL, '1'),
(4, 'Project Management', '', 'project', NULL, '0'),
(5, 'Purchase Management', '', 'purchase', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `bn_func_minor`
--

CREATE TABLE `bn_func_minor` (
  `func_minor_ids` int(11) NOT NULL,
  `func_master_id` int(11) NOT NULL,
  `func_minor_name_en` varchar(255) NOT NULL,
  `func_minor_name_th` varchar(255) NOT NULL,
  `func_minor_key` varchar(20) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `func_minor_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bn_func_minor`
--

INSERT INTO `bn_func_minor` (`func_minor_ids`, `func_master_id`, `func_minor_name_en`, `func_minor_name_th`, `func_minor_key`, `uri`, `func_minor_status`) VALUES
(30, 2, 'User Management', '', '', 'init-user', 'A'),
(31, 2, 'Role Management', '', '', 'init-role', 'A'),
(32, 3, 'Report', '', '', 'report', 'A'),
(33, 5, 'Purchase Request', '', '', 'request', 'A'),
(34, 5, 'Purchase Approve', '', '', 'approve', 'A'),
(35, 5, 'Purchase Report', '', '', 'report', 'A'),
(36, 5, 'PO', '', '', 'po', 'A'),
(37, 5, 'PO - Report', '', '', 'po-report', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `bn_func_minor_sub`
--

CREATE TABLE `bn_func_minor_sub` (
  `func_minor_sub_ids` int(22) NOT NULL,
  `func_master_id` int(22) NOT NULL,
  `func_minor_id` int(22) NOT NULL,
  `func_minor_sub_name` varchar(1024) NOT NULL,
  `func_minor_sub_status` varchar(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bn_func_minor_sub`
--

INSERT INTO `bn_func_minor_sub` (`func_minor_sub_ids`, `func_master_id`, `func_minor_id`, `func_minor_sub_name`, `func_minor_sub_status`) VALUES
(76, 1, 0, 'view', 'A'),
(77, 2, 30, 'view', 'A'),
(78, 2, 30, 'create', 'A'),
(79, 2, 30, 'update', 'A'),
(80, 2, 30, 'delete', 'A'),
(81, 2, 31, 'view', 'A'),
(82, 2, 31, 'create', 'A'),
(83, 2, 31, 'update', 'A'),
(84, 2, 31, 'delete', 'A'),
(85, 3, 32, 'view', 'A'),
(86, 4, 0, 'view', 'A'),
(87, 4, 0, 'create', 'A'),
(88, 4, 0, 'update', 'A'),
(89, 4, 0, 'delete', 'A'),
(90, 5, 33, 'create', 'A'),
(91, 5, 34, 'update', 'A'),
(92, 5, 34, 'change-status', 'A'),
(93, 5, 35, 'view', 'A'),
(94, 5, 36, 'create', 'A'),
(95, 5, 37, 'view', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `bn_user_profile`
--

CREATE TABLE `bn_user_profile` (
  `account` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` varchar(100) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `change_password_date` datetime DEFAULT NULL,
  `create_by` varchar(100) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_by` varchar(100) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(1) DEFAULT 'D',
  `master_flag` varchar(45) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bn_user_profile`
--

INSERT INTO `bn_user_profile` (`account`, `password`, `role_id`, `firstname`, `lastname`, `last_login_date`, `change_password_date`, `create_by`, `create_date`, `update_by`, `update_date`, `status`, `master_flag`) VALUES
('ao@dev.co', '3028879ab8d5c87dc023049fa5bb5c1a', 'SUPER_ADMIN', 'Ao', 'Promote', NULL, NULL, 'maya.skyt@gmail.com', '2017-07-03 06:29:51', 'ao@dev.co', '2017-07-17 15:34:40', 'A', 'N'),
('maya.skyt@gmail.com', '6c4b6aaa6620ad93db302d078c2dc9a1', 'SUPER_ADMIN', 'Sukanya', 'Tibadee', NULL, NULL, NULL, NULL, 'maya.skyt@gmail.com', '2017-07-03 06:28:43', 'A', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(250) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_tel` varchar(20) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_fax` varchar(20) NOT NULL,
  `cus_info` text NOT NULL,
  `cus_person_name` varchar(250) NOT NULL,
  `cus_person_tel` int(20) NOT NULL,
  `cus_createdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_address`, `cus_tel`, `cus_phone`, `cus_fax`, `cus_info`, `cus_person_name`, `cus_person_tel`, `cus_createdate`) VALUES
(1, 'bbb', '', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(2, 'aa', '', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(3, 'mm', '', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(14, 'true', '', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(13, 'company test', '', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(15, 'bigmama', '', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(11, 'lumpini', '', '', '', '', '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `func_log`
--

CREATE TABLE `func_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `func_name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `action_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_size` varchar(100) NOT NULL,
  `item_thickness` varchar(150) NOT NULL,
  `item_pfilm` varchar(150) NOT NULL,
  `item_aica` varchar(150) NOT NULL,
  `item_qty` int(20) NOT NULL,
  `stk_id` int(5) NOT NULL,
  `item_add_date` datetime NOT NULL,
  `item_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_code`, `item_size`, `item_thickness`, `item_pfilm`, `item_aica`, `item_qty`, `stk_id`, `item_add_date`, `item_status`) VALUES
(1, '0', '0', '0', '0', '0', 0, 5, '2017-07-29 21:49:32', 1),
(2, 'trrtrt', '0', '0', '0', '0', 0, 6, '2017-07-29 21:49:52', 1),
(3, 'ttrtr', '30', 'rttr', 'celsus', '20', 0, 7, '2017-07-29 21:52:12', 1),
(4, 'bbbb', 'bb', 'bb', 'portform', 'bbb', 210, 8, '2017-07-30 13:42:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_id` int(11) NOT NULL,
  `proj_name` varchar(250) NOT NULL,
  `proj_owner` varchar(250) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `proj_createdate` datetime NOT NULL,
  `proj_about` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_id`, `proj_name`, `proj_owner`, `cus_id`, `proj_createdate`, `proj_about`, `status`) VALUES
(2, 'ghgh', 'Ao Promote', 7, '2017-07-23 00:34:11', 'ghgh', 0),
(3, '1', 'Ao Promote', 8, '2017-07-23 00:34:46', '111', 0),
(4, 'ss', 'Ao Promote', 9, '2017-07-23 00:37:30', 'ss', 0),
(5, 'hghg', 'Ao Promote', 10, '2017-07-23 00:38:17', 'ghgh', 0),
(7, 'jj', 'Ao Promote', 0, '2017-07-23 01:19:05', 'jj', 0),
(8, 'iiiu', 'Ao Promote', 0, '2017-07-23 11:18:32', 'uui', 0),
(9, 'uuu', 'Ao Promote', 0, '2017-07-23 11:19:24', 'uuu', 0),
(10, 'Suparaiff', 'Ao Promote', 11, '2017-07-23 12:05:15', 'Suparai detail test', 1),
(11, 'yuuyoo', 'Ao Promote', 15, '2017-07-23 12:22:47', 'yuyuyoo', 1),
(12, 'test', 'Ao Promote', 2, '2017-07-23 12:29:39', 'test', 1),
(13, 'condo 3', 'Ao Promote', 0, '2017-07-23 12:30:22', 'condo 3 ', 1),
(14, 'ddd', 'Ao Promote', 13, '2017-07-23 12:33:28', 'xxx', 1),
(15, 'www', 'Ao Promote', 14, '2017-07-23 12:33:51', 'ddd', 1),
(16, 'yuuy', 'Ao Promote', 1, '2017-07-29 13:04:43', 'yuyu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `puror_id` int(11) NOT NULL,
  `purq_number` int(11) NOT NULL,
  `puror_status` int(11) NOT NULL,
  `puror_approve_date` datetime NOT NULL,
  `puror_approve_by` int(11) NOT NULL,
  `puror_number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `purq_id` int(11) NOT NULL,
  `purq_user_id` int(11) NOT NULL,
  `purq_item_id` int(11) NOT NULL,
  `purq_qty` int(11) NOT NULL,
  `purq_request_date` datetime NOT NULL,
  `purq_require_start` datetime NOT NULL,
  `purq_require_end` datetime NOT NULL,
  `purq_customer_id` int(11) NOT NULL,
  `purq_comment` int(11) NOT NULL,
  `purq_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stk_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `stk_qty` int(11) NOT NULL,
  `stk_unit_price` float NOT NULL,
  `stk_add_date` datetime NOT NULL,
  `stk_add_type` enum('manual','inport','','') NOT NULL,
  `stk_add_by` varchar(100) NOT NULL,
  `stk_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stk_id`, `item_id`, `order_id`, `stk_qty`, `stk_unit_price`, `stk_add_date`, `stk_add_type`, `stk_add_by`, `stk_status`) VALUES
(1, 0, 0, 0, 0, '0000-00-00 00:00:00', 'manual', 'Ao Promote', 1),
(2, 0, 0, 0, 0, '0000-00-00 00:00:00', 'manual', 'Ao Promote', 1),
(3, 0, 0, 0, 0, '0000-00-00 00:00:00', 'manual', 'Ao Promote', 1),
(4, 0, 0, 0, 0, '0000-00-00 00:00:00', 'manual', 'Ao Promote', 1),
(5, 0, 0, 0, 0, '0000-00-00 00:00:00', 'manual', 'Ao Promote', 1),
(6, 0, 0, 0, 0, '0000-00-00 00:00:00', 'manual', 'Ao Promote', 1),
(7, 0, 0, 20, 10, '0000-00-00 00:00:00', 'manual', 'Ao Promote', 1),
(8, 0, 0, 20, 20, '2017-07-30 11:56:03', 'manual', 'Ao Promote', 1),
(9, 4, 0, 30, 0, '2017-07-30 13:25:30', 'manual', 'Ao Promote', 1),
(10, 4, 0, 30, 0, '2017-07-30 13:26:41', 'manual', 'Ao Promote', 1),
(11, 4, 0, 30, 0, '2017-07-30 13:27:38', 'manual', 'Ao Promote', 1),
(12, 4, 0, 0, 20, '2017-07-30 13:28:46', 'manual', 'Ao Promote', 1),
(13, 4, 0, 20, 20, '2017-07-30 13:28:53', 'manual', 'Ao Promote', 1),
(14, 4, 0, 20, 20, '2017-07-30 13:32:19', 'manual', 'Ao Promote', 1),
(15, 4, 0, 20, 20, '2017-07-30 13:37:28', 'manual', 'Ao Promote', 1),
(16, 4, 0, 0, 0, '2017-07-30 13:39:26', 'manual', 'Ao Promote', 1),
(17, 4, 0, 20, 20, '2017-07-30 13:41:38', 'manual', 'Ao Promote', 1),
(18, 4, 0, 20, 20, '2017-07-30 13:42:20', 'manual', 'Ao Promote', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_import`
--

CREATE TABLE `temp_import` (
  `tmp_item_id` int(11) NOT NULL,
  `tmp_item_code` varchar(250) NOT NULL,
  `tmp_item_size` varchar(100) NOT NULL,
  `tmp_item_thickness` varchar(250) NOT NULL,
  `tmp_item_pfilm` varchar(250) NOT NULL,
  `tmp_item_aica` varchar(250) NOT NULL,
  `tmp_item_qty` int(5) NOT NULL,
  `tmp_item_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_import`
--

INSERT INTO `temp_import` (`tmp_item_id`, `tmp_item_code`, `tmp_item_size`, `tmp_item_thickness`, `tmp_item_pfilm`, `tmp_item_aica`, `tmp_item_qty`, `tmp_item_price`) VALUES
(1, 'ASW-13000-K-N74', '4\'x8\'', '1', '', 'N74', 1, 24.1),
(2, 'ASW-13001-K-N74', '4\'x8\'', '1', '', 'N74', 1, 24.1),
(3, 'ASW-13002-K-N74', '4\'x8\'', '1', '', 'N74', 2, 24.1),
(4, 'ASW-13003-K-N74', '4\'x8\'', '1', '', 'N74', 3, 24.1),
(5, 'ASW-13004-K-N74', '4\'x8\'', '1', '', 'N74', 4, 24.1),
(6, 'ASW-13005-K-N74', '4\'x8\'', '1', '', 'N74', 5, 24.1),
(7, 'AS-13000-C-N74', '4\'x8\'', '0.8', '', 'N74', 6, 12.6),
(8, 'AS-13001-C-N74', '4\'x8\'', '0.8', '', 'N74', 7, 12.6),
(9, 'AS-13001-D-N74', '4\'x8\'', '0.7', '', 'N74', 8, 9.9),
(10, 'ASU-13001-C-N74', '4\'x8\'', '0.8', 'Postform', 'N74', 9, 12.8),
(11, 'AS-13002-C-N74', '4\'x8\'', '0.8', '', 'N74', 10, 12.6),
(12, 'AS-13002-D-N74', '4\'x8\'', '0.8', '', 'N74', 11, 9.9),
(13, 'AS-13003-C-N74', '4\'x8\'', '0.8', '', 'N74', 12, 12.6),
(14, 'AS-13003-D-N74', '4\'x8\'', '0.7', '', 'N74', 13, 9.9),
(15, 'AS-13004-C-N74', '4\'x8\'', '0.8', '', 'N74', 14, 12.6),
(16, 'AS-13005-C-N74', '4\'x8\'', '0.8', '', 'N74', 15, 12.6),
(17, 'AS-13005-D-N74', '4\'x8\'', '0.7', '', 'N74', 16, 9.9),
(18, 'AS-13006-C-N74', '4\'x8\'', '0.8', '', 'N74', 17, 12.6),
(19, 'AS-13006-D-N74', '4\'x8\'', '0.7', '', 'N74', 18, 9.9),
(20, 'AS-13007-C-N74', '4\'x8\'', '0.8', '', 'N74', 19, 12.6),
(21, 'AS-13007-C-M89', '4\'x8\'', '0.8', '', 'M89', 20, 13.3),
(22, 'AS-13008-C-N74', '4\'x8\'', '0.8', '', 'N74', 21, 12.6),
(23, 'AS-13008-D-N74', '4\'x8\'', '0.7', '', 'N74', 22, 9.9),
(24, 'AS-13008-C-S89', '4\'x8\'', '0.8', '', 'S89', 23, 13.3),
(25, 'AS-13009-C-N74', '4\'x8\'', '0.8', '', 'N74', 24, 12.6),
(26, 'AS-13009-C-N74', '4\'x8\'', '0.8', 'YES', 'N74', 25, 14.5),
(27, 'TAS-13009-C-T74', '4\'x8\'', '0.8', 'CELSUS', 'T74', 26, 19.3),
(28, 'AS-13011-C-N74', '4\'x8\'', '0.8', '', 'N74', 27, 12.9),
(29, 'AS-13015-C-N74', '4\'x8\'', '0.8', '', 'N74', 28, 12.9),
(30, 'AS-13010-C-N74', '4\'x8\'', '0.8', '', 'N74', 29, 12.9),
(31, 'AS-13013-C-N74', '4\'x8\'', '0.8', '', 'N74', 30, 12.9),
(32, 'AS-13014-C-N74', '4\'x8\'', '0.8', '', 'N74', 31, 12.9),
(33, 'AS-13018-C-N74', '4\'x8\'', '0.8', '', 'N74', 32, 12.9),
(34, 'AS-13012-C-N74', '4\'x8\'', '0.8', '', 'N74', 33, 12.9),
(35, 'AS-13016-C-N74', '4\'x8\'', '0.8', '', 'N74', 34, 12.9),
(36, 'AS-13017-C-N74', '4\'x8\'', '0.8', '', 'N74', 35, 12.9),
(37, 'AS-13000-K-M', '4\'x8\'', '1', 'YES', 'M', 36, 16.6),
(38, 'AS-13009-K-M', '4\'x8\'', '1', 'YES', 'M', 37, 16.6),
(39, 'AS-13018-K-M', '4\'x8\'', '1', 'YES', 'M', 38, 16.6),
(40, 'AS-13017-K-M', '4\'x8\'', '1', 'YES', 'M', 39, 16.6),
(41, 'AS-13000-C-S89', '4\'x8\'', '0.8', '', 'S89', 40, 13.5),
(42, 'AS-13005-C-S89', '4\'x8\'', '0.8', '', 'S89', 41, 13.5),
(43, 'AS-13016-C-S89', '4\'x8\'', '0.8', '', 'S89', 42, 13.5),
(44, 'AS-13009-C-S89', '4\'x8\'', '0.8', '', 'S89', 43, 13.5),
(45, 'AS-13000-C-G', '4\'x8\'', '0.8', '', 'G', 44, 13),
(46, 'AS-13005-C-G', '4\'x8\'', '0.8', '', 'G', 45, 13),
(47, 'AS-13001-C-G', '4\'x8\'', '0.8', '', 'G', 46, 13),
(48, 'AS-13009-C-G', '4\'x8\'', '0.8', '', 'G', 47, 13),
(49, 'AS-14000-C-S21', '4\'x8\'', '0.8', '', 'S21', 48, 14.3),
(50, 'AS-14001-C-S21', '4\'x8\'', '0.8', '', 'S21', 49, 14.3),
(51, 'AS-14002-C-S21', '4\'x8\'', '0.8', '', 'S21', 50, 14.3),
(52, 'AS-14003-C-S16', '4\'x8\'', '0.8', '', 'S16', 51, 14.3),
(53, 'ASY-14003-C-S16', '4\'x8\'', '0.8', '', 'S16(YellowCore)', 52, 15.9),
(54, 'AS-14004-C-S16', '4\'x8\'', '0.8', '', 'S16', 53, 14.3),
(55, 'ASY-14004-C-S16', '4\'x8\'', '0.8', '', 'S16(YellowCore)', 54, 15.9),
(56, 'AS-14005-C-S16', '4\'x8\'', '0.8', '', 'S16', 55, 14.3),
(57, 'AS-14006-C-S98', '4\'x8\'', '0.8', '', 'S98', 56, 14.3),
(58, 'AS-14007-C-S98', '4\'x8\'', '0.8', '', 'S98', 57, 14.3),
(59, 'AS-14008-C-S98', '4\'x8\'', '0.8', '', 'S98', 58, 14.3),
(60, 'AS-14009-C-N74', '4\'x8\'', '0.8', '', 'N74', 59, 13.3),
(61, 'AS-14010-C-N74', '4\'x8\'', '0.8', '', 'N74', 60, 13.3),
(62, 'AS-14011-C-N74', '4\'x8\'', '0.8', '', 'N74', 61, 13.3),
(63, 'AS-14012-C-S62', '4\'x8\'', '0.8', '', 'S62', 62, 14.3),
(64, 'AS-14013-C-S62', '4\'x8\'', '0.8', '', 'S62', 63, 14.3),
(65, 'AS-14014-C-S62', '4\'x8\'', '0.8', '', 'S62', 64, 14.3),
(66, 'AS-14015-C-S98', '4\'x8\'', '0.8', '', 'S98', 65, 14.3),
(67, 'ASY-14015-C-S98', '4\'x8\'', '0.8', '', 'S98(YellowCore)', 66, 15.9),
(68, 'AS-14015-C-S62', '4\'x8\'', '0.8', '', 'S62', 67, 13.9),
(69, 'ASU-14015-C-S98', '4\'x8\'', '0.8', 'Postform', 'S98', 68, 15.3),
(70, 'AS-14015-K-M', '4\'x8\'', '1', 'YES', 'M', 69, 16.4),
(71, 'AS-14016-C-S98', '4\'x8\'', '0.8', '', 'S98', 70, 14.3),
(72, 'AS-14017-C-S98', '4\'x8\'', '0.8', '', 'S98', 71, 14.3),
(73, 'AS-14018-C-N74', '4\'x8\'', '0.8', '', 'N74', 72, 13.3),
(74, 'AS-14018-C-S21', '4\'x8\'', '0.8', '', 'S21', 73, 13.3),
(75, 'ASU-14018-C-N74', '4\'x8\'', '0.8', 'Postform', 'N74', 74, 13.3),
(76, 'AS-14019-C-N74', '4\'x8\'', '0.8', '', 'N74', 75, 13.3),
(77, 'AS-14020-C-N74', '4\'x8\'', '0.8', '', 'N74', 76, 13.3),
(78, 'AS-14021-C-S99', '4\'x8\'', '0.8', '', 'S99', 77, 14.3),
(79, 'ASU-14021-C-S99', '4\'x8\'', '0.8', 'Postform', 'S99', 78, 14.3),
(80, 'AS-14022-C-S99', '4\'x8\'', '0.8', '', 'S99', 79, 14.3),
(81, 'AS-14023-C-S99', '4\'x8\'', '0.8', '', 'S99', 80, 14.3),
(82, 'AS-14024-C-S98', '4\'x8\'', '0.8', '', 'S98', 81, 14.3),
(83, 'ASY-14024-K-M', '4\'x8\'', '0.8', 'YES', 'M', 82, 19),
(84, 'AS-14025-C-S98', '4\'x8\'', '0.8', '', 'S98', 83, 14.3),
(85, 'AS-14026-C-S98', '4\'x8\'', '0.8', '', 'S98', 84, 14.3),
(86, 'AS-14027-C-S98', '4\'x8\'', '0.8', '', 'S98', 85, 14.3),
(87, 'AS-14028-C-S98', '4\'x8\'', '0.8', '', 'S98', 86, 14.3),
(88, 'AS-14029-C-S98', '4\'x8\'', '0.8', '', 'S98', 87, 14.3),
(89, 'AS-14030-C-S98', '4\'x8\'', '0.8', '', 'S98', 88, 14.3),
(90, 'AS-14030-K-M', '4\'x8\'', '0.8', 'YES', 'M', 89, 17.4),
(91, 'AS-14031-C-S98', '4\'x8\'', '0.8', '', 'S98', 90, 14.3),
(92, 'AS-14032-C-S98', '4\'x8\'', '0.8', '', 'S98', 91, 14.3),
(93, 'AS-14033-C-S98', '4\'x8\'', '0.8', '', 'S98', 92, 14.3),
(94, 'AS-14034-C-S98', '4\'x8\'', '0.8', '', 'S98', 93, 14.3),
(95, 'AS-14035-K-M', '4\'x8\'', '1', 'YES', 'M', 94, 17.3),
(96, 'AS-14036-K-M', '4\'x8\'', '1', 'YES', 'M', 95, 17.3),
(97, 'AS-14037-K-M', '4\'x8\'', '1', 'YES', 'M', 96, 17.3),
(98, 'AS-14035-C-S98', '4\'x8\'', '0.8', '', 'S98', 97, 14.2),
(99, 'AS-14036-C-S98', '4\'x8\'', '0.8', '', 'S98', 98, 14.2),
(100, 'AS-14037-C-S98', '4\'x8\'', '0.8', '', 'S98', 99, 14.2),
(101, 'AS-14038-K-M', '4\'x8\'', '1', 'YES', 'M', 100, 17.3),
(102, 'ASY-14038-K-M', '4\'x8\'', '1', '', 'M (Yellow core)', 101, 19),
(103, 'ASY-14038-K-S83', '4\'x8\'', '1', '', 'S83 (Yellow core)', 102, 17.7),
(104, 'AS-14039-C-G', '4\'x8\'', '0.8', '', 'G', 103, 13.2),
(105, 'AS-14040-K-M', '4\'x8\'', '1', 'YES', 'M', 104, 17.3),
(106, 'AS-14041-K-M', '4\'x8\'', '1', 'YES', 'M', 105, 17.3),
(107, 'INA-8101-C-S21', '4\'x8\'', '0.8', '', 'S21', 106, 16),
(108, 'INA-8102-C-S21', '4\'x8\'', '0.8', '', 'S21', 107, 16),
(109, 'INA-8103-C-S21', '4\'x8\'', '0.8', '', 'S21', 108, 16),
(110, 'INA-8104-C-S98', '4\'x8\'', '0.8', '', 'S98', 109, 16),
(111, 'INA-8105-C-S98', '4\'x8\'', '0.8', '', 'S98', 110, 16),
(112, 'INA-8106-C-S16', '4\'x8\'', '0.8', '', 'S16', 111, 16),
(113, 'INA-8107-C-S16', '4\'x8\'', '0.8', '', 'S16', 112, 16),
(114, 'INA-8108-C-S62', '4\'x8\'', '0.8', '', 'S62', 113, 16),
(115, 'INA-8109-C-S62', '4\'x8\'', '0.8', '', 'S62', 114, 16),
(116, 'INA-8110-C-S98', '4\'x8\'', '0.8', '', 'S98', 115, 16),
(117, 'INA-8111-C-S98', '4\'x8\'', '0.8', '', 'S98', 116, 16),
(118, 'INA-8112-C-S98', '4\'x8\'', '0.8', '', 'S98', 117, 16),
(119, 'INA-8113-C-S98', '4\'x8\'', '0.8', '', 'S98', 118, 16),
(120, 'INA-8114-C-S98', '4\'x8\'', '0.8', '', 'S98', 119, 16),
(121, 'INA-8115-C-S16', '4\'x8\'', '0.8', '', 'S16', 120, 16),
(122, 'INA-8116-C-S16', '4\'x8\'', '0.8', '', 'S16', 121, 16),
(123, 'INA-8117-C-S62', '4\'x8\'', '0.8', '', 'S62', 122, 16),
(124, 'INA-8118-C-S62', '4\'x8\'', '0.8', '', 'S62', 123, 16),
(125, 'INA-8119-C-S98', '4\'x8\'', '0.8', '', 'S98', 124, 16),
(126, 'INA-8120-C-S98', '4\'x8\'', '0.8', '', 'S98', 125, 16),
(127, 'INA-8121-C-S16', '4\'x8\'', '0.8', '', 'S16', 126, 16),
(128, 'INA-8122-C-S16', '4\'x8\'', '0.8', '', 'S16', 127, 16),
(129, 'INA-8123-C-S98', '4\'x8\'', '0.8', '', 'S98', 128, 16),
(130, 'INA-8124-C-S98', '4\'x8\'', '0.8', '', 'S98', 129, 16),
(131, 'INA-8125-C-S21', '4\'x8\'', '0.8', '', 'S21', 130, 16),
(132, 'INA-8126-K-M', '4\'x8\'', '1', 'YES', 'M', 131, 17),
(133, 'ASW-13000-K-M', '4\'x8\'', '1', 'YES', 'M', 132, 26.5),
(134, 'ASW-13001-K-M', '4\'x8\'', '1', 'YES', 'M', 133, 26.5),
(135, 'ASW-13002-K-M', '4\'x8\'', '1', 'YES', 'M', 134, 26.5),
(136, 'ASW-13003-K-M', '4\'x8\'', '1', 'YES', 'M', 135, 26.5),
(137, 'ASW-13004-K-M', '4\'x8\'', '1', 'YES', 'M', 136, 26.5),
(138, 'ASW-13005-K-M', '4\'x8\'', '1', 'YES', 'M', 137, 26.5),
(139, 'AS-14045-C-S98', '4\'x8\'', '0.8', '', 'S98', 138, 14.3),
(140, 'AS-14054-C-S98', '4\'x8\'', '0.8', '', 'S98', 139, 14.3),
(141, 'AS-14057-C-S21', '4\'x8\'', '0.8', '', 'S21', 140, 14.3),
(142, 'AS-14067-C-S21', '4\'x8\'', '0.8', '', 'S21', 141, 14.3),
(143, 'AS-14068-C-S21', '4\'x8\'', '0.8', '', 'S21', 142, 14.3),
(144, 'AS-14053-C-S62', '4\'x8\'', '0.8', '', 'S62', 143, 14.3),
(145, 'AS-14046-C-S99', '4\'x8\'', '0.8', '', 'S99', 144, 14.3),
(146, 'AS-14044-C-S98', '4\'x8\'', '0.8', '', 'S98', 145, 14.3),
(147, 'AS-14043-C-S62', '4\'x8\'', '0.8', '', 'S62', 146, 14.3),
(148, 'ASY-14043-C-S62', '4\'x8\'', '0.8', '', 'S62(YellowCore)', 147, 15.9),
(149, 'AS-14042-C-S99', '4\'x8\'', '0.8', '', 'S99', 148, 14.3),
(150, 'AS-14055-C-S98', '4\'x8\'', '0.8', '', 'S98', 149, 14.3),
(151, 'AS-14056-C-S98', '4\'x8\'', '0.8', '', 'S98', 150, 14.3),
(152, 'AS-14047-C-S98', '4\'x8\'', '0.8', '', 'S98', 151, 14.3),
(153, 'AS-14051-C-S99', '4\'x8\'', '0.8', '', 'S99', 152, 14.3),
(154, 'AS-14050-C-S99', '4\'x8\'', '0.8', '', 'S99', 153, 14.3),
(155, 'AS-14049-C-S99', '4\'x8\'', '0.8', '', 'S99', 154, 14.3),
(156, 'AS-14052-K-M', '4\'x8\'', '1', 'YES', 'M', 155, 17.3),
(157, 'AS-14058-K-M', '4\'x8\'', '1', 'YES', 'M', 156, 17.3),
(158, 'AS-14048-K-M', '4\'x8\'', '1', 'YES', 'M', 157, 17.3),
(159, 'AS-14062-C-S83', '4\'x8\'', '0.8', '', 'S83', 158, 14.3),
(160, 'AS-14063-C-S83', '4\'x8\'', '0.8', '', 'S83', 159, 14.3),
(161, 'ASU-14063-C-S83', '4\'x8\'', '0.8', 'Postform', 'S83', 160, 15.3),
(162, 'AS-14065-C-S83', '4\'x8\'', '0.8', '', 'S83', 161, 14.3),
(163, 'AS-14064-C-S83', '4\'x8\'', '0.8', '', 'S83', 162, 14.3),
(164, 'ASW-14066-K-M', '4\'x8\'', '1', 'YES', 'M', 163, 26.5),
(165, 'AS-14066-K-M', '4\'x8\'', '1', 'YES', 'M (Brown Core)', 164, 16.3),
(166, 'AS-14059-C-S22', '4\'x8\'', '0.8', '', 'S22', 165, 14.3),
(167, 'AS-14060-C-S22', '4\'x8\'', '0.8', '', 'S22', 166, 14.3),
(168, 'AS-14061-C-S22', '4\'x8\'', '0.8', '', 'S22', 167, 14.3),
(169, 'ABK-300-C-', '4\'x8\'', '0.8', '', 'Backer', 168, 5),
(170, 'AS-13019-C-N74', '4\'x8\'', '0.8', '', 'N74', 169, 13.3),
(171, 'AS-13019-D-N74', '4\'x8\'', '0.7', '', 'N74', 170, 9.9),
(172, 'AS-13020-C-N74', '4\'x8\'', '0.8', '', 'N74', 171, 13.3),
(173, 'AS-13020-D-N74', '4\'x8\'', '0.7', '', 'N74', 172, 9.9),
(174, 'AS-13021-C-N74', '4\'x8\'', '0.8', '', 'N74', 173, 13.3),
(175, 'AS-13021-D-N74', '4\'x8\'', '0.7', '', 'N74', 174, 9.9),
(176, 'AS-13023-C-N74', '4\'x8\'', '0.8', '', 'N74', 175, 13.3),
(177, 'AS-13023-D-N74', '4\'x8\'', '0.7', '', 'N74', 176, 9.9),
(178, 'HJ-5414C-C-N74', '4\'x8\'', '0.8', '', 'N74', 177, 13.3),
(179, 'ASB-13009-C-N74', '4\'x8\'', '0.8', '', 'N74', 178, 13.9),
(180, 'AS-13022-C-N74', '4\'x8\'', '0.8', '', 'N74', 179, 13.3),
(181, 'AS-13019-K-M', '4\'x8\'', '1', 'YES', 'M', 180, 17.3),
(182, 'AS-13020-K-M', '4\'x8\'', '1', 'YES', 'M', 181, 17.3),
(183, 'AS-13021-K-M', '4\'x8\'', '1', 'YES', 'M', 182, 17.3),
(184, 'AS-13022-K-M', '4\'x8\'', '1', 'YES', 'M', 183, 17.3),
(185, 'AS-13020-C-S89', '4\'x8\'', '0.8', '', 'S89', 184, 14.3),
(186, 'AS-13021-C-S89', '4\'x8\'', '0.8', '', 'S89', 185, 14.3),
(187, 'ASB-13009-K-M', '4\'x8\'', '1', 'YES', 'M', 186, 17.2),
(188, 'ASY-14002-C-S21', '4\'x8\'', '0.8', '', 'S21', 187, 16.8),
(189, 'ASY-14004-C-S16', '4\'x8\'', '0.8', '', 'S16', 188, 16.8),
(190, 'ASY-14013-C-S62', '4\'x8\'', '0.8', '', 'S62', 189, 16.8),
(191, 'ASY-14015-C-S98', '4\'x8\'', '0.8', '', 'S98', 190, 16.8),
(192, 'ASY-14023-C-S99', '4\'x8\'', '0.8', '', 'S99', 191, 16.8),
(193, 'AS-14069-C-S98', '4\'x8\'', '0.8', '', 'S98', 192, 14.3),
(194, 'AS-14070-C-S98', '4\'x8\'', '0.8', '', 'S98', 193, 14.3),
(195, 'AS-14071-C-S98', '4\'x8\'', '0.8', '', 'S98', 194, 14.3),
(196, 'AS-14072-C-S62', '4\'x8\'', '0.8', '', 'S62', 195, 14.3),
(197, 'AS-14080-C-S98', '4\'x8\'', '0.8', '', 'S98', 196, 14.3),
(198, 'AS-14081-C-S98', '4\'x8\'', '0.8', '', 'S98', 197, 14.3),
(199, 'AS-14092-C-S98', '4\'x8\'', '0.8', '', 'S98', 198, 14.3),
(200, 'AS-14093-C-S98', '4\'x8\'', '0.8', '', 'S98', 199, 14.3),
(201, 'AS-14094-C-S98', '4\'x8\'', '0.8', '', 'S98', 200, 14.3),
(202, 'AS-14095-C-S98', '4\'x8\'', '0.8', '', 'S98', 201, 14.3),
(203, 'AS-14073-C-S98', '4\'x8\'', '0.8', '', 'S98', 202, 14.3),
(204, 'AS-14074-C-S98', '4\'x8\'', '0.8', '', 'S98', 203, 14.3),
(205, 'AS-14075-C-S98', '4\'x8\'', '0.8', '', 'S98', 204, 14.3),
(206, 'AS-14079-C-S98', '4\'x8\'', '0.8', '', 'S98', 205, 14.3),
(207, 'AS-14082-C-S62', '4\'x8\'', '0.8', '', 'S62', 206, 14.3),
(208, 'AS-14083-C-S62', '4\'x8\'', '0.8', '', 'S62', 207, 14.3),
(209, 'AS-14086-C-S98', '4\'x8\'', '0.8', '', 'S98', 208, 14.3),
(210, 'AS-14087-C-S98', '4\'x8\'', '0.8', '', 'S98', 209, 14.3),
(211, 'AS-14088-C-S99', '4\'x8\'', '0.8', '', 'S99', 210, 14.3),
(212, 'AS-14091-C-S62', '4\'x8\'', '0.8', '', 'S62', 211, 14.3),
(213, 'AS-14084-C-S99', '4\'x8\'', '0.8', '', 'S99', 212, 14.3),
(214, 'AS-14085-C-S99', '4\'x8\'', '0.8', '', 'S99', 213, 14.3),
(215, 'AS-14090-C-S98', '4\'x8\'', '0.8', '', 'S98', 214, 14.3),
(216, 'AS-14096-C-S16', '4\'x8\'', '0.8', '', 'S16', 215, 14.3),
(217, 'AS-14097-C-S16', '4\'x8\'', '0.8', '', 'S16', 216, 14.3),
(218, 'AS-14098-C-S16', '4\'x8\'', '0.8', '', 'S16', 217, 14.3),
(219, 'AS-14099-C-S21', '4\'x8\'', '0.8', '', 'S21', 218, 14.3),
(220, 'AS-14100-C-N74', '4\'x8\'', '0.8', '', 'N74', 219, 13.3),
(221, 'AS-14101-C-N74', '4\'x8\'', '0.8', '', 'N74', 220, 13.3),
(222, 'AS-14102-C-N74', '4\'x8\'', '0.8', '', 'N74', 221, 13.3),
(223, 'AS-14100-K-M', '4\'x8\'', '1', 'YES', 'M', 222, 17.3),
(224, 'AS-14101-K-M', '4\'x8\'', '1', 'YES', 'M', 223, 17.3),
(225, 'AS-14102-K-M', '4\'x8\'', '1', 'YES', 'M', 224, 17.3),
(226, 'AS-14077-C-S89', '4\'x8\'', '0.8', '', 'S89', 225, 14.3),
(227, 'AS-14078-C-S89', '4\'x8\'', '0.8', '', 'S89', 226, 14.3),
(228, 'AS-14089-C-S83', '4\'x8\'', '0.8', '', 'S83', 227, 14.3),
(229, 'AS-14076-C-S22', '4\'x8\'', '0.8', '', 'S22', 228, 14.3),
(230, 'AS-13022-C-N74', '4\'x8\'', '0.8', '', 'N74', 229, 12.9),
(231, 'AS-13023-C-N74', '4\'x8\'', '0.8', '', 'N74', 230, 12.9),
(232, 'AS-13023-D-N74', '4\'x8\'', '0.7', '', 'N74', 231, 9.9),
(233, 'JI-2051-C-S98', '4\'x8\'', '0.8', '', 'S98', 232, 18.9),
(234, 'JI-2060-C-S98', '4\'x8\'', '0.8', '', 'S98', 233, 18.9),
(235, 'JI-2412-C-N74', '4\'x8\'', '0.8', '', 'N74', 234, 18.9),
(236, 'JI-384-C-J67', '4\'x8\'', '0.8', 'YES', 'J67', 235, 16.6),
(237, 'JI-301-C-J67', '4\'x8\'', '0.8', 'YES', 'J67', 236, 0),
(238, 'AI-95-C-M', '4\'x8\'', '0.8', '', 'M', 237, 14.8),
(239, 'H-5110-K-M', '4\'x8\'', '1', 'YES', 'M', 238, 18.7),
(240, 'HJ-5155-C-N74', '4\'x8\'', '0.8', '', 'N74', 0, 21.4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bn_auth_role`
--
ALTER TABLE `bn_auth_role`
  ADD PRIMARY KEY (`role_code`);

--
-- Indexes for table `bn_auth_role_func`
--
ALTER TABLE `bn_auth_role_func`
  ADD PRIMARY KEY (`role_func_id`);

--
-- Indexes for table `bn_func_major`
--
ALTER TABLE `bn_func_major`
  ADD PRIMARY KEY (`func_master_ids`);

--
-- Indexes for table `bn_func_minor`
--
ALTER TABLE `bn_func_minor`
  ADD PRIMARY KEY (`func_minor_ids`);

--
-- Indexes for table `bn_func_minor_sub`
--
ALTER TABLE `bn_func_minor_sub`
  ADD PRIMARY KEY (`func_minor_sub_ids`);

--
-- Indexes for table `bn_user_profile`
--
ALTER TABLE `bn_user_profile`
  ADD PRIMARY KEY (`account`),
  ADD UNIQUE KEY `account` (`account`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `func_log`
--
ALTER TABLE `func_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`puror_id`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`purq_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stk_id`);

--
-- Indexes for table `temp_import`
--
ALTER TABLE `temp_import`
  ADD PRIMARY KEY (`tmp_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bn_auth_role_func`
--
ALTER TABLE `bn_auth_role_func`
  MODIFY `role_func_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5247;
--
-- AUTO_INCREMENT for table `bn_func_major`
--
ALTER TABLE `bn_func_major`
  MODIFY `func_master_ids` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bn_func_minor`
--
ALTER TABLE `bn_func_minor`
  MODIFY `func_minor_ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `bn_func_minor_sub`
--
ALTER TABLE `bn_func_minor_sub`
  MODIFY `func_minor_sub_ids` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `func_log`
--
ALTER TABLE `func_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `puror_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `purq_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `temp_import`
--
ALTER TABLE `temp_import`
  MODIFY `tmp_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
