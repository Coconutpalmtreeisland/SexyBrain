<?php
include "../connect/connect.php";
include "../connect/session.php";

if (!isset($_SESSION['youId'])) {
    echo "<script>alert('로그인 후 이용해주세요.'); location.href='login.php';</script>";
}

$commentId = $_POST['commentId'];
$boardId = $_POST['boardId'];
$memberId = $_SESSION['memberId'];
$youId = $_SESSION['youId'];

// 댓글 작성자 ID 가져오기
$sql = "SELECT memberId FROM SBComment WHERE commentId = {$commentId} AND boardId = {$boardId}";
$result = $connect->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$commentAuthorId = $row['memberId'];

// 댓글 작성자와 현재 로그인한 사용자가 동일하거나 현재 로그인한 사용자가 'myadmin'인지 확인
if ($memberId !== $commentAuthorId && $youId !== 'myadmin') {
    http_response_code(403); // 권한이 없음
    echo json_encode(array('message' => '자신이 작성한 댓글만 삭제할 수 있습니다.'));
    exit;
}

$sql = "DELETE FROM SBComment WHERE commentId = {$commentId} AND boardId = {$boardId}";
$result = $connect->query($sql);

if ($result) {
    echo json_encode(array('message' => '댓글이 삭제되었습니다.'));
} else {
    http_response_code(500); // 내부 서버 오류
    echo json_encode(array('message' => '댓글 삭제에 실패했습니다. 다시 시도해주세요.'));
}
?>