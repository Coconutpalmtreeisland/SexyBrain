<?php
$currentPage = 'board';
include "../connect/connect.php";
include "../connect/session.php";


// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

$boardSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 ORDER BY boardId DESC";
$boardInfo = $connect->query($boardSql);
// 한 페이지에 보여줄 게시물 수
$limit = 7;

// 현재 페이지 번호를 얻어옵니다.
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// 전체 게시물 수를 DB에서 얻어옵니다.
$totalBoardSql = "SELECT COUNT(*) as total FROM sexyBoard WHERE boardDelete = 1";
$totalBoardResult = $connect->query($totalBoardSql);
$totalBoardRow = $totalBoardResult->fetch_assoc();
$totalBoard = $totalBoardRow['total'];

// 전체 페이지 수를 계산합니다.
$totalPage = ceil($totalBoard / $limit);

// 시작할 게시물의 인덱스를 계산합니다.
$start = ($page - 1) * $limit;

// DB에서 한 페이지에 보여줄 게시물만 얻어옵니다.
$boardSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 ORDER BY boardId DESC LIMIT $start, $limit";
$boardInfo = $connect->query($boardSql);

// 시작 페이지와 끝 페이지를 계산합니다.
$startPage = max($page - 2, 1);
$endPage = min($startPage + 5, $totalPage);
$startPage = max($endPage - 5, 1);

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 목록</title>
    <link rel="stylesheet" href="../assets/css/boardHome.css">
    <link rel="stylesheet" href="../assets/css/style.css">


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


            <div class="board__wrap">

                <div class="board__inner">
                    <?php include "boardCategory.php" ?>
                    <?php
                    if (isset($searchResult)) {
                        foreach ($searchResult as $result) {
                            ?>
                            <!-- 여기서 검색된 결과를 출력합니다 -->
                            <div>
                                <a href="boardView.php?boardId=<?= $result['boardId'] ?>">
                                    <h3>
                                        <?php echo $result['boardTitle']; ?>
                                    </h3>
                                    <p>
                                        <?php echo $result['boardContents']; ?>
                                    </p>
                                </a>
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
                        <li><a href="?page=1">
                                << </a>
                        </li>
                        <li><a href="?page=<?php echo max($page - 1, 1); ?>">&lt;</a></li>
                        <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                            <li <?php if ($page == $i)
                                echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a></li>
                        <?php endfor; ?>
                        <li><a href="?page=<?php echo min($page + 1, $totalPage); ?>">></a></li>
                        <li><a href="?page=<?php echo $totalPage; ?>">>></a></li>
                    </ul>
                </div>
                <!-- //board__pages -->
            </div>
            <!-- //board__inner -->



    </div>

    </div>
    <!-- //board__wrap -->
    </main>
    <!-- //main -->
    <?php include "../include/footer.php" ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // 페이지가 로드될 때 이전 검색어를 가져옵니다.
            var prevKeyword = localStorage.getItem('prevKeyword');

            // 이전 검색어가 있으면 검색을 수행합니다.
            if (prevKeyword) {
                $("#searchKeyword").val(prevKeyword);
                $("#searchKeyword").trigger('input');
            }

            $("#searchKeyword").on("input", function () {
                var keyword = $(this).val();

                // 검색어를 로컬 스토리지에 저장합니다.
                localStorage.setItem('prevKeyword', keyword);

                // AJAX 요청
                $.ajax({
                    url: 'search.php',
                    type: 'POST',
                    data: { keyword: keyword },
                    success: function (data) {
                        // 검색 결과를 웹 페이지에 표시
                        $("#searchResults").html(data);
                    }
                });
            });
        });


        document.getElementById('searchKeyword').addEventListener('change', function (event) {
            event.preventDefault(); // 기본 폼 제출 동작 방지

            // 검색어 가져오기
            var searchKeyword = document.getElementById('searchKeyword').value

            // fetch를 이용한 비동기적 검색 요청
            fetch('search.php', {
                method: 'POST',
                body: new URLSearchParams({ searchKeyword })
            })
                .then(function (response) {
                    return response.text();
                })
                .then(function (data) {
                    // 검색 결과를 searchResults 요소에 추가
                    document.getElementById('searchResults').innerHTML = data;
                })
                .catch(function (error) {
                    console.log('검색 요청에 실패했습니다', error);
                });
        });


    window.onload = function() {
        var category = new URL(window.location.href).searchParams.get("category");
        if (!category) {
            // category 파라미터가 없는 경우
            var allLinkElement = document.querySelector(`a[href='board.php']`);
            if (allLinkElement) {
                var parentLabel = allLinkElement.parentElement;
                var onElement = parentLabel.querySelector('.on');
                if (onElement) {
                    onElement.classList.add("change");
                }
            }
        } else {
            // category 파라미터가 있는 경우
            var linkElements = document.querySelectorAll(`a[href='boardCate.php?category=${category}']`);
            linkElements.forEach(function(linkElement) {
                var parentLabel = linkElement.parentElement;
                var onElement = parentLabel.querySelector('.on');
                if (onElement) {
                    onElement.classList.add("change");
                }
            });
        }
    };


    </script>

    <!-- 검색 결과를 표시할 요소를 추가합니다 -->
    <!-- <div id="searchResults"></div> -->

    
</body>

</html>

</body>

</html>