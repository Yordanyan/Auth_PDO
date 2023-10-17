<?php

$connection = require_once ('../app/Connection.php');

$connection->login($_POST);
header("Location: ../public/index.php");