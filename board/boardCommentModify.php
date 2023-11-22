<?php
include "../connect/connect.php";
include "../connect/session.php";

if (!isset($_SESSION['youId'])) {
    echo "<script>alert('로그인 후 이용해주세요.'); location.href='login.php';</script>";
}

$commentId = $_POST['commentId'];
$boardId = $_POST['boardId'];
$msg = $_POST['msg'];
$memberId = $_SESSION['memberId'];
$youId = $_SESSION['youId'];

// 댓글 작성자 이름 가져오기
$sql = "SELECT commentName FROM SBComment WHERE commentId = ? AND boardId = ?";
$stmt = $connect->prepare($sql);
if ($stmt === false) {
    die('prepare() failed: ' . htmlspecialchars($connect->error));
}
$stmt->bind_param("ii", $commentId, $boardId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);
$commentAuthorName = $row['commentName'];

// 댓글 작성자와 현재 로그인한 사용자가 동일한지 확인
if ($youId !== $commentAuthorName && $youId !== 'myadmin') {
    http_response_code(403); // 권한이 없음
    echo json_encode(array('message' => '자신이 작성한 댓글만 수정할 수 있습니다.'));
    exit;
}

$msg = $connect->real_escape_string($msg); // SQL Injection 방지

$sql = "UPDATE SBComment SET commentMsg = ? WHERE commentId = ? AND boardId = ?";
$stmt = $connect->prepare($sql);
if ($stmt === false) {
    die('prepare() failed: ' . htmlspecialchars($connect->error));
}
$stmt->bind_param("sii", $msg, $commentId, $boardId);
$result = $stmt->execute();

if ($result) {
    echo "댓글이 수정되었습니다.";
} else {
    http_response_code(500); // 내부 서버 오류
    echo json_encode(array('message' => '댓글 수정에 실패했습니다. 오류: ' . $connect->error));
}
?>