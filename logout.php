<?php
   session_start();
   // Destroy session and redirect to landing page
   if (session_destroy()) {
      header("Location: index.php");
   }