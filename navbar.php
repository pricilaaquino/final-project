<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">PriEATS Dashboard</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="about_me.php">About me <span class="sr-only">(current)</span></a></li>
        <li><a href="blogs.php">Blogs <span class="sr-only">(current)</span></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['isLoggedin'])) { ?>
            <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
            <li><a href="login.php">Login</a></li>
        <?php } ?>
    </ul>
</nav>