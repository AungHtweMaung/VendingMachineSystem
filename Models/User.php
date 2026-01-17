<?php

require_once __DIR__ . '/../Configs/Database.php';


class User 
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // public function findUserByUsername($username)
    // {
    //     $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
    //     $stmt->execute(['username' => $username]);
    //     return $stmt->fetch();
    // }
}