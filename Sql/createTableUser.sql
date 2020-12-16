CREATE TABLE `culikeat`.`utilisateurs` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `firstName` VARCHAR(50) NOT NULL,
    `lastName` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE (`email`)
) ENGINE = MyISAM;