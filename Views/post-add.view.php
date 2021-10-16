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
        <textarea id="body" name="description" rows="12" cols="70">
            <?= htmlspecialchars($data['input']['description'])?>
        </textarea>
        <div>
            <?= $data['error']['description'];?>
        </div>
    </div>
    <div>
        <label for="status">Status: </label>
        <select name="status">
            <option value="false">Draft</option>
            <option value="true">Publish</option>
        </select>
    </div>
    <input type="hidden" name="user_id" value="<?= App\Core\Session::get('user_id')?>">
    <button type="submit">Save</button>
</form>

<?php require 'Views/templates/foot.php'?>