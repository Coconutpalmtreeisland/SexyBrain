<?php

include "../connect/connect.php";
include "../connect/session.php";
include "../connect/sessionCheck.php";

?>

<!DOCTYPE html>
<html lang="KO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/mypage.css">
</head>

<body>
    <div id="wrap">
        <?php include "../include/header.php" ?>

        <div id="main">
                <?php include "./mypageCate.php" ?>

            <section id="quiz_list">
                <div class="password-change-form">
                <h2>비밀번호 변경</h2>
                    <form onsubmit="changePassword(event)">
                        <label for="current-password">현재 비밀번호</label>
                        <input type="password" id="current-password" name="current-password" placeholder="비밀번호를 입력해주세요" required>
                        
                        <label for="new-password">새 비밀번호</label>
                        <input type="password" id="new-password" name="new-password" placeholder="새로운 비밀번호를 입력해주세요" required>
                        
                        <label for="confirm-password">비밀번호 확인</label>
                        <input type="password" id="confirm-password"  name="confirm-password" placeholder="비밀번호를 확인해주세요" required>
                        <p id="new-password-msg"></p>
                        
                        <button type="submit">변경하기</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
 

    <?php include "../include/footer.php" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
    function showConfirmation() {
        document.getElementById('confirmation-modal').style.display = 'block';
    }

    function hideConfirmation() {
        document.getElementById('confirmation-modal').style.display = 'none';
    }
    

    function changePassword(event) {
    // form 제출 방지
    event.preventDefault();

    // form 데이터 가져오기
    var currentPassword = $('#current-password').val();
    var newPassword = $('#new-password').val();
    var confirmPassword = $('#confirm-password').val();

    // 비밀번호 유효성 검사
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9]).{8,}$/
    if (!passwordRegex.test(newPassword)) {
        $('#new-password-msg').text('비밀번호는 최소 8자 이상이어야 하며, 영문 소문자, 숫자, 특수문자가 각각 1개 이상 포함되어야 합니다.').addClass('invalid');
        return;
    } else {
        $('#new-password-msg').text('').removeClass('invalid');
    }

    // AJAX 요청 보내기
    $.ajax({
        url: 'changePassword.php',
        type: 'post',
        data: {
            'current-password': currentPassword,
            'new-password': newPassword,
            'confirm-password': confirmPassword
        },
        success: function(response) {
            // 응답 처리
            if (response === 'success') {
                alert('비밀번호가 변경되었습니다.');
               
            } else {
                alert(response);
                window.location.reload();
            }
        }
    });
}


    

    </script>
    
</body>

</html>