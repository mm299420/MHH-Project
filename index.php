<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Start</title>
    <script src="JS/script.js"></script>
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
<?php
include "Templates/buttons.php";
btn();

include 'Templates/iconTemp.php';
?>
<table style="margin-left:auto; margin-right:auto;">
    <tr>
        <th>Prof</th>
        <th>Fachbereich</th>
        <th>Arbeitsbeschreibung</th>
        <th>E-Mail</th>
        <th>Anmeldungsende</th>
    </tr>
    <?php
    include __DIR__.'/Class/DB.php';
    use DB\DBClass as Data;
    $DB = new Data();
    post();
    ?>
</table>
</body>
</html>
<?php
function post() {
    $DB = new Data();
    $DB::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );
    $DB::connect();
    $post = $DB::query("SELECT * FROM post, mitarbinfo, userlogin where mitarbinfoid=postmitarbid and hochgeladen=1 and userid=mitarbuserid");
    echo "<tbody>";
    foreach( $post as $row) {
        print "<tr>
            <td>{$row["vorname"]} {$row["nachname"]}</td>
            <td>{$row["PostArbeitArt"]}</td>
            <td>{$row["PostText"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["DateReg"]}</td>
        </tr>";
    }
    echo "</tbody>";
}