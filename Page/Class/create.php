<?php

namespace Page;

use Page\DBClass as DATA;

class create
{
    public  static int $PostID;
    public static string $PostArbeitArt;
    public static string $PostText;
    public static string $PostDate;
    public static string $MitarbInfoID;
    public static string $Vorname;
    public static string $Nachname;
    public static string $EMail;
    public static string $MitarbUserName;
    public static $infos;

    public static function setMitarbInfoID($username) {
        $DB = new DATA();
        self::$infos = $DB::query("SELECT * FROM mitarbinfo, userlogin where mitarbinfoid=mitarbinfo and username=?", [$username]);
        foreach (self::$infos as $row) {
            self::$MitarbInfoID = $row['MitarbInfoID'];
        }
    }

    public static function GetPostInfos()
    {
        $DB = new DATA();
        self::$MitarbUserName = $_COOKIE['user'];
        self::$infos = $DB::query("SELECT * FROM post, mitarbinfo, userlogin where mitarbinfoid=postmitarbid and hochgeladen=0 and username=?", [self::$MitarbUserName]);
        foreach (self::$infos as $row) {
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
    public static function upload($table, $column1, $value1, $column2, $value2, $column3, $value3, $column4, $value4, $column5, $value5):void {
        self::getPostInfos();
        $DB = new DATA();
        $DB::CreatePost($table, $column1, $value1, $column2, $value2, $column3, $value3, $column4, $value4, $column5, $value5);
    }
}