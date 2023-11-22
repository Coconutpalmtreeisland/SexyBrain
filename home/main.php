<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $currentPage = 'home';
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뇌섹남녀</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/mainscript.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

    </style>
</head>

<body>
    <div id="wrap">
    <?php include "../include/header.php" ?>
        <!-- header -->

        <main id="main">
            <section id="section01">

                <article class="sayingWrap mt20">
                    <p class="button_light mt30">뇌가 섹시한 사람들은 모두 뇌섹남녀의 문제를 풀고 있습니다!</p>
                    <h2 class="saying mt30">
                        You will face many defeats in life,<br>
                        but never let yourself be defeated.
                    </h2>
                    <p class="n_text mt30">TV 프로그램에서 봤던 문제를 뇌섹남녀에서 직접 풀 수 있습니다.</p>
                    <a href="../quiz/quizHome.php" class="button_bold mt50 mb50">문제 풀어보기</a>
                </article>
                <!-- article -->

                <div class="slider">
                    <div class="slide-track">
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s1.jpg" alt=""
                                    class="slider__img" />
                                <div class="desc">
                                    <p class="title">수학문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">수학</span>
                                        <span class="tag">계산</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s2.jpg" alt=""
                                    class="slider__img" />
                                <div class="desc">
                                    <p class="title">창의력문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">창의력</span>
                                        <span class="tag">생각</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s3.jpg" alt=""
                                    class="slider__img" />
                                <div class="desc">
                                    <p class="title">추리문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">추리</span>
                                        <span class="tag">범인</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s4.jpg" alt=""
                                    class="slider__img" />
                                <div class="desc">
                                    <p class="title">미로찾기</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">미로</span>
                                        <span class="tag">탈출</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s5.jpg" alt=""
                                    class="slider__img" />
                                <div class="desc">
                                    <p class="title">수학문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">수학</span>
                                        <span class="tag">계산</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s6.jpg" alt=""
                                    class="slider__img" />
                                    <div class="desc">
                                    <p class="title">창의력문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">창의력</span>
                                        <span class="tag">생각</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s7.jpg" alt=""
                                    class="slider__img" />
                                    <div class="desc">
                                    <p class="title">추리문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">추리</span>
                                        <span class="tag">범인</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s1.jpg" alt=""
                                    class="slider__img" />
                                    <div class="desc">
                                    <p class="title">미로찾기</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">미로</span>
                                        <span class="tag">탈출</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s2.jpg" alt=""
                                    class="slider__img" />
                                <div class="desc">
                                    <p class="title">수학문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">수학</span>
                                        <span class="tag">계산</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slide">
                            <a href="../quiz/quizCate.php?category=수학"><img src="../assets/img/s3.jpg" alt=""
                                    class="slider__img" />
                                    <div class="desc">
                                    <p class="title">창의력문제</p>
                                    <p class="ques">25문제</p>
                                    <div>
                                        <span class="tag">창의력</span>
                                        <span class="tag">생각</span>
                                        <span class="tag">문제적남자</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- slider -->

                <article class="banner">
                    <article class="bannerWrap">
                        <h3>문제적 남자</h3>
                        <article class="banner-1">
                            <div class="n_text2">
                                <p>질문의 시대, 어나더 레벨을 보여줄 천재를 찾아 일상 속으로 나선
                                    연예계 대표 브레인 유랑단! 세상에 없던 신개념 문제들을 풀며
                                    펼쳐지는 대한민국 유일무이 두뇌자극 뇌섹 대결!
                                </p>
                            </div>
                            <a href="../quiz/quizHome.php" class="button_bold">문제 풀어보기</a>
                        </article>
                    </article>
                </article>
                <!-- banner -->

            </section>
            <!-- section01 -->

<section id="section02" data-bgcolor="#222">
    <section id="section1" class="parallax__item">
        <span class="parallax__item__num reveal reveal_LTR">미로</span>
        <figure class="parallax__item__imgWrap reveal">
            <div class="parallax__item__img"></div>
        </figure>
        <p class="parallax__item__desc split" data-delay="0.5">복잡한 미로를 최단 루트로 탈출하세요!</p>
    </section>
    <!-- //section1 -->

    <section id="section2" class="parallax__item">
        <span class="parallax__item__num reveal">추리</span>
        <figure class="parallax__item__imgWrap reveal reveal_LTR">
            <div class="parallax__item__img"></div>
        </figure>
        <p class="parallax__item__desc split" data-delay="0.5">주어진 단서들로 범인을 찾아보세요!</p>
    </section>
    <!-- //section2 -->

    <section id="section3" class="parallax__item">
        <span class="parallax__item__num reveal reveal_LTR">창의력</span>
        <figure class="parallax__item__imgWrap reveal">
            <div class="parallax__item__img "></div>
        </figure>
        <p class="parallax__item__desc split" data-delay="0.5">번뜩이는 생각으로 해결 방법을 찾아 풀어보세요!</p>
    </section>
    <!-- //section3 -->

    <section id="section4" class="parallax__item">
        <span class="parallax__item__num reveal">수학</span>
        <figure class="parallax__item__imgWrap reveal reveal_LTR">
            <div class="parallax__item__img" ></div>
        </figure>
        <p class="parallax__item__desc split" data-delay="0.5">수포자도 풀 수 있는 수학 퀴즈</p>
    </section>
        <!-- //section4 -->
    <!-- <article id="images">
    <div class="imagesWrap i1">
    <p class="img_text it1">복잡한 미로를 최단 루트로 탈출하세요!</p>
</div>
<div class="imagesWrap i2">
    <p class="img_text it2">조각을 맞춰 그림을 완성하세요! </p>
</div>
<div class="imagesWrap i3">
    <p class="img_text it3">주어진 글자를 조합해 단어를 찾으세요!</p>
</div>
<div class="imagesWrap i4">
    <p class="img_text it4">수포자도 풀 수 있는 수학 퀴즈</p>
</div>
    </article> -->
</section>
            <!-- section02 -->

            <section id="section03">

                <section class="wrapper">

                    <div class="container">

                        <div id="scene" class="scene" data-hover-only="false">

                            <div class="circle" data-depth="1.2"></div>

                            <div class="one" data-depth="0.9">
                                <div class="content">
                                    <span class="piece">HTML</span>
                                    <span class="piece">HTML</span>
                                    <span class="piece">HTML</span>
                                </div>
                            </div>

                            <div class="two" data-depth="0.60">
                                <div class="content">
                                    <span class="piece">CSS</span>
                                    <span class="piece">CSS</span>
                                    <span class="piece">CSS</span>
                                </div>
                            </div>

                            <div class="three" data-depth="0.40">
                                <div class="content">
                                    <span class="piece">JS</span>
                                    <span class="piece">JS</span>
                                    <span class="piece">JS</span>
                                </div>
                            </div>

                            <p class="p404" data-depth="0.50">About</p>
                            <p class="p404" data-depth="0.10">About</p>

                        </div>

                        <div class="text">
                            <article>
                                <p>사용한 기술</p>
                                <!-- <button>i dare!</button> -->
                            </article>
                        </div>

                    </div>
                </section>
            </section>
            <!-- section03 -->

        </main>
        <!-- main -->

       <?php include "../include/footer.php" ?>
       <!-- footer -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1/bundled/lenis.min.js"></script>
    <script>
        
        const lenis = new Lenis({
            duration: 2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
        });

        lenis.on('scroll', (e) => {
            console.log(e)
        })

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }

        requestAnimationFrame(raf)

        // lenis

        // gsap
        const hide = (item) => {
            gsap.set(item, {autoAlpha: 0});
        }

        const animate = (item) => {
            let x = 0;
            let y = 0;
            let delay = item.dataset.delay;

            if(item.classList.contains("reveal_LTR")){
                x = -100,
                y = 0
            } else if(item.classList.contains("reveal_BTT")){
                x = 0,
                y = 100
            } else if(item.classList.contains("reveal_TTB")){
                x = 0,
                y = -100
            }  else {
                x = 100,
                y = 0
            }

            gsap.fromTo(item, 
                {autoAlpha: 0, x: x, y: y}, 
                {autoAlpha: 1, x: 0, y: 0, delay: delay, duration: 1.25, overWrite: "auto", ease: "sine"})
        }
        gsap.utils.toArray(".reveal").forEach(item => {
            hide(item);

            ScrollTrigger.create({
                trigger: item,
                start: "40% bottom",
                end: "bottom top",
                onEnter: () => {animate(item)}
            });
        });
        document.querySelectorAll(".split").forEach(text => {
            let theText = text.innerText;
            let newText = "";

            for(i=0; i<text.innerText.length; i++){
                newText += "<span aria-hidden='true'>"
                
                if(text.innerText[i] == " "){
                    newText += "&nbsp";
                } else {
                    newText += text.innerText[i];
                }

                newText += "</span>"
            }
            text.innerHTML = newText;
            text.setAttribute("arial-label", theText);
        });
        gsap.utils.toArray(".split").forEach(text => {
            gsap.from(text.querySelectorAll("span"), {
                yPercent: 100,
                autoAlpha: 0,
                duration: 1,
                ease: "circ.out",
                stagger: {
                    amount: 1,
                    from: "random"
                },
                scrollTrigger: {
                    trigger: text,
                    start: "top bottom",
                    end: "+400",
                    markers: false
                }
            })
            
        });
       
    </script>
</body>

</html>