<?php
session_start();

// Include the database and hashing class
include(__DIR__ . '/Class/DB.php');
include(__DIR__ . '/Class/Hashing.php');
include(__DIR__ . '/Page/Class/Posts.php');
include __DIR__.'/Class/iconTemp.php';
use logo\Logos as setLogo;
use DB\DBClass as Data;
use Hashing as Hash;
use Page\Posts as Post;

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
        <style>
            .table {
                border-collapse: collapse;
                margin: auto;
                height: 10em;
                transform: rotate(270deg);
            }
            input {
                width: 7.5em;
                margin: 0.3em 0.6em;
                transform: rotate(270deg);
            }
            th {
                border: 1px solid black;
                padding: 0.3em 0.6em;
                margin: auto;
                transform: rotate(270deg);
            }
        </style>
        <?php     
            $logo = new setLogo();
        ?>
    </head>
    <body>
        <table cellspacing="0" cellpadding="0" class="table" style="border: none!important; margin-left: auto;margin-right:auto;">
            <thead class="table">
                <tr class="table">
                    <th class="">Username</th>
                    <th class="">Password</th>
                    <th class="">        </th>
                </tr>
            </thead>
            <tbody class="table">
                <tr class="table">
                    <form action="login.php" method="post">
                        <td class=""><input type="text" name="username" id="username" placeholder="" /></td>
                        <td class=""><input type="password" name="password" id="password" placeholder="" /></td>
                        <td class=""><input type="submit" value="Login" /></td>
                    </form>
                </tr>
            </tbody>
        </table>
    </body>
    </html>
    <?php
}
