<?php require 'Views/templates/head.php'?>
<?php require('Views/templates/title.php');?>

<h1>New Post</h1>
<form method="POST" class="post-form user-form" action="/posts">
    <div>
        <label for="post-title">Title:</label>
        <input 
            id="post-title" 
            name="title" 
            type="text" 
            value="<?= htmlspecialchars($data['input']['title'])?>" 
        />
        <div>
            <?= $data['error']['title'];?>
        </div>
    </div>
    <div>
        <label for="post-body">Description: </label>
        <textarea id="body" name="body" rows="12" cols="70">
            <?= htmlspecialchars($data['input']['body'])?>
        </textarea>
        <div>
            <?= $data['error']['body'];?>
        </div>
    </div>
    <button type="submit">Save</button>
</form>

<?php require 'Views/templates/foot.php'?>