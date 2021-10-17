<?php require 'Views/templates/head.php'?>
<?php require('Views/templates/title.php');?>

<p>This paragraph summarises what the blog is about.</p>
<div>
    <h2>Recent Articles</h2>
    <div class="post-list">
        <?php foreach($data['post'] as $post): ?>
            <div class="post-synopsis">
                <h3>
                    <?= htmlspecialchars($post->title); ?>
                </h3>
                <div class="meta">
                    <?= $post->username; ?>
                </div>
                <div class="meta">
                    <?= date($post->updated_at); ?>
                </div>
                <p>
                    <?= htmlspecialchars($post->description);?>
                </p>
                <div class="post-controls">
                    <a href="posts/<?= $post->id?>">
                        Read more...
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <div>
        <?php
            for($page = 1; $page <= $data['pages']; $page++) {
                echo '<a href="/?page='.$page.'">'.' '.$page.' '.'</a>';
            }
        ?>
    </div>
</div>
<?php require 'Views/templates/foot.php'?>