<header id="header">
    <nav class="nav">
        <ul class="down_nav">
        <li <?php if ($currentPage === 'home') echo 'class="active"'; ?>><a href="../home/main.php">홈</a></li>
        <li <?php if ($currentPage === 'quiz') echo 'class="active"'; ?>><a href="../quiz/quizHome.php">문제</a></li>
        <li <?php if ($currentPage === 'board') echo 'class="active"'; ?>><a href="../board/board.php">커뮤니티</a></li>
        </ul>
    </nav>
    <h2 class="logo">
        <a href="../home/main.php"><img src="../assets/img/logo.png" alt="logo"></a>
    </h2>
        <div class="loginnav">
            <?php if (isset($_SESSION['memberId'])) { ?>
            <ul class="welcome">
                <li><a href="../mypage/mypage.php" class="name_btn"><?= $_SESSION['youName'] ?>님👋</a></li>
                <li><a class="login__btn" href="../join/logout.php">로그아웃</a></li>
                <!-- <li><a href="#"><a class="propile" href="#">뇌섹</a></a></li> -->
            </ul>
        <?php } else { ?>
            <ul>
                <li><a href="../join/login.php">로그인</a></li>
                <li><a class="login__btn" href="../join/joinInsert.php">회원가입</a></li>
            </ul>
            <?php } ?>
        </div>
</header>
<!-- //header -->

