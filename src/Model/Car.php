<?php

namespace App\Model;

use App\Model\AbstractModel;

class Car extends AbstractModel
{
    /**
     * @return array
     */
    public function getAllCars(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getCarById(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car WHERE id = :id;');
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
    public function createCar(string $name, string $description, string $image, float $price): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO car (name, description, image, price) VALUES ( :name, :description, :image, :price)');
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':image' => $image,
            ':price' => $price
        ]);
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param float $price
     *
     * @return void
     */
    public function updateCar(int $id, string $name, string $description, float $price, string $image): void
    {
        $stmt = $this->pdo->prepare('UPDATE car SET name= :name, description= :description, price = :price, image= :image WHERE id = :id');
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':id' => $id,
            ':image' => $image
        ]);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function deleteCar(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM car WHERE id = :id');
        $stmt->execute([
            ':id' => $id
        ]);
    }
}
