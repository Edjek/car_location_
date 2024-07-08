<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class ReservationController extends AbstractController
{
    public function showReservationDetails(array $params): void
    {
        $car = new Car();
        $id = $params['id'];
        $carById = $car->getCarById($id);
        $this->render('front/reservation', [
            'car' => $carById
        ]);
    }
}
