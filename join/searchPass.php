<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
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
            <!-- <video playsinline="" class="sidebar__video" poster="https://cdn.dribbble.com/uploads/50041/original/d9d7009fc3fef22ece7ecb61c14f2b97.jpeg?1696604581" autoplay="" loop="" muted="" src="https://cdn.dribbble.com/uploads/50206/original/f83a8c94071072729e7c2837d82eab18.mp4?1697473312"></video> -->
            </div>
        </aside>
        <div class="join_wrap">
            <div class="insert_inner">
                <a href="../home/main.php" class="gohome"></a>
                <div class="inner_form">
                    <form action="searchPassResult.php" class="join__form" name="joinSuccess" method="post" onsubmit="return joinChecks();">
                        <fieldset>
                            <legend>뇌섹남녀 비밀번호 찾기</legend>
                            <div class="form-group mt20">
                                <div class="position_msg">

                                <div class="position_msg">
                                    <label for="youName" class="label">이름<div class="msg" id="youNameComment"></div></label>
                                    <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요" class="input__box1">
                                </div>
                                <p class="msg" id="youNameComment"></p>
                            </div>

                            <div class="position_msg">
                                <label for="youId" class="label required">아이디</label>
                                <div class="check">
                                    <input type="text" id="youId" name="youId" placeholder="아이디를 입력해주세요!" class="input__box1">
                                </div>
                                <p class="msg" id="youIdComment"></p>
                            </div>

                            <div class="position_msg">
                                <label for="youEmail" class="label required">이메일</label>
                                <div class="form-group">
                                    <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요" class="input__box1">
                                </div>
                                <p class="msg" id="youEmailComment"></p>
                            </div>
                            <button type="submit" id="submitBtn" class="max_width_btn__style">비밀번호 찾기</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    <script>
        function joinChecks(){
            // 이름 공백 확인
            if($("#youName").val() == ''){
                $("#youNameComment").text("이름을 입력해주세요.");
                $("#youName").focus();
                return false;
            }

            // 아이디 공백 확인
            if($("#youId").val() == ''){
                $("#youIdComment").text("아이디를 입력해주세요.");
                $("#youId").focus();
                return false;
            }

            // 이메일 공백 확인
            if($("#youEmail").val() == ''){
                $("#youEmailComment").text("이메일을 입력해주세요.");
                $("#youEmail").focus();
                return false;
            }
        }

        function joinChecks() {
            // 기존 유효성 검사 로직

            $.ajax({
                type: "POST",
                url: "searchPassResult.php",
                data: $(".join__form").serialize(),
                success: function(response) {
                    if (response.trim() !== "") {
                        if (confirm("당신의 비밀번호는 " + response + " 입니다. 로그인 페이지로 이동하시겠습니까?")) {
                            window.location.href = "login.php"; // 확인을 누르면 login.php로 이동
                        }
                    } else {
                        alert("회원정보를 확인해주세요!🙄");
                    }
                }
            });
            return false;

        }
    </script>
</body>
</html>