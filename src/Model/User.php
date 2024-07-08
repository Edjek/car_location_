<?php

namespace App\Model;

use App\Model\AbstractModel;

class User extends AbstractModel
{

    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUserById(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :id;');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    /**
     * @param string $email
     *
     * @return [type]
     */
    public function getUserByEmail(string $email): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email= :email');
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetch();
    }

    /**
     * @param string $pseudo
     * @param string $email
     * @param string $pswd
     *
     * @return void
     */
    public function createUser(string $pseudo, string $email, string $pswd, bool $statut = false): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO user (username, email, mdp, admin) VALUES (:username, :email, :pswd, :statut)');
        $stmt->execute([
            ':username' => $pseudo,
            ':email' => $email,
            ':pswd' => $pswd,
            ':statut' => $statut
        ]);
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function updateUser(int $id, string $name, string $email, string $password, bool $statut): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE user SET
            username= :name,
            email= :email,
            mdp = :password,
            admin = :statut
            WHERE id = :id'
        );
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':statut' => $statut
        ]);
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function deleteUser(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM user WHERE id = :id');
        $stmt->execute([
            ':id' => $id
        ]);
    }
}
