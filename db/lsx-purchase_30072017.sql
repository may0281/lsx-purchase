-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2017 at 03:54 PM
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
