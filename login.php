<?php
  include("config.php");
  session_start();
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {    
     // username and password sent from form 
     $email = $db->real_escape_string($_POST['email']);
     $password = $db->real_escape_string($_POST['password']); 
     $result = $db->query("SELECT email,password FROM users WHERE email = '{$email}'");
     $row = $result->fetch_assoc();
     
     $count = mysqli_num_rows($result);
       
     if(password_verify($password, $row['password'])) {
        $_SESSION['user'] = $email;
        $_SESSION['isLoggedin'] = true;
        
        header("location: dashboard.php");
     }else {
        $error = "Your Login Name or Password is invalid";
     }
  }
  $db->close();
?>
<!DOCTYPE HTML>
<html>
   
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <body>
        <div class="container">
    
          <form action="" method="POST" class="form-signin">
            <h2 class="form-signin-heading">Welcome!</h2>
            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          </form>
    
        </div> <!-- /container -->
      </body>
</html>