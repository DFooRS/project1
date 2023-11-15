<?php include("path.php");?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Project1</title>
    <script src="https://kit.fontawesome.com/6205916143.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <!-- GoogleFonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
  </head>

  <body>
    <!-- Навигация -->
    <?php include("app/include/navbar.php");?>
    <!-- Основа -->
    <section class="main">
        <div class="container">
            <div class="content row">
                <div class="sidebar col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="section search">
                        <form action="index.html" method="post">
                            <input type="text" name="search-tern" class="text-input" placeholder="Поиск...">
                        </form>
                    </div>
                    <div class="section panel-group d-xl-none d-lg-none d-md-none" data-bs-toggle="collapse" href="#collapse1">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h5 class="panel-title">
                              <a>Разделы<i class="fa-sharp fa-solid fa-caret-down"></i></a>
                            </h5>
                          </div>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse topics">
                            <ul>
                                <li><a href="#">Обзор автомобиля</a></li>
                                <li><a href="#">Опыт эксплуатации</a></li>
                                <li><a href="#">Отечественные автомобили</a></li>
                                <li><a href="#">Европейские автомобили</a></li>
                                <li><a href="#">Японские автомобили</a></li>
                                <li><a href="#">Американские автомобили</a></li>
                                <li><a href="#">Корейские автомобили</a></li>
                                <li><a href="#">Прочие автомобили</a></li>
                                <li><a href="#">Китайские автомобили</a></li>
                                <li><a href="#">История</a></li>
                                <li><a href="#">Гоночные соревнования</a></li>
                                <li><a href="#">Новости</a></li>
                                <li><a href="#">Благотворительность</a></li>
                            </ul>
                        </div>
                    </div>
                      
                    <div class="section topics d-none d-xl-block d-lg-block d-md-block">
                        <h5>Разделы</h5>
                        <ul>
                            <li><a href="#">Обзор автомобиля</a></li>
                            <li><a href="#">Опыт эксплуатации</a></li>
                            <li><a href="#">Отечественные автомобили</a></li>
                            <li><a href="#">Европейские автомобили</a></li>
                            <li><a href="#">Японские автомобили</a></li>
                            <li><a href="#">Американские автомобили</a></li>
                            <li><a href="#">Корейские автомобили</a></li>
                            <li><a href="#">Прочие автомобили</a></li>
                            <li><a href="#">Китайские автомобили</a></li>
                            <li><a href="#">История</a></li>
                            <li><a href="#">Гоночные соревнования</a></li>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">Благотворительность</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container single_post col-xxl-9 col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <h1 class="text-uppercase">Почему не вышел новый электрический Jaguar XJ и J-Pace</h1>
                    <div class="info">
                        <i class="fa-solid fa-user">Имя автора</i>
                        <time>02.11.2023</time>
                    </div>
                    <div class="col-12">
                        <img src="assets/img/jaguar.jpeg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            
            <article class="single_post row">
                <div class="single_post-text col-12">
                    <h2>Представительский седан Jaguar XJ, как известно, 
                        отправлен в отставку окончательно и бесповоротно — у модели не появится даже электрического преемника. </h2>
                    <p>
                        Глава марки аргументирует это тем, что новая стратегия развития Jaguar предусматривает выпуск исключительно оригинальных моделей, 
                        у которых нет конкурентов на рынке, в то время как полноразмерных седанов уже выпускается достаточно. 
                        Все новые модели марки будут разработаны с чистого листа.
                    </p>
                    <p>Глава Jaguar Land Rover Тьерри Боллоре рассказал в интервью изданию Autocar, 
                        что решение избавиться от роскошного седана XJ было одним из самых трудных, 
                        которые ему когда-либо приходилось принимать. Тем не менее, по словам топ-менеджера, 
                        XJ был во всех смыслах совершенно иным автомобилем, чем любой другой Jaguar — по габаритам, характеристикам и даже позиционированию на рынке. 
                        «Он никогда бы не вписался в наши планы», — утверждает топ-менеджер. 
                        Стратегия Боллоре заключается в том, что марка должна изобрести себя заново и выпустить ряд новых моделей, 
                        у которых нет прямых конкурентов на рынке, чтобы таким образом полностью поменять позиционирование бренда. 
                        XJ в неё не вписывается.
                    </p>
                    <p>
                        «План, который я разработал для компании, теперь выглядит как минимум, 
                        которого мы можем достичь. Reimagine — это живой проект и меня поразило количество людей, 
                        которые думают, что мы можем идти ещё дальше и быстрее. 
                        Это стало совместным усилием нашей команды», — отметил глава JLR. 
                        Новую концепцию развития бренда в Jaguar Land Rover назвали Modern Luxury — «современная роскошь». 
                        Согласно новым планам, все без исключения нынешние модели Jaguar «проживут» стандартный производственный цикл, 
                        после чего будут отправлены в отставку без прямых наследников.
                    </p>
                </div>
            </article>

                <!-- Новости для больших экранов -->
                <div class="news col-12 d-none d-xl-block d-lg-block d-lg-none d-md-none">
                    <h3 class="text-uppercase mb-5 news-big">Читайте также...</h3>
                    <div class="container news-block-bottom">
                        <div class="row">
                            <article class="img col-3 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                            <article class="img col-3 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                            <article class="img col-3 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                            <article class="img col-3 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Футер -->  
    <?php include("app/include/footer.php");?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>