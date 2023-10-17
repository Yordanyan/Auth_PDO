<?php

$connection = require_once ('../app/Connection.php');

$connection->register($_POST);
header("Location: ../public/auth.php");