-- MySQL Script generated by MySQL Workbench
-- 02/01/17 12:09:42
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema wflan
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema wflan
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wflan` DEFAULT CHARACTER SET utf8 ;
USE `wflan` ;

-- -----------------------------------------------------
-- Table `wflan`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`users` (
  `idusers` VARCHAR(60) NOT NULL,
  `firstname` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `nickname` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(255) NULL,
  `birthdate` DATE NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wflan`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`location` (
  `idlocation` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `adress` VARCHAR(45) NULL,
  `lat` FLOAT(10,6) NULL,
  `log` FLOAT(10,6) NULL,
  PRIMARY KEY (`idlocation`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wflan`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`event` (
  `idevent` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `date` DATETIME NULL,
  `location` VARCHAR(45) NULL,
  `desc` VARCHAR(45) NULL,
  `location_idlocation` INT NOT NULL,
  `users_idusers` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idevent`),
  INDEX `fk_event_location1_idx` (`location_idlocation` ASC),
  INDEX `fk_event_users1_idx` (`users_idusers` ASC),
  CONSTRAINT `fk_event_location1`
    FOREIGN KEY (`location_idlocation`)
    REFERENCES `wflan`.`location` (`idlocation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_event_users1`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `wflan`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wflan`.`event_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`event_has_users` (
  `event_idevent` INT NOT NULL,
  `users_idusers` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`event_idevent`, `users_idusers`),
  INDEX `fk_event_has_users_users1_idx` (`users_idusers` ASC),
  INDEX `fk_event_has_users_event_idx` (`event_idevent` ASC),
  CONSTRAINT `fk_event_has_users_event`
    FOREIGN KEY (`event_idevent`)
    REFERENCES `wflan`.`event` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_event_has_users_users1`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `wflan`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wflan`.`games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`games` (
  `idgames` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`idgames`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wflan`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`articles` (
  `idarticles` INT NOT NULL,
  `title` VARCHAR(45) NULL,
  `text` LONGTEXT NULL,
  `pictures` VARCHAR(255) NULL,
  `publishdate` DATE NULL,
  `autor` VARCHAR(45) NULL,
  `users_idusers` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idarticles`),
  INDEX `fk_articles_users1_idx` (`users_idusers` ASC),
  CONSTRAINT `fk_articles_users1`
    FOREIGN KEY (`users_idusers`)
    REFERENCES `wflan`.`users` (`idusers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wflan`.`event_has_games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`event_has_games` (
  `event_idevent` INT NOT NULL,
  `games_idgames` INT NOT NULL,
  PRIMARY KEY (`event_idevent`, `games_idgames`),
  INDEX `fk_event_has_games_games1_idx` (`games_idgames` ASC),
  INDEX `fk_event_has_games_event1_idx` (`event_idevent` ASC),
  CONSTRAINT `fk_event_has_games_event1`
    FOREIGN KEY (`event_idevent`)
    REFERENCES `wflan`.`event` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_event_has_games_games1`
    FOREIGN KEY (`games_idgames`)
    REFERENCES `wflan`.`games` (`idgames`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wflan`.`games_has_articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wflan`.`games_has_articles` (
  `games_idgames` INT NOT NULL,
  `articles_idarticles` INT NOT NULL,
  PRIMARY KEY (`games_idgames`, `articles_idarticles`),
  INDEX `fk_games_has_articles_articles1_idx` (`articles_idarticles` ASC),
  INDEX `fk_games_has_articles_games1_idx` (`games_idgames` ASC),
  CONSTRAINT `fk_games_has_articles_games1`
    FOREIGN KEY (`games_idgames`)
    REFERENCES `wflan`.`games` (`idgames`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_games_has_articles_articles1`
    FOREIGN KEY (`articles_idarticles`)
    REFERENCES `wflan`.`articles` (`idarticles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
