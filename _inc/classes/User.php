<?php

class User extends Database
{
    public function register($username, $password)
    {
        $query = "INSERT INTO user (username, password) VALUES (?, ?);";
        $prepared = $this->instance->prepare($query);

        $hash = md5($password);
        return $prepared->execute(array($username, $hash));
    }

    public function login($username, $password)
    {
        $hash = md5($password);

        $query = "SELECT * FROM user WHERE username = ? AND password = ?;";
        $prepared = $this->instance->prepare($query);

        $prepared->execute(array($username, $hash));
        $user = $prepared->fetch();

        return $user;
    }
}
