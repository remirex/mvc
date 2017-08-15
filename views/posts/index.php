<div>
    <?php if(isset($_SESSION['is_logged_in'])) : ?>
    <a href="<?php echo ROOT_PATH; ?>posts/add" class="btn btn-success">Podeli blog</a>
    <?php endif; ?>
    <?php foreach($viewmodel as $item) : ?>
        <div class="well" style="margin-top: 5px">
            <h3><?=$item->title?></h3><hr>
            <p><?=$item->body?></p>
            <p><b><i><?=$item->create_date?></i></b></p>
            <a href="https://www.it-akademija.com/" class="btn btn-default" target="_blank">Go to Web Site</a>
            <?php if($_SESSION['user_data']['status'] == 'admin') : ?>
            <div class="navbar-right">
               <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                   <input type="hidden" name="id_post" value="<?=$item->id_post?>">
                   <input type="submit" name="delete_post" value="Delete" class="btn btn-danger">
               </form>
            </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>