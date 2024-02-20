<?php

include (__DIR__ . "/../controllers/comments.php");

?>
<div class="comments col-12">
    <h3>Комментарии</h3>
    <form action="<?=BASE_URL . "single.php?post=$post"?>" method="post">
        <div class="mb-3 err">
            <?php include(__DIR__ . "/../help/error-info.php"); ?>
        </div>
        <input name="post" value="<?=$post?> "type="hidden"</input>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <button name="btn-send" type="submit" class="btn-send">Отправить</button>
        </div>
    </form>
    <?php if (count($comments) > 0): ?>
    <div class="row col-12">
        <?php foreach ($comments as $comment):?>
            <div class="comment">
                <span class="username"><?=$comment['username']?></span>      
                <div class="col-12 text">
                    <?=$comment['content']?>
                </div>
                <time datetime="<?php echo $comment['created_date'];?>"><?php echo date('d M Y в H:i', strtotime($comment['created_date']));?></time>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
