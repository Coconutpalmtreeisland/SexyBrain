<?php
include "../connect/connect.php";
include "../connect/session.php";

// 폼에서 POST로 전달된 데이터 받기
$youId = mysqli_real_escape_string($connect, $_POST['youId']);
$youPass = mysqli_real_escape_string($connect, $_POST['youPass']);

// SQL 쿼리 생성
$sql = "SELECT memberId, youId, youName, youPass FROM sexyMembers WHERE youId = '$youId' AND youPass = '$youPass';";
$result = $connect->query($sql);

$count = $result->num_rows;

if ($count) {
    $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['memberId'] = $memberInfo['memberId']; // 수정된 부분
    $_SESSION['youName'] = $memberInfo['youName'];
    $_SESSION['youId'] = $memberInfo['youId'];
    Header("Location: ../home/main.php");
} else {
    $text = "<span>일치하는 정보가 없습니다. <br> 다시 한번 확인해주세요.</span>";
    $btn = "<a href='login.php' class='go__login btn__style2'>로그인</a>";
}

// echo $findId['youId'];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/cube.css">
</head>

<body>
    <div class="success__box">
        <a href="#" class="logo"></a>
        <!-- <p><?= $youName ?>님의 아이디는<?= $memberInfo['youId'] ?> 입니다.</p> -->
        <p>
            <?= $text ?>
        </p>
        <div>
            <?= $btn ?>
        </div>
    </div>
    <!-- <input type="checkbox" id="shadows" checked /><label for="shadows">Soft shadows</label> -->
    <div class="cubes">
        <!--   row, column, z -->
        <div class="cube" data-cube="111">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-z" data-cube="112"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="121">
            <div class="cube-wrap">
                <div class="cube-top">
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="131">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-z" data-cube="132"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="211">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="111"></div>
                    <div class="shadow-y" data-cube="111"></div>
                    <div class="shadow-z" data-cube="212"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="221">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="121"></div>
                    <div class="shadow-y" data-cube="121"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="231">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="131"></div>
                    <div class="shadow-y" data-cube="131"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="311">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="211"></div>
                    <div class="shadow-y" data-cube="211"></div>
                    <div class="shadow-z" data-cube="312"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="321">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="221"></div>
                    <div class="shadow-y" data-cube="221"></div>
                    <div class="shadow-z" data-cube="322"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="331">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="231"></div>
                    <div class="shadow-y" data-cube="231"></div>
                    <div class="shadow-z" data-cube="332"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>

        <!-- top layer -->
        <div class="cube" data-cube="112">
            <div class="cube-wrap">
                <div class="cube-top">

                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="122">
            <div class="cube-wrap">
                <div class="cube-top">
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="132">
            <div class="cube-wrap">
                <div class="cube-top">
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="212">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="112"></div>
                    <div class="shadow-y" data-cube="112"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="222">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="122"></div>
                    <div class="shadow-y" data-cube="122"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="232">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="132"></div>
                    <div class="shadow-y" data-cube="132"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="312">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="212"></div>
                    <div class="shadow-y" data-cube="212"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="322">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="222"></div>
                    <div class="shadow-y" data-cube="222"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="332">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="232"></div>
                    <div class="shadow-y" data-cube="232"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>

        <!-- bottom layer -->
        <div class="cube" data-cube="113">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-z" data-cube="111"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="123">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-z" data-cube="121"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="133">
            <div class="cube-wrap">
                <div class="cube-top">
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="213">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="113"></div>
                    <div class="shadow-y" data-cube="113"></div>
                    <div class="shadow-z" data-cube="211"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="223">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-y" data-cube="123"></div>
                    <div class="shadow-z" data-cube="221"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="233">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-y" data-cube="133"></div>
                    <div class="shadow-z" data-cube="231"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="313">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="213"></div>
                    <div class="shadow-y" data-cube="213"></div>
                    <div class="shadow-z" data-cube="311"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="323">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="223"></div>
                    <div class="shadow-y" data-cube="223"></div>
                    <div class="shadow-z" data-cube="321"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>
        <div class="cube" data-cube="333">
            <div class="cube-wrap">
                <div class="cube-top">
                    <div class="shadow-flip" data-cube="233"></div>
                    <div class="shadow-y" data-cube="233"></div>
                    <div class="shadow-z" data-cube="331"></div>
                </div>
                <div class="cube-bottom"></div>
                <div class="cube-front-left"></div>
                <div class="cube-front-right"></div>
                <div class="cube-back-left"></div>
                <div class="cube-back-right"></div>
            </div>
        </div>

        <div class="large-shadows">
            <div class="large-shadow" data-cube="113"></div>
            <div class="large-shadow" data-cube="123"></div>
            <div class="large-shadow" data-cube="133"></div>
            <div class="large-shadow" data-cube="213"></div>
            <div class="large-shadow" data-cube="223"></div>
            <div class="large-shadow" data-cube="233"></div>
            <div class="large-shadow" data-cube="313"></div>
            <div class="large-shadow" data-cube="323"></div>
            <div class="large-shadow" data-cube="333"></div>
        </div>
    </div>

</body>

</html>