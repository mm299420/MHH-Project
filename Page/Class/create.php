<?php

namespace Page;

use Page\DBClass as DATA;

class create
{
    static int $PostID;
    static string $PostArbeitArt;
    static string $PostText;
    static string $PostDate;
    static string $MitarbInfoID;
    static string $Vorname;
    static string $Nachname;
    static string $EMail;
    static string $MitarbUserName;

    public static function GetPostInfos()
    {
        $DB = new DATA();
        self::$MitarbUserName = $_COOKIE['user'];
        $post = $DB::query("SELECT * FROM post, mitarbinfo, userlogin where mitarbinfoid=postmitarbid and hochgeladen=0 and username=?", [self::$MitarbUserName]);
        foreach ($post as $row) {
            self::$MitarbInfoID = $row['MitarbInfoID'];
            self::$Vorname = $row['vorname'];
            self::$Nachname = $row['nachname'];
            self::$EMail = $row['email'];
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
    public static function CreatePostForm() {
        echo '<table>
        <thead>
            <tr>
                <th>inhalt</th>
                <th>Fachbereich</th>
                <th>Datum</th>
            </tr>
        </thead>
        <form method="post" action="./Edit.php?create=1">
        <tbody>
            <tr>
                <td><input type="text" name="text" id="text" placeholder="Inhalt" </td>       
                <td><input type="text" name="Kategorie" id="Kategorie" placeholder="Kategorie"></td>     
                <td><input type="text" name="Datum" id="Datum" placeholder="2023-02-27"></td>
            </tr>
        </tbody>
        </table>
        <input type="hidden" name="PostID" value="$PostID">
        <input type="submit" value="Beenden" class="btn">
        </form>';
    }
    public static function upload():void {
        self::getPostInfos();
        $DB = new DATA();
        $DB::UpdatePost("post", "PostArbeitArt", self::$PostArbeitArt, "PostText", self::$PostText, "DateReg", self::$PostDate, "PostID", self::$PostID);
    }
}