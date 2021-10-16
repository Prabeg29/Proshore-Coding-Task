<?php require 'Views/templates/head.php'?>
<?php require('Views/templates/title.php');?>
<div class="post">
    <h2>
        <?= htmlspecialchars($data->title); ?>
    </h2>
    <div class="date">
        <?= $data->username?>
    </div>
    <div class="date">
        <?= $data->updated_at?>
    </div>
    <p>
        <?= htmlspecialchars($data->description); ?>
    </p>
    <?php if(App\Core\Session::get('user_id') && App\Core\Session::get('user_id')=== $data->user_id):?>
        <a href="/posts-edit/<?= $data->id?>">Edit</a>
        <form action="/posts/<?= $data->id?>" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Delete</button>
        </form>
    <?php endif?>
</div>
<?php require 'Views/templates/foot.php'?>
