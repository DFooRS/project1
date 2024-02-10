<?php 
    include("../../path.php");
    include("../../app/controllers/users.php");
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
                    <h3 class="admin-title text-center text-uppercase">Создать пользователя</h3>
                </div>
                <div class="row add-post">
                    <form action="edit.php" method="POST">
                        <div class="mb-3 err">
                            <p><?=$errMsg?></p>
                        </div>
                        <input name="id" value="<?=$id;?>" type="hidden"></input>
                        <div class="col mb-3">
                        <label for="form-control" class="form-label">Имя пользователя</label>
                            <input name="username" value="<?=$username;?>" type="text" class="form-control" placeholder="Логин" aria-label="Name">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                            <input name="email" value="<?=$email?>" readonly type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col mb-3">
                            <label for="exampleInputPassword1" class="form-label">Выбор роли</label>
                            <select name="admin" class="form-select" aria-label="Пример выбора по умолчанию">
                                <option value="0">Пользователь</option>
                                <option value="1">Модератор</option>
                                <option value="2">Редактор</option>
                                <option value="3">Администратор</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <button name="user-update" class="btn" type="submit">Сохранить</button>
                        </div>
                    </form>
                </div>
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