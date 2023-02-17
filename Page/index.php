<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="JS/Edit.js"></script>
    <?php
     include '../Class/iconTemp.php';
     use logo\Logos as setLogo;
     $logo = new setLogo();
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
        $post = $DB::query("SELECT * FROM post, mitarbinfo, userlogin where mitarbinfoid=postmitarbid and hochgeladen=0 and username=?", [$_COOKIE['user']]);
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