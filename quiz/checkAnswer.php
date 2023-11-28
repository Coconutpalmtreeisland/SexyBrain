<?php
include "../connect/connect.php";
include "../connect/session.php";

$quizId = $_POST['quizId'];
$userAnswer = strtolower(trim($_POST['answer'])); 
$clearTime = $_POST['timeLimit'];

$quizSql = "SELECT * FROM quiz WHERE quizId = '$quizId'";
$quizResult = $connect->query($quizSql);
$quizInfo = $quizResult->fetch_array(MYSQLI_ASSOC);

$correctAnswer = strtolower(trim($quizInfo['answer'])); 
$isCorrect = $userAnswer == $correctAnswer; 

if ($isCorrect) {
    $memberId = $_SESSION['memberId']; 

    $prevTimeSql = "SELECT clearTime FROM quizMember WHERE memberId = '$memberId' AND quizId = '$quizId'";
    $prevTimeResult = $connect->query($prevTimeSql);
    $prevTimeInfo = $prevTimeResult->fetch_array(MYSQLI_ASSOC);
    $prevClearTime = $prevTimeInfo['clearTime'];

    $insertOrUpdateSql = "
INSERT INTO quizMember (memberId, quizId, isSolved, clearTime) 
VALUES ('$memberId', '$quizId', 1, '$clearTime') 
ON DUPLICATE KEY 
    UPDATE 
        isSolved = VALUES(isSolved), 
        clearTime = VALUES(clearTime)
";
$connect->query($insertOrUpdateSql);

if ($connect->error) {
    echo json_encode(array("error" => "Query error: " . $connect->error));
    exit;
}
}

$response = array(
    'correct' => $isCorrect,
    'answer' => $quizInfo['answer'],
    'hint' => $quizInfo['hint']
);

echo json_encode($response);
?>