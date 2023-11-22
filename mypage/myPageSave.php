<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $type = $_POST['type'];
    $jsonResult = "bad";

    if( $type == "isEmailCheck"){
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
        $sql = "SELECT youEmail FROM sexyMembers WHERE youEmail = '{$youEmail}'";
        $result = $connect -> query($sql);
        if($result -> num_rows == 0){
            $jsonResult = "good";
        }
        echo json_encode(array("result" => $jsonResult));
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $youId = $_SESSION['youId'];
        $youEmail = $_POST['youEmail'];
        $youAddress = $_POST['youAddress'];

        // 기존 이메일, 이미지, 주소 가져오기
        $sql = "SELECT youEmail, youImgSrc, youAddress FROM sexyMembers WHERE youId='$youId'";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();
        $existingEmail = $row['youEmail'];
        $youImgSrc = $row['youImgSrc'];

        // 주소 입력값 가져오기
        $youAddress1 = $_POST['youAddress1'];
        $youAddress2 = $_POST['youAddress2'];
        $youAddress3 = $_POST['youAddress3'];

        // 주소를 '*' 기호로 합치기
        $newAddress = $youAddress1 . '*' . $youAddress2 . '*' . $youAddress3;

        // 주소가 변경되었는지 확인
        $isAddressChanged = ($row['youAddress'] !== $newAddress);

        // 이메일 입력값이 빈 문자열인 경우 기존 이메일을 유지
        if ($youEmail === "") {
            $youEmail = $existingEmail;
        }

        if ($existingEmail !== $youEmail) {
            $sql = "UPDATE sexyMembers SET youEmail='$youEmail' WHERE youId='$youId'";
            $result = $connect->query($sql);
        }

        $isAddressChangeClicked = $_POST['addressChangeClicked'] === 'true';

        if ($isAddressChangeClicked) {
            if ($isAddressChanged) {
                $sql = "UPDATE sexyMembers SET youAddress='$newAddress' WHERE youId='$youId'";
                $result = $connect->query($sql);
            }
        } else {
            // 주소 변경 버튼을 클릭하지 않았지만 주소가 변경되지 않았을 경우 바로 저장
            $sql = "UPDATE sexyMembers SET youEmail='$youEmail', youImgSrc='$youImgName' WHERE youId='$youId'";
            $result = $connect -> query($sql);
        }

        if ($result) {
            // 이미지 업로드 로직
            if(isset($_FILES['youImgSrc']) && $_FILES['youImgSrc']['size'] > 0){
                $youImgSrc = $_FILES['youImgSrc'];
                $youImgSize = $_FILES['youImgSrc']['size'];
                $youImgType = $_FILES['youImgSrc']['type'];
                $youImgName = $_FILES['youImgSrc']['name'];
                $youImgTmp = $_FILES['youImgSrc']['tmp_name'];

                if($youImgSize > 10000000){
                    echo "<script>alert('이미지 파일 용량이 1MB를 초과했습니다. 사이즈를 줄여주세요.')</script>";
                    exit;
                }
            
                if($youImgType){
                    $fileTypeExtension = explode("/", $youImgType);
                    $fileType = $fileTypeExtension[0];  // image
                    $fileExtension = $fileTypeExtension[1];  // jpeg
            
                    // 이미지 타입 확인
                    if($fileType === "image"){
                        if($fileExtension === "jpg" || $fileExtension === "jpeg" || $fileExtension === "png" || $fileExtension === "gif" || $fileExtension === "webp"){
                            $youImgDir = "../assets/profile/";
                            $youImgName = "Img_".time().rand(1, 99999)."."."{$fileExtension}";
                            $youImgSrc = $youImgDir . $youImgName;
                            // 파일 업로드가 성공적으로 완료되면, 이메일과 새로운 이미지 파일 이름으로 업데이트
                            if(move_uploaded_file($youImgTmp, $youImgSrc)){
                                $sql = "UPDATE sexyMembers SET youEmail='$youEmail', youImgSrc='$youImgName' WHERE youId='$youId'";
                                $result = $connect -> query($sql);

                                if (!$result) {
                                    // 쿼리 실패: 에러 메시지 출력
                                    echo "Query failed: " . mysqli_error($connect);
                                    exit;
                                }
                            } else {
                                // 업로드 실패: 에러 메시지 출력
                                echo "Upload failed: " . $_FILES['youImgSrc']['error'];
                                exit;
                            }
                        } else {
                            echo "<script>alert('이미지 파일 형식이 아닙니다.')</script>";
                            exit;
                        }
                    } else {
                        echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                        exit;
                    }
                // } else {
                //     // 이메일, 주소 업데이트, 사용자가 이미지를 업로드하지 않았으므로, 기존의 이미지 파일 이름으로 유지
                //     $sql = "UPDATE sexyMembers SET youEmail='$youEmail', youImgSrc='$youImgSrc' WHERE youId='$youId'";
                //     $result = $connect->query($sql);
                }
            }

            // 사용자가 이미지를 업로드하지 않았으므로, 기존의 이미지 파일 이름으로 유지
            if(!isset($_FILES['youImgSrc']) || $_FILES['youImgSrc']['size'] <= 0){
                $youImgSrc = $row['youImgSrc'];
                $sql = "UPDATE sexyMembers SET youEmail='$youEmail', youImgSrc='$youImgSrc' WHERE youId='$youId'";
                $result = $connect->query($sql);
            }
        }
    }
    header("Location: mypage.php");
    exit;
?>