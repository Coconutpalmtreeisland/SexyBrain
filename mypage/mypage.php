<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $youId = (isset($_SESSION['youId']) && $_SESSION['youId'] != '') ? $_SESSION['youId'] : '';
    if ($youId == '') {
        echo "
            <script>
                alert('로그인 후 이용해주세요.');
                self.location.href='../join/login.php';
            </script>
        ";
        exit;
    }

    // 기존 이메일 및 이미지 가져오기
    $sql = "SELECT youEmail, youAddress, youImgSrc FROM sexyMembers WHERE youId='$youId'";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    $existingEmail = $row['youEmail'];
    $youImgSrc = $row['youImgSrc'];

    // 주소를 '*' 기호로 분리
    $youAddress = $row['youAddress'];
    $addressParts = explode("*", $youAddress);
?>

<!DOCTYPE html>
<html lang="KO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myPage2.css">
</head>

<body>
    <div id="wrap">
        <?php include "../include/header.php" ?>

        <div id="main">
            <?php include "./mypageCate.php" ?>

            <section id="quiz_list">
                <div class="my_wrap">
                    <h2>회원정보 수정</h2>
                    <form action="myPageSave.php" class="join__form" name="myPageSave" method="post" enctype="multipart/form-data" onsubmit="return myPageChecks();">
                        <fieldset>
                            <legend>프로필 사진 변경</legend>
                            <div class="position_msg">
                                <label for="youImgSrc" class="blind label">프로필 사진</label>
                                <?php
                                if (!empty($youImgSrc)) {
                                    echo '<img id="preview" src="../assets/profile/' . $youImgSrc . '" alt="프로필 사진" class="profile-image">';
                                } else {
                                    echo '<img id="preview" src="../assets/profile/default_profile_image.jpg" alt="프로필 사진 미리보기" class="profile-image">';
                                }
                                ?>
                                <div class="flex">
                                    <input type="file" id="youImgSrc" name="youImgSrc" accept="image/*" class="input__box1" onchange="previewImage(this)">
                                    <input type="hidden" id="existingImgSrc" name="existingImgSrc" value="<?php echo $youImgSrc; ?>">
                                    <p>* jpg, png, gif, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘길 수 없습니다.</p>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>개인 정보</legend>
                            <div class="position_msg">
                                <label for="youId" class="label required">아이디</label>
                                <input type="text" id="youId" name="youId" readonly disabled class="input__box1" value="<?php echo htmlspecialchars($youId); ?>">
                            </div>

                            <div class="position_msg">
                                <label for="youEmail" class="label required">이메일</label>
                                <div class="form-group">
                                    <input type="email" id="youEmail" name="youEmail" placeholder="변경할 이메일을 입력해주세요" class="input__box1"  value="<?php echo $existingEmail; ?>">
                                    <div class="btn01 btn__mypage02" onclick="emailChecking()">이메일 변경</div>
                                </div>
                                <p class="msg" id="youEmailComment"></p>
                            </div>
                            
                            <div class="form-group f_g_3">
                                <div class="address">
                                    <legend>주소</legend>
                                    <label for="youAddress1" class="label required">우편번호</label>
                                    <input type="text" id="youAddress1" name="youAddress1" placeholder="변경할 우편번호를 입력해주세요" class="input__box1" value="<?php echo $addressParts[0]; ?>">
                                    <div class="btn02 btn__mypage02" id='addressCheck'>주소 찾기</div>
                                </div>
                                <div class="address">
                                    <label for="youAddress2" class="label required">주소</label>
                                    <input type="text" id="youAddress2" name="youAddress2" placeholder="변경할 주소를 입력해주세요" class="input__box1" value="<?php echo $addressParts[1]; ?>">
                                </div>
                                <div class="address">
                                    <label for="youAddress3" class="label required">상세 주소</label>
                                    <input type="text" id="youAddress3" name="youAddress3" placeholder="변경할 상세 주소를 입력해주세요" class="input__box1" value="<?php echo $addressParts[2]; ?>">
                                </div>
                                <input type="hidden" id="addressChangeClicked" name="addressChangeClicked" value="false">
                                <div class="btn03 btn__mypage02" type="submit" id="submitBtn" onclick="addressChangeClicked.value = 'true'">주소 변경</div>
                                <p class="msg" id="youaddressComment"></p>
                            </div>

                            <button type="button" id="cancleBtn" class="btn__mypage01 btn__cancle" onclick="cancleForm()">취소</button>
                            <button type="button" id="submitBtn" class="btn__mypage01 btn__save" onclick="submitForm()">저장</button>
                        </fieldset>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div id='layer'>
    <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" alt="닫기 버튼">
    </div>

    <?php include "../include/footer.php" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        let isEmailCheck = false;

        function emailChecking() {
            let youEmail = $("#youEmail").val();

            // 이메일 유효성 검사
            let getYouEmail = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([\-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;

            // 입력창이 빈칸이면 기존 이메일을 그대로 사용
            if(youEmail === "") {
                $("#youEmailComment").text("기존 이메일을 그대로 사용합니다.");
                isEmailCheck = true;
                return true;
            }
            
            if (!getYouEmail.test(youEmail)) {
                $("#youEmailComment").text("**올바른 이메일을 입력해주세요");
                $("#youEmail").val('');
                $("#youEmail").focus();
                return false;
            } else {
                // 기존 이메일과 같으면 알림을 띄우고 수정하지 않고 저장
                if ($("#youEmail").val() === "<?php echo $existingEmail; ?>") {
                    $("#youEmailComment").text("이미 기존에 사용하던 이메일입니다.");
                    isEmailCheck = true; // 기존 이메일을 사용하므로 이메일 검사를 통과한 것으로 처리
                } else {
                    // 중복된 이메일인지 확인
                    $.ajax({
                        type: "POST",
                        url: "myPageSave.php",
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
                    });
                }
            }
        }

        function myPageChecks(){
            emailChecking(); // 이메일 검사 함수를 호출
            // 이메일 검사가 이루어 졌는지 확인
            if (!isEmailCheck) {
                alert("이메일 변경을 클릭해주세요.");
                return false;
            }
            return true;
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

    <script>
        // 저장 버튼 클릭시
        function submitForm() {
            // 주소 입력창의 값이 변경되었는지 체크
            document.getElementById('youAddress1').addEventListener('change', checkAddressChange);
            document.getElementById('youAddress2').addEventListener('change', checkAddressChange);
            document.getElementById('youAddress3').addEventListener('change', checkAddressChange);

            function checkAddressChange() {
                var oldAddress = "<?php echo $youAddress; ?>";
                var newAddress = document.getElementById('youAddress1').value + document.getElementById('youAddress2').value + document.getElementById('youAddress3').value;

                // 주소가 변경되지 않았다면 저장 버튼 활성화
                if (oldAddress === newAddress) {
                    document.getElementById('addressChangeClicked').value = 'true';
                    document.getElementById('youaddressComment').innerText = ''; // 기존 주소와 새 주소가 같으면 메시지를 지웁니다.
                }
            }

            if (myPageChecks()) {
                // 폼을 제출하고 저장이 완료되었음을 알림
                alert("정보가 성공적으로 수정되었습니다.");
                // 폼을 제출
                document.myPageSave.submit();
            }
        }

        // 취소 버튼 클릭시
        function cancleForm() {
            // 이전 페이지로 이동
            history.back();
        }
    </script>

    <script>
        // 이미지 미리보기
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }
    </script>
</body>

</html>