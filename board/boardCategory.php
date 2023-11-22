<aside class="board__filter">
    <div class="filter__type">
        <div class="type__check">
            <label for="filter-toggle1" class="checkbox">
                <input type="checkbox" id="filter-toggle1">
                <span class="on"></span>
                <a id="link-toggle1" href="board.php">ALL</a>
            </label>

            <label for="filter-toggle2" class="checkbox">
                <input type="checkbox" id="filter-toggle2">
                <span class="on"></span>
                <a id="link-toggle2" href="boardCate.php?category=공지">공지</a>
            </label>

            <label for="filter-toggle3" class="checkbox">
                <input type="checkbox" id="filter-toggle3">
                <span class="on"></span>
                <a id="link-toggle3" href="boardCate.php?category=질문">질문</a>
            </label>

            <label for="filter-toggle4" class="checkbox">
                <input type="checkbox" id="filter-toggle4">
                <span class="on"></span>
                <a id="link-toggle4" href="boardCate.php?category=자유">자유</a>
            </label>
        </div>
        <div method="post" action="search.php">
            <legend class="blind">게시판 검색</legend>
            <input type="text" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력하세요" required>
        </div>
    </div>
</aside>

<div id="searchResults">
    <!-- 여기에 검색 결과가 표시될 것입니다. -->
</div>

<script>
    document.getElementById('searchKeyword').addEventListener('change', function (event) {
        event.preventDefault(); // 기본 폼 제출 동작 방지

        // 검색어 가져오기
        var searchKeyword = document.getElementById('searchKeyword').value;

        // 현재 페이지의 카테고리 가져오기
        var category = new URL(window.location.href).searchParams.get("category");

        // 검색어와 카테고리를 포함한 페이지로 이동
        if (category) {
            location.href = "?category=" + category + "&keyword=" + searchKeyword;
        } else {
            location.href = "?keyword=" + searchKeyword;
        }
    });

        window.onload = function() {
            var category = new URL(window.location.href).searchParams.get("category");
            if (!category) {
                // category 파라미터가 없는 경우
                var allLinkElement = document.querySelector(`a[href='boardCate.php']`);
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