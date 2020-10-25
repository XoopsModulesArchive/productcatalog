-- todo: indexes
--       foreign keys

CREATE TABLE `prca_products` (
    `id`          INT(8)       NOT NULL AUTO_INCREMENT,
    `reference`   VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `reference` (`reference`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_categories` (
    `id`          INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(255)    NOT NULL,
    `description` VARCHAR(255)    NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_product_categories` (
    `id`          INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `product_id`  INT(8)          NOT NULL,
    `category_id` INT(8)          NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_images` (
    `id`       INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `location` VARCHAR(255)    NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_extra_fields` (
    `id`               INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `unlocalized_name` VARCHAR(255)    NOT NULL,
    `name`             VARCHAR(255)    NOT NULL,
    `description`      VARCHAR(255) DEFAULT NULL,
    `item_type`        VARCHAR(20)     NOT NULL,
    `sequence`         INT(4) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_extra_field_values` (
    `id`             INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `item_id`        INT(8)          NOT NULL,
    `extra_field_id` INT(8)          NOT NULL,
    `value`          VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_item_images` (
    `id`             INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `item_type`      VARCHAR(20)     NOT NULL,
    `item_id`        INT(8)          NOT NULL,
    `image_id`       INT(8)          NOT NULL,
    `display_height` INT(5) DEFAULT NULL,
    `display_width`  INT(5) DEFAULT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_languages` (
    `id`   INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255)    NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
)
    ENGINE = ISAM;

CREATE TABLE `prca_translations` (
    `id`              INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `item_id`         INT(8) UNSIGNED NOT NULL,
    `language_id`     INT(8)          NOT NULL,
    `item_type`       VARCHAR(20)     NOT NULL,
    `translation_key` VARCHAR(255)    NOT NULL,
    `translation`     VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = ISAM;

