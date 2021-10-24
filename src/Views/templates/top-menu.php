<?php
define('PORT', '8080');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost:<?= PORT?>/">Blog Posts</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(\App\Core\Session::get('user_id')): ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:<?= PORT?>/posts">New Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:<?= PORT?>/my-posts">My Posts</a>
          </li>
          <li class="nav-item">
          <a class="nav-link disabled"><?= "Welcome ". htmlspecialchars(\App\Core\Session::get('username')); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:<?= PORT?>/users/logout">Logout</a>
        </li>
        <?php else: ?>
          <li class="nav-item">
          <a class="nav-link" href="http://localhost:<?= PORT?>/users/login">Login</a>
        </li>
        <?php endif?>
      </ul>
    </div>
  </div>
</nav>
