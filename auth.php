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
    <!-- Форма регистрации/авторизации -->
    <section class="reg_form">
        <div class="container">
            <form class="row justify-content-center" method="post" action="reg.html">
                <h2>Авторизация</h2>
                <div class="w-100"></div>
                <div class="mb-3 col-12 col-md-5 col-lg-4 col-xl-3">
                  <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="w-100"></div>
                <div class="mb-4 col-12 col-md-5 col-lg-4 col-xl-3">
                  <label for="exampleInputPassword1" class="form-label">Пароль</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="w-100"></div>
                <div class="mb-5 col-12 col-md-5 col-lg-4 col-xl-3">
                    <button type="submit" class="btn">Отправить</button>
                    <a href="auth.html">Зарегистрироваться</a>
                </div>
              </form>
        </div>
    </section>
    <!-- Футер -->  
    <?php include("app/include/footer.php");?>
</body>