
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post`
--
-- Erstellt am: 08. Feb 2023 um 11:05
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `PostMitarbID` int(11) NOT NULL,
  `PostTitle` text NOT NULL,
  `PostText` text NOT NULL,
  `PostArbeitArt` text NOT NULL,
  `DateReg` date DEFAULT NULL,
  `hochgeladen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `post`:
--   `PostMitarbID`
--       `mitarbinfo` -> `MitarbInfoID`
--

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`PostID`, `PostMitarbID`, `PostTitle`, `PostText`, `PostArbeitArt`, `DateReg`, `hochgeladen`) VALUES
(1, 1, 'Analyse des Ausbreitungsverlaufs von yersinia pseudotuberculosis im menschlichen körper', 'Forschungsarbeit über das Ausbreitungsmuster von \"yersinia pseudotuberculosis\" im 21. Jahrhundert', 'Epidemiologie', '2023-02-28', 1),
(2, 3, 'Test', 'Test', 'Test', '2023-02-04', 0),
(3, 1, 'Neuste Covid19 Mutergene', 'Erläuterung der neusten mutationen sowie der zweitlichen entwicklung des virus', 'Virologie', '2023-02-07', 1);
