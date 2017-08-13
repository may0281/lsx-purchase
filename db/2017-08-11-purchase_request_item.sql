CREATE TABLE `lsx-purchase`.`purchase_request_item` ( `purq_item_id` INT NOT NULL AUTO_INCREMENT , `purq_id` INT NOT NULL , `item_id` INT NOT NULL , `qty` INT NOT NULL , PRIMARY KEY (`purq_item_id`, `purq_id`, `item_id`)) ENGINE = InnoDB;
ALTER TABLE `purchase_request_item` CHANGE `item_id` `item_code` VARCHAR(50) NOT NULL;
ALTER TABLE `purchase_request` CHANGE `purq_comment` `purq_comment` VARCHAR(1000) NULL;
