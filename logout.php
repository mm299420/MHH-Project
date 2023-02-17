<?php
setcookie("login", false, time() - (86400 * 60 * 60 * 60), "/");
$cookie_uname = "user";
setcookie($cookie_uname, null, time() - (86400 * 60 * 60 * 60), "/");
$cookie_pass = "passwd";
setcookie($cookie_pass, null, time() - (86400 * 60 * 60 * 60), "/");
