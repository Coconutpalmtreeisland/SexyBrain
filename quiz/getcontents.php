<?php 
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    if ($category === 'math') {
        $content = '
            <div class="math">
                <div class="c01">
                    <div class="heart">
                        <a href="#"><i class="ion-heart"></i></a>
                    </div>
                    <a href="#" class="go" title="콘텐츠 바로가기"></a>
                    <img src="../assets/img/quiz02.jpg">
                </div>
            </div>';
        
        echo $content; 
    } else if ($category === 'reasoning'){
        $content = '
            <div class="reasoning">
                <div class="c01">
                    <div class="heart">
                        <a href="#"><i class="ion-heart"></i></a>
                    </div>
                    <a href="#" class="go" title="콘텐츠 바로가기"></a>
                    <img src="../assets/img/quiz02.jpg">
                </div>
            </div>';

        echo $content;
    } else if ($category === 'creativity'){
        $content = '
            <div class="creativity">
                <div class="c01">
                    <div class="heart">
                        <a href="#"><i class="ion-heart"></i></a>
                    </div>
                    <a href="#" class="go" title="콘텐츠 바로가기"></a>
                    <img src="../assets/img/quiz02.jpg">
                </div>
            </div>';

        echo $content;
    } else if ($category === 'matchstick'){
        $content = '
            <div class="matchstick">
                <div class="c01">
                    <div class="heart">
                        <a href="#"><i class="ion-heart"></i></a>
                    </div>
                    <a href="#" class="go" title="콘텐츠 바로가기"></a>
                    <img src="../assets/img/quiz02.jpg">
                </div>
            </div>';

        echo $content;
    } else if ($category === 'etc'){
        $content = '
            <div class="etc">
                <div class="c01">
                    <div class="heart">
                        <a href="#"><i class="ion-heart"></i></a>
                    </div>
                    <a href="#" class="go" title="콘텐츠 바로가기"></a>
                    <img src="../assets/img/quiz02.jpg">
                </div>
            </div>';

        echo $content;
    }
}

?>


 <!--                   <div class="math">
                            <div class="c01">

                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                            <div class="c02">

                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                            <div class="c03">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                            <div class="c04">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                            <div class="c05">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                            <div class="c06">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                            <div class="c07">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                            <div class="c08">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz02.jpg">
                            </div>
                        </div>

                        <div class="reasoning">
                            <div class="c01">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                            <div class="c02">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                            <div class="c03">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                            <div class="c04">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                            <div class="c05">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                            <div class="c06">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                            <div class="c07">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                            <div class="c08">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz03.jpg">
                            </div>
                        </div>


                        <div class="matchstick">
                            <div class="c01">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                            <div class="c02">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                            <div class="c03">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                            <div class="c04">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                            <div class="c05">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                            <div class="c06">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                            <div class="c07">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                            <div class="c08">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz04.jpg">
                            </div>
                        </div>


                        <div class="etc">
                            <div class="c01">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>
                            <div class="c02">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>
                            <div class="c03">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>
                            <div class="c04">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>
                            <div class="c05">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>
                            <div class="c06">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>
                            <div class="c07">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>
                            <div class="c08">
                                <div class="heart">
                                    <a href="#"> <i class="ion-heart"></i></a>
                                </div>
                                <a href="#" class="go" title="콘텐츠 바로가기"></a>
                                <img src="../assets/img/quiz01.jpg">
                            </div>

                        </div> -->
                        <!-- etc --> 


                        
