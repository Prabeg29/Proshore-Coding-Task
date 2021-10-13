<?php require 'Views/templates/head.php'?>
<?php require('Views/templates/title.php');?>
<div class="post">
    <h2>
        <?= htmlspecialchars($data->title); ?>
    </h2>
    <div class="date">
        <?= date($data->created_at)?>
    </div>
    <p>
        <?= htmlspecialchars($data->body); ?>
    </p>
    <?php if(App\Core\Session::get('user_id')):?>
        <form action="/posts/<?= $data->id?>" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <button type="submit">Edit</button>
        </form>
        <form action="/posts/<?= $data->id?>" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Delete</button>
        </form>
    <?php endif?>
</div>
<?php require 'Views/templates/foot.php'?>
