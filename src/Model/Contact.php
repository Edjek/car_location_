<?php

namespace App\Model;

use App\Model\AbstractModel;

class Contact extends AbstractModel
{
    /**
     * @return array
     */
    public function getAllContacts(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM contact');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getContactById(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM contact WHERE id = :id;');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param float $price
     *
     * @return void
     */
    public function updateContact(int $id, string $name, string $description, float $price, string $image): void
    {
        $stmt = $this->pdo->prepare('UPDATE contact SET name= :name, description= :description, price = :price, image= :image WHERE id = :id');
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':id' => $id,
            ':image' => $image
        ]);
    }
}
