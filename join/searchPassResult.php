<?php
include "../connect/connect.php"; // 데이터베이스 연결 설정
include "../connect/session.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $youName = mysqli_real_escape_string($connect, $_POST['youName']);
    $youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);

    $sql = "SELECT youId, youPass FROM sexyMembers WHERE youName = '$youName' AND youEmail = '$youEmail';";
    $result = $connect->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['youPass']; // 사용자의 비밀번호 반환
        } else {
            echo ""; // 일치하는 정보가 없을 때 빈 문자열 반환
        }
    } else {
        echo ""; // 쿼리 실행 오류 시 빈 문자열 반환
    }
} else {
    echo ""; // POST 요청이 아닐 때 빈 문자열 반환
}
?>
