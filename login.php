<?php
session_start();

// Include the database and hashing class
include(__DIR__ . '/Class/DB.php');
include(__DIR__ . '/Class/Hashing.php');
include(__DIR__ . '/Page/Class/Posts.php');

use DB\DBClass as Data;
use Hashing as Hash;
use Page\Posts as Post;
include '../Templates/iconTemp.php';

$Hash = new Hash;
$DB = new Data;
$DB::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );
$DB::connect();
// Check if the form was submitted

if (isset($_COOKIE['user'], $_COOKIE['passwd'])) {
    $query = $DB::query("SELECT * FROM userlogin WHERE username=?", $params=$_COOKIE['user']);
    if ($query[0]['UserName'] == $_COOKIE['user'] && $query[0]['UserPasswd'] == $_COOKIE['passwd']) {
        include('Page/index.php');
    }
}
else {
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <script src="JS/script.js"></script>
        <link rel="icon" href="IMG/cicada.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <link rel="apple-touch-icon" sizes="180x180" href="IMG/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="IMG/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="IMG/favicon-16x16.png">
        <link rel="manifest" href="IMG/manifest.json">
        <link rel="mask-icon" href="IMG/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="IMG/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <meta name="HandheldFriendly" content="true" /><meta name="HandheldFriendly" content="true" />
        <link rel="canonical" href="https://www.mhh.de/"/>
    </head>
    <body>
    <form action="verify.php" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" placeholder="" />
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" placeholder="" />
        <input type="submit" value="Submit" />
    </form>
    </body>
    </html>
    <?php
}
