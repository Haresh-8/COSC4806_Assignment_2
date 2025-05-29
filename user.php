<?php

require_once('database.php');

class User {

    public function get_all_users() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC); 
        #return $rows;
    }

    public function username_exists($username) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users WHERE username = :username;");
        $statement->execute([':username' => $username]);
        return $statement->fetch(PDO::FETCH_ASSOC) !== false;
    }
    
    public function create_user($username, $password) {
        if ($this->username_exists($username)) return false;
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");
        return $statement->execute([':username' => $username, ':password' => $hashed]);
    }
    
    public function validate_login($username, $password) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM users WHERE username = :username;");
        $statement->execute([':username' => $username]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['password']);
    }
    
?>