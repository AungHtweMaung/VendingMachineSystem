<?php
// Database.php
class Database
{
    private $host = '127.0.0.1';
    private $db   = 'vending_machine_system';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';

    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
