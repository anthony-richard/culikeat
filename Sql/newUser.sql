-- Id ne doit pas être précisé car il se génére tout seul
INSERT INTO utilisateurs (
    `prenom`,
    `nom`,
    `email`,
    `mdp`,
    `role`
    )
VALUES (
        'Gordon',
        'Ramsey',
        'gordonRamsey@gmail.com',
        SHA1('takethis'),
        '1'
    );