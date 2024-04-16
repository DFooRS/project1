<!-- Навигация -->
<nav class="navbar navbar-expand-sm">
    <div class="container">
        <div class="col-lg-4 col-md-8">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <a href="<?php echo BASE_URL ?>" class="navbar-brand">АвтоГазета</a>
        </div>
        <div class="col-lg-4 col-md-4 mb-2 ms-auto">
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav mb-2">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <?php echo $_SESSION['login']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . 'logout.php'?>" class="nav-link">Выход</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
