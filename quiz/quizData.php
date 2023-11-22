<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $data = array();


    if ($category === 'math') {
        $mathData = array(
            array(
                "img_url" => "../assets/img/quiz04.jpg",
                "php_url" => "./quiz03.php"
            ),
            array(
                "img_url" => "../assets/img/quiz04.jpg",
                "php_url" => "./quiz03.php"
            )
        );
        $data['math'] = $mathData;
    } else if ($category === 'reasoning'){
        $reasoningData = array(
            array(
                "img_url" => "../assets/img/quiz01.jpg",
                "php_url" => "./quiz03.php"
            ),
            array(
                "img_url" => "../assets/img/quiz01.jpg",
                "php_url" => "./quiz03.php"
            )
        );
        $data['reasoning'] = $reasoningData;

    } else if ($category === 'creativity'){
        $creativityData = array(
            array(
                "img_url" => "../assets/img/quiz03.jpg",
                "php_url" => "./quiz03.php"
            ),
            array(
                "img_url" => "../assets/img/quiz03.jpg",
                "php_url" => "./quiz03.php"
            )
            );
        $data['creativity'] = $creativityData;
    } else if ($category === 'matchstick'){
        $matchstickData = array(
            array(
                "img_url" => "../assets/img/quiz01.jpg",
                "php_url" => "./quiz03.php"
            ),
            array(
                "img_url" => "../assets/img/quiz01.jpg",
                "php_url" => "./quiz03.php"
            )
        );
        $data['matchstick'] = $matchstickData;
    } else if ($category === 'etc'){
        $etcData = array(
        array(
            "img_url" => "../assets/img/quiz02.jpg",
            "php_url" => "./quiz03.php"
        ),
        array(
            "img_url" => "../assets/img/quiz02.jpg",
            "php_url" => "./quiz03.php"
        )
        );
        $data['etc'] = $etcData;
    }

    echo json_encode($data);
}
?>

