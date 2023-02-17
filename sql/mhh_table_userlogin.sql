
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userlogin`
--
-- Erstellt am: 10. Feb 2023 um 10:10
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE `userlogin` (
  `UserID` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `UserPasswd` text NOT NULL,
  `UserRollenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONEN DER TABELLE `userlogin`:
--   `UserRollenID`
--       `rollenverteilung` -> `RollenID`
--

--
-- Daten für Tabelle `userlogin`
--

INSERT INTO `userlogin` (`UserID`, `UserName`, `UserPasswd`, `UserRollenID`) VALUES
(1, 'mm29942', '$2y$10$2H9lOrftQeRsCAPPMN46A.If1BpKK7rmXUeNdVXEBU8PsxBzmvMf6', 2),
(2, 'root', '$2y$10$/9hqPUze92lViVjfpcVx0O3Q.2E6BWK7lP8o3TpiKJp75gDnsf2SG', 1),
(3, 'luks', '$2y$10$zqV0HWGEfZAocZ/D4iTYaOMdFTm4vGdvwgCoMrPyEHSw7kT.sRSIu', 1);
