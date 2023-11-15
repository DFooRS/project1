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
    <!-- Карусель -->
    <section class="lastnews">
        <div class="container">
            <div class="content row">
                <div class="main-content col-12 slider-title">
                    <h2 class="slider-title text-uppercase mb-5">Популярные публикации</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <!-- <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div> -->
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="10000">
                            <img src="assets/img/volga24.jpeg" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption d-block">
                              <h3><a class="carousel-text-inner" href="">Волга будет возрождена</a></h3>
                              <p class="d-none d-sm-block carousel-text-inner">Некоторый репрезентативный заполнитель для первого слайда.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="assets/img/camry.jpg" class="img-fluid d-block w-100r" alt="...">
                            <div class="carousel-caption d-block carousel-text-inner">
                                <h3><a class="carousel-text-inner" href=""">Новая Camry выйдет в 2024 году</a></h3>
                                <p class="d-none d-sm-block carousel-text-inner">Некоторый репрезентативный заполнитель для второго слайда.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="assets/img/mercedes.jpeg" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption d-block">
                                <h3><a class="carousel-text-inner" class="carousel-text-inner" href="">Опыт эксплуатации Mercedes-Benz W206</a></h3>
                              <p class="d-none d-sm-block carousel-text-inner">Некоторый репрезентативный заполнитель для третьего слайда.</p>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Следующий</span>
                        </button>
                      </div>
                </div>
            </div>
        </div>
    </section>
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
                <!-- Новости для маленьких экранов -->
                <div class="news col-lg-7 col-md-6 col-sm-12 col-12 d-md-block d-lg-block d-xl-none">
                    <h3 class="text-uppercase text-center news-small">Свежие новости</h3>
                    <div class="container news-block">
                        <div class="row">
                            <article class="img col-6 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                            <article class="img col-6 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                        </div>
                        <div class="row">
                            <article class="img col-6 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                            <article class="img col-6 news-elem">
                                <a href=""><img src="assets/img/vesta.jpeg" alt="" class="news-img img-fluid"></a>
                                <h5><a href="">16-клапанный мотор вернулся на обновлённую Vesta</a></h5>
                                <time datetime="">03.11.2023</time>
                            </article>
                        </div>
                    </div>
                </div>
                <!-- Статьи -->
                <div class="main-content col-xxl-9 col-xl-8 col-md-12 col-sm-12">
                    <h3 class="text-uppercase">Недавние статьи</h3>
                    
                    <article class="post row">
                        <div class="img col-xl-4 col-md-4 d-none d-md-block">
                            <a href=""><img src="assets/img/jaguar.jpeg" alt="" class="rounded img-fluid"></a>
                        </div>
                        <div class="post-text col-xl-8 col-md-8">
                            <h4><a href="">Почему не вышел новый электрический Jaguar XJ и J-Pace</a></h4>
                            <i class="fa-solid fa-user">Имя автора</i>
                            <time>02.11.2023</time>
                            <p class="prewiew-text">
                                Представительский седан Jaguar XJ, 
                                как известно, отправлен в отставку окончательно и бесповоротно — у модели
                                не появится даже электрического преемника.
                            </p>
                        </div>
                    </article>

                    <article class="post row">
                        <div class="img col-xl-4 col-md-4 d-none d-md-block">
                            <a href=""><img src="assets/img/jaguar.jpeg" alt="" class="rounded img-fluid"></a>
                        </div>
                        <div class="post-text col-xl-8 col-md-8">
                            <h4><a href="">Почему не вышел новый электрический Jaguar XJ и J-Pace</a></h4>
                            <i class="fa-solid fa-user">Имя автора</i>
                            <time>02.11.2023</time>
                            <p class="prewiew-text">
                                Представительский седан Jaguar XJ, 
                                как известно, отправлен в отставку окончательно и бесповоротно — у модели
                                не появится даже электрического преемника.
                            </p>
                        </div>
                    </article>
                </div>
                <!-- Новости для больших экранов -->
                <div class="news col-12 d-none d-xl-block d-lg-block d-lg-none d-md-none">
                    <h3 class="text-uppercase mb-5 news-big">Свежие новости</h3>
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