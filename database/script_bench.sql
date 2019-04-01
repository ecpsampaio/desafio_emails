-- MySQL Script generated by MySQL Workbench
-- Wed Mar 27 15:18:18 2019
-- Model: mail_correct    Version: 1.0

-- Ferramenta que corrige e modifica os emails incorretos de uma antiga lista

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mailTool
-- -----------------------------------------------------
-- Banco de dados para o processo seletivo ecGlobal
DROP SCHEMA IF EXISTS `mailTool` ;

-- -----------------------------------------------------
-- Schema mailTool
--
-- Banco de dados para o processo seletivo ecGlobal
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mailTool` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `mailTool` ;

-- -----------------------------------------------------
-- Table `mailTool`.`domainList`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mailTool`.`domainList` ;

CREATE TABLE IF NOT EXISTS `mailTool`.`domainList` (
  `index` INT NOT NULL AUTO_INCREMENT COMMENT 'Indice de emails',
  `domainAdress` VARCHAR(256) NOT NULL COMMENT 'endereço completoi',
  `regionAdress` VARCHAR(5) NOT NULL COMMENT 'apenas a região.\nOBS: se for .com é dado como international.',
  PRIMARY KEY (`index`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mailTool`.`mailCorrect`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mailTool`.`mailCorrect` ;

CREATE TABLE IF NOT EXISTS `mailTool`.`mailCorrect` (
  `index` INT NOT NULL AUTO_INCREMENT,
  `mailAdress` VARCHAR(256) NOT NULL,
  `region` VARCHAR(5) NOT NULL,
  `user` VARCHAR(256) NOT NULL COMMENT 'Até antes do arroba',
  PRIMARY KEY (`index`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mailTool`.`mailOldList`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mailTool`.`mailOldList` ;

CREATE TABLE IF NOT EXISTS `mailTool`.`mailOldList` (
  `index` INT NOT NULL AUTO_INCREMENT,
  `mailAdress` VARCHAR(256) NOT NULL COMMENT 'Endereço de email antigo onde pode aver erro',
  PRIMARY KEY (`index`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mailTool`.`mailFinalList`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mailTool`.`mailFinalList` ;

CREATE TABLE IF NOT EXISTS `mailTool`.`mailFinalList` (
  `index` INT NOT NULL AUTO_INCREMENT,
  `mailAdress` VARCHAR(256) NOT NULL,
  `region` VARCHAR(5) NOT NULL,
  `user` VARCHAR(256) NOT NULL COMMENT 'Até antes do arroba',
  PRIMARY KEY (`index`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
