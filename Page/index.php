<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="JS/Edit.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="../IMG/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../IMG/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../IMG/favicon-16x16.png">
    <link rel="manifest" href="../IMG/manifest.json">
    <link rel="mask-icon" href="../IMG/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="../IMG/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="HandheldFriendly" content="true" /><meta name="HandheldFriendly" content="true" />
    <link rel="canonical" href="https://www.mhh.de/"/>
    <?php
    include '../Templates/iconTemp.php';

    include __DIR__.'/Class/DBClass.php';
    use Page\DBClass as Data;
    function hochladen($PostID) {
        $db=new Data();
        $db::update("post", "hochgeladen", "1", "PostID", "$PostID");
    }
    if(isset($_GET['PostID'])){
        $PostID=$_GET['PostID'];
        hochladen($PostID);
    }
    if ($_COOKIE['UserRolle'] === 1) {
        header("location:../index.php");
    }
    ?>
</head>
<body>
    <div class="table">
        <table style="margin-left:auto; margin-right:auto;">
            <tr>
                <th>Edit</th>
                <th>ID</th>
                <th>Prof</th>
                <th>Fachbereich</th>
                <th>Arbeitsbeschreibung</th>
                <th>E-Mail</th>
                <th>Anmeldungsende</th>
                <th>Bestätigen</th>
            </tr>
            <?php
            PostTable();
            ?>
        </table>
        <form method="post" action="./Edit.php">
            <input type="submit" value="Create" class="btn" id="newPostBTN" style="position: relative; left:75%;">
        </form>
    </div>
    <div class="btnForms">
        <form action="../" method="post">
            <input class="btn" type="submit" value="Start" />
        </form>
        <form action="../logout.php" method="post">
            <input class="btn" type="submit" value="Logout" />
        </form>
    </div>

</body>
</html>
<?php
    function PostTable() {
        $DB = new DATA();
        $UserID = $DB::query("SELECT UserID FROM userlogin where username=?", [$_COOKIE['user']]);
        $UserID = $UserID[0]['UserID'];
        $err = header("location:./Edit.php");

        $post = $DB::query("SELECT * FROM post, mitarbinfo, userlogin where mitarbinfoid=postmitarbid and mitarbuserid=userid and hochgeladen=0 and username=? and UserID=?", [$_COOKIE['user'], $UserID], $err);
        echo "<tbody>";
        $id = 0;
        foreach( $post as $row) {
            print "<tr>
            <td><button class='edit btn'><a href='./Edit.php?PostID={$row["PostID"]}'>Edit</a></button></td>
            <td>{$row["PostID"]}</td>
            <td>{$row["vorname"]} {$row["nachname"]}</td>
            <td>{$row["PostArbeitArt"]}</td>
            <td>{$row["PostText"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["DateReg"]}</td>
            <td><button id='btnAcc' class='btn'><a href='./index.php?PostID={$row["PostID"]}'>Hochladen</a></button></td>
        </tr>";
    }
    echo "</tbody>";
}
?>