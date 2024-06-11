<?php include('../../path.php');?>
<div class="section topics d-none d-xl-block d-lg-block d-md-block">
    <h5>Разделы</h5>
    <ul>
    <?php if($_SESSION['admin'] >= 2): ?>
        <li><a href="<?php echo BASE_URL . "admin/posts/index.php";?>">Записи</a></li>
    <?php endif; ?>
    <?php if($_SESSION['admin'] == 3): ?>
        <li><a href="<?php echo BASE_URL . "admin/users/index.php";?>">Пользователи</a></li>
    <?php endif; ?>
    <?php if($_SESSION['admin'] == 3): ?>
        <li><a href="<?php echo BASE_URL . "admin/topics/index.php";?>">Категории</a></li>
    <?php endif; ?>
    <?php if($_SESSION['admin'] >= 1): ?>
        <li><a href="<?php echo BASE_URL . "admin/comments/index.php";?>">Комментарии</a></li>
    <?php endif; ?>
        <!-- <li><a href="#">Настройки</a></li> -->
    </ul>
</div>