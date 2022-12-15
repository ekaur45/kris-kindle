<?php
include_once "../inc/db/connection.php";
$id = $_GET["id"];
$result = $conn->query("select * from group_user where id = ".$id);
$rows = [];
$row = $result->fetch_object();
    $rows[] = $row;
$array = $result->fetch_all();

$result->free();
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rows);
