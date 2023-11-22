<?php
include "../connect/connect.php";
include "../connect/session.php";

if (isset($_GET['category'])) {
    $category = $_GET['category'];
} else {
    Header("Location: board.php");
}

// 한 페이지에 보여줄 게시물 수
$limit = 7;

// 현재 페이지 번호를 얻어옵니다.
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// 전체 게시물 수를 DB에서 얻어옵니다.
if ($keyword) {
    $totalBoardSql = "SELECT COUNT(*) as total FROM sexyBoard WHERE boardDelete = 1 AND boardTitle LIKE '%$keyword%'";
} else {
    $totalBoardSql = "SELECT COUNT(*) as total FROM sexyBoard WHERE boardDelete = 1";
}
$totalBoardResult = $connect->query($totalBoardSql);
$totalBoardRow = $totalBoardResult->fetch_assoc();
$totalBoard = $totalBoardRow['total'];

// 전체 페이지 수를 계산합니다.
$totalPage = ceil($totalBoard / $limit);

// 시작할 게시물의 인덱스를 계산합니다.
$start = ($page - 1) * $limit;

// DB에서 한 페이지에 보여줄 게시물만 얻어옵니다.
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : null;

if ($keyword && $category) {
    $boardSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 AND boardCategory = '$category' AND boardTitle LIKE '%$keyword%' ORDER BY boardId DESC";
} elseif ($keyword) {
    $boardSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 AND boardTitle LIKE '%$keyword%' ORDER BY boardId DESC";
} elseif ($category) {
    $boardSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 AND boardCategory = '$category' ORDER BY boardId DESC";
} else {
    $boardSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 ORDER BY boardId DESC";
}
$boardInfo = $connect->query($boardSql);

// 시작 페이지와 끝 페이지를 계산합니다.
$startPage = max($page - 2, 1);
$endPage = min($startPage + 5, $totalPage);
$startPage = max($endPage - 5, 1);


$categorySql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 AND boardCategory = '$category' ORDER BY boardId DESC";
$categoryResult = $connect->query($categorySql);
$categoryInfo = $categoryResult->fetch_array(MYSQLI_ASSOC);
$categoryCount = $categoryResult->num_rows;

$category = $_GET['category'];



?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>board 카테고리 페이지</title>
    <link rel="stylesheet" href="../assets/css/boardHome.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/reset.css">


</head>

<body>
    <div class="wrap">
        <?php include "../include/header.php" ?>
        <main id="main">
            <section class="intro__box">
                <h2>
                    뇌섹남녀 커뮤니티에서<br>
                    다양한 이야기를 나누세요
                </h2>
                <p>공지사항과 질문 외에도 자유롭게 이야기를 나눌 수 있습니다.</p>
                <a href="boardWrite.php" class="write_btn">글쓰기</a>
            </section>
            <!-- //section -->


            <section class="board__wrap">

                <div class="board__inner">

                    <?php include "boardCategory.php" ?>

                    <?php
                    if (isset($searchResult)) {
                        foreach ($searchResult as $result) {
                            ?>
                            <!-- 여기서 검색된 결과를 출력합니다 -->
                            <div>
                                <h3>
                                    <?php echo $result['boardTitle']; ?>
                                </h3>
                                <p>
                                    <?php echo $result['boardContents']; ?>
                                </p>
                                <!-- 필요한 내용 추가 -->
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <?php foreach ($boardInfo as $sexyBoard) { ?>
                    <div class="card">
                        <a href="boardView.php?boardId=<?= $sexyBoard['boardId'] ?>">
                            <ul class="card__text">
                                <li>
                                    <?= $sexyBoard['boardCategory'] ?>
                                </li>
                                <div class="board_wrap">
                                    <div class="b_w_wrap">
                                        <li>
                                            <?= $sexyBoard['boardTitle'] ?>
                                        </li>
                                        <li class="card__desc">
                                            <?= substr($sexyBoard['boardContents'], 0, 100) ?>
                                        </li>
                                    </div>
                                    <div class="b_w_wrap2">
                                        <li>
                                            <?= $sexyBoard['boardAuthor'] ?>
                                        </li>
                                        <li>
                                            <?= $sexyBoard['boardView'] ?>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </a>
                    </div>
                <?php } ?>
                <!-- //card01 -->
                <div class="board__pages">
                    <ul>
                        <li><a href="?category=<?php echo $category; ?>&page=1"> << </a></li>
                        <li><a href="?category=<?php echo $category; ?>&page=<?php echo max($page - 1, 1); ?>">&lt;</a></li>
                        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                            <li <?php if ($page == $i) echo 'class="active"'; ?>>
                                <a href="?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li><a href="?category=<?php echo $category; ?>&page=<?php echo min($page + 1, $totalPage); ?>">></a></li>
                        <li><a href="?category=<?php echo $category; ?>&page=<?php echo $totalPage; ?>">>></a></li>
                    </ul>
                </div>
                <!-- //board__pages -->
    </div>
    <!-- //board__inner -->



    </div>

    </section>
    <!-- //board__wrap -->
    </main>
    <!-- //main -->
    <?php include "../include/footer.php" ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#searchKeyword").on('keypress', function (e) {
                if (e.which === 13) {
                    let keyword = $(this).val();
                    $.ajax({
                        url: 'search.php', // 검색을 처리하는 PHP 파일의 경로
                        type: 'POST',
                        data: { keyword: keyword },
                        success: function (response) {
                            $('.board__inner').html(response);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>