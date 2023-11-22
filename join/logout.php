<?php
session_start();
session_destroy();
header('Location: ../home/main.php'); // 로그아웃 후 이동할 페이지
?>