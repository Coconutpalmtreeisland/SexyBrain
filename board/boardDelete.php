<?php
include "../connect/connect.php";
include "../connect/session.php";

$boardId = $_GET['boardId'];
$youId = $_SESSION['youId'];

$query = "SELECT boardAuthor FROM sexyBoard WHERE boardId = '{$boardId}'";
$result = $connect->query($query);

if ($result) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row['boardAuthor'] != $youId && $youId != 'myadmin') {
        echo "<script>alert('권한이 없습니다.'); history.back();</script>";
        exit;
    }
} else {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

// 게시글 삭제 쿼리 추가
$deleteQuery = "DELETE FROM sexyBoard WHERE boardId = '{$boardId}'";
$deleteResult = $connect->query($deleteQuery);
if (!$deleteResult) {
    echo "<script>alert('삭제하는 과정에서 오류가 발생했습니다.'); history.back();</script>";
    exit;
}

Header("Location: board.php");
?>