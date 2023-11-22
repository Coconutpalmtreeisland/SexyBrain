<?php
include "../connect/connect.php";
include "../connect/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizId = $_POST['quizId'];
    $memberId = $_SESSION['memberId'];

    // 이미 좋아요를 눌렀는지 확인
    $likeSql = "SELECT * FROM quizMember WHERE quizId = '$quizId' AND memberId = '$memberId' AND `likes` = 1";
    $likeResult = $connect->query($likeSql);

    if ($likeResult->num_rows > 0) {
        // 이미 좋아요를 누른 경우, 좋아요를 취소
        $unlikeSql = "UPDATE quizMember SET `likes` = 0 WHERE quizId = '$quizId' AND memberId = '$memberId'";
        $connect->query($unlikeSql);

        // quiz 테이블의 likes 업데이트
        $updateLikesSql = "UPDATE quiz SET likes = likes - 1 WHERE quizId = '$quizId'";
        $connect->query($updateLikesSql);

        echo 'already_liked';
    } else {
        // 좋아요 추가
        $likeSql = "SELECT * FROM quizMember WHERE quizId = '$quizId' AND memberId = '$memberId'";
        $likeResult = $connect->query($likeSql);

        if ($likeResult->num_rows > 0) {
            // 이미 레코드가 있으면, 좋아요만 추가
            $updateSql = "UPDATE quizMember SET `likes` = 1 WHERE quizId = '$quizId' AND memberId = '$memberId'";
            $connect->query($updateSql);
        } else {
            // 레코드가 없으면, 레코드를 새로 생성
            $insertSql = "INSERT INTO quizMember (memberId, quizId, `likes`) VALUES ('$memberId', '$quizId', 1)";
            $connect->query($insertSql);
        }

        // quiz 테이블의 likes 업데이트
        $updateLikesSql = "UPDATE quiz SET likes = likes + 1 WHERE quizId = '$quizId'";
        $connect->query($updateLikesSql);

        echo 'liked';
    }
}
?>