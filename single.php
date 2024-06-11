<?php 
    include("path.php");
    include("app/controllers/topics.php");

    $post = selectOne('post', ['id' => $_GET['post']]);

    $views = $post['views'] + 1;
    updateOne('post', $post['id'], ['views' => $views]);
    
    if($views == 100){
        $post_topic = [
            'post_id' => $post['id'],
            'topic_id' => 18 //18 - id темы топ публикаций
        ];
        $existance = selectOne('post_topic', $post_topic);
        if(empty($existance))
        {
            insert('post_topic', $post_topic);
        }
    }

    $news = selectLastPosts(4, 16);
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
                <div class="col-xxl-9 col-xl-8 col-lg-7 cold-md-6 col-sm-12">
                    <div class="single_post">
                        <h1 class="text-uppercase"><?=$post['title'];?></h1>
                        <div class="info">
                            <i class="fa-solid fa-user"><?=" " . $post['author_name'];?></i>
                            <time datetime="<?=$post['post_date'];?>"><?php echo date('d-m-Y', strtotime($post['post_date']));?></time>
                        </div>
                        <article class="single_post row">
                            <div class="single_post-text col-12">
                                <?=$post['content'];?>
                            </div>
                        </article>
                        <!-- Комментарии -->
                        <?php include("app/include/comments.php");?>
                    </div>
                </div>
            </div>
            <div class="content row">
                <!-- Читайте также для маленьких -->
                <div class="main-content col-12 d-lg-none d-block">
                    <h3 class="text-uppercase mt-5 news-small">Читайте также...</h3>
                    <div class="container news-block-bottom">
                        <?php foreach($news as $new):?>
                            <article class="post row col-12">
                                <div class="img col-xxl-4 col-lg-4 col-md-4">
                                    <a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><img src="<?=BASE_URL . 'assets/img/posts/' . $new['img'] ?>" alt="" class="rounded img-fluid w-100"></a>
                                </div>
                                <div class="post-text col-xl-8 col-md-8">
                                    <h4><a href="<?=BASE_URL . 'single.php?post=' . $new['id']; ?>"><?=mb_substr($new['title'], 0, 100, 'UTF-8'); ?></a></h4>
                                    <i class="fa-solid fa-user"><?php echo " " . $new['author_name'];?></i>
                                    <time datetime="<?php echo $new['post_date'];?>"><?php echo date('d-m-Y', strtotime($new['post_date']));?></time>
                                    <p class="prewiew-text">
                                        <?php 
                                            $content = strip_tags($new['content']);
                                            $temp = mb_substr($content, 100, 120, 'UTF-8');
                                            $position = strpos($temp, " ") + 100;
                                            echo mb_substr($content, 0, $position, 'UTF-8') . '...'; 
                                        ?>
                                    </p>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Читайте также для больших экранов -->
                <div class="main-content col-12 d-none d-xl-block d-lg-block d-md-none">
                    <h3 class="text-uppercase mb-5 news-big"><a href="">Читайте также...</a></h3>
                    <div class="container news-block-bottom">
                        <div class="row">
                            <?php foreach($news as $new):?>
                                <?php if($new['id'] == $post) continue; ?>
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
    </section>
    <!-- Футер -->  
    <?php include("app/include/footer.php");?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>