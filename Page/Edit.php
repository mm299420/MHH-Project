
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

    include __DIR__.'/Class/edit.php';
    use Page\edit as Edit;
    include __DIR__.'/Class/create.php';
    use Page\create as Create;
    $edit = new Edit();
    $create = new Create();
    session_start();
    if (isset($_GET['PostID'])) {
        $_SESSION['PostID'] = $_GET['PostID'];
    }
    if (isset($_GET['fertig'])) {
        $edit::setPostText($_POST['Edit']);
        $edit::setPostArbeitArt($_POST['Kategorie']);
        $edit::setPostDate($_POST['Datum']);
        $edit::setPostID($_SESSION['PostID']);
        $edit::upload();
        header("refresh: 5; url=./");
    } else if (isset($_GET['create'])) {
        $create::getPostInfos();
        $table = "post";
        $column1 = "MitarbInfoID";
        $value1 = $create::$MitarbInfoID;
        $column2 = "PostText";
        $value2 = $_POST['text'];
        $column3 = "PostArbeitArt";
        $value3 = $_POST['Kategorie'];
        $column4 = "DateReg";
        $value4 = $_POST['Datum'];
        $column5 = "hochgeladen";
        $value5 = "0";
        $create::upload($table, $column1, $value1, $column2, $value2, $column3, $value3, $column4, $value4, $column5, $value5);
        header("refresh: 5; url=./");
    }
    ?>
</head>
<body>
    <div class="main">
        <h1>Neuen Eintrag Erstellen</h1>
        <div class="content">
            <?php
            if (isset($_GET['PostID'])) {
            ?>
                <?php
                $edit::EditPostForm($_SESSION['PostID']);
            } else {
               ?>
                <form method="post" action="./Edit.php?create=1">
                <?php
                $create::CreatePostForm();
                }
               ?>

        </div>
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
