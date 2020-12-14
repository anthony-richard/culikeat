CREATE TABLE `culikeat`.`utilisateurs` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `prenom` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `mdp` VARCHAR(255) NOT NULL,
    `role` INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE (`email`)
) ENGINE = MyISAM;