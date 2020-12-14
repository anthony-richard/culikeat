CREATE TABLE `culikeat`.`restaurateurs` (
    `id` INT NOT NULL,
    `nom entreprise` VARCHAR(50) NOT NULL,
    `adresse` VARCHAR(50) NOT NULL,
    `code postal` VARCHAR(50) NOT NULL,
    `ville` VARCHAR(50) NOT NULL,
    `role` INT NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM;




