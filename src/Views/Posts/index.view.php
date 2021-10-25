<?php require_once '../src/Views/templates/header.php'?>

<div class="container">
    <h2>Recent Articles</h2>

    <?php foreach($viewData['post'] as $post): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">
                    <?= htmlspecialchars($post->title); ?>
                </h3>
                <p class="card-text">
                    <span>
                        <small class="text-muted">
                            <?= $post->username; ?>
                        </small>
                    </span>
                    <span>
                        <small class="text-muted">
                            <?= date('Y-m-d, h:i A', strtotime($post->updated_at)); ?>
                        </small>
                    </span>
                </p>
                <p class="card-text">
                    <?= htmlspecialchars($post->description);?>
                </p>
                <div class="post-controls">
                    <a href="posts/<?= $post->id?>">
                        Read more...
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach;?>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for($page = 1; $page <= $viewData['pages']; $page++):?>
                <li class="page-item">
                    <?= '<a class="page-link" href="/?page='.$page.'">'.' '.$page.' '.'</a>'?>
                </li>
            <?php endfor?>
        </ul>
    </nav>

</div>
<?php require_once '../src/Views/templates/footer.php'?>