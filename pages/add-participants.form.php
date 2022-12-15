<?php
include_once "../inc/db/connection.php";
$name = mysqli_real_escape_string($conn,$_POST["name"]);
$number = mysqli_real_escape_string($conn,$_POST["number"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$id = mysqli_real_escape_string($conn,$_POST["groupid"]);


$query = "insert into `group_user`(groupid,name,email,phone)values('$id','$name','$number','$email')";
$result = $conn->query($query);
if($result === TRUE){
    echo "SUCCESS";
}else{
    echo "FAIL";
}
header("location: ../group-participants.php?groupid=".$id);
