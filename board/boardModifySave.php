<?php
include "../connect/connect.php";
include "../connect/session.php";
include "../connect/sessionCheck.php";

$boardId = $_POST['boardId'];
$youId = $_SESSION['youId'];

$boardCategory = $_POST['boardCategory'];
$boardTitle = $_POST['boardTitle'];
$boardContents = $_POST['boardContents'];

$query = "SELECT boardAuthor FROM sexyBoard WHERE boardId = '{$boardId}'";
$result = $connect->query($query);

if ($result) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row['boardAuthor'] == $youId || $youId == 'myadmin') { // 'myadmin' 사용자가 모든 게시글을 수정할 수 있도록 수정

        $query = "UPDATE sexyBoard SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE boardId = '{$boardId}'";
        $connect->query($query);
    }
}

Header("Location: boardView.php?boardId={$boardId}");
?>