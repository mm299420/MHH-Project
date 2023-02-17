
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbinfo`
--
-- Erstellt am: 10. Feb 2023 um 10:13
-- Zuletzt aktualisiert: 10. Feb 2023 um 10:12
--

DROP TABLE IF EXISTS `mitarbinfo`;
CREATE TABLE `mitarbinfo` (
  `MitarbInfoID` int(11) NOT NULL,
  `MitarbUserID` int(11) NOT NULL,
  `vorname` text NOT NULL,
  `nachname` text NOT NULL,
  `email` text NOT NULL,
  `MitarbRollenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `mitarbinfo`:
--   `MitarbUserID`
--       `userlogin` -> `UserID`
--

--
-- Daten für Tabelle `mitarbinfo`
--

INSERT INTO `mitarbinfo` (`MitarbInfoID`, `MitarbUserID`, `vorname`, `nachname`, `email`, `MitarbRollenID`) VALUES
(1, 1, 'Moritz', 'Rüben', 'mm29942@pm.me', 0),
(2, 2, 'Moritz', 'Rüben', 'admin@mm29942.com', 0),
(3, 3, 'Lukas', 'Wedde', 'Lukas.Wedde@mhh.de\r\n', 0);
