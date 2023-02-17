<?php
include "../Class/Hashing.php";
$hash = new Hashing;
echo $passwordHash = $hash::getHash("Lu@3141");
echo $verifyHash = $hash::checkHash("Lu@3141", $passwordHash);