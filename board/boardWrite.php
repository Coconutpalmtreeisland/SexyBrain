<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뇌섹남녀-boardWrite</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/board.css">
</head>

<body>
    <div id="wrap">
    <?php include "../include/header.php" ?>

        <!-- header -->

        <main id="main">
            <div id="b_write_wrap" class="b_w">
                <div class="write_board"></div>
                <form action="boardWriteSave.php" name="boardWriteSave" method="post" enctype="multipart/form-data" class="board_write b_p">
                    <fieldset>
                        <legend class="blind">글 작성하기</legend>
                        <div>
                            <label for="boardCategory" class="blind">카테고리</label>
                            <select name="boardCategory" id="boardCategory" class="select" onchange="checkCategory(this)">
                                <option value="자유">자유게시판</option>
                                <option value="질문">질문</option>
                                <option value="공지">공지사항</option>
                            </select>
                        </div>
                        <div>
                            <label id="b_title" for="title" class="label_text">제목 <span class="red_t">*</span></label>
                            <input type="text" id="boardTitle" name="boardTitle" class="input__style"  placeholder="제목을 입력해주세요">
                            
                        </div>
                        <div id="weite_box2">
                            <label id="boardContents_w" for="boardContents" class="label_text">내용 작성하기</label>
                            <textarea name="boardContents" id="boardContents" rows="20" class="input__style"></textarea>
                        </div>
                        <div>
                            <label for="boardFile" class="blind file">파일</label>
                            <input type="file" id="boardFile" name="boardFile">
                            
                            <p>* jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘길 수 없습니다.</p>
                        </div>
                        <div class="board__btns">
                            <button type="submit" class="btn__style3">저장하기</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </main>
        <!-- main -->

        <?php include "../include/footer.php" ?>
        <!-- footer -->
    </div>

    <script>
    ClassicEditor
        .create(document.querySelector('#boardContents'), {
            language: 'ko' 
        })
        .catch(error => {
            console.error(error);
        });
    </script>

    <script>
    function checkCategory(select) {
        var youId = '<?php echo $_SESSION['youId']; ?>';  // PHP 세션에서 youId 값을 가져옵니다.
        if (select.value === '공지' && youId !== 'myadmin') {
            alert('관리자만 공지사항을 작성할 수 있습니다.');
            select.value = '자유';  // 카테고리를 '자유'로 변경합니다.
        }
    }
    </script>
</body>

</html>