<div class="top-menu">
    <div class="menu-options">
        <?php
            if(App\Core\Session::get('user_id')):
        ?>
            <a href="/">Home</a>
            |
            <a href="list-posts.php">All Posts</a>
            |
            <a href="/posts">New Post</a>
            |
            <?php echo "Welcome ". htmlspecialchars($_SESSION['username']); ?>
            <a href="users/logout">Logout</a>
        <?php else:?>
            <a href="users/login">Login</a>
        <?php endif; ?>
    </div>
</div>
