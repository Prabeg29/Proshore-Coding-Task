<?php require '../src/Views/templates/head.php'?>

<div class="container">
    <h1>Registration Form</h1>
    <form action="/users/register" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username*: </label>
            <input 
                type="text" 
                class="form-control" 
                name="username"
                value="<?= $viewData['input']['username']?>" 
            />
            <div style="color: red;">
                <?= $viewData['error']['username']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email*: </label>
            <input 
                type="email" 
                class="form-control" 
                name="email"
                value="<?= $viewData['input']['email']?>">
            <div style="color: red;">
                <?= $viewData['error']['email']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password*: </label>
            <input 
                type="password" 
                class="form-control" 
                name="password"
                value="<?= $viewData['input']['password']?>">
            <div style="color: red;">
                <?= $viewData['error']['password']?>
            </div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password*: </label>
            <input 
                type="password" 
                class="form-control" 
                name="confirmPassword"
                value="<?= $viewData['input']['confirmPassword']?>">
            <div style="color: red;">
                <?= $viewData['error']['confirmPassword']?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <br>
    <div>
        <p>Already Registered? <a href="/users/login">Login Here</a></p>
    </div>
</div>

<?php require '../src/Views/templates/foot.php'?>