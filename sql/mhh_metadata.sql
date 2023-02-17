
--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mitarbinfo`
--
ALTER TABLE `mitarbinfo`
  ADD PRIMARY KEY (`MitarbInfoID`),
  ADD KEY `UserID` (`MitarbUserID`) USING BTREE,
  ADD KEY `Rollen` (`MitarbRollenID`) USING BTREE;

--
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `UserID` (`PostMitarbID`);

--
-- Indizes für die Tabelle `rollenverteilung`
--
ALTER TABLE `rollenverteilung`
  ADD PRIMARY KEY (`RollenID`);

--
-- Indizes für die Tabelle `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserRollenID` (`UserRollenID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mitarbinfo`
--
ALTER TABLE `mitarbinfo`
  MODIFY `MitarbInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `rollenverteilung`
--
ALTER TABLE `rollenverteilung`
  MODIFY `RollenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `mitarbinfo`
--
ALTER TABLE `mitarbinfo`
  ADD CONSTRAINT `mitarbinfo_ibfk_1` FOREIGN KEY (`MitarbUserID`) REFERENCES `userlogin` (`UserID`);

--
-- Constraints der Tabelle `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`PostMitarbID`) REFERENCES `mitarbinfo` (`MitarbInfoID`);

--
-- Constraints der Tabelle `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`UserRollenID`) REFERENCES `rollenverteilung` (`RollenID`);


--
-- Metadaten
--
USE `phpmyadmin`;

--
-- Metadaten für Tabelle mitarbinfo
--
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__column_info: #1100 - Tabelle 'pma__column_info' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__table_uiprefs: #1100 - Tabelle 'pma__table_uiprefs' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__tracking: #1100 - Tabelle 'pma__tracking' wurde nicht mit LOCK TABLES gesperrt

--
-- Metadaten für Tabelle post
--
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__column_info: #1100 - Tabelle 'pma__column_info' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__table_uiprefs: #1100 - Tabelle 'pma__table_uiprefs' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__tracking: #1100 - Tabelle 'pma__tracking' wurde nicht mit LOCK TABLES gesperrt

--
-- Metadaten für Tabelle rollenverteilung
--
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__column_info: #1100 - Tabelle 'pma__column_info' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__table_uiprefs: #1100 - Tabelle 'pma__table_uiprefs' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__tracking: #1100 - Tabelle 'pma__tracking' wurde nicht mit LOCK TABLES gesperrt

--
-- Metadaten für Tabelle userlogin
--
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__column_info: #1100 - Tabelle 'pma__column_info' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__table_uiprefs: #1100 - Tabelle 'pma__table_uiprefs' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__tracking: #1100 - Tabelle 'pma__tracking' wurde nicht mit LOCK TABLES gesperrt

--
-- Metadaten für Datenbank mhh
--
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__bookmark: #1100 - Tabelle 'pma__bookmark' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__relation: #1100 - Tabelle 'pma__relation' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__savedsearches: #1100 - Tabelle 'pma__savedsearches' wurde nicht mit LOCK TABLES gesperrt
-- Fehler beim Lesen der Daten von Tabelle phpmyadmin.pma__central_columns: #1100 - Tabelle 'pma__central_columns' wurde nicht mit LOCK TABLES gesperrt
