<?php
include "../connect/connect.php";
include "../connect/session.php";

if (isset($_SESSION['memberId'])) {
    $memberId = $_SESSION['memberId']; 
    $cate = isset($_GET['cate']) ? $_GET['cate'] : null; 

    $solvedQuizSql = "SELECT quizId FROM quizMember WHERE memberId = $memberId AND isSolved = 1";
    $solvedQuizResult = $connect->query($solvedQuizSql);

    $solvedQuizIds = array();
    while ($row = $solvedQuizResult->fetch_assoc()) {
        $solvedQuizIds[] = $row['quizId'];
    }
    $quizSql = "SELECT * FROM quiz";
    if (!empty($solvedQuizIds)) {
        $quizSql .= " WHERE quizId NOT IN (" . implode(',', $solvedQuizIds) . ")";
    }
   
    if ($cate !== null) {
        $quizSql .= (empty($solvedQuizIds) ? " WHERE" : " AND") . " cate = '$cate'";
    }
    $quizSql .= " ORDER BY quizId DESC";

    $quizResult = $connect->query($quizSql);
    if ($quizResult === false) {
        echo "SQL 오류: " . $connect->error;
        exit;
    }
    
while ($quiz = $quizResult->fetch_assoc()) {
    echo '<div class="card">';
    echo '<a href="quiz.php?quizId=' . $quiz['quizId'] . '">';
    echo '<ul class="card__text">';
    echo '<li>' . $quiz['cate'] . '</li>';
    echo '<li>' . substr($quiz['question1'], 0, 100) . '</li>';
    echo '<div class="cardtext_wrap">';                                
    echo '<li>' . $quiz['quizId'] . '</li>';
    echo '<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" fill="#4a83cf" viewBox="0 0 24 24">
        <path d="M11.785,20.377c-0.251,0-0.503-0.096-0.695-0.288l-6.675-6.676c-1.198-1.198-1.758-2.914-1.497-4.591
    c0.266-1.707,1.33-3.156,2.92-3.976c1.924-0.994,4.285-0.646,5.947,0.857c1.662-1.501,4.022-1.851,5.947-0.857
    c1.59,0.82,2.654,2.269,2.92,3.976c0.261,1.677-0.298,3.393-1.497,4.591l-6.676,6.676C12.289,20.281,12.037,20.377,11.785,20.377z
    M8.141,5.297c-0.638,0-1.271,0.143-1.844,0.439c-1.302,0.672-2.173,1.854-2.39,3.241c-0.212,1.362,0.242,2.756,1.215,3.729
    l6.675,6.676l6.651-6.676c0.973-0.973,1.428-2.368,1.215-3.729c-0.216-1.388-1.087-2.569-2.39-3.241
    c-1.588-0.819-3.63-0.469-4.968,0.852l0,0c-0.287,0.284-0.755,0.284-1.042,0C10.41,5.744,9.269,5.297,8.141,5.297z" />
    </svg>' . $quiz['likes'] . '
</li>';
echo '</div>';
echo '</ul>';
echo '</a>';
echo '</div>';
}
}