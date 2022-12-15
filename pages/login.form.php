<?php
session_start();
include_once "../inc/db/connection.php";
$username = __escape( $_POST["username"]);
$password = $_POST["password"];
$query = "select * from users where username = '$username'";
$result = $conn->query($query);
if(mysqli_num_rows($result)>0){
    $row = $result -> fetch_assoc();
    echo $row["username"].'         '.$row["password"];
    if($row["password"] == md5($password)){
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["username"] = $row["username"];
    }
}
header("location: ../");
?>