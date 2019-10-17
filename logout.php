<?php
session_start();
if(isset($_SESSION["uid"], $_SESSION["sid"], $_SESSION["urol"])){
    session_destroy();
}
header("Location:login.php");