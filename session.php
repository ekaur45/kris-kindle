<?php
session_start();
if(!isset($_SESSION["isLoggedIn"])){
    header("location: login.php");
}