<?php
include "../connect/connect.php";
include "../connect/session.php";

if (isset($_SESSION['memberId'])) {
    $memberId = $_SESSION['memberId'];
} else {
    $memberId = 0;
}

if (isset($_POST['boardId']) && isset($_POST['msg'])) {
    $boardId = $_POST['boardId'];
    $msg = $_POST['msg'];
    $commentName = $_SESSION['youId'];

    // 댓글 저장 쿼리
    $sql = "INSERT INTO SBComment (memberId, boardId, commentName, commentMsg, commentDelete, regTime) VALUES ('$memberId', '$boardId', '$commentName', '$msg', '1', '" . time() . "')";

    $result = $connect->query($sql);

    if ($result) {
        $response = array(
            'status' => 'success',
            'message' => '댓글이 저장되었습니다.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => '댓글 저장에 실패하였습니다.'
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => '댓글 정보가 올바르지 않습니다.'
    );
}

echo json_encode($response);
?>