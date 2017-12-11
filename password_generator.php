<?php

// Password of user
$password = 'test1234';
var_dump($password);

// Hashed password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
var_dump($hashed_password);

