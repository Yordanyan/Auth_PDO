<?php

$connection = require_once ('../app/Connection.php');

$connection->logout();
header("Location: ../public/auth.php");