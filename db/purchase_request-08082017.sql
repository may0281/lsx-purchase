ALTER TABLE `purchase_request` ADD `purq_create_by` VARCHAR(50) NOT NULL AFTER `purq_status`;
ALTER TABLE `purchase_request` ADD `purq_create_date` DATETIME NOT NULL AFTER `purq_create_by`, ADD `purq_update_by` VARCHAR(50) NOT NULL AFTER `purq_create_date`, ADD `purq_update_date` DATETIME NOT NULL AFTER `purq_update_by`;