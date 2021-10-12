<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog></title>
</head>
<body>
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
</body>
</html>