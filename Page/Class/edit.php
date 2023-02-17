<?php
namespace Page;
include 'DBClass.php';
use Page\DBClass as DATA;

class edit
{
    static int $PostID;
    static string $PostArbeitArt;
    static string $PostText;
    static string $PostDate;

    public static function editPost($PostID)
    {
        $DB = new DATA();
        self::$PostID = $PostID;
        $post = $DB::query("SELECT * FROM post, mitarbinfo, userlogin where mitarbinfoid=postmitarbid and hochgeladen=0 and PostID=?", [$PostID]);
        foreach ($post as $row) {
            self::$PostArbeitArt = $row['PostArbeitArt'];
            self::$PostText = $row['PostText'];
            self::$PostDate = $row['DateReg'];
        }
    }
    public static function getPostArbeitArt() {
        return self::$PostArbeitArt;
    }
    public static function getPostText() {
        return self::$PostText;
    }
    public static function getPostDate() {
        return self::$PostDate;
    }
    public static function setPostArbeitArt($Kategorie) {
        return self::$PostArbeitArt = $Kategorie;
    }
    public static function setPostText($text) {
        return self::$PostText = $text;
    }
    public static function setPostDate($date) {
        return self::$PostDate = $date;
    }
    public static function setPostID($ID) {
        return self::$PostID = $ID;
    }
    public static function EditPostForm($PostID) {
        $edit = new Edit();
        $edit::editPost($PostID);
        echo '<table>
        <thead>
            <tr>
                <th>inhalt</th>
                <th>Fachbereich</th>
                <th>Datum</th>
            </tr>
        </thead>
        <form method="post" action="./Edit.php?fertig=1">
        <tbody>
            <tr>
                <td><input type="text" name="Edit" id="Edit" value="'.$edit::getPostText().'"></td>       
                <td><input type="text" name="Kategorie" id="Kategorie" value="'.$edit::getPostArbeitArt().'"></td>     
                <td><input type="text" name="Datum" id="Datum" value="'.$edit::getPostDate().'"></td>
            </tr>
        </tbody>
        </table>
        <input type="hidden" name="PostID" value="$PostID">
        <input type="submit" value="Beenden" class="btn">
        </form>';
    }
    public static function upload():void {
        $DB = new DATA();
        $DB::UpdatePost("post", "PostArbeitArt", self::$PostArbeitArt, "PostText", self::$PostText, "DateReg", self::$PostDate, "PostID", self::$PostID);
    }
}