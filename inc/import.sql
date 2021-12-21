CREATE TABLE IF NOT EXISTS `product` (
	`row_id` INT NOT NULL AUTO_INCREMENT,
	`product_type` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`product_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`size_or_specification` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`packing_degree` TINYINT NOT NULL DEFAULT '0',
	`din_format` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`average_price_per_piece` DECIMAL DEFAULT NULL,
	`timestamp_created` TIMESTAMP NOT NULL,
	`created_by_user_id` SMALLINT DEFAULT NULL,
	`timestamp_changed` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	`changed_by_user_id` SMALLINT DEFAULT NULL,
	PRIMARY KEY (`row_id`)
);

CREATE TABLE IF NOT EXISTS `section` (
	`row_id` INT NOT NULL AUTO_INCREMENT,
	`section_type` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`section_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`license_plate` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`average_price_per_piece` DECIMAL DEFAULT NULL,
	`timestamp_created` TIMESTAMP NOT NULL,
	`created_by_user_id` SMALLINT DEFAULT NULL,
	`timestamp_changed` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	`changed_by_user_id` SMALLINT DEFAULT NULL,
	PRIMARY KEY (`row_id`)
);

CREATE TABLE IF NOT EXISTS `pack` (
	`row_id` INT NOT NULL AUTO_INCREMENT,
  `section_id` INT NOT NULL,
	`pack_type` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`pack_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`din_format` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`timestamp_created` TIMESTAMP NOT NULL,
	`created_by_user_id` SMALLINT DEFAULT NULL,
	`timestamp_changed` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	`changed_by_user_id` SMALLINT DEFAULT NULL,
	PRIMARY KEY (`row_id`)
);

CREATE TABLE IF NOT EXISTS `compartment` (
	`row_id` INT NOT NULL AUTO_INCREMENT,
	`compartment_type` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`compartment_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`timestamp_created` TIMESTAMP NOT NULL,
	`created_by_user_id` SMALLINT DEFAULT NULL,
	`timestamp_changed` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	`changed_by_user_id` SMALLINT DEFAULT NULL,
	PRIMARY KEY (`row_id`)
);

CREATE TABLE IF NOT EXISTS `main` (
	`row_id` INT NOT NULL AUTO_INCREMENT,
  `pack_id` INT NOT NULL,
	`compartment_id` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`number` INT NOT NULL,
  `product_id` INT NOT NULL,
  `expiry_date` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`timestamp_created` TIMESTAMP NOT NULL,
	`created_by_user_id` SMALLINT DEFAULT NULL,
	`timestamp_changed` TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	`changed_by_user_id` SMALLINT DEFAULT NULL,
	PRIMARY KEY (`row_id`)
);
