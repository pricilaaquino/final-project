<?php
    try {
        include("config.php");
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {    
                
                if (isset($_POST['search'])) {
                  // SEARCH
                    $title = $db->real_escape_string($_POST['search_title']);
                    $data = [];
                    // Get entries from search title using wild card search
                   if ($result = $db->query("SELECT * FROM blog_entries WHERE title like '%{$title}%'")) {
                      while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                      }
                      $result->free();
                   }

                } else {
                    // ADD BLOG
                    $target_dir = 'uploads/'; // Folder where pictures get stored

                    // Get string values from the form
                    $title = $db->real_escape_string($_POST['title']);
                    $cuisine = $db->real_escape_string($_POST['cuisine']);
                    $opening_hours = $db->real_escape_string($_POST['opening_hours']);
                    $location = $db->real_escape_string($_POST['location']);
                    $description = $db->real_escape_string($_POST['description']);
                    $image_caption = $db->real_escape_string($_POST['image_caption']);
                   
                    // Get the image file
                    $image = $_FILES['image'];
                    $image_to_save = null;

                    // Check if the image file is valid
                    if (isset($image) && $image['size'] > 0 && $image['tmp_name'] !== false) {
                        // target file is uploads folder + filename
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        // Move the file from temporary location in php server to the uploads/ folder
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        // Get image name
                        $image_to_save = $_FILES["image"]["name"];

                    }

                    // Insert into database
                    $db->query(
                        "INSERT INTO blog_entries 
                            SET title='{$title}',
                                cuisine='{$cuisine}',
                                opening_hours='{$opening_hours}',
                                location='{$location}',
                                description='{$description}',
                                image='{$image_to_save}',
                                image_caption='{$image_caption}'
                        ");
                }

       }

       if (!isset($data)) {
            $data = [];
            // Get all blog entries
           if ($result = $db->query("SELECT * FROM blog_entries")) {
              while ($row = $result->fetch_assoc()) {
                $data[] = $row;
              }
              // Free result variable
              $result->free();
           }
       }

   } catch (Exception $e) {
    print($e);
   }

?>
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
                    <div class="col-md-3 vertical-ba">
                         <form action="" method="POST" class="form-signin" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                              </div>
                              <div class="form-group">
                                <label for="cuisine">Cuisine</label>
                                <input type="text"  name="cuisine" class="form-control" id="cuisine" placeholder="Cuisine">
                              </div>
                              <div class="form-group">
                                <label for="opening_hours">Opening Hours</label>
                                <input type="text" name="opening_hours" class="form-control" id="opening_hours" placeholder="Opening Hours">
                              </div>
                              <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location" placeholder="Title">
                              </div>
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" cols="35" rows="7" required></textarea>
                              </div>
                              <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image">
                              </div>
                              <div class="form-group">
                                <label for="location">Image caption</label>
                                <input type="text" name="image_caption" class="form-control" id="image_caption" placeholder="image caption">
                              </div>
                              <button type="submit" class="btn btn-default btn-block">Add Blog</button>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <form class="form-inline" action="" method="POST">
                                <div class="form-group">
                                    <label for="search_title">Search title</label>
                                    <input type="text" class="form-control" name='search_title' id="search_title" >
                                </div>
                              <button type="submit" class="btn btn-default" name='search'>Search</button>
                            </form>
                        </div>
                        <br>
                        <div class="row">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Cuisine</th>
                                        <th>Location</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php foreach($data as $item) { ?>
                                      <tr>
                                         <td><?php echo $item['title']?></td>
                                         <td><?php echo $item['cuisine']?></td>
                                         <td><?php echo $item['location']?></td>
                                         <td><?php echo $item['created_at']?></td>
                                         <td>
                                             <a href=<?php echo 'edit.php?id='.$item['id']?> >Edit</a>
                                             <a href=<?php echo 'delete.php?id='.$item['id']?> >Delete</a>
                                         </td>
                                      </tr>
                                      <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <a href="login.php">You must be logged in to view this page</a>
                </div>
            <?php } ?>
        </div>
    </body>
</html>