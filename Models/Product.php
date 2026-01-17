<?php

require_once __DIR__ . '/../Configs/Database.php';

class Product
{
    private $db;

    public function __construct()
    {
        $database = new Database(); 
        $this->db = $database->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM products ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, quantity) VALUES (:name, :description, :price, :quantity)");
        return $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, description = :description, price = :price, quantity = :quantity WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
