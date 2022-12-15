<?php
include_once "../inc/db/connection.php";


$query = "delete from `group_user` where id = ".$_GET["groupid"];
$result = $conn->query($query);
header('Content-Type: application/json; charset=utf-8');
if($result === TRUE){
    echo "SUCCESS";
}else{
    echo "FAIL";
}
header("location: ../groups.php");
