<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Start</title>
    <script src="JS/script.js"></script>
    <link rel="icon" href="IMG/cicada.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <style>
        table {
            border-collapse: collapse;
            border: black 1px solid;
            margin: 1.5em 1.5em;
            padding: 1.5em 1.5em;
        }
        td {
            border-collapse: collapse;
            border: black 1px solid;
            margin: 1.5em 1.5em;
            padding: 1.5em 1.5em;
        }
        th {
            border-collapse: collapse;
            border: black 1px solid;
            margin: 1.5em 1.5em;
            padding: 1.5em 1.5em;
        }
        tr {
            border-collapse: collapse;
            border: black 1px solid;
            margin: 1.5em 1.5em;
            padding: 1.5em 1.5em;
        }
        input.btn {
            margin-top: 0.5em;
            background-color: rgba(0, 0, 0, 0);;
            color: black;
            border-collapse: separate;
            border: black 0.15em solid;
            border-radius: 0.45em;
        }
        .btn {
            background-color: rgba(0, 0, 0, 0); ;
            color: black;
            border-collapse: separate;
            border: black 0.15em solid;
            border-radius: 0.45em;
        }
        .btnForms {
            position: fixed;
            right: 0.5em;
            top: 0.5em;
            align-items: center;
            text-align: center;
        }
        table {
            position: relative;
            top: 5em;
        }
    </style>
</head>
<body>
<?php
if (!isset($_COOKIE['login'])) {
    echo '<form action="login.php">
            <input type="submit" name="loginBTN" class="btn btnForms" id="loginBTN" value="login">
        </form>';
} else {
    echo '<div class="btnForms">
            <form action="Page/">
                <input type="submit" name="controlBTN" class="btn" id="controlBTN" value="Home">
            </form>
            <form action="logout.php">
                <input type="submit" name="loginBTN" class="btn" id="loginBTN" value="Logout">
            </form>
        </div>';
}
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