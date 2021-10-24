<?php require '../src/Views/templates/head.php'?>

<div class="container">
    <h1>Login Page</h1>
    <form action="/users/login" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username*: </label>
            <input 
                type="text" 
                class="form-control" 
                name="username"
                value="<?= $viewData['input']['username']?>" 
            />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password*: </label>
            <input 
                type="password" 
                class="form-control" 
                name="password"
                value="<?= $viewData['input']['password']?>">
        </div>
        <div class="mb-3">
            <div style="color: red;">
                <?= $viewData['error']?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <br>
    <div>
        <p>Not Registered Yet? <a href="/users/register">Register Here</a></p>
    </div>
</div>
<?php require '../src/Views/templates/foot.php'?>