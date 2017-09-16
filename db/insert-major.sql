INSERT INTO `bn_func_major` (`func_master_ids`, `func_master_name_en`, `func_master_name_th`, `uri`, `icon`, `sub_menu`) VALUES (NULL, 'Report', '', 'report', NULL, '1');
INSERT INTO `bn_func_minor` (`func_minor_ids`, `func_master_id`, `func_minor_name_en`, `func_minor_name_th`, `func_minor_key`, `uri`, `func_minor_status`) VALUES (NULL, '7', 'Weekly', '', '', 'weekly', 'A');
INSERT INTO `bn_func_minor` (`func_minor_ids`, `func_master_id`, `func_minor_name_en`, `func_minor_name_th`, `func_minor_key`, `uri`, `func_minor_status`) VALUES (NULL, '7', 'Forecast Receive Date', '', '', 'forecast-receive', 'A');
INSERT INTO `bn_func_minor_sub` (`func_minor_sub_ids`, `func_master_id`, `func_minor_id`, `func_minor_sub_name`, `func_minor_sub_status`) VALUES (NULL, '7', '40', 'view', 'A');
INSERT INTO `bn_func_minor_sub` (`func_minor_sub_ids`, `func_master_id`, `func_minor_id`, `func_minor_sub_name`, `func_minor_sub_status`) VALUES (NULL, '7', '41', 'view', 'A');

INSERT INTO `bn_func_major` (`func_master_ids`, `func_master_name_en`, `func_master_name_th`, `uri`, `icon`, `sub_menu`) VALUES (NULL, 'Tracking', '', 'tracking', NULL, '0');
INSERT INTO `bn_func_minor_sub` (`func_minor_sub_ids`, `func_master_id`, `func_minor_id`, `func_minor_sub_name`, `func_minor_sub_status`) VALUES (NULL, '8', '', 'view', 'A');

INSERT INTO `bn_func_major` (`func_master_ids`, `func_master_name_en`, `func_master_name_th`, `uri`, `icon`, `sub_menu`) VALUES (NULL, 'Parameter Config', '', 'param', NULL, '0');
INSERT INTO `bn_func_minor_sub` (`func_minor_sub_ids`, `func_master_id`, `func_minor_id`, `func_minor_sub_name`, `func_minor_sub_status`) VALUES (NULL, '9', '0', 'view', 'A');
INSERT INTO `bn_func_minor_sub` (`func_minor_sub_ids`, `func_master_id`, `func_minor_id`, `func_minor_sub_name`, `func_minor_sub_status`) VALUES (NULL, '9', '0', 'update', 'A');


CREATE TABLE `param` ( `param_id` INT NOT NULL AUTO_INCREMENT , `param_key` ENUM('purchase-request','bat-today','','') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `param_email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `param_des` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , PRIMARY KEY (`param_id`)) ENGINE = InnoDB;