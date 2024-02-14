<!-- Пагинация -->
<nav aria-label="...">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
        <span class="page-link">Предыдущая</span>
        </li>
        <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
        <?php if($page > 1): ?>
            <li class="page-item"><a class="page-link" href="?page=<?=$page - 1?>"><?php echo $page-1?></a></li>
        <?php endif; ?>
        <?php if($page < $count_pages): ?>
        <li class="page-item"><a class="page-link" href="?page=<?=$count_pages?>"><?php echo $count_pages?></a></li>
        <li class="page-item">
        <a class="page-link" href="#">Следующая</a>
        </li>
        <?php endif; ?>
    </ul>
</nav>
