<?php
include "../connect/connect.php";

$sql = "CREATE TABLE SBComment (";
$sql .= "commentId int(10) unsigned auto_increment,";
$sql .= "memberId int(10) unsigned,";
$sql .= "boardId int(10) unsigned,";
$sql .= "commentName varchar(225) NOT NULL,";
$sql .= "commentMsg varchar(225) NOT NULL,";
$sql .= "commentDelete int(11) NOT NULL,";
$sql .= "regTime int(20) NOT NULL,";
$sql .= "PRIMARY KEY (commentId)";
$sql .= ") charset=utf8";

$connect->query($sql);
echo $sql;
?>