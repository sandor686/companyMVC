CREATE SCHEMA `company` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci ;

use `company`;

CREATE TABLE `company`.`employee_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC));

INSERT INTO `company`.`employee_category` (`name`) VALUES ('programozó');
INSERT INTO `company`.`employee_category` (`name`) VALUES ('grafikus');
INSERT INTO `company`.`employee_category` (`name`) VALUES ('ügyintéző');

CREATE TABLE `company`.`employee` (
  `id` INT NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `category_id` INT NOT NULL,
  `salary` VARCHAR(45) NULL,
  `job_start` DATE NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`));
  
ALTER TABLE `company`.`employee` 
CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `company`.`employee` 
ADD INDEX `category_FK_idx` (`category_id` ASC);
;
ALTER TABLE `company`.`employee` 
ADD CONSTRAINT `category_FK`
  FOREIGN KEY (`category_id`)
  REFERENCES `company`.`employee_category` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

INSERT INTO `company`.`employee` (`first_name`, `last_name`, `category_id`, `salary`, `job_start`, `status`) VALUES ('Elek', 'Teszt', 2, '350000', '2016-01-08', '1');
INSERT INTO `company`.`employee` (`first_name`, `last_name`, `category_id`, `salary`, `job_start`, `status`) VALUES ('Jakab', 'Gipsz', 1, '480000', '2017-01-09', '1');
INSERT INTO `company`.`employee` (`first_name`, `last_name`, `category_id`, `salary`, `job_start`, `status`) VALUES ('Pali', 'Nap', 1, '450000', '2018-09-07', '0');
