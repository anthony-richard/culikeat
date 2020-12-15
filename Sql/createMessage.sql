CREATE TABLE `culikeat`.`messages` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `idUser` INT NOT NULL,
    `post` VARCHAR(500) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM;