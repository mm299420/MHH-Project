<?php
namespace Page;
error_reporting(0);
include '../Class/DB.php';
use DB\DBClass as Data;

class Posts
{
    public static string $prof = "";
    public static string $title = "";
    public static string $email = "";
    public static string $text = "";
    public static string $date = "";
    public static string $user = "";
    public static bool $check = false;

    public function setNewTable($PROF, $Title, $EMAIL, $TEXT, $DATE, $CHECK) {
        self::$prof=$PROF;
        self::$title=$Title;
        self::$text=$TEXT;
        self::$email=$EMAIL;
        self::$date=$DATE;
        self::$check=$CHECK;
    }
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
    public static function table() {
        $DB = new Data();
        $table = "post";

        $DB::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );


        $query = $DB::query("SELECT * FROM `post`, `mitarbinfo`, `userlogin` where mitarbinfo.userid=? and mitarbinfo.userid=post.userid and hochladen=1", self::$user);
        foreach ($query as $row) {
            self::$prof=$row["vorname"]." ".$row["nachname"];
            self::$title=$row["PostArbeitArt"];
            self::$text=$row["PostTitle"];
            self::$email=$row["email"];
            self::$date=$row["DateReg"];

            print '<tr>
            <td>'.self::$prof.'</td>
            <td>'.self::$title.'</td>
            <td>'.self::$text.'</td>
            <td>'.self::$email.'</td>
            <td>'.self::$date.'</td>
            <td>'.self::$check.'</td>
            <td>
                <form>
                    <input type="hidden">
                    <input type="submit" value="Hochladen">
                </form>
            </td>
        </tr>';
        }
        //setNewTable();
    }
    public static function PostTable() {
        $DB = new Data();
        $query = $DB::query("SELECT * FROM userlogin WHERE username=?", $params=$_COOKIE['user']);
        self::$user = $query[0]['UserID'];
        $DB = new Data();
        $DB::login("mysql:host=localhost;dbname=mhh;charset=utf8mb4", "root", "" );
        $DB::connect();
        $post = $DB::query("SELECT * FROM post, mitarbinfo, userlogin where mitarbinfoid=postmitarbid and hochgeladen=0 and userid=?", array(self::$user));
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
}