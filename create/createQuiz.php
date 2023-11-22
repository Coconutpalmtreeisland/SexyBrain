<?php
include "../connect/connect.php";

$sql = "CREATE TABLE quiz (";
$sql .= "quizId int(10) unsigned auto_increment,";
$sql .= "question1 varchar(255) NOT NULL,";
$sql .= "question2 varchar(255),";
$sql .= "question3 varchar(255),";
$sql .= "answer varchar(255) NOT NULL,";
$sql .= "descImg varchar(255),";
$sql .= "hint varchar(255) NOT NULL,";
$sql .= "timeLimit int unsigned NOT NULL,";
$sql .= "isSolved tinyint(1) NOT NULL default 0,";
$sql .= "likes int(255) NOT NULL default 0,";
$sql .= "cate varchar(255) NOT NULL,";
$sql .= "createdTime datetime NOT NULL default CURRENT_TIMESTAMP,";
$sql .= "PRIMARY KEY (quizId)";
$sql .= ") charset=utf8";

$connect->query($sql);
?>