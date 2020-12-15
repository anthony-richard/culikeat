CREATE TABLE `culikeat`.`restaurateurs` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `idUser` INT NOT NULL,
    `name_restaurant` VARCHAR(50) NOT NULL,
    `address` VARCHAR(50) NOT NULL,
    `zipCode` VARCHAR(20) NOT NULL,
    `city` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`name_restaurant`)
) ENGINE = MyISAM;




