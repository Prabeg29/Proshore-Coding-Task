<?php require 'Views/templates/head.php'?>
<form action="/users/login" method="post">
    <div>
        <label for="">Username*: </label>
        <input 
            type="text" 
            name="username" 
            value="<?= $data['input']['username']?>" 
            />
        <div>
            <?= $data['error']['username']?>
        </div>
    </div>
    <div>
        <label for="">Password*: </label>
        <input 
            type="password" 
            name="password" 
            value="<?= $data['input']['password']?>"
        />
        <div>
            <?= $data['error']['password']?>
        </div>
    </div>
    <button type="submit">Login</button>
</form>
<?php require 'Views/templates/foot.php'?>