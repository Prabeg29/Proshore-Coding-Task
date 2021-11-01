<?php require_once '../src/Views/templates/header.php'?>

<div class="container">
    <h1>Edit Post</h1>
    <form action="/posts-edit/<?=$viewData['input']['id']?> " method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title*: </label>
            <input 
                type="text" 
                class="form-control" 
                name="title"
                value="<?= $viewData['input']['title']?>"
            />
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Slug*: </label>
            <input 
                type="text" 
                class="form-control" 
                name="slug"
                value="<?= $viewData['input']['slug']?>"
            />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Description*: </label>
            <textarea class="form-control" name="description" rows="3"><?=  htmlspecialchars($viewData['input']['description'])?></textarea>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail*: </label>
            <input type="file" name="fileToUpload" value="<?= $viewData['input']['imagePath']?>">
            <div style="color: red;">
                <?= $viewData['error']['image']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Status*: </label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="false">Draft</option>
                <option value="true"<?php if($viewData['input']['status'] === '1') echo ' selected="selected"'?>>Publish</option>
            </select>
        </div>
        <div>
            <input 
                name="_method" 
                type="hidden" 
                value="PUT" 
            />
        </div>
        <input type="hidden" name="id" value="<?= $viewData['input']['id']?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require_once '../src/Views/templates/footer.php'?>
