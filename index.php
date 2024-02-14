<?php 
    include("path.php");
    include("app/controllers/topics.php");

    $articles = [];
    $id_articles = selectAll('post_topic', ['topic_id'=> 5]);
    foreach($id_articles as $relation){
        $article = selectOne('post', ['id' => $relation['post_id']]);
        array_push($articles, $article);
    }
    $articles = array_reverse($articles);

    $news = [];
    $id_news = selectAll('post_topic', ['topic_id'=> 4]);
    foreach($id_news as $relation){
        $new = selectOne('post', ['id' => $relation['post_id']]);
        array_push($news, $new);
    }
    $news = array_reverse($news);

    $tops = [];
    $id_tops = selectAll('post_topic', ['topic_id'=> 18]);
    foreach($id_tops as $relation){
        $top = selectOne('post', ['id' => $relation['post_id']]);
        array_push($tops, $top);
    }
    $tops = array_reverse($tops);
?>

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
                        <div class="carousel-inner">
                        <?php foreach($tops as $key => $top):?>
                            <?php if($key == 0):?>
                            <div class="carousel-item active">
                            <?php else: ?>
                            <div class="carousel-item">
                            <?php endif; ?>
                                <img src="<?=BASE_URL . 'assets/img/posts/' . $top['img'] ?>" class="img-fluid d-block w-100" alt="...">
                                <div class="carousel-caption d-block carousel-text-inner">
                                    <h3><a class="carousel-text-inner" href="<?=BASE_URL . 'single.php?post=' . $top['id']; ?>"><?=mb_substr($top['title'], 0, 100, 'UTF-8') . '...'; ?></a></h3>
                                    <p class="d-none d-sm-block carousel-text-inner"><?=mb_substr($top['content'], 0, 120, 'UTF-8') . '...'; ?></p>
                                </div>
                            </div>
                          <?php endforeach; ?>
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
                        <form action="search.php" method="post">
                            <input type="text" name="search-tern" class="text-input" placeholder="Поиск...">
                        </form>
                    </div>
                    <!-- Сайдбар для маленьких экранов НАДО БУДЕТ ДОБАВИТЬ ОГРАНИЧЕНИЕ НА КОЛ-ВО-->
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
                                <?php foreach($topics as $key => $topic): ?>
                                    <li><a href="<?=BASE_URL . 'topic.php?id=' . $topic['id']?>"><?=$topic['name']?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Сайдбар для больших экранов  -->
                    <div class="section topics d-none d-xl-block d-lg-block d-md-block">
                        <h5>Разделы</h5>
                        <ul>
                            <?php foreach($topics as $key => $topic): ?>
                                <li><a href="<?=BASE_URL . 'topic.php?id=' . $topic['id']?>"><?=$topic['name']?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- Новости для маленьких экранов -->
                <div class="news col-lg-7 col-md-6 col-sm-12 col-12 d-md-block d-lg-block d-xl-none">
                    <h3 class="text-uppercase text-center news-small"><a href="">Свежие новости</a></h3>
                    <div class="container news-block">
                        <div class="row">
                            <?php foreach($news as $new):?>
                                <article class="img col-6 news-elem">
                                    <a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><img src="<?=BASE_URL . 'assets/img/posts/' . $new['img'] ?>" alt="" class="news-img img-fluid"></a>
                                    <?php if (strlen($new['title']) >= 30):?>
                                        <?php $temp = mb_substr($new['title'], 0, 30, 'UTF-8'); ?>
                                        <?php $del_pos = strripos($temp, ' ') + 1;?>
                                        <h5><a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><?=mb_substr($new['title'], 0, $del_pos, 'UTF-8') . '...'; ?></a></h5>
                                    <?php else: ?>    
                                        <h5><a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><?=$new['title']?></a></h5>
                                    <?php endif; ?> 
                                    <time datetime="<?php echo $new['post_date'];?>"><?php echo date('d-m-Y', strtotime($new['post_date']));?></time>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- Статьи -->
                <div class="main-content col-xxl-9 col-xl-8 col-md-12 col-sm-12">
                    <h3 class="text-uppercase text-center"><a href="">Недавние статьи</a></h3>
                    <?php foreach($articles as $article):?>
                        <article class="post row">
                            <div class="img col-xl-4 col-md-4 d-none d-md-block">
                                <a href="<?=BASE_URL . 'single.php?post=' . $article['id']; ?>"><img src="<?=BASE_URL . 'assets/img/posts/' . $article['img'] ?>" alt="" class="rounded img-fluid w-100"></a>
                            </div>
                            <div class="post-text col-xl-8 col-md-8">
                                <h4><a href="<?=BASE_URL . 'single.php?post=' . $article['id']; ?>"><?=mb_substr($article['title'], 0, 100, 'UTF-8'); ?></a></h4>
                                <i class="fa-solid fa-user"><?php echo " " . $article['author_name'];?></i>
                                <time datetime="<?php echo $article['post_date'];?>"><?php echo date('d-m-Y', strtotime($article['post_date']));?></time>
                                <p class="prewiew-text">
                                    <?php 
                                        $temp = mb_substr($article['content'], 100, 120, 'UTF-8');
                                        $position = strpos($temp, " ") + 100;
                                        echo mb_substr($article['content'], 0, $position, 'UTF-8') . '...'; 
                                    ?>
                                </p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
                <!-- Новости для больших экранов -->
                <div class="news col-12 d-none d-xl-block d-lg-block d-lg-none d-md-none">
                    <h3 class="text-uppercase mb-5 news-big"><a href="">Свежие новости</a></h3>
                        <div class="container news-block-bottom">
                            <div class="row">
                            <?php foreach($news as $new):?>
                                <article class="img col-3 news-elem">
                                    <a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><img src="<?=BASE_URL . 'assets/img/posts/' . $new['img'] ?>" alt="" class="news-img img-fluid"></a>
                                    <?php if (strlen($new['title']) > 35):?>
                                        <?php $temp = mb_substr($new['title'], 0, 35, 'UTF-8'); ?>
                                        <?php $del_pos = strripos($temp, ' ') + 1;?>
                                        <h5><a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><?=mb_substr($new['title'], 0, $del_pos, 'UTF-8') . '...'; ?></a></h5>
                                    <?php else: ?>    
                                        <h5><a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><?=$new['title']?></a></h5>
                                    <?php endif; ?>                           
                                    <time datetime="<?php echo $new['post_date'];?>"><?php echo date('d-m-Y', strtotime($new['post_date']));?></time>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Футер -->  
        <?php include("app/include/footer.php");?>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>