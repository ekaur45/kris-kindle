<?php
include_once "inc/db/connection.php";
$conn->query("insert into users(firstName,lastName,username,password)values('Admin','admin','admin','".md5('admin')."')");
echo "User created now you can login";