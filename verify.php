<?php
error_reporting(0);
$passwd = $_POST["password"];
$usern = $_POST["username"];

include(__DIR__ . '/Class/Hashing.php');
include(__DIR__ . '/Class/DB.php');
use DB\DBClass as Data;

$DB = new Data();
$DB::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );

$hashing = new Hashing;
$passwd = $_POST["password"];
$query = $DB::query("SELECT * FROM userlogin WHERE username=?", $params=array($_POST["username"]));
$hash = $query[0]['UserPasswd'];
$RoleID = $query[0]['UserRollenID'];
$cookie_role = "UserRolle";
setcookie($cookie_role, $RoleID, time() + (86400 * 60 * 60 * 60), "/");
$_COOKIE[$cookie_role] = $RoleID;
$verify = password_verify($passwd, $hash);


if ($verify) {
    include '../Templates/iconTemp.php';
    print "<br/>"."Successfully logged in as ". $_POST['username']. "\n";
    $username = $_POST['username'];
    cookie($usern, $passwd);
    $changepage = true;
    header("refresh: 5; url=Page/index.php");
} else {
    print "<br/>"."logging in as ". $_POST['username']. " Failed! Please try again!\n";
    header("refresh: 5; url=../index.php");
}

function cookie($usern, $passwd) {
    setcookie("login", true, time() + (86400 * 60 * 60 * 60), "/");
    $cookie_uname = "user";
    setcookie($cookie_uname, $usern, time() + (86400 * 60 * 60 * 60), "/");
    $cookie_pass = "passwd";
    setcookie($cookie_pass, $passwd, time() + (86400 * 60 * 60 * 60), "/");
    setcookie("login", true, time() + (86400 * 60 * 60 * 60), "/");
    $cookie_uname = "user";
    if (isset($_COOKIE[$cookie_uname], $_COOKIE[$cookie_pass])) {
        ?>
        <body onload="CookieAlert">
        <script>
            function CookieAlert() {
                alert("Cookies are enabled!")
            }
        </script>
        </body>
        <?php
    }
}