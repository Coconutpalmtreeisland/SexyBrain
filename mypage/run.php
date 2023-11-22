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
                <form action="runrun.php" method="post" class="runform">
                    <h2>회원탈퇴</h2>
                    <p>😮탈퇴 하시겠습니까?</p>
                    <textarea id="run" readonly>
[회원탈퇴 약관]

회원탈퇴 신청 전 안내 사항을 확인 해 주세요.

회원탈퇴를 신청하시면 현재 로그인 된 아이디는 사용하실 수 없습니다.

회원탈퇴 시 회원의 개인정보는 즉시 삭제되며, 복구할 수 없습니다.

단, 회원의 게시글 및 댓글은 삭제되지 않으며, 이에 대한 모든 권리와 책임은 게시물을 작성한 회원에게 있습니다.

회원탈퇴 후에는 본인의 게시글 및 댓글을 직접 삭제하거나 수정할 수 없습니다.

회원탈퇴 후에도 회원이 게시한 게시물 및 댓글은 삭제되지 않으며, 해당 게시물 및 댓글에 대한 권리와 책임은 회원에게 있습니다.

회원탈퇴는 회원 본인의 요청에 의해 이루어집니다. 다른 사람의 요청이나 압력에 의한 탈퇴는 허용되지 않습니다.

회원탈퇴는 회원 본인의 판단과 책임 하에 이루어집니다. 탈퇴로 인해 발생하는 모든 결과에 대한 책임은 회원 본인에게 있습니다.
                    </textarea>
                    <input type="hidden" name="memberId" value="<?=$_SESSION['memberId']?>" />
                    <!-- <button class="run_btn" type="submit">탈퇴하기</button> -->
                    <button class="run_btn" type="button" onclick="showConfirmation()">탈퇴하기</button>

                    <div id="confirmation-modal" style="display: none;">
                        <div id="confirmation-message">
                            <p>정말로 탈퇴하시겠습니까?</p>
                            <button type="submit">네</button>
                            <button type="button" onclick="hideConfirmation()">아니오</button>
                        </div>
                    </div>
                </form>
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
    }</script>
    
</body>

</html>