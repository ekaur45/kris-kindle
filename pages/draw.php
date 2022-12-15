<?php
include_once "../inc/db/connection.php";
$id = $_GET["groupid"];
$result = $conn->query("select * from group_user where groupid = ".$id);
$rows = [];
while($row = $result->fetch_object())
{
    $rows[] = $row;
}
$array = $result->fetch_all();

$result->free();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rows);
