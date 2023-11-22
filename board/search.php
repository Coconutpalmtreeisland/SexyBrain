<?php
include "../connect/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $searchKeyword = $_GET['keyword'];

    $searchSql = "SELECT * FROM sexyBoard WHERE boardDelete = 1 AND (boardTitle LIKE '%$searchKeyword%' OR boardContents LIKE '%$searchKeyword%') ORDER BY boardId DESC";
    $searchResult = $connect->query($searchSql);

    if ($searchResult->num_rows > 0) {
        while ($row = $searchResult->fetch_assoc()) {
            echo '<div class="card">
                    <a href="boardView.php?boardId=' . $row['boardId'] . '">
                        <ul class="card__text">
                            <li>' . $row['boardCategory'] . '</li>
                            <div class="board_wrap">
                                <div class="b_w_wrap">
                                    <li>' . $row['boardTitle'] . '</li>
                                    <li class="card__desc">' . substr($row['boardContents'], 0, 100) . '</li>
                                </div>
                                <div class="b_w_wrap2">
                                    <li>' . $row['boardAuthor'] . '</li>
                                    <li>' . $row['boardView'] . '</li>
                                </div>
                            </div>
                        </ul>
                    </a>
                  </div>';
        }
    } else {
        echo "검색 결과가 없습니다.";
    }
}
?>