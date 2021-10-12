<?php require 'Views/templates/head.php'?>
<form action="/users/login" method="post">
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
    <button type="submit">Register</button>
</form>
<?php require 'Views/templates/foot.php'?>