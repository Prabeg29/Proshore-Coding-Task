<?php require_once '../src/Views/templates/header.php'?>

<div class="container">
    <h1>Add Post</h1>
    <form action="/posts" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title*: </label>
            <input 
                type="text" 
                class="form-control" 
                name="title"
                value="<?= $viewData['input']['title']?>"
            />
            <div style="color: red;">
                <?= $viewData['error']['title']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Slug*: </label>
            <input 
                type="text" 
                class="form-control" 
                name="slug"
                value="<?= $viewData['input']['slug']?>"
            />
            <div style="color: red;">
                <?= $viewData['error']['slug']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description*: </label>
            <textarea class="form-control" name="description" rows="3"><?= htmlspecialchars($viewData['input']['description'])?></textarea>
            <div style="color: red;">
                <?= $viewData['error']['description']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail*: </label>
            <input type="file" name="fileToUpload">
            <div style="color: red;">
                <?= $viewData['error']['image']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status*: </label>
            <select class="form-select" name="status">
                <option selected value="false">Draft</option>
                <option value="true">Publish</option>
            </select>
        </div>
        <input type="hidden" name="user_id" value="<?= App\Core\Session::get('user_id')?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require '../src/Views/templates/footer.php'?>
