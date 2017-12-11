<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'juleski');
   define('DB_DATABASE', 'pri_lis');
   // Connect to mysql using the credentials above
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
