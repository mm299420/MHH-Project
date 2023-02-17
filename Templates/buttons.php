<?php
function btn() {
    if (!isset($_COOKIE['login'])) {
        echo '<form action="login.php">
            <input type="submit" name="loginBTN" class="btn btnForms" id="loginBTN" value="login">
        </form>';
    } else if ($_COOKIE['UserRolle'] == "1") {
        echo '<div class="btnForms">
            <button id="AdminToolsBTN" class="btn" onclick="AdminRootTools()">AdminTools</button>
            <form action="logout.php">
                <input type="submit" name="loginBTN" class="btn" id="loginBTN" value="Logout">
            </form>'.AdminToolWindow().'
        </div>';
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
}
function AdminToolWindow() {
    echo '<div id="AdminTools" class="AdminTools" style="display: none; background-color: darkgray">
        <div id="Title" style="height: 5em">
            <h2>Admin Toolset</h2>        
        </div>
        <div id="Buttons" style="height: auto">
            <button id="btnUserVerw" class="btn" onclick="UserVerw()">UserVerw</button><br/>
            <button id="btnRoles" class="btn" onclick="Roles()">Roles</button><br/>
            <button id="btnDebug" class="btn" onclick="Debug()">DebugPage</button><br/>
        </div>
    </div>';
}
