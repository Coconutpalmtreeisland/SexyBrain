<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="../assets/css/searchLogin.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <main id="main">
        <aside id="aside">
            <div class="asidetext">
                <h1 class="logo"><img src="../assets/img/logo2.png" alt="logo"></h1>
            </div>
            <div class="asidevideo">
            </div>
        </aside>
        <div class="join_wrap">
            <div class="insert_inner">
                <a href="../home/main.php" class="gohome"></a>
                <div class="inner_form">
                    <form action="loginResult.php" class="join__form" name="joinSuccess" method="post"
                        onsubmit="return joinChecks();">
                        <fieldset>
                            <legend>뇌섹남녀 로그인</legend>
                            <div class="form-group mt20">
                                <div class="position_msg">

                                    <label for="youId" class="label required">아이디</label>
                                    <div class="check">
                                        <input type="text" id="youId" name="youId" placeholder="아이디를 입력해주세요!"
                                            class="input__box1">
                                    </div>
                                    <p class="msg" id="youIdComment"></p>
                                </div>
                                <div class="form-group ps_g position_msg">
                                    <div>
                                        <label for="youPass" class="label">비밀번호</label>
                                        <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력해주세요"
                                            class="input__box1">
                                    </div>
                                    <p class="msg" id="youPassComment"></p>
                                </div>
                                <button type="submit" id="submitBtn" class="max_width_btn__style">로그인</button>
                                <div class="go__search">
                                    <div>
                                        <a href="searchId.php">아이디 찾기</a>
                                    </div>
                                    <div>
                                        <a href="searchPass.php">비밀번호 찾기</a>
                                    </div>
                                    <div>
                                        <a href="joinInsert.php">회원가입</a>
                                    </div>
                                </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>
        function joinChecks() {
            // 아이디 공백 확인
            if ($("#youId").val() == '') {
                $("#youIdComment").text("아이디를 입력해주세요.");
                $("#youId").focus();
                return false;
            }

            // 비밀번호 공백 확인
            if ($("#youPass").val() == '') {
                $("#youPassComment").text("비밀번호를 입력해주세요.");
                $("#youPass").focus();
                return false;
            }
        }
    </script>
</body>

</html>