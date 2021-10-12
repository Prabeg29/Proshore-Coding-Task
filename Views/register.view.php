<?php require 'Views/templates/head.php'?>
<form action="/users/register" method="post">
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
        <label for="">Email*: </label>
        <input 
            type="email" 
            name="email" 
            value="<?= $data['input']['email']?>"
        />
        <div>
            <?= $data['error']['email']?>
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
    <div>
        <label for="">Confirm Password*: </label>
        <input 
            type="password" 
            name="confirmPassword" 
            value="<?= $data['input']['confirmPassword']?>"
        />
        <div>
            <?= $data['error']['confirmPassword']?>
        </div>
    </div>
    <button type="submit">Register</button>
</form>
<?php require 'Views/templates/foot.php'?>