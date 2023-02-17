
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rollenverteilung`
--
-- Erstellt am: 10. Feb 2023 um 10:15
-- Zuletzt aktualisiert: 10. Feb 2023 um 10:15
--

DROP TABLE IF EXISTS `rollenverteilung`;
CREATE TABLE `rollenverteilung` (
  `RollenID` int(11) NOT NULL,
  `RollenBez` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `rollenverteilung`:
--

--
-- Daten für Tabelle `rollenverteilung`
--

INSERT INTO `rollenverteilung` (`RollenID`, `RollenBez`) VALUES
(1, 'Admin'),
(2, 'Professor'),
(11, 'Student'),
(12, 'Verwaltung');
