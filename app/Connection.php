<?php

namespace App;

use PDO;
require_once '../vendor/autoload.php';

class Connection
{
    public PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:server=localhost;dbname=auth','root','root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function login($user){

        if(empty($user['name']) || empty($user['password'])){
            $errMSG = 'please fill all inputs';
            echo $errMSG;
            exit;
        }
        else
        {
            $statement = $this->pdo->prepare("SELECT * FROM auth WHERE name = :name AND password = :password");
            $statement->bindValue('name',$user['name']);
            $statement->bindValue('password',$user['password']);
            $statement->execute();

            if($statement->rowCount()){
                session_start();
                $user_fetched = $statement->fetch(PDO::FETCH_ASSOC);
                $user = new User($user_fetched);
                $_SESSION['user'] = serialize($user);
            }else{
                echo 'Name or Password are incorrect';
                exit;
            }
        }

    }

    public function register($user){
        $name = '';
        $surname = '';
        $email = '';
        $password = '';

        if (empty ($user["name"]) || strlen($user['name']) > 255 || strlen($user['name']) < 2) {
            $errMsg = "Error! You didn't enter the Name.Or it is to little";
            echo $errMsg;
            exit;
        } else {
            $name = $user["name"];
        }

        if (empty ($user["surname"]) || strlen($user['surname']) > 255 || strlen($user['surname']) < 2) {
            $errMsg = "Error! You didn't enter the Surname.Or it is to little";
            echo $errMsg;
            exit;
        } else {
            $surname = $user["surname"];
        }

        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            echo $emailErr;
            exit;
        }else{
            $email = $user['email'];
        }

        if(empty($user['password'])){
            $errorMSG = 'Password will not be empty';
            echo $errorMSG;
            exit;
        }else{
            $password = $user['password'];
        }

        $statement = $this->pdo->prepare("INSERT INTO `auth`(`name`, `surname`, `email`,`password`) VALUES (:name,:surname,:email,:password)");
        $statement->bindValue('name',$name);
        $statement->bindValue('surname',$surname);
        $statement->bindValue('email',$email);
        $statement->bindValue('password',$password);
        return $statement->execute();
    }

    public function logout(){
        session_start();
        session_destroy();
    }



}

return new Connection();