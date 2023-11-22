<?php
include "../connect/connect.php";
include "../connect/session.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    // 현재 로그인한 사용자의 비밀번호 가져오기
    $sql = "SELECT youPass FROM sexyMembers WHERE memberId = '{$_SESSION['memberId']}'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    // 현재 비밀번호가 맞는지 확인
    if ($currentPassword == $row['youPass']) {
        // 새 비밀번호와 확인 비밀번호가 일치하는지 확인
        if ($newPassword == $confirmPassword) {
            // 데이터베이스에 새 비밀번호 저장
            $sql = "UPDATE sexyMembers SET youPass = '{$newPassword}' WHERE memberId = '{$_SESSION['memberId']}'";

            if ($connect->query($sql) === TRUE) {
                echo "비밀번호가 변경되었습니다.";
            } else {
                echo "오류: " . $connect->error;
            }
        } else {
            echo "새 비밀번호와 확인 비밀번호가 일치하지 않습니다.";
        }
    } else {
        echo "현재 비밀번호가 틀렸습니다.";
    }
}

?>
