<?php
include "../connect/connect.php";
include "../connect/session.php";

if(!isset($_POST['memberId'])) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
    exit;
}

$memberId  = $_POST['memberId'];

// 회원 정보 삭제
$sql = "DELETE FROM sexyMembers WHERE memberId= '{$memberId}'";
$result = $connect -> query($sql);

if($result) {
    // 세션 종료
    session_unset();
    session_destroy();

    echo "<script>alert('회원탈퇴가 완료되었습니다.'); location.href='../home/main.php';</script>";
} else {
    echo "<script>alert('회원탈퇴에 실패하였습니다.'); history.back();</script>";
}
?>
