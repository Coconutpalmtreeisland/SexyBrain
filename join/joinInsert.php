<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" href="../assets/css/join2.css">
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
            <a href="../home/main.php" class="gohome"></a>
            <div class="insert_inner">
                <div class="inner_form">
                    <form action="joinSuccess.php" class="join__form" name="joinSuccess" method="post" onsubmit="return joinChecks();">
                    <fieldset>
                            <legend>뇌섹남녀 회원가입</legend>
                                <div class="position_msg">
                                    <label for="youId" class="label required">아이디</label>
                                    <div class="check">
                                        <input type="text" id="youId" name="youId" placeholder="아이디를 입력해주세요!" class="input__box1">
                                        <div class="btn id_btn" onclick="idChecking()">아이디 검사</div>
                                    </div>
                                    <p class="msg" id="youIdComment"></p>
                                </div>

                                <div class="position_msg">
                                    <label for="youName" class="label">이름<div class="msg" id="youNameComment"></div></label>
                                    <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요" class="input__box1">
                                </div>
                                <p class="msg" id="youNameComment"></p>

                            <div class="position_msg">
                                <label for="youEmail" class="label required">이메일</label>
                                <div class="form-group">
                                    <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요" class="input__box1">
                                    <div class="btn e_btn" onclick="emailChecking()">이메일 검사</div>
                                </div>
                                <p class="msg" id="youEmailComment"></p>
                            </div>

                            <div class="form-group ps_g position_msg">
                                <div>
                                    <label for="youPass" class="label">비밀번호</label>
                                    <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력해주세요" class="input__box1">
                                </div>
                                
                                <div>
                                    <label for="youPassC" class="label required">비밀번호 확인</label>
                                    <input type="password" id="youPassC" name="youPassC" placeholder="비밀번호를 한 번 더 입력해주세요" autocomplete="off" class="input__box1">
                                </div>
                                <p class="msg" id="youPassCComment"></p>
                                <p class="msg" id="youPassComment"></p>
                            </div>

                            <div class="adress">
                                <label for="youAddress1" class="label required">주소</label>
                                <div class="check">
                                    <input type="text" id="youAddress1" name="youAddress1" placeholder="우편번호" class="input__box1">
                                    <div class="btn" id='addressCheck'>주소 찾기</div>
                                </div>
                            </div>
                            
                            <div class="form-group f_g_3">
                                <div>
                                    <label for="youAddress2" class="label required blind">주소</label>
                                    <input type="text" id="youAddress2" name="youAddress2" placeholder="주소" class="input__box1">
                                </div>
                                <div>
                                    <label for="youAddress3" class="label required blind">상세 주소</label>
                                    <input type="text" id="youAddress3" name="youAddress3" placeholder="상세 주소" class="input__box1">
                                    <p class="msg" id="youAddressComment"></p>
                                </div>
                            </div>

                            <button type="submit" id="submitBtn" class="btn insert">회원가입</button>

                            <div class="alread">
                                <p>이미 계정이 있습니까? <a href="./login.php">로그인하기</a></p>   
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>


    <div id='layer'>
    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" alt="닫기 버튼">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        let isIdCheck = false;
        let isEmailCheck = false;

        function idChecking() {
    let youId = $("#youId").val();

    if (youId == null || youId == '') {
        $("#youIdComment").text("**아이디를 입력해주세요");
    } else {
        // 아이디 유효성 검사
        let getYouId = RegExp(/^[a-zA-Z0-9_-]{4,20}$/);

        if (!getYouId.test($("#youId").val())) {
            $("#youIdComment").text("아이디는 영어와 숫자를 포함하여 4~20자 이내로 작성가능합니다.")
            $("#youId").val('')
            $("#youId").focus();
            isIdCheck = false; // 중복 검사 실패
            return false;
        } else {
            $("#youIdComment").text("아이디로 사용이 가능합니다.")
            $("#youIdComment").addClass("green");

            // 중복 검사 결과를 초기화
            isIdCheck = false;

            $.ajax({
                type: "POST",
                url: "joinCheck.php",
                data: { "youId": youId, "type": "isIdCheck" },
                dataType: "json",
                success: function (data) {
                    if (data.result == "good") {
                        $("#youIdComment").text("사용 가능한 아이디입니다.");
                        isIdCheck = true; // 중복 검사 성공
                    } else {
                        $("#youIdComment").text("이미 존재하는 아이디입니다.");
                        $("#youIdComment").addClass("red");
                        $("#youIdComment").removeClass("green");
                        isIdCheck = false; // 중복 검사 실패
                    }
                }
            });
        }
    }
}

        function emailChecking(){
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("**이메일을 입력해주세요");
            } else {
                // 이메일 유효성 검사
                let getYouEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([\-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i);

                if(!getYouEmail.test($("#youEmail").val())){
                    $("#youEmailComment").text("**올바른 이메일을 입력해주세요")
                    $("#youEmail").val('')
                    $("#youEmail").focus();
                    return false;
                } else {
                    $("#youEmailComment").text("이메일로 사용이 가능합니다.")
                    $("#youEmailComment").addClass("green");
                }

                // 중복 검사 결과를 초기화
                isEmailCheck = false;
                $.ajax({
                    type: "POST",
                    url: "joinCheck.php",
                    data: {"youEmail": youEmail, "type": "isEmailCheck"},
                    dataType: "json",
                    success: function(data){
                        if(data.result == "good"){
                            $("#youEmailComment").text("사용 가능한 이메일입니다.");
                            $("#youEmailComment").addClass("green");
                            $("#youEmailComment").removeClass("red");
                            isEmailCheck = true;
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다.");
                            $("#youEmailComment").addClass("red");
                            $("#youEmailComment").removeClass("green");
                            isEmailCheck = false;
                        }
                    }
                })
            }
        }

        function joinChecks(){

            // 중복 확인이 이루어 졌는지 검사
            if(!isIdCheck || !isEmailCheck){
                alert("중복 검사를 먼저 진행해주세요.");
                return false;
            }

            // 이름 유효성 검사
            if($("#youName").val() == ''){
                $("#youNameComment").text("이름을 입력해주세요.");
                $("#youName").focus();
                return false;
            } else {
                let getYouName = RegExp(/^[가-힣]{3,5}$/);

                if(!getYouName.test($("#youName").val())){
                    $("#youNameComment").text("이름은 한글(3-5자)만 사용가능합니다.");
                    $("#youName").val('');
                    $("#youName").focus();
                    return false;
                }
            }
                // 비밀번호 유효성 검사
                if($("#youPass").val() == ''){
                $("#youPassComment").text("**비밀번호를 입력해주세요");
                $("#youPass").focus();
                return false;
            } else {
                let getYouPass = $("#youPass").val();
                let getYouPassNum = getYouPass.search(/[0-9]/g);
                let getYouPassEng = getYouPass.search(/[a-z]/ig);
                let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

                if(getYouPass.length < 8 || getYouPass.length > 20){
                    $("#youPassComment").text("➟ 8자리 ~ 20자리 이내로 입력해주세요");
                    return false;
                } else if (getYouPass.search(/\s/) != -1){
                    $("#youPassComment").text("➟ 비밀번호는 공백없이 입력해주세요!");
                    return false;
                } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                    $("#youPassComment").text("➟ 영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                    return false;
                } 
            }
             // 비밀번호 확인 유효성 검사
             if($("#youPassC").val() == ''){
                $("#youPassCComment").text("➟ 확인 비밀번호를 입력해주세요!");
                $("#youPassC").focus();
                return false;
            }

            // 비밀번호 동일한지 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("➟ 비밀번호가 일치하지 않습니다.");
                $("#youPass").focus();
                return false;
            } 
            
        }
        
    </script>

    <script>
        // 우편번호 찾기 화면을 넣을 element
        const layer = document.querySelector("#layer");
        const searchIcon = document.querySelector("#addressCheck");
        const layerCloseBtn = document.querySelector("#btnCloseLayer");

        searchIcon.addEventListener('click', searchBtnClick);
        layerCloseBtn.addEventListener('click', closeDaumPostcode);

        function closeDaumPostcode() {
            // iframe을 넣은 element를 안보이게 한다.
            layer.style.display = 'none';
        }

        const themeObj = {
            //bgColor: "", //바탕 배경색
            searchBgColor: "#0B65C8", //검색창 배경색
            //contentBgColor: "", //본문 배경색(검색결과,결과없음,첫화면,검색서제스트)
            //pageBgColor: "", //페이지 배경색
            //textColor: "", //기본 글자색
            queryTextColor: "#FFFFFF" //검색창 글자색
            //postcodeTextColor: "", //우편번호 글자색
            //emphTextColor: "", //강조 글자색
            //outlineColor: "", //테두리
        };

        function searchBtnClick() {
            new daum.Postcode({
                theme: themeObj,
                oncomplete: function (data) {
                    // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    let addr = ''; // 주소 변수
                    let extraAddr = ''; // 참고항목 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }



                    document.querySelector('#youAddress1').value = data.zonecode; // 우편번호
                    document.querySelector("#youAddress2").value = addr; // 주소
                    document.querySelector("#youAddress3").focus();

                    // iframe을 넣은 element를 안보이게 한다.
                    // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                    layer.style.display = 'none';
                },
                width: '100%',
                height: '100%',
                maxSuggestItems: 5
            }).embed(layer);

            // iframe을 넣은 element를 보이게 한다.
            layer.style.display = 'block';

            // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
            initLayerPosition();
        }

        // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
        // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
        // 직접 layer의 top,left값을 수정해 주시면 됩니다.
        function initLayerPosition() {
            const width = 500; //우편번호서비스가 들어갈 element의 width
            const height = 500; //우편번호서비스가 들어갈 element의 height
            const borderWidth = 5; //샘플에서 사용하는 border의 두께

            // 위에서 선언한 값들을 실제 element에 넣는다.
            layer.style.width = width + 'px';
            layer.style.height = height + 'px';
            layer.style.border = borderWidth + 'px solid';
            // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
            layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width) / 2 - borderWidth) + 'px';
            layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height) / 2 - borderWidth) + 'px';
        }
    </script>
</body>
</html>