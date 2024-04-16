<!-- Навигация -->
<nav class="navbar navbar-expand-sm">
    <div class="container">
        <div class="col-lg-4 col-md-6">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <a href="<?php echo BASE_URL ?>" class="navbar-brand">АвтоГазета</a>
        </div>
        <div class="col-lg-4 col-md-6 offcanvas offcanvas-start" tabindex="-1" id="navbarContent" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Меню</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav mb-2 ms-auto">
                    <li class="lnav-item">
                        <a href="<?php echo BASE_URL ?>" class="nav-link">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Статьи</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Новости</a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if(isset($_SESSION['id'])): ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['login']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if($_SESSION['admin'] > 0): ?>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL . 'admin/posts/index.php'?>">Админ-панель</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php'?>">Выход</a></li>
                        </ul>
                        <?php else: ?>
                        <a href="<?php echo BASE_URL . 'auth.php'?>" class="nav-link">
                            Вход
                        </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
