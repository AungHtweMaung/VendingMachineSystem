<?php

class Transaction 
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO transactions (user_id, product_id, price, quantity, total_amount) VALUES (:user_id, :product_id, :price, :quantity, :total_amount)");
        return $stmt->execute([
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'total_amount' => $data['total_amount']
        ]);
    }

    public function getByUserId($userId)
    {
        $stmt = $this->db->prepare("SELECT t.*, p.name as product_name FROM transactions t JOIN products p ON t.product_id = p.id WHERE t.user_id = :user_id ORDER BY t.created_at DESC");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}