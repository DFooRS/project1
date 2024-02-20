<!-- Пагинация -->
<nav aria-label="...">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo ($page <= 1) ? 1 : ($page - 1); ?>&id=<?php echo $sel_topic['id']; ?>">Предыдущая</a>
        </li>
        <?php for ($i = 1; $i <= $count_pages; $i++) : ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>&id=<?php echo $sel_topic['id']; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?php echo ($page >= $count_pages) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo ($page >= $count_pages) ? $count_pages : ($page + 1); ?>&id=<?php echo $sel_topic['id']; ?>">Следующая</a>
        </li>
    </ul>
</nav>