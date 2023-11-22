<?php
include "../connect/connect.php";

$sql = "CREATE TABLE quizMember (";
$sql .= "memberId int(10) unsigned NOT NULL,";
$sql .= "quizId int(10) unsigned NOT NULL,";
$sql .= "clearTime int unsigned NOT NULL default 0,";
$sql .= "isSolved tinyint(1) NOT NULL default 0,";
$sql .= "likes tinyint(1) NOT NULL default 0,";
$sql .= "PRIMARY KEY(memberId, quizId),";
$sql .= "FOREIGN KEY (memberId) REFERENCES sexyMember(memberId),";
$sql .= "FOREIGN KEY (quizId) REFERENCES quiz(quizId)";
$sql .= ") charset=utf8";

$connect->query($sql);
?>