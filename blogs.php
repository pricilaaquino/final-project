<?php
    try {
        include("config.php");
        session_start();

       if ($result = $db->query("SELECT * FROM blog_entries")) {
          while ($row = $result->fetch_assoc()) {
            $data[] = $row;
          }
          $result->free();
       }
    } catch (Exception $e) {

    }
?>
<!DOCTYPE HTML>  
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script type="text/javascript" src='bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js' defer></script>
        <script type="text/javascript" src='bootstrap-3.3.7-dist/js/bootstrap.min.js' defer></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php include("navbar.php"); ?>
            </div>
            <?php foreach($data as $key => $item) { ?>
                <div class="row">
                    <?php if ($key % 2 == 0) { ?>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo 'http://localhost:8000/uploads/'.$item['image']; ?>" >
                                <div class="caption text-center"><strong><?php echo $item['image_caption']; ?></strong></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h1><?php echo $item['title']; ?></h1>
                            <br>
                            <strong>CUISINE:</strong><?php echo $item['cuisine']; ?>
                            <br>
                            <strong>OPENING HOURS:</strong><?php echo $item['opening_hours']; ?>
                            <br>
                            <strong> LOCATION:</strong><?php echo $item['location']; ?>
                            <br>
                            <br>
                            <p class="lead text-justify"><?php echo $item['description']; ?></p>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-8">
                            <h1><?php echo $item['title']; ?></h1>
                            <br>
                            <strong>CUISINE:</strong><?php echo $item['cuisine']; ?>
                            <br>
                            <strong>OPENING HOURS:</strong><?php echo $item['opening_hours']; ?>
                            <br>
                            <strong> LOCATION:</strong><?php echo $item['location']; ?>
                            <br>
                            <br>
                            <p class="lead text-justify"><?php echo $item['description']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="<?php echo 'http://localhost:8000/uploads/'.$item['image']; ?>" >
                                <div class="caption text-center"><strong><?php echo $item['image_caption']; ?></strong></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($key != (count($data) - 1)) { ?>
                    <hr>
                <?php } ?>
            <?php } ?>
        </div>        
    </body>
</html>
