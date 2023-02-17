<?php


function Create() {
    echo "<form method='post' action='./index.php'>
        <label for='titel'>titel: </label>
        <input type='text' name='titel' id='titel' placeholder='titel' /><br/><br/>
        <label for='text'>Inhalt: </label>
        <textarea rows='5' cols='60' name='text' id='text'></textarea>
        <input type='submit' value='Create' />
    </form>";
}