<?php
include "../connect/connect.php";

// 퀴즈 정보를 받아옵니다. 이 정보는 폼에서 POST 방식으로 전송되어야 합니다.
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$answer = $_POST['answer'];
$hint = $_POST['hint'];
$cate = $_POST['cate'];
$timeLimit = $_POST['timeLimit'];

// 이미지 파일을 업로드합니다.
if ($_FILES['question3']['error'] == 0) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["question3"]["name"]);

    if (move_uploaded_file($_FILES["question3"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["question3"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    $target_file = null;
}

if ($_FILES['descImg']['error'] == 0) {
    $target_dir = "img/";
    $target_file_desc = $target_dir . basename($_FILES["descImg"]["name"]);

    if (move_uploaded_file($_FILES["descImg"]["tmp_name"], $target_file_desc)) {
        echo "The file " . basename($_FILES["descImg"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    $target_file_desc = null;
}

// SQL 쿼리를 준비합니다.
$sql = "
INSERT INTO quiz (question1, question2, question3, answer, descImg, hint, cate, timeLimit)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)
";

// 쿼리를 준비합니다.
$stmt = $connect->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: (" . $connect->errno . ") " . $connect->error);
}

// 파라미터를 바인드합니다.
$stmt->bind_param("sssssssi", $question1, $question2, $target_file, $answer, $target_file_desc, $hint, $cate, $timeLimit);

// 쿼리를 실행합니다.
if ($stmt->execute()) {
    echo "퀴즈가 성공적으로 추가되었습니다.";
} else {
    echo "퀴즈 추가에 실패하였습니다: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->close();
$connect->close();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="quizWrite.php" method="POST" enctype="multipart/form-data">
        <label for="question1">질문1:</label>
        <textarea name="question1" id="question1"></textarea> <br>

        <label for="question2">질문2:</label>
        <textarea name="question2" id="question2"></textarea> <br>

        <label for="question3">질문3(이미지):</label>
        <input type="file" name="question3" id="question3"> <br>

        <label for="answer">정답:</label>
        <input type="text" name="answer" id="answer"> <br>

        <label for="descImg">해설(이미지):</label>
        <input type="file" name="descImg" id="descImg"> <br>

        <label for="hint">힌트:</label>
        <input type="text" name="hint" id="hint"> <br>

        <label for="cate">카테고리:</label>
        <input type="text" name="cate" id="cate"> <br>

        <label for="timeLimit">시간 제한:</label>
        <input type="number" name="timeLimit" id="timeLimit"><br>

        <input type="submit" value="저장">
    </form>
</body>

</html>