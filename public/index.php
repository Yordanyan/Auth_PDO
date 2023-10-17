<?php
require_once ('../vendor/autoload.php');
if(!(\App\Authentication::Auth())){
    header("Location: auth.php");
}
$user = unserialize($_SESSION['user']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?= $user->getName(); ?></h1><br>
<h1><?= $user->getSurname(); ?></h1><br>
<h1><?= $user->getEmail(); ?></h1>
<a href="../includes/logout_action.php">Logout</a>

</body>
</html>
