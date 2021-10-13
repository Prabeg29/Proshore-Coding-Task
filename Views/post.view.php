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
</div>
<?php require 'Views/templates/foot.php'?>
