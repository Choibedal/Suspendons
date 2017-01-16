INSERT INTO `utilisateur` (`ID`, `PSEUDO`, `MAIL`, `MDP`, `ADRESSE`, `CP`, `VILLE`, `DATECREATION`, `DATEMODIFICATION`, `DATESUPPRESSION`, `IDTYPE`, `IDREGION`) VALUES
('0', 'La petite pause', 'contact@lapetitepause.fr', 'azerty', '47 B Rue du Fossé des Tanneurs', 67000, 'Strasbourg', '2017-01-13 00:00:00', NULL, NULL, '1', '0'),
('1', 'Kohler-Rehm', 'contact@KohlerRehm.fr', 'azerty', '13 Rue des Grandes Arcades', 67000, 'Strasbourg', '2017-01-13 00:00:00', NULL, NULL, '1', '0');

INSERT INTO `typeuser` (`ID`, `NOM`) VALUES
('0', 'Citoyen'),
('1', 'Partenaire');

INSERT INTO `region` (`ID`, `NOM`) VALUES
('0', 'Alsace');