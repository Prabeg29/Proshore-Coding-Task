<?php
define('PORT', '8080');
?>

<div class="top-menu">
    <div class="menu-options">
        <?php
            if(App\Core\Session::get('user_id')):
        ?>
            <a href="http://localhost:<?= PORT?>/">Home</a>
            |
            <a href="http://localhost:<?= PORT?>/posts">New Post</a>
            |
            <?= "Welcome ". htmlspecialchars(\App\Core\Session::get('username')); ?>
            <a href="http://localhost:<?= PORT?>/users/logout">Logout</a>
        <?php else:?>
            <a href="http://localhost:<?= PORT?>/users/login">Login</a>
            |
            <a href="http://localhost:<?= PORT?>/users/register">Register</a>
        <?php endif; ?>
    </div>
</div>
