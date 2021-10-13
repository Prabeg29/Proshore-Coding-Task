<?php require 'Views/templates/head.php'?>

<?php require('Views/templates/title.php');?>
<p>This paragraph summarises what the blog is about.</p>
<div>
    <h2>Recent Articles</h2>
    <div class="post-list">
        <?php foreach($data as $post): ?>
            <div class="post-synopsis">
                <h3>
                    <?= htmlspecialchars($post->title); ?>
                </h3>
                <div class="meta">
                    <?= date($post->created_at); ?>
                </div>
                <p>
                    <?= htmlspecialchars($post->body);?>
                </p>
            </div>
        <?php endforeach;?>
    </div>
</div>
<?php require 'Views/templates/foot.php'?>