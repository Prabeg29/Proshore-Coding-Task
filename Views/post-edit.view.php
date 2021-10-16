<?php require 'Views/templates/head.php'?>
<?php require('Views/templates/title.php');?>

<h1>Edit Post</h1>
<form 
    method="POST" 
    class="post-form user-form" 
    action="/posts-edit/<?=$data['input']['id']?>"
>
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
        <input 
            name="_method" 
            type="hidden" 
            value="PUT" 
        />
    </div>
    <div>
        <label for="status">Status: </label>
        <select name="status">
            <option value="false">Draft</option>
            <option value="true"<?php if($data['input']['status'] === '1') echo ' selected="selected"'?>>Publish</option>
        </select>
    </div>
    <input type="hidden" name="id" value="<?= $data['input']['id']?>">
    <button type="submit">Save</button>
</form>

<?php require 'Views/templates/foot.php'?>