<?php

namespace App\Model;

use App\Model\AbstractModel;

class Reservation extends AbstractModel
{
    /**
     * @return array
     */
    public function getAllReservations(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM reservation');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function getReservationById(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM reservation WHERE id = :id;');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    /**
     * @param int $id
     * @param mixed $date_start
     * @param mixed $date_end
     *
     * @return void
     */
    public function updateReservation(int $id, $date_start, $date_end): void
    {
        $stmt = $this->pdo->prepare('UPDATE reservation SET name= :name, date_start = :date, date_end = :date WHERE id = :id');
        $stmt->execute([
            ':date' => $date_start,
            ':date' => $date_end,
            ':id' => $id
        ]);
    }
}
