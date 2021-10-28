<?php require_once '../src/Views/templates/header.php'?>

<div class="container">
    <h2>My Worklogs</h2>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($viewData as $post): ?>
            <tr>
                <td>
                    <a href="/posts-edit/<?= $post->id?>">
                        <?= $post->title?>
                    </a>
                </td>
                <td>
                    <?php if ($post->status === '1'):?>
                        <?= 'Published'?>
                    <?php else:?>
                        <?= 'Draft'?>
                    <?php endif?>
                </td>
                <td>
                    <?= date('Y-m-d, h:i A', strtotime($post->updated_at))?>                             
                </td>
                <td>
                    <form action="/posts/<?= $post->id?>" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-secondary">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require '../src/Views/templates/footer.php'?>
