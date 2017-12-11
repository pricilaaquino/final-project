<?php
    try {
        include("config.php");
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") { 

                // Like add, get all values to edit   
                $target_dir = 'uploads/';
                $id = $db->real_escape_string($_POST['id']);
                $title = $db->real_escape_string($_POST['title']);
                $cuisine = $db->real_escape_string($_POST['cuisine']);
                $opening_hours = $db->real_escape_string($_POST['opening_hours']);
                $location = $db->real_escape_string($_POST['location']);
                $description = $db->real_escape_string($_POST['description']);
                $image_caption = $db->real_escape_string($_POST['image_caption']);
                $image = $_FILES['image'];

                if (isset($image) && $image['size'] > 0 && $image['tmp_name'] !== false) {
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $image_to_save = $_FILES["image"]["name"];

                }
                // Update entries in mysql
                $query = "UPDATE blog_entries 
                        SET title='{$title}',
                            cuisine='{$cuisine}',
                            opening_hours='{$opening_hours}',
                            location='{$location}',
                            description='{$description}',
                            image_caption='{$image_caption}'
                    ";

                // If there is no image uploaded, don't save
                if (isset($image_to_save)) {
                    $query .= ", image='{$image_to_save}' ";
                }

                $query .= "WHERE id='{$id}'";
                // Update query
                $db->query($query);

                header('Location: dashboard.php');

       } else {
            // Get id to show for blog entry
            if (array_key_exists("id", $_GET)) {
                $id = $_GET["id"];
                $result = $db->query("SELECT * FROM blog_entries WHERE id='{$id}'");
                $item = $result->fetch_assoc();
                $result->free();
            } else {
                // If id is not valid redirect to dashboard
                header('Location: dashboard.php');
            }     
       } 


    } catch (Exception $e) {

    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
            </div>
            <?php if(isset($_SESSION['isLoggedin'])) { ?>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <a href="dashboard.php">Back to Dashboard</a>
                         <form action="" method="POST" class="form-signin" enctype="multipart/form-data" autocomplete="off">
                              <input type="hidden" name="id" id="id" value=<?php echo $item['id']?> >
                              <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?php echo $item['title']; ?>" placeholder="Title">
                              </div>
                              <div class="form-group">
                                <label for="cuisine">Cuisine</label>
                                <input type="text"  name="cuisine" class="form-control" id="cuisine" value="<?php echo $item['cuisine']?>"  placeholder="Cuisine">
                              </div>
                              <div class="form-group">
                                <label for="opening_hours">Opening Hours</label>
                                <input type="text" name="opening_hours" class="form-control" id="opening_hours" value="<?php echo $item['opening_hours']?>" placeholder="Opening Hours">
                              </div>
                              <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location" value="<?php echo $item['location']?>" placeholder="Title">
                              </div>
                              <div class="form-group">
                                <label for="description">Description</label><br>
                                <textarea name="description" cols="48" rows="7" required><?php echo $item['description']?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image">
                              </div>
                              <div class="form-group">
                                <label for="image_caption">Image caption</label>
                                <input type="text" name="image_caption" class="form-control" id="image_caption" value="<?php echo $item['image_caption']?>" placeholder="image caption">
                              </div>
                              <button type="submit" class="btn btn-default btn-block">Update Blog</button>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <button>You must be logged in to view this page</button>
                </div>
            <?php } ?>
        </div>
    </body>
</html>