ALTER TABLE `purchase_request` CHANGE `purq_status` `purq_status` ENUM('request','approved','unapproved','pending','completed','reject') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'request';
ALTER TABLE `purchase_request_item` CHANGE `purq_item_status` `purq_item_status` ENUM('request','approved','unapproved','pending','completed','reject') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'request';

ALTER TABLE `purchase_order` CHANGE `puror_status` `puror_status` ENUM('ordered','received','accrual') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'ordered';
ALTER TABLE `purchase_order_item` CHANGE `puror_item_status` `puror_item_status` ENUM('ordered','received','accrual') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'ordered';