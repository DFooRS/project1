<?php 
    include("path.php");
    include("app/controllers/topics.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-tern'])){
        $posts = globalSearch($_POST['search-tern'], 'post');
        $search_value = $_POST['search-tern'];
    }
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
    <!-- Основа -->
    <section class="main">
        <div class="container">
            <div class="content row">
                <div class="sidebar col-xxl-3 col-xl-4 col-lg-5 col-md-12">
                    <div class="section search">
                        <form action="search.php" method="post">
                            <input type="text" name="search-tern" class="text-input" placeholder="Поиск...">
                        </form>
                    </div>
                    <!-- Сайдбар для маленьких экранов НАДО БУДЕТ ДОБАВИТЬ ОГРАНИЧЕНИЕ НА КОЛ-ВО-->
                    <div class="section panel-group d-xl-none d-lg-none" data-bs-toggle="collapse" href="#collapse1">
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
                    <div class="section topics d-none d-xl-block d-lg-block d-md-none">
                        <h5>Разделы</h5>
                        <ul>
                            <?php foreach($topics as $key => $topic): ?>
                                <li><a href="<?=BASE_URL . 'topic.php?id=' . $topic['id']?>"><?=$topic['name']?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- Статьи -->
                <div class="main-content col-xxl-9 col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <h3 class="text-uppercase text-center">Результаты поиска</h3>
                    <?php if($posts): ?>
                        <?php foreach($posts as $post):?>
                            <article class="post row">
                                <div class="img col-xl-4 col-md-4 d-none d-md-block">
                                    <a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"><img src="<?=BASE_URL . 'assets/img/posts/' . $post['img'] ?>" alt="" class="rounded img-fluid w-100"></a>
                                </div>
                                <div class="post-text col-xl-8 col-md-8">
                                    <h4><a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"><?=mb_substr($post['title'], 0, 100, 'UTF-8'); ?></a></h4>
                                    <i class="fa-solid fa-user"><?php echo " " . $post['author_name'];?></i>
                                    <time datetime="<?php echo $post['post_date'];?>"><?php echo date('Y-m-d', strtotime($post['post_date']));?></time>
                                    <p class="prewiew-text">
                                        <?php 
                                            $content = strip_tags($post['content']);
                                            $temp = mb_substr($content, 100, 120, 'UTF-8');
                                            $position = strpos($temp, " ") + 100;
                                            echo mb_substr($content, 0, $position, 'UTF-8') . '...'; 
                                        ?>
                                    </p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div>
                            <h4 class="text-uppercase text-center">Ничего не найдено</h4>
                            <h5 class="text-uppercase text-center"><a href="index.php">Вернуться на главную</a></h5>
                            <p align="center">
                                <img src="assets/gif/not-found.gif" alt="Funny cat">
                            </p>
                        </div>
                    <?php endif; ?>
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