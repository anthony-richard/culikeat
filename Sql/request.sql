
-- inner join pour joindre les tables
SELECT * FROM `utilisateurs` as `u` INNER JOIN `restaurateurs` as `r` ON `u`.`id`=`r`.`idUser`
