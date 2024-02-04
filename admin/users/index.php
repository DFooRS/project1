<?php 
    include("../../path.php");
    include("../../app/database/db.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Project1</title>
    <script src="https://kit.fontawesome.com/6205916143.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/admin.css"/>
    <!-- GoogleFonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <!-- Навигация -->
    <?php include("../../app/include/admin-navbar.php");?>
    <section class="main">
    <div class="container">
    <div class="row">
        <h2 class="admin-title text-uppercase">Администрирование</h2>
        <div class="sidebar col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-12">
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
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Сатьи</a></li>
                        <li><a href="#">Пользователи</a></li>
                        <li><a href="#">Категории</a></li>
                        <li><a href="#">Настройки</a></li>
                    </ul>
                </div>
            </div>
            <?php include('../../app/include/admin-sidebar.php'); ?>
        </div>
        <div class="posts col-xxl-10 col-xl-10 col-lg-10 col-md-9 col-sm-12">
            <div class="container post-panel">
                <div class="row">
                    <h3 class="admin-title text-center text-uppercase">Управление пользователями</h3>
                </div>
                <div class="row justify-content-center">
                <a href="<?php echo BASE_URL . "admin/users/create.php";?>"><button class="btn">Создать</button></a>
                </div>
                <div class="row title-table">
                    <div class="col-lg-1 col-1">ID</div>
                    <div class="col-lg-6 col-4">Логин</div>
                    <div class="col-lg-3 col-3">Роль</div>
                    <div class="col-lg-2 col-4">Управление</div>
                </div>
                <div class="row post">
                    <div class="id col-lg-1 col-1">1</div>
                    <div class="title col-lg-6 col-4"><a href="">antonfoors</a></div>
                    <div class="author col-lg-3 col-3">Администратор</div>
                    <div class="edit col-lg-1 col-2"><a href="">Edit</a></div>
                    <div class="del col-lg-1 col-2"><a href="">Del</a></div>
                </div>
                <div class="row post">
                    <div class="id col-lg-1 col-1">1</div>
                    <div class="title col-lg-6 col-4"><a href="">user888</a></div>
                    <div class="author col-lg-3 col-3">Модератор</div>
                    <div class="edit col-lg-1 col-2"><a href="">Edit</a></div>
                    <div class="del col-lg-1 col-2"><a href="">Del</a></div>
                </div>
                <div class="row post">
                    <div class="id col-lg-1 col-1">1</div>
                    <div class="title col-lg-6 col-4"><a href="">autopaper2024</a></div>
                    <div class="author col-lg-3 col-3">Редактор</div>
                    <div class="edit col-lg-1 col-2"><a href="">Edit</a></div>
                    <div class="del col-lg-1 col-2"><a href="">Del</a></div>
                </div>
                <div class="row post">
                    <div class="id col-lg-1 col-1">1</div>
                    <div class="title col-lg-6 col-4"><a href="">qwertyqwerty</a></div>
                    <div class="author col-lg-3 col-3">Пользователь</div>
                    <div class="edit col-lg-1 col-2"><a href="">Edit</a></div>
                    <div class="del col-lg-1 col-2"><a href="">Del</a></div>
                </div>
        </div>
    </div>
    </div>
    </section>
    <!-- Футер -->  
    <?php include("../../app/include/footer.php");?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>