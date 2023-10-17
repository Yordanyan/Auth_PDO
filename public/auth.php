<?php

require_once ('../vendor/autoload.php');
$connection = require_once('../app/Connection.php');
if(\App\Authentication::Auth()){
    header("Location: index.php");
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
</head>
<body>
<h1>Login</h1>
<form action="../includes/login_action.php" method="post">
    <label>Username</label>
    <input type="text" name="name" />
    <label>Password</label>
    <input type="password" name="password" />
    <button>Login</button>

</form>

<hr>

<h1>Register</h1>

<form action="../includes/register_action.php" method="post">
    <label>Name</label>
    <input type="text" name="name" />
    <label>Surname</label>
    <input type="text" name="surname" />
    <label>Email</label>
    <input type="email" name="email" />
    <label>Password</label>
    <input type="password" name="password" />
    <button>Register</button>

</form>
<hr>
</body>
</html>
