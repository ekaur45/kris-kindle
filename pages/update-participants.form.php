<?php
include_once "../inc/db/connection.php";
$name = mysqli_real_escape_string($conn,$_POST["update-name"]);
$number = mysqli_real_escape_string($conn,$_POST["update-number"]);
$email = mysqli_real_escape_string($conn,$_POST["update-email"]);
$id = mysqli_real_escape_string($conn,$_POST["update-id"]);
$gid = mysqli_real_escape_string($conn,$_POST["groupid"]);


$query = "update `group_user` set name = '$name',email = '$number',phone ='$email' where id = '$id'";
//echo $query;
$result = $conn->query($query);
if($result === TRUE){
    echo "SUCCESS";
}else{
    echo "FAIL";
}
header("location: ../group-participants.php?groupid=".$gid);
