<?php

namespace App;

class User
{
    private string $name;
    private string $surname;
    private string $email;
    private string $password;

    public function __construct(array $user)
    {
        $this->name = $user['name'];
        $this->surname = $user['surname'];
        $this->email = $user['email'];
        $this->password = $user['password'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }



}