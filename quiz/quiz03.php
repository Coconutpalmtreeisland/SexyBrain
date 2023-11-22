<?php 
  include "../connect/connect.php";
  include "../connect/session.php";
?>


<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뇌섹남녀-boardWrite</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/quiz.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <div id="wrap">
        <?php include "../include/header.php"?>
        <!-- header -->

        <main id="main">
            <section id="quiz_section">
                <div class="quiz_wrap">
                    <div class="quiz_q_wrap quiz_class">
                        <div class="q_question">
                            <div class="question_wrap">
                                <em>Q<i id="q_em">uiz</i></em>
                                <p>다음 식에 하나의 선을 그어 참이 되도록 만들어라.
                                    (단, 등호는 바꿀 수 없다)</p>
                            </div>
                            <div class="quiz_url">19 - 18 = 18</div>
                        </div>
                    </div>
                    <div class="q_answer">
                        <label for="answer">정답 입력하기</label>
                        <input type="text">
                    </div>
                </div>
            </section>


        </main>
        <!-- main -->
        <?php include "../include/footer.php"?>
        <!-- footer -->
    </div>
</body>

</html>