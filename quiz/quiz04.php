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
                                <p>□에 들어갈 숫자는?</p>
                            </div>
                            <div class="quiz_url q_04">
                                <p>N+Q=11</p>
                                <p>H+B=14</p>
                                <p>L+T=□</p>
                            </div>
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

        <footer id="footer">
            <div class="footerwrap">
                <div class="footer__logo"><img src="../assets/img/footer_logo.png" alt="logo02"></div>
            <div class="footer2">
                <div class="footer_us">
                    <ul>
                        <li><a href="#">권초록</a></li>
                        <li><a href="#">오종석</a></li>
                        <li><a href="#">이원영</a></li>
                        <li><a href="#">이혜민</a></li>
                    </ul>
                </div>
                <div class="copylight">© 2023 뇌섹남녀</div>
            </div>
            </div>
        </footer>
        <!-- footer -->
    </div>
</body>

</html>