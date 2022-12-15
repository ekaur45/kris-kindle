<?php
include_once "../inc/db/connection.php";
$name = mysqli_real_escape_string($conn,$_POST["groupName"]);
$date = mysqli_real_escape_string($conn,$_POST["date"]);
$location = mysqli_real_escape_string($conn,$_POST["location"]);
$upperLimit = mysqli_real_escape_string($conn,$_POST["upperLimit"]);


$query = "insert into `group`(name,date,location,upperLimit)values('$name','$date','$location','$upperLimit')";
$result = $conn->query($query);
if($result === TRUE){
    echo "SUCCESS";
}else{
    echo "FAIL";
}
header("location: ../groups.php");
