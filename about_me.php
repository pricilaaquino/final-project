<!DOCTYPE HTML>  
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/pri.css">
        <script type="text/javascript" src='bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js' defer></script>
        <script type="text/javascript" src='bootstrap-3.3.7-dist/js/bootstrap.min.js' defer></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">PriEATS Dashboard</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="about_me.php">About me <span class="sr-only">(current)</span></a></li>
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
            </div>
            <div class="row well">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/cottoncandy.jpg" alt="pri's picture">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/burger.jpg" alt="pri's picture">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/hello.jpg" alt="pri's picture">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/hi.jpg" alt="pri's picture">
                        </a>
                    </div>
                    <div class="col-md-4">
                            <h1>Pricila Aquino</h1>
                            <p class="text-lead">Hi I am Pri and I am 20 years old! One thing people know best about me is my love for food. I love eating and I especially love trying out different restaurants. Being an athlete, I had the advantage of eating a lot and not gaining that much weight too! Because I study in UP and live nearby, UP Town or Maginhawa is my place to go whenever I am hungry. Whenever I am with my friends or family we would always try out different types of food! I created this blog to show you a guide of restaurants I highly recommend!</p>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/pink.jpg" alt="pri's picture">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/swim.jpg" alt="pri's picture">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/love.jpg" alt="pri's picture">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="images/me/me.PNG" alt="pri's picture">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
